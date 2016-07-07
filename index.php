<?php 
/** index.php
 *
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mwsmall
 */
 
 get_header(); ?>
<?php 
	$htitle = get_theme_mod( 'mwsmall_home_title' );
	$home_text = get_theme_mod( 'mwsmall_home_text' );
	if ( !empty( $htitle ) || !empty( $home_text ) ) {
?>
<section class="home_text text-center col-lg-12 col-md-12 col-sm-12">
	<?php if ( !empty( $htitle ) ) { ?>
	<h2><?php echo $htitle; ?></h2>
	<?php } ?>
	<?php if ( !empty( $home_text ) ) { ?>
	<p><?php echo $home_text; ?></p>
	<?php } ?>
</section>
<?php } ?>
<section id="primary" class="container content-area col-lg-9 col-md-9 col-sm-8">
	<div id="content" class="site-content" role="main">
		<?php 
			$hide_slider = get_theme_mod( 'hide_slider_post' );
			if ( ( $hide_slider == '' && is_front_page() ) || ( $hide_slider == '' && is_home() ) ) {
				get_template_part( 'inc/slider-post' );
			}
		?>
		
		<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'content', get_post_format() ); ?>
				
			<?php endwhile; ?>
			
			<?php mwsmall_pagination_nav(); ?>
			
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #content -->

</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>