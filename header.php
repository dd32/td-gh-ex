<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php 
	$becorp_options=becorp_theme_default_data(); 
	$header_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); ?>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<?php wp_head(); ?>
  </head>
 <body <?php body_class(); ?> >

  
 <div class="main-wrapper">
 
       <!-- start top -->
  <div class="top">
    <div class="container">
	  <div class="row">
	    <div class="col-md-6">
		
		  <ul class="top-contact pull-left">
		  <?php if($header_setting['header_phone_email_enabled']== 1 ) {
		
		  ?>		
	<?php if($header_setting['header_info_phone']!='') { ?>
            <li><i class="fa fa-phone"></i><?php echo $header_setting['header_info_phone']; ?></li>
			<?php }	if($header_setting['header_info_mail']!='') { ?>
            <li><i class="fa fa-envelope"></i><?php echo $header_setting['header_info_mail']; ?></li>
			<?php } ?>
			  <?php } ?>
		  </ul>
		
	    </div>
	    <div class="col-md-6">
			<ul class="top-social pull-right">
			<?php
				
				if($header_setting['header_social_media_enabled']== 1 ) {
					if($header_setting['social_media_twitter_link']!='') {?>
						<li><a class="icon-twitter" href="<?php echo esc_url($header_setting['social_media_twitter_link']); ?>"<?php if( $header_setting['twitter_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($header_setting['social_media_facebook_link'] != '') { ?>
						<li><a class="icon-facebook" href="<?php echo esc_url($header_setting['social_media_facebook_link']); ?>"<?php if( $header_setting['facebook_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }  
						if($header_setting['social_media_linkedin_link']!='') { ?> 
						<li><a class="icon-linkedin" href="<?php echo esc_url($header_setting['social_media_linkedin_link']); ?>"<?php if( $header_setting['linkedin_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($header_setting['social_media_dribbble_link']!='') { ?> 
						<li><a class="icon-dribbble" href="<?php echo esc_url($header_setting['social_media_dribbble_link']); ?>"<?php if( $header_setting['dribbble_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($header_setting['social_media_google_link']!='') { ?> 
						<li><a class="icon-google-plus" href="<?php echo esc_url($header_setting['social_media_google_link']); ?>"<?php if( $header_setting['google_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($header_setting['social_media_rss_link']!='') { ?> 
						<li><a class="icon-rss" href="<?php echo esc_url($header_setting['social_media_rss_link']); ?>"<?php if( $header_setting['rss_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					}
		?>
		  </ul>	
	    </div>
	  </div>
	</div>
  </div>  
  <!-- end top -->
  
  <!-- start header -->
  
  <div class="header sticky-navigation">
    <div class="navbar navbar-default">
      <div class="container">
        <div class="col-ms-3 navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <div class="site-logo">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		  				  
					<?php becorp_the_custom_logo(); ?>
					
		  </a>
		  </div>
		  <?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<h1 class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
        </div>
        <div class="collapse navbar-collapse">
           <?php	wp_nav_menu( array(  
									'theme_location' => 'primary',
									'container'  => 'collapse navbar-collapse',
									'menu_class' => 'nav navbar-nav navbar-right',
									'fallback_cb' => 'asiathemes_fallback_page_menu',
									'walker' => new asiathemes_nav_walker()
									)
								);	?> 
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <?php
if(is_home() || is_front_page()):
  if ( get_header_image() ) : ?>
				<?php $custom_header_sizes = apply_filters( 'hotel_melbourne_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div>
			<?php  else: ?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri() ?>/images/header-default.jpg" />
					</a>
					
				</div>
				<?php endif; endif; ?>
  <!-- end header -->