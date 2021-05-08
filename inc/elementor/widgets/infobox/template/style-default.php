
<div class="uta-infobox-item text-center">
    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );?>
    <h4 <?php echo esc_html( $this->get_render_attribute_string( 'title' ) ); ?>><?php echo esc_html( $settings['title'] ); ?></h4>
    <p <?php echo esc_html( $this->get_render_attribute_string( 'text' ) ); ?>><?php echo esc_html( $settings['text'] ); ?></p>
</div>