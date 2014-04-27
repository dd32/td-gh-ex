<?php
/**
 * The Template for displaying all single posts.
 *
 * @package AccesspressLite
 */

get_header();
global $ak_accesspress_options;
$ak_accesspress_settings = get_option( 'ak_accesspress_options', $ak_accesspress_options );
$cat_blog = $ak_accesspress_settings['blog_cat'];
?>

<div class="ak-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php // accesspresslite_post_nav(); ?>

            <?php
			if(has_category( $cat_blog, $post )):
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>