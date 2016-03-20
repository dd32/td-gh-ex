<?php
/**
 * The template for displaying featured articles.
 *
 * Used for index/archive/search.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('featured-article'); ?> >

	<section class="main-post">

	<?php if ( has_post_thumbnail() ) : ?>

		<figure class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</figure><!-- post-thumbnail -->
	<?php endif; ?>

	
		<div class="entry-all">
			<header class="entry-header">
				<?php if ( is_sticky() && is_home() && ! is_paged() || is_archive()) :		//if ( is_sticky() && is_home() && ! is_paged() )
						echo '<span class="featured-post">' . __( 'Featured', 'aguafuerte' ) . '</span>';
					endif;
				?>
			
				<div class="entry-meta">
					<span class="byline">
					<?php
						if ( 'post' == get_post_type() ) :
							// Translators: there is a space after "By".
							echo __('By ', 'aguafuerte');
							printf( '<span><a href="%1$s" rel="author">%2$s</a></span>',
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
							get_the_author() );
						endif;
					?>
					</span><!--.byline -->

					<?php
					if ( 'post' == get_post_type() ) :
						printf( '<span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
						esc_url( get_permalink() ),
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date() )
						);
					endif;
					
					edit_post_link( __( 'Edit', 'aguafuerte' ), '<span class="edit-link">', '</span>' );?>
				</div><!--entry-meta-->

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			</header><!--entry-header -->	

			<div class="entry-content">
				<?php

				if ( has_post_format('audio') || has_post_format('link') || has_post_format('quote') || has_post_format('aside') || has_post_format('status')) {
					the_content();
				}

				elseif ( is_home() || is_search() || is_archive() || is_dynamic_sidebar() ) {
					the_excerpt();
				} 

				else {
				the_content( sprintf( __( 'Continue reading', 'aguafuerte' ).' %s',
					the_title( '<span class="screen-reader-text">', '</span>', false ) ) );
				}

				?>
			</div><!-- .entry-content -->
		</div><!-- .entry-all -->
	</section>

	<?php aguafuerte_related_posts( $post );

	//echo '<pre>';print_r($post);echo '</pre>'; echo '<br>';?>    

	<footer class="entry-footer">
		<div class="entry-meta">
			<?php
			$format = get_post_format(); // Esto lo voy a usar cuando le de un estilo especial a cada formato.
			//echo $format. 'raro';
			$format_link = get_post_format_link( $format );
			if ( $format ):
				printf('<span class="post-format"><a href="%1$s">%2$s</a></span>', esc_url( $format_link ) , $format );
			endif;

			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<span><?php comments_popup_link( '0', '1', '%', 'comments-link' ); ?></span>
			<?php endif; 

		// Translators: used between list items, there is a space after the comma.
			$tag_list = get_the_tag_list( '', __( ', ', 'aguafuerte' ) );
			if ( $tag_list ) {
				echo '<span class="tags-links">' . $tag_list . '</span>';
			}
		?>	
		</div><!-- .entry-meta -->	
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

