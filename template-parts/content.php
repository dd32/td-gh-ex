<?php
/**
 * Template part for displaying posts
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Akarsh Blog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="post-grid-wrap clear">
	<?php if ( is_sticky() ) : ?>
				<span class="sticky-label"><i class="fa fa-thumb-tack"></i><span class="screen-reader-text"><?php esc_html_e( 'Featured', 'akarsh-blog' ); ?></span></span>
			<?php endif; ?>	
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
		</div>
		<div class="akarsh-medium-9 akarsh-columns">
			<header class="entry-header">			
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					
			</header><!-- .entry-header -->
				<?php
				if ( is_search() ) {
					echo '<div class="entry-summary">';
					the_excerpt();
				} else {
					echo '<div class="entry-content">';
					$ismore = ! empty( $post->post_content ) ? strpos( $post->post_content, '<!--more-->' ) : '';
					if ( ! empty( $ismore ) ) {
						/* translators: %s: Name of current post */
						the_content( sprintf(
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'akarsh-blog' ),
								get_the_title()
							) );
					} else {
						the_excerpt();				
					}
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'akarsh-blog' ),
						'after'  => '</div>',
					) );
				
				}
				?>
				<footer class="entry-footer">
					<?php akarsh_blog_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div><!-- .entry-content --><!-- .entry-summary -->
		</div>
	</div>	<!-- .post-grid-wrap -->
		
</article><!-- #post-## -->
