<div id="home-container">

	<!--slideshow-->
	
	<div id="slideshow">

			<div>
			 <?php if(esc_url(of_get_option('slider_link')) != NULL){ ?> <a href="<?php echo esc_url(of_get_option('slider_link')); ?>"> <?php } ?> <img src="<?php if(esc_url(of_get_option('slider_image')) != NULL){ echo esc_url(of_get_option('slider_image'));} else echo get_template_directory_uri() . '/images/slide1.png' ?>" alt="" />
			 			 <?php if(esc_url(of_get_option('slider_link')) != NULL){ ?> </a> <?php } ?> 
			
			</div>
		
		</div> <!--slideshow end-->		

<div id="slider_shadow"></div>

  </div><!--home container end-->

<div class="clear"></div>