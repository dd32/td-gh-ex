<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php 
	$becorp_options=becorp_theme_default_data(); 
	$header_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); ?>
    <meta name="keywords" content="HTML5, CSS3, Theme, Flat, Responsive, Multipurpose, Modern" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
	<?php  wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
  
 <div class="main-wrapper">
 
       <!-- start top -->
  <div class="top">
    <div class="container">
	  <div class="row">
	    <div class="col-md-6">
		  <ul class="top-contact pull-left">
            <li><i class="fa fa-phone"></i><?php echo $header_setting['header_info_phone']; ?></li>
            <li><i class="fa fa-envelope"></i><?php echo $header_setting['header_info_mail']; ?></li>
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
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		  				  
					<?php if($header_setting['upload_image_logo']) { ?>
					<img class="logo img-responsive" src="<?php  echo esc_url($header_setting['upload_image_logo']); ?>"  style="height:<?php if($header_setting['height']!='') { echo esc_html($header_setting['height']); } ?>px; width:<?php if($header_setting['width']!='') { echo esc_html($header_setting['width']); } ?>px;" />
		  <?php } else
					{ 
							echo get_bloginfo('name');
						} ?>
					
		  </a>
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
  <!-- end header -->