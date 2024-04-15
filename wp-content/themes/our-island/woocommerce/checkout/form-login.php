<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
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

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>

<div class="grid gap-[14px] grid-cols-3">
	<a href="http://localhost:8888/wordpress/wp-login.php?loginSocial=facebook" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="facebook" data-popupwidth="600" data-popupheight="679">
		<div class="nsl-button nsl-button-default nsl-button-facebook" data-skin="dark" style="background-color:#1877F2;"><div class="nsl-button-svg-container"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1365.3 1365.3" height="24" width="24"><path d="M1365.3 682.7A682.7 682.7 0 10576 1357V880H402.7V682.7H576V532.3c0-171.1 102-265.6 257.9-265.6 74.6 0 152.8 13.3 152.8 13.3v168h-86.1c-84.8 0-111.3 52.6-111.3 106.6v128h189.4L948.4 880h-159v477a682.8 682.8 0 00576-674.3" fill="#fff"/></svg></div><div class="nsl-button-label-container"></div></div>
	</a>

	<a href="http://localhost:8888/wordpress/wp-login.php?loginSocial=google" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="google" data-popupwidth="600" data-popupheight="600">
		<div class="nsl-button nsl-button-default nsl-button-google" data-skin="light" style="background-color:#fff;"><div class="nsl-button-svg-container"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#4285F4" d="M20.64 12.2045c0-.6381-.0573-1.2518-.1636-1.8409H12v3.4814h4.8436c-.2086 1.125-.8427 2.0782-1.7959 2.7164v2.2581h2.9087c1.7018-1.5668 2.6836-3.874 2.6836-6.615z"></path><path fill="#34A853" d="M12 21c2.43 0 4.4673-.806 5.9564-2.1805l-2.9087-2.2581c-.8059.54-1.8368.859-3.0477.859-2.344 0-4.3282-1.5831-5.036-3.7104H3.9574v2.3318C5.4382 18.9832 8.4818 21 12 21z"></path><path fill="#FBBC05" d="M6.964 13.71c-.18-.54-.2822-1.1168-.2822-1.71s.1023-1.17.2823-1.71V7.9582H3.9573A8.9965 8.9965 0 0 0 3 12c0 1.4523.3477 2.8268.9573 4.0418L6.964 13.71z"></path><path fill="#EA4335" d="M12 6.5795c1.3214 0 2.5077.4541 3.4405 1.346l2.5813-2.5814C16.4632 3.8918 14.426 3 12 3 8.4818 3 5.4382 5.0168 3.9573 7.9582L6.964 10.29C7.6718 8.1627 9.6559 6.5795 12 6.5795z"></path></svg></div><div class="nsl-button-label-container"></div></div>
	</a>

	<a href="http://localhost:8888/wordpress/wp-login.php?loginSocial=twitter" data-plugin="nsl" data-action="connect" data-redirect="current" data-provider="twitter" data-popupwidth="600" data-popupheight="600">
		<div class="nsl-button nsl-button-default nsl-button-twitter" data-skin="x" style="background-color:#000000;"><div class="nsl-button-svg-container"><svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path d="M13.712 10.622 20.413 3h-1.587l-5.819 6.618L8.36 3H3l7.027 10.007L3 21h1.588l6.144-6.989L15.64 21H21l-7.288-10.378Zm-2.175 2.474-.712-.997L5.16 4.17H7.6l4.571 6.4.712.996 5.943 8.319h-2.439l-4.85-6.788Z" fill="#fff"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h24v24H0z"/></clipPath></defs></svg></div><div class="nsl-button-label-container"></div></div>
	</a>
</div>

<div class="mt-3 relative">
	<div class="absolute inset-0 flex items-center" aria-hidden="true">
		<div class="w-full border-t border-gray-300"></div>
	</div>
	<div class="relative flex justify-center text-sm">
		<span class="px-2 bg-[#f3f3f3] text-gray-500"> Or continue with </span>
	</div>
</div>
<?php

woocommerce_login_form(
	array(
		'redirect' => wc_get_checkout_url(),
		'hidden'   => false,
	)
);

