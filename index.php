<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage belfast
 * @since belfast 1.0
 */

get_header(); ?>
	
	<div class="main clearfix content_begin">
    	<div class="container-fluid">
  <div class="grid">
  <div class="grid-sizer col-sm-4"></div>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content-home', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div><!-- #content -->
	</div>
	
	<?php
	the_posts_pagination();	
	?>
		</div>
			</div>

<?php get_footer(); ?>
