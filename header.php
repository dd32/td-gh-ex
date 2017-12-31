<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class('custombody'); ?>>

<div id="wrapper">
    
    <header id="header">
    
        <div class="container">
        
            <div class="row">
                
                <div class="span3" >
                   
                    <div id="logo">
                            
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>">
                                
                            <?php 
                                            
                                if ( novalite_setting('novalite_custom_logo') ):
								
                                    echo '<img src="' . esc_url(novalite_setting('novalite_custom_logo', 'url')) . '" alt="' . esc_attr__('Logo', 'novalite') . '">'; 
                                
								else: 
                                    
									bloginfo('name');
                                
								endif; 
                                
                            ?>
                                    
                        </a>
                                
                    </div>
                    
                </div>
    
                <div class="span9" >
                  
                    <nav id="mainmenu">
                 
                        <?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
                 
                    </nav> 
                                   
                </div>
                
            </div>
            
        </div>
    
    </header>