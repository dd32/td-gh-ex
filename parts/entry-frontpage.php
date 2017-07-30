<?php
/**
 * Entry page
 *
 * Template part for rendering frontpage content.
 *
 * @package WordPress
 */
$ariel_pages_sidebar             = ariel_get_option( 'ariel_pages_sidebar' );
$ariel_pages_featured_image_show = ariel_get_option( 'ariel_pages_featured_image_show' );

if ( $ariel_pages_sidebar ) {
	$main_class = 'col-md-9';
} else {
	$main_class = 'col-md-12';
}
?>
<div class="contents">
	<div class="container">
		<div class="row two-columns">

			<div class="main-column <?php echo esc_attr( $main_class ); ?>">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

					if ( $ariel_pages_featured_image_show ) :
						ariel_entry_thumbnail( 'post-thumbnail' );
					endif;

					the_content(); ?>

					<div id="entry-share">
						<div class="entry-share-default">
							<?php if ( function_exists( 'sharing_display' ) ) {
									sharing_display( '', true );
								} ?>
						</div>
					</div>

				<?php endwhile; endif; // have_posts() ?>
			</div><!-- main-column col-md-9 -->

			<?php if ( $ariel_pages_sidebar ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

		</div><!-- row two-columns -->
	</div><!-- container -->
</div><!-- contents -->