<div id="comments">
<?php 
if ( post_password_required() ) { ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'cherish' ); ?></p>
</div>
<?php
	return;
}
if ( have_comments() ) { 
	?>
	<h2 id="comments-title"><?php comments_number(); ?></h2>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		<h3 class="paged-comments"><?php _e( 'Pages: ', 'cherish' ); paginate_comments_links( array('prev_text' => '', 'next_text' => '') ) ?></h3>
	<?php }?>			
		<ol class="commentlist">
		<?php wp_list_comments('callback=cherish_comment'); ?>
		</ol>
		<?php 
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
			<h3 class="paged-comments"><?php _e( 'Pages: ', 'cherish' ); paginate_comments_links( array('prev_text' => '', 'next_text' => '') ) ?></h3>
		<?php 
		}
}


$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$required_text = sprintf( ' ' . __('Required fields are marked %s', 'cherish'), '<span class="required">*</span>' );

$cherish_comments_args = array(
'comment_field' => 
		'<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'cherish' ) . ' <span class="required">*</span></label>
		<br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
'author' =>
    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'cherish' ) . 
    ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'cherish' ) . 
    ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',

'url' =>
    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'cherish' ) . '</label>' .
    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>',
	
'logged_in_as' =>
	'<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'cherish' ), 
	admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>' .
	'<p class="logged-in-as">' . $required_text . '</p>',
);

comment_form($cherish_comments_args);
?>
</div>
