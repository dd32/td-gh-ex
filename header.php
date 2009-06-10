<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<link rel="Shortcut Icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?>, Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />


<meta name="language" content="en" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<style type="text/css">
body { background: <?php echo $bs_theme_body_background; ?>; }
#wrap { background: <?php echo $bs_theme_wrap_background; ?>; border: 1px solid <?php echo $bs_theme_wrap_border; ?>; }
#header { background: <?php echo $bs_theme_header_background; ?> url('<?php echo bloginfo('template_url'); ?>/images/<?php echo $bs_theme_header_background_image; ?>') left no-repeat; }
#navbar { background: <?php echo $bs_theme_navbar_background; ?>; }
#navbar a { color: <?php echo $bs_theme_navbar_link_color; ?>; }
#sidebar { color: <?php echo $bs_theme_sidebar_text_color; ?>; }
#footer { color: <?php echo $bs_theme_footer_text_color; ?>; }
h1, h2, h3, h4, h1 a, h2 a, h3 a, h4 a { color: <?php echo $bs_theme_title_color; ?>; }
a { color: <?php echo $bs_theme_link_color; ?>; } 
.the_content { color: <?php echo $bs_theme_text_color; ?>; }
<?php if($bs_theme_header_show_hide_text=="hide"){ ?>
#header h1, #header .description { visibility:hidden; }
<?php } ?>
<?php echo $bs_theme_custom_css; ?>
</style>
<?php echo stripslashes($bs_theme_google_verify_code); ?>
</head>
<body>

<div id="wrap">

<div id="header">
	<h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
	<p class="description"><?php bloginfo('description'); ?></p>
</div><!--end header-->

<div id="navbar">
	<ul>
		<li><a href="<?php echo get_settings('home'); ?>"><?php _e("Home"); ?></a></li>
		<?php wp_list_pages('title_li=&depth=1&sort_column=menu_order'); ?>
	</ul>
</div><!--end navbar-->