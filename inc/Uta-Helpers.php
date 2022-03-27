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
        // Add plugin option name in admin top bar.
        add_action('admin_bar_menu', [ $this, 'uta_admin_top_bar_option' ], 2000);
        // WooCommerce rating mockup.
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


    /**
     * Unlimited theme addons admin top bar option.
     * @return void.
     */
    public function uta_admin_top_bar_option() {
        global $wp_admin_bar;
        $menu_id = 'unlimited-theme-addons';
        $wp_admin_bar->add_menu(array(
			'id' => $menu_id,
			'title' => __('Theme Addons', 'unlimited-theme-addons'),
			'href' => admin_url() .'/admin.php?page=unlimited-theme-addons',
		));
    }


}

Uta_helpers::get_instance()->init();


