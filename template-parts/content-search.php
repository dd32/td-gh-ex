<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Arouse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('arouse-post-grid'); ?>>
	<div class="entry-thumbnail">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( 'featured' ); ?>
			<?php } else { ?>
				<div class="entry-thumb-plchldr"></div>
			<?php } ?>
		</a>
	</div>

	<div class="post-content-wrapper">
		<header class="entry-header">
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				
				the_excerpt();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'arouse' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<div class="entry-meta">
			<?php arouse_posted_on(); ?>
		</div><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
