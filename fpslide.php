<?php 
/* 	Searchlight Theme's Slide Part
	Copyright: 2014-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.9
*/

$sliderbox = searchlight_get_option('sliderbox', ''); if (!$sliderbox) return;
?>
<!--- ============  SLIDER BOX  =========== ------------>
<div class="clear"></div>
<div class="box100">
	<div class="box90">
    	
        <section class="main-slider">
        
        	<div class="flexslider">
            	
          		<ul class="slides">
                <?php foreach (range(1, 3 ) as $searchlight_sldnumber) { if ( esc_url(searchlight_get_option('slide-image' . $searchlight_sldnumber, get_template_directory_uri() . '/images/slide/' . $searchlight_sldnumber . '.jpg')) != '' ):   ?>
                	<li>
                    <div class="slide-text-container">
                    <h2 class="fslidertitle captionDelay1 FromTop"><?php echo esc_textarea(searchlight_get_option('slide-image' . $searchlight_sldnumber . '-title', 'Searchlight Theme')); ?></h2>
                    <h3 class="fslidersubtitle captionDelay2 FromTop"><?php echo esc_textarea(searchlight_get_option('slide-image' . $searchlight_sldnumber . '-sub-title', 'Innovative Professional and Responsive Theme')); ?></h3>
                    <p class="fslidedescription captionDelay3 FromTop"><?php echo esc_textarea(searchlight_get_option('slide-image' . $searchlight_sldnumber . '-caption', 'This is a Test Image Text for Searchlight Theme. You can change this text from Customizer')); ?></p>
                    <a href="<?php echo esc_url(searchlight_get_option('slide-image' . $searchlight_sldnumber . '-link', '#')); ?>" class="read-more fslidelink captionDelay4 FromTop"><?php _e('Read More', 'searchlight'); ?></a>
                    </div>
                    <div class="triangle"></div>
                    <img src="<?php echo esc_url(searchlight_get_option('slide-image' . $searchlight_sldnumber, get_template_directory_uri() . '/images/slide/' . $searchlight_sldnumber . '.jpg')); ?>" />
                    </li>
  
  				<?php endif; } ?>
                </ul>
			</div>
		</section>
     
    </div>
</div>
<!--- ============  END OF SLIDER BOX  =========== ------------>