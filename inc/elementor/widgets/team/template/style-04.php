<div class="team-style-4">
    <div class="team-style-single-4-full">
        <?php echo wp_get_attachment_image($settings['image']['id'], 'full');?>
        <div class="team-style-4-overly">
            <div class="team-style-4-overly-full">
                <h3 <?php echo esc_html(  $this->get_render_attribute_string( 'name' ) ); ?>><?php echo esc_html( $settings['name'] ); ?></h3>
                <h5 <?php echo esc_html( $this->get_render_attribute_string( 'designation' ) ); ?>><?php echo esc_html( $settings['designation'] ); ?></h5>
                <div class="social">
                    <ul>
                        <?php foreach ( $settings['social_media'] as $single_social ) { ?>
                <li>
                    <a href="<?php echo esc_attr( $single_social['social_url'] ) ?>">
                        <?php \Elementor\Icons_Manager::render_icon( $single_social['social_icon'], [ 'aria-hidden' => 'true' ] );?>
                    </a>
                </li>
                <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>