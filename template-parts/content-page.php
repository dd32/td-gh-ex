<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Actinia
 */

?>

<?php if ( get_edit_post_link() ) : ?>
	<div class="edit-link-wrapper">
		<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				'<img src="' . get_template_directory_uri() . '/images/PNG/32/pen_1.png"/>' . esc_html__( 'Edit page %s', 'actinia' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php $actinia_title = get_the_title();
		if ( isset( $actinia_title ) && ! empty( $actinia_title ) ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		endif;
		?>
	</header><!-- .entry-header -->
	<div class="wrapper">
		<?php
		$actinia_article_content = get_the_content();
		if ( isset( $actinia_article_content ) && ! empty( $actinia_article_content ) ) :
			?>
			<div class="entry-content">
				<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail();
				endif;

				the_content();

				wp_link_pages(
					array(
						'before'      => '<div class="page-links">',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					)
				);
				?>
			</div><!-- .entry-content -->
		<?php endif; ?>
		<div class="clearfix"></div>
	</div><!-- .wrapper -->
</article><!-- #post-## -->
