<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package miranda
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		if ( has_post_thumbnail()){
				the_post_thumbnail();
		}
			
		the_content(); 
		
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'miranda' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php /* translators: % is the page title */ edit_post_link( sprintf( __( 'Edit %s', 'miranda' ), get_the_title() ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
