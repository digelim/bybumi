<?php
/**
 * BLOCK: Basic ESNext
 *
 * Gutenberg Custom Block assets.
 *
 * @since   1.0.0
 * @package GB
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'enqueue_block_editor_assets', 'gb_4columnwithnewsletterandlocalization_editor_assets' );

/**
 * Enqueue the block's assets for the editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function gb_4columnwithnewsletterandlocalization_editor_assets() {
		wp_enqueue_script(
		'gb-4columnwithnewsletterandlocalization', 		plugins_url( 'block.build.js', __FILE__ ), 		array( 'wp-blocks', 'wp-i18n', 'wp-element' ,'wp-editor'), 		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) 	);

		wp_enqueue_style(
		'gb-4columnwithnewsletterandlocalization-editor', 		plugins_url( 'editor.css', __FILE__ ), 		array( 'wp-edit-blocks' ), 		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) 	);
}

add_action( 'enqueue_block_assets', 'gb_4columnlocalization_block_assets' );

function gb_4columnlocalization_block_assets() {
	$args = array(
		'handle' => 'gb-4cllocalization-frontend',
		'src'    => plugins_url( 'style.css', __FILE__ ),
	);
	
	wp_enqueue_block_style(
		'gb/gb4columnwithnewsletterandlocalization',
		$args
	);
}
