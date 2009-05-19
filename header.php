<?php global $mytheme; ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	
	<?php wp_head(); ?>
</head>

<body>
<?
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
<tr>
<td id="top_line" colspan="<?php if ($artsavius_sidebar_position == "both sidebars on the right") { ?>3<?php } elseif ($artsavius_sidebar_position == "both sidebars on the left") { ?>3<?php } elseif ($artsavius_sidebar_position == "content between two sidebars") { ?>3<?php } elseif ($artsavius_sidebar_position == "one sidebar on the right") { ?>2<?php } elseif ($artsavius_sidebar_position == "one sidebar on the left") { ?>2<?php } else { ?>3<?php } ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/top_line.jpg" width="1000" height="2" /></td>
</tr>
  <tr>
    <td colspan="<?php if ($artsavius_sidebar_position == "both sidebars on the right") { ?>3<?php } elseif ($artsavius_sidebar_position == "both sidebars on the left") { ?>3<?php } elseif ($artsavius_sidebar_position == "content between two sidebars") { ?>3<?php } elseif ($artsavius_sidebar_position == "one sidebar on the right") { ?>2<?php } elseif ($artsavius_sidebar_position == "one sidebar on the left") { ?>2<?php } else { ?>3<?php } ?>" id="top" valign="top" align="left">
	
	<div id="header">
	<div class="left"></div>
	<div class="center" <?php if ($artsavius_header_showavatar == "No") { ?>style="padding-left:20px;"<?php } ?>><?php if ($artsavius_header_showavatar == "Yes") {
 $dir=TEMPLATEPATH.'/logo';
$openthisdir=opendir($dir);
while ($k=readdir($openthisdir))
{
$m=substr($k,-4);
if ($m=='.jpg' or $m=='.png' or $m=='.gif') $array[]=$k;
}
closedir($openthisdir);
$number=rand(0,count($array)-1);
echo "<img src='".get_bloginfo('stylesheet_directory')."/logo/".$array[$number]."' width='43' height='43' />\n";

 } ?><div id="blog_title"><h1><?php if (is_home()) { ?><? if ($artsavius_header_title) { echo $artsavius_header_title; } else { bloginfo('name'); }?><?php } else { ?><a href="<?php bloginfo('url'); ?>/"><? if ($artsavius_header_title) { echo $artsavius_header_title; } else { bloginfo('name'); }?></a><?php } ?></h1><div id="desc"><? if ($artsavius_header_description) { echo $artsavius_header_description; } else { bloginfo('description'); }?></div></div></div>
	<div class="right"></div>
	</div>
	<div id="top_menu"><?php if ($artsavius_toplinks_home == "Yes") { ?><a href="<?php bloginfo('url'); ?>/"><? if ($artsavius_toplinks_hometitle) { echo $artsavius_toplinks_hometitle; } else { ?>Home<?php } ?></a><?php } ?>
	<? if ($artsavius_toplinks_include) { wp_list_pages('include='.$artsavius_toplinks_include.'&sort_column=menu_order&depth=1&title_li=');} elseif ($artsavius_toplinks_exclude) { wp_list_pages('exclude='.$artsavius_toplinks_exclude.'&sort_column=menu_order&depth=1&title_li=');} else {wp_list_pages('sort_column=menu_order&depth=1&title_li=');} ?></div>
	</td>
  </tr>
  <tr>
  
  <?php if ($artsavius_sidebar_position == "both sidebars on the left") { ?>
    <td id="sidebar_1" align="left" valign="top"><?php get_sidebar(); ?>
	 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_1.jpg" />
</td>
    <td id="sidebar_2" align="left" valign="top"><?php get_sidebar('right'); ?>
	 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_2.jpg" /></td>
<?php } elseif ($artsavius_sidebar_position == "content between two sidebars") { ?>
<td id="sidebar_1" align="left" valign="top" style="border-right:9px solid #CC6F96 !important; width:251px !important; background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_2.jpg) !important;"><?php get_sidebar(); ?>
	 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_2.jpg" /></td>
<?php } elseif ($artsavius_sidebar_position == "one sidebar on the left") { ?>
<td id="sidebar_1" align="left" valign="top" style="border-right:9px solid #CC6F96 !important; width:251px !important; background-image:url(<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_2.jpg) !important;"><?php get_sidebar(); ?>
	 <img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_2.jpg" /></td>
<?php } else {} ?>
  
    <td id="content" valign="top" align="left">