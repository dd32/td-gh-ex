<?php

/**

 * The main template file

 *

 * This is the most generic template file in a WordPress theme and one

 * of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query,

 * e.g., it puts together the home page when no home.php file exists.

 *

 * @link http://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage Twenty_Fourteen

 * @since Twenty Fourteen 1.0

 */



get_header(); ?>

<div id="main-content" class="main-content">

<div class="description">
<?php
global $badeyes_options;

					$badeyes_settings = get_option( 'badeyes_options', $badeyes_options );

				?>

<?php if( $badeyes_settings['intro_text'] != '' ) : ?>

<?php 
echo $badeyes_settings['intro_text']; 
?>

<?php endif; ?>
</div>

<?php
if (is_home() && twentyfourteen_has_featured_posts() ) {

		// Include the featured content template.

get_template_part( 'featured-content' );

	}

?>

<div id="primary" class="content-area">

		<div id="content" class="site-content" role="main">
<?php
global $badeyes_options;

					$badeyes_settings = get_option( 'badeyes_options', $badeyes_options );
				?>
<?php if( $badeyes_settings['blog_title'] != '' ) : ?>
<?php 
echo "<h1>";
echo $badeyes_settings['blog_title']; 
echo "</h1>";
?>
<?php endif; ?>
<?php

			if ( have_posts() ) :

				// Start the Loop.

				while ( have_posts() ) : the_post();



					/*

					 * Include the post format-specific template for the content. If you want to

					 * use this in a child theme, then include a file called called content-___.php

					 * (where ___ is the post format) and that will be used instead.

					 */

					get_template_part( 'content', get_post_format() );



				endwhile;

//Previous/next post navigation.

				twentyfourteen_paging_nav();



			else :

				// If no content, include the "No posts found" template.

				get_template_part( 'content', 'none' );



			endif;

		?>



		</div><!-- #content -->

	</div><!-- #primary -->

	<?php get_sidebar( 'content' ); ?>

</div><!-- #main-content -->



<?php

get_sidebar();

get_footer();

