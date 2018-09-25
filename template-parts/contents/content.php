<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BA Tours
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		if ( apply_filters( 'bathemos_page_option', true, 'page_title' ) ) :
			if ( is_single() && !get_the_post_thumbnail() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			elseif ( ! is_single()) :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		endif;

		if ( !is_single()) :
			do_action( 'bathemos_get_content_tag_template', 'post-thumbnail' );
		endif;
		
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				do_action( 'bathemos_get_content_tag_template', 'posted-on' );
				do_action( 'bathemos_get_content_tag_template', 'posted-by' );
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
        
        if ( !is_single() && has_excerpt()) :
        
          the_excerpt();
          
          $read_more = sprintf( '<a class="more-link" href="%1$s">%2$s</a>',
              get_permalink( get_the_ID() ),
              __( 'Continue reading', 'ba-tours-light' )
          );
          
          echo wp_kses_post($read_more);
        
        else:
        
		  the_content( sprintf(
			wp_kses(
				 __( 'Continue reading<span class="screen-reader-text"> "%1$s"</span>', 'ba-tours-light' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ba-tours-light' ),
			'after'  => '</div>',
		) );
        
        endif;
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php do_action( 'bathemos_get_content_tag_template', 'entry-footer' ); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-<?php the_ID(); ?> -->
