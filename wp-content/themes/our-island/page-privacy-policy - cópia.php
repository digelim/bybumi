<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package our-island
 */

get_header();
?>

<div class="relative py-16 bg-white overflow-hidden">
  <div class="relative px-4 sm:px-6 lg:px-8">
    <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
		
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	</div>
  </div>
</div>


<?php
get_sidebar();
get_footer();
