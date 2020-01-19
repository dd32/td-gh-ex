<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">
<?php wp_body_open(); ?>
<div class="wrapper">
<a class="skip-link screen-reader-text" href="#page">
<?php esc_attr_e( 'Skip to content', 'promax' ); ?></a>
<!-- BEGIN HEADER -->
	<div id="header">
    <div id="header-inner" class="clearfix">
		<div id="logo">   
				
					<?php promax_site_logo();
					promax_site_title(); 
					promax_site_description(); ?>	
		</div>		
		
		<div id="banner-top"><?php if ( !dynamic_sidebar('headerban') ) :  endif; ?>
		</div>		
    </div> <!-- end div #header-inner -->
	</div> <!-- end div #header -->

	<!-- END HEADER -->

	<!-- BEGIN TOP NAVIGATION -->
	<?php
	
	if (get_theme_mod('promax_topnavi') !=='disable') { get_template_part('template-parts/menu'); } ?>
<?php if (get_theme_mod('promax_main_navi') !=='disable') { get_template_part('template-parts/nav-menu'); } ?>
<div class="promaxwid">
<?php if ( !dynamic_sidebar('belownaviwid') ) :  endif; ?></div>