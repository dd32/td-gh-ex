<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/swfobject.js"></script>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>

<body>
<div id="rap">
<div id="masthead">
<h1 id="header"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> &ndash; <?php bloginfo('description'); ?></h1>
</div>

<script type="text/javascript">
swfobject.embedSWF("<?php bloginfo('template_directory'); ?>/flash/sonix_header.swf?thetitle=<?php bloginfo('title'); ?>&thestrap=<?php bloginfo('description'); ?>", "masthead", "900", "50", "8", "#000000");  
</script>

<?php 
if (function_exists('navt_getlist')) {
navt_getlist($sNavGroupName='tabs', $bEcho=true, $sTitle='', $sBefore='ul id="dropnav" class="clearfix"', $sAfter='/ul', $sBeforeItem='li', $sAfterItem='/li');}
else {echo'<ul id="dropnav" class="clearfix">'; wp_list_pages('exclude=11&title_li=','title_li= '); echo '</ul>';}
 ?>


<div id="main">

<div id="content">
<!-- end header -->