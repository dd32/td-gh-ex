<?php
/**
 * The template for displaying image attachments.
 *
 * @package Azalea
 */

get_header(); ?>
	<div id="content" class="site-content">
		<div class="inner">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
				<?php
				// Start the loop.
				while ( have_posts() ) : the_post();
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<div class="entry-meta">
								<?php
								jgtazalea_posted_on();
								edit_post_link( esc_html__( 'Edit', 'azalea' ), '<span class="edit-link">', '</span>' );
								?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->
						<div class="entry-content">
							<div class="entry-attachment">
								<?php
								$attachment_url = esc_url( wp_get_attachment_url( get_the_ID() ) );
								if ( wp_attachment_is( 'video' ) ) {
									echo do_shortcode( "[video src='{$attachment_url}']" );
								} elseif ( wp_attachment_is( 'audio' ) ) {
									echo do_shortcode( "[audio src='{$attachment_url}']" );
								} elseif ( wp_attachment_is( 'image' ) ) {
									echo wp_get_attachment_image( get_the_ID(), 'post-thumbnail' );
								} else {
									echo '<a href="' . $attachment_url . '">' . esc_html( get_the_title( get_the_ID() ) ) . '</a>';
								}
								?>
								<?php if ( has_excerpt() ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
							</div><!-- .entry-attachment -->
							<?php
							the_content();
							wp_link_pages( array(
								'before'      => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'azalea' ) . '</span>',
								'after'       => '</p>',
								'link_before' => '<span class="page-link">',
								'link_after'  => '</span>'
							) );
							?>
						</div><!-- .entry-content -->
						<?php jgtazalea_entry_footer(); ?>
					</article><!-- #post-## -->
					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div><!-- .inner -->
	</div><!-- #content -->
<?php get_footer(); ?>
