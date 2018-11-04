<div class="flex-container col-md-12 col-sm-12">

	<!--slideshow-->
	
	<div class="flexslider">
	 	<ul class="slides">

<?php for ($i = 1; $i <= 2; $i++) { ?>
			<li>
			<div>
				<div class="slider-image">
							  					
		<img src="<?php if(esc_url(themeszen_get_option('arena_slideimage'.$i)) != NULL){ echo esc_url(themeszen_get_option('arena_slideimage'.$i));} else echo get_template_directory_uri() . '/images/slide'.$i.'.jpg' ?>" alt="<?php echo esc_html(themeszen_get_option('arena_slideheading'.$i)); ?>" />
		
								</div>
				</div>				
			  
		  <div class="flexslider-content">
		  
		  <?php if(themeszen_get_option('arena_home_page_slider1') != "off") { ?>
		  
		    <div class="flexslider-caption">
			  
			 
			
			
			<div class="flex-caption">
			<?php if(esc_html(themeszen_get_option('arena_slideheading'.$i)) != NULL){ echo esc_html(themeszen_get_option('arena_slideheading'.$i));} else echo __('Consulting theme.', 'arena'); ?>
			</div>
			
			
		<div class="flex-caption2">
		<?php if(esc_html(themeszen_get_option('arena_slidetext'.$i)) != NULL){ echo esc_html(themeszen_get_option('arena_slidetext'.$i));} else echo __('Success is not final; failure is not fatal: It is the courage to continue that counts.', 'arena'); ?>
		</div>
		
	</div>	<!--flexslider-caption-->
	
	
	
		<div class="flex-btn-wrapper">
		<?php if(esc_url(themeszen_get_option('arena_slidelink' . $i)) != NULL){ ?>
							<a href="<?php echo esc_url(themeszen_get_option('arena_slidelink'.$i)); ?>"><?php echo __('Read More', 'arena'); ?></a><?php }?>	
						</div> 
			
			 <?php } ?>
			 
			 </div>
			 
			</li>
			
			<?php } ?>
		
		</ul>
</div> <!--slideshow end-->

  </div><!--flex container end-->
 


