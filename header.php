<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.ico"/>-->


<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


    <div id="header">


<?php if(get_header_textcolor()!='blank') { ?>
<div id="header-text" style="color:#<?php echo get_header_textcolor();?>!important;">
<a href="<?php echo home_url( '/' );?>" style="color:#<?php echo get_header_textcolor();?>!important;">
<div class="site-title"><?php bloginfo('name');?></div></a>
<div class="site-description"><?php bloginfo('description'); ?></div>
</div>
<?php } ?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</a>

</div>

<div id="wrapper">


		<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'container_class' => 'nav', 'container_id' => 'topmenu', 'fallback_cb' => 'false' )); ?>


	<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container_class' => 'nav', 'container_id' => 'primmenu', 'fallback_cb' => 'false' )); ?>