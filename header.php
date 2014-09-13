<!DOCTYPE html >
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <title><?php is_front_page() ? bloginfo('name') : wp_title(''); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <script src="<?php echo get_template_directory_uri();?>/js/modernizr.custom.js"></script>
    
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri();?>/js/html5shiv.js"></script>
      <script src="<?php echo get_template_directory_uri();?>/js/respond.js"></script>
    <![endif]-->
    
    <?php echo get_theme_mod( 'google_analytics' ); ?>
</head>

<body <?php body_class(array('page-' . str_replace(' ','-', strtolower( wp_title('',false,'')) ) )); ?> data-spy="scroll" data-target="#nav-spy" data-offset="200">

<div class="page-wrapper" data-scroll-speed="<?php echo !empty($themeora_options['themeora_scroll_speed']) ? $themeora_options['themeora_scroll_speed'] : '500' ?>">
    <!-- BEGIN NAV -->
    <nav class="primary-navigation navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <?php 
                //logo image
                if( get_theme_mod( 'img-upload-logo' )) { // CUSTOMIZER LOGO ?>  
                <a href="<?php echo home_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>" rel="<?php _e( 'home', THEMEORA_THEME_NAME ) ?>"><img style="width:<?php echo get_theme_mod('img-upload-logo-width'); ?>px;" src="<?php echo get_theme_mod( 'img-upload-logo' )?>" class="logo-uploaded" alt="<?php echo bloginfo( 'name' ); ?>" /></a>
                <?php }

                //typography logo
                else { ?>  
                    <a href="<?php echo home_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>" rel="<?php _e( 'home', THEMEORA_THEME_NAME ) ?>"><div class="logo-text" style="font-size: <?php echo get_theme_mod( 'type_logo_size' ); ?>px; line-height: <?php echo get_theme_mod( 'type_logo_lineheight' )?>px"><?php bloginfo( 'name' ); ?></div></a>
                <?php } ?>
                
                <?php 
                    $description = get_bloginfo ( 'description' );
                    if ( strlen( $description ) > 0 ) : ?>
                    <div class="site-description subtext">
                        <?php echo get_bloginfo ( 'description' ); ?>
                    </div>
                <?php endif; ?>
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only"><?php _e('Toggle navigation', THEMEORA_THEME_NAME); ?></span>
                    <span class="fa fa-bars"></span>
                </button>
            </div><!-- end navbar-header -->

            <div class="navbar-collapse collapse" id="nav-spy">
                <div class="nav-wrap">
                    <!-- primary nav -->
                    <?php 
                        if ( has_nav_menu('primary_menu') ) {
                            wp_nav_menu(array(
                            'container' =>false,
                            'theme_location' => 'primary_menu',
                            'menu_class' => 'nav navbar-nav',
                            'echo' => true,
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'walker' => new Themeora_Walker_Nav_Menu()
                            )); 
                        }
                        else {
                            echo 'Create & assign a menu: Dashboard > Appearance > Menus' ;
                        }
                    ?>
                </div><!--end nav-wrap -->
            </div><!-- end .navbar-collapse #nav-spy -->
        </div>
    </nav>
    
    <?php if ( get_header_image() ) : ?>
        <header id="primary-header">
            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
        </header>
	<?php endif; ?>
    
    <!-- END NAV -->