<?php
/**
 * BLOCK: Basic ESNext
 *
 * Gutenberg Custom Block assets.
 *
 * @since   1.0.0
 * @package GB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'gb_simplecenteredtestimonials_editor_assets' );

/**
 * Enqueue the block's assets for the editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function gb_simplecenteredtestimonials_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'gb-simplecenteredtestimonials', // Handle.
		plugins_url( 'block.build.js', __FILE__ ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ,'wp-editor'), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
	);

	// Styles.
	wp_enqueue_style(
		'gb-simplecenteredtestimonials-editor', // Handle.
		plugins_url( 'editor.css', __FILE__ ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);
}


// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'gb_simplecenteredtestimonials_block_assets' );

/**
 * Enqueue the block's assets for the frontend.
 *
 * @since 1.0.0
 */
function gb_simplecenteredtestimonials_block_assets() {
	// Styles.
	wp_enqueue_style(
		'gb-simplecenteredtestimonials-frontend', // Handle.
		plugins_url( 'style.css', __FILE__ ), // Block frontend CSS.
		array( 'wp-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);
}
