<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Akarsh_Blog
 * @since Akarsh Blog 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>

		<div class="clear">	
				<?php get_template_part( 'template-parts/content', 'media' ); ?>
				<div class="akarsh-medium-3 akarsh-columns">
					<div class="entry-meta-category">
									<?php akarsh_blog_posted_on_cat(); ?>
					</div><!-- .entry-meta-category -->
					<div class="entry-meta">
								<?php
								if ( 'page' !== get_post_type() ) {
									akarsh_blog_posted_on();
								}
								?>
					</div><!-- .entry-meta -->
					<div class="entry-meta entry-footer">
					<?php akarsh_blog_posted_on( array('tag') ); ?>
					</div><!-- .entry-meta -->	
					<footer class="entry-footer">
						<?php akarsh_blog_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			<div class="akarsh-medium-9 akarsh-columns">	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>				
					
						<header class="entry-header">		
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>		
						</header><!-- .entry-header -->

						<div class="entry-content">
							<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'akarsh-blog' ),
								'after'  => '</div>',
							) );
							?>
						</div><!-- .entry-content -->
				</article><!-- #post-## -->
			
			<?php	// Author bio.
				if ( is_single() && get_the_author_meta( 'description' ) ) :
					get_template_part( 'author-bio' );
				endif;
			
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'akarsh-blog' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'akarsh-blog' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'akarsh-blog' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'akarsh-blog' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );
		?>
		</div> <!-- .clear -->
		<?php	// End the loop.
		endwhile;
		?>
		
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
