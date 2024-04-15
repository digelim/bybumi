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
	<div class="flex-shrink-0">
		<img class="h-full w-full object-cover rounded-lg" src="<?php echo get_the_post_thumbnail_url(array(1184,1376));?>" alt="">
	</div>
	<div class="flex-1 p-6 flex flex-col justify-between">
		<div class="flex-1">
			<p class="text-sm font-medium text-indigo-600">
			<a href="#" class="hover:underline"> <?php echo get_the_category_list(', '); ?> </a>
			</p>
			<a href="#" class="block mt-2">
			<p class="text-lg font-semibold text-gray-900"><?php echo get_the_title( $post ); ?></p>
			<p class="text-base text-gray-500"><?php echo $post->excerpt; ?></p>
			</a>
		</div>
		<div class="mt-6 pl-6 flex items-center">
			<div class="flex-shrink-0">
			<a href="#">
				<span class="sr-only"><?php echo $post->author; ?></span>
				<img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
			</a>
			</div>
			<div class="ml-3">
			<p class="text-sm font-medium text-gray-900">
				<a href="#" class="hover:underline"> <?php echo $post->author; ?> </a>
			</p>
			<div class="flex space-x-1 text-sm text-gray-500">
				<time datetime="2020-03-16"> Mar 16, 2020 </time>
			</div>
		</div>
	</div>
</div>