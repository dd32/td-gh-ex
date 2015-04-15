<?php
/**
 * The Header template file
 */
$avocation_options = get_option('avocation_theme_options');
?>
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
	
	<?php if (!empty($avocation_options['avocation-favicon'])) { ?>
		<link rel="shortcut icon" href="<?php echo esc_url($avocation_options['avocation-favicon']); ?>"> 
	<?php } ?>	
	<?php wp_head(); ?>
	
</head>
    <body <?php body_class(); ?>>

        <!--==============================header start=================================-->
        <header>            

            <div class="scroll-header">  
                <div class="avocation-container  container">                 
                    <div class="col-md-3 logo col-sm-12">
                         <?php if (!empty($avocation_options['avocation-logo'])) { ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><img alt="<?php _e('avocation-logo', 'avocation') ?>" src="<?php echo esc_url($avocation_options['avocation-logo']); ?>" class="img-responsive"></a> 
                                <?php } else { ?>		  
                                  <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h2 class="site-title logo-box"><?php bloginfo( 'name' ); ?></h2>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			</a>
                                <?php } ?>
                    </div>
                    <div class="col-md-9 center-content  ">
						<?php if(!empty($avocation_options['avocation-fburl']) || !empty($avocation_options['avocation-twitter']) || !empty($avocation_options['avocation-youtube']) ||!empty($avocation_options['avocation-rss']) || !empty($avocation_options['avocation-pinterest']) )
			{
				$class="col-sm-9 col-md-9";
			}
		else {
			$class="";
				}?>			 
						
                        <div class="menu-bar <?php echo $class;?>"> 
                            <div class="navbar-header res-nav-header toggle-respon">
                                <button type="button" class="navbar-toggle menu_toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                                    <span class="sr-only"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <?php

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
							
							 if (has_nav_menu('primary')) {
                                    wp_nav_menu($avocation_defaults);
                                }
                                ?>        
							
                                  
                        </div>
                        
                            <?php if (!empty($avocation_options['avocation-fburl']) || !empty($avocation_options['avocation-twitter']) || !empty($avocation_options['avocation-youtube']) || !empty($avocation_options['avocation-rss'])) { ?>
                        <div class="col-md-3 col-sm-3 social-icon  no-padding">	
                            <ul>
                                        <?php if (!empty($avocation_options['avocation-fburl'])) { ?>
                                            <li > <a href="<?php echo esc_url($avocation_options['avocation-fburl']); ?>" class="facebook-icon"> <span class="fa fa-facebook"></span> </a> </li>
                                        <?php } ?>
                                        <?php if (!empty($avocation_options['avocation-twitter'])) { ?>
                                            <li> <a href="<?php echo esc_url($avocation_options['avocation-twitter']); ?>" class="twitter-icon"> <span class="fa fa-twitter"></span> </a> </li>
                                        <?php } ?>
                                        <?php if (!empty($avocation_options['avocation-youtube'])) { ?>
                                            <li> <a href="<?php echo esc_url($avocation_options['avocation-youtube']); ?>" class="youtube-icon"> <span class="fa fa-youtube"></span> </a> </li>
                                        <?php } ?>
                                        <?php if (!empty($avocation_options['avocation-rss'])) { ?>
                                            <li> <a href="<?php echo esc_url($avocation_options['avocation-rss']); ?>" class="rss-icon"> <span class="fa fa-rss"></span> </a> </li>
                                        <?php } ?>
                                        <?php if (!empty($avocation_options['avocation-pinterest'])) { ?>
                                            <li> <a href="<?php echo esc_url($avocation_options['avocation-pinterest']); ?>" class="pinterest-icon"> <span class="fa fa-pinterest"></span> </a> </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>                                                
                    </div>                    
                </div>
            </div>
             <?php
            $avocation_header_image = get_header_image();
            if (!empty($avocation_header_image)) {
                ?>
                <div class="container">
                    <img src="<?php echo esc_url($avocation_header_image); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php _e('custom-header', 'avocation') ?>" />
                </div>
            <?php } ?>
        </header>    
      
