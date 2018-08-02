<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Greenr
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">      
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function greenr_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
    }
    add_action( 'wp_head', 'greenr_render_title' );           
endif;
?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>     
 
<body <?php body_class(); ?>>  
<div id="page" class="hfeed site <?php echo greenr_site_style_class(); ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'greenr' ); ?></a>
    <?php do_action('greenr_before_header'); ?> 
	<header id="masthead" class="site-header header-wrap header-image <?php echo greenr_site_style_header_class(); ?>" role="banner">
		<?php
	    if ( get_theme_mod ('header_overlay',false ) ) { 
		    echo '<div class="overlay overlay-header"></div>';     
	    } ?>
		<div id="header-top">
			<div class="container">
				<div class="eight columns top-contact">
					<?php if( get_theme_mod( 'contact' ) ) : ?>    
						<p><?php echo esc_html( get_theme_mod( 'contact' ) ); ?></p>
					<?php else: echo '&nbsp;' ?>
					<?php endif; ?>
				</div> 
				<div class="eight columns">
					<ul class="social top-right">	
					<?php $social_twitter = get_theme_mod( 'social-twitter' );
					if( !empty ($social_twitter) &&  ( get_theme_mod( 'new-tab' ) ) ) : ?>     
						<li><a href="<?php echo esc_attr($social_twitter); ?>" class="fa fa-twitter" target="_blank"></a></li>
					<?php elseif( !empty($social_twitter )): ?>
						<li><a href="<?php echo esc_attr($social_twitter); ?>" class="fa fa-twitter"></a></li>
					<?php endif; ?>

					<?php $social_facebook = get_theme_mod( 'social-facebook' );
					if( !empty ($social_facebook) &&  ( get_theme_mod( 'new-tab' ) ) ) : ?>     
						<li><a href="<?php echo esc_attr($social_facebook); ?>" class="fa fa-facebook" target="_blank"></a></li>
					<?php elseif( !empty($social_facebook )): ?>
						<li><a href="<?php echo esc_attr($social_facebook); ?>" class="fa fa-facebook"></a></li>
					<?php endif; ?>

					<?php $social_instagram = get_theme_mod( 'social-instagram' );
					if( !empty ($social_instagram) &&  ( get_theme_mod( 'new-tab' ) ) ) : ?>     
						<li><a href="<?php echo esc_attr($social_instagram); ?>" class="fa fa-instagram" target="_blank"></a></li>
					<?php elseif( !empty($social_instagram )): ?>
						<li><a href="<?php echo esc_attr($social_instagram); ?>" class="fa fa-instagram"></a></li>
					<?php endif; ?>

					<?php $social_youtube = get_theme_mod( 'social-youtube' );
					if( !empty ($social_youtube) &&  ( get_theme_mod( 'new-tab' ) ) ) : ?>     
						<li><a href="<?php echo esc_attr($social_youtube); ?>" class="fa fa-youtube" target="_blank"></a></li>
					<?php elseif( !empty($social_youtube )): ?>
						<li><a href="<?php echo esc_attr($social_youtube); ?>" class="fa fa-youtube"></a></li>
					<?php endif; ?>

					<?php $social_google = get_theme_mod( 'social-google' );
					if( !empty ($social_google) &&  ( get_theme_mod( 'new-tab' ) ) ) : ?>     
						<li><a href="<?php echo esc_attr($social_google); ?>" class="fa fa-google-plus" target="_blank"></a></li>
					<?php elseif( !empty($social_google )): ?>
						<li><a href="<?php echo esc_attr($social_google); ?>" class="fa fa-google-plus"></a></li>
					<?php endif; ?>

					<?php $social_linkedin = get_theme_mod( 'social-linkedin' );
					if( !empty ($social_linkedin) &&  ( get_theme_mod( 'new-tab' ) ) ) : ?>
						<li><a href="<?php echo esc_attr( $social_linkedin ); ?>" class="fa fa-linkedin" target="_blank"></a></li>
					<?php elseif( !empty($social_linkedin)) : ?>
						<li><a href="<?php echo esc_attr( $social_linkedin ); ?>" class="fa fa-linkedin"></a></li>
					<?php endif; ?>
					
					<?php $social_dribbble = get_theme_mod( 'social-dribbble' );
					 if( !empty($social_dribbble) &&  ( get_theme_mod( 'new-tab' ) ) ) : ?>
						<li><a href="<?php echo esc_attr($social_dribbble); ?>" class="fa fa-dribbble" target="_blank"></a></li>
					<?php elseif( !empty($social_dribbble)) : ?>
						<li><a href="<?php echo esc_attr($social_dribbble); ?>" class="fa fa-dribbble"></a></li>
					<?php endif; ?>
					
					<?php $social_rss = get_theme_mod( 'social-rss' );
					 if( !empty($social_rss) &&  ( get_theme_mod( 'new-tab' ) ) ) : ?>
						<li><a href="<?php echo esc_attr($social_rss); ?>" class="fa fa-rss" target="_blank"></a></li>
					<?php elseif( !empty($social_rss)) : ?>
						<li><a href="<?php echo esc_attr($social_rss); ?>" class="fa fa-rss"></a></li>
					<?php endif; ?>
					</ul>
					<?php if( is_active_sidebar('header-right') ) : ?>
						<div class="top-right social">
						    <?php dynamic_sidebar( 'header-right' ); ?>	
						</div>	
					<?php endif; ?>
				</div> 
			</div>
		</div>

		<div id="header-bottom">
			<div class="container">
				<div class="logo site-branding six columns">  
					<?php 
						$logo_title = get_theme_mod( 'site-title' );    
						$logo = get_theme_mod( 'custom-logo', '' );
						$tagline = get_theme_mod( 'site-description',true );
						if( $logo_title && function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();     
					        }elseif( $logo != '' && $logo_title ) { ?>
							   <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"></a></h1>
					<?php	}else { ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						    <?php } ?>
						<?php if( $tagline ) : ?>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif;  
					?>

						
				</div>

				<div class="ten columns">
					<div class="top-right">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php echo apply_filters('greenr_responsive_menu_title',__('Primary Menu','greenr') ); ?></button>
							<?php wp_nav_menu( array(
								'theme_location' => 'primary', 
							 	'link_before' => '<span>',
							 	'link_after' => '</span>'
						 	) ); ?>
						</nav><!-- #site-navigation -->
					</div>
					<?php do_action('greenr_after_primary_nav'); ?>
				</div>
				
			</div>
		</div>
	</header><!-- #masthead -->

	<?php if ( function_exists( 'is_woocommerce' ) || function_exists( 'is_cart' ) || function_exists( 'is_checkout' )) :
	 if ( is_woocommerce() || is_cart() || is_checkout() ) { ?>
	 	<div class="breadcrumb-wrap">
		   <div class="container">
				<div class="sixteen columns breadcrumb">	
					<header class="entry-header">
						<h1 class="entry-title"><?php woocommerce_page_title(); ?></h1>
					</header><!-- .entry-header -->
					<?php if ( get_theme_mod('breadcrumb' ) && function_exists( 'greenr_breadcrumbs' ) ) : ?>
						<div id="breadcrumb" role="navigation">
							<?php woocommerce_breadcrumb(); ?>
						</div>
					<?php endif; ?> 
				</div>
	        </div>
	    </div>
	<?php } 
	endif; ?>

