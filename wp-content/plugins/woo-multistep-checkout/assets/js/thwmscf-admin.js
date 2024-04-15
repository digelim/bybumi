var thwmscf_admin = (function($){
	$(function(){
		$( ".thpladmin-colorpick" ).each(function() {     	
			var value = $(this).val();
			$( this ).parent().find( '.thpladmin-colorpickpreview' ).css({ backgroundColor: value });
		});

	    $('.thpladmin-colorpick').iris({
			change: function( event, ui ) {
				$( this ).parent().find( '.thpladmin-colorpickpreview' ).css({ backgroundColor: ui.color.toString() });
			},
			hide: true,
			border: true
		}).click( function() {
			$('.iris-picker').hide();
			$(this ).closest('td').find('.iris-picker').show(); 
		});

		$('body').click( function() {
			$('.iris-picker').hide();
		});

		// $('.thpladmin-colorpick').click( function( event ) {
		$('.thpladmin-colorpick, .thwmscf-colorpreview').click( function( event ) { 
			event.stopPropagation();
		});

		var span_element = $('.thwmscf-colorpreview');
		span_element.on('click', function(){
			$(this).siblings('input').trigger('click');
		});
	});

	function back_to_cart(elm){
		var cart_text_settings = $('.back-to-cart-show');		
		if(elm.checked){
			cart_text_settings.show();;
		}else{
			cart_text_settings.hide();
		}
	}

	function display_login(elm){
		var host_class = $('[name="i_title_login"]').closest('td');
		if(elm.checked){
			remove_class_wmsc_blur(host_class);
		}else{
			add_class_wmsc_blur(host_class);
		}
	}

	function shippingTitle(elm) {
		var host_class = $('[name="i_title_shipping"]').closest('td');
		hide_field_using_wmsc_blur($(elm), host_class);
	}

	function orderreviewtitle(elm) {
		var host_class = $('[name="i_title_confirm_order"]').closest('td');
		if(elm.checked){
			remove_class_wmsc_blur(host_class);
		}else{
			add_class_wmsc_blur(host_class);
		}
	}

	function order_review_right(elm){
		var form = elm.closest('form');
		var host_class = $(form).find('#th-show-review-right');

		hide_field_using_wmsc_blur($(elm), host_class);
	}

	function hide_field_using_wmsc_blur(elm, host_class){
		if(elm.prop('checked') != true){
			remove_class_wmsc_blur(host_class)
		}else{
			add_class_wmsc_blur(host_class);
		}
	}

	function remove_class_wmsc_blur(host_class){
		host_class.removeClass('wmsc-blur');
	}

	function add_class_wmsc_blur(host_class){
		host_class.addClass('wmsc-blur');
	}

	function layout_change(elm){
		var layout = elm.value;
		var tab_position = $('.display-tab-position');
		if(layout == 'thwmscf_time_line_step'){   	
			var color = '#050505';
			var text_color_active = $('input[name="i_step_text_color_active"]');
			if(text_color_active.val() == '#ffffff'){
				text_color_active.parent().find( '.thpladmin-colorpickpreview' ).css({ backgroundColor: color });
				text_color_active.val(color);
			}
			tab_position.hide();
		}else if(layout == 'thwmscf_accordion_step'){
			render_default_text_color();
			tab_position.hide();
		}else{
			render_default_text_color();
			tab_position.show();
		}
	}

	function render_default_text_color() {
		var color = '#ffffff';
		var text_color_active = $('input[name="i_step_text_color_active"]');
		if(text_color_active.val() != '#ffffff'){
			text_color_active.parent().find( '.thpladmin-colorpickpreview' ).css({ backgroundColor: color });
			text_color_active.val(color);
		}
	}

	return {
		back_to_cart : back_to_cart,
		display_login : display_login,
		shippingTitle : shippingTitle,
		layout_change : layout_change,
		render_default_text_color : render_default_text_color,
		orderreviewtitle : orderreviewtitle,
		order_review_right : order_review_right,
	}
}(window.jQuery, window, document))

function thwmscfBackToCart(elm){
	thwmscf_admin.back_to_cart(elm);
}
function thwmscfDisplayLogin(elm){
	thwmscf_admin.display_login(elm);
}
function thwmscfShippingTitle(elm){
	thwmscf_admin.shippingTitle(elm);
}
function thwmscfOrderReview(elm){
	thwmscf_admin.orderreviewtitle(elm);
	thwmscf_admin.order_review_right(elm);
}
function thwmscLayoutChange(elm){
	thwmscf_admin.layout_change(elm);
}