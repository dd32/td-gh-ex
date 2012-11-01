<div class="flex-container">

	<!--slideshow-->
	
	<div class="flexslider">
	 	<ul class="slides">

<?php for ($i = 1; $i <= 2; $i++) { ?>
			<li>
			  <a href="<?php echo antmagazine_get_option('slider_link'.$i); ?>"><img src="<?php if(antmagazine_get_option('slider_image'.$i) != NULL){ echo antmagazine_get_option('slider_image'.$i);} else echo get_template_directory_uri() . '/images/slide'.$i.'.jpg' ?>" alt="<?php echo antmagazine_get_option('slider_head'.$i); ?>" /></a>
			 
			<p class="flex-caption"><?php if(antmagazine_get_option('slider_head'.$i) != NULL){ echo antmagazine_get_option('slider_head'.$i);} else echo "100% Professional Magazine WordPress theme" ?><p>
			 
			</li>
			
			<?php } ?>
		
		</ul>
</div> <!--slideshow end-->

  </div><!--flex container end-->
  
  <div class="clear"></div>	