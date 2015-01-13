<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WP FanZone
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wp-fanzone' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
    	<div id="top-bar" class="top-bar">
        	<div class="container">            	
            	<div class="row">
                	<div class="col-md-7">
							<p style="display:inline-block; color:#fff; vertical-align: top; padding-top:10px; float:left; margin-right:10px;"><?php echo date_i18n( get_option( 'date_format' )); ?></p>
                            <?php if (has_nav_menu('top-menu')) { ?>
                            <div id="top-nav" role="navigation" class="top-nav clearfix">
                            	 <button class="menu-toggle navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                    <span class="sr-only"><?php _e( 'Toggle navigation', 'wp-fanzone' ); ?></span>            
                                    <span class="icon-bar"></span>            
                                    <span class="icon-bar"></span>            
                                    <span class="icon-bar"></span>
                                  </button>                                                       	
							</div>
                             <div class="collapse navbar-collapse" id="navbar-collapse">                    
									 <?php wp_nav_menu( array( 'theme_location' => 'top-menu','depth' => 1, 'container'	=> false ) ); ?>   
                             </div><!-- /.navbar-collapse --> 
                             <?php } ?>
					</div>
                    <div class="col-md-5 fan-sociel-media">
						<?php if ( get_theme_mod( 'wp_fanzone_email' ) ) : ?>
                        	<a href="<?php _e('mailto:', 'wp-fanzone'); echo sanitize_email( get_theme_mod( 'wp_fanzone_email' ) ); ?>" class="btn btn-default btn-xs" title="Email"><span class="fa fa-envelope"></span>
                            </a>
                        <?php endif; ?>             	
                        <?php if ( get_theme_mod( 'wp_fanzone_rss' ) ) : ?>
                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_rss' ) ); ?>" class="btn btn-default btn-xs" title="RSS"><span class="fa fa-rss"></span></a>
                        <?php endif; ?>
						<?php if ( get_theme_mod( 'wp_fanzone_vimeo' ) ) : ?>
                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_vimeo' ) ); ?>" class="btn btn-default btn-xs" title="Vimeo"><span class="fa fa-vimeo-square"></span></a>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'wp_fanzone_flickr' ) ) : ?>
                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_flickr' ) ); ?>" class="btn btn-default btn-xs" title="Flickr"><span class="fa fa-flickr"></span></a>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'wp_fanzone_instagram' ) ) : ?>
                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_instagram' ) ); ?>" class="btn btn-default btn-xs" title="Instagram"><span class="fa fa-instagram"></span></a>
                        <?php endif; ?>
						<?php if ( get_theme_mod( 'wp_fanzone_tumblr' ) ) : ?>
                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_tumblr' ) ); ?>" class="btn btn-default btn-xs" title="Tumblr"><span class="fa fa-tumblr"></span></a>
                        <?php endif; ?>
						<?php if ( get_theme_mod( 'wp_fanzone_youtube' ) ) : ?>
                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_youtube' ) ); ?>" class="btn btn-default btn-xs" title="Youtube"><span class="fa fa-youtube"></span></a>
                        <?php endif; ?>
						<?php if ( get_theme_mod( 'wp_fanzone_linkedin' ) ) : ?>
                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_linkedin' ) ); ?>" class="btn btn-default btn-xs" title="Linkedin"><span class="fa fa-linkedin"></span></a>
                        <?php endif; ?>
                    	<?php if ( get_theme_mod( 'wp_fanzone_pinterest' ) ) : ?>
                        	<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_pinterest' ) ); ?>" class="btn btn-default btn-xs" title="Pinterest"><span class="fa fa-pinterest"></span></a>
                        <?php endif; ?>
                    	<?php if ( get_theme_mod( 'wp_fanzone_google' ) ) : ?>
            				<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_google' ) ); ?>" class="btn btn-default btn-xs" title="Google Plus"><span class="fa fa-google-plus"></span></a>
            			<?php endif; ?>
                    	<?php if ( get_theme_mod( 'wp_fanzone_twitter' ) ) : ?>
            				<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_twitter' ) ); ?>" class="btn btn-default btn-xs" title="Twitter"><span class="fa fa-twitter"></span></a>
            			<?php endif; ?>
                    	<?php if ( get_theme_mod( 'wp_fanzone_facebook' ) ) : ?>
            				<a href="<?php echo esc_url( get_theme_mod( 'wp_fanzone_facebook' ) ); ?>" class="btn btn-default btn-xs" title="Facebook"><span class="fa fa-facebook"></span></a>
            			<?php endif; ?>              

                    </div> <!--end fan-sociel-media-->
                </div>
        	</div>
        </div>
		<div class="site-branding">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-12">
						<?php if ( get_theme_mod( 'wp_fanzone_logo' ) ) : ?>
                        <div id="site-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <img src="<?php echo esc_url( get_theme_mod( 'wp_fanzone_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
                            </a>
                        </div>
                        <?php else : ?>
                        	<div id="site-logo">
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name', 'wp-fanzone' ); ?></a></h1>
                                <h2 class="site-description"><?php bloginfo( 'description', 'wp-fanzone' ); ?></h2>
                            </div>
                        <?php endif; ?>
                        <?php dynamic_sidebar('top-right-widget'); ?>
                        <div class="clearfix"></div>
					</div>
                </div>
            </div>	
		</div><!-- .site-branding -->

		<div class="nav_container">
            <div class="container">
                <nav id="site-navigation" class="main-navigation container-fluid" role="navigation">
                  <button class="menu-toggle navbar-toggle" aria-controls="menu" aria-expanded="false">
                  	<span class="sr-only"><?php _e( 'Toggle navigation', 'wp-fanzone' ); ?></span>            
                    <span class="icon-bar"></span>            
                    <span class="icon-bar"></span>            
                    <span class="icon-bar"></span>
                  </button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'wp_fanzone_menu' ) ); ?>

                </nav>

            </div>

        </div> <!--end nav_container-->
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
