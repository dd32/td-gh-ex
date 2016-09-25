<!DOCTYPE html>
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

<header class="header" id="header" itemscope itemtype="http://schema.org/WPHeader">

  <?php echo adelle_theme_heading(); ?>

  <nav class="nav" id="nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
    <div class="menu-click">&nbsp;</div>
    <?php wp_nav_menu( 'theme_location=top_menu&container_class=menu&menu_class=main-menu&fallback_cb=wp_page_menu&show_home=1' ); ?>

    <form role="search" method="get" class="header-form" action="<?php echo esc_url( home_url() ); ?>">
      <fieldset>
        <input type="text" name="s" class="header-text uniform" size="15" title="<?php esc_attr_e( 'Search', 'adelle' ); ?>" />
        <input type="submit" class="uniform" value="<?php esc_attr_e( 'Search', 'adelle' ); ?>" />
      </fieldset>
    </form>

  </nav><!-- .nav -->

</header><!-- .header -->

<section class="container">