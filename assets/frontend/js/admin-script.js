(function ($) {
    "use strict";
    // Save widget settigs.
    $('.uta-action-btn').on('click', function (e) {
        e.preventDefault();
        $(this).hide();
        $('.uta-action-btn-loading').show();

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
        
        var getFormData = $("#formData").serialize();

        $.ajax(
            {
                url: uta_admin_ajax_object.uta_admin_ajax_url,
                type: 'post',
                dataType: 'json',
                data: {
                    action: 'uta_admin_ajax', widget_lists: getFormData,
                    _ajax_nonce: uta_admin_ajax_object.nonce,
                },
                success: function (data) {
                    console.log(data.data.message);
                    if (data.success == true) {

                        $('.uta-action-btn').show();
                        $('.uta-action-btn-loading').hide();
                    }
                },
                error: function (error) {
                    console.log(error);

                }
            }
        )


    });


})(jQuery);



