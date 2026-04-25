<?php
/**
 * Premium / upgrade tab (shown when Pro is not active).
 *
 * @package Unlimited_Theme_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$uta_pro_buy_url = Uta_helpers::get_pro_product_url( 'settings_premium_buy_pro' );
$uta_live_demo_url = Uta_helpers::get_live_demo_url( 'settings_premium_live_demo' );
?>
<div class="row justify-content-center">
	<div class="col-sm-4">
		<div class="card">
			<div class="card-body text-center">
				<h5 class="card-title"><?php esc_html_e( 'Get Premium Version', 'unlimited-theme-addons' ); ?></h5>
				<p class="card-text"><?php esc_html_e( 'Try out premium version with simple price. currently providing creative elementor countdown time with paid version.', 'unlimited-theme-addons' ); ?></p>
				<a class="btn d-block btn-primary" href="<?php echo esc_url( $uta_pro_buy_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Buy Pro with $29.79', 'unlimited-theme-addons' ); ?></a>
				<a class="btn d-block btn-outline-primary mt-2" href="<?php echo esc_url( $uta_live_demo_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Live Demo', 'unlimited-theme-addons' ); ?></a>
			</div>
		</div>
	</div>
</div>