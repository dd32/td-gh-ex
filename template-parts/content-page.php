<?php
/**
 * The template used for displaying page content
 *
 * @package Acuarela
 * @since Acuarela 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
if ( ! has_post_thumbnail() ):
	get_template_part('template-parts/headers/header', 'page');
endif ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
	<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'acuarela' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'acuarela' ) . ' </span>%',
		) );

	?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
