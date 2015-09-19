<?php
/**
 * @package HowlThemes
 */
?>
<?php wpb_set_post_views(get_the_ID()); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="text">', '</h1>' ); ?>

		<div class="entry-meta">
			<div class="postdcp"><?php drag_themes_posted_on(); ?></div>
        <?php showstarrating();?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
<div class="ads-container-cmnt">
  <?php echo stripslashes(get_option('dt_custom_ads_abovecmt')) ?>
</div>
	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'howl-themes' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php drag_themes_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
