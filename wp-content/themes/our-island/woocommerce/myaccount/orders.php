<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
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

do_action( 'woocommerce_before_account_orders', $has_orders );

?>


<main class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:pb-24 lg:px-8">
<div class="max-w-xl">
<h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Order history</h1>
<p class="mt-1 text-sm text-gray-500">Check the status of recent orders, manage returns, and download invoices.</p>
</div>

<section aria-labelledby="recent-heading" class="mt-16">
<h2 id="recent-heading" class="sr-only">Recent orders</h2>


<?php

foreach ( $customer_orders->orders as $customer_order ) {
    $order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
    $item_count = $order->get_item_count() - $order->get_item_count_refunded();
    
    ?>
    <div class="space-y-20">
    <div>
    <h3 class="sr-only">Order placed on <time datetime="<?php echo $order->get_date_created(); ?>"><?php echo wc_format_datetime( $order->get_date_created() ); ?></time></h3>
    
    <div class="bg-gray-50 rounded-lg py-6 px-4 sm:px-6 sm:flex sm:items-center sm:justify-between sm:space-x-6 lg:space-x-8">
    <dl class="divide-y divide-gray-200 space-y-6 text-sm text-gray-600 flex-auto sm:divide-y-0 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-x-6 lg:w-1/2 lg:flex-none lg:gap-x-8">
    <div class="flex justify-between sm:block">
    <dt class="font-medium text-gray-900">Date placed</dt>
    <dd class="sm:mt-1">
    <time datetime="<?php echo $order->get_date_created(); ?>"><?php echo wc_format_datetime( $order->get_date_created() ); ?></time>
    </dd>
    </div>
    <div class="flex justify-between pt-6 sm:block sm:pt-0">
    <dt class="font-medium text-gray-900">Order number</dt>
    <dd class="sm:mt-1"><?php echo $order->get_id(); ?></dd>
    </div>
    <div class="flex justify-between pt-6 sm:block sm:pt-0">
    <dt><div class="font-medium text-gray-900">Total amount</div></dt>
    <dd class="sm:mt-1"><?php echo $order->get_formatted_order_total(); ?></dd>
    </div>
    </dl>
    <a href="<?php echo $order->get_checkout_payment_url(); ?>" class="w-full flex items-center justify-center bg-white mt-6 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:mt-0">
    View Invoice
    <span class="sr-only">for order <?php echo $order->get_id(); ?></span>
        </a>
        </div>
        
        <table class="mt-4 w-full text-gray-500 sm:mt-6 mb-20">
        <caption class="sr-only">
        Products
        </caption>
        <thead class="sr-only text-sm text-gray-500 text-left sm:not-sr-only">
        <tr>
        <th scope="col" class="sm:w-2/5 lg:w-1/3 pr-8 py-3 font-normal">Product</th>
        <th scope="col" class=" w-1/5 pr-8 py-3 font-normal sm:table-cell">Quantity</th>
        <th scope="col" class=" w-1/5 pr-8 py-3 font-normal sm:table-cell">Price</th>
        <th scope="col" class=" pr-8 py-3 font-normal sm:table-cell">Status</th>
        <th scope="col" class="w-0 py-3 font-normal text-right">Info</th>
        </tr>
        </thead>
        <tbody class="border-b border-gray-200 divide-y divide-gray-200 text-sm sm:border-t">
        <?php
        foreach ( $order->get_items() as $cart_item_key => $cart_item ) {
            
            
            $product_id = $cart_item->get_product_id();
            $_product = wc_get_product( $product_id );
            
            if ( $_product ) {
                
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ) );
                
                $thumbnail = '<img src="'. $image[0] .'" alt="Front of sienna cotton t-shirt." class="w-16 h-16 rounded-md object-center object-cover sm:w-16 sm:h-16 mr-4">';
                
                ?>
                
                <tr>
                <td class="py-6 pr-8">
                    <div class="flex items-center">
                        <?php printf( '<a href="%s" class="shrink-0">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $thumbnail );?>
                        <div class="font-medium text-gray-900"><a href="#" class="font-medium text-gray-700 hover:text-gray-800"> <?php echo $_product->get_title(); ?></a></div>
                    <div>
                </td>
                <td><?php echo $cart_item['quantity'] ?></td>
                <td class="py-6 pr-8 sm:table-cell"><span class="ml-2 text-gray-700"><?php echo $_product->get_price_html(); ?></span></td>
                <td class="py-6 pr-8 sm:table-cell"><?php echo esc_html( wc_get_order_status_name( wc_get_order_status_name( $order->get_status() ) ) ); ?></td>
                <td class="py-6 font-medium text-right whitespace-nowrap">
                <a href="#" class="text-indigo-600">
                
                <?php
                
                $actions = wc_get_account_orders_actions( $order );
                
                if ( ! empty( $actions ) ) {
                    foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                        echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                    }
                }
                
                ?>
                
                </a>
                </td>
                </tr>
                
                <?php
            }
        }
    ?>
    </tbody>
    </table>
    </div>
    </div>
    
    <?php
    
}
?>
</section>
</main>

