
<ul class="uta-accordion layout-default">

    <?php if( isset($settings['accordion__tabs']) ){ ?>
    <?php foreach($settings['accordion__tabs'] as $key => $acc_tab ){
        ?>
    <li data-id="<?php esc_attr_e($acc_tab['_id']);?>" data-speed="<?php esc_attr_e($settings['toggle_speed']);?>">
        <div class="accordion-heading <?php echo esc_attr( $settings['icon_align'] ); ?>" data-id="<?php esc_attr_e($acc_tab['_id']);?>">
            <h3>

                <?php if( 'icon-left' == $settings['icon_align'] ){?>
                <div class="accordion-icon">
                    <span class="default-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['accordion__selected_icon'] ); ?></span>
                    <div class="active-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['accordion__selected_active_icon'] ); ?></div>
                </div>
                <?php } ?>

                <?php esc_html_e($acc_tab['accordion__title'], 'unlimited-theme-addons');?>

                <?php if( 'icon-right' == $settings['icon_align'] ){?>
                <div class="accordion-icon">
                    <span class="default-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['accordion__selected_icon'] ); ?></span>
                    <div class="active-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['accordion__selected_active_icon'] ); ?></div>
                </div>
                <?php } ?>

            </h3>
        </div>
        <div class="accordion-body" data-id="<?php esc_attr_e($acc_tab['_id']);?>" >
          <p><?php echo  $this->uta_accordion_contents($acc_tab); ?> </p>
        </div>
        <?php }} ?>
    </li>
</ul>