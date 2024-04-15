<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * 
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>
<?php 
$bg_class = '';

if (function_exists('z_taxonomy_image_url')) {
  $image = z_taxonomy_image_url();
  $bg_class = 'style="background: url('. $image . '); background-position: center; background-size: cover; background-attachment: fixed;"';
} 
?>

<header class="woocommerce-products-header"  <?php echo $bg_class;?>>

<div class="max-w-7xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900"><?php woocommerce_page_title(); ?></h1>
    <p class="mt-4 max-w-xl text-sm text-gray-700">Our thoughtfully designed workspace objects are crafted in limited runs. Improve your productivity and organization with these sale items before we run out.</p>
  </div>
</header>

<section aria-labelledby="filter-heading" class="relative">
    <h2 id="filter-heading" class="sr-only">Filters</h2>
    <div class="absolute w-full bg-transparent bottom-0 z-10 bg-white border-b border-gray-200 py-4">
      <div class="max-w-7xl mx-auto px-4 flex items-center justify-between sm:px-6 lg:px-8">
        <div class="relative inline-block text-left sorter">
          <div>
            <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" id="menu-button" aria-expanded="false" aria-haspopup="true">
              Sort
              <!-- Heroicon name: solid/chevron-down -->
              <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>

          <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
          <div class="origin-top-left absolute left-0 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
            <div class="py-1" role="none">
              <!--
                Active: "bg-gray-100", Not Active: ""

                Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
              -->
              <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0" data-value="popularity"> Most Popular </a>

              <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1" data-value="rating"> Best Rating </a>

              <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2" data-value="date"> Newest </a>
            
              <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3" data-value="price"> Price </a>
            </div>
          </div>
        </div>

        <!-- Mobile filter dialog toggle, controls the 'mobileFiltersOpen' state. -->
        <button type="button" class="inline-block text-sm font-medium text-gray-700 hover:text-gray-900 sm:hidden">Filters</button>

        <div class="hidden sm:block">
          <div class="flow-root">
            <div class="-mx-4 flex items-center divide-x divide-gray-200">
              <div class="px-4 relative inline-block text-left">
                <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false">
                  <span>Category</span>

                  <span class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-gray-700 tabular-nums"></span>
                  <!-- Heroicon name: solid/chevron-down -->
                  <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>

                <!--
                  'Category' dropdown, show/hide based on dropdown state.

                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                <div class="origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none hidden">
                  <form class="space-y-4">


                    <?php

                    $taxonomy = 'product_cat';
                    $orderby  = 'name';
                    $empty    = 1;

                    $args = array(
                         'taxonomy'        => $taxonomy,
                         'orderby'         => $orderby,
                         'hide_empty'      => $empty,
                         'taxonomy'        => 'product_cat',
                         'hierarchical'    =>1,
                         'show_count'      => 1,
                    );

                    $all_categories = get_categories( $args );

                    $cats_tree = get_cat_tree( 0, $all_categories );

                    render_category_tree( $cats_tree );

                    foreach ($all_categories as $cat) {

                        
                        $products = new WP_Query( array(
                           'post_type'      => array('product','product_variation'),
                           'post_status'    => 'publish',
                           'posts_per_page' => -1,
                           'tax_query'      => array( array(
                                'taxonomy'        => 'product_cat',
                                'field'           => 'slug',
                                'terms'           =>  array($cat->slug),
                                'operator'        => 'IN',
                            ) )
                        ) );
                        
                        $count = $products->post_count;


                    }

                    ?>

                  </form>
                </div>
              </div>


            <?php

            foreach( wc_get_attribute_taxonomies() as $values ) {
                // Get the array of term names for each product attribute
                $term_names = get_terms( array('taxonomy' => 'pa_' . $values->attribute_name, 'fields' => 'names' ) );
            
                $label = $values->attribute_label;
                
                ?>
                
                
                <div class="px-4 relative inline-block text-left">
                  <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" aria-expanded="false">
                    <span><?php echo $label;?></span>
                <span class="ml-1.5 rounded py-0.5 px-1.5 bg-gray-200 text-xs font-semibold text-gray-700 tabular-nums"></span>

                    <!-- Heroicon name: solid/chevron-down -->
                    <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                
                <div class="origin-top-right absolute right-0 mt-2 bg-white rounded-md shadow-2xl p-4 ring-1 ring-black ring-opacity-5 focus:outline-none hidden">
                  <form class="space-y-4">
                
                
                <?php
                
                foreach( $term_names as $key => $value ) {
                    
                    $products = new WP_Query( array(
                       'post_type'      => array('product'),
                       'post_status'    => 'publish',
                       'posts_per_page' => -1,
                       'tax_query'      => array( array(
                            'taxonomy'        => 'pa_'.$values->attribute_name,
                            'field'           => 'slug',
                           'terms'           =>  array($value),
                           'operator'        => 'IN',
                        ) )
                    ) );
                    
                    $count = $products->post_count;
                    
                    ?>
                    

                    <div class="flex items-center">
                      <input data-count="<?php echo $count; ?>" id="filter-<?php echo $label;?>-<?php echo $key;?>" data-attribute="<?php echo $label;?>" name="<?php echo $label;?>[]" value="<?php echo $value; ?>" type="checkbox" class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                      <label for="filter-<?php echo $label;?>-<?php echo $key;?>" class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap"> <?php echo $value; ?> </label>
                    </div>
                    
                    <?php } ?>
                    
                    <!--
                      'Color' dropdown, show/hide based on dropdown state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                    
                        
                      </form>
                    </div>
                </div>
                
                <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Active filters -->
    <div class="bg-gray-100">
      <div class="max-w-7xl mx-auto py-3 px-4 sm:flex sm:items-center sm:hidden sm:px-6 lg:px-8 hidden">
        <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">
          Filters
          <span class="sr-only">, active</span>
        </h3>

        <div aria-hidden="true" class="hidden w-px h-5 bg-gray-300 sm:block sm:ml-4"></div>

        <div class="mt-2 sm:mt-0 sm:ml-4">
          <div class="-m-1 flex flex-wrap items-center">
            <span id="filters-Category" data-filter="Category" class="m-1 inline-flex rounded-full border border-gray-200 items-center py-1.5 pl-3 pr-2 text-sm font-medium bg-white text-gray-900 hidden">
              <span>Category</span>
              <button type="button" class="flex-shrink-0 ml-1 h-4 w-4 p-1 rounded-full inline-flex text-gray-400 hover:bg-gray-200 hover:text-gray-500">
                <span class="sr-only">Remove filter for Objects</span>
                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                  <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                </svg>
              </button>
            </span>

            <?php

            foreach( wc_get_attribute_taxonomies() as $values ) {
            
                $term_names = get_terms( array('taxonomy' => 'pa_' . $values->attribute_name, 'fields' => 'names' ) );

                $label = $values->attribute_label;

                
                ?>
                
                <span id="filters-<?php echo $label; ?>" data-filter="<?php echo $label; ?>" class="m-1 inline-flex rounded-full border border-gray-200 items-center py-1.5 pl-3 pr-2 text-sm font-medium bg-white text-gray-900 hidden">
                  <span><?php echo $label;?></span>
                  <button type="button" class="flex-shrink-0 ml-1 h-4 w-4 p-1 rounded-full inline-flex text-gray-400 hover:bg-gray-200 hover:text-gray-500">
                    <span class="sr-only">Remove filter for <?php echo $label; ?></span>
                    <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                      <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                    </svg>
                  </button>
                </span>
                
                <?php
                
            }


            ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="max-w-7xl mx-auto px-4">
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();
  ?>

  <div class="ajax-shortcode-wrapper">

  <?php
	if ( wc_get_loop_prop( 'total' ) ) {
    echo do_shortcode('[ajax_load_more id="custom" container_type="div" css_classes="loop-container mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 pb-20" post_type="product" category__not_in="1"]');

    the_post_navigation();

	}


  ?>

  </div>

  <?php
	// woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
?>

</div>

<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
