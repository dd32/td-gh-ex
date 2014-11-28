<?php
/**
 * @package blogghiamo
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta smallPart">
			<?php blogghiamo_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg">';
			the_post_thumbnail('normal-post');
			echo '</div>';
		}
	?>

	<div class="entry-content">
		<?php if ( '' != get_the_post_thumbnail() ): ?>
		<div class="crestaPostStripeInner">
			<i class="fa fa-lg fa-pencil"></i>
		</div>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links smallPart"><i class="fa fa-file-text spaceRight"></i>' . __( 'Pages:', 'blogghiamo' ),
				'after'  => '</div>',
				'link_before'      => '<span>',
				'link_after'       => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer smallPart">
		<?php blogghiamo_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<?php 
		global $blogghiamo_theme_options;
		$se_options = get_option( 'blogghiamo_theme_options', $blogghiamo_theme_options );
	?>
	
	<?php if ( ! $se_options['hidesocial'] ) : ?>
	<div class="theShareSpace">
		<h4><?php _e('Share This!', 'blogghiamo') ?></h4>
		<div class="theShareButton"><a rel="nofollow" title="<?php _e('Share on Facebook', 'blogghiamo'); ?>" href="http://facebook.com/share.php?u=<?php echo urlencode(get_permalink()) ?>" target="_blank"><i class="fa fa-facebook"></i></a></div>
		<div class="theShareButton"><a rel="nofollow" title="<?php _e('Share on Twitter', 'blogghiamo'); ?>" href="http://twitter.com/home?status=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') ?>+<?php echo urlencode(get_permalink()) ?>" target="_blank"><i class="fa fa-twitter"></i></a></div>
		<div class="theShareButton"><a rel="nofollow" title="<?php _e('Share on Google Plus', 'blogghiamo'); ?>" href="http://plus.google.com/share?url=<?php echo urlencode(get_permalink()) ?>" target="_blank"><i class="fa fa-google-plus"></i></a></div>
		<div class="theShareButton"><a rel="nofollow" title="<?php _e('Share on Linkedin', 'blogghiamo'); ?>" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(get_permalink()) ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') ?>" target="_blank"><i class="fa fa-linkedin"></i></a></div>
		<div class="theShareButton"><a rel="nofollow" title="<?php _e('Share on Stumbleupon', 'blogghiamo'); ?>" href="http://www.stumbleupon.com/badge/?url=<?php echo urlencode(get_permalink()) ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a></div>
		<div class="theShareButton"><a rel="nofollow" title="<?php _e('Share via Email', 'blogghiamo'); ?>" href="mailto:?subject=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') ?>&amp;body=<?php print urlencode( html_entity_decode( __('Read this interesting post', 'blogghiamo') ) ); ?>:&nbsp;<?php echo urlencode(get_permalink()) ?>" target="_blank"><i class="fa fa-envelope-o"></i></a></div>
	</div>
	<?php endif; ?>
	
</article><!-- #post-## -->
