<?php

/* 	AssociationX Theme's Slide Part of Front Page
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/

$slidebox = ''; 
if (is_front_page() ) $slidebox = esc_attr(associationx_get_option('slidebox', ''));
if(!$slidebox) return;
?>
<script type="text/javascript">
	jQuery(window).on('load resize', function () { 	'use strict';										  
		var hHeight = jQuery('#header').outerHeight(true);	
		var sWidth = jQuery('#sldvidcon').outerWidth(true);
		var sHeight = sWidth*0.45;										  
		jQuery('#sldvidcon, #slidevideo, #mainslider, #mainslider .slides .slideitem').css({ 'height': sHeight  });
		jQuery('#sldvidcon').css({ 'margin-top': -hHeight });
		jQuery('#mainslider .slidecaptions').css({ 'padding-top': hHeight });						  
	});	
</script>

<div id="sldvidcon">
	<div id="mainslider" class="flexslider main-slider" >
		<ul class="slides">
			<?php 
			$associationx_counter = 0;
			foreach (range(1, 3) as $opsinumber)  { $associationx_counter++; if  ($associationx_counter == 3): $associationx_counter = 1; endif; 
			$sldimg = ''; $sldimgf = ''; $capa = ''; $capb = ''; $capc =''; $slidelinks = '';									
			$sldimg = esc_url(associationx_get_option('slide-image' . $opsinumber, ''));
			if($sldimg ) $sldimgf = 'style="background-image:url('.$sldimg.');"';								
			
			$slidcapfromimg = ''; $slideimageid = ''; $attachurl = ''; $associationx_getattpost = '';
			$slidcapfromimg = esc_attr(associationx_get_option('slide-imageautomaticall-'. $opsinumber, ''));
			if($sldimg && $slidcapfromimg ):
				$slideimageid = attachment_url_to_postid($sldimg);
				$associationx_getattpost = get_post( $slideimageid );
				$capa = $associationx_getattpost->post_title;
				$capb = $associationx_getattpost->post_excerpt;
				$capc = $associationx_getattpost->post_content;	
				$attachurl = get_permalink( $associationx_getattpost->ID );
				$slidelinks .= associationx_linkandtarget(esc_html__('Show Image', 'associationx'), $sldimg, '1', '','slide-btn slide-btn1', '1' );
				$slidelinks .= associationx_linkandtarget(esc_html__('About Image', 'associationx'), $attachurl, '1', '','slide-btn slide-btn2', '1' );
			endif;								
			?>

			<li class="slideitem" <?php echo $sldimgf; ?> >
				<div class="slidecaptions">
					<?php 
					$slidecap = ''; 
					$flexcaptions = '';
					if  ($associationx_counter == 1):  
						if($capa) $slidecap .= '<p class="title1 captionDelay6 FromTop">'.$capa.'</p>';
						if($capb) $slidecap .= '<p class="title2 captionDelay4 FromTop">'.$capb.'</p>';
						if($capc) $slidecap .= '<p class="title3 captionDelay2 FromTop">'.$capc.'</p>';
					endif;						
					if  ($associationx_counter == 2):  
					if($capa) $slidecap .= '<p class="title1 captionDelay2 FromBottom">'.$capa.'</p>';
						if($capb) $slidecap .= '<p class="title2 captionDelay4 FromBottom">'.$capb.'</p>';
						if($capc) $slidecap .= '<p class="title3 captionDelay6 FromBottom">'.$capc.'</p>';
					endif;
					if($slidecap) $flexcaptions .= '<div class="flex_caption1">'.$slidecap.'</div>';
					if($slidelinks) $flexcaptions .= '<div class="slide-links FadeIn FadeInDelay"><div class="sldbtnh">'.$slidelinks.'</div></div>';
														
					echo $flexcaptions;
					?>					
				</div>
			</li>
			<?php } ?>
			</ul>
		</div>
		<script type="text/javascript">
			jQuery(window).load(function(){
				jQuery(this).scrollTop(0);
				//Top Slider
				jQuery('#mainslider').flexslider({
					animation: 'fade', 		   
					controlNav: true,   	
					directionNav: true,
					slideshow: true,
					slideshowSpeed: 7000,   
					animationSpeed: 600,   
					pauseOnHover: true,   
					prevText: "",        
					nextText: ""		
				});		
			});											  
		</script>
</div>
<div id="clear-top" class="clear"></div>