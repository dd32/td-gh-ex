<div class="flex-container">

	<!--slideshow-->
	
	<div class="flexslider">
	 	<ul class="slides">

<?php for ($i = 1; $i <= 2; $i++) { ?>
			<li>
			  <a href="<?php echo esc_url(themeszen_get_option('discover_slidelink'.$i)); ?>"><img src="<?php if(esc_url(themeszen_get_option('discover_slideimage'.$i)) != NULL){ echo esc_url(themeszen_get_option('discover_slideimage'.$i));} else echo esc_url(get_template_directory_uri() . '/images/slide'.$i.'.jpg') ?>" alt="<?php echo esc_html(themeszen_get_option('discover_slideheading'.$i)); ?>" /></a>
			 <?php if(themeszen_get_option('discover_home_page_slider1') != "off") { ?>
			<p class="flex-caption"><?php if(esc_html(themeszen_get_option('discover_slideheading'.$i)) != NULL){ echo esc_html(themeszen_get_option('discover_slideheading'.$i));} else echo "Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing." ?><p>
			 <?php } ?>
			</li>
			
			<?php } ?>
		
		</ul>
</div> <!--slideshow end-->

  </div><!--flex container end-->
  
  <div class="clear"></div>	