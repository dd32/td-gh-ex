<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if(WEBFISH_HEADER_INSIDE_WRAPPER):?><div id="wrap"><?php endif;?>
<?php /*
		Looking for the menu? The menu is imported from the footer. 
		Why are we doing that odd thing? Its better for SEO.
*/?>

<div id="header">
<?php $h_div=is_home()?"h1":"div";?>
	<<?php echo $h_div;?> id="site_title">
		<a href="/"><?php bloginfo('name'); ?></a>
	</<?php echo $h_div;?>>
	<div id="site_description"><?php bloginfo('description'); ?></div>
</div><!-- End: header -->
<?php if(!WEBFISH_HEADER_INSIDE_WRAPPER):?><div id="wrap"><?php endif;?>

<div id="cnt_wrap">
<div id="cnt_top"></div>
<div id="container">
