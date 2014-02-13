<?php
/* Smartia Theme's Comments Area for Single Pages
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0  
*/

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
<p class="nocomments"><?php echo of_get_option('ppp1', 'This post is password protected. Enter the password to view comments.'); ?></p>
<?php
		return;
	}
?>

<div id="commentsbox">
<?php if ( have_comments() ) : ?>
	<h2 class="comments"><?php comments_number(of_get_option ('nocomments', 'No Comments') . '', of_get_option ('1comment', 'One Comment'), '% ' . of_get_option ('comments', 'Comments') . '' );  echo ' ' . of_get_option ('to2', ' to'); ?> <a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
	<ol class="commentlist">
		<?php wp_list_comments( array( 'avatar_size' => '150') ); ?>
	</ol>
	<div class="comment-nav">
		<div class="floatleft">
			<?php previous_comments_link() ?>
		</div>
		<div class="floatright">
			<?php next_comments_link() ?>
		</div>
	</div>
<?php else : ?>
	<?php if ( ! comments_open() && ! is_page() ) : ?>
		<p class="watermark"><?php echo of_get_option ('cac', 'Comments are Closed'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<div id="comment-form">
		<?php comment_form(); ?>
	</div>
<?php endif; ?>
</div>
