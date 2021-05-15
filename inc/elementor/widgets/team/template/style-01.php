<div class="team-style-1">
    <div class="team-img">
       <?php echo wp_get_attachment_image($settings['image']['id'], 'full');?>
    </div>
    <div class="team-content">
        <h4 <?php echo esc_html(  $this->get_render_attribute_string( 'name' ) ); ?>><?php echo esc_html( $settings['name'] ); ?></h4>
        <p <?php echo esc_html( $this->get_render_attribute_string( 'designation' ) ); ?>><?php echo esc_html( $settings['designation'] ); ?></p>
    </div>
    <div class="team-overly">
        <div class="team-social">
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
