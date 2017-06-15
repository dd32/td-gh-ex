			<?php for ($i = 1; $i <= 4; $i++) { ?>
		
				<div class="three columns">
				
					<div class="box-head">
								
	<a href="<?php echo esc_url(themeszen_get_option('discover_boxlink' . $i)); ?>"><img src="<?php if(esc_url(themeszen_get_option('discover_boximage' . $i)) != NULL){ echo esc_url(themeszen_get_option('discover_boximage' . $i));} else echo get_template_directory_uri() . '/images/box' .$i. '.png' ?>" alt="<?php echo esc_html(themeszen_get_option('discover_boxhead' . $i)); ?>" /></a>

					
					</div> <!--box-head close-->
					
				<div class="title-box">						
						
				<div class="title-head"><h1><?php if(esc_html(themeszen_get_option('discover_boxhead' . $i)) != NULL){ echo esc_html(themeszen_get_option('discover_boxhead' . $i));} else echo "Box heading" ?></h1></div></div>
					
					<div class="box-content">

				<?php if(esc_textarea(themeszen_get_option('discover_boxtext' . $i)) != NULL){ echo esc_textarea(themeszen_get_option('discover_boxtext' . $i));} else echo "Nullam posuere felis a lacus tempor eget dignissim arcu adipiscing. Donec est est, rutrum vitae bibendum vel, suscipit non metus." ?>
					
					</div> <!--box-content close-->
					<div class="clear"></div>
				<span class="read-more"><a href="<?php echo esc_url(themeszen_get_option('discover_boxlink' . $i)); ?>"><?php _e('Read More' , 'discover'); ?></a></span>
			
				</div><!--boxes  end-->
				
		<?php } ?>
			
	<div class="clear"></div>
