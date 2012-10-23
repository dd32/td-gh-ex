<?php
/**
 * Template Name: Full, No Sidebar
 *
 */ 
?>

<?php get_header(); ?>
 
 <div id="content-nosidebar">
 
    <?php
		the_post();
		get_template_part( 'loop', 'single' );
    ?>
	
</div>

<?php get_footer(); ?>