<?php $arjunaOptions = arjuna_get_options(); ?>
<?php get_header(); ?>

<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>

<div class="contentArea" id="contentArea">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		<?php if(!$arjunaOptions['pages_showInfoBar']): ?>
			<div class="postHeaderCompact"><div class="inner">
				<a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><h1 class="postTitle"><?php echo get_the_title($post->post_parent); ?></h1></a>
				<div class="bottom"><span></span></div>
			</div></div>
		<?php endif; ?>
		<nav id="image-navigation">
			<span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'Arjuna' ) ); ?></span>
			<span class="next-image"><?php next_image_link( false, __( 'Next &rarr;', 'Arjuna' ) ); ?></span>
		</nav>
		<div class="postContent centered">
			<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php
			$attachment_size = apply_filters( 'arjuna_attachment_size', array( $GLOBALS['__g_content_area_width'], $GLOBALS['__g_content_area_width'] ) );
			echo wp_get_attachment_image( $post->ID, $attachment_size );
			?></a>
		</div>
		<div class="postLinkPages"><?php wp_link_pages('before=<strong>'.__('Pages:', 'Arjuna').'</strong>&pagelink=<span>'.__('Page %', 'Arjuna').'</span>'); ?></div>
		<?php get_template_part( 'templates/post/single-page-footer' ); ?>
	</div>
	<?php if(arjuna_is_show_comments() || arjuna_is_show_trackbacks()): ?>
		<div class="postComments" id="comments">
			<?php comments_template('', true); ?>
		</div>
	<?php endif; ?>

	<?php endwhile; ?>

	<?php else : ?>
  <p><?php _e('There is nothing here.', 'Arjuna'); ?></p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
