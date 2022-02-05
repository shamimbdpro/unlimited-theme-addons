<div class="team-style-4">
    <div class="team-style-4-img">
        <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
    </div>
    <div class="team-style-4-content">
        <h3 <?php echo esc_html($this->get_render_attribute_string('name')); ?>><?php echo esc_html($settings['name']); ?></h3>
        <span <?php echo esc_html($this->get_render_attribute_string('designation')); ?>><?php echo esc_html($settings['designation']); ?></span>
    </div>
    <ul class="team-style-4-social">
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