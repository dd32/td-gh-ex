			<?php for ($i = 1; $i <= 4; $i++) { ?>
		
				<div class="three columns">
				
					<div class="box-head">
								
	<a href="<?php echo of_get_option('box_link' . $i); ?>"><img src="<?php if(of_get_option('box_image' . $i) != NULL){ echo of_get_option('box_image' . $i);} else echo get_template_directory_uri() . '/images/box' .$i. '.png' ?>" alt="<?php echo of_get_option('box_head' . $i); ?>" /></a>

					
					</div> <!--box-head close-->
					
				<div class="title-box">						
						
				<div class="title-head"><h1><?php if(of_get_option('box_head' . $i) != NULL){ echo of_get_option('box_head' . $i);} else echo "Box heading" ?></h1></div></div>
					
					<div class="box-content">

				<?php if(of_get_option('box_text' . $i) != NULL){ echo of_get_option('box_text' . $i);} else echo "Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus." ?>
					
					</div> <!--box-content close-->
					
				<span class="read-more"><a href="<?php echo of_get_option('box_link' . $i); ?>"><?php _e('Read More' , 'Hero'); ?></a></span>
			
				</div><!--boxes  end-->
				
		<?php } ?>
			
	<div class="clear"></div>
