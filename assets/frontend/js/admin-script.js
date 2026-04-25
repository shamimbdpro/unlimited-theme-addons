(function ($) {
	'use strict';

	/**
	 * Serialize widget/addon forms: every checkbox sends on or off (matches PHP parse_str).
	 *
	 * @param {jQuery} $form
	 * @return {string}
	 */
	function utaSerializeCheckboxForm($form) {
		var parts = [];
		$form.find('input[type="checkbox"]').each(function () {
			var el = this;
			if (!el.name) {
				return;
			}
			parts.push(
				encodeURIComponent(el.name) +
					'=' +
					encodeURIComponent(el.checked ? 'on' : 'off')
			);
		});
		return parts.join('&');
	}

	function utaToastMessage(message, type) {
		type = type || 'success';
		var $area = $('#uta-admin-toast');
		if (!$area.length) {
			return;
		}
		var $note = $('<div/>', {
			class: 'uta-toast uta-toast--' + type,
			role: 'status',
		}).text(message);
		$area.append($note);
		$note.hide().fadeIn(200);
		window.setTimeout(function () {
			$note.fadeOut(400, function () {
				$(this).remove();
			});
		}, 4500);
	}

	function utaGetStrings() {
		var o = window.uta_admin_ajax_object || {};
		return o.i18n || {};
	}

	function utaFinishSave($form, ok, message) {
		$form.find('.uta-action-btn').show();
		$form.find('.uta-action-btn-loading').hide();
		var str = utaGetStrings();
		if (ok) {
			utaToastMessage(message || str.saveSuccess || 'Saved.', 'success');
		} else {
			utaToastMessage(message || str.saveError || 'Error.', 'error');
		}
	}

	$('#saveWidget .uta-action-btn').on('click', function (e) {
		e.preventDefault();
		var $form = $('#saveWidget');
		$form.find('.uta-action-btn').hide();
		$form.find('.uta-action-btn-loading').show();

		$.ajax({
			url: uta_admin_ajax_object.uta_admin_ajax_url,
			type: 'post',
			dataType: 'json',
			data: {
				action: 'uta_admin_widgets_save',
				widget_lists: utaSerializeCheckboxForm($form),
				_ajax_nonce: uta_admin_ajax_object.nonce,
			},
		})
			.done(function (data) {
				if (data && data.success) {
					utaFinishSave($form, true);
				} else {
					utaFinishSave($form, false);
				}
			})
			.fail(function () {
				utaFinishSave($form, false);
			});
	});

	$('#saveAddons .uta-action-btn').on('click', function (e) {
		e.preventDefault();
		var $form = $('#saveAddons');
		$form.find('.uta-action-btn').hide();
		$form.find('.uta-action-btn-loading').show();

		$.ajax({
			url: uta_admin_ajax_object.uta_admin_ajax_url,
			type: 'post',
			dataType: 'json',
			data: {
				action: 'uta_admin_addons_save',
				addon_lists: utaSerializeCheckboxForm($form),
				_ajax_nonce: uta_admin_ajax_object.nonce,
			},
		})
			.done(function (data) {
				if (data && data.success) {
					utaFinishSave($form, true);
				} else {
					utaFinishSave($form, false);
				}
			})
			.fail(function () {
				utaFinishSave($form, false);
			});
	});
})(jQuery);
