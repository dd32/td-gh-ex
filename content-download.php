<?php
/**
 * Template part for displaying download (EDD) content in single-download.php
 *
 * @package Azuma
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="edd-single-wrap meta-<?php echo esc_attr( get_theme_mod( 'edd_single_layout', 'right' ) ); ?> clearfix">

<?php
if ( get_theme_mod( 'page_title_style' ) == 2 || get_theme_mod( 'page_title_style' ) == 4 ) { ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
	</header><!-- .entry-header -->

<?php
}

if ( get_theme_mod( 'edd_single_img' ) != 'meta' && get_theme_mod( 'edd_single_img' ) != 'off' && has_post_thumbnail() ) { ?>
	<div class="edd-download-image">
	<?php the_post_thumbnail( 'full' ); ?>
	</div>
	<?php
}
?>

	<div class="entry-content single-entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'azuma' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="entry-details">

		<?php if ( get_theme_mod( 'edd_single_img' ) == 'meta' && has_post_thumbnail() ) { ?>
			<div class="edd-download-image">
				<?php the_post_thumbnail( 'medium' ); ?>
			</div>
			<?php
		} ?>

		<div class="price-buy-wrap">
			<?php azuma_edd_single_purchase_form( get_the_ID() ); ?>
		</div>

	<?php if ( get_theme_mod( 'edd_single_rating' ) || get_theme_mod( 'edd_single_sl_version' ) || get_theme_mod( 'edd_single_author' ) || get_theme_mod( 'edd_single_date' ) || get_theme_mod( 'edd_single_cats' ) || get_theme_mod( 'edd_single_tags' ) ) { ?>
		<div class="meta-wrap">
			<?php
			if ( get_theme_mod( 'edd_single_rating' ) ) {
				if ( class_exists( 'EDD_Reviews' ) ) {
					$azuma_edd_rating = edd_reviews()->average_rating( false );
					if ( $azuma_edd_rating > 0 ) {
						echo '<div class="edd-reviews-rating" title="' . esc_attr__( 'Average Rating', 'azuma' ) . '">' . str_repeat( '<span class="dashicons dashicons-star-filled"></span>', absint( $azuma_edd_rating ) ) . '</div>';
					}
				}
			}

			if ( get_theme_mod( 'edd_single_sl_version' ) ) {
				if ( get_post_meta( get_the_ID(), '_edd_sl_enabled', true ) && get_post_meta( get_the_ID(), '_edd_sl_version', true ) ) {
					if ( get_post_meta( get_the_ID(), '_edd_sl_changelog', true ) ) {
						echo '<span id="version" class="version" title="' . esc_attr__( 'View Changelog', 'azuma' ) . '"><i class="azuma-icon-version"></i> <a class="version-changelog" href="#version">' . get_post_meta( get_the_ID(), '_edd_sl_version', true ) . '</a></span>';
						echo '<span id="changelog" class="changelog"><span class="inner"><a class="version-changelog" href="#version"><i class="azuma-icon-close"></i></a><h5>' . esc_html__( 'Changelog: ', 'azuma' ) . get_the_title() . '</h5>' . wpautop( get_post_meta( get_the_ID(), '_edd_sl_changelog', true ) ) . '</span></span>';
					} else {
						echo '<span id="version" class="version" title="' . esc_attr__( 'Latest Version', 'azuma' ) . '"><i class="azuma-icon-version"></i> ' . get_post_meta( get_the_ID(), '_edd_sl_version', true ) . '</span>';
					}
				}
			}

			if ( get_theme_mod( 'edd_single_author' ) ) {
				azuma_posted_by();
			}

			if ( get_theme_mod( 'edd_single_date' ) ) {
				azuma_posted_on();
			}

			if ( get_theme_mod( 'edd_single_cats' ) ) {
				the_terms( get_the_ID(), 'download_category', '<span class="cat-links"><i class="azuma-icon-folder"></i> ', ', ', '</span>' );
			}

			if ( get_theme_mod( 'edd_single_tags' ) ) {
				the_terms( get_the_ID(), 'download_tag', '<span class="tags-links"><i class="azuma-icon-tag"></i> ', ', ', '</span>' );
			}
			?>
		</div>
	<?php } ?>

	</div><!-- .entry-content -->

	<?php
	if ( class_exists( 'EDD_Reviews' ) ) {
		echo EDD_Reviews()->load_frontend( '' );
	}
	?>

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'azuma' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link"><span class="azuma-icon-edit-2"></span>',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->

</div><!-- .edd-single-wrap -->
</article><!-- #post-<?php the_ID(); ?> -->
