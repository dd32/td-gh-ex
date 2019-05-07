<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package undedicated
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
		<?php
		//Define width of image
		if ( is_active_sidebar( 'primary-sidebar' ) ) {
				$undedicated_imgsize = 'feature-narrow';		
		} else {
				$undedicated_imgsize = 'feature-wide';		
		}
		
		if ( !is_singular() && has_post_thumbnail() ) {		
			$undedicated_featured_image = the_post_thumbnail( $undedicated_imgsize );
		} elseif( has_post_thumbnail() ) {
			$undedicated_featured_image = the_post_thumbnail( 'feature-wide' );
		}

		?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<p class="entry-meta">
			<?php undedicated_posted_on(); ?>
		</p><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		
			if ( !is_singular() ) {
				
				// Show the except
				the_excerpt();			

			} else {
			
				// Show the content
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'undedicated' ),
					'after'  => '</div>',
				) );
			}
		?>

	</div><!-- .entry-content -->

	<?php if ( is_singular() ) { ?>
	<footer class="entry-footer">
		<?php undedicated_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-## -->
