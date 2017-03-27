<?php
/**
 * The Header template file
 */ ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<?php if ( get_theme_mod( 'avocation_favicon' ) ) { ?>
		<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod( 'avocation_favicon' )); ?>"> 
	<?php }
	wp_head(); ?>
</head>
    <body <?php body_class(); ?>>
        <!-- header start -->
        <header>
            <div class="scroll-header">  
                <div class="avocation-container  container">                 
                    <div class="col-md-3 logo col-sm-12">
                         <?php if ( get_theme_mod( 'avocation_logo' ) ) { ?>
                                    <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'avocation_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
                                <?php } else { ?>		  
                                  <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h2 class="site-title logo-box"><?php bloginfo( 'name' ); ?></h2>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			</a>
			<?php } ?>
                    </div>
                    <div class="col-md-9 center-content  ">
						<?php
						$facebook_check = get_theme_mod('facebook_setting');
						$twitter_check = get_theme_mod( 'twitter_setting' );
						$rss_check = get_theme_mod( 'rss_setting' );
						$pinterest_check = get_theme_mod( 'pinterest_setting' );
						$youtube_check = get_theme_mod( 'youtube_setting' );
						if(!empty($facebook_check) || !empty($twitter_check) || !empty($rss_check) || !empty($pinterest_check) || !empty($youtube_check))
								$class="col-sm-9 col-md-9";
							else $class=""; ?>
                        <div class="menu-bar <?php echo esc_attr($class);?>"> 
							<div class="navbar-header res-nav-header toggle-respon">
								<button type="button" class="navbar-toggle menu_toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
									<span class="sr-only"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<?php if (has_nav_menu('primary')) {
								$avocation_defaults = array(
									'theme_location'  => 'primary',
									'menu'            => '',
									'container'       => 'div',
									'container_class' => 'collapse navbar-collapse no-padding main-menu',
									'container_id'    => 'example-navbar-collapse',
									'menu_class'      => 'nav navbar-nav menu',
									'menu_id'         => '',
									'echo'            => true,
									'items_wrap'      => '<ul id="%1$s" class="%2$s  amenu-list">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								);								 
								wp_nav_menu($avocation_defaults);
							} ?>        
						</div>
                         <?php if(!empty($facebook_check) || !empty($twitter_check) || !empty($rss_check) || !empty($pinterest_check) || !empty($youtube_check)){ ?> 
							<div class="col-md-3 col-sm-3 social-icon  no-padding">	
								<ul>
									<?php if(!empty($facebook_check)) { ?>
										<li > <a href="<?php echo esc_url($facebook_check); ?>" class="facebook-icon"> <span class="fa fa-facebook"></span> </a> </li>
									<?php }
									if(!empty($twitter_check)) { ?>
										<li> <a href="<?php echo esc_url($twitter_check); ?>" class="twitter-icon"> <span class="fa fa-twitter"></span> </a> </li>
									<?php }
									if(!empty($youtube_check)) { ?>
										<li> <a href="<?php esc_url($youtube_check); ?>" class="youtube-icon"> <span class="fa fa-youtube"></span> </a> </li>
									<?php }
									if(!empty($rss_check)) {  ?>
										<li> <a href="<?php echo esc_url($rss_check); ?>" class="rss-icon"> <span class="fa fa-linkedin"></span> </a> </li>
									<?php }
									if(!empty($pinterest_check)) {  ?>
										<li> <a href="<?php echo  esc_url($pinterest_check); ?>" class="pinterest-icon"> <span class="fa fa-pinterest"></span> </a> </li>
									<?php } ?>
								</ul>
							</div>
                        <?php } ?>                                              
                    </div>                    
                </div>
            </div>
             <?php $avocation_header_image = get_header_image();
             if (!empty($avocation_header_image)) { ?>
                <div class="container custom-header-image">
                    <img src="<?php echo esc_url($avocation_header_image); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php _e('custom-header', 'avocation') ?>" />
                </div>
            <?php } ?>
        </header>