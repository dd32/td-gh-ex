<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title><?php bloginfo('name'); Echo wp_title('&raquo;', True, 'left'); ?></title>
  
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/960/960.css" type="text/css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/960/reset.css" type="text/css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/960/text.css" type="text/css" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme.css" type="text/css" />
  
  <?php $appearance_scheme = Get_Theme_Setting('appearance_scheme'); If ($appearance_scheme != '') : ?><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/color/<?php echo $appearance_scheme ?>.css" type="text/css" media="screen" /><?php EndIf; ?>

  
  <?php If (Get_Theme_Setting('no-print')) : ?><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/no-print.css" type="text/css" media="print" />
  <?php EndIf; ?>
  
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/image/fav.ico" type="image/x-icon" />
  
  <?php wp_enqueue_script('jquery'); ?>
  
  <?php wp_head(); ?>

  <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/theme.js"></script>
</head>

<body>

<div class="container_16 container">

  <div class="header">
    <?php If(!Get_Theme_Setting('hide-be-berlin-logo')) : ?>
      <div class="grid_3 alpha">
        <a href="<?php bloginfo('home') ?>" class="logo"></a>
      </div>
    <div class="grid_10">
    <?php Else : ?>
    <div class="grid_13 push_1 alpha">
    <?php EndIf; ?>
      <ul class="top-menu">
        <li class="page_item <?php If(is_home()) Echo 'current_page_item' ?>"><a href="<?php bloginfo('url') ?>" title="<?php _e('Home', 'theme') ?>"><span class="left">&nbsp;</span><span class="middle"><?php _e('Home', 'theme') ?></span><span class="right">&nbsp;</span></a></li>
        <?php wp_list_pages(Array( 'depth' => 1, 'title_li' => '', 'link_before' => '<span class="left">&nbsp;</span><span class="middle">', 'link_after' => '</span><span class="right">&nbsp;</span>' )); ?>
      </ul>
      
      <?php If ($post->ID != 0 && $sub_menu = wp_list_pages(Array( 'depth' => 1, 'title_li' => '', 'child_of' => $post->ID, 'echo' => 0 ))){
              ?><ul class="top-sub-menu"><?php Echo $sub_menu; ?></ul><?php
            }
            ElseIf (IntVal($post->post_parent) != 0){
              ?><ul class="top-sub-menu"><?php Echo wp_list_pages(Array( 'depth' => 1, 'title_li' => '', 'child_of' => $post->post_parent )) ?></ul><?php
            }
            Else {
              ?><div class="blog-description"><?php bloginfo('name') ?> &mdash; <?php bloginfo('description') ?></div><?php
            }
      ?>
    
    </div>
    <div class="grid_3 omega">
      <div class="search"><?php get_search_form() ?></div>
    </div>
    <div class="clear"></div>
  </div>

  <?php /* If this is home */ If (is_home()) : ?>
    <div class="you-are-here">
      <?php printf(_c('Welcome to <i>%1$s</i> - <i>%2$s</i>| %1 = blog name, %2 = blog description', 'theme'), get_bloginfo('name'), get_bloginfo('description')); ?>
    </div>
  
  <?php /* If this is a category archive */ ElseIf (is_category()) : ?>
    <div class="you-are-here">
      <?php printf(__('Archive for the "%s" Category', 'theme'), single_cat_title('', false)); ?>
    </div>
  
  <?php /* If this is a post */ ElseIf( is_single() ) : ?>
    <div class="you-are-here">
      <?php PrintF (__('You are here: %s','theme'), __('Posts').' &gt; '.$post->post_title) ?>
    </div>
    
  <?php /* If this is a page */ ElseIf( is_page() ) : ?>
    <div class="you-are-here">
      <?php PrintF (__('You are here: %s','theme'), Implode ('&nbsp;&nbsp;&gt;&nbsp;&nbsp;', theme_functions::get_page_path())); ?>
    </div>

  <?php /* If this is a tag archive */ ElseIf( is_tag() ) : ?>
    <div class="you-are-here">
      <?php printf(__('Posts Tagged "%s"', 'theme'), single_tag_title('', false) ); ?>
    </div>
  
  <?php /* If this is a daily archive */ ElseIf (is_day()) : ?>
    <div class="you-are-here">
      <?php printf(_c('Archive for %s|Daily archive page', 'theme'), theme_functions::get_selected_date(_c('F jS, Y|Daily archive page', 'theme'))); ?>
    </div>
  
  <?php /* If this is a monthly archive */ ElseIf (is_month()) : ?>
    <div class="you-are-here">
      <?php printf(_c('Archive for %s|Monthly archive page', 'theme'), theme_functions::get_selected_date(_c('F, Y|Monthly archive page', 'theme'))); ?>
    </div>
  
  <?php /* If this is a yearly archive */ ElseIf (is_year()) : ?>
    <div class="you-are-here">
      <?php printf(_c('Archive for %s|Yearly archive page', 'theme'), theme_functions::get_selected_date(_c('Y|Yearly archive page', 'theme'))); ?>
    </div>
  
  <?php /* If this is an author archive */ ElseIf (is_author()) : ?>
    <div class="you-are-here">
      <?php printf(_c('Author Archive for %s|Author archive page', 'theme'), theme_functions::get_selected_author()->display_name ); ?>
    </div>
  
  <?php /* If this is a paged archive */ ElseIf (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
    <div class="you-are-here">
      <?php _e('Blog Archives', 'theme'); ?>
    </div>
  
  <?php /* If this is a search */ ElseIf ( is_search() ) : ?>
    <div class="you-are-here">
      <?php printF (__('Search results for "%s"', 'theme'), get_search_query()); ?>
    </div>
    
  <?php EndIf; ?>
    
  <?php If (Get_Theme_Setting('sidebar_adjustment') == 'left') get_sidebar(); ?>

  <div class="grid_12"> <?php // This div will end in the footer ?>