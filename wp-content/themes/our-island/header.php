<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package our-island
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php $font_family = get_option( 'font_family', 'Open Sans' ); ?>
    <link
      href="https://fonts.googleapis.com/css2?family=<?php echo str_replace( ' ', '+', $font_family ); ?>&display=swap"
      rel="stylesheet"
    />
	<?php wp_head(); ?>

  <style type="text/tailwindcss">

    * {
        --hover-color:<?php echo get_option( 'hover_color', '#000000' );?>;
        --button-color:<?php echo get_option( 'color', '#561f18' );?>;
        --error-color:<?php echo get_option( 'error_color', '#561F18' );?>;
        --success-color:<?php echo get_option( 'success_color', '#bdfdbd' );?>;
        --info-color:<?php echo get_option( 'info_color', '#bdfcfd' );?>;
    }

    input, button, a, textarea  {
        transition: background-color, border-color 400ms ease;
    }

    *:focus {
        --tw-ring-color: var(--hover-color) !important;
    }

    



    input, .select2-selection__rendered, .select2-search__field,.wc-stripe-card-element {
        @apply appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-base placeholder-gray-500 ;
        @apply focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500
      }

    .select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[data-selected] {
      background-color: var(--hover-color) !important;
      color: white;
      outline: 0;
    }

    .select2-dropdown--below {
        top: 5px !important;
    }

    .select2-dropdown--above {
      top: -5px !important;
    }

    .select2-container--default .select2-results__option[aria-selected=true], .select2-container--default .select2-results__option[data-selected=true] {
        background-color: var(--button-color) !important;
        color: white;
        outline: 0;
    }

    .select2-results__option {
      @apply pl-3 block truncate font-normal;
    }

    span.select2-dropdown {
        border-radius: 6px !important;
        border: 1px solid #d1d5db !important;
        overflow: hidden !important;
        @apply border border-gray-300 rounded-md shadow-lg focus:outline-none sm:text-sm
        
    }

    .select2-container--default .select2-selection__arrow {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='14' viewBox='0 0 8 14'%3E%3Cpath id='Caminho_1' data-name='Caminho 1' d='M10,3a.75.75,0,0,1,.55.24l3.25,3.5a.75.75,0,1,1-1.1,1.02L10,4.852,7.3,7.76A.75.75,0,0,1,6.2,6.74l3.25-3.5A.75.75,0,0,1,10,3ZM6.24,12.2a.75.75,0,0,1,1.06.04L10,15.148l2.7-2.908a.75.75,0,0,1,1.1,1.02l-3.25,3.5a.75.75,0,0,1-1.1,0L6.2,13.26a.75.75,0,0,1,.04-1.06Z' transform='translate(-6 -3)' fill='%23959595' fill-rule='evenodd'/%3E%3C/svg%3E%0A");
        background-repeat: no-repeat;
        background-position-y: center;
        height: 44px !important;
    }

    .select2-container--default .select2-selection__arrow b {
        opacity: 0 !important;
    }

    .select2-results__options::-webkit-scrollbar {
        display: none;
    }

    .select2-container .select2-selection--single {
        height: 48px;
        border: none !important;
    }

    .select2-container {
      @apply mt-1;
    }

    



