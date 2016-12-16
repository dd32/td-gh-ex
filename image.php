<?php
/**
* The template for displaying image attachments
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Bassist
* @since Bassist 1.0.0
*/

// $bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
get_header(); ?>

<div class="inner flex-container">
	<div id="main-content" class="main-content">

		<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>            

				<div class="attachment-meta">
						<?php 
						$post_title = get_the_title( $post->post_parent );

						if ( empty( $post_title ) || 0 == $post->post_parent )
							printf('<time class="entry-date" datetime="%1$s"><i class="fa fa-clock-o" aria-hidden="true"></i>%2$s</time>', esc_attr( get_the_date('c')), esc_html(get_the_date()));

						else {

						// Translators: There is a space after "on".
						_e('Published on ','bassist');
						printf('<time class="entry-date" datetime="%1$s"><i class="fa fa-clock-o" aria-hidden="true"></i>%2$s</time>', esc_attr( get_the_date('c')), esc_html(get_the_date()));

						// Translators: There is a space before and after "in".
						_e( ' in ', 'bassist');

						printf('<a href="%1$s" class="parent-post-link" title="'.__('Return to:', 'bassist').' %2$s" rel="gallery"><i class="fa fa-camera" aria-hidden="true"></i>%3$s</a>',
							esc_url(get_permalink($post->post_parent)),
							esc_attr( strip_tags($post_title)),
							$post_title
							);
						}                            

							$metadata = wp_get_attachment_metadata();
							printf( '<a href="%1$s" class="full-size-link" title="%2$s"><i class="fa fa-search-plus" aria-hidden="true"></i>%3$s (%4$s &times; %5$s)</a>',
								esc_url( wp_get_attachment_url() ),
								esc_attr__( 'Link to full-size image', 'bassist' ),
								__( 'Full resolution', 'bassist' ),
								$metadata['width'],
								$metadata['height']
							);

							edit_post_link('<i class="fa fa-pencil" aria-hidden="true"></i>'. __('Edit', 'bassist') );
						?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->                               

			<div class="entry-content">
				<nav id="image-navigation" class="navigation image-navigation attachment-meta">
					<div class="nav-links">
						<div class="nav-previous"><?php previous_image_link(false, '<i class="meta-nav fa fa-long-arrow-left" aria-hidden="true"></i>'.__('Previous', 'bassist' ) ); ?></div>
						<div class="nav-next"><?php next_image_link( false, __( 'Next', 'bassist' ).'<i class="meta-nav fa fa-long-arrow-right" aria-hidden="true"></i>' ); ?></div>
					</div><!-- .nav-links -->
				</nav><!-- .image-navigation -->

				<div class="entry-attachment">
					<?php
						/**
						 * Filter the default Bassist image attachment size.
						 * @since Bassist 1.0.0
						 * @param string $image_size Image size. Default 'large'.
						 */
						$image_size = apply_filters( 'bassist_attachment_size', 'large');

						echo wp_get_attachment_image( get_the_ID(), $image_size );
					?>

					<?php if ( has_excerpt() ) : ?>
						<div class="entry-caption">
							<?php the_excerpt(); ?>
						</div><!-- .entry-caption -->
					<?php endif; ?>
				</div><!-- .entry-attachment -->

				<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bassist' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bassist' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
		
			</div><!-- .entry-content -->

		</article><!-- #post-## -->

		
		<?php endwhile; ?>   
	</div><!--/main-content-->
	<?php get_sidebar('sidebar'); ?>

</div><!--/inner-->

<?php get_footer(); ?>

