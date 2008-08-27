<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>" />
<!-- remember to complete the following -->
<meta name="language" content="en" />
<meta name="author" content="Author's Name" />
<meta name="copyright" content="Copyright Holder's Name" />
<meta name="keywords" content="Comma separated keywords" />
<!-- remember to upload a favicon of your choice to the root directory -->
<link rel="shortcut icon" href="<?php echo get_option('home'); ?>/favicon.ico" />
<meta name="robots" content="all" />
<?php wp_head(); ?>
</head>
<body>
	<div id="skip">
		<p><a href="#content" title="Skip menu and go straight to main content">Skip Navigation</a></p>
	</div><!--end skip-->
	<div id="header-container">
		<div id="header">
			<h1><a href="<?php bloginfo('url'); ?>" title="Home"><?php bloginfo('name'); ?></a></h1>
			<p><?php bloginfo('description'); ?></p>
		</div><!--end header-->
		<div id="rss">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div><!--end rss-->
	</div><!--end header-container-->
	<ul id="menu">
  		<?php if(is_home() && !is_paged()){ ?>
   			<li class="current_page_item first">
    			<a href="<?php echo get_settings('home'); ?>" title="You are Home">Home</a>
   			</li>
 		<?php } else { ?>
  			<li class="first">
   				<a href="<?php echo get_settings('home'); ?>" title="Click for Home">Home</a>
  			</li>
 		<?php } ?>
		<?php  wp_list_pages('sort_column=menu_order&title_li='); ?>
   		<a href="<?php bloginfo('rss2_url'); ?>" title="Stay updated">RSS Feed</a>
   		<?php wp_register(); ?>
		<?php wp_meta(); ?>
 	</ul>