<?php if ( class_exists('WooCommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page()) ): ?>

    .form-row label {
      @apply block text-sm font-medium text-gray-700;
    }

    .woocommerce-form__label-for-checkbox input + span, input[type="radio"] + label {
      bottom: 5px;
      position: relative;
      left: 8px;
      @apply text-sm text-gray-700;
    }

    .form-row input, .form-row textarea {
      @apply mt-1
    }

    .form-row {
        --tw-space-y-reverse: 0;
        margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
    }

    a.reset_variations {
      display: none;
    }

    table.variations label {
        @apply text-sm text-gray-700 font-medium;
    }

    table.variations th {
        text-align: left;
    }

    table.variations {
        @apply mb-10

    }

    .woocommerce-shipping-fields {
        @apply mt-8;
    }

    .shop_table.woocommerce-checkout-review-order-table {
      position: fixed !important;
      margin-right: 30px;
      bottom: 0;
      right: 0;
      flex: 1 1 auto;
      z-index: 100;
    }

    .shop_table.woocommerce-checkout-review-order-table {
        @apply flex-auto overflow-y-auto divide-y divide-gray-200 px-6;
        @apply text-sm text-gray-700 mt-10 space-y-6;
    }

    .woocommerce-checkout .order-total {
        @apply border-t border-gray-200 text-gray-900 pt-6
    }

    table.shop_table.woocommerce-checkout-review-order-table tfoot {
        border: none;
        bottom: 30px;
        position: relative;

    }

    table.shop_table.woocommerce-checkout-review-order-table th {
      text-align: left;
      font-weight: 400;
    }

    .shop_table.woocommerce-checkout-review-order-table td {
        text-align: right;
        @apply text-gray-900;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .shop_table.woocommerce-checkout-review-order-table td label {
        @apply text-gray-900;
    }

    table.shop_table.woocommerce-checkout-review-order-table tr {
        height: 45px;
    }

    table.shop_table.woocommerce-checkout-review-order-table {
        width: 380px;
        max-width: 100%;
    }

    table.shop_table.woocommerce-checkout-review-order-table:after {
        content: '';
        background: #F9FAFB;
        position: fixed;
        top: 0;
        right: 0px;
        width: 28vw;
        min-width: 320px;
        height: 100vh;
        z-index: -1;
    }

    .woocommerce-checkout .woocommerce {
        padding: 0 30px 30px 30px;
        max-width: 66vw;
    }

    .single_add_to_cart_button {
        @apply text-center bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500;
    }

    .product-quantity input {
        height:100%;
    }

    #place_order {
      @apply block text-center  w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500;
    }

    .form-row.place-order {
        display: flex;
        flex-direction: column-reverse;
    }

    .woocommerce-privacy-policy-text {
      @apply text-gray-500 text-sm mt-4;
    }

    label.checkbox + label {
        margin: 23px 40px 0 !important;
        @apply text-sm text-gray-700;
    }

    table.shop_table.woocommerce-checkout-review-order-table thead {
        display: none;
    }

    .shop_table.woocommerce-checkout-review-order-table tbody {
        border-top: none;
    }

    .woocommerce-info, .woocommerce-message {
      padding-left: 55px !important;
    }

    table.shop_table.woocommerce-checkout-review-order-table:before {
        content: 'Order summary';
        position: fixed;
        top: 70px;
        @apply text-lg font-medium text-gray-900;
    }

    .woocommerce-info {
      @apply rounded-lg p-4 mt-4 mb-4;
      background-color: <?php echo get_option( 'info_color', '#bdfcfd' ).'50';?>;
      position: relative;
    }

    .woocommerce-message {
      @apply rounded-lg p-4 mt-4 mb-4;
      background-color: <?php echo get_option( 'success_color', '#bdfdbd' ).'50';?>;
      position: relative;
    }

    .woocommerce-error {
      @apply rounded-lg p-4 mt-4 mb-4;
      position: relative;
      background-color: <?php echo get_option( 'error_color', '#561F18' ).'50';?>;
    }

    .woocommerce-error li {
      padding-left: 40px;
    }

    .woocommerce-error:before {
        content: '';
        position: absolute;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19.5' height='19.5' viewBox='0 0 19.5 19.5'%3E%3Cpath id='Caminho_1' data-name='Caminho 1' d='M18.364 18.364A9 9 0 0 0 5.636 5.636M18.364 18.364A9 9 0 0 1 5.636 5.636M18.364 18.364 5.636 5.636' transform='translate(-2.25 -2.25)' fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5'/%3E%3C/svg%3E");
        width: 35px;
        height: 35px;
        background-repeat: no-repeat;
        top: 10px;
        left: 10px;
        padding: 8px;
        background-size: 60%;
        background-color: <?php echo get_option( 'error_color', '#561F18' );?>;
        background-position: center;
        border-radius: 6px;
    }

    .woocommerce-info:before {
        content: '';
        position: absolute;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z' /%3E%3C/svg%3E");
        width: 36px;
        height: 36px;
        background-repeat: no-repeat;
        top: 10px;
        left: 10px;
        padding: 8px;
        background-size: 60%;
        background-color: <?php echo get_option( 'info_color', '#bdfcfd' );?>;
        background-position: center;
        border-radius: 6px;
    }

    .woocommerce-message:before {
        content: '';
        position: absolute;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /%3E%3C/svg%3E");
        width: 36px;
        height: 36px;
        background-repeat: no-repeat;
        top: 10px;
        left: 10px;
        padding: 8px;
        background-size: 60%;
        background-color: <?php echo get_option( 'success_color', '#bdfdbd' );?>;
        background-position: center;
        border-radius: 6px;
    }

    .coupon-form {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
        @apply gap-4;

    }

    .coupon-form p:first-child {
        flex: 0 0 100%;
    }

    .coupon-form .form-row-first {
        flex-grow: 1;
    }

    .coupon-form .input-text {
      margin-top: 0 !important;
      height: 100%;
    }

    .coupon-form .form-row-last {
      @apply h-full rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500;
    }

    .woocommerce-checkout footer {
        display: none;
    }

    #order_review_heading + ul {
        position: fixed;
        top: 110px;
        right: 30px;
        z-index: 101;
        width: 380px;
        height: calc(86vh - 250px);
        overflow-y: auto;
    }

    #order_review_heading + ul + ul {
        display: none;
    }

    .variable-item.button-variable-item.selected {
        border: 3px solid white;
    }

    .woocommerce-order-received .woocommerce {
        margin: 0 auto;
    }

    .wc-backward {
        @apply theme-button mt-6;
        padding-top: 14px;
        padding-bottom: 14px;
    }

    p.return-to-shop {
        text-align: center;
        margin-top: 40px;
    }

    .tabular-nums:empty {
        display: none;
    }

    .woocommerce-orders .bg-gray-50.rounded-lg.py-6.px-4 {
        background: <?php echo get_option( 'info_color' ).'60';?> !important;
    }


    .woocommerce-account .woocommerce {
        @apply flex max-w-7xl mx-auto px-4 sm:px-6 lg:pb-24 lg:px-8 gap-10;
    }

    .woocommerce-MyAccount-content {
        flex: 0 1 100%;
    }

    .woocommerce-account main {
        padding-bottom: 0;
        background: #fbfbfb;
    }

    .woocommerce-account footer, .woocommerce-account header,.woocommerce-account .woocommerce-store-notice {
        display: none !important;
    }

    nav.woocommerce-MyAccount-navigation {
        padding-top: 4rem;
        flex: 0 0 auto;
    }

    .woocommerce-MyAccount-navigation-link.is-active {
        @apply bg-gray-200 text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md
    }

    .woocommerce-MyAccount-navigation-link:not(.is-active) {
        @apply text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 pr-16 text-sm font-medium rounded-md
    }

    .woocommerce-MyAccount-navigation-link {
        @apply pr-16;
    }

    .woocommerce-Addresses address {
        @apply relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-pink-500
    }

    .woocommerce-Address-title .edit {
        position: absolute;
        right: 15px;
        z-index: 1;
        top: 35px;
        color: transparent;
    }

    .woocommerce-Address, .woocommerce-Address-title {
        position: relative;
    }

    .woocommerce-Addresses {
        @apply flex gap-4;
    }

    .woocommerce-Address-title .edit:before {
        content: '';
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='21' height='21.159' viewBox='0 0 21 21.159'%3E%3Cpath id='Caminho_1' data-name='Caminho 1' d='M16.862 4.487 18.549 2.8A1.875 1.875 0 0 1 21.2 5.451L6.832 19.82a4.5 4.5 0 0 1-1.9 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.9L16.863 4.487Zm0 0L19.5 7.125' transform='translate(-1.5 -1.341)' fill='none' stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5'/%3E%3C/svg%3E");
        width: 21px;
        height: 21px;
        position: absolute;
        top: 0px;
        right: 0px;
        z-index: 10;
        background-size: contain;
        background-position: center;
        background-color: white;
        background-repeat: no-repeat;
    }


    .woocommerce-MyAccount-paymentMethods thead {
        display: none !important;
    }

    tr.payment-method {
        position: relative;
        background: rgba(189,252,253,.6);
        @apply rounded-md px-6 py-5 sm:flex sm:items-start sm:justify-between
    }

    tr.payment-method:not(:last-child) {
        margin-bottom: 20px;
    }

    .payment-method-method {
        @apply text-sm font-medium text-gray-900;
    }

    .woocommerce-PaymentMethod--expires {
        position: absolute;
        top: 35px;
        @apply mt-1 text-sm text-gray-600 sm:flex sm:items-center;
    }

    .woocommerce-PaymentMethod--actions a.button {
        @apply inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm ml-4
    }

    table.woocommerce-MyAccount-paymentMethods {
        @apply px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg;
        overflow: hidden;
    }
    table.woocommerce-MyAccount-paymentMethods tbody {
        margin: 40px;
        border: 20px solid white;
    }

    table.woocommerce-MyAccount-paymentMethods + .button {
        @apply text-center bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500;
        margin-top: 30px;
        display: inline-block;
    }

    [name="save_account_details"] {
        margin-top: 30px;
    }

    form em {
        @apply text-gray-500 text-sm mt-2 block;
        
    }

    .woocommerce-password-hint {
        @apply text-gray-500 text-sm block;
    }


    fieldset legend {
        @apply text-lg leading-6 font-medium text-gray-900;
    }

    .woocommerce-edit-address form h3 {
        @apply text-lg leading-6 font-medium text-gray-900 pt-16;
    }

    fieldset {
        @apply mt-6;
    }

    .woocommerce-add-payment-method #place_order {
        width: auto;
    }

    .woocommerce-address-fields__field-wrapper {
        margin-bottom: 30px;
    }

    .woocommerce-Address-title h3 {
        @apply text-sm font-medium text-gray-500 mb-2;
    }

    .woocommerce-MyAccount-navigation-link {
        position: relative;
    }

    .woocommerce-MyAccount-navigation-link:after {
        font-size: 12px;
        position: absolute;
        right: 15px;
        padding: 0 6px;
        background: #e6e6e6;
        border-radius: 6px;
        color: #6d6d6d;
    }

    <?php


    $args = array(
        'customer_id' => get_current_user_id(),
        'limit' => -1,
    );

    $orders = wc_get_orders($args);

    ?>

    .woocommerce-MyAccount-navigation-link--orders:after {
        content:  '<?php echo sizeof( $orders ); ?>';
    }

    .woocommerce-MyAccount-navigation-link--payment-methods:after {
        content: '<?php echo sizeof( WC()->payment_gateways->get_available_payment_gateways() );?>';
    }

    .woocommerce-MyAccount-navigation-link--edit-address:after {
        content: '2';
    }

    .woocommerce-account:not(.logged-in) h2 {
        @apply mt-6 text-center text-3xl font-bold tracking-tight text-gray-900
    }

    .woocommerce-form-login, .woocommerce-form-register {
        @apply bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10
    }

    .button.woocommerce-form-login__submit, .woocommerce-form-register__submit {
        @apply w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500;
        margin-top: 25px;
    }
    .woocommerce-account:not(.logged-in) .woocommerce {
        @apply mt-8 sm:mx-auto sm:w-full sm:max-w-md
    }

    .woocommerce-form-login, .woocommerce-form-register {
        position: relative;
        margin-top: 2rem;
    }

    p.lost_password {
        position: absolute;
        bottom: 100px;
        right: 40px;
        @apply text-sm font-medium text-indigo-600 hover:text-indigo-500;
    }

    .woocommerce-account:not(.logged-in) .woocommerce {
        flex-direction: column;
    }

    .woocommerce-form-login p, .lost_reset_password p {
        @apply text-gray-500;
    }

    a.woocommerce-remove-coupon:before {
        position: absolute;
        left: 4px;
        top: 2px;
        width: 19px;
        height: 13px;
        content: '';
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18.234' height='21.001' viewBox='0 0 18.234 21.001'%3E%3Cpath id='Caminho_1' data-name='Caminho 1' d='M14.74 9l-.346 9M9.606 18 9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084A2.25 2.25 0 0 1 5.84 19.673L4.772 5.79m14.456 0q-1.731-.262-3.478-.4m-12 .562c.34-.059.68-.114 1.022-.165m0 0q1.731-.262 3.478-.4m7.5 0V4.477a2.177 2.177 0 0 0-2.09-2.2q-1.66-.053-3.32 0a2.178 2.178 0 0 0-2.09 2.2v.916m7.5 0a48.667 48.667 0 0 0-7.5 0' transform='translate(-2.883 -1.499)' fill='none' stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5'/%3E%3C/svg%3E");
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
    }

    a.woocommerce-remove-coupon {
        color: transparent !important;
        position: absolute;
    }



    select#rating + span {
        display: none;
    }




  .stock.out-of-stock{
    color: var(--error-color);   
  }

