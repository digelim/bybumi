<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package our-island
 */

 global $post;
?>

<div class="flex flex-col ">
	<a href="<?php echo get_the_permalink(); ?>" class="flex-shrink-0">
		<img class="h-96 w-full object-cover rounded-lg" src="<?php echo get_the_post_thumbnail_url( $post, array(1184,1376));?>" alt="">
	</a>
	<div class="flex-1 py-6 flex flex-col justify-between">
		<div class="flex-1">
			<p class="text-sm font-medium text-indigo-600">
				<span class="hover:underline"> <?php echo get_the_category_list(', '); ?> </span>
			</p>
			<a href="<?php echo get_the_permalink(); ?>" class="block mt-2">
				<p class="text-lg font-semibold text-gray-900"><?php echo get_the_title(); ?></p>
				<p class="text-base text-gray-500"><?php echo get_the_excerpt(); ?></p>
			</a>	
		</div>
		<div class="mt-6 flex items-center">
			<div class="flex-shrink-0">
				<div>
					<span class="sr-only"><?php echo get_the_author(); ?></span>
					<img class="h-10 w-10 rounded-full" src="<?php echo get_avatar_url( get_the_author_meta( 'email' ) ); ?>" alt="">
				</div>
			</div>
			<div class="ml-3">
				<p class="text-sm font-medium text-gray-900">
					<?php echo get_the_author() ?>
				</p>
				<div class="flex space-x-1 text-sm text-gray-500">
					<time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('M d, Y');?> </time>
				</div>
			</div>
		</div>
	</div>	
</div>