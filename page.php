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

if ( $ariel_pages_sidebar ) {
	$ariel_main_class = 'col-md-9';
} else {
	$ariel_main_class = 'col-md-12';
}
?>
<div class="contents">
	<div class="container">
		<div class="row two-columns">

			<div class="main-column <?php echo esc_attr( $ariel_main_class ); ?>">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

					the_title( '<h1 class="page-title">', '</h1>' );

					if ( $ariel_pages_featured_image_show && has_post_thumbnail() ) : ?>
                        <div class="entry-thumb">
                            <?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class' => 'img-responsive' ) ); ?>
                        </div><!-- entry-thumb -->
					<?php endif;

					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ariel' ),
						'after'  => '</div>',
					) ); ?>

					<?php
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; endif; ?>
			</div><!-- main-column col-md-9 -->

			<?php if ( $ariel_pages_sidebar ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

		</div><!-- row two-columns -->
	</div><!-- container -->
</div><!-- contents -->

<?php get_footer();