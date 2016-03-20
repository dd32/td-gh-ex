<?php
/**
 * The Template for displaying all single posts
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.1
 */
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php
		// Translators: used between list items, there is a space after the comma.
		$categories_list = get_the_category_list( __( ', ', 'aguafuerte' ) );
		if ( $categories_list ) {
			echo '<div class="cat-links">' . $categories_list . '</div>';
		}
		?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<span class="byline">
			<?php
			// Translators: there is a space after "By".
			print( __('By ', 'aguafuerte') );
			printf('<span class="entry-author"><a href="%1$s" rel="author">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author());
			
			printf( '<span><a href="%1$s" rel="bookmark" class="entry-date"><time datetime="%2$s">%3$s</time></a></span>',
				esc_url( get_day_link(get_the_date('Y', $post->ID),get_the_date('m', $post->ID),get_the_date('d', $post->ID)) ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ));
			?>
		</span><!-- .byline -->

		<span class="entry-meta">
			<?php
				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'aguafuerte' ), __( '1 Comment', 'aguafuerte' ), __( '% Comments', 'aguafuerte' ) ); ?></span>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'aguafuerte' ), '<span class="edit-link">', '</span>' );
			?>
		</span><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-excerpt">
		<?php if (! has_post_format('link')):
				 the_excerpt();
				 endif ?>

	</div>

	<?php if ( !has_post_format('image') && !has_post_format('gallery') && has_post_thumbnail() ) :?>

	<div class="featured-image">
		<?php
		// Post thumbnail.
		the_post_thumbnail();  //esto se puede cambiar despues a una funcion aguafuerte_post_thumbnail. 
		?>
	</div>

	<?php endif; ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'aguafuerte' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
		<div class="clearfix"></div>
	</div><!-- .entry-content -->


	<footer class="entry-footer">		
		<?php
		// Translators: used between list items, there is a space after the comma.
				$tag_list = get_the_tag_list( '', __( ', ', 'aguafuerte' ) );
				if ( $tag_list ) {
					echo '<div class="tag-links">' . $tag_list . '</div>';
				}
		?>		
		<p><?php printf( __( 'This article was written by %s', 'aguafuerte' ), get_the_author() ); ?></p>
		<?php
			if ( '' != get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/author-bio' );
			}
		?>
	</footer><!-- .entry-footer -->
	<div class="clearfix"> </div>
</article><!-- #post-## -->

