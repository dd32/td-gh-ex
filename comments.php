<?php 
/**
 * The template for displaying the comments
 *
 * @package astrology
 */
?>
<?php if ( have_comments() ) : ?>
<div class="comment-part" id="comments">
		<h3><?php echo comments_number(); ?></h3>
		<?php
			wp_list_comments('type=comment&callback=AstrologyComment'); ?>
</div>
<?php 
	endif; 
	$fields =  array(
		'author' =>
		'<div class="row"><div class="col-sm-5"><div class="group">' .
		( $req ? '<span class="required"></span>' : '' ) .
		'<input id="author" name="author" placeholder="Name" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" required/> <span class="highlight"></span></div></div>',
		'email' =>
		'<div class="col-sm-7"><div class="group">'.
		( $req ? '<span class="required"></span>' : '' ) .
		'<input id="email" name="email" placeholder="Email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30" required/><span class="highlight"></span></div></div></div>',
	);

	$commentBox = '<div class="row"><div class="col-sm-12"><div class="group">' .
        '<textarea id="comment" name="comment" placeholder="Message" cols="20" rows="6" required></textarea>' .
        '<span class="highlight"></span></div></div></div>';

	comment_form( array(
		'comment_field' => $commentBox,
		'fields' => $fields,
		'title_reply' => 'Post Your Comment',
		'title_reply_before' => '<h3>',
		'title_reply_after'  => '</h3>',
		'comment_notes_before' => '',
		'class_form' => 'leave-reply-form',
		'label_submit' => __( 'POST' , 'astrology'),
		'class_submit' => 'postBtn',
	) ); ?>