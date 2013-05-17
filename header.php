<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title( '|', true, 'right' ); 
		bloginfo('name');
		?>
        </title>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/comments.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skeleton.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_enqueue_script ("jquery"); ?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="wrapper container">
	<header class="headerwrapper ">
    	<div class="top_header clearfix">
        	<div class="four columns">
            	<div class="logo">
        			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" title="Logo"></a> 	
                </div>
            </div>
            <div class="twelve columns">
            </div>
            
        </div>
        <div class="middle_header clearfix">
        	<div class="sixteen columns">
            	<div class="menu">
                    	
                      <?php wp_nav_menu( array( 'theme_location' => 'header_menu') ); ?>
                </div>
            </div>
        </div>
        <div class="bottom_header clearfix">
        	<div class="hero_unit">
            	<div class="sixteen columns">
                	<h1>Hello, world!</h1>
                <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
                </div>
            </div>
        </div>
    </header><!-- End of the Header -->
	
    	
     