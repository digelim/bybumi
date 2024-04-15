(function( $ ) {
	'use strict';
	
	var tabs_wrapper = $('#thwmscf_wrapper');
	var tabs = $('#thwmscf-tabs');
	var tab_panels = $('#thwmscf-tab-panels');
	var accordion_label = $('.thwmscf-accordion-label');
	var first_step = 0;
	var last_step = 0;
	
	var button_prev = $('#action-prev');
	var button_next = $('#action-next');

	var show_coupon_above_payment = thwmscf_script_var.coupon_form_above_payment;
	var active_step = 1;

	function initialize_thwmsc(){
		if(tabs_wrapper.length){
			var first_step_tab = tabs.find('li.thwmscf-tab a.first');
			first_step = first_step_tab.data('step');
			last_step = tabs.find('li.thwmscf-tab a.last').data('step');
			
			jump_to_step(first_step, first_step_tab);
		
			tabs.find('li.thwmscf-tab a').click(function(){
				var step_number = $(this).data('step');
				if(step_number < active_step){
					jump_to_step(step_number, $(this));	
				}
			});
			
			accordion_label.click(function(){
				var step_number = $(this).data('step');
				if(step_number < active_step){
					jump_to_step(step_number, $(this));
				}
			});

			button_prev.click(function(){
				$('.woocommerce-error').hide();
				var step_number = active_step-1;
				if(step_number >= first_step){
					jump_to_step(step_number, false);
					scroll_to_top();
				}
			});
			
			button_next.click(function(){
				var step_number = active_step+1;
				if(step_number <= last_step){
					if(thwmscf_script_var.enable_validation){
						validate_checkout_step(active_step, step_number);
					}else{
						jump_to_step(step_number, false);
						scroll_to_top();
					}
				}
			});
		}

		if(show_coupon_above_payment){
			$('.coupon-form').css("display", "none"); // Be sure coupon field is hidden
	        // Show or Hide coupon field
	        $('.checkout-coupon-toggle .show-coupon').on('click', function(e){
	            $('.coupon-form').toggle(200);
	            e.preventDefault();
	        })
	        // Copy the inputed coupon code to WooCommerce hidden default coupon field
	        $('.coupon-form input[name="coupon_code"]').on('input change', function(){
	            $('form.checkout_coupon input[name="coupon_code"]').val($(this).val());
	        });
	        // On button click, submit WooCommerce hidden default coupon form
	        $('.coupon-form button[name="apply_coupon"]').on('click', function(){
	            $('form.checkout_coupon').submit();
	        });
	        $(document.body).on('applied_coupon_in_checkout', function(){
	            $('.coupon-form').toggle(200);
				clear_coupon_value();
			});
		}

	}

	function validate_checkout_step(active_step, next_step){
		var valid = validate_step_fields(active_step);

		if(valid){
			tabs.find('#step-'+active_step).addClass('thwmscf-finished-step');

			jump_to_step(next_step, false);	
			scroll_to_top();
		}else{
			display_error_message();
			scrol_to_error();
		}		
	}

	function clear_coupon_value(){
		$('.woocommerce-checkout.woocommerce-page input[name="coupon_code"]').val('');
	}

	function scrol_to_error (){
		$('html, body').animate({scrollTop:($('#thwmscf_wrapper .woocommerce-error').offset().top-100)}, 1000);
	}

	function display_error_message(){
		var error_div = $('.woocommerce-error');
		var error_msg = thwmscf_script_var.validation_msg;
		var error = '<ul class="woocommerce-error" role="alert"><li>'+ error_msg +'</li></ul>';
			tab_panels.prepend( '<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout">' + error + '</div>' );
	}

	function validate_step_fields(active_step){

		clear_validation_error();
		var active_section = $('#thwmscf-tab-panel-'+active_step);

		if(active_section){
			var all_inputs = active_section.find(":input").not('.thwcfe-disabled-field, .woocommerce-validated,:hidden');
			var ship_to_different_address = $('input[name="ship_to_different_address"]');
			var is_account_field = $('#createaccount');

			var valid = true;
			$.each(all_inputs, function(field){
				
				var type = $(this).getType();
				var name = $(this).attr('name');

				if(type == 'checkbox' || type == 'select'){
					var formated_name = name.replace('[]','');
					var parent = $('#' + formated_name + '_field');

					// var parent = $(this).parent().parent();
				}else{
					// var parent = $(this).parent();
					var parent = $('#' + name + '_field');
				}

				var is_shipping_field = parent.parents('.shipping_address');
				if(is_shipping_field.length > 0 && ship_to_different_address.prop('checked') != true){
					return valid;
				}

				var is_disabled_section = parent.parents('.thwcfe-disabled-section');
				var is_required = '';
				if(!(is_disabled_section.length > 0)){
					is_required = parent.data('validations');
				}

				var account_required = true;
				if(is_account_field.length > 0){
					if((is_account_field.prop('checked') == false) && (name == 'account_username' || name == 'account_password')){
						account_required = false;
					}
				}
				
				if((parent.hasClass('validate-required') || is_required == 'validate-required') && account_required){
					var value = get_field_value(type, $(this), name);
					
					if(isEmpty(value)){
						valid = false;
					}else if(parent.hasClass('validate-email')){
						var valid_email = validate_email(value);
						if(!valid_email){
							valid = false;
						}
					}

				}
				
			});
		}

		return valid;
	}

	function isEmpty(str){ 
      return (!str || 0 === str.length); 
    }

	function validate_email(email){
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,})$/;

        if (reg.test(email) == false){
            return false;
        }
        return true;
	}

	//function getType(){
	$.fn.getType = function(){
		try{
			return this[0].tagName == "INPUT" ? this[0].type.toLowerCase() : this[0].tagName.toLowerCase(); 
		}catch(err) {
			return 'E001';
		}
	}

	function get_field_value(type, elm, name){
		var value = '';
		switch(type){
			case 'radio':
				value = $("input[type=radio][name='"+name+"']:checked").val();
				value = value ? value : '';
				break;
			case 'checkbox':
				if(elm.data('multiple') == 1){
					var valueArr = [];					
					$("input[type=checkbox][name='"+name+"']:checked").each(function(){
					   valueArr.push($(this).val());					   
					});
					value = valueArr;
					if ($.isEmptyObject(value)){										
						value = "";					 	
					}
				}else{
					value = $("input[type=checkbox][name='"+name+"']:checked").val();
					value = value ? value : '';
				}
				break;
			case 'select':
				value = elm.val();
				break;
			case 'multiselect':
				value = elm.val(); 				
				break;
			default:
				value = elm.val();
				break;
		}
		return value;
	}

	function clear_validation_error(){
		$( '.thwmscf-wrapper .woocommerce-NoticeGroup-checkout, .thwmscf-wrapper .woocommerce-error, .thwmscf-wrapper .woocommerce-message, .woocommerce .woocommerce-error' ).remove();
	}
	
	function jump_to_step(step_number, step){
		if(!step){
			step = tabs.find('#step-'+step_number);
		}
		
		tabs.find('li a').removeClass('active');
		var active_tab_panel = tab_panels.find('#thwmscf-tab-panel-'+step_number);
		
		if(!step.hasClass("active")){
			step.addClass("active");
		}
		
		tab_panels.find('div.thwmscf-tab-panel').not('#thwmscf-tab-panel-'+step_number).hide();
		active_tab_panel.show();

		/*** Accordion Tab Function Start ***/
		var step_label = tab_panels.find('#thwmscf-accordion-label-'+step_number);
		
		tab_panels.find('.thwmscf-accordion-label').removeClass('active');

		if(!step_label.hasClass("active")){
			step_label.addClass("active");
		}

		/*** Accordion Tab Function End ***/

		active_step = step_number;
		
		button_prev.prop('disabled', false);
		button_next.prop('disabled', false);

		button_prev.removeClass('thwmscf-first-prev');
		button_next.removeClass('thwmscf-last-next');
		
		if(active_step == first_step){
			button_prev.prop('disabled', true);
			button_prev.addClass('thwmscf-first-prev');
		}
		if(active_step == last_step){
			button_next.prop('disabled', true);
			button_next.addClass('thwmscf-last-next');
		}
	}
	
	function scroll_to_top(){
		$('html, body').animate({
			scrollTop: tabs_wrapper.offset().top-100
		},800);	
	}
	
	/*----- INIT -----*/
	initialize_thwmsc();

})( jQuery );

