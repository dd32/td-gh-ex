<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php $current_options=get_option('appointment_options'); ?>
	<?php if($current_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url($current_options['upload_image_favicon']); ?>" /> 
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php wp_title('|', true , 'right'); ?></title>
	<?php wp_head(); ?>
	
	<?php
if($current_options['webrit_custom_css']!='') {  ?>
<style>
<?php echo $current_options['webrit_custom_css']; ?>
</style>
<?php }  wp_head(); ?>
</head>
<body <?php body_class(); ?> >


<!--Logo & Menu Section-->	
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		<?php if($current_options['logo_section_settings']=='on') { ?>
		<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Appointment">
				<?php
					if($current_options['text_title'] =="on")
					{ echo "<div class=appointment_title_head>" . get_bloginfo( ). "</div>"; }
					else if($current_options['upload_image_logo']!='') 
					{ ?>
					<img class="img-responsive" src="<?php echo esc_url($current_options['upload_image_logo']); ?>" style="height:<?php if($current_options['height']!='') { echo esc_html($current_options['height']); } ?>px; width:<?php if($current_options['width']!='') { echo esc_html($current_options['width']); } ?>px;" alt="logo" />
					<?php } ?>
				</a></h1>
				<?php } ?>	
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php _e('Toggle navigation','appointment'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		
		<?php 
		
		$social = '<ul id="%1$s" class="%2$s">%3$s<ul class="head-contact-social">';
				if($current_options['header_social_media_enabled']=='on') {
				if($current_options['social_media_facebook_link']!='') {
				$social .= '<li class="facebook"><a href="'.$current_options['social_media_facebook_link'].'"';
					if($current_options['facebook_media_enabled']=='on')
					{
					 $social .= 'target="_blank"';
					}
				$social .='><i class="fa fa-facebook"></i></a></li>';
				
				}
				if($current_options['social_media_twitter_link']!='') {
				$social .= '<li class="twitter"><a href="'.$current_options['social_media_twitter_link'].'"';
					if($current_options['twitter_media_enabled']=='on')
					{
					 $social .= 'target="_blank"';
					}
				$social .='><i class="fa fa-twitter"></i></a></li>';
				
				}
				if($current_options['social_media_linkedin_link']!='') {
				$social .= '<li class="linkedin"><a href="'.$current_options['social_media_linkedin_link'].'"';
					if($current_options['linkedin_media_enabled']=='on')
					{
					 $social .= 'target="_blank"';
					}
				$social .='><i class="fa fa-linkedin"></i></a></li>';
				
				}
				}
				$social .='</ul></ul>'; 
		
		?>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php	wp_nav_menu( array(  
				'theme_location' => 'primary',
				'container'  => '',
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => 'webriti_fallback_page_menu',
				'items_wrap'  => $social,
				'walker' => new webriti_nav_walker()
				 ) );
				?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>	
<!--/Logo & Menu Section-->	

<div class="clearfix"></div>