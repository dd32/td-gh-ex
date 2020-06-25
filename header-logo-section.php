<!-- /Logo goes here -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php $elitepress_lite_options=elitepress_theme_data_setup(); 
				$current_options = wp_parse_args(  get_option( 'elitepress_lite_options', array() ), $elitepress_lite_options );?>				
			
		<div class="site-logo">
				<?php
				if($current_options['text_title'] ==true && get_theme_mod('header_text')==false)
				{ 
					if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
            		{
            			if(get_option('blogname')!='')
	            		{?>
	            			<h1><a href="<?php echo esc_url(home_url( '/' )); ?>" rel="home">
	                			<div class=elegent_title_head><?php bloginfo( 'name' ); ?></div>
	                		</a></h1>
	            		<?php
	             		}
	            		$description = get_bloginfo( 'description', 'display' );
			            if(get_option('blogdescription')!='')
			            {
			            	if ( $description || is_customize_preview() )
			                {
			                    ?>
			                <p class="site-description"><?php echo $description; ?></p>
			                <?php
			                }
			            }
	            	
        			} 
	        	} 
	        	elseif($current_options['text_title'] ==false && $current_options['upload_image_logo']!='' && !(has_custom_logo()) )
		        { ?> 
	            	<h1><a  href="<?php echo esc_url(home_url( '/' )); ?>">
	                	<img src="<?php echo esc_url($current_options['upload_image_logo']); ?>" style="height:<?php if($current_options['height']!='') { echo esc_html($current_options['height']); }  else { "80"; } ?>px; width:<?php if($current_options['width']!='') { echo esc_html($current_options['width']); }  else { "200"; } ?>px;" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
	                </a></h1>
		            <?php
	            }   
				if(has_custom_logo() )
				{ ?>
					<h1><a  href="<?php echo esc_url(home_url( '/' )); ?>">
						<?php
			            if ( has_custom_logo() ) 
			            {	
			            	$custom_logo_id = get_theme_mod( 'custom_logo' );
							$post_status=get_post_status ( $custom_logo_id );
	    					$logo_options = get_option('elitepress_lite_options');
					        $logo_options['upload_image_logo'] = '';
					        update_option('elitepress_lite_options', $logo_options);
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							echo '<img src="'.esc_url($image[0]).'" alt="'.esc_attr(get_bloginfo( 'title' )).'" />';
						}?>
					</a></h1>
				<?php
		        }
	            if(get_theme_mod('header_text')==true) 
	            {	            			
	            	if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
	        		{
	        			if(get_option('blogname')!='')
	            			{?>
	                			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	                				<div class=elegent_title_head><?php bloginfo( 'name' ); ?></div>
	                			</a></h1>
	                			
	            			<?php
	             			}
	            			$description = get_bloginfo( 'description', 'display' );
				            if(get_option('blogdescription')!='')
				            {
				            	if ( $description || is_customize_preview() )
				                { ?>
				                	<p class="site-description"><?php echo $description; ?></p>
				                <?php }
				            }
	    			}		
	            }  
	        	if(!(has_custom_logo()) && $current_options['text_title'] ==false && get_theme_mod('header_text')==false && $current_options['upload_image_logo']=='')
				{ ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        				<div class=elegent_title_head><?php bloginfo( 'name' ); ?></div>
        			</a></h1>
					<?php
				} ?>
		</div>	
		</div>	
		<div class="col-md-9">
			<div class="row">
				<?php if( is_active_sidebar('header_widget_area') ) :
						dynamic_sidebar( 'header_widget_area' );
						else:
					
						$icon = array('fa fa fa-home','fa fa-envelope','fa fa-clock-o');
						$title_add= array('15AH, San Francisco','Send Your Mail At:','Working Hours');
						$description = array (__('California, United States.','elitepress'), __('info@elitesupport.com','elitepress'), __('Mon-Sat: 9.30am To 7.00pm','elitepress'));
						
						for($i=0; $i<=2; $i++) {?>
						<div id="elitepress_header_widget-2" class="col-md-4 col-sm-6 col-xs-6 widget elitepress_header_widget">	
							<div class="contact-area">
								<div class="media">
									<div class="contact-icon">
										<i class="<?php echo esc_html($icon[$i]); ?>"></i>
									</div>
									<div class="media-body">
										<h4><?php echo esc_html($title_add[$i]); ?></h4>
										<h5><?php echo esc_html($description[$i]); ?></h5>
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