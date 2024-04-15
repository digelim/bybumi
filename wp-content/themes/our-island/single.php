<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package our-island
 */

get_header();
?>
		<?php

    wp_reset_postdata();

		while ( have_posts() ) :
      the_post();

      ?>
      
      <div class="bg-white overflow-hidden">
        <div class="relative max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
          <div class="hidden lg:block bg-gray-50 absolute top-0 bottom-0 left-3/4 w-screen"></div>
          <div class="mx-auto text-base max-w-prose lg:grid lg:grid-cols-2 lg:gap-8 lg:max-w-none">
            <div>
              <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase"><?php echo get_the_category_list(', '); ?></h2>
              <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl"><?php echo get_the_title(); ?></h3>
            </div>
          </div>
          <div class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
            <div class="relative lg:row-start-1 lg:col-start-2">
                <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
              </svg>
              <div class="relative text-base mx-auto max-w-prose lg:max-w-none">
                <figure>
                  <div class="aspect-w-12 aspect-h-7 lg:aspect-none">
                    <img class="rounded-lg shadow-lg object-cover object-center" src="<?php echo get_the_post_thumbnail_url( $post, array(1184,1376));?>" alt="Whitney leaning against a railing on a downtown street" width="1184" height="1376">
                  </div>
                </figure>
              </div>
            </div>
            <div class="mt-8 lg:mt-0">
              <div class="text-base max-w-prose mx-auto lg:max-w-none">

              <div class="mt-5 prose prose-indigo text-gray-500 mx-auto lg:max-w-none lg:row-start-1 lg:col-start-1">

                <?php

                get_template_part( 'template-parts/content', get_post_type() );

                $next = get_next_post();
                $prev = get_previous_post();

                the_post_navigation(
                  array(
                    'next_text' => get_post_navigation_item( $next ),
                    'prev_text' => get_post_navigation_item( $prev ),
                  )
                );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
		endwhile; // End of the loop.
get_sidebar();
get_footer();
