<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=.5">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>?ver=<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Version' ); ?>" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<ul class="navigation" id="drop-the-menu-down">
	<div class="navigation_header">
        <h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a><i><?php bloginfo('description');?></i></h1></div>

    <li class="menu-navigation-toggle"><a class="fa" href="#drop-the-menu-down">&#xf0ca;</a></li>

    <li class="menu-navigation-close" id="close-menu"><a class="fa" href="#close-menu">&#xf05c;</a></li>
    
    <?php if ( (get_theme_mod('facebook') != '')||
              (get_theme_mod('twitter') != '') ||
              (get_theme_mod('youtube') != '') ||
              (get_theme_mod('google_maps') != '') ||
              (get_theme_mod('email') != '') ||
              (get_theme_mod('500px') != '') ||
              (get_theme_mod('bitcoin') != '') ||
              (get_theme_mod('comments') != '') ||
              (get_theme_mod('copyright') != '') ||
              (get_theme_mod('digg') != '') ||
              (get_theme_mod('fire') != '') ||
              (get_theme_mod('gallery') != '') ||
              (get_theme_mod('google_plus') != '') ||
              (get_theme_mod('instagram') != '') ||
              (get_theme_mod('link') != '') ||
              (get_theme_mod('linkedin') != '') ||
              (get_theme_mod('magnifying_glass') != '') ||
              (get_theme_mod('paper_airplane') != '') ||
              (get_theme_mod('paper_clip') != '') ||
              (get_theme_mod('paypal') != '') ||
              (get_theme_mod('pencil') != '') ||
              (get_theme_mod('phone_cell') != '') ||
              (get_theme_mod('phone_old') != '') ||
              (get_theme_mod('pinterest') != '') ||
              (get_theme_mod('push_pin') != '') ||
              (get_theme_mod('recycle') != '') ||
              (get_theme_mod('shopping_cart') != '') ||
              (get_theme_mod('soundcloud') != '') ||
              (get_theme_mod('steam') != '') ||
              (get_theme_mod('stumble_upon') != '') ||
              (get_theme_mod('sykpe') != '') ||
              (get_theme_mod('tumbler') != '') ||
              (get_theme_mod('tags') != '') ||
              (get_theme_mod('twitter') != '') ||
              (get_theme_mod('world') != '') ||
              (get_theme_mod('wordpress') != '') ||
              (get_theme_mod('yelp') != '') ||
              (get_theme_mod('youtube') != '') ||
              (get_theme_mod('vimeo') != '') ) : ?>
    <li class="social-icons">
        <ul>
            <?php if (get_theme_mod('facebook') != '') : ?><li class="icon-facebook"><a href="<?php echo get_theme_mod('facebook');?>" target="_blank">&#xf09a;</a></li><?php endif; ?>
            <?php if (get_theme_mod('google_plus') != '') : ?><li class="icon-google_plus"><a href="<?php echo get_theme_mod('google_plus');?>" target="_blank">&#xf0d5;</a></li><?php endif; ?>
            <?php if (get_theme_mod('twitter') != '') : ?><li class="icon-twitter"><a href="<?php echo get_theme_mod('twitter');?>" target="_blank">&#xf099;</a></li><?php endif; ?>
            <?php if (get_theme_mod('linkedin') != '') : ?><li class="icon-linkedin"><a href="<?php echo get_theme_mod('linkedin');?>" target="_blank">&#xf0e1;</a></li><?php endif; ?>
            <?php if (get_theme_mod('yelp') != '') : ?><li class="icon-yelp"><a href="<?php echo get_theme_mod('yelp');?>" target="_blank">&#xf1e9;</a></li><?php endif; ?>
            <?php if (get_theme_mod('youtube') != '') : ?><li class="icon-youtube"><a href="<?php echo get_theme_mod('youtube');?>" target="_blank">&#xf167;</a></li><?php endif; ?>
            <?php if (get_theme_mod('vimeo') != '') : ?><li class="icon-vimeo"><a href="<?php echo get_theme_mod('vimeo');?>" target="_blank">&#xf194;</a></li><?php endif; ?>
            <?php if (get_theme_mod('instagram') != '') : ?><li class="icon-instagram"><a href="<?php echo get_theme_mod('instagram');?>" target="_blank">&#xf16d;</a></li><?php endif; ?>
            <?php if (get_theme_mod('google_maps') != '') : ?><li class="icon-google_maps"><a href="<?php echo get_theme_mod('google_maps');?>" target="_blank">&#xf041;</a></li><?php endif; ?>
            <?php if (get_theme_mod('pinterest') != '') : ?><li class="icon-pinterest"><a href="<?php echo get_theme_mod('pinterest');?>" target="_blank">&#xf231;</a></li><?php endif; ?>
            <?php if (get_theme_mod('paypal') != '') : ?><li class="icon-paypal"><a href="<?php echo get_theme_mod('paypal');?>" target="_blank">&#xf1ed;</a></li><?php endif; ?>
            <?php if (get_theme_mod('dropbox') != '') : ?><li class="icon-dropbox"><a href="<?php echo get_theme_mod('dropbox');?>" target="_blank">&#xf16b;</a></li><?php endif; ?>
            <?php if (get_theme_mod('bitcoin') != '') : ?><li class="icon-bitcoin"><a href="<?php echo get_theme_mod('bitcoin');?>" target="_blank">&#xf15a;</a></li><?php endif; ?>
            <?php if (get_theme_mod('digg') != '') : ?><li class="icon-digg"><a href="<?php echo get_theme_mod('digg');?>" target="_blank">&#xf1a6;</a></li><?php endif; ?>
            <?php if (get_theme_mod('soundcloud') != '') : ?><li class="icon-soundcloud"><a href="<?php echo get_theme_mod('soundcloud');?>" target="_blank">&#xf1be;</a></li><?php endif; ?>
            <?php if (get_theme_mod('steam') != '') : ?><li class="icon-steam"><a href="<?php echo get_theme_mod('steam');?>" target="_blank">&#xf1b6;</a></li><?php endif; ?>
            <?php if (get_theme_mod('stumble_upon') != '') : ?><li class="icon-stumble_upon"><a href="<?php echo get_theme_mod('stumble_upon');?>" target="_blank">&#xf1a4;</a></li><?php endif; ?>
            <?php if (get_theme_mod('sykpe') != '') : ?><li class="icon-sykpe"><a href="<?php echo get_theme_mod('sykpe');?>" target="_blank">&#xf17e;</a></li><?php endif; ?>
            <?php if (get_theme_mod('shopping_cart') != '') : ?><li class="icon-shopping_cart"><a href="<?php echo get_theme_mod('shopping_cart');?>" target="_blank">&#xf07a;</a></li><?php endif; ?>
            <?php if (get_theme_mod('push_pin') != '') : ?><li class="icon-push_pin"><a href="<?php echo get_theme_mod('push_pin');?>" target="_blank">&#xf08d;</a></li><?php endif; ?>
            <?php if (get_theme_mod('phone_cell') != '') : ?><li class="icon-phone_cell"><a href="<?php echo get_theme_mod('phone_cell');?>" target="_blank">&#xf10b;</a></li><?php endif; ?>
            <?php if (get_theme_mod('phone_old') != '') : ?><li class="icon-phone_old"><a href="<?php echo get_theme_mod('phone_old');?>" target="_blank">&#xf095;</a></li><?php endif; ?>
            <?php if (get_theme_mod('email') != '') : ?><li class="icon-email"><a href="<?php echo get_theme_mod('email');?>" target="_blank">&#xf003;</a></li><?php endif; ?>
            <?php if (get_theme_mod('comments') != '') : ?><li class="icon-comments"><a href="<?php echo get_theme_mod('comments');?>" target="_blank">&#xf0e6;</a></li><?php endif; ?>
            <?php if (get_theme_mod('link') != '') : ?><li class="icon-link"><a href="<?php echo get_theme_mod('link');?>" target="_blank">&#xf0c1;</a></li><?php endif; ?>
            <?php if (get_theme_mod('tags') != '') : ?><li class="icon-tags"><a href="<?php echo get_theme_mod('tags');?>" target="_blank">&#xf02c;</a></li><?php endif; ?>
            <?php if (get_theme_mod('magnifying_glass') != '') : ?><li class="icon-magnifying_glass"><a href="<?php echo get_theme_mod('magnifying_glass');?>" target="_blank">&#xf002;</a></li><?php endif; ?>
            <?php if (get_theme_mod('paper_airplane') != '') : ?><li class="icon-paper_airplane"><a href="<?php echo get_theme_mod('paper_airplane');?>" target="_blank">&#xf1d9;</a></li><?php endif; ?>
            <?php if (get_theme_mod('pencil') != '') : ?><li class="icon-pencil"><a href="<?php echo get_theme_mod('pencil');?>" target="_blank">&#xf040;</a></li><?php endif; ?>
            <?php if (get_theme_mod('world') != '') : ?><li class="icon-world"><a href="<?php echo get_theme_mod('world');?>" target="_blank">&#xf0ac;</a></li><?php endif; ?>
            <?php if (get_theme_mod('paper_clip') != '') : ?><li class="icon-paper_clip"><a href="<?php echo get_theme_mod('paper_clip');?>" target="_blank">&#xf0c6;</a></li><?php endif; ?>
            <?php if (get_theme_mod('recycle') != '') : ?><li class="icon-recycle"><a href="<?php echo get_theme_mod('recycle');?>" target="_blank">&#xf1b8;</a></li><?php endif; ?>
            <?php if (get_theme_mod('copyright') != '') : ?><li class="icon-copyright"><a href="<?php echo get_theme_mod('copyright');?>" target="_blank">&#xf1f9;</a></li><?php endif; ?>
            <?php if (get_theme_mod('gallery') != '') : ?><li class="icon-gallery"><a href="<?php echo get_theme_mod('gallery');?>" target="_blank">&#xf03e;</a></li><?php endif; ?>
            <?php if (get_theme_mod('wordpress') != '') : ?><li class="icon-wordpress"><a href="<?php echo get_theme_mod('wordpress');?>" target="_blank">&#xf19a;</a></li><?php endif; ?>
            <?php if (get_theme_mod('rss') != '') : ?><li class="icon-rss"><a href="<?php echo get_theme_mod('rss');?>" target="_blank">&#xf09e;</a></li><?php endif; ?>
        </ul></li>
    <?php endif; ?>

    <li id="menu-search">
        <form role="search" method="get" id="menusearchform" class="menusearchform" action="<?php echo home_url(); ?>/">
        <input name="s" id="s" type="text" placeholder="Search" >
        <input id="search-submit-menu" class="fa" value="&#xf002;" type="submit">
        </form>
    </li>
    
	<?php if ( has_nav_menu( 'touch_menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'touch_menu', 'depth' => 3 ) ); else : ?>
	<?php wp_list_pages( 'title_li=&depth=3' ); ?>
	<?php endif; ?>
    
    <?php if (!dynamic_sidebar('Touch Menu Widgets')) : ?><?php endif; ?>

    <li class="credits">Good Old Fashioned Hand Written Website by <a href="http://schwarttzy.com/web-design/" target="_blank">Eric J. Schwarz</a></li>
</ul>  
        
        
<main>
    
    <div class="spacing"></div>
    
    <div class="content">
        
        <div class="header">
            <a href="<?php echo home_url(); ?>/"><h1><?php bloginfo('name'); ?></h1><h2><?php bloginfo('description');?></h2></a>
        </div>

        <ul class="header-menu">
            <?php if ( has_nav_menu( 'content_menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'content_menu', 'depth' => 2 ) ); else : ?>
            <?php wp_list_pages( 'title_li=&depth=2' ); ?>
            <?php endif; ?>
        </ul>