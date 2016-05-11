<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package App_Landing_Page
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php echo  '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">'?>
 		<?php the_post_thumbnail( 'app-landing-page-with-sidebar' ) ; ?>
    <?php echo'</a>';?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php app_landing_page_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<a href="<?php the_permalink(); ?>" class="btn-readmore"><?php esc_html_e( 'Read More', 'app-landing-page' ); ?></a>
		<?php app_landing_page_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
