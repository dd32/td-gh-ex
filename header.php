<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
   
    <!--[if lt IE 7]>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/unitpngfix.js"></script>
<link href="<?php bloginfo('template_url'); ?>/iestyle.css" rel="stylesheet" type="text/css" />
<![endif]-->

    
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>



<?php wp_enqueue_script('jquery'); ?>


      
	<?php wp_head(); ?>
   
     
    <link href="<?php bloginfo('template_url'); ?>/blu/style.css" rel="stylesheet" type="text/css" title="blu" />
    <link href="<?php bloginfo('template_url'); ?>/green/style.css" rel="alternate stylesheet" type="text/css" title="green" />
    <link href="<?php bloginfo('template_url'); ?>/orange/style.css" rel="alternate stylesheet" type="text/css" title="orange" />
    <link href="<?php bloginfo('template_url'); ?>/purple/style.css" rel="alternate stylesheet" type="text/css" title="purple" />
  
    
      
<script src="<?php bloginfo('template_url'); ?>/jquery.dropshadow.js" type="text/javascript"></script>

<script src="<?php bloginfo('template_url'); ?>/styleswitcher.js" type="text/javascript"></script>


<script type="text/javascript">
window.onload = function()  
			{
			 jQuery.noConflict();
jQuery("#header_center h1").dropShadow();

}

</script>
</head>

<body>

<div id="wrap">
<div id="header">

<div id="top">
<ul class="home">
  <li id="button"><a href="<?php echo get_settings('home'); ?>"><span>home</span></a></li>
  </ul>

<div class="colours">

  <a class="blu" href="#" onclick="setActiveStyleSheet('blu'); return false;"><span>blu</span></a>
  <a class="green" href="#" onclick="setActiveStyleSheet('green'); return false;"><span>green</span></a>
  <a class="orange" href="#" onclick="setActiveStyleSheet('orange'); return false;"><span>orange</span></a>
  <a class="purple" href="#" onclick="setActiveStyleSheet('purple'); return false;"><span>purple</span></a>
  </div>
</div>

<div id="header_center">
<h2><?php bloginfo('description'); ?></h2>
<h1><?php bloginfo('name'); ?></h1>
</div>

<div id="navigation">
<ul>
<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>

 <div id="topsearchform">
<form id="search_form" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="s" id="search" value="Search..." onfocus="this.value=''" />
 <span class="send">
        <input name="submit" id="submit" type="submit" value="" class="search" />
        </span>
</form>
</div>

  <div id="feed">
  <a href="<?php bloginfo('rss_url'); ?>"><span>Feed</span></a>
  </div>
  
</div>
</div>
