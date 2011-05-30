<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'script.php' ), true, false ); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Begin Wrap -->
<div id="wrap">
  <div id="wrapdata">
  
    <!-- Begin Header -->
    <div id="header">
      <div id="headerdata">        
        <?php 
		global $chip_life_global; 
		if( $chip_life_global['theme_options']['chip_life_primary_menu'] == 1 ):
		locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'primary-menu.php' ), true, false );
		endif;
		?>
        <?php locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'header-style.php' ), true, false ); ?> 
        <?php locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'secondary-menu.php' ), true, false ); ?>
        <?php
		if( $chip_life_global['theme_options']['chip_life_sponsor_header_728x15'] == 1 ):
		locate_template( array( CHIP_LIFE_SPONSOR_FSROOT . 'sponsor-728x15.php' ), true, false );
		endif;
		?>        
      </div>
    </div>
    <!-- End Header -->