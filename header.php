<?php
/**
 * The Header
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Cryout Creations
 * @subpackage mantra
 * @since mantra 0.5
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	wp_title( '', true, 'right' );

	?></title>
<?php
/* This  retrieves  admin options. */

$mantra_options= mantra_get_theme_options();
foreach ($mantra_options as $key => $value) {	
     ${"$key"} = $value ;
}
?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script>
document.createElement('header');
document.createElement('nav');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('footer');
document.createElement('hgroup');
</script>
<![endif]-->

<?php if ($mantra_options['mantra_favicon']) { ?> <link rel="shortcut icon" href="<?php echo $mantra_options['mantra_favicon']; ?>" />
<?php }

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	 
 	mantra_header(); 
	wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<script>
    jQuery(document).ready(function() {
    jQuery("#content img").addClass("<?php echo 'image'.$mantra_image;?>");
	  jQuery(function () {
    jQuery("#prime_nav").tinyNav({
	header: true // Show header instead of the active item
					});
  });
    });

</script>

<div id="toTop"> </div>

<div id="wrapper" class="hfeed">

<?php if ( has_nav_menu( 'top' ) ) wp_nav_menu( array( 'container' => 'nav', 'container_class' => 'topmenu', 'theme_location' => 'top' ) ); ?>

<header id="header">

		<div id="masthead"> 
	
			<div id="branding" role="banner" > 
				<?php if ($mantra_options['mantra_linkheader']=="Enable") { ?><a href="<?php echo home_url( '/' ); ?>" id="linky"> </a><?php } ?>  
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?><<?php echo $heading_tag; ?> id="site-title">
					<span> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> </span>
				</<?php echo $heading_tag; ?>>
				<div id="site-description" ><?php bloginfo( 'description' ); ?></div>
				
				<div class="socials" id="sheader"> <?php if($mantra_socialsdisplay0) mantra_set_social_icons(); ?> </div>

				<?php
				// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) && $mantra_fheader == "Enable" &&
							(  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
					// Houston, we have a new header image!
					//echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' ); 
					 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array(HEADER_IMAGE_WIDTH,HEADER_IMAGE_HEIGHT) ); 
	 ?><style>
	 #branding {background:url(<?php echo $image[0]; ?>) no-repeat;height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;}
      </style>  
				<?php else : if (get_header_image() != '') { ?>
					<style> #branding {background:url("<?php header_image(); ?>") no-repeat; <?php if ($mantra_dimselect=="Absolute") { ?>width:<?php echo HEADER_IMAGE_WIDTH; ?>px; <?php } ?> height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;} 
						 </style>
				<?php } else { ?><?php } ?>
				<?php endif; 

				if ($mantra_options['mantra_linkheader']=="Enable") { ?>  
				<style>
					#linky { display:block; position:absolute; width:<?php echo HEADER_IMAGE_WIDTH; ?>px; height:<?php echo HEADER_IMAGE_HEIGHT; ?>px; z-index:1; }
					#branding { height:<?php echo HEADER_IMAGE_HEIGHT; ?>px; }
					#site-title, #site-description, #sheader { position:relative; z-index:2 }
				</style>
				<?php } ?>
				
				<div style="clear:both;"></div>
			
			</div><!-- #branding --> 

			<nav id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mantra' ); ?>"><?php _e( 'Skip to content', 'mantra' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */
				 wp_nav_menu( array( 'container_class' => 'menu-header', 'menu_id' =>'prime_nav', 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
		</div><!-- #masthead -->

<div style="clear:both;"> </div>




	</header><!-- #header -->
	<div id="main">
	<div  id="forbottom" >
			<div class="socials" id="smenul">
<?php if($mantra_socialsdisplay1) mantra_set_social_icons(); ?>
</div>
			<div class="socials" id="smenur">
<?php if($mantra_socialsdisplay2) mantra_set_social_icons(); ?>
</div>
<div style="clear:both;"> </div> 
<?php if($mantra_breadcrumbs=="Enable") { mantra_breadcrumbs();  }?>