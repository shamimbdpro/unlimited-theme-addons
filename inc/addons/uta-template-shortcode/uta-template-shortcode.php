<?php

use Elementor\Plugin;

/**
 * Class Uta_Template_Shortcode
 */
class Uta_Template_Shortcode
{


    private static $instance = null;
    public static function get_instance() {
        if ( ! self::$instance)
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * Initialize global hooks.
     */
    public function init() {

        add_action('init', array( $this, 'uta_template_shortcode_create_post_type' ));
        add_action('elementor/init', [ $this, 'uta_template_add_elementor_support' ]);
        add_filter('manage_uta_template_posts_columns', array( $this, 'uta_template_shortcode_column_title' ));
        add_action('manage_uta_template_posts_custom_column', array( $this, 'uta_template_shortcode_column_content' ), 10, 2);
        add_filter('manage_elementor_library_posts_columns', array( $this, 'manage_elementor_library_posts_columns_title' ));
        add_action('manage_elementor_library_posts_custom_column', array( $this, 'manage_elementor_library_posts_custom_column_content' ), 10, 2);
        add_shortcode("uta-template", [ $this, 'uta_template_render_shortcode' ]);
        add_action("add_meta_boxes", [ $this, 'uta_template_add_meta_boxes' ]);
    }



    /**
     * Register Custom Post
     * 
     * Register custo post type for template shortcode which allow to get shortcode each created item.
     *
     * @return void
     */
    public function uta_template_shortcode_create_post_type() {

        $labels = array(
            'name'                  => _x('Template Kit', 'Post Type General Name', 'unlimited-theme-addons'),
            'singular_name'         => _x('Template Kit', 'Post Type Singular Name', 'unlimited-theme-addons'),
            'menu_name'             => __('Template Kit', 'unlimited-theme-addons'),
            'name_admin_bar'        => __('Template Kit', 'unlimited-theme-addons'),
            'archives'              => __('List Archives', 'unlimited-theme-addons'),
            'parent_item_colon'     => __('Parent List:', 'unlimited-theme-addons'),
            'all_items'             => __('All Templates', 'unlimited-theme-addons'),
            'add_new_item'          => __('Add New Template', 'unlimited-theme-addons'),
            'add_new'               => __('Add New', 'unlimited-theme-addons'),
            'new_item'              => __('New UTA Template', 'unlimited-theme-addons'),
            'edit_item'             => __('Edit UTA Template', 'unlimited-theme-addons'),
            'update_item'           => __('Update UTA Template', 'unlimited-theme-addons'),
            'view_item'             => __('View UTA Template', 'unlimited-theme-addons'),
            'search_items'          => __('Search UTA Template', 'unlimited-theme-addons'),
            'not_found'             => __('Not found', 'unlimited-theme-addons'),
            'not_found_in_trash'    => __('Not found in Trash', 'unlimited-theme-addons'),
        );

        $args = array(
            'label'                 => __('Post List', 'unlimited-theme-addons'),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'public'                => true,
            'rewrite'               => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => false,
            'exclude_from_search'   => true,
            'capability_type'       => 'post',
            'hierarchical'          => false,
            'menu-icon'             => 'dashicon-move',
        );

        register_post_type('uta_template', $args);
    }

    /**
     * Add elementor support.
     * 
     * Add elementor support for template post type.
     *
     * @return void
     */
    public function uta_template_add_elementor_support() {

        add_post_type_support('uta_template', 'elementor');
    }

    
    /**
     * Custom post type column.
     * 
     * Add column in custom post type.
     *
     * @param string $defaults
     * @return void
     */
    public  function uta_template_shortcode_column_title( $defaults ) {
        $defaults['uta-template-shortcode']  = 'Shortcode';
        return $defaults;
    }

    /**
     * Custom column content
     * 
     * Add content for cusotm column in shortcode.
     *
     * @param string $column_name
     * @param int $post_ID
     * @return void
     */
    public function uta_template_shortcode_column_content( $column_name, $post_ID ) {

        if ( 'uta-template-shortcode' == $column_name ) {
            echo esc_html('[uta-template id="' . $post_ID . '"]');
        }
    }


    /**
     * Custom post type column.
     * 
     * Add column in custom post type.
     *
     * @param string $defaults
     * @return void
     */
    public  function manage_elementor_library_posts_columns_title( $defaults ) {
        $defaults['uta-template-shortcode']  = 'Shortcode';
        return $defaults;
    }

    /**
     * Custom column content
     * 
     * Add content for cusotm column in shortcode.
     *
     * @param string $column_name
     * @param int $post_ID
     * @return void
     */
    public function manage_elementor_library_posts_custom_column_content( $column_name, $post_ID ) {
        if ( 'uta-template-shortcode' == $column_name ) {

            echo esc_html('[uta-template id="' . $post_ID . '"]');
        }
    }


    /**
     * Render shortcode content
     * 
     * Get page content by applying shortcode.
     *
     * @param [type] $atts
     * @return void
     */
    public function uta_template_render_shortcode( $atts ) {

        // Enable support for WPML & Polylang
        $language_support = apply_filters('uta_multilingual_support', false);


        if ( ! isset($atts['id']) || empty($atts['id']) ) {
            return '';
        }

        $post_id = $atts['id'];


        if ( $language_support ) {
            $post_id = apply_filters('wpml_object_id', $post_id, 'uta_multilingual_support');
        }

        $response = null;

        if ( class_exists('Elementor\Plugin') && Plugin::$instance->documents->get($post_id)->is_built_with_elementor() ) {

            $response = Plugin::instance()->frontend->get_builder_content_for_display($post_id);

        } else {

            $post = get_post($post_id); // specific post
            $the_content = apply_filters('the_content', $post->post_content);

            if ( ! empty($the_content) ) {
                $response = $the_content;
            }        
}

        return $response;

    }


    /**
     * Add shortcode box inside the page.
     * 
     * Shortcode for inside the page so that user can get PHP or normal shortcode.
     *
     * @return void
     */
    public function uta_template_add_meta_boxes(){
        add_meta_box('uta-shortcode-box','Unlimited Theme Addons Template Shortcode',[ $this, 'uta_template_add_meta_boxes_content' ],'uta_template','side','high');  
    }



    /**
     * Shortcode box content
     * 
     * Add content for shortcode box inside the custom post type pages.
     *
     * @param object $post
     * @return void
     */
    function uta_template_add_meta_boxes_content( $post ) {  ?>
        <h4 style="margin-bottom:5px;">Shortcode</h4>
        <input type='text' class='widefat' value='[uta-template id="<?php echo esc_attr($post->ID); ?>"]' readonly="">
    
        <h4 style="margin-bottom:5px;">PHP Code</h4>
        <input type='text' class='widefat' value="&lt;?php echo do_shortcode('[uta-template id=&quot;<?php echo esc_attr($post->ID); ?>&quot;]'); ?&gt;" readonly="">
        <?php
    }


}

Uta_Template_Shortcode::get_instance()->init();
