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

            
        <div class="top-bar-area bg-dark text-light"> 
            <div class="container"> 
                <div class="row"> 
                    <div class="topbar-info"> 
                        <div class="top-address col-md-8 col-sm-9"> 
                            <ul> 
                                <li>
                                    <?php echo wp_kses_post( get_theme_mod( 'topline_section_phone', '<i class="fa fa-phone"></i>011 334886' )); ?>
                                </li>                                 
                                <li>
                                    <?php echo wp_kses_post( get_theme_mod( 'topline_section_mail', '<i class="fa fa-envelope-o"></i>info@yoursite.com' )); ?>
                                </li>                                 
                                <li>
                                    <?php echo wp_kses_post( get_theme_mod( 'topline_section_location', '<i class="fa fa-map-marker"></i>Street , Country , Zip Code' )); ?>
                                </li>                                 
                            </ul>                             
                        </div>                         
                        <div class="topbar-social col-md-4 col-sm-3"> 
                            <ul class="text-right"> 
                                <li> 
                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_face_url', __( '#', 'atlas-concern' ) )); ?>" target="_blank"><i class="fa fa-facebook"></i></a> 
                                </li>                                 
                                <li> 
                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_twit_url', __( '#', 'atlas-concern' ) )); ?>" target="_blank"><i class="fa fa-twitter"></i></a> 
                                </li>                                 
                                <li> 
                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_instag_url', __( '#', 'atlas-concern' ) )); ?>" target="_blank"><i class="fa fa-instagram"></i></a> 
                                </li>                                 
                                <li> 
                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_linke_url', __( '#', 'atlas-concern' ) )); ?>" target="_blank"><i class="fa fa-linkedin"></i></a> 
                                </li>                                 
                                <li> 
                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_yout_url', __( '#', 'atlas-concern' ) )); ?>" target="_blank"><i class="fa fa-youtube"></i></a> 
                                </li>
                                <li> 
                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_goo_url', __( '#', 'atlas-concern' ) )); ?>" target="_blank"><i class="fa fa-google"></i></a> 
                                </li>                                 
                            </ul>                             
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </div>         
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