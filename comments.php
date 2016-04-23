<?php 
if ( post_password_required() ) {
	return;
}
?>

<?php
if( !function_exists('webriti_comments') ):
function webriti_comments( $comment, $args, $depth ){
	
	$GLOBALS['comment'] = $comment;
	
	//get theme data
	global $comment_data;
	
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : __('Reply','sis_spa');
	?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('media comments'); ?>>
	
		<figure class="comment-author">
			<?php echo get_avatar( $comment , $size = 70 ); ?>
		</figure>
		
		<div class="media-body">
			<div class="comment-content">
			
				<h5 class="fn"><?php comment_author(); ?> 
				
					<a href="#" class="datetime">
						<time datetime="<?php  echo comment_time('g:i a'); ?>">
						<?php echo comment_date('M j, Y');?> <?php _e('at','sis_spa') ?> <?php  echo comment_time('g:i a'); ?>
						</time>
					</a>
			
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth'], 'per_page' => $args['per_page']))) ?>
					</div>
				</h5>
				
				<?php comment_text(); ?>
			</div>
								
		</div>
	</div>
	<?php
}
endif; 
?>


<?php if ( have_comments() ) : ?>

<!--Comments-->
<div class="comments-area">
	
	<h3 class="comment-title">
	<?php 
	$comments_number = get_comments_number();
	
	if ( 1 === $comments_number ) {
		printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'sis_spa' ), get_the_title() );
	}
	else{
		printf(
				_nx(
					'%1$s thought on &ldquo;%2$s&rdquo;',
					'%1$s thoughts on &ldquo;%2$s&rdquo;',
					$comments_number,
					'comments title',
					'sis_spa'
				),
				number_format_i18n( $comments_number ),
				get_the_title()
			);
	}
	?>
	</h3>
	
	<?php wp_list_comments( array( 'callback' => 'webriti_comments' ) ); ?>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'sis_spa' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'sis_spa' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'sis_spa' ) ); ?></div>
		</nav>
		<?php }  
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'sis_spa' ); ?></p>
	<?php endif; ?>
						
</div>
<!--/End of Comments-->
<?php endif; ?>

<?php
		comment_form( array(
			'title_reply_before' => '<h3 class="comment-title">',
			'title_reply_after'  => '</h3>',
		) );
	?>