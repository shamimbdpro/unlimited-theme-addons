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
     * Product page URL for Unlimited Theme Addons Pro (UTM for upgrade / buy flows).
     *
     * @param string $utm_content Optional segment, e.g. settings_premium_card, plugins_screen_upgrade.
     * @return string Escaping should use esc_url() at output.
     */
    public static function get_pro_product_url( $utm_content = 'buy_pro_button' ) {
        $base = 'https://codepopular.com/product/unlimited-theme-addons/';
        $args = array(
            'utm_source'   => 'upgrade_to_pro_button',
            'utm_medium'   => 'wp_admin',
            'utm_campaign' => 'unlimited_theme_addons',
            'utm_content'  => sanitize_key( (string) $utm_content ),
        );
        return add_query_arg( $args, $base );
    }

    /**
     * Live demo URL for Unlimited Theme Addons (UTM for marketing attribution).
     *
     * @param string $utm_content Optional segment, e.g. settings_premium_live_demo, plugins_screen_live_demo.
     * @return string Escaping should use esc_url() at output.
     */
    public static function get_live_demo_url( $utm_content = 'live_demo_button' ) {
        $base = 'https://unlimited-theme-addons.com/';
        $args = array(
            'utm_source'   => 'live_demo_button',
            'utm_medium'   => 'wp_admin',
            'utm_campaign' => 'unlimited_theme_addons',
            'utm_content'  => sanitize_key( (string) $utm_content ),
        );
        return add_query_arg( $args, $base );
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


