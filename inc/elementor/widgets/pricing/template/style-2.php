
<div class="uta-pricing-item <?php echo esc_attr( $settings['uta_pricing_style'] );?>  <?php  if ( 'yes' == $show_pricing_active ) :  ?> active <?php endif; ?>">
  
   <?php  if ( 'yes' == $show_pricing_active ) :  ?>
		<span class="uta-pricing-badge"><?php echo esc_html($badge_title); ?></span>
	<?php endif; ?>

   <h4 <?php echo $this->get_render_attribute_string('title'); ?>><?php echo esc_html($pricing_title); //phpcs:ignore ?></h4>
   <h2 <?php echo $this->get_render_attribute_string('price'); //phpcs:ignore ?>>
      <span class="uta-currency"><?php echo $settings['currency']; ?></span><?php echo esc_html($settings['price']); //phpcs:ignore ?>
  
      <?php if ( 'none' !== $settings['package'] ) : ?>
      / <span class="uta-pricing-package" <?php echo esc_html($this->get_render_attribute_string('package')); ?>><?php echo esc_html($settings['package']); ?></span>
      <?php endif ?>
   </h2>

  

   <ul>

      <?php
        foreach ( $settings['feature_list'] as $index => $feature ) {
            $feature_inline = $this->get_repeater_setting_key('feature', 'feature_list', $index);
            $this->add_inline_editing_attributes($feature_inline, 'basic');
            ?>
            <li <?php echo esc_html($this->get_render_attribute_string($feature_inline)); ?>><i class="fas fa-check"></i> <?php echo esc_html($feature['feature']) ?></li>
            <?php
        } ?>


   </ul>
   <div class="pricing-btn">
      <a href="<?php echo esc_url($settings['btn_url']) ?>" <?php echo $this->get_render_attribute_string('btn_text'); ?>><?php echo esc_html($settings['btn_text']); //phpcs:ignore ?></a>
   </div>
</div>