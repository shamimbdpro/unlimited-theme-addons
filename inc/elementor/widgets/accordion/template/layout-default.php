
<ul class="uta-accordion layout-default">
    <?php if( isset($settings['uta_acc_tabs']) ){ ?>
    <?php foreach($settings['uta_acc_tabs'] as $acc_data ){?>
    <li>
        <div class="accordion-heading">
            <h3><?php esc_html_e($acc_data['uta_acc_title'], 'unlimited-theme-addons');?>
                <div class="accordion-icon">
                    <span class="default-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['uta_acc_selected_icon'] ); ?></span>
                    <div class="active-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['uta_acc_selected_active_icon'] ); ?></div>
                </div>
            </h3>
        </div>
        <div class="accordion-body">
          <p><?php esc_html_e($acc_data['uta_acc_content'], 'unlimited-theme-addons');?></p>
        </div>
        <?php }} ?>
    </li>
</ul>