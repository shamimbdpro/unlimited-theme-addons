<div class="team-style-2">
    <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
    <div class="team-style-2-overly-top">
        <div class="team-style-2-overly-top-full">
            <h3 <?php echo esc_html($this->get_render_attribute_string('name')); ?>><?php echo esc_html($settings['name']); ?></h3>
            <h5 <?php echo esc_html($this->get_render_attribute_string('designation')); ?>><?php echo esc_html($settings['designation']); ?></h5>
            <ul>
                <?php foreach ( $settings['social_media'] as $single_social ) {

                    if ( ! empty($single_social['social_url']['url']) ) {
                        $this->add_link_attributes('social_url', $single_social['social_url']);
                    }

                ?>
                    <li>
                        <a <?php echo $this->get_render_attribute_string('social_url'); //phpcs:ignore ?>>
                            <?php \Elementor\Icons_Manager::render_icon($single_social['social_icon'], [ 'aria-hidden' => 'true' ]); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="team-style-2-social-bottom">
        <ul>
            <?php foreach ( $settings['social_media'] as $single_social ) { ?>
                <li>
                    <a <?php echo $this->get_render_attribute_string('social_url'); //phpcs:ignore ?>>
                        <?php \Elementor\Icons_Manager::render_icon($single_social['social_icon'], [ 'aria-hidden' => 'true' ]); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>