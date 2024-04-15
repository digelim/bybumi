<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package our-island
 */

if ( ! is_active_sidebar( 'footer-3' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'footer-3' ); ?>
