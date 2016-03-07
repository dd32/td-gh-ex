<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Avien_Light
 */

get_header(); ?>

<!-- #content -->
<div id="content" class="site-content" role="main">
		
		<!--/#error-->
		<div class="container">
			<h1>4<i class="fa fa-ban"></i>4</h1>
			<h2><?php _e( 'Page not found', 'avien-light' );?></h2>
			<p><?php _e( 'The Page you are looking for doesn\'t exist or an other error occurred!', 'avien-light' );?> </p>
			<a class="btn btn-default" href="<?php echo home_url(); ?>"><?php _e( 'Go back to the homepage', 'avien-light' );?></a>
		</div>
		<!--/#error-->
		
	</div>
	<!-- #content -->

<?php get_footer();
