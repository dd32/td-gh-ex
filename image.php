<?php
/**
 * The template for displaying image attachments.
 *
 * @package Figure/Ground
 */

get_header();
?>

	<div id="primary" class="content-area image-attachment">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<footer class="entry-meta">
					<ul>
						<li class="posted-on">
							<a class="entry-date"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'm d y' ) ); ?></time></a>
						</li>
						<?php $metadata = wp_get_attachment_metadata(); ?>
						<li class="image-size">
							<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" title="Link to full-size image"><?php echo $metadata['width']; ?> &times; <?php echo $metadata['height']; ?></a>
						</li>
						<li class="posted-in">
							<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php echo __( 'Return to ', 'figureground' ) . esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a>
						</li>
						<?php
							if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
								$class = 'comments-link';
								if ( 0 != get_comments_number() ) {
									$class .= ' has-comments';
								}
								echo '<li class="' . $class . '">';
								comments_popup_link( '', '1', '%' );
								echo '</li>';
							}
						?>

						<?php edit_post_link( __( 'Edit', 'figureground' ), '<li class="edit-link">', '</li>' ); ?>
					</ul>
				</footer><!-- .entry-meta -->

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				<div class="attachment">
					<?php figureground_the_attached_image(); ?>
				</div><!-- .attachment -->
				<div class="entry-content">
					<div class="entry-attachment">
						<?php if ( has_excerpt() ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div><!-- .entry-caption -->
						<?php endif; ?>
					</div><!-- .entry-attachment -->

					<?php
						the_content();
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'figureground' ),
							'after'  => '</div>',
						) );
					?>
					<nav role="navigation" id="image-navigation" class="image-navigation">
						<div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'figureground' ) ); ?></div>
						<div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'figureground' ) ); ?></div>
					</nav><!-- #image-navigation -->
				</div><!-- .entry-content -->
			</article><!-- #post-## -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) {
					comments_template();
				}
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>