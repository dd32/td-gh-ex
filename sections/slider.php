<?php 

/*
	Section: Slider
	Authors: Tyler Cunningham 
	Description: Creates iFeature slider.
	Version: 1.0	
	Portions of this code written by Ivan Lazarevic  (email : devet.sest@gmail.com) Copyright 2010    
*/

    	$tmp_query = $wp_query; 

    	query_posts('category_name='.get_option('if_slider_category').'&showposts=50');
    	
    	
	    if (have_posts()) :
	    	$out = "<div id='coin-slider'>"; 
	    	$i = 0;
	    	$no = get_option('if_slider_posts_number') ? get_option('if_slider_posts_number') : 5;
	    	$imgField = get_option('if_slider_image_field') ? get_option('if_slider_image_field') : 'feature-image';
	    	$txtField = get_option('if_slider_text_field') ? get_option('if_slider_text_field') : 'feature-text';

	    	while (have_posts() && $i<$no) : 
	    	
	    		the_post(); 
	    		
	    		$image 		= get_post_meta($post->ID, $imgField , true) ? : './wp-content/themes/iFeature/images/ifeaturefree.jpg' ;
	    		$text 		= get_post_meta($post->ID, $txtField , true);

	    		$permalink 	= get_permalink();
	    		$thetitle	= get_the_title(); 
	    		if ($image != ''){ 
	    			$out .= "<a href='$permalink'>	
	    						<img src='$image' alt='iFeaturePro' />
	    						<span>
	    							<strong>$thetitle</strong><br />
	    							$text
	    						</span>
	    					</a>
	    			";
	       } 
	    	 
	      	$i++;
	      	endwhile;
	      	$out .= "</div>";
	    endif; 
	    
	    $wp_query = $tmp_query;

	    $csEffect 	= get_option('if_slider_animation') ? get_option('if_slider_animation') : 'csRandom';
	    $csSpw		= get_option('cs-spw') ? get_option('cs-spw') : 7;
	    $csSph		= get_option('cs-sph') ? get_option('cs-sph') : 5;	    
	    $csWidth = get_option('if_slider_width') ? get_option('if_slider_width') : 640;
	    $csHeight = get_option('if_slider_height') ? get_option('if_slider_height') : 330;	    
	    $csDelay = get_option('if_slider_delay') ? get_option('if_slider_delay') : 7000;
	    $csNavigation = get_option('cs-navigation') ? 'false' : 'true';
	    
    $out .= <<<OUT
<script type="text/javascript">

	$("#coin-slider").coinslider({
		width  		: 640,
		height 		: $csHeight,
		spw			: $csSpw,
		sph			: $csSph,
		delay		: $csDelay,
		navigation	: $csNavigation,
		effect		: '$csEffect'
	
	}); 

</script>

OUT;

echo $out;