<?php
/**
 * The header for our theme.
 * @package BBird Under
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    
      <div id="top-section" class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">          
                <nav class="tab-bar">
		<section class="left-small">
			<a href="#" class="left-off-canvas-toggle menu-icon" aria-expanded="false" style=""><span></span></a>
		</section>
		
	</nav>
            
              <aside class="left-off-canvas-menu" aria-hidden="true">
    <?php 
    
  
	    wp_nav_menu(array(
	        'container' => false,                           // Remove nav container
	        'container_class' => '',                        // Class of container
	        'menu' => '',                                   // Menu name
	        'menu_class' => 'off-canvas-list',              // Adding custom nav class
	        'theme_location' => 'mobile-off-canvas',        // Where it's located in the theme
	        'before' => '',                                 // Before each link <a>
	        'after' => '',                                  // After each link </a>
	        'link_before' => '',                            // Before each link text
	        'link_after' => '',                             // After each link text
	        'depth' => 5,                                   // Limit the depth of the nav
	        'fallback_cb' => false,                         // Fallback function (see below)
	        'walker' => new bbird_under_offcanvas_walker(),
	    ));
	
    
    ?>
</aside>
  
   
<div class="top-bar-container contain-to-grid show-for-medium-up">
    <nav class="top-bar" data-topbar role="navigation">
             <section class="top-bar-section" id="fd-animate" >
            <?php     
            wp_nav_menu(array(
	        'container' => false,                           // Remove nav container
	        'container_class' => '',                        // Class of container
	        'menu' => '',                                   // Menu name
	        'menu_class' => 'top-bar-menu right',           // Adding custom nav class
	        'theme_location' => 'primary',                // Where it's located in the theme
	        'before' => '',                                 // Before each link <a>
	        'after' => '',                                  // After each link </a>
	        'link_before' => '',                            // Before each link text
	        'link_after' => '',                             // After each link text
	        'depth' => 5,                                   // Limit the depth of the nav
	        'fallback_cb' => '',                         // Fallback function (see below)
	        'walker' => new bbird_under_top_bar_walker(),
	    )); 
            ?>
        </section>
        
    
                  
    </nav>
</div>
                  
    
<div id="page" class="container">    
   	<div id="content" class="row">         
             <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
    <div class='site-logo' style="background-image:<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>">
        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
    </div>
<?php else : ?>
   <!-- no image set -->
<?php endif; ?>