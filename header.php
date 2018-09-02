<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atlas-concern
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

                       
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>     
    <body <?php body_class(); ?>> 
              <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atlas-concern' ); ?></a>
        <?php get_template_part('inc/top','bar'); ?>
        <header> 
            <nav class="navbar navbar-default navbar-sticky bootsnav"> 
                <div class="container">                 
                    <div class="navbar-header"> 
 
						<div class="site-branding" >
		              	  <?php
			             the_custom_logo();
			              if ( is_front_page() && is_home() ) :
				           ?>
				            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				           <?php
			              else :
				          ?>
				         <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			        	<?php
		            	endif;
			            $atlas_concern_description = get_bloginfo( 'description', 'display' );
			           if ( $atlas_concern_description || is_customize_preview() ) :
				         ?>
			           	<p class="site-description"><?php echo esc_html($atlas_concern_description); /* WPCS: xss ok. */ ?></p>
			             <?php endif; ?>
		              </div><!-- .site-branding -->	
					
						 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> 
                            <i class="fa fa-bars"></i> 
                        </button>   
                    </div>                     
                
                    <div class="collapse navbar-collapse" id="navbar-menu"> 
                        <?php wp_nav_menu( array(
                               'theme_location' => 'primary',
                                'menu_class' => 'nav navbar-nav navbar-right',
                                'container' => '',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker()
                        ) ); ?> 
                    </div>             
                </div>                 
            </nav>               
        </header>        