(function ($) {
    "use strict";
    // Save widget settigs.

    $('#saveWidget .uta-action-btn').on('click', function (e) {
        save_widget_settings(e);
    });

    $('#saveAddons .uta-action-btn').on('click', function (e) {
        save_addons_settings(e);
    });


    /**
     * Save Widgets.
     * @param {*} e 
     */
    var save_widget_settings = function (e) {
        e.preventDefault();
        $("#saveWidget .uta-action-btn").hide();
        $('#saveWidget .uta-action-btn-loading').show();

        // Get checkbox unchecked default value.
        var _base_serializeArray = $.fn.serializeArray;
        $.fn.serializeArray = function () {
            var a = _base_serializeArray.apply(this);
            $.each(this.find("input"), function (i, e) {
                if (e.type == "checkbox") {
                    e.checked
                        ? a[i].value = "on"
                        : a.splice(i, 0, { name: e.name, value: "off" })
                }
            });
            return a;
        }

        var getFormData = $("#saveWidget").serialize();

        $.ajax(
            {
                url: uta_admin_ajax_object.uta_admin_ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'uta_admin_widgets_save', widget_lists: getFormData,
                    _ajax_nonce: uta_admin_ajax_object.nonce,
                },
                success: function (data) {
                    console.log(data.data.message);
                    if (data.success == true) {

                        $('#saveWidget .uta-action-btn').show();
                        $('#saveWidget .uta-action-btn-loading').hide();
                    }
                },
                error: function (error) {
                    console.log(error);

                }
            }

        )
    }


    /**
     * Save Addons.
     * @param {*} e 
     */

    var save_addons_settings = function (e) {
        e.preventDefault();
        $("#saveAddons .uta-action-btn").hide();
        $('#saveAddons .uta-action-btn-loading').show();

        // Get checkbox unchecked default value.
        var _base_serializeArray = $.fn.serializeArray;
        $.fn.serializeArray = function () {
            var a = _base_serializeArray.apply(this);
            $.each(this.find("input"), function (i, e) {
                if (e.type == "checkbox") {
                    e.checked
                        ? a[i].value = "on"
                        : a.splice(i, 0, { name: e.name, value: "off" })
                }
            });
            return a;
        }

        var getFormData = $("#saveAddons").serialize();

        $.ajax(
            {
                url: uta_admin_ajax_object.uta_admin_ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'uta_admin_addons_save', addon_lists: getFormData,
                    _ajax_nonce: uta_admin_ajax_object.nonce,
                },
                success: function (data) {
                    console.log(data.data.message);
                    if (data.success == true) {

                        $('#saveAddons .uta-action-btn').show();
                        $('#saveAddons .uta-action-btn-loading').hide();
                    }
                },
                error: function (error) {
                    console.log(error);

                }
            }

        )
    }


})(jQuery);



