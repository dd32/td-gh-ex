<?php
/* 	Selfie's Comments Area for Single Pages
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Selfie 1.0
*/


if ( post_password_required() ) { return; }
?>

<div id="comments">
<?php if ( have_comments() ) : ?>
	<h2 class="commentsbox"><?php comments_number( esc_html__('No Comments', 'selfie'), esc_html__('One Comment', 'selfie'),  esc_html__('% Comments', 'selfie') );?>to  <a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
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
		<p class="watermark"><?php esc_html__('Comments are Closed', 'selfie'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
	<div id="comment-form">
		<?php comment_form(); ?>
	</div>
<?php endif; ?>
</div>
