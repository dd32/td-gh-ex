<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  basepress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item clearfix '); ?>>

	<header class="entry-header">

		<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>


	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="thumbnail"> 

			<a href="<?php the_permalink() ?>" rel="bookmark" class="featured-thumbnail">

				<?php the_post_thumbnail();  ?>
						
			</a>

		</div>

	<?php endif; ?>

	<div class="entry-content">
		<?php
	
			the_excerpt();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basepress' ),
				'after'  => '</div>',
			) );
		?>

		<a class="more-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php _e('[Continue reading ...]','basepress'); ?></a>

	</div><!-- .entry-content -->

	<?php do_action( 'basepress_entry_meta_footer' ); ?>	

</article><!-- #post-## -->
