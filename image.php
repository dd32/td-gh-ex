<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Aileron
 */

get_header(); ?>

<div id="content" class="site-content">

	<div class="container">
		<div class="row">

			<section id="primary" class="content-area image-attachment col-lg-12">
				<main id="main" class="site-main" role="main" itemprop="mainContentOfPage">

					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->

							<?php
							// Retrieve attachment metadata.
							$metadata = wp_get_attachment_metadata();
							?>

							<div class="entry-meta entry-meta-header">
								<ul>
									<li>
										<i class="fa fa-clock-o"></i>
										<span class="posted-on">
											<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
												<?php echo esc_html( get_the_date() ); ?>
											</time>
										</span>
									</li>
									<li>
										<i class="fa fa-chain"></i>
										<span class="parent-post-link">
											<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery">
												<?php echo esc_html( get_the_title( $post->post_parent ) ); ?>
											</a>
										</span>
									</li>
									<li>
										<i class="fa fa-arrows-alt"></i>
										<span class="full-size-link">
											<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>">
												<?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?>
											</a>
										</span>
									</li>
								</ul>
							</div><!-- .entry-meta -->

							<div class="entry-content">
								<div class="entry-attachment">
									<div class="attachment">
										<?php aileron_the_attached_image(); ?>
									</div><!-- .attachment -->

									<?php if ( has_excerpt() ) : ?>
									<div class="entry-caption">
										<?php the_excerpt(); ?>
									</div><!-- .entry-caption -->
									<?php endif; ?>
								</div><!-- .entry-attachment -->

								<?php the_content(); ?>

								<?php
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'aileron' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
								?>
							</div><!-- .entry-content -->

							<footer class="entry-meta entry-meta-footer">
								<?php edit_post_link( __( 'Edit', 'aileron' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-meta -->

						</article><!-- #post-## -->

						<nav id="image-navigation" class="navigation image-navigation">
							<div class="nav-links">
								<div class="previous-image nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav"><i class="fa fa-chevron-left"></i></span> Previous Image', 'aileron' ) ); ?></div>
								<div class="next-image nav-next"><?php next_image_link( false, __( 'Next Image <span class="meta-nav"><i class="fa fa-chevron-right"></i></span>', 'aileron' ) ); ?></div>
							</div><!-- .nav-links -->
						</nav><!-- #image-navigation -->

						<?php comments_template(); ?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</section><!-- #primary -->

		</div><!-- .row -->
	</div><!-- .container -->

</div><!-- #content -->

<?php get_footer(); ?>