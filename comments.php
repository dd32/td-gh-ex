<?php
/* 	News Press's Comments Area for Single Pages
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since NewsPress 1.0
*/

	if ( post_password_required() ) { return; }
?>

<div id="commentsbox">
<div id="comments">
<?php if ( have_comments() ) : ?>
	<h2 class="comments"><?php comments_number(__('No Comments','newspress-lite') . '', __('One Comment','newspress-lite'), '% ' . __('Comments','newspress-lite') . '' );  echo ' ' . __(' to','newspress-lite'); ?> <a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
	<ol class="commentlist">
		<?php wp_list_comments( array( 'avatar_size' => '200' )  ); ?>
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
		<p class="watermark"><?php echo __('Comments are Closed','newspress-lite'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	
	<div id="comment-form">
		<?php comment_form(); ?>
	</div>
<?php endif; ?>
</div>
</div>
