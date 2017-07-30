<?php
/**
 * Template Name: Full Width
 *
 * The template for displaying a full width page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ariel
 */
get_header();

$ariel_pages_featured_image_show = ariel_get_option( 'ariel_pages_featured_image_show' ); ?>

<div class="contents">
	<div class="container">
		<div class="row">

			<div class="main-column col-md-12">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

					if ( $ariel_pages_featured_image_show && ! is_cart() && ! is_checkout() && ! is_account_page() ) :
						ariel_entry_thumbnail( 'post-thumbnail' );
					endif;

					the_title( '<h2 class="page-title">', '</h2>' );

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

				endwhile; endif;
			?>
			</div><!-- main-column -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- contents -->

<?php get_footer();