<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage beetech
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-content-wrapper">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
		<div class="arcitle-more-btn"><a href="<?php the_permalink(); ?>" class="btn archive-read-more"><?php esc_html_e( 'Read More', 'beetech' ); ?></a></div><!-- .arcitle-more-btn -->
	</div><!-- .article-content-wrapper -->	
	
</article><!-- #post-## -->