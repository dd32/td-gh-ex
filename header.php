<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    ``
    <![endif]-->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <!-- Theme Css -->
	<?php
	$quality_pro_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'quality_pro_options', array() ), $quality_pro_options ); ?>
    <?php if($current_options['upload_image_favicon']!=''){ ?>
    <link rel="shortcut icon" href="<?php  echo esc_url($current_options['upload_image_favicon']); ?>" />
    <?php } 
	wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <!--Header Logo & Menus-->
    <nav class="navbar navbar-custom" role="navigation">
		<div class="container-fluid padding-0">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<?php
				if($current_options['text_title'] ==true && get_theme_mod('header_text')==false)
				{ 
					if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
            		{?>
	            	<div class="site-title">
	            		<?php
	            		if(get_option('blogname')!='')
	            		{?>
	            			<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	                			<?php bloginfo( 'name' ); ?>
	                		</a></h2>
	            		<?php
	             		}
	            		$description = get_bloginfo( 'description', 'display' );
			            if(get_option('blogdescription')!='')
			            {
			            	if ( $description || is_customize_preview() )
			                {
			                    ?>
			                <p class="site-description"><?php echo esc_html($description); ?></p>
			                <?php
			                }
			            }
	            	?></div>
        		<?php } 
	        	} 
	        	elseif($current_options['text_title'] ==false && $current_options['upload_image_logo']!='' && !(has_custom_logo()) )
		        { ?> 
	            	<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>">
	                	<img src="<?php echo $current_options['upload_image_logo']; ?>" style="height:<?php if($current_options['height']!='') { echo $current_options['height']; }  else { "80"; } ?>px; width:<?php if($current_options['width']!='') { echo $current_options['width']; }  else { "200"; } ?>px;" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" />
	                </a>
		            <?php
	            }   
				if(has_custom_logo() )
				{ ?>
					<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>">
						<?php
			            if ( has_custom_logo() ) 
			            {	
			            	$custom_logo_id = get_theme_mod( 'custom_logo' );
							$post_status=get_post_status ( $custom_logo_id );
	    					$my_options = get_option('quality_pro_options');
					        $my_options['upload_image_logo'] = '';
					        update_option('quality_pro_options', $my_options);
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							echo '<img src="'.$image[0].'" alt="'.get_bloginfo( 'title' ).'" />';
						}?>
					</a>
				<?php
		        }
	            if(get_theme_mod('header_text')==true) 
	            {	            			
	            	if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
	        		{?>
	            		<div class="site-title">
	            			<?php
	            			if(get_option('blogname')!='')
	            			{?>
	                			<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	                				<?php bloginfo( 'name' ); ?>
	                			</a></h2>
	                			
	            			<?php
	             			}
	            			$description = get_bloginfo( 'description', 'display' );
				            if(get_option('blogdescription')!='')
				            {
				            	if ( $description || is_customize_preview() )
				                { ?>
				                	<p class="site-description"><?php echo esc_html($description); ?></p>
				                <?php }
				            }?>
				        </div>
	    			<?php 
	    			}		
	            }  
	        	if(!(has_custom_logo()) && $current_options['text_title'] ==false && get_theme_mod('header_text')==false && $current_options['upload_image_logo']=='')
				{ ?>
					<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
					</a>
					<?php
				} ?>
			    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
					<span class="sr-only"><?php echo 'Toggle navigation'; ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
			    </button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="custom-collapse">
			<?php
			wp_nav_menu( array(  
					'theme_location' => 'primary',
					'container'  => 'nav-collapse collapse navbar-inverse-collapse',
					'menu_class' => 'nav navbar-nav navbar-right',
					'fallback_cb' => 'webriti_fallback_page_menu',
					'walker' => new webriti_nav_walker()
					)
				);	
			?>
			</div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>
<div class="clearfix"></div>