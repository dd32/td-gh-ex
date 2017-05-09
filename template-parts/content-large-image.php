<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  basepress
 */

// Get Theme Options from Database.
$theme_options = basepress_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-large-image clearfix'); ?>>

	<header class="entry-header">

		<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

		 <?php do_action( 'basepress_entry_meta_header' ); ?>
		 
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="thumbnail">

			<a href="<?php the_permalink() ?>" rel="bookmark" class="featured-thumbnail">

				<?php the_post_thumbnail('basepress-thumbnail-large');  ?>
						
			</a>

		</div>

	<?php endif; ?>

	<div class="entry-content">

		<?php

			if ( $theme_options['post_content'] != 'index' ) {

				the_excerpt();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basepress' ),
					'after'  => '</div>',
				) );

				if ( $theme_options['c_reading'] == 1 ) {

				 	echo basepress_more_link();

				}

			 } else {

				the_content();

			}

		?>		

	</div><!-- .entry-content -->

	<?php do_action( 'basepress_entry_meta_footer' ); ?>
	
</article><!-- #post-## -->
