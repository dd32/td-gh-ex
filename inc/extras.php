<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package adney
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function adney_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'adney_body_classes' );


if( ! function_exists("adney_comments_list") ){

	/**
	 * Comments link
	 *
	 */
	function adney_comments_list($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) {
			case 'pingback' :
			case 'trackback' :
				// Display trackbacks differently than normal comments.
				?>
				<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p><?php _e( 'Pingback:', 'adney' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'adney' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default :
				// Proceed with normal comments.
				global $post;
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>" class="comment media">
					<div class="pull-left comment-author vcard">
						<?php
						$get_avatar = get_avatar( $comment, 48 );
						$avatar_img = adney_get_avatar_url($get_avatar);
						//Comment author avatar
						?>
						<img class="avatar img-circle" src="<?php echo esc_url($avatar_img); ?>" alt="">
					</div>

					<div class="media-body">

						<div class="well">

							<div class="comment-meta media-heading">
                                <span class="author-name">
                                    <?php _e('By', 'adney'); ?> <strong><?php echo get_comment_author(); ?></strong>
                                </span>
								-
								<time datetime="<?php echo get_comment_date(); ?>">
									<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>
									<?php edit_comment_link( __( 'Edit', 'adney' ), '<small class="edit-link">', '</small>' ); //edit link ?>
								</time>

                                <span class="reply pull-right">
                                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' =>  sprintf( __( '%s Reply', 'adney' ), '<i class="icon-repeat"></i> ' ) , 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                                </span><!-- .reply -->
							</div>

							<?php if ( '0' == $comment->comment_approved ) {  //Comment moderation ?>
								<div class="alert alert-info"><?php _e( 'Your comment is awaiting moderation.', 'adney' ); ?></div>
							<?php } ?>

							<div class="comment-content comment">
								<?php comment_text(); //Comment text ?>
							</div><!-- .comment-content -->

						</div><!-- .well -->


					</div>
				</div><!-- #comment-## -->
				<?php
				break;
		} // end comment_type check

	}

}


