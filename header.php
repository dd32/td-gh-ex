<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php $current_options=get_option('corpbiz_options'); ?>
	<?php if($current_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url( $current_options['upload_image_favicon'] ); ?>" /> 
	<?php } ?>	
	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" />	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>		
<!--Logo & Menu Section-->
<div class="navbar_section"  >    
	<div  class="navbar navbar-wrapper navbar-inverse navbar-static-top" role="navigation" id="menu-header">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php 
				if($current_options['text_title'] =="on")
				{ echo "<div class=qua_title_head>" . get_bloginfo( ). "</div>"; }
				else if($current_options['upload_image_logo']!='') 
				{ ?>
				<img src="<?php echo esc_url( $current_options['upload_image_logo'] ); ?>" style="height:<?php if($current_options['height']!='') { echo esc_attr($current_options['height']); }  else { "50"; } ?>px; width:<?php if($current_options['width']!='') { echo esc_attr($current_options['width']); }  else { "100"; } ?>px;" />
				<?php } ?>						
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" >
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
			</div>
		</div>
	</div>
</div>
<!--/Logo & Menu Section-->