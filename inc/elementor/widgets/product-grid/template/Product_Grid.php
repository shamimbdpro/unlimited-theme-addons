<?php

namespace Elementor;

if ( ! defined('ABSPATH') ) {
    exit;
} // Exit if accessed directly

trait Product_Grid
{
    public static function render_template( $args, $settings ) {
        $query = new \WP_Query($args);

        ob_start();

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();

                $product = wc_get_product(get_the_ID());

                if ( 'uta-product-simple' == $settings['uta_product_grid_style_preset'] ) { ?>
                    <li class="product">
                        <a href="<?php echo $product->get_permalink();?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"> <?php //phpcs:ignore?>
                          <?php echo $product->get_image('woocommerce_thumbnail'); ?><?php //phpcs:ignore?>
                            <h2 class="woocommerce-loop-product__title"> <?php echo $product->get_title(); ?> </h2><?php //phpcs:ignore?>
                            <?php if ( 'yes' == ($settings['uta_product_grid_rating'] ) ) {
                                echo '<span>'. wc_get_rating_html($product->get_average_rating(), $product->get_rating_count()).'</span>'; //phpcs:ignore
                            }?>

                            <?php
                            echo ''.( ! $product->managing_stock() && ! $product->is_in_stock() ? '<span class="outofstock-badge">'.esc_html__('Stock ', 'unlimited-theme-addons'). '<br />' . esc_html__('Out', 'unlimited-theme-addons').'</span>' : ($product->is_on_sale() ? '<span class="onsale">' . esc_html__('Sale!', 'unlimited-theme-addons') . '</span>' : '') ).'';
                            ?>

                            <span class="price"><?php echo $product->get_price_html(); //phpcs:ignore ?></span>
                        </a>
                        <?php echo woocommerce_template_loop_add_to_cart(); //phpcs:ignore ?>
                    </li>
                <?php }else {
                    wc_get_template_part('content', 'product');
                }
            }
        } else {
            _e('<p class="no-posts-found">No posts found!</p>', 'unlimited-theme-addons'); //phpcs:ignore
        }
        wp_reset_postdata();
        return ob_get_clean();
    }
}
