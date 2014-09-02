<?php
/**
 * The Header template for our theme
 */
 $besty_options = get_option( 'besty_theme_options' );
 ?><!DOCTYPE html>
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
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php if(!empty($besty_options['favicon'])) {?>
    <link rel="shortcut icon" href="<?php echo $besty_options['favicon'];?>">
    <?php } ?>
    <!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	<![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="content">
	<div class="menu-sidebar">
    	<div class="logo">
        	<?php if(empty($besty_options['logo'])) { ?>
        		<h1 class="besty-site-name"><a href="<?php echo get_site_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
            <?php } else { ?>
        		<a href="<?php echo get_site_url(); ?>"><img src="<?php echo $besty_options['logo']; ?>" alt="" class="logo-center" /></a>
            <?php }
			if(!empty($besty_options['tagline']))
			{
				printf( '<h1>%1$s</h1>',$besty_options['tagline']);
			}
            ?>            
        </div>
        <?php if(get_header_image()){ ?>
        <div class="custom-header-img">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        	<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
        </a>
        </div>
    <?php } ?> 
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle navbar-toggle-top" data-toggle="collapse" data-target=".navbar-collapse"> 
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar icon-color"></span> 
                <span class="icon-bar icon-color"></span> 
                <span class="icon-bar icon-color"></span> 
            </button>
        </div>
      
        <?php
        	$besty_defaults = array(
							'theme_location'  => 'primary',
							'container'       => 'nav',
							'container_class' => 'besty-menu navbar-collapse collapse',
							'container_id'    => '',
							'menu_class'      => 'besty-menu navbar-collapse collapse',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul>%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
			wp_nav_menu($besty_defaults); ?>
      
        
        <div class="footer">
        	<ul class="social">
            <?php
			if(!empty($besty_options['fburl'])) {?>
            	<li><a href="<?php echo $besty_options['fburl'];?>" data-toggle="tooltip" class="sprite icon-facebook besty-tooltip" data-original-title="Facebook"></a></li>
            <?php }
			if(!empty($besty_options['twitter'])) {?>
                <li><a href="<?php echo $besty_options['twitter'];?>" data-toggle="tooltip" class="sprite icon-twitter besty-tooltip" data-original-title="Twitter"></a></li>
           	<?php }
			if(!empty($besty_options['googleplus'])) {?>
                <li><a href="<?php echo $besty_options['googleplus'];?>" data-toggle="tooltip" class="sprite icon-google besty-tooltip" data-original-title="Google Plus"></a></li>
           	<?php }
			if(!empty($besty_options['linkedin'])) {?>
                <li><a href="<?php echo $besty_options['linkedin'];?>" data-toggle="tooltip" class="sprite icon-linkedin besty-tooltip" data-original-title="Linkedin"></a></li>
            <?php }?>
			</ul>
            <div class="copyright"><?php 
			if(!empty($besty_options['footertext'])) {
				echo $besty_options['footertext'];
			} echo '<br /><a href="http://fasterthemes.com/wordpress-themes/Besty" target="_blank">Besty</a> powered by WordPress.';
				?>
                
            
            </div>
        </div>
    </div>