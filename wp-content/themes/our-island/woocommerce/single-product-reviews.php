<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * 
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title">
			<?php
			$count = $product->get_review_count();
			?>
		</h2>
		<div class="bg-white">
				<div class="max-w-2xl mx-auto pt-16 sm:pt-24 lg:max-w-7xl lg:pt-32 lg:grid lg:grid-cols-12 lg:gap-x-8">
					<div class="lg:col-span-4">
						<h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Customer Reviews</h2>
						<div class="mt-3 flex items-center">
							<div>
								<div class="flex items-center">

									<?php
									
									$rating = $product->get_average_rating();
									$width = $rating ? ( $rating / 5 ) * 100 : 0;
									
									?>	
									<div class="star-rating" role="img" aria-label="Rated <?php echo $rating; ?> out of 5">
										<span style="width:<?php echo $width; ?>%">Rated <strong class="rating"><?php echo $rating; ?></strong> out of 5</span>
									</div>
									<p class="sr-only"><?php echo $rating; ?> out of 5 stars</p>
								</div>
								</div>
								<p class="ml-2 text-sm text-gray-900"><?php echo $count > 0 && wc_review_ratings_enabled() ? sprintf( esc_html( _n( 'Based on %1$s review', 'Based on %1$s reviews', $count, 'woocommerce' ) ), esc_html( $count ) ) : 'No reviews yet.'; ?></p>
							</div>

							<div class="mt-6">
								<h3 class="sr-only">Review data</h3>
							</div>

							<?php
							
							if ( !has_reviewed_product( $product->get_id() )) {
								?>
								
								<div class="mt-10">
									<h3 class="text-lg font-medium text-gray-900">Share your thoughts</h3>
									<p class="mt-1 text-sm text-gray-600">If you’ve used this product, share your thoughts with other customers</p>

									<a href="#" class="write-review-button mt-6 inline-flex w-full bg-white border border-gray-300 rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-50 sm:w-auto lg:w-full">Write a review</a>
								</div>
								
								<?php
							}
							
							?>
					</div>

					<div class="mt-16 lg:mt-0 lg:col-start-6 lg:col-span-7">
						<h3 class="sr-only">Recent reviews</h3>

						<div class="flow-root">
							<div class="-my-12 divide-y divide-gray-200">

								<?php
								$comments = get_comments( 
									array( 
										'post_id'      => $product->get_id(),
										'post_type'    => 'product',
										'comment_type' => 'review'
										) 
									);
									
									foreach ( $comments as $comment ) {
										?>
										
										<div class="py-12">
										<div class="flex items-center">
										<img src="<?php echo get_avatar_url(get_comment_author_email( $comment ));?>" alt="<?php echo $comment->comment_author;?>" class="h-12 w-12 rounded-full">
										<div class="ml-4">
											<h4 class="text-sm font-bold text-gray-900"><?php echo $comment->comment_author;?></h4>
											<?php
											$rating = get_comment_meta($comment->comment_ID, 'rating', true);
											$width = $rating ? ( $rating / 5 ) * 100 : 0;
											?>
											<div class="star-rating" role="img" aria-label="Rated <?php echo $rating; ?> out of 5">
												<span style="width:<?php echo $width; ?>%">Rated <strong class="rating"><?php echo $rating; ?></strong> out of 5</span>
											</div>
											<p class="sr-only"><?php echo $rating; ?> out of 5 stars</p>
										</div>
										</div>

										<div class="mt-4 space-y-6 text-base italic text-gray-600">
										<p><?php echo $comment->comment_content;?></p>
										</div>
									</div>

									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
							'next_text' => is_rtl() ? '&larr;' : '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			endif;
			?>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper" class="hidden">
			<div id="review_form">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => $count > 0 ? esc_html__( 'Add a review', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to leave a comment', 'woocommerce' ) ),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
					'title_reply_before'  => '<span id="reply-title" class="text-lg leading-6 font-medium text-black">',
					'title_reply_after'   => '</span><div class="text-sm text-gray-500 mb-8 mt-2">'. get_the_title() .'</div>',
					'comment_notes_after' => '',
					'label_submit'        => esc_html__( 'Submit', 'woocommerce' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
					'submit_field'=>'<p class="form-submit"><a href="#" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4">Cancel</a>%1$s %2$s</p>'
				);

				
				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'woocommerce' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __( 'Email', 'woocommerce' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					)
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
					$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="required"></span>';
					}

					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

					$comment_form['fields'][ $key ] = $field_html;
				}

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment" class="sr-only">Comment</label><textarea id="comment" name="comment" rows="3" class="shadow-sm block w-full sm:text-sm border border-gray-300 rounded-md px-2 py-2 mt-4" placeholder="Leave a comment"></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
