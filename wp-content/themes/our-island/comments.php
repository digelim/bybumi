<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package our-island
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if ( have_comments() ) :
	?>

	<section aria-labelledby="activity-title" class="mt-8 xl:mt-10">
		<div>
			<div class="divide-y divide-gray-200">
				<div class="pb-4">
					<h2 id="activity-title" class="text-lg font-medium text-gray-900">Activity</h2>
				</div>
				<div class="pt-6">
					<div class="flow-root">
						<ul role="list" class="-mb-8">
					
						<?php

						$args = array( 'post_id' => $post->ID );

						$comments = get_comments( $args );

						foreach ( $comments as $comment ): ?>
							
							<li>
								<div class="relative pb-8">
									<span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
									<div class="relative flex items-start space-x-3">
										<div class="relative">
											<img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white" src="<?php echo get_avatar_url(get_comment_author_email( $comment ))?>" alt="">

											<span class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
												<!-- Heroicon name: solid/chat-alt -->
												<svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
												<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
												</svg>
											</span>
										</div>
										<div class="min-w-0 flex-1">
											<div>
												<div class="text-sm">
													<a href="#" class="font-medium text-gray-900"><?php echo $comment->comment_author;?></a>
												</div>
												<p class="mt-0.5 text-sm text-gray-500"><?php echo $comment->comment_date; ?></p>
											</div>
											<div class="mt-2 text-sm text-gray-700">
												<p><?php echo $comment->comment_content;?></p>
											</div>
										</div>
									</div>
								</div>
							</li>
						
						<?php endforeach; ?>
					
						</ul>
					</div>
					<div class="mt-6">
						<div class="flex space-x-3">
							<div class="flex-shrink-0">
								<div class="relative">
									<img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white" src="<?php echo get_avatar_url(wp_get_current_user()->user_email()); ?>" alt="">

									<span class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
										<!-- Heroicon name: solid/chat-alt -->
										<svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
											<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
										</svg>
									</span>
								</div>
							</div>
							<div class="min-w-0 flex-1">
						
	<?php

	if ( ! comments_open() ) :
		?>
		
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'our-island' ); ?></p>
		
		<?php
	endif;
else: 

?>
							
								<section aria-labelledby="activity-title" class="mt-8 xl:mt-10">
									<div>
										<div class="divide-y divide-gray-200">
											<div class="pb-4">
												<h2 id="activity-title" class="text-lg font-medium text-gray-900">Leave a comment</h2>
											</div>
										</div>

<?php

endif;

$args = array(
	'fields'=> array(
		'author' => sprintf(
			'<p class="comment-form-author">%s %s</p>',
			sprintf(
				'',
				__( 'Name' )
			),
			sprintf(
				'<input id="author" name="author" type="text" value="%s" size="30" maxlength="245" autocomplete="name" placeholder="Name" class="shadow-sm block w-full focus:ring-gray-900 focus:border-gray-900 sm:text-sm border border-gray-300 rounded-md px-2 py-2"/>',
				esc_attr( $commenter['comment_author'] )
			)
		),
		'email'  => sprintf(
			'<p class="comment-form-email">%s %s</p>',
			sprintf(
				'',
				__( 'Email' )
			),
			sprintf(
				'<input id="email" name="email" value="%s" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email" type="email" placeholder="Email" class="shadow-sm block w-full focus:ring-gray-900 focus:border-gray-900 sm:text-sm border border-gray-300 rounded-md px-2 py-2"/>',
				esc_attr( $commenter['comment_author_email'] )
			)
		),
		'url'    => '',
	),
	'comment_field' => '<div><label for="comment" class="sr-only">Comment</label><textarea id="comment" name="comment" rows="3" class="shadow-sm block w-full focus:ring-gray-900 focus:border-gray-900 sm:text-sm border border-gray-300 rounded-md px-2 py-2" placeholder="Leave a comment"></textarea></div>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'logged_in_as'=>'',
	'must_log_in'=>'',
	'title_reply' => '',
	'class_submit' => 'submit mt-6  w-auto',
	'label_submit' => 'Comment',
	'submit_field' => '<p class="form-submit flex justify-end">%1$s %2$s</p>',
);

comment_form( $args );
?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</section>


</div><!-- #comments -->
