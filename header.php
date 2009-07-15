<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes()?> >
  <head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>; charset=<?php bloginfo('charset');?>" />
    <meta name="description" content="<?php if (!is_home()){single_post_title('',true); }                                         else{ bloginfo('name');echo" - ";bloginfo('description'); } ?>" />
    <title>
      <?php bloginfo('name');if(is_single() ) { ?> &raquo; Blog Archive 
      <?php }wp_title();?> 
    </title>
    <style type="text/css" media="screen"> @import url(
      <?php bloginfo('stylesheet_url'); ?> );
    </style>
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name')?> RSS Feed" href="<?php bloginfo('rss2_url');?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
    <?php wp_head()?>
  </head>
  <body>
    <div id="page">
      <div id="head">      
        <h1 id="htitle">
          <a href="<?php bloginfo('url');?>/">
            <?php bloginfo('name')?></a></h1>      
        <div id="hdescr">
          <?php bloginfo('description'); ?>
        </div>      
        <div id="hsearch">
          <?php include(TEMPLATEPATH.'/searchform.php')?>
        </div>
      </div>      
      <div id="hpages">          
        <ul>              
          <li <?php if(is_home()) echo('class="page_item current_page_item"') ?>>
            <a href="<?php bloginfo('url')?>">Home</a></li>              
          <?php wp_list_pages('title_li=')?>          
        </ul>      
      </div>
      <div id="center">