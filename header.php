<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package WordPress
 * @subpackage Simple Catch
 * @since Simple Catch 1.0
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php	
	/**	 * Print the <title> tag based on what is being viewed.	 */	
	global $page, $paged;	wp_title( '|', true, 'right' );	
	// Add the blog name.	
	bloginfo( 'name' );	
	
	// Add the blog description for the home/front page.	
	$site_description = get_bloginfo( 'description', 'display' );	
	if ( $site_description && ( is_home() || is_front_page() ) )		
		echo " | $site_description"; ?>
</title>
<?php 
	//Displays the fav icon
	if( function_exists( 'ci_fav_icon' ) ) :
		ci_fav_icon();
	endif; 
 ?>
<!--[if lt IE 7]>
<script src="<?php echo get_template_directory_uri(); ?>/js/pngfix.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri(); ?>/css/ie6.css" />
<![endif]-->
 
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
	if( function_exists( 'ci_header_scripts' ) ):
		ci_header_scripts();
	endif;
?>
</head>
<body <?php body_class(); ?>>
<div id="header">
	<div class="top-bg"></div>
  		<div class="layout-978">
        	<div class="logo-wrap">
            	<h1 id="site-title">
                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						<?php
							//Displays the header logo 	
							if( function_exists( 'ci_header_logo' ) ) :
								ci_header_logo();
							endif; 
				
							echo esc_attr( get_bloginfo( 'name', 'display' ) ); 
						?>
                    </a>
                </h1>
            	<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
        	</div><!-- .logo-wrap -->
        	<div class="social-search">
            		<?php
						// ci_header_social_networks displays social links given from theme option in header 
						if ( function_exists( 'ci_header_social_networks' ) ) :
							ci_header_social_networks(); 
						endif;
						// get search form
						get_search_form();
					?>      
        	</div><!-- .social-search -->
    		<div class="row-end"></div>
            <div id="mainmenu">
			<?php 
				// Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.
				wp_nav_menu( array( 
					'container' => false,
					'depth' => 0,  
					'echo' => true,
					'theme_location' => 'primary'  
				) );    
			?> 
            </div><!-- #mainmenu-->  
            <div class="row-end"></div>   
        <?php    	
		// Display slider in home page and breadcrumb in other pages 
		if ( function_exists( 'ci_display_breadcrumb_or_slider' ) ) :
			ci_display_breadcrumb_or_slider(); 
		endif;
		?> 
	</div><!-- .layout-978 -->
</div><!-- #header -->