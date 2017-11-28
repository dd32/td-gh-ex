<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
<header id="header">
    <?php if(get_theme_mod('show_top_bar',true)){  ?>
    <section class="header-top">
      <section class="container">
        <div class="row">
          <?php if(get_theme_mod('show_search',true)){  ?>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left">
            <?php get_search_form(); ?>
          </div>
          <?php } ?>
            
            <div class="top-social">
            <?php backyard_social_media_link(); ?>
            </div>
            <!--top-social--> 
       </div>
     </section>
    </section>
    <!--top-header-->
     <?php } ?>
<div class="header-main">
<section class="container">
      <div class="row">
      <?php do_action('backyard_header_action');?>
</div>
</section>
</div><!--header-main-->
</header>
  