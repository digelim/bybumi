<?php 

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_id() ), 'single-post-thumbnail' );

if ( empty($image) ) {
    
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->get_parent_id() ), 'single-post-thumbnail' );
}

$product_attributes = $product->get_attributes();


$units_sold = get_post_meta($product->get_id(), 'total_sales', true);
$price = $product->get_price();
$rate = get_post_meta($product->get_id(), '_wc_average_rating', true);
$date = ($product->get_date_created())->getTimestamp();

?>

<div data-id="<?php echo $product->get_id(); ?>" class="custom-product-item-wrapper group relative flex flex-col" data-units_sold="<?php echo $units_sold; ?>" data-price="<?php echo $price; ?>" data-date="<?php echo $date;?>" data-rate="<?php echo $rate;?>">
	<a href="<?php echo $product->get_permalink(); ?>" class="product-item-custom relative z-10 min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:aspect-none lg:h-80">
		<?php 
			
			$newness_days = 14;
			$created = strtotime( $product->get_date_created() );
			if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
				echo '<span class="itsnew onsale">' . esc_html__( 'New!', 'woocommerce' ) . '</span>';
			}

			?>
		<img src="<?php echo $image[0];?>" alt="Image" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
	</a>
	<div class="custom-product-details pt-4 flex justify-between items-center">
		<div>
		<h3 class="text-sm text-gray-700">
			<span aria-hidden="true" class="absolute inset-0"></span>
			<?php echo $product->get_title(); ?>
		</h3>
		</div>
		<p class="text-sm font-medium text-gray-900"><?php echo $product->get_price_html();
?></p>
	<?php

	if ( $product->is_type( 'variable' ) ) {
		?>
		
		<a href="<?php echo $product->get_permalink(); ?>" class="add-to-cart-custom flex bg-gray-100 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-200 opacity-0 absolute right-0">View options</a>
		
		<?php
	} else {
		?>
		
		<a href="<?php echo home_url() . '?add-to-cart=' . $product->get_id(); ?>" data-product_id="<?php echo $product->get_id(); ?>" data-product_sku="<?php echo esc_attr($product->get_sku()) ?>" class="ajax_add_to_cart add_to_cart_button add-to-cart-custom flex bg-gray-100 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-200 opacity-0 absolute right-0">Add to bag</a>
		
		<?php
	}

	?>
	
	</div>
</div>
<?php