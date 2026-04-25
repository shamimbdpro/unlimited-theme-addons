<?php
/**
 * Main admin settings screen.
 *
 * @package Unlimited_Theme_Addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="uta-admin-wrapper wrap">
	<div class="uta-admin-header">
		<h1 class="uta-admin-header__title">
			<span class="dashicons dashicons-admin-plugins" aria-hidden="true"></span>
			<?php esc_html_e( 'Unlimited Theme Addons', 'unlimited-theme-addons' ); ?>
		</h1>
		<p class="uta-admin-header__subtitle">
			<?php esc_html_e( 'All-in-one Elementor widgets and site tools. Enable the widgets you need in the editor and optional addons for WooCommerce, templates, and more.', 'unlimited-theme-addons' ); ?>
		</p>
	</div>

	<div class="uta-admin-content card-body mw-100">
		<ul class="nav nav-tabs" id="utaAdminTabs" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="uta-widgets-tab" data-bs-toggle="tab" data-bs-target="#widgets" type="button" role="tab" aria-controls="widgets" aria-selected="true">
					<span class="dashicons dashicons-tagcloud" aria-hidden="true"></span>
					<?php esc_html_e( 'Widgets', 'unlimited-theme-addons' ); ?>
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="uta-addons-tab" data-bs-toggle="tab" data-bs-target="#addons" type="button" role="tab" aria-controls="addons" aria-selected="false">
					<span class="dashicons dashicons-admin-tools" aria-hidden="true"></span>
					<?php esc_html_e( 'Addons', 'unlimited-theme-addons' ); ?>
				</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="uta-support-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
					<span class="dashicons dashicons-sos" aria-hidden="true"></span>
					<?php esc_html_e( 'Support', 'unlimited-theme-addons' ); ?>
				</button>
			</li>
			<?php if ( false === Uta_helpers::is_uta_pro_installed() ) : ?>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="uta-premium-tab" data-bs-toggle="tab" data-bs-target="#premium" type="button" role="tab" aria-controls="premium" aria-selected="false">
						<span class="dashicons dashicons-star-filled" aria-hidden="true"></span>
						<?php esc_html_e( 'Try Pro with $29.79', 'unlimited-theme-addons' ); ?>
					</button>
				</li>
			<?php endif; ?>
		</ul>

		<div class="tab-content" id="utaAdminTabContent">
			<div class="tab-pane fade show active" id="widgets" role="tabpanel" aria-labelledby="uta-widgets-tab">
				<?php include_once UTA_PLUGIN_PATH . 'admin/template/widgets.php'; ?>
			</div>

			<div class="tab-pane fade" id="addons" role="tabpanel" aria-labelledby="uta-addons-tab">
				<?php include_once UTA_PLUGIN_PATH . 'admin/template/addons.php'; ?>
			</div>

			<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="uta-support-tab">
				<?php include_once UTA_PLUGIN_PATH . 'admin/template/support.php'; ?>
			</div>

			<div class="tab-pane fade" id="premium" role="tabpanel" aria-labelledby="uta-premium-tab">
				<?php include_once UTA_PLUGIN_PATH . 'admin/template/premium.php'; ?>
			</div>
		</div>
	</div>

	<div id="uta-admin-toast" class="uta-toast-area" aria-live="polite" aria-relevant="additions"></div>
</div>
