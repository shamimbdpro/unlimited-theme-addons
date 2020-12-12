<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class Uta_Client_Logo extends Widget_Base
{

    public function get_name() {
        return 'uta-client-logo';
    }

    public function get_title() {
        return esc_html__( 'UTA Client Logo', 'unlimited-theme-addons' );
    }

    public function get_icon() {
        return 'eicon-logo';
    }

    public function get_keywords() {
        return [
            'uta client logo',
            'logo',
            'uta',
            'client logo widget',
            'widget',
            'client logo',
            'unlimited theme addons',
        ];
    }

    public function get_categories() {
        return [ 'uta-elements' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'uta_client_logo_section',
            [
                'label' => esc_html__( 'Logo', 'unlimited-theme-addons' ),
            ]
        );
//        $this->add_control(
//            'uta_client_logo_slide_style',
//            [
//                'label' => esc_html__( 'Slide Style ', 'unlimited-theme-addons' ),
//                'type' => Controls_Manager::SELECT,
//                'default' => 'simple_logo_image',
//                'options' => [
//                    'simple_logo_image'  => esc_html__( 'Simple', 'unlimited-theme-addons' ),
//                    'banner_logo_image' => esc_html__( 'Banner', 'unlimited-theme-addons' ),
//                ],
//            ]
//        );
        $repeater = new Repeater();
        $repeater->add_control(
            'uta_client_logo_list_title', [
                'label' => esc_html__( 'Client Name', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'List Title' , 'unlimited-theme-addons' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'uta_client_logo_image_normal',
            [
                'label' => esc_html__( 'Client Logo', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'uta_client_logo_enable_hover_logo',
            [
                'label' => esc_html__( 'Enable Hover Logo', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'unlimited-theme-addons' ),
                'label_off' => esc_html__( 'No', 'unlimited-theme-addons' ),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $repeater->add_control(
            'uta_client_logo_image_hover',
            [
                'label' => esc_html__( 'Hover Logo', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'uta_client_logo_enable_hover_logo' => 'yes'
                ]
            ]
        );

        $repeater->add_control(
            'uta_client_logo_enable_link',
            [
                'label' => esc_html__( 'Enable Link', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'unlimited-theme-addons' ),
                'label_off' => esc_html__( 'No', 'unlimited-theme-addons' ),
                'return_value' => 'yes',
            ]
        );

        $repeater->add_control(
            'uta_client_logo_website_link',
            [
                'label' => esc_html__( 'Link', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'unlimited-theme-addons' ),
                'show_external' => true,
                'condition' => [
                    'uta_client_logo_enable_link' => 'yes'
                ],
            ]
        );


        $this->add_control(
            'uta_client_logo_repeater',
            [
                'label' => esc_html__( 'Repeater List', 'unlimited-theme-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'uta_client_logo_list_title' => esc_html__( 'Title #1', 'unlimited-theme-addons' ),
                    ],
                    [
                        'uta_client_logo_list_title' => esc_html__( 'Title #2', 'unlimited-theme-addons' ),
                    ],
                    [
                        'uta_client_logo_list_title' => esc_html__( 'Title #3', 'unlimited-theme-addons' ),
                    ],
                    [
                        'uta_client_logo_list_title' => esc_html__( 'Title #4', 'unlimited-theme-addons' ),
                    ],
                    [
                        'uta_client_logo_list_title' => esc_html__( 'Title #5', 'unlimited-theme-addons' ),
                    ],
                ],
                'title_field' => '{{{ uta_client_logo_list_title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        echo '<div class="uta-client-logo-container" >';
        $this->render_callback();
        echo '</div>';
    }
    protected function render_callback( ) {

        $settings = $this->get_settings_for_display();
        extract($settings);
        $logos = $settings['uta_client_logo_repeater'];

        // Left Arrow Icon
        $migrated = isset( $settings['__fa4_migrated']['uta_client_logo_left_arrow_icon'] );
        // - Check if its a new widget without previously selected icon using the old Icon control
        $is_new = empty( $settings['uta_client_logo_left_arrow'] );
        $prevArrowIcon = ($is_new || $migrated) ? (!empty($uta_client_logo_left_arrow_icon) && $uta_client_logo_left_arrow_icon['library'] != 'svg' ? $uta_client_logo_left_arrow_icon['value'] : '') : $uta_client_logo_left_arrow;

        // Right Arrow Icon
        $migrated = isset( $settings['__fa4_migrated']['uta_client_logo_right_arrow_icon'] );
        // - Check if its a new widget without previously selected icon using the old Icon control
        $is_new = empty( $settings['uta_client_logo_right_arrow'] );
        $nextArrowIcon = ($is_new || $migrated) ? (!empty($uta_client_logo_right_arrow_icon) && $uta_client_logo_right_arrow_icon['library'] != 'svg' ? $uta_client_logo_right_arrow_icon['value'] : '') : $uta_client_logo_right_arrow;

        // Config
        $config = [
            'rtl'				=> is_rtl(),
            'arrows'			=> !empty($settings['uta_client_logo_show_arrow']),
            'dots'				=> !empty($settings['uta_client_logo_show_dot']),
            'pauseOnHover'		=> !empty($settings['uta_client_logo_pause_on_hover']),
            'prevArrow'			=> $prevArrowIcon,
            'nextArrow'			=> $nextArrowIcon,
            'autoplay'			=> !empty($settings['uta_client_logo_autoplay']),
            'autoplaySpeed'		=> !empty($settings['uta_client_logo_speed']) ? $settings['uta_client_logo_speed'] : 1000,
            'infinite'			=> !empty($settings['uta_client_logo_autoplay']),
            'slidesToShow'		=> !empty($settings['uta_client_logo_slidetosho']['size']) ? $settings['uta_client_logo_slidetosho']['size'] : 4,
            'slidesToScroll'	=> !empty($settings['uta_client_logo_slidesToScroll']['size']) ? $settings['uta_client_logo_slidesToScroll']['size'] : 1,
            'pauseOnHover'	    => !empty($settings['uta_client_logo_pause_on_hover']),
            'rows'	            => (int) $settings['uta_client_logo_rows'],
            'responsive'		=> [
                [
                    'breakpoint'    => 1024,
                    'settings'      => [
                        'slidesToShow'      => !empty($settings['uta_client_logo_slidetosho_tablet']['size']) ? $settings['uta_client_logo_slidetosho_tablet']['size'] : 2,
                        'slidesToScroll'    => !empty($settings['uta_client_logo_slidesToScroll_tablet']['size']) ? $settings['uta_client_logo_slidesToScroll_tablet']['size'] : 1,
                    ],
                ],
                [
                    'breakpoint'    => 480,
                    'settings'      => [
                        'slidesToShow'      => !empty($settings['uta_client_logo_slidetosho_mobile']['size']) ? $settings['uta_client_logo_slidetosho_mobile']['size'] : 1,
                        'slidesToScroll'    => !empty($settings['uta_client_logo_slidesToScroll_mobile']['size']) ? $settings['uta_client_logo_slidesToScroll_mobile']['size'] : 1,
                    ],
                    'arrows'		=> false,
                ]
            ],
        ];

        $this->add_render_attribute( 'wrapper', 'class', 'uta-clients-slider');
        $this->add_render_attribute( 'wrapper', 'class', $settings['uta_client_logo_arrow_pos']);
        $this->add_render_attribute( 'wrapper', 'class', $settings['uta_client_logo_client_logo_dot_style']);
        $this->add_render_attribute( 'wrapper', 'class', $settings['uta_client_logo_hover_animation_driction']);
        $this->add_render_attribute( 'wrapper', 'class', $settings['uta_client_logo_slide_style']);

        $this->add_render_attribute( 'wrapper', 'data-config', wp_json_encode($config) );

        $this->add_render_attribute( 'wrapper', 'data-direction', $settings['uta_client_logo_hover_animation_driction']);

        $seperotor_enable = $settings['uta_client_logo_separator'] == 'yes' ? 'log-separator' : '';
        ?>

        <div <?php echo \uta_Lite\Utils::render($this->get_render_attribute_string( 'wrapper' )); ?>>

            <?php

            $count = 1;

            foreach ($logos as $logo) :
                if ( ! empty( $logo['uta_client_logo_website_link']['url'] ) ) {
                    $this->add_link_attributes( 'button-' . $count, $logo['uta_client_logo_website_link'] );
                }
                ?>
                <div class="uta-client-slider-item <?php echo esc_attr($seperotor_enable);?>">
                    <div class="single-client image-switcher" title="<?php echo esc_attr( $logo['uta_client_logo_list_title'] ); ?>">
                        <?php if($logo['uta_client_logo_enable_link'] == 'yes') :  ?>


                            <a <?php echo $this->get_render_attribute_string( 'button-' . $count ); ?> <?php echo \uta_Lite\Utils::render($this->get_render_attribute_string( 'link_'.$count )); ?>>
                                <span class="content-image">

                                    <img src="<?php echo esc_url($logo['uta_client_logo_image_normal']['url']); ?>" alt="<?php echo esc_attr(Control_Media::get_image_alt($logo['uta_client_logo_image_normal'])); ?>" class="<?php echo esc_attr(($logo['uta_client_logo_enable_hover_logo'] == 'yes') ? 'main-image' :  ''); ?>">

                                    <?php if($logo['uta_client_logo_enable_hover_logo']) : ?>
                                        <img src="<?php echo esc_url($logo['uta_client_logo_image_hover']['url']); ?>" alt="<?php echo esc_attr(Control_Media::get_image_alt($logo['uta_client_logo_image_hover'])); ?>" class="hover-image">
                                    <?php endif; ?>
                                </span>
                            </a>

                        <?php else:  ?>

                            <div class="content-image">

                                <img src="<?php echo esc_url($logo['uta_client_logo_image_normal']['url']); ?>" alt="<?php echo esc_attr(Control_Media::get_image_alt($logo['uta_client_logo_image_normal'])); ?>" class="<?php echo esc_attr(($logo['uta_client_logo_enable_hover_logo'] == 'yes') ? 'main-image' :  '' ); ?>">
                                <?php if($logo['uta_client_logo_enable_hover_logo']) : ?>
                                    <img src="<?php echo esc_url($logo['uta_client_logo_image_hover']['url']); ?>" alt="<?php echo esc_attr(Control_Media::get_image_alt($logo['uta_client_logo_image_hover'])); ?>" class="hover-image">
                                <?php endif; ?>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>

                <?php  $count++; endforeach; ?>

        </div><!-- .uta-clients-slider END -->

        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Uta_Client_Logo() );
