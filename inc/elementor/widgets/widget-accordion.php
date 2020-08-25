<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Accordion
class cpthelper_Widget_Accordion extends Widget_Base {
 
   public function get_name() {
      return 'accordion';
   }
 
   public function get_title() {
      return esc_html__( 'Accordion', 'cpthelper' );
   }
 
   public function get_icon() { 
        return 'eicon-accordion';
   }
 
   public function get_categories() {
      return [ 'cpthelper-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'accordion_section',
         [
            'label' => esc_html__( 'Accordion', 'cpthelper' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'accordion_style',
         [
            'label' => __( 'Accordion Style', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style-1',
            'options' => [
               'style-1'  => __( 'Style 1', 'cpthelper' ),
               'style-2' => __( 'Style 2', 'cpthelper' ),
               'style-3' => __( 'Style 3', 'cpthelper' ),
               'none' => __( 'None', 'cpthelper' ),
            ],
         ]
      );

      $this->add_control(
         'collapsed_icon',
         [
            'label' => __( 'Collapsed Icon', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'default' => 'fa fa-plus',
            'condition' => [
               'accordion_style' => ['style-1','style-2']
            ]
         ]
      );

      $this->add_control(
         'expanded_icon',
         [
            'label' => __( 'Expanded Icon', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::ICON,
            'default' => 'fa fa-minus',
            'condition' => [
               'accordion_style' => ['style-1','style-2']
            ]
         ]
      );

      $accordion = new \Elementor\Repeater();

      $accordion->add_control(
         'title', [
            'label' => __( 'Title', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'label_block' => true,
         ]
      );
      $accordion->add_control(
         'text', [
            'label' => __( 'Text', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'label_block' => true,
         ]
      );

      $this->add_control(
         'accordion_list',
         [
            'label' => __( 'Accordion list', 'cpthelper' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $accordion->get_controls(),
            'default' => [
               [
                  'title' => __( 'How can i get help by cpthelper?', 'cpthelper' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'cpthelper' )
               ],
               [
                  'title' => __( 'What about loan programs & after bank loan advantage?', 'cpthelper' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'cpthelper' )
               ],
               [
                  'title' => __( 'How can i opent new account?', 'cpthelper' ),
                  'text' => __( 'Lorem ipsum dolor sit amet, vix an natum labitur eleifd, mel am laoreet menandri. Ei justo complectitur duo. Ei mundi solet utos soletu possit quo. Sea cu justo laudem.', 'cpthelper' )
               ]
            ],
            'title_field' => '{{{ title }}}',
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.

      $randID = wp_rand();

      $settings = $this->get_settings_for_display(); ?>
      <div id="accordion<?php echo $randID ?>" class="cpthelper-accordion <?php echo esc_attr( $settings['accordion_style'] ) ?>">
        <?php if ( $settings['accordion_list'] ) {
            foreach ( $settings['accordion_list'] as $key => $accordion ) {
            $title = $this->get_repeater_setting_key( 'title', 'accordion_list' , $key );
            $text = $this->get_repeater_setting_key( 'text', 'accordion_list' , $key );
            $this->add_inline_editing_attributes( $title, 'basic' );
            $this->add_inline_editing_attributes( $text, 'basic' );
           ?>
          <div class="cpthelper-accordion-item">
            <h5 <?php echo $this->get_render_attribute_string( $title ); ?> data-toggle="collapse" data-target="#collapse-<?php echo $key.$randID ?>" aria-expanded="false" aria-controls="collapse-<?php echo $key.$randID ?>">
                <?php echo esc_html( $accordion['title'] ); ?>
                <span class="<?php echo esc_attr( $settings['collapsed_icon'] ) ?>"></span>
                <span class="<?php echo esc_attr( $settings['expanded_icon'] ) ?>"></span>
            </h5>

            <div <?php echo $this->get_render_attribute_string( $text ) ?>id="collapse-<?php echo $key.$randID ?>" class="collapse" data-parent="#accordion<?php echo $randID ?>">
               <?php echo wp_kses( $accordion['text'] , array(
                  'a'       => array(
                     'href'    => array(),
                     'title'   => array()
                  ),
                  'br'      => array(),
                  'em'      => array(),
                  'strong'  => array(),
                  'img'     => array(
                     'src' => array(),
                     'alt' => array()
                  ),
               )); ?>
            </div>
          </div>
          <?php } 
      } ?>
      </div>

      

      <?php
   }

}

Plugin::instance()->widgets_manager->register_widget_type( new cpthelper_Widget_Accordion );