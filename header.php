<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atlas_concern
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	

	<?php wp_head(); ?>
	
</head>   
<body <?php body_class(); ?>>

    	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atlas-concern' ); ?></a>

       <?php get_template_part('inc/top','line'); ?> 

       <?php get_template_part('inc/logo','area'); ?> 
	   
        <header id="home"> 
        
            <nav class="navbar navbar-default small-pad navbar-sticky bootsnav"> 
               
				
                <div class="container-fluid"> 
                    <div class="attr-nav"> 
                        <ul> 
                            <li class="quote-btn">
                                <a href="<?php echo esc_html( get_theme_mod( 'btn_section_url' ) ); ?>"><?php echo esc_html( get_theme_mod( 'btn_section_text' ) ); ?></a>
                            </li>                             
                        </ul>                         
                        </div>                     
                  
                    <?php get_template_part('inc/mobile','menu'); ?> 

                  
                    <div class="collapse navbar-collapse" id="navbar-menu"> 
                        <?php wp_nav_menu( array(
                                'menu' => 'Primary',
                                'menu_class' => 'nav navbar-nav navbar-left',
                                'container' => '',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker()
                        ) ); ?> 
                    </div>
                 
                </div>                 
            </nav>                     
        </header>     