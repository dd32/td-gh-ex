<?php
/**
 * The template for displaying comments
 *
 * @package ariel
 */
if ( post_password_required() ) { return; }

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );

if ( is_user_logged_in() ) {
	$close_div = '</div><!-- row -->';
} else {
	$close_div = '';
}
$comment_field = '<div class="row">
					<div class="col-sm-11">
						<div class="form-group">
							<label class="form-label">' . esc_html__( 'Comment', 'ariel' ) . '</label>
							<textarea rows="8" cols="" class="form-control" id="comment" name="comment"></textarea>
						</div><!-- form-group -->
					</div><!-- col-sm-11 -->' . $close_div;

$fields = array(
	'author' => '<div class="col-sm-5">
					<div class="form-group">
						<label class="form-label">' . esc_html__( 'Name', 'ariel' ) . ( $req ? '<span class="asterik">*</span>' : '' ) . '</label>
						<input type="text" class="form-control" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" />
					</div><!-- form-group -->',

	'email'  => '<div class="form-group">
					<label class="form-label">' . esc_html__( 'Email', 'ariel' ) . ( $req ? '<span class="asterik">*</span>' : '' ) . '</label>
					<input type="email" class="form-control" name="email" id="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" />
				</div><!-- form-group -->',

	'url'    => '<div class="form-group">
					<label class="form-label">' . esc_html__( 'Website', 'ariel' ) . '</label>
					<input type="text" class="form-control" name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
				</div><!-- form-group -->
			</div><!-- col-sm-5 -->
		</div><!-- row -->'
);


$class_submit = 'btn btn-dark';

$comment_form_args = array(
	'fields'        => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field' => $comment_field,
	'class_submit'  => $class_submit
); ?>

<div id="comments" class="comments">

	<?php if ( have_comments() ) { ?>
		<h3 class="comment-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'ariel' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s thought on &ldquo;%2$s&rdquo;',
							'%1$s thoughts on &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'ariel'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 0,
				) );
			?>
		</ul>

		<?php the_comments_navigation(); ?>

	<?php }

	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		esc_html_e( 'Comments are closed.', 'ariel' );
	}

	if ( comments_open() ) {
		if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
			printf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'ariel' ),
				wp_login_url( get_permalink() )
			);
		} else {
			comment_form( $comment_form_args );
		}
	} ?>

</div>