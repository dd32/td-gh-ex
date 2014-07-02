<?php
/**
 * @package Aperture
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title post-title"><?php the_title(); ?></h1>

		<div class="date-aperture">
			<span class="month-aperture"><?php the_time('M') ?></span>
			<span class="day-aperture"><?php the_time('d') ?></span>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php 
		$image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
		if ( has_post_thumbnail()) : ?>
			<div class="post-featured-image">
				<?php if ( has_post_format( 'image' )) {
					the_post_thumbnail( 'aperture-image-post-format' ); }
				else the_post_thumbnail();
				if ( ! empty ( $image_caption ) ) { 
							echo '<div class="featured-image-caption"><p>' . get_post(get_post_thumbnail_id())->post_excerpt . '</p></div>'; } ?>
			</div>
		<?php endif; ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'aperture' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php aperture_posted_on(); ?>
		<span class="sep"> | </span>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'aperture' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'aperture' ) );

			if ( ! aperture_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="tags-links">%2$s </span> ', 'aperture' );
				} else {
					$meta_text = __( '<span class="no-cat-no-tags"></span>', 'aperture' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( '<span class="cat-links">%1$s</span><span class="sep"> | </span><span class="tags-links">%2$s </span>', 'aperture' );
				} else {
					$meta_text = __( '<span class="cat-links">%1$s</span> ', 'aperture' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>
		
		<?php edit_post_link( __( 'Edit', 'aperture' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
