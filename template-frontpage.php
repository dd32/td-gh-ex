<?php
/*
Template Name: Business Front Page
*/
?>
<?php get_header(); ?>

<?php 

	// Get Theme Options from Database
	$theme_options = airballoon_theme_options();

	// Show Image Slider as frontpage image if option is checked
	if ( isset($theme_options['slider_activated']) and $theme_options['slider_activated'] == true ) :

		get_template_part( 'frontpage-slider' );
		
	endif;
	

	// Display manual excerpt as intro text if exists
	global $post;
	if( '' != $post->post_excerpt ) : ?>
		
		<div id="frontpage-intro" class="clearfix">
			<span><?php the_excerpt(); ?></span>
		</div>

<?php 
	endif;
?>
		

	<div id="wrap" class="clearfix template-frontpage">

	
	<?php // Display Frontpage Widgets First Row
	if(is_active_sidebar('frontpage-widgets-first')) : ?>
	
		<div id="frontpage-widgets-first" class="frontpage-widgets clearfix">
			<?php dynamic_sidebar('frontpage-widgets-first'); ?>
		</div>
		
	<?php endif; ?>
	
	
	<?php // Display Page Content
	if ( isset($theme_options['front_page_default_content']) and $theme_options['front_page_default_content'] == true ) :
		if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', 'page' );
			
			endwhile;
		
		endif; 
		
	endif; ?>
	
	
	<?php // Display Frontpage Widgets Second Row
	if(is_active_sidebar('frontpage-widgets-second')) : ?>
		
		<div id="frontpage-widgets-second" class="frontpage-widgets clearfix">
			<?php dynamic_sidebar('frontpage-widgets-second'); ?>
		</div>
		
	<?php endif; ?>

	
	<?php // Display Latest Posts
	if ( isset($theme_options['front_page_posts']) and $theme_options['front_page_posts'] == true ) :
		
		get_template_part( 'frontpage-posts' );
		
	endif; ?>
	
	</div>
	
<?php get_footer(); ?>	