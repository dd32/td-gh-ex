<?php
/**
 * The default template for displaying content
 *
 * Used for index/archive/search.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
	
	<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
	?>

	<?php if ( is_sticky() && is_home() && ! is_paged() ) {
			echo '<span class="featured-post">' . __( 'Featured', 'aguafuerte' ) . '</span>';
		}
	?>
	<div class="entry-meta">
		<?php
			$format = get_post_format(); // Esto lo voy a usar cuando le de un estilo especial a cada formato.
			$format_link = get_post_format_link($format);
			if ($format):
				printf('<span class="post-format"><a href="%1$s">%2$s</a></span>', esc_url( $format_link ) , $format );
			endif;
		?>
		<?php edit_post_link( __( 'Edit', 'aguafuerte' ), '<span class="edit-link">', '</span>' );?>
	</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="post-thumbnail">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        	<?php the_post_thumbnail(); ?>
    		</a>
		<?php endif; ?>
	</div><!-- post-thumbnail -->

	<div class="entry-content">
		<?php

		if ( has_post_format('audio') || has_post_format('link') || has_post_format('quote') || has_post_format('aside') || has_post_format('status')) {
			the_content();
		}

		elseif ( is_home() || is_search() || is_archive() ) {
			the_excerpt();
		} 

		else {
		/* Translators: %s: Name of current post */
		the_content( sprintf( __( 'Continue reading %s', 'aguafuerte' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );
		}	

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-meta">

			<?php
			printf( '<span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
			esc_url( get_permalink() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
			);	

			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( '0', 'aguafuerte' ), __( '1', 'aguafuerte' ), __( '%', 'aguafuerte' ) ); ?></span>
			<?php endif ?>
			
		</div><!-- .entry-meta -->

		<?php
			// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>

		<?php
		// Translators: used between list items, there is a space after the comma.
			$tag_list = get_the_tag_list( '', __( ', ', 'aguafuerte' ) );
			if ( $tag_list ) {
				echo '<span class="tags-links entry-meta">' . $tag_list . '</span>';
			}
		?>		
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

