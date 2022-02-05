<div class="team-style-3">
    <div class="team-style-3-img">
        <?php echo wp_get_attachment_image($settings['image']['id']); ?>
    </div>
    <div class="team-style-3-content">
        <h3 <?php echo esc_html($this->get_render_attribute_string('name')); ?>><?php echo esc_html($settings['name']); ?></h3>
        <h5 <?php echo esc_html($this->get_render_attribute_string('designation')); ?>><?php echo esc_html($settings['designation']); ?></h5>
        <p <?php echo esc_html($this->get_render_attribute_string('description_team_mebmber')); ?>><?php echo esc_html($settings['description_team_mebmber']); ?></p>
        <div class="social">
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
</div>