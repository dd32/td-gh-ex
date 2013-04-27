<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?>
        </title> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" /> 
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> style="background:url('<?php if (appointway_get_option('appointway_bodybg') != '') {
    echo appointway_get_option('appointway_bodybg');
} else { } ?>');">
<div class="header_container">
<div class="container_24">
<div class="grid_24">
<div class="header">
          <div class="grid_14 alpha">
             <div class="logo">
						<a href="<?php echo home_url(); ?>"><img src="<?php if (appointway_get_option('appointway_logo') != '') { ?><?php echo appointway_get_option('appointway_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?> logo"/></a>
     </div>
          </div>
          <div class="grid_10 omega">            
    			<div class="call-us">
<?php if (appointway_get_option('appointway_topright') != '') { ?>
<p> <?php echo stripslashes(appointway_get_option('appointway_topright')); ?></p>
<br/><a class="btn" href="tel:<?php echo stripslashes(appointway_get_option('appointway_contact_number')); ?>">
<span></span></a>
<?php } 
else { ?>
<p> For Reservation Call : 1.888.222.5847</p>
<br/>
<a class="btn" href="tel:5551234567"><span></span></a>
<?php } ?>
</div>
</div>        
</div>
</div>
<div class="clear"></div>
</div>
</div>
<div class="menu_container">
<div class="container_24">
<div class="grid_24">
<div class="menu_container">
<div class="menu_bar">
<div id="MainNav">
<a href="#" class="mobile_nav closed">Pages Navigation Menu<span></span></a>
<?php appointway_nav(); ?> 
</div>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>