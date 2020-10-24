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
                        <a href="<?php echo $product->get_permalink();?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                          <?php echo $product->get_image('woocommerce_thumbnail'); ?>
                            <h2 class="woocommerce-loop-product__title"> <?php echo $product->get_title(); ?> </h2>
                            <?php if( ($settings['uta_product_grid_rating'] == 'yes' )) {
                                echo '<span>'. wc_get_rating_html($product->get_average_rating(), $product->get_rating_count()).'</span>';
                            }?>

                            <?php
                            echo ''.( ! $product->managing_stock() && ! $product->is_in_stock() ? '<span class="outofstock-badge">'.__('Stock ', 'unlimited-theme-addons-free'). '<br />' . __('Out', 'unlimited-theme-addons-free').'</span>' : ($product->is_on_sale() ? '<span class="onsale">' . __('Sale!', 'unlimited-theme-addons-free') . '</span>' : '') ).'';
                            ?>

                            <span class="price"><?php echo $product->get_price_html(); ?></span>
                        </a>
                        <?php echo woocommerce_template_loop_add_to_cart(); ?>
                    </li>
                <?php }else {
                    wc_get_template_part('content', 'product');
                }
            }
        } else {
            esc_html_e('<p class="no-posts-found">No posts found!</p>', 'unlimited-theme-addons');
        }
        wp_reset_postdata();
        return ob_get_clean();
    }
}
