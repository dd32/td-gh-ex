<?php
/**
 * The template used for displaying page content
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
		<?php edit_post_link('<i class="fa fa-pencil" aria-hidden="true"></i>'. __('Edit', 'bassist') ) ?>
		</div><!--.entry-meta-->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bassist' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bassist' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
