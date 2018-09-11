<?php
/*
Template Name: Narrow
*/
?>
<?php
/**
 * The template for Narrow
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Absolutte
 */

get_header(); ?>

	<div id="content" class="<?php echo esc_attr( absolutte_content_css_class() ); ?>">

		<?php
		$absolutte_show_title = rwmb_meta( 'absolutte_show_title' );
		if ( 'no' != $absolutte_show_title ) {
		?>
			<header class="page-header">
				<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			</header><!-- .page-header -->
		<?php } ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				$absolutte_page_content = get_the_content();
				if ( ! empty( $absolutte_page_content ) ) {
				?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				<?php } ?>

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop. ?>

		<div class="clearfix"></div>

	</div><!-- /content -->

<?php get_footer(); ?>
