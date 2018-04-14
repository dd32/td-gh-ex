<!-- /Logo goes here -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php $elitepress_lite_options=theme_data_setup(); 
				$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );
				if($current_options['logo_section_settings']==true) { ?>
		<div class="site-logo">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
				if($current_options['text_title'] ==true)
				{ echo "<div class=elegent_title_head>" . get_bloginfo( ). "</div>"; }
				else if($current_options['upload_image_logo']!='') 
				{ ?>
				<img src="<?php echo esc_url($current_options['upload_image_logo']); ?>" style="height:<?php if($current_options['height']!='') { echo esc_html($current_options['height']); }  else { "50"; } ?>px; width:<?php if($current_options['width']!='') { echo esc_html($current_options['width']); }  else { "250"; } ?>px;" alt="logo" />
				<?php } else { ?> 
				<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/logo-1.png" class="img-responsive"/>
				<?php } ?>
			</a></h1>
		</div>
		<?php } ?>
		</div>	
				
		
		<div class="col-md-9">
			<div class="row">
				<?php if( is_active_sidebar('header_widget_area') ) :
						dynamic_sidebar( 'header_widget_area' );
						else:
					
						$icon = array('fa fa fa-home','fa fa-envelope','fa fa-clock-o');
						$title = array('15AH, San Francisco','Send Your Mail At:','Working Hours');
						$description = array (__('California, United States.','elitepress'), __('info@elitesupport.com','elitepress'), __('Mon-Sat: 9.30am To 7.00pm','elitepress'));
						
						for($i=0; $i<=2; $i++) {?>
						<div id="elitepress_header_widget-2" class="col-md-4 col-sm-6 col-xs-6 widget elitepress_header_widget">	
							<div class="contact-area">
								<div class="media">
									<div class="contact-icon">
										<i class="<?php echo $icon[$i]; ?>"></i>
									</div>
									<div class="media-body">
										<h4><?php echo $title[$i]; ?></h4>
										<h5><?php echo $description[$i]; ?></h5>
									</div>
								</div>
							</div>

						</div>
						<?php }
				endif;
				?>
			</div>
		</div>
	</div>
</div>