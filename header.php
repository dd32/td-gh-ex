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
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">	
	<?php wp_head(); ?>
</head>
    <body <?php body_class(); ?>>
        <!-- header start -->
        <header>
            <div class="scroll-header">  
                <div class="avocation-container  container">                 
                    <div class="col-md-3 logo col-sm-12">
                        <?php if(has_custom_logo()){
                       		the_custom_logo();
						}  
						if (display_header_text()) { ?>		  
                         <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<h2 class="site-title logo-box"><?php bloginfo( 'name' ); ?></h2>
							<span class="site-description"><?php bloginfo( 'description' ); ?></span>
						</a>
						<?php } ?>
                    </div>
                    <div class="col-md-9 center-content  ">
						<?php $social_flag=false;
						for($i=1; $i<=5; $i++) : 
							if(get_theme_mod('TopHeaderSocialIconLink'.$i)!='' && get_theme_mod('TopHeaderSocialIcon'.$i)!=''):
								$social_flag=true;
							endif;
						endfor;						
						$class=($social_flag)?"col-sm-9 col-md-9":""; ?>
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
                         <?php if($social_flag){ ?> 
							<div class="col-md-3 col-sm-3 social-icon  no-padding">	
								<ul>
									<?php for($i=1; $i<=5; $i++) : ?>			                            
	                                   <li><a href="<?php echo esc_url(get_theme_mod('TopHeaderSocialIconLink'.$i)); ?>" class="icon" title="" target="_blank">
	                                        <i class="fa <?php echo esc_attr(get_theme_mod('TopHeaderSocialIcon'.$i)); ?>"></i>
	                                    </a></li>
		                            <?php endfor; ?>
								</ul>
							</div>
                        <?php } ?>                                              
                    </div>                    
                </div>
            </div>
             <?php $avocation_header_image = get_header_image();
             if (!empty($avocation_header_image)) { ?>
                <div class="container custom-header-image">
                    <img src="<?php echo esc_url($avocation_header_image); ?>" class="header-image" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" />
                </div>
            <?php } ?>
        </header>