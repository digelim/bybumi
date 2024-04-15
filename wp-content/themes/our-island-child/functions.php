<?php
add_action( 'wp_enqueue_scripts', 'our_island_enqueue_styles' );
function our_island_enqueue_styles() {
	wp_enqueue_style( 'child-style',
		get_stylesheet_uri(),
		array( 'parenthandle' ),
		wp_get_theme()->get( 'Version' ) // This only works if you have Version defined in the style header.
	);
}