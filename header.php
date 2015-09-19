<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<!--[if IE 8]>
    <script src="<?php echo get_template_directory_uri(); ?>/inc/scripts/html5.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/inc/scripts/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->

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
                        
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name') ?>">
            
                                <?php 
                                                
                                    if ( lookilite_setting('lookilite_custom_logo') ):
                                   
                                        echo "<img src='".esc_url(lookilite_setting('lookilite_custom_logo'))."' alt='logo'>"; 
                                   
                                    else: 
                                    
                                        echo "<img src='".esc_url(get_template_directory_uri()."/inc/images/logo/logo.png")."' alt='logo'>"; 
                                    
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