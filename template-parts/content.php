<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aquarella
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-element">

		<!-- Featured image -->
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-featured-image">
			<a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
				<?php the_post_thumbnail('aquarella_imgsize_1', array('class' => ''));?>
			</a>
		</div>				
		<?php } ?>
		<!-- / Featured-image -->

		<header class="entry-header">
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<span class="entry-meta-content"><?php aquarella_posted_on(); ?></span>
			</div><!-- .entry-meta -->
			<div class="post-has-ct"></div>
			<?php
			endif; ?>

			<?php if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php if ( is_single() ) { ?>

				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aquarella-lite' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aquarella-lite' ),
						'after'  => '</div>',
					) );
				?>

			<?php	} else { ?>

					<?php the_excerpt();?>

					<a href="<?php the_permalink(); ?>" class="btn btn-special">See More</a>
			
			<?php } ?>
			
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php aquarella_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		
	</div>	
</article><!-- #post-## -->