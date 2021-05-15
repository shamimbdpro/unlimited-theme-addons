<div class="team-style-8">
    <div class="team-style-8-img">
        <?php echo wp_get_attachment_image($settings['image']['id'], 'full');?>
    </div>
    <div class="team-style-8-social">
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
    <div class="team-style-8-content">
        <h3 <?php echo esc_html(  $this->get_render_attribute_string( 'name' ) ); ?>><?php echo esc_html( $settings['name'] ); ?></h3>
        <h5 <?php echo esc_html( $this->get_render_attribute_string( 'designation' ) ); ?>><?php echo esc_html( $settings['designation'] ); ?></h5>
    </div>
</div>