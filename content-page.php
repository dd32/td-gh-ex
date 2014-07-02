<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Aperture
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		$image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
		if ( is_page_template( 'page-fullwidth.php' ) && has_post_thumbnail() ) { ?>
			<div class="page-featured-image">
				<?php the_post_thumbnail( 'aperture-full-width' );
				if ( ! empty ( $image_caption ) ) { 
					echo '<div class="featured-image-caption"><p>' . get_post(get_post_thumbnail_id())->post_excerpt . '</p></div>'; 
				} ?>
			</div>
		<?php } elseif ( has_post_thumbnail() ) { ?>
			<div class="page-featured-image">
				<?php the_post_thumbnail(); 
				if ( ! empty ( $image_caption ) ) { 
					echo '<div class="featured-image-caption"><p>' . get_post(get_post_thumbnail_id())->post_excerpt . '</p></div>'; 
				} ?>
			</div>
		<?php } ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'aperture' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'aperture' ), '<footer class="entry-footer"><span class="edit-link page-edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
