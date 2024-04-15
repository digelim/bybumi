<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package our-island
 */

if ( ! is_active_sidebar( 'header-1' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'header-1' ); ?>
