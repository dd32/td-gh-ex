<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<!--[if IE 8]>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/html5.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

<div id="wrapper">
	
    <div id="header-wrapper">
    
        <header id="header">
        
            <div class="container">
            
                <div class="row">
                
                    <div class="col-md-2">
            
                        <div id="logo">
                                        
                            <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name') ?>">
                                            
                                <?php 
                                                        
                                    if ( bazaarlite_setting('wip_custom_logo') ):
                                        
                                        echo "<img src='".bazaarlite_setting('wip_custom_logo')."' alt='logo'>"; 
                                   
                                    else: 
                                        
                                        bloginfo('name');
    
                                    endif; 

                                ?>
                                                
                            </a>
                                            
                        </div>
                        
                    </div>

					<?php 
						
						if ( bazaarlite_is_woocommerce_active() && bazaarlite_setting('wip_woocommerce_header_cart') == "on" ) :
							
							$menu_class="col-md-9";
							
							echo '<div class="col-md-1 right">';
		
								bazaarlite_header_cart();
							
							echo '</div>';
							
						else:
	
							$menu_class="col-md-10";

						endif;

					?>

                    <div class="<?php echo $menu_class; ?>">

                        <nav id="mainmenu" class="<?php echo bazaarlite_setting('wip_menu_layout'); ?>">
                            
                            <?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
                        
                        </nav>
                        	
                    </div>
                    
                </div>
                
            </div>  
            
        </header>
    
    </div>
    
    <?php do_action('bazaarlite_get_breadcrumb'); ?>