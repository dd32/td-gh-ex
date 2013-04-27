<?php
/**
 * The template for displaying front page pages.
 *
 */
?>
<?php get_header(); ?>  
<div class="page_container">
<div class="container_24">
<div class="grid_24">
<div class="page_content">
<div class="page_info">
<?php if (appointway_get_option('appointway_page_main_heading') != '') { ?>
<h1><?php echo stripslashes(appointway_get_option('appointway_page_main_heading')); ?></h1>
<?php } else { ?>
<h1>We Provide The Best Spa Services In The New York City.</h1>
<?php } ?>
<?php if (appointway_get_option('appointway_page_sub_heading') != '') { ?>
<h3><?php echo stripslashes(appointway_get_option('appointway_page_sub_heading')); ?></h3>
<?php } else { ?>
<h3>Just Try Our Services. Book Your Appointments Now!</h3>
<?php } ?>
</div>
<div class="feature_content_wrapper">
<div class="grid_16 alpha ipad">
<div class="feature_content">
<div class="slider_wrapper">
<div class="flexslider">
          <ul class="slides">
	  <?php
		//The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
		$mystring1 = appointway_get_option('appointway_slideimage1');
		$value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
		$check_img_ofset = 0;
		foreach ($value_img as $get_value) {
			if (preg_match("/$get_value/", $mystring1)) {
				$check_img_ofset = 1;
				}
		}
		// Note our use of ===.  Simply == would not work as expected
		// because the position of 'a' was the 0th (first) character.                            
		?>
		  <?php if ($check_img_ofset == 0 && appointway_get_option('appointway_slideimage1') != '') { ?>
			<li><?php echo appointway_get_option('appointway_slideimage1'); ?></li>
		<?php } else { ?> 
		<li>
			<?php if (appointway_get_option('appointway_slideimage1') != '') { ?>
					<a href="<?php echo appointway_get_option('appointway_slidelink1'); ?>"><img  src="<?php echo appointway_get_option('appointway_slideimage1'); ?>" alt=""/></a>
				<?php } else { ?>
					<a href="#"><img  src="<?php echo get_template_directory_uri(); ?>/images/slider-img.jpg" alt=""/></a>
				<?php } ?></li>
			<?php } ?>
 		  </ul>
        </div>
        </div>
          <div class="featurebox">
		  <?php if (appointway_get_option('appointway_feature_mainhead') != '') { ?>
		  <h2><?php echo stripslashes(appointway_get_option('appointway_feature_mainhead')); ?></h2>
		  <?php } else { ?>
          <h2>Our Services</h2>
		  <?php } ?> 
		   <div class="featurebox_wrapper">
			<?php  //First Feature Area ?>
              <div class="featurebox_desc first">
				<?php if (appointway_get_option('appointway_firsthead') != '') { ?>
				<h4><a href="<?php echo appointway_get_option('appointway_feature_link1'); ?>"><?php echo stripslashes(appointway_get_option('appointway_firsthead')); ?></a></h4>
				<?php } else { ?>
                <h4><a href="#">Easily Customise</a></h4>
				<?php } ?> 
				<?php if (appointway_get_option('appointway_feature_image1') != '') { ?>
				<a href="<?php echo appointway_get_option('appointway_feature_link1'); ?>"><img src="<?php echo appointway_get_option('appointway_feature_image1'); ?>" alt="first-feature-image"/></a>
				<?php } else { ?>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/f-img1.jpg" alt="first-feature-image" /></a>
				<?php } ?> 
                <?php if (appointway_get_option('appointway_firstdesc') != '') { ?>
				<p><?php echo stripslashes(appointway_get_option('appointway_firstdesc')); ?></p>
				<?php } else { ?>
				<p>All spas offer spa services like massage, </p>
				<?php } ?>  
                <a class="readmore" href="<?php echo appointway_get_option('appointway_feature_link1'); ?>"><?php _e('Read More', 'Appointway'); ?></a></div>
				<?php  //Second Feature Area ?>
              <div class="featurebox_desc second">
                <?php if (appointway_get_option('appointway_secondhead') != '') { ?>
				<h4><a href="<?php echo appointway_get_option('appointway_feature_link2'); ?>"><?php echo stripslashes(appointway_get_option('appointway_secondhead')); ?></a></h4>
				<?php } else { ?>
                <h4><a href="#">Single Click</a></h4>
				<?php } ?> 
				<?php if (appointway_get_option('appointway_feature_image2') != '') { ?>
				<a href="<?php echo appointway_get_option('appointway_feature_link2'); ?>"><img src="<?php echo appointway_get_option('appointway_feature_image2'); ?>" alt="second-feature-image"/></a>
				<?php } else { ?>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/f-img2.jpg" alt="second-feature-image" /></a>
				<?php } ?> 
                <?php if (appointway_get_option('appointway_seconddesc') != '') { ?>
				<p><?php echo stripslashes(appointway_get_option('appointway_seconddesc')); ?></p>
				<?php } else { ?>
				<p>Body treatments deal with your body's skin.</p>
				<?php } ?>  
                <a class="readmore" href="<?php echo appointway_get_option('appointway_feature_link2'); ?>"><?php _e('Read More', 'Appointway'); ?></a>
				</div>
				<?php  //Third Feature Area ?>
              <div class="featurebox_desc third">
                <?php if (appointway_get_option('appointway_thirdhead') != '') { ?>
				<h4><a href="<?php echo appointway_get_option('appointway_feature_link3'); ?>"><?php echo stripslashes(appointway_get_option('appointway_thirdhead')); ?></a></h4>
				<?php } else { ?>
                <h4><a href="#">WordPress Theme</a></h4>
				<?php } ?> 
				<?php if (appointway_get_option('appointway_feature_image3') != '') { ?>
				<a href="<?php echo appointway_get_option('appointway_feature_link3'); ?>"><img src="<?php echo appointway_get_option('appointway_feature_image3'); ?>" alt="third-feature-image"/></a>
				<?php } else { ?>
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/f-img3.jpg" alt="third-feature-image" /></a>
				<?php } ?> 
                <?php if (appointway_get_option('appointway_thirddesc') != '') { ?>
				<p><?php echo stripslashes(appointway_get_option('appointway_thirddesc')); ?></p>
				<?php } else { ?>
				<p>Massage feels good and has lots of health benefits.</p>
				<?php } ?>  
                <a class="readmore" href="<?php echo appointway_get_option('appointway_feature_link3'); ?>"><?php _e('Read More', 'Appointway'); ?></a></div>
            </div></div>
            <div class="clear"></div>
</div>
</div>
<div class="grid_8 omega ipad">
<div class="feature_sidebar">
 <?php if (is_active_sidebar('home-page-widget-area')) : ?>
	<div class="sidebar home">
            <?php dynamic_sidebar('home-page-widget-area'); ?>
			</div>
        <?php else : ?> 
		<img src="<?php echo get_template_directory_uri(); ?>/images/widget-image.png" class="widget-image" alt="widget_image" title="widget_image">
   <?php endif; ?>
</div>
</div>
<div class="clear"></div>    
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>