<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Aadya
 * @subpackage Aadya
 * @since Aadya 1.0.0
 */

get_header(); ?>

<?php 
	$layout = of_get_option('page_layouts'); 
	$col =  aadya_get_content_cols();
?>

<?php
	if($layout ==  "sidebar-content" || $layout ==  "sidebar-content-sidebar") {
		get_sidebar('left');
	}	
	
	if($layout == "content-sidebar" || $layout ==  "sidebar-content") {
		$smcol = 8;
	} elseif($layout == "sidebar-content-sidebar" || $layout == "content-sidebar-sidebar") {
		$smcol = 6;
	}	
?>

<div class="col-xs-12 col-sm-<?php echo $smcol;?> col-md-<?php echo $col;?>" role="content">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div> <!-- .col-md-<?php echo $col;?> .content -->	

<?php
	if($layout ==  "content-sidebar-sidebar") {
		get_sidebar('left');
	}	
?>

<?php	
	if($layout ==  "content-sidebar" || 
	   $layout ==  "sidebar-content-sidebar" ||
	   $layout ==  "content-sidebar-sidebar") {		
		get_sidebar();
	}
?>
<?php get_footer(); ?>