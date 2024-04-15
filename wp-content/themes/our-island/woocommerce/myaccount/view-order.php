<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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

<div class="woocommerce-order">

    <?php
    if ( $order ) :

        do_action( 'woocommerce_before_thankyou', $order->get_id() );
        ?>

        <?php if ( $order->has_status( 'failed' ) ) : ?>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
                <?php endif; ?>
            </p>

        <?php else : ?>




<main class="bg-white px-4 pt-16 pb-24 sm:px-6 sm:pt-24 lg:px-8 lg:py-32">
  <div class="max-w-3xl mx-auto">
    <div class="max-w-xl">
      <h1 class="text-sm font-semibold uppercase tracking-wide text-indigo-600">Thank you!</h1>
      <p class="mt-2 text-4xl font-extrabold tracking-tight sm:text-5xl">It's on the way!</p>
      <p class="mt-2 text-base text-gray-500">Your order #<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong> has been placed and will be with you soon.</p>

      <dl class="mt-12 text-sm font-medium">
        <dt class="text-gray-900">Date</dt>
        <dd class="text-indigo-600 mt-2"><?php echo wc_format_datetime( $order->get_date_created() );
?></dd>
      </dl>
    </div>

    <section aria-labelledby="order-heading" class="mt-10 border-t border-gray-200">
      <h2 id="order-heading" class="sr-only">Your order</h2>

      <h3 class="sr-only">Items</h3>

<?php

foreach ( $order->get_items() as $cart_item_key => $cart_item ) {


    $product_id = $cart_item->get_product_id();
    $_product = wc_get_product( $product_id );

    if ( $_product && $_product->exists() ) {
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
                    <a href="#" class="font-medium text-gray-700 hover:text-gray-800"> <?php echo $_product->get_title(); ?></a>
                </h4>
                </div>
                <p class="mt-1 text-sm text-gray-500">Sienna</p>
                <p class="mt-1 text-sm text-gray-500">Large</p>
            </div>

            <div class="mt-4 flex-1 flex items-end">
                <div class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                <div><span class="font-medium text-gray-900">Quantity</span>: <span class="ml-2 text-gray-700"><?php echo $cart_item->get_quantity(); ?></span></div>
                <div><span class="font-medium text-gray-900 pl-4 sm:pl-6">Price</span>: <span class="ml-2 text-gray-700"><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.?></span></div>
                </div>
            </div>
            </div>
        </li>



        <?php
    }
}

?>

      <div class="sm:ml-40 sm:pl-6">
        <h3 class="sr-only">Your information</h3>

        <h4 class="sr-only">Addresses</h4>
        <dl class="grid grid-cols-2 gap-x-6 text-sm py-10">
          <div>
            <dt class="font-medium text-gray-900">Shipping address</dt>
            <dd class="mt-2 text-gray-700">
              <address class="not-italic">
                <span class="block"><?php echo $order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name();?></span>
                <span class="block"><?php echo $order->get_shipping_address_1();?></span>
                <span class="block"><?php echo $order->get_shipping_city();?>, <?php echo $order->get_shipping_state();?> <?php echo $order->get_shipping_postcode();?></span>
              </address>
            </dd>
          </div>
          <div>
            <dt class="font-medium text-gray-900">Billing address</dt>
            <dd class="mt-2 text-gray-700">
              <address class="not-italic">
                <span class="block"><?php echo $order->get_billing_first_name() . ' ' . $order->get_billing_last_name();?></span>
                <span class="block"><?php echo $order->get_billing_address_1();?></span>
                <span class="block"><?php echo $order->get_billing_city();?>, <?php echo $order->get_billing_state();?> <?php echo $order->get_billing_postcode();?></span>
              </address>
            </dd>
          </div>
        </dl>

        <h4 class="sr-only">Payment</h4>
        <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 text-sm py-10">
          <div>
            <dt class="font-medium text-gray-900">Payment method</dt>
            <dd class="mt-2 text-gray-700">
              <p><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></p>
            </dd>
          </div>
          <div>
            <dt class="font-medium text-gray-900">Shipping method</dt>
            <dd class="mt-2 text-gray-700">
              <p><?php echo $order->get_shipping_method();?></p>
              <p>Takes up to 3 working days</p>
            </dd>
          </div>
        </dl>

        <h3 class="sr-only">Summary</h3>

        <dl class="space-y-6 border-t border-gray-200 text-sm pt-10">
          <div class="flex justify-between">
            <dt class="font-medium text-gray-900">Subtotal</dt>
            <dd class="text-gray-700"><?php echo get_woocommerce_currency_symbol( ) . number_format( $order->get_subtotal(), 2 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></dd>
          </div>


          
             <?php
            
                $codes = $order->get_coupon_codes();

                if (sizeof( $codes ) > 0 ) {
                    
                    ?>
                    <div class="flex justify-between">
                        <dt class="flex font-medium text-gray-900">
                        Discount
                    
                    <?php
                    
                    foreach( $codes as $coupon_code ){
                        ?>
                        
                        <span class="rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 ml-2"><?php echo $coupon_code; ?></span>
                        
                        <?php
                    }
                    
                    ?>
                    
                    
                    </dt>
                    <dd class="text-gray-700">-<?php echo get_woocommerce_currency_symbol() . number_format( $order->get_discount_total(), 2 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></dd>
                    </div>
                    
                    <?php
                    
                }


                ?>

          <div class="flex justify-between">
            <dt class="font-medium text-gray-900">Shipping</dt>
            <dd class="text-gray-700"><?php echo get_woocommerce_currency_symbol( ) . number_format( $order->get_shipping_total(), 2 ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></dd>
          </div>
          <div class="flex justify-between">
            <dt class="font-medium text-gray-900">Total</dt>
            <dd class="text-gray-900"><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></dd>
          </div>
        </dl>
      </div>
    </section>
  </div>
</main>



        <?php endif; ?>
<?php endif; ?>

</div>
