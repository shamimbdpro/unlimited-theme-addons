
    <div class="uta-blockquote uta-quote-default">
        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );?>
        <p <?php echo esc_html( $this->get_render_attribute_string( 'quote_text' ) ); ?>><?php echo esc_html( $settings['quote_text'] ); ?></p>
        <span <?php echo esc_html( $this->get_render_attribute_string( 'quote_speaker_name' ) ); ?>><?php echo esc_html( $settings['quote_speaker_name'] ); ?></span>
    </div>