p.stars.selected a:not(.active)::before,p.stars:hover a::before, p.stars.selected a.active::before{
    content: "\53";
    color: #f7dd00;
    opacity: 1;
}


    nav.woocommerce-breadcrumb {
        display: flex;
    }

    <?php endif; ?>



    #review_form {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: #00000075;
      z-index: 999;
      padding: 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
  }

  .woocommerce-review-link {
    @apply text-sm text-gray-500;
  }

  #respond {
    background: white;
    padding-top: 40px;
    max-width: 750px;
    margin: 0 auto;
    justify-content: center;
    width: 100%;
    overflow: hidden;
  }

  p.stars.selected a.active::before {
      content: "\53";
      color: #4169e1;
      opacity: 1;
  }

  .comment-form .form-submit {
      display: inline-flex;
      justify-content: flex-end;
      margin-top: 20px;
  }

  .comment-form .form-submit input {
      flex: 0 0 90px;
  }

  .comment-form-rating label {
    display: block;
    font-size: 0.875rem;
    line-height: 1.25rem;
    font-weight: 500;
    --tw-text-opacity: 1;
    color: rgb(55 65 81 / var(--tw-text-opacity));
    margin-bottom: 4px;
  }

  .comment-respond {
    @apply rounded-md shadow-lg pt-10
  }

  .single-post .comment-form .form-submit {
      position: absolute;
      bottom: 15px;
      right: 15px;
  }

