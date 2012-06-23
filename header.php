<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @D5 Creation
 * @Modified on Twenty_Eleven
 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php wp_title() ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

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
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
		
			<div class="bannerad1">
			<?php 
			$d5smartiaoption = get_option('d5smartia_theme_options');
			if ( $d5smartiaoption['d5smartia_bannerad1'] != null ): 
			echo $d5smartiaoption['d5smartia_bannerad1'];
			
			else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/bannerad.jpg" alt="Your 180 X 150 Ad Code"/>
			<?php endif; ?>
             </div>
             
            <div class="bannerad2">
			<?php 
			if ( $d5smartiaoption['d5smartia_bannerad2'] != null ) :
			echo $d5smartiaoption['d5smartia_bannerad2'];
			else: ?>
			<img src="<?php echo get_template_directory_uri(); ?>/images/bannerad.jpg" alt="Your 180 X 150 Ad Code"/>
			<?php endif; ?>
            </div>
            <hgroup>
                      
                   
        <?php if( get_header_image() == '' ):  ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		<?php else: ?>
        
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
        <?php endif; ?>    
        <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>        	
            <?php echo get_custom_header(); ?>
            </hgroup> 
					
			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'd5smartia' ); ?></h3>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'd5smartia' ); ?>"><?php _e( 'Skip to primary content', 'd5smartia' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'd5smartia' ); ?>"><?php _e( 'Skip to secondary content', 'd5smartia' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                
                <?php
				// Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) :
			?>
				<div class="only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">
				<?php get_search_form(); ?>
				</div>
			<?php
				else :
			?>
				<?php get_search_form(); ?>
			<?php endif; ?>
			</nav><!-- #access -->
					
	</header><!-- #branding -->


	<div id="main">