<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php

if ( function_exists('wp_body_open') ) {
	wp_body_open();
}

?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alhena-lite' ); ?></a>

<div id="wrapper">

    <header class="header" >
    
        <div class="container" >
        
            <div class="row">
            
                <div class="col-md-2" >
                
                    <div id="logo">
                            
                        <?php 
                                            
                            if ( alhenalite_setting('wip_custom_logo') ):
                            
							    echo '<a href="'.esc_url(home_url('/')).'" title="'.esc_attr(get_bloginfo('name')).'">';
                                echo "<img src='".esc_url(alhenalite_setting('wip_custom_logo'))."' alt='logo'>"; 
                                echo '</a>';
                            
							else: 
                            
							    echo '<a href="'.esc_url(home_url('/')).'" class="logo" title="'.esc_attr(get_bloginfo('name')).'">';
							    echo esc_attr(get_bloginfo('name'));
                                echo '</a>';
                            
							endif; 
                                
                        ?>
    
                    </div>
                    
                </div>
                
				<?php 
						
					if ( alhenalite_is_woocommerce_active() && ( !alhenalite_setting('wip_woocommerce_header_cart') || alhenalite_setting('wip_woocommerce_header_cart') == "on" ) ) :
							
						$menu_class="col-md-9";
							
						echo '<div class="col-md-1 right">';
		
							alhenalite_header_cart();
							
						echo '</div>';
							
					else:
	
						$menu_class="col-md-10";

					endif;

				?>

				<div class="<?php echo $menu_class; ?>">
                    
                    <nav id="mainmenu">
                        
						<?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
                    
                    </nav> 
                                   
                </div>
                
            </div>
            
        </div>
        
    </header>