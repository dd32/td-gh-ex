<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package bnw
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="tumb entry-tumb">
		<?php 
			if ( has_post_thumbnail() ) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
				echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '" >';
				echo get_the_post_thumbnail( $post->ID, 'post-thumb-1170' ); 
				echo '</a>';
			}
		?>
		<?php //the_post_thumbnail( 'post-thumb-1170' ); ?>
	</div>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bnw' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'bnw' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
