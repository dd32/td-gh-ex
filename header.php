<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package ascent
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo of_get_option('favicon'); ?>"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

<?php /* Render Theme Option style */ ?>
<style type="text/css">
    <?php if(of_get_option('body_text_color')): ?>
	body {
	    color: <?php echo of_get_option('body_text_color'); ?>;;
	}
    <?php endif; ?>
    
    <?php if(of_get_option('body_link_color')): ?>
	body a {
	    color: <?php echo of_get_option('body_link_color'); ?>;;
	}
    <?php endif; ?>
     
    <?php if(of_get_option('footer_top_border_color')): ?>
	#colophon {
	    border-color: <?php echo of_get_option('footer_top_border_color'); ?>;;
	}
    <?php endif; ?>
    
    <?php if(of_get_option('footer_background_color')): ?>
	#colophon {
	    background-color: <?php echo of_get_option('footer_background_color'); ?>;;
	}
    <?php endif; ?>
    <?php if(of_get_option('footer_background_bottom_color')): ?>
	#footer-info {
	    background-color: <?php echo of_get_option('footer_background_bottom_color'); ?>;;
	}
    <?php endif; ?>
</style>

</head>


<body <?php body_class(); ?>>
  <?php do_action( 'before' ); ?>
<header id="masthead" class="site-header" role="banner">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mail-info">
			<?php if(of_get_option('phone_number')): ?>
			    <span class="phone-info"><i class="fa fa-phone"></i> <?php echo of_get_option('phone_number'); ?></span>
			<?php endif; ?>
			<?php if(of_get_option('email_id')): ?>
			    <span><i class="fa fa-envelope"></i> <a href="<?php echo of_get_option('email_id'); ?>" target="_blank"><?php echo of_get_option('email_id'); ?></a></span>
			<?php endif; ?>
                    </div>
                </div><!-- .col-sm-6-->
                <div class="col-sm-6">
                    <div class="header-social-icon-wrap">
                        <ul class="social-icons">
			    <?php
				$socialmedia_navs= ascent_socialmedia_navs();
				foreach($socialmedia_navs as $socialmedia_url => $socialmedia_icon) {
				    if (of_get_option($socialmedia_url)) {
					echo '<li class="social-icon"><a target="_blank" href="' . of_get_option($socialmedia_url) . '"><i class="'.$socialmedia_icon.'"></i></a></li>';
				    }
				}
			    ?>
                        </ul>
                    </div><!--.header-social-icon-wrap-->
                </div><!-- .col-sm-6-->
            </div>
        </div>
     </div>
    <div class="header-bottom">
        <div class="header-bottom-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div id="logo">
                            <div class="site-header-inner col-sm-12">
                                <div class="site-branding">
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				    <?php if(of_get_option('logo')): ?>
					<img src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>">
				    <?php else: ?>
					<?php bloginfo( 'name' ); ?>
				    <?php endif; ?>
				    </a></h1>
				    <h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div><!--.col-sm-3-->
                  
                    <div class="col-sm-9">
                        <div class="header-search pull-right">
                            <div id="header-search-button"><i class="fa fa-search"></i></div>
                        </div>
                        <div class="site-navigation pull-right">
			    <nav class="main-menu">
				<?php
				wp_nav_menu(array(
				    'theme_location' => 'main-menu',
				    'container' => false,
				    'menu_class' => 'header-nav clearfix'
				));
				?>
			    </nav>
			    <div id="responsive-menu-container"></div>
                        </div><!-- .site-navigation -->
                    </div><!--.col-sm-9-->
                </div><!--.row-->
            </div><!-- .container -->
        </div><!--.header-bottom-inner-->
    </div><!--.header-bottom-->
  <?php include_once 'header-searchform.php' ?>
</header><!-- #masthead -->

<?php include_once 'header-banner.php' ?>
  
<div class="main-content">  
    <div class="container">
        <div id="content" class="main-content-inner">
	    