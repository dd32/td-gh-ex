<?php
/*
 * Header For Deserve Theme.
 */
  $deserve_options = get_option( 'deserve_theme_options' );
  
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>    
    <div class="menubar">
    	<div class="deserve-container clearfix">
            <div class="col-md-6">
                <div class="contact-info">
                    <ul>
						<?php if(!empty($deserve_options['phone'])) { ?> 
                        <li>
							<i class="fa fa-phone"></i> <?php echo esc_attr($deserve_options['phone']);?>
							
						</li>
						<?php } ?>
						
						<?php if(!empty($deserve_options['email'])) { ?> 
						<li>
							<i class="fa fa-envelope"></i> <?php echo esc_attr($deserve_options['email']);?>
							
						</li>
						<?php } ?>
					
                       
    
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
            	 <div class="social-link">
                    <ul>
						<?php if(!empty($deserve_options['fburl'])){ ?>
                        <li>
							<a href="<?php echo esc_url($deserve_options['fburl']);?>"><i class="fa fa-facebook"></i></a>
						</li>
						<?php } ?>
						
						 <?php if(!empty($deserve_options['twitter'])){ ?> 
						  <li>					
							<a href="<?php echo esc_url($deserve_options['twitter']);?>"><i class="fa fa-twitter"></i></a>
						</li>
						<?php } ?>
						
						 <?php if(!empty($deserve_options['gplus'])){ ?>
						  <li>						
							<a href="<?php echo esc_url($deserve_options['gplus']);?>"><i class="fa fa-google-plus"></i></a>						
						</li>
						<?php } ?>
                       
                       	<?php if(!empty($deserve_options['skype'])){ ?>
                       	  <li>					
							<a href="<?php echo esc_url($deserve_options['skype']);?>"><i class="fa fa-skype"></i></a>						
						</li>
                       <?php } ?>
                       
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="menubar responsive-menubar">
    	<div class="deserve-container clearfix">
            <div class="col-md-2">
            	<div  class="site-logo">
					
				<?php if(empty($deserve_options['logo'])) { ?>
        		<h4 class="deserve-site-name"><a href="<?php echo home_url('/'); ?>"><?php echo get_bloginfo('name'); ?></a></h4>
				<?php } else { ?>
        		<a href="<?php echo home_url('/'); ?>"><img src="<?php echo esc_url($deserve_options['logo']); ?>" alt="<?php _e('logo','deserve') ?>" class="img-responsive" /></a>
				<?php } ?> 
            
                	
                    <div class="navbar-header res-nav-header toggle-respon">
                        <button type="button" class="navbar-toggle toggle-menu" data-toggle="collapse" data-target=".navbar-collapse">
                           <span class="sr-only"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                       </button>
                   </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="hrader-menu">             
                   
                    <?php
			$deserve_defaults = array(
							'theme_location'  => 'primary',
							'container'       => 'div',
							'container_class' => 'navbar-collapse nav_coll no-padding collapse',
							'container_id'    => 'example-navbar-collapse',
							'menu_class'      => 'navbar-collapse nav_coll no-padding collapse',
							'menu_id'         => 'example-navbar-collapse',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="%2$s nav">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
			wp_nav_menu($deserve_defaults); ?>
                   
                              
                </div>
            </div>
        </div>
    
         <?php if(get_header_image()){ ?>
        <div class="custom-header-img">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        	<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php _e('customheader','deserve') ?>">
        </a>
        </div>
    <?php } ?>
    
    </div>
    
</header>
