<?php if( ! defined( 'ABSPATH' ) ) exit;

function baw_animation_classes () { ?>
	<script type="text/javascript">


		jQuery(document).ready(function() {
				jQuery('.sp-title').addClass("hidden").viewportChecker({
					classToAdd: 'animated flipInY',
					offset: 0  
				   }); 
		});
		
		jQuery(document).ready(function() {
				jQuery('.soc a').addClass("hidden").viewportChecker({
					classToAdd: 'animated bounceInLeft',
					offset: 0  
				   }); 
		});
		
		jQuery(document).ready(function() {
				jQuery('.header-face').addClass("hidden").viewportChecker({
					classToAdd: 'animated bounceInUp',
					offset: 0  
				   }); 
		});
		
		jQuery(document).ready(function() {
				jQuery('.photo-autor').addClass("hidden").viewportChecker({
					classToAdd: 'animated bounceInLeft',
					offset: 0  
				   }); 
		});
		
		jQuery(document).ready(function() {
				jQuery('.my-photos-title').addClass("hidden").viewportChecker({
					classToAdd: 'animated zoomIn',
					offset: 0  
				   }); 
		});

		jQuery(document).ready(function() {
				jQuery('.f-slick-image h3').addClass("hidden").viewportChecker({
					classToAdd: 'animated fadeInUp',
					offset: 0  
				   }); 
		});

	
	<?php if ( get_theme_mod('baw_site_title_animation')) { ?>
		jQuery(document).ready(function() {
				jQuery('.site-title').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_site_title_animation'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>

	<?php if ( get_theme_mod('baw_description_animation')) { ?>
		jQuery(document).ready(function() {
				jQuery('.site-description').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_description_animation'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>
	
	<?php if ( get_theme_mod('baw_animation_gallery')) { ?>
		jQuery(document).ready(function() {
				jQuery('#seos-gallery a, .album a').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_animation_gallery'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>

	<?php if ( get_theme_mod('baw_animations_slider')) { ?>
		jQuery(document).ready(function() {
				jQuery('.sp-slider-back').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_animations_slider'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>

	<?php if ( get_theme_mod('baw_animation_home_images')) { ?>
		jQuery(document).ready(function() {
				jQuery('.testimonial-view').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_animation_home_images'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>

	<?php if ( get_theme_mod('baw_animation_home_images')) { ?>
		jQuery(document).ready(function() {
				jQuery('.s-mask').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_animation_home_images'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>

	<?php if ( get_theme_mod('baw_animations_circle')) { ?>
		jQuery(document).ready(function() {
				jQuery('.sb-item').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_animations_circle'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>

	<?php if ( get_theme_mod('baw_animation_sidebar')) { ?>
		jQuery(document).ready(function() {
				jQuery('aside section').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_animation_sidebar'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>

	<?php if ( get_theme_mod('baw_animation_content')) { ?>
		jQuery(document).ready(function() {
				jQuery('article').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_animation_content'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>
	
	<?php if ( get_theme_mod('baw_animation_footer')) { ?>
		jQuery(document).ready(function() {
				jQuery('.footer-widgets').addClass("hidden").viewportChecker({
					classToAdd: 'animated <?php echo get_theme_mod('baw_animation_footer'); ?>', // Class to add to the elements when they are visible
					offset: 0  
				   }); 
		});  
	<?php } ?>
	
	</script>
<?php } 

add_action('wp_footer', 'baw_animation_classes');				   
				   
		
		