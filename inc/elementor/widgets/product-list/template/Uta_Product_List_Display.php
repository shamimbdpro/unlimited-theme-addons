<?php

namespace Elementor;

if ( ! defined('ABSPATH') ) {
    exit;
} // Exit if accessed directly

trait Uta_Product_List_Display
{
    public static function render_template( $args, $settings ) {
        $show_excerpt = $settings['uta_product_list_show_excerpt'];
        $excerpt_word_limit = $settings['uta_product_list_excerpt_word_limit'];
        $query = new \WP_Query($args);

        ob_start();

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $product = wc_get_product(get_the_ID());

                ?>
                <li class="product">
                    <div class="uta-product-list-wrapper">
                        <div class="uta-product-img-wrapper">
                            <a href="<?php echo esc_url( $product->get_permalink() ); ?>"
                               class="woocommerce-Loop Product-link woocommerce-loop-product__link"> <?php //phpcs:ignore?>
                                <?php echo $product->get_image('woocommerce_thumbnail'); ?><?php //phpcs:ignore?>
                            </a>
                        </div>

                        <div class="uta-product-list-details">

                            <a href="<?php echo esc_url( $product->get_permalink() ); ?>"
                            <h2 class="woocommerce-loop-product__title"> <?php echo $product->get_title(); ?> </h2><?php //phpcs:ignore?>
                            </a>

                            <?php if ( 'yes' == $show_excerpt ) { ?>
                                <div class="uta-product-content">
                                      <p><?php echo wp_trim_words( get_the_excerpt(), $excerpt_word_limit, ' ...' ); //phpcs:ignore ?></p>
                                </div>
                            <?php } ?>

                            <?php if ( 'yes' == ($settings['uta_product_list_rating']) ) {
                                echo '<span>' . wc_get_rating_html($product->get_average_rating(), $product->get_rating_count()) . '</span>'; //phpcs:ignore
                            } ?>

                            <?php
                            echo '' . ( ! $product->managing_stock() && ! $product->is_in_stock() ? '<span class="outofstock-badge">' . esc_html__('Stock ', 'unlimited-theme-addons') . '<br />' . esc_html__('Out', 'unlimited-theme-addons') . '</span>' : ($product->is_on_sale() ? '<span class="onsale">' . esc_html__('Sale!', 'unlimited-theme-addons') . '</span>' : '')) . '';
                            ?>

                            <span class="price"><?php echo $product->get_price_html(); //phpcs:ignore ?></span>

                            <?php echo woocommerce_template_loop_add_to_cart(); //phpcs:ignore ?>
                        </div>
                        <div>
                </li>
            <?php }
        } else {
            _e('<p class="no-posts-found">No posts found!</p>', 'unlimited-theme-addons'); //phpcs:ignore
        }
        wp_reset_postdata();
        return ob_get_clean();
    }
}
