<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * 
 */

defined( 'ABSPATH' ) || exit;
?>
<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
			<th class="product-total"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody><ul>
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

        if ( is_plugin_active( 'woo-multistep-checkout/woo-multistep-checkout.php' ) ) {
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $_product->get_id() ) );
                    ?>

                    <li class="flex py-2">
                        <div class="flex-shrink-0">

                        <?php

                        $thumbnail = '<img src="'.wp_get_attachment_url($_product->get_image_id()) .'" alt="Image" class="w-16 h-16 rounded-md object-center object-cover">';
                        printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.}

                        ?>
                        </div>

                        <div class="ml-4 flex-1 flex flex-col sm:ml-6">
                        <div>
                            <div class="flex justify-between">
                            <h4 class="text-sm">
                                <a href="<?php echo $product_permalink; ?>" class="font-medium text-gray-700 hover:text-gray-800"> <?php echo $_product->get_title(); ?><span class="ml-2 rounded-[4px] bg-gray-200 text-[10px] text-gray-600 py-1 px-2 tracking-wide"><?php echo $cart_item['quantity'];?></span></a>
                            </h4>
                            <p class="ml-4 text-sm font-medium text-gray-900"><?php
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                            ?></p>
                            </div>
                        </div> 

                        <div class="mt-4 flex-1 flex items-end justify-between">
                            <p class="flex items-center text-sm text-gray-700 space-x-2">
                            </p>
                            <?php
                                echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    'woocommerce_cart_item_remove_link',
                                    sprintf(
                                        '<div class="ml-4"><a href="%s" class="text-sm text-gray-700 hover:text-indigo-500"><span>Remove</span></a></div>',
                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                        esc_html__( 'Remove', 'woocommerce' ),
                                        esc_attr( $_product->get_id() ),
                                        esc_attr( $_product->get_sku() )
                                    ),
                                    $cart_item_key
                                );
                            ?>
                        </div>
                        </div>
                    </li>
                    <?php
                }
            }

        }

		?>
		
	</ul>
		<?php
		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th>Discount<span class="ml-2 rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 tracking-wide"><?php echo $code; ?></span></th>
				<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php
			
			$packages = WC()->shipping()->get_packages();
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
					'cart/checkout-shipping.php',
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
			}
			
			?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="order-total">
			<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			<td><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>
