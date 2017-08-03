<?php
/**
 * The template for displaying pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ariel
 */
get_header();

$ariel_posts_sidebar       = ariel_get_option( 'ariel_posts_sidebar' );
$ariel_posts_meta_show     = ariel_get_option( 'ariel_posts_meta_show' );
$ariel_posts_comments_show = ariel_get_option( 'ariel_posts_comments_show' );

if ( $ariel_posts_sidebar ) {
	$main_class = 'col-md-9';
} else {
	$main_class = 'col-md-12';
}
?>

<div class="container">
	<div class="row two-columns">
		<div class="main-column <?php echo esc_attr( $main_class ); ?>">
			<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part( 'parts/entry' );

					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; endif;
			?>
		</div><!-- main-column col-md-9 -->

		<?php if ( $ariel_posts_sidebar ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

	</div><!-- row two-columns -->
</div><!-- container -->
<?php get_footer();