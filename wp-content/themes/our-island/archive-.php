<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package our-island
 */
 global $post;

$email = get_the_author_meta('user_email');
$author_name = get_the_author_meta('display_name');
$author_url = get_the_author_meta('url');

?>

<div class="flex flex-col ">
	<?php if ( get_option('show_thumbnail') == '1'): ?>
	<div class="flex-shrink-0">
		<a href="<?php echo get_permalink( $post->ID ); ?>" class="flex-shrink-0 h-full w-full ">
			<img class="h-96 w-full object-cover rounded-lg" src="<?php echo get_the_post_thumbnail_url($post->ID, array(1184,1376));?>" alt="">
		</a>	
	</div>
	<?php endif; ?>
	<div class="flex-1 py-6 flex flex-col justify-between">
		<div class="flex-1">
			<?php if ( get_option('show_categories') == '1'): ?>
			<p class="text-indigo-600">
				<span class="hover:underline uppercase text-sm"> <?php echo get_the_category_list(', '); ?> </span>
			</p>
			<?php endif; ?>
			<?php if ( get_option('show_title') == '1'): ?>
				<a href="<?php echo get_permalink( $post->ID ); ?>" class="block mt-2">
					<p class="text-base text-black"><?php echo $post->post_title; ?></p>
				</a>
			<?php endif; ?>				
			<?php if ( get_option('show_excerpt') == '1'): ?>	
				<p class="mt-1 text-sm italic text-gray-500"><?php echo $post->post_excerpt; ?></p>
			</a>
			<?php endif; ?>	
		</div>
		<div class="mt-6 flex items-center">
			<div class="flex-shrink-0">
			<?php if ( get_option('show_author') == '1'): ?>	
			<div>
				<span class="sr-only"><?php echo $author_name; ?></span>
				<img class="h-10 w-10 rounded-full" src="<?php echo get_avatar_url($email); ?>" alt="<?php echo $author_name; ?>">
			</div>
			<?php endif; ?>	
			</div>
			<div class="ml-3">
				<?php if ( get_option('show_author') == '1'): ?>	
				<p class="text-sm">
					<div class="text-black"> <?php echo $author_name; ?> </div>
				</p>
				<?php endif; ?>	
				<?php if ( get_option('show_date') == '1'): ?>	
				<div class="flex space-x-1 text-sm text-gray-500">
					<time datetime="<?php echo get_the_date( 'Y-m-d' );  ?>"> <?php echo get_the_date( 'M d, Y' );  ?> </time>
				</div>
				<?php endif; ?>	
			</div>
		</div>
	</div>
</div>