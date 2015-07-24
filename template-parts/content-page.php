<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package BBird Under
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php  if ( has_post_thumbnail() ) {
     the_post_thumbnail('page-featured-image');
}
; ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bbird-under' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="page-edit">
		<?php edit_post_link( __( 'Edit', 'bbird-under' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-footer -->
</article><!-- #post-## -->
