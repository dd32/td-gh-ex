<?php
/**
 * The template used for displaying page content in page.php
 *
 * @since Akyuz 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

		<?php 
		$format = get_post_format();
		if ( false === $format )
			$format = 'standard';
		?>
		<div class="postformatting post-<?php echo $format;?>"></div>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', AKYUZ_TEXT_DOMAIN ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', AKYUZ_TEXT_DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
