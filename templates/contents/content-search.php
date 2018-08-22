<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Conica
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ) :
		$conica_image_cut = customizer_library_get_default( 'conica-blog-list-img-cut' );
		if ( get_theme_mod( 'conica-blog-list-img-cut' ) ) {
			$conica_image_cut = get_theme_mod( 'conica-blog-list-img-cut' );
		} ?>
		<a href="<?php the_permalink() ?>" class="post-loop-thumbnail">
			
			<?php the_post_thumbnail( $conica_image_cut ); ?>
			
		</a>
	<?php endif; ?>
	
	<div class="post-loop-content <?php echo ( has_post_thumbnail() ) ? 'has-post-thumbnail' : ''; ?>">
		
		<header class="entry-header">
			<?php
			$post_title_tag = get_theme_mod( 'conica-seo-blog-post-title-tag', customizer_library_get_default( 'conica-seo-blog-post-title-tag' ) );
			the_title( sprintf( '<h'.esc_attr( $post_title_tag ).' class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h'.esc_attr( $post_title_tag ).'>' ); ?>
			
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php conica_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			if ( has_excerpt() ) :
				the_excerpt();
			else :
				/* translators: %s: Name of current post */
				the_content( sprintf(
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'conica' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			endif; ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'conica' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		
		<footer class="entry-footer">
			<?php conica_entry_footer(); ?>
		</footer><!-- .entry-footer -->
		
	</div>
	<div class="clearboth"></div>
	
</article><!-- #post-## -->