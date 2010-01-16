<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/scripts/showhide.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url');?>/style.css" />
<link rel="shortcut icon" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon.png" />		
<?php include (TEMPLATEPATH . '/walls-style.php'); ?>
<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}?>
<title><?php if (is_home () ) { bloginfo('name'); echo ' - ' ; bloginfo('description');}
			elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo('name');}
			elseif (is_single() ) { single_post_title(); echo ' - ' ; bloginfo('name');}
			elseif (is_page() ) { single_post_title(); echo ' - ' ; bloginfo('name');}
			else { wp_title('',true); } ?>
</title>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>		
</head><body>	
<div id="header"><div class="con">
<h1 class="logo-text"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>		
<h5 id="slogan"><?php bloginfo('description'); ?></h5><div class="icon-holder"><div id="icon-filler">
	
</div><?php if ($bxx_rss_icon == "yes") {?>
<a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed"><img class="icon" src="<?php bloginfo("template_directory"); ?>/images/icon-rss.png" alt="RSS Feed" title="RSS Feed" /></a>
<?php }?><?php if ($bxx_search_icon == "yes") {?>
<a  href="javascript:toggleLayer('showhide');" title="Search the site"><img class="icon" src="<?php bloginfo("template_directory"); ?>/images/icon-search.png" alt="Search the site" title="Search" /></a><?php }?></div></div></div>
<div id="navbar"><div class="con">
<ul><?php if (is_home()) { ?><li class="current_page_item">
<a href="<?php echo get_settings('home'); ?>" title="Home">Home</a></li>
<?php }else{ ?><li class="page_item">
<a href="<?php echo get_settings('home'); ?>" title="Home">Home</a>
</li><?php } ?><?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
</ul></div><div class="clearbox"></div></div>			
<div id="showhide"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div><div id="container"><div id="break"></div>