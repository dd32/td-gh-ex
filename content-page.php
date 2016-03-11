<?php
/**
 * The template for displaying pages
 *
 * @since 1.0.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header>
			<?php
			if ( has_post_thumbnail() ) {
				?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'large' ); ?>
				</a>
				<?php
			}
			?>

			<?php
			if ( is_search() ) :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			elseif ( is_front_page() ) :
				the_title( '<h2 class="entry-title">', '</h2>' );
			else :
				the_title( '<h1 class="entry-title">', '</h1>' );
			endif;
			?>
		</header>

	    <div class="entry-content">
		    <?php
			if ( is_search() )
				the_excerpt();
			else
			    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'abacus' ) );
			?>
	    </div><!-- .entry-content -->

	    <?php get_template_part( 'content', 'footer' ); ?>

	</article><!-- #post-<?php the_ID(); ?> -->