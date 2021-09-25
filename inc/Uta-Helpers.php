<?php

/**
 * Class Uta_helpers
 */
class Uta_helpers{

    private static $instance = null;
    public static function get_instance() {
        if ( ! self::$instance )
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * Initialize global hooks.
     */
    public function init(){
        add_filter( 'woocommerce_product_get_rating_html', [ $this, 'uta_ratings_markup' ] , 10, 3 );
    }

    /**
     * @param $html
     * @param $rating
     * @param $count
     * @return string
     */
    public function uta_ratings_markup( $html, $rating, $count ) {
        if ( 0 == $rating ) {
            $html  = '<div class="star-rating">';
            $html .= wc_get_star_rating_html( $rating, $count );
            $html .= '</div>';
        }
        return $html;
    }

    /**
     * Check if the Woocommerce Installed.
     * @access public
     * @return bool
     */
    public function is_wc_install(){
        if ( class_exists( 'WooCommerce' ) ) {
            return true;
        } else {
           return false;
        }
    }


    /**
     * Check if the premium plugin installed.
     *
     * @return bool
     */
    public static function is_uta_pro_installed(){

        if ( class_exists('Unlimited_Theme_Addons_Pro') ) {
            return true;
        }else {
            return false;
        }
    }

}

Uta_helpers::get_instance()->init();


