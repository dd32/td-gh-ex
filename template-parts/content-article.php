<?php
/**
 * The template for displaying small pieces of the content.
 *
 * Used for index/archive/search.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<figure class="post-thumbnail">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        	<?php the_post_thumbnail(); ?>
    		</a>
		<?php endif; ?>
	</figure><!-- post-thumbnail -->

	<section>

		<header class="entry-header">

			<div class="entry-meta">
			<?php
				// Translators: used between list items, there is a space after the comma.
				$categories_list = get_the_category_list( __( ', ', 'aguafuerte' ) );
				if ( $categories_list ) {
					echo '<span class="cat-links">' . $categories_list . '</span>';
				}
			?>
	</div><!-- .entry-meta -->
			

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta">
			<span class="byline">
				<?php
					if ( 'post' == get_post_type() ) :
						echo __('by', 'aguafuerte');
					printf( '<span><a href="%1$s" rel="author">%2$s</a></span>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					get_the_author() );

					endif;
				?>
			</span><!--.byline -->
			<?php edit_post_link( __( 'Edit', 'aguafuerte' ), '<span class="edit-link">', '</span>' );?>
		</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
	

		<div class="entry-content">
			<?php

			if ( has_post_format('audio') || has_post_format('link') || has_post_format('quote') || has_post_format('aside') || has_post_format('status')) {
				the_content();
			}

			elseif ( is_home() || is_search() || is_archive() || is_page() ) {
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
	</section>

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
			$format = get_post_format(); // Esto lo voy a usar cuando le de un estilo especial a cada formato.
			$format_link = get_post_format_link($format);
			if ($format):
				printf('<span class="post-format"><a href="%1$s">%2$s</a></span>', esc_url( $format_link ) , $format );
			endif;
		?>

			<?php
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( '0', 'aguafuerte' ), __( '1', 'aguafuerte' ), __( '%', 'aguafuerte' ) ); ?></span>
			<?php endif ?>
			
		</div><!-- .entry-meta -->

		<?php
		// Translators: used between list items, there is a space after the comma.
			$tag_list = get_the_tag_list( '', __( ', ', 'aguafuerte' ) );
			if ( $tag_list ) {
				echo '<span class="tags-links entry-meta">' . $tag_list . '</span>';
			}
		?>		
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

