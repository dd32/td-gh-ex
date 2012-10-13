<?php
/**
 * Template Name: No Sidebar
 *
 */ 
?>

<?php get_header(); ?>
 
 <div id="main-nosidebar">
 
    <?php
		the_post();
		get_template_part( 'loop', 'single' );
    ?>
	
</div>

<?php get_footer(); ?>