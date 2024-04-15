(function($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */
    $(function() {

        if ($(".aafw_chosen_select").length) {
            $('.aafw_chosen_select').chosen();
        }

        $(document).ready(function() {
            $("body").on("click", ".aafw_premium_close", function() {
                $(this).parent().hide();
                return false;
            });
            $("body").on("click", ".aafw_star_button", function() {
                if ($(this).next().is(":visible")) {
                    $(this).next().hide();
                } else {
                    $(".aafw_premium_feature_note").hide();
                    $(this).next().show();
                }
                return false;
            });


            $("body").on("click", "#aafw_review_notice .notice-dismiss", function() {
                aafw_review_action('dismiss');
            });
            $("body").on("click", "#aafw_review_notice .aafw_action", function() {
                var aafw_value = $(this).attr("data");
                var $aafw_el = $("#aafw_review_notice");
                aafw_review_action(aafw_value);
                $aafw_el.fadeTo(100, 0, function() {
                    $aafw_el.slideUp(100, function() {
                        $aafw_el.remove();
                    });
                });
                if (aafw_value == 'ok-rate') {
                    return true;
                } else {
                    return false;
                }
            });



        });
    });

    function aafw_review_action(aafw_value) {
        jQuery.post(
            aafw_ajax.ajaxurl, {
                action: 'aafw_ajax',
                aafw_service: 'aafw_review_action',
                aafw_value: aafw_value,
                aafw_wpnonce: aafw_nonce.nonce,
            }
        );
    }
})(jQuery);