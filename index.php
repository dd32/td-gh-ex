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



<?php

if (is_home() && twentyfourteen_has_featured_posts() ) {



		// Include the featured content template.



get_template_part( 'featured-content' );



	}



?>



<div id="primary" class="content-area">

<?php

global $badeyes_options;



					$badeyes_settings = get_option( 'badeyes_options', $badeyes_options );



				?>



<?php if( $badeyes_settings['intro_text'] != '' ) : ?>



<?php 

echo $badeyes_settings['intro_text']; 

?>



<?php endif; ?>

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

$week = date('W');

$year = date('Y');

$args=array(

  'w'=> $week,

  'year'=> $year,

  'post_type' => 'post',

  'post_status' => 'publish',

  'posts_per_page' => -1,

  'ignore_sticky_posts'=> 1

);

$my_query = null;

$my_query = new WP_Query($args);

if( $my_query->have_posts() ) {

while ($my_query->have_posts()) : $my_query->the_post(); ?>

<h2><?php the_title(); ?></h2>



	<?php the_content ("" . the_title('', '- Full Article', false)); ?>



<?php endwhile; 



} else { ?> <h2> Oops ... No Content</h2> <?php } 



wp_reset_query(); // Restore global post data stomped by the_post(). 

?>















		</div><!-- #content -->



	</div><!-- #primary -->



	<?php get_sidebar( 'content' ); ?>



</div><!-- #main-content -->







<?php



get_sidebar();



get_footer();



