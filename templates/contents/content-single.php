<?php
/**
 * @package Conica
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( get_theme_mod( 'conica-single-page-fimage-layout' ) == 'conica-single-page-fimage-layout-standard' ) : ?>
	
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-content-img">
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
		<?php endif; ?>
		
	<?php endif; ?>
	
	<header class="entry-header">
		<div class="entry-meta">
			<?php conica_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'conica' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer">
		<?php conica_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->