#reply-title:before {
    content: '';
    position: absolute;
    left: 28px;
    top: 0;
    width: 40px;
    height: 40px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19.839' height='18.995' viewBox='0 0 19.839 18.995'%3E%3Cpath id='Caminho_1' data-name='Caminho 1' d='M11.48 3.5a.562.562 0 0 1 1.04 0L14.645 8.61a.563.563 0 0 0 .475.345l5.518.442a.563.563 0 0 1 .321.988l-4.2 3.6a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.563.563 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.2-3.6A.563.563 0 0 1 3.362 9.4L8.88 8.955a.563.563 0 0 0 .475-.345L11.48 3.5Z' transform='translate(-2.081 -2.4)' fill='none' stroke='%23f7dd00' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-color: #fffade;
    background-position: center;
    border-radius: 50%;
}

#reply-title {
    position: relative;
    /* display: block; */
}

.comment-form-comment, .comment-form-rating, #reply-title, #reply-title + div {
    padding: 0 30px 0 90px;
}

.comment-form .form-submit {
    display: inline-flex;
    justify-content: flex-end;
    margin-top: 20px;
    padding-left: 100px;
    background: #fcfcfc;
    bottom: -20px;
    position: relative;
    padding: 20px 40px;
}



    p.woocommerce-store-notice {
        position: absolute !important;
        top: 0 !important;
        height: max-content !important;
    }

    .woocommerce-demo-store:not(.woocommerce-account) {
        padding-top: 55px;
    }

    .woocommerce-demo-store.admin-bar p.woocommerce-store-notice {
        top: 32px !important; 
    }

    .woocommerce-account {
        margin-top: -32px;
    }

    .site-main {
        min-height: 100vh;
    }

    .woocommerce-Button {
        @apply py-2;
    }

    .button[name="update_cart"],.button[name="apply_coupon"], .theme-button-outline {
        @apply py-2;
        border-width: 1px;
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219);
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255);
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 1rem;
        padding-right: 1rem;
        font-size: 1rem;
        line-height: 1.5rem;
        color: #000;
    }

    .button[name="update_cart"] {
        margin-top: 20px;
    }

    .button:hover {
        color: white;
        border-color: black;
    }

    .checkout_coupon.woocommerce-form-coupon {
        @apply gap-4;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    #coupon_code {
        margin: auto;
    }

    form.checkout_coupon.woocommerce-form-coupon .form-row-first {
        flex: 1 0 auto;
    }

    form.checkout_coupon.woocommerce-form-coupon .form-row-last {
        flex: 0 0 140px;
    }

    .checkout_coupon.woocommerce-form-coupon p:first-of-type {
        flex: 0 0 100%;
    }

    form.checkout_coupon.woocommerce-form-coupon .clear {
        display: none;
    }

    span.wc-stripe-card-icons-container {
        display: none;
    }

    p.woocommerce-store-notice {
        background: var(--button-color);
        color: white;
        text-align: center;
    }

    a.woocommerce-store-notice__dismiss-link {
        color: transparent;
        position: absolute;
        right: 15px;
    }

    #customer_details + #order_review_heading {
        margin-top: 2rem;
    }

    .form-row-first, .form-row-last {
        padding-bottom: 1rem;
    }

    a.woocommerce-store-notice__dismiss-link:before {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='19.5' height='19.5' viewBox='0 0 19.5 19.5'%3E%3Cpath id='Caminho_1' data-name='Caminho 1' d='M9.75 9.75l4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-9-9 9 9 0 0 1 9 9Z' transform='translate(-2.25 -2.25)' fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5'/%3E%3C/svg%3E");
        position: absolute;
        left: 20px;
        top: 2px;
    }

    .woocommerce-billing-fields h3 {
        font-size: 1.125rem;
        line-height: 1.75rem;
        font-weight: 500;
        --tw-text-opacity: 1;
        color: rgb(17 24 39 / var(--tw-text-opacity));
        color: var(--button-color);
    }

    .single-product form.cart {
        display: inline-flex;
        gap: 20px;
    }



    input:focus {
      border-color: var(--hover-color) !important;
    }

    textarea {
      @apply focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500
    }

    textarea:focus-visible {
        outline: 1px;
    }

    table.variations th, table.variations td {
        flex: 0 0 100%;
    }

    .select2-container {
        min-width: 180px;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active{
        -webkit-box-shadow: 0 0 0 30px white inset !important;
    }

    input[type="checkbox"]:not([role="switch"]) {
      background: white;
      min-width: 15px;
      max-width: 15px;
      display: inline-flex;
      padding: 10px;
    }

    input[type="radio"] {
    background: white;
    min-width: 15px;
    max-width: 15px;
    display: inline-flex;
    padding: 10px;
    border-radius: 50%;
    }

    input[type="checkbox"]:not([role="switch"]):checked {
      background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
      border-color: transparent;
      background-color: currentColor;
      background-size: 100% 100%;
      background-position: center;
      background-repeat: no-repeat;
    }

    input[type="radio"]:checked{
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='22' height='22' viewBox='0 0 22 22'%3E%3Ccircle id='Elipse_1' data-name='Elipse 1' cx='11' cy='11' r='11'/%3E%3C/svg%3E");
      background-size: 50%;
      background-position: center;
      background-repeat: no-repeat;
    }

    input:focus {
      outline: 2px solid #4a0a09;
      outline-offset: 2px;
      --tw-ring-color: white !important;
    }

    a.button:hover, .theme-button-hover:hover {
        background:var(--hover-color) !important;
        color: #ffffff;
    }

    .theme-button {
        @apply text-center bg-indigo-600 border border-transparent rounded-md shadow-sm px-4 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500;
        cursor: pointer;
    }

    [type="submit"] {
        @apply theme-button theme-button-hover !important;
    }

    a.button.woocommerce-button:hover {
        background: transparent !important;
        color: black !important;
    }
    

    .wpcf7-submit {
        @apply w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500;
    }

    .wpcf7-submit:hover {
    background-color: var(--hover-color) !important;
    }


    .hover\:bg-indigo-700:hover, .hover\:bg-indigo-600:hover  .hover\:bg-indigo-500:hover {
        background-color: var(--hover-color) !important;
    }

    .hover\:text-indigo-500:hover, .hover\:text-indigo-600:hover, hover\:text-indigo-700:hover,hover\:text-indigo-800:hover {
        color:var(--hover-color) !important;
    }


    .focus\:ring-indigo-500:focus, .focus\:border-indigo-500:focus, .wc-backward:focus, [type=submit]:focus
    {
        --tw-ring-color: var(--hover-color) !important;
        border-color: var(--hover-color) !important;
    }

    .bg-indigo-600-25 {
        background: rgba(73, 2, 0, .25);
    }

    .h-96 {
        height: 24rem;
    }





    #thwmscf-tab-panel-2[style="display: none;"] #payment, #thwmscf-tab-panel-2[style="display: none;"] .checkout-coupon-toggle, #thwmscf-tab-panel-2[style="display: none;"] #order_review_heading, #thwmscf-tab-panel-2[style="display: none;"] .coupon-form {
        display: none;
    }

    #thwmscf-tab-panel-2 {
      display: block !important;
    }

    #thwmscf_wrapper {
        max-width: calc(64vw);
    }

    .thwmscf-wrapper .thwmscf-buttons {
        padding: 0 40px 0 20px
    }

    .thwmscf-buttons {
      @apply flex gap-x-4;
    }

    .thwmscf-buttons input {
      @apply block text-center w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500;
    }

    #action-prev[disabled] {
        display: none;
    }

    .thwmscf-tab-panels {
        background: #ffffff !important;
        padding-right: 40px;
    }

    .thwmscf-tab-panel > div > div h3, #order_review_heading {
      @apply text-lg font-medium text-gray-900;
    }

    ul.thwmscf-tabs li {
        margin-right: 0;
        margin-bottom: 30px;
    }

    ul.thwmscf-tabs li a {
        background: transparent !important;
        line-height: 3 !important;
    }

    li.thwmscf-tab:not(first-child) a:not(.active) {
        @apply text-gray-500 text-sm;
    }

    li.thwmscf-tab a.active, li.thwmscf-tab:first-child a {
        height: 0px;
        color: black !important;
        padding-bottom: 0;
        border-radius: 30px;
        background:  var(--button-color) !important;
        padding-top: 4px !important;
        @apply text-sm;
    }

    ul.thwmscf-tabs li a {
        padding: 4px 25px 4px 25px;
        display: block;
        outline: none;
        font-size: 1.1em;
    }

    




    .wc-stripe_cc-container input[type=checkbox] + span {
        display: none;
    }

    .wc-stripe_cc-container input[type=checkbox] {
        opacity: 1 !important;
    }

    #wc-stripe-card-element {
        width: 100%;
        min-width: 0px;
        -webkit-appearance: none;
        appearance: none;
        border-radius: 0.375rem;
        border-width: 1px;
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219);
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255);
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 1rem;
        padding-right: 1rem;
        font-size: 1rem;
        line-height: 1.5rem;
        margin-top: 20px;
    }

    .wc-stripe-card-icons-container {
        display: none;
    }

    .payment_box.payment_method_cod {
        margin-top: 10px;
    }

    .wc-stripe_cc-new-method-container {
        order: 3;
    }

    .wc-stripe_cc-container {
        display: flex;
        flex-direction: column;
    }

    .search-form:after {
        content: '';
        width: 24px;
        height: 24px;
        background: white;
        position: absolute;
        right: 9px;
        pointer-events: none;
        background: white;
        top: 6px;
        z-index: 89;
    }

    .search-form:focus-within:after {
        content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='black' class='w-6 h-6'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /%3E%3C/svg%3E");
        width: 24px;
        height: 24px;
        position: absolute;
        right: 9px;
        pointer-events: none;
        background: white;
        top: 6px;
        z-index: 89;
    }

    
    .cart-icon {
      z-index: 1;
    }


    .yith-wcwl-add-button span {
        display: none;
    }

    .yith-wcwl-wishlistexistsbrowse .feedback i {
        color: <?php echo get_option( 'error_color', '#561F18' ).'33';?>;
    }

    .product-quantity > div:first-of-type {
        flex-shrink: 0;
    }

    .quantity {
        width: 70px;
    }

    .product-quantity {
        position: relative;
    }

    .woocommerce-variation-add-to-cart, table.variations tr, table.variations td.value {
        @apply flex gap-y-2 gap-x-4 items-center;
        flex-wrap: wrap;
    }

    .qty {
        height: 50px;
    }

    table.variations th {
        flex-shrink: 0;
    }

    span.woo-selected-variation-item-name {
        display: none !important;
    }

    form.checkout_coupon.woocommerce-form-coupon .form-row-first, form.checkout_coupon.woocommerce-form-coupon .form-row-last {
        margin-top: initial;
        margin-bottom: 2rem;
    }

    .thwmscf-buttons input:hover {
        background-color: var(--hover-color);
        cursor: pointer;
    }

    


    .search-submit {
        flex: 0 0 120px;
    }

    .no-results {
        text-align: center;
    }

    .not-found {
        padding-top: 4em;
    }

    .not-found{
        @apply max-w-7xl mx-auto px-4 sm:px-6 lg:pb-24 lg:px-8;
    }

    .search #primary {
        @apply max-w-7xl mx-auto px-4 sm:px-6 lg:pb-24 lg:px-8;
    }

    .search p {
        @apply text-gray-500 text-sm mb-16;
    }

    .search-form {
        display: flex;
        align-items: center;
        @apply gap-4;
    }

    .search-form label {
        flex-grow: 1;
    }

    h1.page-title {
        @apply text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl mb-4;
    }


    #commentform {
        display: flex;
        flex-direction: column;
        position: relative;
    }

    p.comment-form-author, p.comment-form-email {
        order: -1;
        margin-bottom: 1rem;
    }

    #commentform label[for="author"], #commentform label[for="email"] {
        display: block;
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 500;
        --tw-text-opacity: 1;
        color: rgb(55 65 81 / var(--tw-text-opacity));
        margin-bottom: 4px;
    }

    .mobile-menu__overlay,.mobile-menu__container{
        transition: all 500ms ease;
    }


    .widget_nav_menu:last-child {
        padding-left: 2rem;
    }

    .widget_nav_menu:last-child {
        padding-left: 1rem;
    }




    .wp-element-button {
        @apply theme-button;
    }

    .wp-block-button.is-style-outline .wp-element-button {
        @apply theme-button-outline;
    }

    .wp-block-button.is-style-outline .wp-element-button:hover {
        @apply theme-button-hover;
    }

    .has-small-font-size {
        @apply text-sm !important;
    }

    .has-medium-font-size {
        @apply text-base !important;
    }

    .has-large-font-size {
        @apply text-lg !important;
    }

    .has-x-large-font-size {
        @apply text-xl !important;
    }

    p.has-color-color.has-text-color {
        color: var(--button-color);
    }

    p.has-info-color-color.has-text-color {
        color: var(--info-color);
    }

    p.has-success-color-color.has-text-color {
        color: var(--success-color);
    }

    p.has-error-color-color.has-text-color {
        color: var(--error-color);
    }

    p.has-hover-color-color.has-text-color {
        color: var(--hover-color);
    }

    p.has-gray-50-color.has-text-color {
        @apply text-gray-50;
    }

    p.has-gray-100-color.has-text-color {
        @apply text-gray-100;
    }

    p.has-gray-200-color.has-text-color {
        @apply text-gray-200;
    }

    p.has-gray-300-color.has-text-color {
        @apply text-gray-300;
    }

    p.has-gray-400-color.has-text-color {
        @apply text-gray-400;
    }

    p.has-gray-500-color.has-text-color {
        @apply text-gray-500;
    }

    p.has-gray-600-color.has-text-color {
        @apply text-gray-600;
    }

    p.has-gray-700-color.has-text-color {
        @apply text-gray-700;
    }

    p.has-gray-800-color.has-text-color {
        @apply text-gray-800;
    }

    p.has-gray-900-color.has-text-color {
        @apply text-gray-900;
    }

    h1.has-small-font-size,h2.has-small-font-size,h3.has-small-font-size,h4.has-small-font-size,h5.has-small-font-size,h6.has-small-font-size {
        @apply text-5xl !important;
    }

    h1.has-medium-font-size,h2.has-medium-font-size,h3.has-medium-font-size,h4.has-medium-font-size,h5.has-medium-font-size,h6.has-medium-font-size {
        @apply text-6xl !important;
    }

    h1.has-large-font-size,h2.has-large-font-size,h3.has-large-font-size,h4.has-large-font-size,h5.has-large-font-size,h6.has-large-font-size {
        @apply text-7xl !important;
    }

    h1.has-x-large-font-size,h2.has-x-large-font-size,h3.has-x-large-font-size,h4.has-x-large-font-size,h5.has-x-large-font-size,h6.has-x-large-font-size {
        @apply text-8xl !important;
    }



    .mobile-menu__container {
        left: -100%;
    }

    .mobile-menu .space-y-6.border-t.border-gray-200.py-6.px-4 .flex {
        flex-direction: column;
        margin: 0;
        text-align: left;
        align-items: flex-start;
        justify-content: center;
        line-height: 3;
    }

    .mobile-menu a[rel="home"] img {
        height: 50px;
    }

    .mobile-menu a[rel="home"] {
        display: flex;
        align-items: center;
        position: absolute;
        left: 60px;
        height: auto;
    }

    .mobile-menu .flex.px-4.pt-5.pb-2.justify-between.items-center .h-full.flex.space-x-8 a:not(:first-of-type) {
        padding-left: 15px;
    }

    .nav-next, .nav-previous {
        @apply shadow-lg rounded-lg overflow-hidden mt-10
    }

    .nav-links {
        grid-column: span 2 / span 2;
        gap: 2rem;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        display: grid;
    }

  header .menu {
    display: inline-flex;
    grid-gap: 30px;
  }

  .main-menu-item > a + div.h-full {
    padding: 2rem 15rem 0 7rem;
    width: 100vw;
    position: absolute;
    left: 0;
    background: white;
    height: max-content;
    top: 74px;
    z-index: -1;
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    grid-template-rows: 100% auto auto auto;
    justify-items: stretch;
    --tw-shadow: 0 20px 25px -5px
    rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    --tw-shadow-colored: 0 20px 25px -5px
    var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    gap: 40px;
    visibility: hidden;
}

