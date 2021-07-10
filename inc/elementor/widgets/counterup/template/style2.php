<div class="uta-counter-item uta-counter-item-02">
	<?php if ( $icon ) : ?>
		<div class="icon">
			<?php if ( 'yes' == $settings['counter_up_icon'] ) { \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); } ?>
		</div>
	<?php endif; ?>
	<div class="content">
		<h2><span class="uta-counter odometer" data-count="<?php echo esc_html( $uta_counter_up_ends_number ); ?>"></span> <small><?php echo esc_html( $uta_counter_up_suffix_number ); ?></small></h2>
		<p><?php echo esc_html( $uta_counter_up_title ); ?></p>
	</div>
</div>