<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

$thwmscf_settings = get_option('THWMSC_SETTINGS');
$coupon_form_above_payment = isset($thwmscf_settings['coupon_form_above_payment']) ? $thwmscf_settings['coupon_form_above_payment'] : false;

if ($coupon_form_above_payment) {
    do_action('thwmscf_woocommerce_before_checkout_form');
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<?php 
	$thwmscf_settings = get_option('THWMSC_SETTINGS');

	$enable_login_step = isset($thwmscf_settings['enable_login_step']) ? $thwmscf_settings['enable_login_step'] : false;
	$thwmscf_tab_align = !empty($thwmscf_settings['tab_align']) ? $thwmscf_settings['tab_align'] : '';
	$thwmscf_title_login = !empty($thwmscf_settings['title_login']) ? wptexturize($thwmscf_settings['title_login']) : "Login";
	$thwmscf_title_billing = !empty($thwmscf_settings['title_billing']) ? wptexturize($thwmscf_settings['title_billing']) : "Billing details";
	$thwmscf_title_shipping = !empty($thwmscf_settings['title_shipping']) ? wptexturize($thwmscf_settings['title_shipping']) : "Shipping details";
	$thwmscf_title_order_review = !empty($thwmscf_settings['title_order_review']) ? wptexturize($thwmscf_settings['title_order_review']) : "Order review";
	$thwmscf_title_confirm_order = !empty($thwmscf_settings['title_confirm_order']) ? wptexturize($thwmscf_settings['title_confirm_order']) : "Payment";
	$button_prev_text = !empty($thwmscf_settings['button_prev_text']) ? wptexturize($thwmscf_settings['button_prev_text']) : "Previous";
	$button_next_text = !empty($thwmscf_settings['button_next_text']) ? wptexturize($thwmscf_settings['button_next_text']) : "Next";
	$thwmscf_layout = isset($thwmscf_settings['thwmscf_layout']) && $thwmscf_settings['thwmscf_layout'] ? wptexturize($thwmscf_settings['thwmscf_layout']) : 'thwmscf_horizontal_box';

	$back_to_cart_button = isset($thwmscf_settings['back_to_cart_button']) && $thwmscf_settings['back_to_cart_button'] ? wptexturize($thwmscf_settings['back_to_cart_button']) : '';
	$back_to_cart_button_text = isset($thwmscf_settings['back_to_cart_button_text']) && $thwmscf_settings['back_to_cart_button_text'] ? wptexturize($thwmscf_settings['back_to_cart_button_text']) : 'Back to cart';

	$coupon_form_above_payment = isset($thwmscf_settings['coupon_form_above_payment']) ? $thwmscf_settings['coupon_form_above_payment'] : false;
	$billing_shipping_together = isset($thwmscf_settings['make_billing_shipping_together']) ? $thwmscf_settings['make_billing_shipping_together'] : false;
	$order_review_separate = isset($thwmscf_settings['make_order_review_separate']) ? $thwmscf_settings['make_order_review_separate'] : false;
	$order_review_right = !$order_review_separate && isset($thwmscf_settings['show_order_review_right']) && $thwmscf_settings['show_order_review_right'] == 'yes' ? true : false;

	if (empty($back_to_cart_button_text)) {
		$back_to_cart_button_text = 'Back to cart';
	}
?>

<!----------------------------------------------- Display Multistep Checkout tabs ---------------------------------------------------------------->

<div id="thwmscf_wrapper" class="thwmscf-wrapper <?php echo esc_attr($thwmscf_layout); ?>">  
	<ul id="thwmscf-tabs" class="thwmscf-tabs <?php echo esc_attr($thwmscf_tab_align); ?>">	
		<?php 
		$step_number = 1;
		$step1_class = 'first active';
		$enable_login_reminder = false;	

		if ($enable_login_step && !is_user_logged_in() && 'yes' === get_option( 'woocommerce_enable_checkout_login_reminder')) {
			$enable_login_reminder = true;
			$step1_class = '';	
		?>
			<li class="thwmscf-tab">
            	<a href="javascript:void(0)" id="step-0" data-step="0" class="first active">
            		<?php if ($thwmscf_layout == 'thwmscf_time_line_step') { ?>
            			<span class="thwmscf-tab-label">
	            			<span class="thwmscf-index thwmscf-tab-icon">0</span>
	            			<?php echo wp_kses_post(__($thwmscf_title_login, 'woo-multistep-checkout')); ?>
	            		</span>
            		<?php } else {
            			echo wp_kses_post(__($thwmscf_title_login, 'woo-multistep-checkout'));
            		} ?>
            	</a>
            </li>
		<?php } 
		
		if ($billing_shipping_together && $order_review_right) {
        	$last_class = ' last';
        }
        $last_class = isset($last_class) ? $last_class : '';
        ?>	
		<li class="thwmscf-tab">
        	<a href="javascript:void(0)" id="step-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="<?php echo $step1_class; echo $last_class;?>">
        		<?php if ($thwmscf_layout == 'thwmscf_time_line_step') { ?>
        			<span class="thwmscf-tab-label">
    					<span class="thwmscf-index thwmscf-tab-icon"><?php echo $step_number; ?></span>
    					<?php echo wp_kses_post(__($thwmscf_title_billing, 'woo-multistep-checkout')); ?>
    				</span>
    			<?php } else { 
    				echo wp_kses_post(__($thwmscf_title_billing, 'woo-multistep-checkout')); 
    			} ?>
        	</a>
        </li>
        <?php $step_number++; ?>

        <?php if (!$billing_shipping_together) { 

        	if ($order_review_right) {
        		$last_class = 'last';
        	}
			
        	$last_class = isset($last_class) ? $last_class : '';
        	?>
			<li class="thwmscf-tab">
	        	<a href="javascript:void(0)" id="step-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="<?php echo $last_class ?>">
	        		<?php if ($thwmscf_layout == 'thwmscf_time_line_step') { ?>
	        			<span class="thwmscf-tab-label">
	        				<span class="thwmscf-index thwmscf-tab-icon"><?php echo $step_number; ?></span>
	        				<?php echo wp_kses_post(__($thwmscf_title_shipping, 'woo-multistep-checkout')); ?>
	        			</span>
	        		<?php } else {
	        			echo wp_kses_post(__($thwmscf_title_shipping, 'woo-multistep-checkout')); 
	        		} ?>
	        	</a>
	        </li>
    	<?php $step_number++; } ?>

    	<?php if (!$order_review_separate && !$order_review_right) { ?>
			<li class="thwmscf-tab">
	        	<a href="javascript:void(0)" id="step-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="last">
	        		<?php if ($thwmscf_layout == 'thwmscf_time_line_step') { ?>
	        			<span class="thwmscf-tab-label">
	        				<span class="thwmscf-index thwmscf-tab-icon"><?php echo $step_number; ?></span>
	        				<?php echo wp_kses_post(__($thwmscf_title_order_review, 'woo-multistep-checkout')); ?>
	        			</span>
	        		<?php } else {
	        			echo wp_kses_post(__($thwmscf_title_order_review, 'woo-multistep-checkout')); 
	        		} ?>
	        	</a>
	        </li>	
    	<?php } ?>

    	<?php if ($order_review_separate) { ?>
    		<li class="thwmscf-tab">
	        	<a href="javascript:void(0)" id="step-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>">
	        		<?php if ($thwmscf_layout == 'thwmscf_time_line_step') { ?>
	        			<span class="thwmscf-tab-label">
	        				<span class="thwmscf-index thwmscf-tab-icon"><?php echo $step_number; ?></span>
	        				<?php echo wp_kses_post(__($thwmscf_title_order_review, 'woo-multistep-checkout')); ?>
	        			</span>
	        		<?php } else {
	        			echo wp_kses_post(__($thwmscf_title_order_review, 'woo-multistep-checkout')); 
	        		} ?>
	        	</a>
	        </li>	

	        <?php $step_number++; ?>

	        <li class="thwmscf-tab">
	        	<a href="javascript:void(0)" id="step-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="last">
	        		<?php if ($thwmscf_layout == 'thwmscf_time_line_step') { ?>
	        			<span class="thwmscf-tab-label">
	        				<span class="thwmscf-index thwmscf-tab-icon"><?php echo $step_number; ?></span>
	        				<?php echo wp_kses_post(__($thwmscf_title_confirm_order, 'woo-multistep-checkout')); ?>
	        			</span>
	        		<?php } else {
	        			echo wp_kses_post(__($thwmscf_title_confirm_order, 'woo-multistep-checkout')); 
	        		} ?>
	        	</a>
	        </li>	
    	<?php } ?>
	</ul>

	<div id="thwmscf-tab-panels" class="thwmscf-tab-panels">
		<?php 
		if ($enable_login_reminder) {
			?>
			<div class="thwmscf-content">
				<a href="javascript:void(0)" id="thwmscf-accordion-label-0" data-step="0" class="thwmscf-accordion-label first active">
					<span class="thwmscf-tab-label first active" id="" data-step="0">
						<?php echo wp_kses_post(__($thwmscf_title_login, 'woo-multistep-checkout')); ?>
					</span>
				</a>
				<div class="thwmscf-tab-panel" id="thwmscf-tab-panel-0">
					<?php do_action( 'thwmscf_before_checkout_form' ); ?>
				</div>
			</div>
			<?php 
		} 
		?>

		<!------------------------------------------------- Display multistep checkout form ------------------------------------------------------->

		<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

			<?php if ( $checkout->get_checkout_fields() ) : ?>
				<?php $step_number = 1;// do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<!--<div class="col2-set" id="customer_details">-->
					<div class="thwmscf-content">
						<a href="javascript:void(0)" id="thwmscf-accordion-label-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="thwmscf-accordion-label <?php echo $step1_class; ?>">
							<span class="thwmscf-tab-label <?php echo $step1_class; ?>" id="" data-step="<?php echo $step_number; ?>">
								<?php echo wp_kses_post(__($thwmscf_title_billing, 'woo-multistep-checkout')); ?>
							</span>
						</a>

						<div class="thwmscf-tab-panel" id="thwmscf-tab-panel-<?php echo $step_number; ?>">
							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
							<div class="thwscf-billing">
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
							</div>

							<?php if ($billing_shipping_together) { ?>

								<div class="thwscf-shipping">
									<?php do_action( 'woocommerce_checkout_shipping' ); ?>
								</div>
								<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
							<?php } ?>

						</div>
					</div>

					<?php $step_number++; ?>

					<!-------------------- If Billing and shipping not together display billing and shipping form separately ---------------------->

					<?php if (!$billing_shipping_together) { ?>

						<div class="thwmscf-content">
							<a href="javascript:void(0)" id="thwmscf-accordion-label-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="thwmscf-accordion-label">
								<span class="thwmscf-tab-label" id="" data-step="<?php echo $step_number; ?>">					
									<?php echo wp_kses_post(__($thwmscf_title_shipping, 'woo-multistep-checkout')); ?>
								</span>
							</a>
							<div class="thwmscf-tab-panel" id="thwmscf-tab-panel-<?php echo $step_number; ?>">
								<div class="thwscf-shipping">
									<?php do_action( 'woocommerce_checkout_shipping' ); ?>
									<h3 class="font-bold text-md mt-[30px]">Shipping method</h3>
									<?php $packages = WC()->shipping()->get_packages();
									$first    = true;

									foreach ( $packages as $i => $package ) {
										$chosen_method = isset( WC()->session->chosen_shipping_methods[ $i ] ) ? WC()->session->chosen_shipping_methods[ $i ] : '';
										$product_names = array();

										if ( count( $packages ) > 1 ) {
											foreach ( $package['contents'] as $item_id => $values ) {
												$product_names[ $item_id ] = $values['data']->get_name() . ' &times;' . $values['quantity'];
											}
											$product_names = apply_filters( 'woocommerce_shipping_package_details_array', $product_names, $package );
										}

										wc_get_template(
											'cart/cart-shipping.php',
											array(
												'package'                  => $package,
												'available_methods'        => $package['rates'],
												'show_package_details'     => count( $packages ) > 1,
												'show_shipping_calculator' => is_cart() && apply_filters( 'woocommerce_shipping_show_shipping_calculator', $first, $i, $package ),
												'package_details'          => implode( ', ', $product_names ),
												/* translators: %d: shipping package number */
												'package_name'             => apply_filters( 'woocommerce_shipping_package_name', ( ( $i + 1 ) > 1 ) ? sprintf( _x( 'Shipping %d', 'shipping packages', 'woocommerce' ), ( $i + 1 ) ) : _x( 'Shipping', 'shipping packages', 'woocommerce' ), $i, $package ),
												'index'                    => $i,
												'chosen_method'            => $chosen_method,
												'formatted_destination'    => WC()->countries->get_formatted_address( $package['destination'], ', ' ),
												'has_calculated_shipping'  => WC()->customer->has_calculated_shipping(),
											)
										);

										$first = false;
									} ?>
								</div>

								<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
							</div>
						</div>
						<?php $step_number++; ?>
					<?php } ?>
				<!--</div>-->

				<?php // do_action( 'woocommerce_checkout_after_customer_details' ); ?>
			<?php endif; ?>

			<!------------------------ If Order review separate and order review on right not enabled then display default form ------------------->

			<?php if (!$order_review_separate && !$order_review_right) { ?>

				<div class="thwmscf-content">
					<a href="javascript:void(0)" id="thwmscf-accordion-label-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="thwmscf-accordion-label last">
						<span class="thwmscf-tab-label" id="" data-step="<?php echo $step_number; ?>">					
							<?php echo wp_kses_post(__($thwmscf_title_order_review, 'woo-multistep-checkout')); ?>
						</span>
					</a>
					<div class="thwmscf-tab-panel" id="thwmscf-tab-panel-<?php echo $step_number; ?>">
						<h3 id="order_review_heading"><?php _e( 'Order review', 'woocommerce' ); ?></h3>
						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
						<?php do_action( 'thwmscf_woocommerce_checkout_review_order' ); ?>
                        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

						<?php 
                            if ( $coupon_form_above_payment == 'yes') {
                                do_action('thwmscf_woocommerce_review_order_before_payment');
                            }
                        ?>
						<?php remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 ); ?>
						<?php do_action( 'woocommerce_checkout_order_review' ); ?>		
						

						<!-- <div id="order_review" class="woocommerce-checkout-review-order">
							<?php  //do_action( 'woocommerce_checkout_order_review' ); ?>
						</div> -->

						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

					</div>
				</div>
			<?php } ?>

			<!---------------------------------------------If Order review separate --------------------------------------------------------------->

			<?php if ($order_review_separate && !$order_review_right) { ?>

				<div class="thwmscf-content">
					<a href="javascript:void(0)" id="thwmscf-accordion-label-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="thwmscf-accordion-label">
						<span class="thwmscf-tab-label" id="" data-step="<?php echo $step_number; ?>">					
							<?php echo wp_kses_post(__($thwmscf_title_order_review, 'woo-multistep-checkout')); ?>
						</span>
					</a>
					<div class="thwmscf-tab-panel" id="thwmscf-tab-panel-<?php echo $step_number; ?>">
						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
						<?php do_action( 'thwmscf_woocommerce_checkout_review_order' ); ?>
						<?php //do_action( 'woocommerce_checkout_after_order_review' ); ?>
					</div>
				</div>

				<?php $step_number++; ?>

				<div class="thwmscf-content">
					<a href="javascript:void(0)" id="thwmscf-accordion-label-<?php echo $step_number; ?>" data-step="<?php echo $step_number; ?>" class="thwmscf-accordion-label last">
						<span class="thwmscf-tab-label" id="" data-step="<?php echo $step_number; ?>">					
							<?php echo wp_kses_post(__($thwmscf_title_confirm_order, 'woo-multistep-checkout')); ?>
						</span>
					</a>
					<div class="thwmscf-tab-panel" id="thwmscf-tab-panel-<?php echo $step_number; ?>">
						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

						<?php 
                            if ( $coupon_form_above_payment == 'yes') {
                                do_action('thwmscf_woocommerce_review_order_before_payment');
                            }
                        ?>
						<?php remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 ); ?>
						<?php do_action( 'woocommerce_checkout_order_review' ); ?>
						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
					</div>
				</div>
			<?php } ?>
			<?php 
				if (!$order_review_separate && $order_review_right) {
					// apply_filters('thwmscf_steps_front_end',$thwmscf_settings);
					do_action('thwmscf_multi_step_tab_panels');
				}
			?>

		</form>
	</div>
	<div class="thwmscf-buttons">
		<input type="button" id="action-prev" class="button-prev" value="<?php echo esc_attr(__( $button_prev_text, 'woo-multistep-checkout' )); ?>">
		<input type="button" id="action-next" class="button-next" value="<?php echo esc_attr(__( $button_next_text, 'woo-multistep-checkout' )); ?>">
		<?php 
		if ($back_to_cart_button == 'yes') {
			?>
			<a class="button thwmscf-cart-url" href="<?php echo esc_url(wc_get_cart_url()); ?>"><?php echo wp_kses_post(__( $back_to_cart_button_text, 'woo-multistep-checkout' )); ?></a>
			<?php
		} ?>
	</div>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

