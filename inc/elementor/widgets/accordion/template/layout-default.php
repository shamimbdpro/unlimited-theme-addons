
<ul class="uta-accordion layout-default" id="<?php echo esc_attr(uniqid()); ?>">


    <?php if ( isset($settings['accordion__tabs']) ) { $i = 0; ?>
    <?php foreach ( $settings['accordion__tabs'] as $key => $acc_tab ) { $i++;
        ?>
    <li data-speed="<?php echo esc_attr($settings['toggle_speed']);?>" class="<?php if ( 1 == $i && 'yes' == $settings['active_first_child'] ) {echo esc_attr('active');} ?>">
        <div class="accordion-heading <?php echo esc_attr( $settings['icon_align'] ); ?>">
            <h3>
                <?php if ( 'icon-left' == $settings['icon_align'] ) {?>
                <div class="accordion-icon">
                    <span class="default-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['accordion__selected_icon'] ); ?></span>
                    <div class="active-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['accordion__selected_active_icon'] ); ?></div>
                </div>
                <?php } ?>

                <?php esc_html_e($acc_tab['accordion__title'], 'unlimited-theme-addons'); //phpcs:ignore ?>

                <?php if ( 'icon-right' == $settings['icon_align'] ) {?>
                <div class="accordion-icon">
                    <span class="default-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['accordion__selected_icon'] ); ?></span>
                    <div class="active-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['accordion__selected_active_icon'] ); ?></div>
                </div>
                <?php } ?>

            </h3>
        </div>
        <div class="accordion-body">
          <p><?php echo  $this->uta_accordion_contents($acc_tab); // phpcs:ignore ?> </p>
        </div>
        <?php }
} ?>
    </li>
</ul>