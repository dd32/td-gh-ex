<?php
/**
 * @package Blue Sky
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php blue_sky_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="bs-thumbnail-wrapper">
		<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
		} ?>
		</div>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'blue-sky' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'blue-sky' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'blue-sky' ) );

			if (!empty($category_list)) {
				echo '<span class="bs-category">'.$category_list.'</span>';
			}
			if (!empty($tag_list)) {
				echo '<span class="bs-tags">'.$tag_list.'</span>';
			}

		?>

		<?php edit_post_link( __( 'Edit', 'blue-sky' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
