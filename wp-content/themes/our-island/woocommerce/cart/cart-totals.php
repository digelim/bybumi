<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * 
 */

defined( 'ABSPATH' ) || exit;

?>

<section aria-labelledby="summary-heading" class="mt-10">
	<div>
		<dl class="space-y-4">
			<div class="flex items-center justify-between">
			<dt class="text-base font-medium text-gray-900">Subtotal</dt>
			<dd class="ml-4 text-base font-medium text-gray-900"><?php wc_cart_totals_subtotal_html(); ?></dd>
			</div>
		</dl>
		<p class="mt-1 text-sm text-gray-500">Shipping and taxes will be calculated at checkout.</p>
	</div>
	<div class="mt-10">
		<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="block text-center  w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">
			<?php esc_html_e( 'Checkout', 'woocommerce' ); ?>
		</a>
	</div>
</section>