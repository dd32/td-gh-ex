<!-- /Logo goes here -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
		<?php 
		$elitepress_current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), elitepress_theme_data_setup() );?>			
		<div class="site-logo">
				<?php
				if($elitepress_current_options['text_title'] ==false && $elitepress_current_options['upload_image_logo']!='' && !(has_custom_logo()) )
		        { ?> 
	            	<h1><a  href="<?php echo esc_url(home_url( '/' )); ?>">
	                	<img src="<?php echo esc_url($elitepress_current_options['upload_image_logo']); ?>" style="height:<?php if($elitepress_current_options['height']!='') { echo esc_attr($elitepress_current_options['height']); }  else { "80"; } ?>px; width:<?php if($elitepress_current_options['width']!='') { echo esc_attr($elitepress_current_options['width']); }  else { "200"; } ?>px;" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
	                </a></h1>
		            <?php
	            }   
				if(has_custom_logo() )
				{ ?>
					<h1><a  href="<?php echo esc_url(home_url( '/' )); ?>">
						<?php
			            if ( has_custom_logo() ) 
			            {	
                            $elitepress_custom_logo_id = get_theme_mod( 'custom_logo' );
                            $elitepress_post_status=get_post_status ( $elitepress_custom_logo_id );
	    					$elitepress_logo_options = get_option('elitepress_lite_options');
					        $elitepress_logo_options['upload_image_logo'] = '';
					        update_option('elitepress_lite_options', $elitepress_logo_options);
							$elitepress_image = wp_get_attachment_image_src( $elitepress_custom_logo_id , 'full' );
							echo '<img src="'.esc_url($elitepress_image[0]).'" alt="'.esc_attr(get_bloginfo( 'title' )).'" />';
						}?>
					</a></h1>
				<?php
		        }?>		        	            
    			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    				<div class=elegent_title_head><?php bloginfo( 'name' ); ?></div>
    			</a></h1>
	                			
    			<?php
    			$elitepress_description = get_bloginfo( 'description', 'display' );
	            if ( $elitepress_description || is_customize_preview() )
	                { ?>
	                	<p class="site-description"><?php echo $elitepress_description; ?></p>
	            <?php }?>  

		</div>	
		</div>	
		<div class="col-md-9">
			<div class="row">
				<?php if( is_active_sidebar('header_widget_area') ) :
						dynamic_sidebar( 'header_widget_area' );
						else:
					
						$elitepress_icon = array(__('fa fa fa-home','elitepress'),__('fa fa-envelope','elitepress'),__('fa fa-clock-o','elitepress'));
						$elitepress_title_add= array(__('Maecenas sollicitudin','elitepress'),__('Fusce et diam ornare:','elitepress'),__('Sed ut sem','elitepress'));
						$elitepress_description = array (__('California, United States.','elitepress'), __('abc@example.com','elitepress'), __('Nec-Vel: 9.30am To 7.00pm','elitepress'));
						
						for($i=0; $i<=2; $i++) {?>
						<div id="elitepress_header_widget-2" class="col-md-4 col-sm-6 col-xs-6 widget elitepress_header_widget">	
							<div class="contact-area">
								<div class="media">
									<div class="contact-icon">
										<i class="<?php echo esc_attr($elitepress_icon[$i]); ?>"></i>
									</div>
									<div class="media-body">
										<h4><?php echo esc_html($elitepress_title_add[$i]); ?></h4>
										<h5><?php echo esc_html($elitepress_description[$i]); ?></h5>
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