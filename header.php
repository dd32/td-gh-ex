<!DOCTYPE html>
<html xmlns="<?php echo esc_url('http://www.w3.org/1999/xhtml')?>" <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php $wallstreet_pro_options=wallstreet_theme_data_setup();
	  $current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), $wallstreet_pro_options ); ?>
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
        <a class="skip-link wallstreet-screen-reader" href="#content"><?php esc_html_e( 'Skip to content', 'wallstreet' ); ?></a>
 <?php do_action('wallstreet_custom_header', false); ?>
        
<!--Header Logo & Menus-->
<div class="navbar navbar-wrapper navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
	  
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		<!-- logo -->
		<?php 	if($current_options['text_title'] ==true){
			set_theme_mod('header_text','true');
			$text_title_options=get_option('wallstreet_pro_options');
	        $text_title_options['text_title'] = false;
	        update_option('wallstreet_pro_options', $text_title_options);
		}

				if($current_options['text_title'] ==false && $current_options['upload_image_logo']!='' && !(has_custom_logo()) )
		        { ?> 
	            	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
	                	<img src="<?php echo esc_url($current_options['upload_image_logo']); ?>" style="height:<?php if($current_options['height']!='') { echo esc_html($current_options['height']); }  else { "80"; } ?>px; width:<?php if($current_options['width']!='') { echo esc_html($current_options['width']); }  else { "200"; } ?>px;" alt="<?php echo esc_html( get_bloginfo( 'title' ) ); ?>" />
	                </a>
		            <?php
	            }   
				elseif(has_custom_logo() )
				{ ?>
					<a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
						<?php
			            if ( has_custom_logo() ) 
			            {	
			            	$custom_logo_id = get_theme_mod( 'custom_logo' );
							$post_status=get_post_status ( $custom_logo_id );
	    					$logo_options = get_option('wallstreet_pro_options');
					        $logo_options['upload_image_logo'] = '';
					        update_option('wallstreet_pro_options', $logo_options);
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							echo '<img src="'.esc_url($image[0]).'" alt="'.esc_html(get_bloginfo( 'title' )).'" />';
						}?>
					</a>
				<?php
		        }
				if($current_options['text_title'] ==true || get_theme_mod('header_text')==true)
				{ 
					if((get_option('blogname')!='') || (get_option('blogdescription')!=''))
            		{
	            		if(get_option('blogname')!='')
	            		{?>
	            			<div class="logo-link-url">
                                <h2 style="margin: 0px;"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="wallstreet_title_head"><?php bloginfo( 'name' ); ?></div>
	                			</a></h2>
	                			<?php
		                		$description = get_bloginfo( 'description', 'display' );
				            	if(get_option('blogdescription')!='')
				            	{
				            		if ( $description || is_customize_preview() )
					                { ?>

				                	<p class="site-description"><?php echo $description; ?></p>
				                	<?php
				                	}
				                }?>
							</div>
	            			
	            		<?php
	             		}
	            		
	            	} 
	        	} 
	        	
				?>
		<!-- /logo -->
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only"><?php echo esc_html_e('Toggle navigation','wallstreet'); ?></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<?php
			wp_nav_menu( array(  
					'theme_location' => 'primary',
					'container'  => 'nav-collapse collapse navbar-inverse-collapse',
					'menu_class' => 'nav navbar-nav navbar-right',
					'fallback_cb' => 'wallstreet_fallback_page_menu',
					'walker' => new wallstreet_nav_walker()
					)
				);	
			?>
		</div><!-- /.navbar-collapse -->	 		
	</div>
</div>