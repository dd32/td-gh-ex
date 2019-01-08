<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php get_sidebar(); ?>

<div id="body-wrapper">

    <div id="header-wrapper">
    
        <header id="header">
        
            <div class="container">
            
                <div class="row">
                
                    <div class="col-md-12">
                    
                        <div id="logo">
                        
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name')) ?>">
            
                                <?php 
                                                
                                    if ( lookilite_setting('lookilite_custom_logo') ):
                                   
                                        echo "<img src='".esc_url(lookilite_setting('lookilite_custom_logo'))."' alt='logo'>"; 
                                   
                                    else: 

                                        echo "<span>".get_bloginfo('name')."</span>";
                                    
                                    endif; 
                                    
                                ?>
                                        
                            </a>
                        
                        </div>
                        
                        <div class="navigation"><i class="fa fa-bars"></i> </div>
                      
                        <div class="clear"></div>
                    
                    </div>
                    
                </div>
                
            </div>
            
        </header>
    
    </div>

	<div id="wrapper">