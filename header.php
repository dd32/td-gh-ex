<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

<?php

if ( function_exists('wp_body_open') ) {
	wp_body_open();
}

?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'diarjo-lite' ); ?></a>

<header id="header">

    <div class="container">
    
        <div class="row">
        
        	<div class="col-md-12">
            
            	<div id="logo">
                
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>">
                            
                        <?php 
                                        
                            if ( (diarjolite_setting('diarjolite_custom_logo')) ):
                               
							    echo "<img src='".esc_url(diarjolite_setting('diarjolite_custom_logo'))."' alt='logo'>"; 
                            
							else: 
                              
							    bloginfo('name');
                          
						    endif; 
                            
                        ?>
                                
                    </a>
                
                </div>
				
                <nav id="mainmenu" >
               
                	<?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
                
                </nav> 
				
                <div class="clear"></div>
            
            </div>
            
        </div>
        
    </div>
    
</header>