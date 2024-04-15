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


<header class="woocommerce-products-header">
    
  <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <?php the_archive_title( '<h1 class="text-4xl font-extrabold tracking-tight text-gray-900">', '</h1>' ); ?>
        <?php the_archive_description( '<div class="mt-4 max-w-3xl mx-auto text-base text-gray-500">', '</div>' ); ?>
    </div>
  </div>
</header>   
    

  <div class="max-w-7xl mx-auto px-4">
    <nav class="mt-12">
      <div class="container"></div>
      <div class="pb-16">
        <div class="container">
          <ul class="flex gap-x-6">

            <li class="shrink-0 last:pr-outer-gutter">  
              <a href="<?php echo home_url( 'blog' ) ?>" class="relative z-0 group rounded-full inline-flex border border-primary <?php echo !is_category( ) ? 'bg-indigo-600 text-white' : ''; ?>" data-scrolltocurrent-item="">
                <span class=" inset-0 rounded-full px-6 py-2">All</span>
              </a>
            </li>

            <?php

            $all_categories = get_categories();

            foreach ($all_categories as $cat) {
            ?>

            <li class="shrink-0 last:pr-outer-gutter">
              <a href="<?php echo home_url( 'category' ) ?>/<?php echo $cat->slug; ?>" class="relative z-0 group rounded-full inline-flex border border-primary <?php echo get_category( get_query_var( 'cat' ) )->slug === $cat->slug ? 'bg-indigo-600 text-white' : ''; ?>" data-scrolltocurrent-item="">
                <span class=" inset-0 rounded-full px-6 py-2"><?php echo $cat->name; ?></span>
              </a>
            </li>

            <?php
            }
            ?>

            </ul>
          </div>
        </div>
      </nav>

    <div class="loop-container mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 pb-20">  

      <?php
      while ( have_posts() ) :
        the_post();

        ?>
    
        
        <?php
        
        //get_template_part( 'template-parts/content', 'post' );

      endwhile; // End of the loop.
      ?>
  </div>
</div>
      
<?php
get_footer();
