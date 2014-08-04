<?php
/**
 * The Header template.
 */
$topmag_options = get_option( 'topmag_theme_options' );
?>
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
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title>
<?php wp_title(); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if(!empty($topmag_options['favicon'])) { ?>
<link rel="shortcut icon" href="<?php echo esc_url($topmag_options['favicon']);?>">
<?php } ?>
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- header -->
<header>
  <div class="container container-magzemine"> 
    <!-- LOGO AND TEXT -->
    <div class="col-md-12 no-padding ">
      <div class="col-md-4 header-logo">
        <?php if(empty($topmag_options['logo'])) { echo '<div class="topmag_site_name"><a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo('name').'</a></div>';  } else { ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($topmag_options['logo']); ?>" class="img-responsive" /></a>
        <?php } ?>
        <p class="topmag_tagline">
          <?php if(!empty($topmag_options['logo-tagline'])) { echo get_bloginfo('description'); } ?>
        </p>
      </div>
      <div class="col-md-8 header-text">
        <?php if(get_header_image()){ ?>
        <div class="custom-header-img"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img class="img-responsive" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""> </a> </div>
        <?php } ?>
      </div>
    </div>
    <!-- END LOGO AND TEXT --> 
    <!-- MENU -->
    <div class="col-md-12 no-padding">
      <nav role="navigation" class="navbar navbar-default"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle"> <span class="sr-only">
          <?php _e('Toggle navigation','topmag'); ?>
          </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="<?php echo site_url(); ?>" class="home-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/home.png" /></a> </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse menu">
          <?php
				$topmag_menu_args = array(
							'theme_location'  => 'primary',
							'container'       => 'div',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu-header-menu-container',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="nav navbar-nav topmag-menu">%3$s</ul>',
							'depth'           => 0,
				);
				
				wp_nav_menu( $topmag_menu_args );
			
		?>
        </div>
      </nav>
    </div>
    <!-- END MENU --> 
  </div>
</header>
<!-- End header -->
<div class="container container-magzemine no-padding">
<?php topmag_breaking_news(); ?>