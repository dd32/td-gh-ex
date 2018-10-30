<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Akarsh Blog
 */
 

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		
	</div>
</article><!-- #post-## -->