<?php
/**
 * The template for displaying pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ariel
 */
get_header();

$ariel_pages_sidebar             = ariel_get_option( 'ariel_pages_sidebar' );
$ariel_pages_featured_image_show = ariel_get_option( 'ariel_pages_featured_image_show' );

$is_cart = false; $is_checkout = false; $is_account_page = false;
if ( class_exists( 'WooCommerce' ) ) {
	if( is_cart() ) $is_cart = true;
	if( is_checkout() ) $is_checkout = true;
	if( is_account_page() ) $is_account_page = true;
}

if ( $ariel_pages_sidebar && ! $is_cart && ! $is_checkout && ! $is_account_page ) {
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

					the_title( '<h1 class="page-title">', '</h1>' );

					if ( $ariel_pages_featured_image_show && ! $is_cart && ! $is_checkout && ! $is_account_page ) :
						ariel_entry_thumbnail( 'post-thumbnail' );
					endif;

					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ariel' ),
						'after'  => '</div>',
					) ); ?>

					<div id="entry-share">
						<div class="entry-share-default">
							<?php if ( function_exists( 'sharing_display' ) ) {
									sharing_display( '', true );
								} ?>
						</div>
					</div>

					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; endif; ?>
			</div><!-- main-column col-md-9 -->

			<?php if ( $ariel_pages_sidebar && ! $is_cart && ! $is_checkout && ! $is_account_page ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

		</div><!-- row two-columns -->
	</div><!-- container -->
</div><!-- contents -->

<?php get_footer();