<?php

/**
 * Class Uta_Loader
 */
class Uta_Loader{
    // Autoload dependency.
    public function __construct(){
        $this->load_dependency();
    }

    /**
     * Load all Plugin FIle.
     */
    public function load_dependency(){
        include_once(dirname( __FILE__ ). '/Uta-i18n.php');
        include_once(dirname( __FILE__ ). '/codepopular-promotion.php');
        include_once(dirname( __FILE__ ). '/Uta-Helpers.php');
        include_once(dirname( __FILE__ ). '/addons/uta-addons.php');
        include_once(dirname( __FILE__ ). '/Uta_Admin.php');
        include_once(dirname( __FILE__ ). '/elementor/elementor.php');
    }
}

/**
 * Initialize load class .
 */
function unlimited_theme_addons_run(){
    if ( class_exists( 'Uta_Loader' ) ) {
        new Uta_Loader();
    }
}