.main-menu-link:after {
    content: '';
    height: 40px;
    width: 90px;
    position: absolute;
    top: 18px;
    left: -25px;
}

.main-menu-item > a:hover + div.h-full, .main-menu-item > a + div.h-full:hover {
  visibility: visible;
}

.sub-menu-item {
    flex-direction: column;
    align-items: flex-start;
}

.sub-menu-item a {
    @apply text-sm font-medium text-gray-900;
}

.sub-sub-menu-item a {
    @apply mt-5 text-sm text-gray-500;
}

.sub-menu-link + div {
    display: flex;
    flex-direction: column;
}

.search-overlay { 
  display: none;
}

.search-form:focus-within + .search-overlay {
    display: grid;
}

.admin-bar .pace .pace-activity {
    top: 50px;
}

input[role="switch"]:checked {
    position: absolute;
    left: -20px;
    bottom: 0px;
    width: 44px;
    height: 24px;
    border-radius: 100px;
    background: var(--success-color);
    display: block;
    transform: translateX(20px);
    transition: background-color, transform 0.2s ease-in-out;
}

input[role="switch"]:checked:before {
    content: '';
    position: absolute;
    left: 21px;
    bottom: 1px;
    width: 22px;
    height: 22px;
    border-radius: 100%;
    background: white;
    display: block;
}

