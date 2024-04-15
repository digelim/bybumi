<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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

<div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-0">
<h1 class="text-3xl font-extrabold text-center tracking-tight text-gray-900 sm:text-4xl">Cart</h1>
<form class="mt-12" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart' ); ?>
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

			<?php do_action( 'woocommerce_before_cart_contents' ); ?>
			<ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ) );
					?>

					<li class="flex py-6">
						<div class="flex-shrink-0">

						<?php

						$thumbnail = '<img src="'. $image[0] .'" alt="Front of sienna cotton t-shirt." class="w-24 h-24 rounded-md object-center object-cover sm:w-32 sm:h-32">';
						printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.}

						?>
						</div>

						<div class="ml-4 flex-1 flex flex-col sm:ml-6">
							<div>
								<div class="flex justify-between">
								<h4 class="text-sm">
									<a href="<?php echo $product_permalink; ?>" class="font-medium text-gray-900 hover:text-gray-800"> <?php echo $_product->get_title(); ?></a>
								</h4>
								<p class="ml-4 text-sm font-medium text-gray-900"><?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.

								?></p>
								</div>
								<p class="mt-1 text-sm text-gray-500">

								<?php
								
								$variation = $_product;
								$attributes = $variation->get_attributes();

								if( $_product->has_child() ) { 
									$variation_names = array();
						
									if( $attributes ) {
										foreach ( $attributes as $key => $value) {
											$key_name = end(explode('-', $key));
											$variation_key =  $key_name;
											$variation_names[] = ucfirst( $variation_key ) .' : '. $value;
										}
									}
									echo implode( '<br>', $variation_names );
								}

								?>

								</p>
							</div>

							<div class="flex justify-between items-center mt-5">
								<div>

								<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<div ><a href="%s" class="text-sm font-medium text-indigo-600 hover:text-indigo-500"><span>Remove</span></a></div>',
											esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
											esc_html__( 'Remove', 'woocommerce' ),
											esc_attr( $product_id ),
											esc_attr( $_product->get_sku() )
										),
										$cart_item_key
									);
								?>
								</div>
								<div>
								<?php

								if ( $_product->is_sold_individually() ) {
									$min_quantity = 1;
									$max_quantity = 1;
								} else {
									$min_quantity = 0;
									$max_quantity = $_product->get_max_purchase_quantity();
								}

								$product_quantity = woocommerce_quantity_input(
									array(
										'input_name'   => "cart[{$cart_item_key}][qty]",
										'input_value'  => $cart_item['quantity'],
										'max_value'    => $max_quantity,
										'min_value'    => $min_quantity,
										'product_name' => $_product->get_name(),
									),
									$_product,
									false
								);

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
								
								?>
								</div>
							</div>

					</li>



					<?php
				}
			}
			?>

		</ul>
			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		
	<?php do_action( 'woocommerce_after_cart_table' ); ?>

	<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
</div>


