<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * 
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo $wrap_before;

	foreach ( $breadcrumb as $key => $crumb ) {

		$className = 'text-gray-900';

		if (sizeof( $breadcrumb ) == $key+2) {
			$className = 'text-gray-500';
		}


		echo $before;

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<a class="mr-2 text-sm font-medium '. $className .' " href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		} 

		echo $after;

		if ( sizeof( $breadcrumb ) > $key+2) {
			echo '<svg class="mr-2" width="16" height="20" viewBox="0 0 16 20" fill="rgb(209 213 219)" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-5 w-4 text-gray-300">
			<path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z"></path>
		  </svg>';
		}
	}

	echo $wrap_after;

}
