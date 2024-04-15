<?php

/**
 * Register the JavaScript for the public-facing side of the site.
 *
 * @since    1.0.0
 */
function aafw_autocomplete()
{
    $aafw_billing_autocomplete = get_option( 'aafw_billing_autocomplete', '' );
    $aafw_shipping_autocomplete = get_option( 'aafw_shipping_autocomplete', '' );
    $aafw_pickup_autocomplete = get_option( 'aafw_pickup_autocomplete', '' );
    $aafw_google_api_key = get_option( 'aafw_google_api_key', '' );
    $aafw_initial_map = get_option( 'aafw_initial_map', '' );
    return ( '' !== $aafw_google_api_key && ('1' === $aafw_initial_map || '1' === $aafw_billing_autocomplete || '1' === $aafw_shipping_autocomplete || '1' === $aafw_pickup_autocomplete) ? true : false );
}

/**
 * Premium feature.
 *
 * @since 1.0.0
 * @param string $value text.
 * @return html
 */
function aafw_premium_feature( $value )
{
    $result = $value;
    if ( aafw_is_free() ) {
        $result = '<div class="aafw_premium_feature">
						<a class="aafw_star_button" href="#"><svg style="color:#ffc106" width=20 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" class=" lddfw_premium_iconsvg-inline--fa fa-star fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"> <title>' . esc_attr__( 'Premium Feature', 'aafw' ) . '</title><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg></a>
					  	<div class="aafw_premium_feature_note" style="display:none">
						  <a href="#" class="aafw_premium_close">
						  <svg aria-hidden="true"  width=10 focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg></a>
						  <h2>' . esc_html( __( 'Premium Feature', 'aafw' ) ) . '</h2>
						  <p>' . esc_html( __( 'You Discovered a Premium Feature!', 'aafw' ) ) . '</p>
						  <p>' . esc_html( __( 'Upgrading to Premium will unlock it.', 'aafw' ) ) . '</p>
						  <a target="_blank" href="https://powerfulwp.com/autocomplete-address-and-location-picker-for-woocommerce-premium#pricing" class="aafw_premium_buynow">' . esc_html( __( 'UNLOCK PREMIUM', 'aafw' ) ) . '</a>
						  </div>
					  </div>';
    }
    return $result;
}

/**
 * Check for free version
 *
 * @since 1.1.2
 * @return boolean
 */
function aafw_is_free()
{
    
    if ( aafw_fs()->is__premium_only() && aafw_fs()->can_use_premium_code() ) {
        return false;
    } else {
        return true;
    }

}

/**
 * Admin plugin bar.
 *
 * @since 1.1.0
 * @return html
 */
function aafw_admin_plugin_bar()
{
    return '<div class="aafw_admin_bar">' . esc_html( __( 'Developed by', 'aafw' ) ) . ' <a href="https://powerfulwp.com/" target="_blank">PowerfulWP</a> | <a href="https://powerfulwp.com/autocomplete-address-and-location-picker-for-woocommerce-premium" target="_blank" >' . esc_html( __( 'Premium', 'aafw' ) ) . '</a> | <a href="https://powerfulwp.com/docs/autocomplete-address-and-location-picker-for-woocommerce-premium/" target="_blank" >' . esc_html( __( 'Documents', 'aafw' ) ) . '</a></div>';
}
