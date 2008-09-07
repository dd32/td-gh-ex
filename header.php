<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title>
	
<meta http-equiv="imagetoolbar" content="no" />

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />	


<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> 


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	
	<style type="text/css" media="screen">
	
	
	  #superheader{
		background: url("<?php bloginfo('template_directory'); ?>/images/superheaderbg.jpg") top left repeat-x;
				}	
#header{
		background: url("<?php bloginfo('template_directory'); ?>/images/indexheader.gif") top left no-repeat;
				}	
		
	#wrapper2{
		background: url("<?php bloginfo('template_directory'); ?>/images/wrapper2bg.gif") repeat-y;
				}				
				
.post h2, #centercontent h2{
		background: url("<?php bloginfo('template_directory'); ?>/images/header_bullet.png") no-repeat 0px 5px;
				}
.menu h3, .menu ul li h3{
		background: url("<?php bloginfo('template_directory'); ?>/images/sidebarheaderbg.gif") bottom left no-repeat;
				}			
	
	#pagemenu li a:link, #pagemenu li a:visited {
		background:  url("<?php bloginfo('template_directory'); ?>/images/pagemenu.gif");	
				}
	#pagemenu li a:hover {
	background:  url("<?php bloginfo('template_directory'); ?>/images/pagemenu.gif") 0 -32px;
				}
</style>
	
	
	
	<?php wp_head(); ?>
</head>
<body>

<div id="wrapper">

<div id="wrapper2">

<div id="superheader">

<div style="float:right;"><form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="s" id="s" style="width:160px" /> <input type="submit" value="<?php _e('Search'); ?>" />
</form></div>

  <h3><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h3>

</div>