if( ! function_exists('adney_comment_form') ){

	/**
	 * Comment form
	 */

	function adney_comment_form($args = array(), $post_id = null ){


		if ( null === $post_id )
			$post_id = get_the_ID();
		else
			$id = $post_id;

		$commenter = wp_get_current_commenter();
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';

		if ( ! isset( $args['format'] ) )
			$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';


		$req      =  get_option( 'require_name_email' );

		$aria_req = ( $req ? " aria-required='true'" : '' );

		$html5    = 'html5' === $args['format'];

		$fields   =  array(
				'author' => '
        <div class="form-group">
        <div class="col-sm-6 comment-form-author">
        <input   class="form-control"  id="author"
        placeholder="' . __( 'Name', 'adney' ) . '" name="author" type="text"
        value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />
        </div>',


				'email'  => '<div class="col-sm-6 comment-form-email">
        <input id="email" class="form-control" name="email"
        placeholder="' . __( 'Email', 'adney' ) . '" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . '
        value="' . antispambot( $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />
        </div>
        </div>',


				'url'    => '<div class="form-group">
        <div class=" col-sm-12 comment-form-url">' .
						'<input  class="form-control" placeholder="'. __( 'Website', 'adney' ) .'"  id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
        </div></div>',

		);

		$required_text = sprintf( ' ' . __('Required fields are marked %s', 'adney'), '<span class="required">*</span>' );

		$defaults = array(
				'fields'               => apply_filters( 'comment_form_default_fields', $fields ),

				'comment_field'        => '
    <div class="form-group comment-form-comment">
    <div class="col-sm-12">
    <textarea class="form-control" id="comment" name="comment" placeholder="' . _x( 'Comment', 'noun', 'adney' ) . '" rows="8" aria-required="true"></textarea>
    </div>
    </div>
    ',

				'must_log_in'          => '
    <div class="alert alert-danger must-log-in">'
						. sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'adney' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) )
						. '</div>',

				'logged_in_as'         => '<div class="alert alert-info logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'adney' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',

				'comment_notes_before' => '<div class="alert alert-info comment-notes">' . __( 'Your email address will not be published.', 'adney' ) . ( $req ? $required_text : '' ) . '</div>',

				'comment_notes_after'  => '<div class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'adney' ), ' <code>' . allowed_tags() . '</code>' ) . '</div>',

				'id_form'              => 'commentform',

				'id_submit'            => 'submit',

				'title_reply'          => __( 'Leave a Reply', 'adney' ),

				'title_reply_to'       => __( 'Leave a Reply to %s', 'adney' ),

				'cancel_reply_link'    => __( 'Cancel reply', 'adney' ),

				'label_submit'         => __( 'Post Comment', 'adney' ),

				'format'               => 'xhtml',
		);


		$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

		if ( comments_open( $post_id ) ) { ?>

			<?php do_action( 'comment_form_before' ); ?>

			<div id="respond" class="comment-respond">

				<h3 id="reply-title" class="comment-reply-title">
					<?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>
					<small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>
				</h3>

				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) { ?>

					<?php echo $args['must_log_in']; ?>

					<?php do_action( 'comment_form_must_log_in_after' ); ?>

				<?php } else { ?>

					<form action="<?php echo esc_url( site_url( '/wp-comments-post.php' ) ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>"
						  class="form-horizontal comment-form"<?php echo $html5 ? ' novalidate' : ''; ?> role="form">
						<?php do_action( 'comment_form_top' ); ?>

						<?php if ( is_user_logged_in() ) { ?>

							<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>

							<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>

						<?php } else { ?>

							<?php echo $args['comment_notes_before']; ?>

							<?php

							do_action( 'comment_form_before_fields' );

							foreach ( (array) $args['fields'] as $name => $field ) {
								echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
							}

							do_action( 'comment_form_after_fields' );

						}

						echo apply_filters( 'comment_form_field_comment', $args['comment_field'] );

						echo $args['comment_notes_after']; ?>

						<div class="form-submit">
							<input class="btn green" name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
							<?php comment_id_fields( $post_id ); ?>
						</div>

						<?php do_action( 'comment_form', $post_id ); ?>

					</form>

				<?php } ?>

			</div><!-- #respond -->
			<?php do_action( 'comment_form_after' ); ?>
		<?php } else { ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php } ?>
		<?php


	}

}

if( ! function_exists('adney_get_avatar_url') ){
	/**
	 * Get avatar url
	 */
	function adney_get_avatar_url($get_avatar){
		preg_match("/src='(.*?)'/i", $get_avatar, $matches);
		return $matches[1];
	}
}

if( ! function_exists('adney_get_post_navigation') ){
function adney_get_post_navigation(){
	$navigation = '';
	$previous   = get_previous_post_link( '<i class="icon ion-arrow-left-c prev"></i> %link ', '<span>%title</span>', true );
	$next       = get_next_post_link( '%link <i class="icon ion-arrow-right-c next"></i>', '<span>%title</span>', true );

	// Only add markup if there's somewhere to navigate to.
	if ( $previous || $next ) {
		if($previous && !$next){
			$navigation = _navigation_markup( $previous , 'post-navigation' );
		}elseif(!$previous && $next){
			$navigation = _navigation_markup( $next, 'post-navigation' );
		}else{
			$navigation = _navigation_markup( $previous .'<span class="divisor">/</span>'. $next, 'post-navigation' );
		}

	}

	echo $navigation;
}
}


function adney_check_plugin_active(){
	if ( ! function_exists( 'is_plugin_active' ) ){
		require_once ABSPATH . '/wp-admin/includes/plugin.php' ;
	}
	if ( is_plugin_active( 'xylus-toolkit/xylus-toolkit.php' ) ) {
		return true;
	}else{
		return false;
	}

}
