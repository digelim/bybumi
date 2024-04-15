
<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$product = wc_get_product( $post );


$terms = get_terms( 'pa_color');
    
?>

<style type="text/css">

<?php

        
foreach ( $terms as $key => $term ) {
    ?>
    
    [data-value=<?php echo $term->slug; ?>] {
        background-color: <?php echo $term->slug;?> !important;
        color: <?php echo $term->slug;?> !important;
    }
    
    <?php
}
?>

</style>

<?php

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'single-post-thumbnail' );

$attachment_ids = $product->get_gallery_image_ids();


get_header( 'shop' ); 

?>
<div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
<div class="pt-6">
<div class="mb-6">
        <?php woocommerce_breadcrumb();?>
      </div>
<div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
      
        <!-- Image gallery -->
        <div class="flex flex-col-reverse">
          <!-- Image selector -->
          
                <?php
				
				if ( sizeof( $attachment_ids ) > 0 ) {

					?>
					
					<div class="hidden mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
						<div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
						<button class="relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50" aria-controls="tabs-2-panel-1" role="tab" type="button">
								<span class="sr-only"> Angled view </span>
									<span class="absolute inset-0 rounded-md overflow-hidden gallery-thumbnail">
										<img src="<?php echo $image[0]; ?>" alt="" class="w-full h-full object-center object-cover">
									</span>
									
									<span class="ring-transparent absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none" aria-hidden="true"></span>
             					 </button>
								<?php
								for ($i=0; $i < sizeof( $attachment_ids ); $i++) { 
									?>
									<button class="gallery-thumbnail relative h-24 bg-white rounded-md flex items-center justify-center text-sm font-medium uppercase text-gray-900 cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring focus:ring-offset-4 focus:ring-opacity-50" aria-controls="tabs-2-panel-1" role="tab" type="button">
								<span class="sr-only"> Angled view </span>
									<span class="absolute inset-0 rounded-md overflow-hidden">
										<img src="<?php echo wp_get_attachment_url( $attachment_ids[$i] ); ?>" alt="" class="w-full h-full object-center object-cover">
									</span>
									
									<span class="ring-transparent absolute inset-0 rounded-md ring-2 ring-offset-2 pointer-events-none" aria-hidden="true"></span>
             					 </button>
									<?php
									}

									?>
									
									 <!-- Selected: "ring-indigo-500", Not Selected: "ring-transparent" -->
									

								<!-- More images... -->
								</div>
							</div>

									<?php
								}
				
				?>

          <div class="w-full aspect-w-1 aspect-h-1">
            <!-- Tab panel, show/hide based on tab state. -->
            <div aria-labelledby="tabs-2-tab-1" role="tabpanel" tabindex="0">
              <img id="tabs-2-panel-1" src="<?php echo $image[0]; ?>" alt="Image" class="w-full h-full object-center object-cover sm:rounded-lg">
            </div>

            <!-- More images... -->
          </div>
        </div>

        <!-- Product info -->
        <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
          <h1 class="text-3xl font-extrabold tracking-tight text-gray-900"><?php echo $product->get_title(); ?></h1>

          <div class="mt-3">
            <h2 class="sr-only">Product information</h2>


            
            <p class="custom-price-heading text-3xl text-gray-900"><?php echo $product->get_price_html();
?></p>
          </div>
          <!-- Reviews -->
          <div class="mt-3">
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                
              <?php

              if ( wc_review_ratings_enabled() ) {
                $rating_count = $product->get_rating_count();
                $review_count = $product->get_review_count();
                $average      = $product->get_average_rating();

                if ( $rating_count > 0 ) : ?>

                  <div class="woocommerce-product-rating">
                    <?php echo wc_get_rating_html( $average, $rating_count ); // WPCS: XSS ok. ?>
                    <?php if ( comments_open() ) : ?>
                      <?php //phpcs:disable ?>
                      <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a>
                      <?php // phpcs:enable ?>
                    <?php endif ?>
                  </div>

                <?php endif; ?>

              <?php
              }
              ?>
              
              </div>
              <p class="sr-only"><?php echo $average; ?> out of 5 stars</p>
            </div>
          </div>

          <div class="mt-6">
            <h3 class="sr-only">Description</h3>

            <div class="text-base text-gray-700 space-y-6">
              <p><?php echo $product->get_short_description();?></p>
            </div>
          </div>

          <div class="mt-6 flex items-center gap-[20px]">
            <!-- <div class="mt-10 flex sm:flex-col1 gap-4 product-quantity"> -->
            <div class="mt-[20px] flex sm:flex-col1 gap-4 grow">

			      <?php do_action( 'woocommerce_single_product_summary' ); ?>
            
            </div>

            <section aria-labelledby="details-heading" class="mt-12">
            <h2 id="details-heading" class="sr-only">Additional details</h2>

            <div class="border-t divide-y divide-gray-200">
              <div>
                <div class="pb-6 prose prose-sm" id="disclosure-1">
          				<?php $product->get_short_description(); ?>
                </div>
                
              </div>

            </div>
          </section>

          </div>
        </div>
	</div>

  <div class="max-w-2xl mx-auto pt-16 sm:pt-24 lg:max-w-7xl lg:pt-32">
    <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Product Description</h2>
    <div class="prose mt-3 ">
      <?php the_content(); ?>
    </div>
  </div>

  <?php wc_get_template_part('single', 'product-reviews'); ?>


  <section aria-labelledby="related-heading" class="mt-16 sm:mt-24">
                <h2 id="related-heading" class="text-lg font-medium text-gray-900">Customers also purchased</h2>

                <?php
                
                woocommerce_related_products( array(
                  'posts_per_page' => 4,
                  'columns'        => 4,
                  'orderby'        => 'rand'
              ) );

                ?>

                  <!-- More products... -->
                </div>
              </section>

</div>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