input[role="switch"] {
    border-width: 0;
    outline: 0;
    content: '';
    position: absolute;
    bottom: 1px;
    width: 22px;
    height: 22px;
    border-radius: 100%;
    display: block;
    right: 21px;
    border: none;
}

  </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<header class="relative">
<nav aria-label="Top" class="relative z-20 pt-5">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-17 mb-10 flex items-center">
          <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
          <button id="mobile-menu-toggle" type="button" class="bg-white p-2 rounded-md text-gray-400 lg:hidden">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/menu -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>

          <!-- Logo -->
          <div class="ml-4 flex lg:ml-0">
            <a href="<?php echo home_url(); ?>">
              <span class="sr-only"></span>
              <?php the_custom_logo(); ?>
            </a>
          </div>

          <div class="hidden lg:ml-8 lg:flex justify-between w-full">

		  	<?php get_sidebar('header-1'); ?>
			<div class="flex justify-between divide-x gap-8 items-center">
        <?php ob_start();?>
        <?php get_sidebar('header-2'); ?>
        <?php $header2 = ob_get_contents(); ?>
        <?php ob_flush(); ?>

        <?php ob_start();?>
        <?php get_sidebar('header-3'); ?>
        <?php $header3 = ob_get_contents(); ?>
        <?php ob_flush(); ?>
    </div>

    </div>
    </nav>

	</header>


  <div class="relative z-40 lg:hidden hidden mobile-menu" role="dialog" aria-modal="true">
      <!--
        Off-canvas menu backdrop, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="fixed inset-0 bg-black bg-opacity-0 mobile-menu__overlay"></div>

      <div class="fixed inset-0 z-40 flex mobile-menu__container">
        <!--
          Off-canvas menu, show/hide based on off-canvas menu state.

          Entering: "transition ease-in-out duration-300 transform"
            From: "-translate-x-full"
            To: "translate-x-0"
          Leaving: "transition ease-in-out duration-300 transform"
            From: "translate-x-0"
            To: "-translate-x-full"
        -->
        <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
          <div class="flex px-4 pt-5 pb-2 justify-between items-center w-full">
            <button id="hide-mobile-menu" type="button" class="-m-2 rounded-md p-2 text-gray-400">
              <span class="sr-only">Close menu</span>
              <!-- Heroicon name: outline/x-mark -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
            <!-- Logo -->
            <a href="<?php echo home_url(); ?>">
              <span class="sr-only"></span>
              <?php the_custom_logo(); ?>
            </a>
            <!-- Header Right -->
            <?php get_sidebar('mobile-1'); ?>
          </div>

          <!-- Links -->
          <div class="mt-2">
            
            
          </div>

          <div class="space-y-6 border-t border-gray-200 py-6 px-4">
          <?php get_sidebar('mobile-2'); ?>
          </div>

          <div class="space-y-6 border-t border-gray-200 py-6 px-4">
            <?php get_sidebar('mobile-3'); ?>
          </div>

          <div class="border-t border-gray-200 py-6 px-4">
            <?php

            $user = wp_get_current_user();
            $avatar = get_avatar_url( $user->user_email );

            if ( is_user_logged_in() ):

            ?>
                <div class="flex items-center">
                <div class="flex-shrink-0 px-2">
                    <img style="border: 2px solid white;box-shadow: 0 0 1px 2px #e4e4e4;" class="h-10 w-10 rounded-full ml-2" src="<?php echo $avatar; ?>" alt="<?php echo $user->display_name; ?>">
                  </div>
                  <div class="ml-2">
                    <div class="font-medium text-gray-800 text-sm"><?php echo $user->display_name; ?></div>
                    <div class="text-xs text-gray-500"><?php echo $user->user_email; ?></div>
                  </div>
                </div>

                <div class="space-y-6 py-6 px-4"> 
                  <div class="h-full flex space-x-8">
                    <div class="main-menu-item  menu-item-even menu-item-depth-0 flex">
                      <div class="relative flex">
                        <a href="<?php echo wp_logout_url(); ?>" class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px main-menu-link">Logout</a>
                      </div>
                    </div>
                  </div>          
                </div>

             <?php endif; ?>   
          </div>
        </div>
      </div>
  </div>
