<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package our-island
 */

?>

<footer aria-labelledby="footer-heading" class="bg-white">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="border-t border-gray-200 py-20">
        <div class="grid grid-cols-1 md:grid-cols-12 md:grid-flow-col md:gap-x-8 md:gap-y-16 md:auto-rows-min">
          <!-- Image section -->
            <?php get_sidebar('footer-1'); ?>
          <!-- Sitemap sections -->
          <div class="mt-10 col-span-6 gap-8 md:mt-0 md:row-start-1 md:col-start-3 md:col-span-8 lg:col-start-2 lg:col-span-6">
            <div class="flex justify-around">
            <?php get_sidebar('footer-2'); ?>
            </div>
          </div>

          <!-- Newsletter section -->
          <div class="mt-12 md:mt-0 md:row-start-2 md:col-start-3 md:col-span-8 lg:row-start-1 lg:col-start-9 lg:col-span-4">
            <?php get_sidebar('footer-3'); ?>
            
          </div>
        </div>
      </div>

      <div class="border-t border-gray-100 py-10 text-center">
        <p class="text-sm text-gray-500">© <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?>. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <?php
  
  if ( class_exists('WooCommerce') ):
    ?>
    
    
    <div class="mini-cart hidden absolute inset-x-0 mt-px pb-6 bg-white shadow-lg sm:px-2 lg:top-full lg:left-auto lg:right-0 lg:mt-3 lg:-mr-1.5 lg:w-80 lg:rounded-lg lg:ring-1 lg:ring-black lg:ring-opacity-5" style="right: 8vw;top: 100px;z-index: 110;">
        <h2 class="sr-only">Shopping Cart</h2>

        <form class="max-w-2xl mx-auto px-4">
        <ul role="list" class="minicart divide-y divide-gray-200">


        <?php
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ) );
                ?>

                <li class="py-4 flex items-center">

                    <?php

                    $thumbnail = '<img src="'. $image[0] .'" alt="Front of sienna cotton t-shirt." class="flex-none w-16 h-16 rounded-md border border-gray-200">';
                    printf( '<a href="%s" class="shrink-0">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.}

                    ?>
                    
                    <div class="ml-4 flex-auto">
                        <h3 class="font-medium text-gray-500 text-sm ">
                        <a href="<?php echo $product_permalink; ?>"><?php echo $_product->get_title(); ?></a>
                        </h3>
                    </div>

        
                </li>



                <?php
            }
        }
        ?>

        </ul>

        <a href="<?php echo wc_get_checkout_url() ?>" class="block text-center my-2 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Checkout</a>

        <p class="mt-6 text-center">
            <a href="<?php echo wc_get_cart_url() ?>" class="block text-center text-sm font-medium text-indigo-600 hover:text-indigo-500">View Shopping Bag</a>
        </p>
        </form>
    </div>
    
    <?php
  endif;
  ?>

<?php wp_footer(); ?>
</body>
</html>
