<?php 
/**
 * @package Astoned
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"?>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
        <?php // echo get_template_directory_uri(); ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        
        <?php wp_head(); ?>
        
    </head>
    <body <?php body_class(); ?>>
       
        <div class='main-header'>
            <div id='headimg'>
                <h1 class="site-title">
                    <a href="<?php // echo get_option(); ?>">
                        <?php bloginfo('name'); ?></a>
                </h1>
                <div class='site-description'>
                    <?php bloginfo('description');?>
                </div>
            
            </div>
            
        </div>
        
       
   
       <nav id="menu-links">
<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav>
           
	  
    </body>
</html>
