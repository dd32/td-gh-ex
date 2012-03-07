<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die ('Please do not load this page directly. Thanks!');
	}

	if ( post_password_required() ) {
		echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
		return;
	}
?>

<?php // You can start editing here. ?>

<?php if ( have_comments() ) : ?>
	<div id="comments" class="clear">
		<h3 id="comments-title">
			<?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number()),
				number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?>
		</h3>
	
		<ul class="commentlist">
			<?php  wp_list_comments( 'callback=autoshow_list_comments' ); ?>
		</ul>
	
		<div class="navigation"><?php paginate_comments_links(); ?></div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
	<?php else : // comments are closed ?>
		<?php if(is_page() == false): ?>
			<p>Comments are closed.</p>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

<?php
//---------------------------------------------------------------------------------------------------------
// We do not use "comment_form()", but we copied the code from this URL:
// 		"http://ottopress.com/2010/wordpress-3-0-theme-tip-the-comment-form/" and we modified this code.
//--------------------------------------------------------------------------------------------------------
?>

<?php autoshow_comment_form($post, $user_ID, $user_identity); ?>
	
<?php
//---------------------------------------------------------------------------------------------------------
// Here is the end of the code that replaces "comment_form()" function.
//---------------------------------------------------------------------------------------------------------
?>			
<div style="clear: both;"></div>