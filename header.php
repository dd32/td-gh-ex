<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package thebox
 * @since thebox 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600,400italic' rel='stylesheet' type='text/css'>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php	
	$color_primary = get_option('color_primary');
	$color_secondary = get_option('color_secondary');
?>

<style>

	.site-header .main-navigation,
	#content input#submit:hover,
	#content .entry-time,
	#content button:hover,
	#content input[type="button"]:hover,
	#content input[type="reset"]:hover,
	#content input[type="submit"]:hover {
    background-color: <?php echo $color_primary; ?>;
    }
    
    .site-header .main-navigation ul ul a:hover,
    .site-header .main-navigation ul ul a:focus,
    .site-header h1.site-title a:hover,
    #nav-below a,
    #content .entry-title a:hover,
    #content .entry-title a:focus,
    #content .entry-title a:active,
    #content .cat-links .icon-font,
    #content .tags-links .icon-font,
    #content .entry-content a,
    #content .entry-meta a,
    #content .comments-area a,
    #content input#submit,
    #content .page-title span,
    #content button,
	#content input[type="button"],
	#content input[type="reset"],
	#content input[type="submit"],
	#content #tertiary td a { 
    color: <?php echo $color_primary; ?>;
    }
   
    #content .edit-link a,
    #content input#submit,
    #content .more-link,
    #content button,
	#content input[type="button"],
	#content input[type="reset"],
	#content input[type="submit"] {
	border-color: <?php echo $color_primary; ?>;
    }
        
</style>


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="two-col">

	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header clearfix" role="banner">
		<div class="site-brand clearfix">
			<hgroup>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			</hgroup>
			
			<?php $options = get_option( 'thebox_theme_options' ); ?>
			
			<div class="social-media">
			
				<?php if ( $options['facebookurl'] != '' ) : ?>
					<a href="<?php echo $options['facebookurl']; ?>" class="facebook" alt="facebook"><span class="icon-facebook"></span> <?php // _e( 'Facebook', 'short-news' ); ?></a>
				<?php endif; ?>
				
				<?php if ( $options['twitterurl'] != '' ) : ?>
					<a href="<?php echo $options['twitterurl']; ?>" class="twitter" alt="twitter"><span class="icon-twitter"></span> <?php // _e( 'Twitter', 'short-news' ); ?></a>
				<?php endif; ?>

				<?php if ( $options['googleplusurl'] != '' ) : ?>
					<a href="<?php echo $options['googleplusurl']; ?>" class="googleplus" alt="google plus"><span class="icon-google-plus"></span> <?php // _e( 'Google +', 'short-news' ); ?></a>
				<?php endif; ?>
				
				<?php if ( $options['instagramurl'] != '' ) : ?>
					<a href="<?php echo $options['instagramurl']; ?>" class="instagram" alt="instagram"><span class="icon-instagram"></span> <?php // _e( 'Instagram', 'short-news' ); ?></a>
				<?php endif; ?>
				
				<?php if ( ! $options['hiderss'] ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" class="rss"><span class="icon-rss" alt="rss"></span> <?php // _e( 'RSS Feed', 'short-news' ); ?></a>
				<?php endif; ?>
				
			</div><!-- .social-media-->
			
		</div>	
		<nav role="navigation" class="site-navigation main-navigation clearfix">
			<h1 class="assistive-text"><?php // _e( 'Menu', 'thebox' ); ?></h1>
			<div class="assistive-text skip-link">
				<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'thebox' ); ?>">
					<?php _e( 'Skip to content', 'thebox' ); ?>
				</a>
			</div>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main clearfix">
		
		<?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) { ?>
				<a class="header-image" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
				</a>
		<?php } // if ( ! empty( $header_image ) ) ?>
		