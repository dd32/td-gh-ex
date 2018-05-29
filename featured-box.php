<?php
/* 	SunRain Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2012-2018, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SunRain 1.0
*/
?>
<!--- ============  FEATURED BOX  =========== ------------>
<div id="featured-box-item" class="box90">
	<div id="featured-boxs"><!--
		--><?php		
		foreach (range(1, 5) as $fboxn) { 
			$imageurl = esc_url(sunrain_get_option('featured-image' . $fboxn, get_template_directory_uri() . '/images/featured-image' . $fboxn . '.png'));
			$imagetitle = esc_html(sunrain_get_option('featured-title' . $fboxn, 'SunRain Theme for Small Business'));
			$imagedes = esc_html(sunrain_get_option('featured-description' . $fboxn , 'The Color changing options of SunRain will give the WordPress Driven Site an attractive look. SunRain is super elegant and Professional Responsive Theme which will create the business widely expressed.'));
			
			if ( !$imageurl && !$imagetitle && !$imagedes ): $foo = 'boo'; else:
				$imageoutput = '<div class="featured-box">';
				if ($imageurl)  $imageoutput.= '<div class="imagebox"><img class="box-image" src="'.$imageurl.'" alt="'.$imagetitle.'" /><div class="image-border"></div></div>';
				if ($imagetitle) $imageoutput .= '<h3 class="fboxtitle">'.do_shortcode($imagetitle).'</h3>';
				if ($imagedes) $imageoutput .= '<p class="fboxdes">'.do_shortcode($imagedes).'</p>';
				$imageoutput .= '</div>';
				echo $imageoutput;
			endif;

		}; ?><!--
	--></div> <!-- featured-boxs -->
	<div class="lsep"></div>
</div> <!-- featured-box-item -->
<!--- ============  END OF FEATURED BOX  =========== ------------>