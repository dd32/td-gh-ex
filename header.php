<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!--SMARTPHONES-->
<meta name="viewport" content="width=device-width" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


    <div id="header">
		
	<div id="logo">
		<?php the_custom_logo(); ?>
	</div>

<?php if(get_header_textcolor()!='blank') { ?>
<div id="header-text" style="color:#<?php echo get_header_textcolor();?>!important;">
<a href="<?php echo home_url( '/' );?>" style="color:#<?php echo get_header_textcolor();?>!important;">
<div class="site-title"><?php bloginfo('name');?></div></a>
<div class="site-description"><?php bloginfo('description'); ?></div>
</div>
<?php } ?>



</div>

<div id="wrapper">

		<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container_class' => 'nav', 'container_id' => 'topmenu', 'fallback_cb' => 'false' )); ?>

	<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_class' => 'nav', 'container_id' => 'primmenu', 'fallback_cb' => 'false' )); ?>
	