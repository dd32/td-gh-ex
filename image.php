<?php
/**
 * The Template for displaying all images.
 *
 * @package Aperture
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header();
?>

	<div id="primary" class="content-area image-attachment">
		<main id="main" class="site-main" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
	?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<div class="entry-attachment">
						<div class="attachment">
							<?php aperture_the_attached_image(); ?>
						</div><!-- .attachment -->

						<?php if ( has_excerpt() ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div><!-- .entry-caption -->
						<?php endif; ?>
					</div><!-- .entry-attachment -->

					<?php
						the_content();
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'aperture' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php aperture_posted_on(); ?>
					<?php edit_post_link( __( 'Edit', 'aperture' ), '<span class="edit-link">', '</span>' ); ?>
					<span class="full-size-link"><a target="_blank" href="<?php echo wp_get_attachment_url(); ?>">Full Size Image</a></span>

				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->

			<?php get_template_part( 'after', 'post' ); ?>

			<?php comments_template(); ?>

			<nav id="image-navigation" class="navigation image-navigation">
				<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'aperture' ); ?></h1>
				<div class="nav-links">
					<?php previous_image_link( false, '<div class="previous-image"><span class="meta-nav">&larr; </span>' . __( 'Previous Image', 'aperture' ) . '</div>' ); ?>
					<?php next_image_link( false, '<div class="next-image">' . __( 'Next Image', 'aperture' ) . '<span class="meta-nav"> &rarr;</span></div>' ); ?>
				</div><!-- .nav-links -->
			</nav><!-- #image-navigation -->

		<?php endwhile; // end of the loop. ?>

		</main><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'right' ); ?>
<?php get_footer(); ?>
