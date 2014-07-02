<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Aperture
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 id="sidr-toggle" class="menu-toggle" href="#sidr-left"><span class="genericon genericon-menu"></span></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'aperture' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' , 'depth' => '3' , 'container_class' => 'primary-menu-container' , 'menu_class' => 'menu primary-menu' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'secondary' , 'depth' => '3' , 'container_class' => 'secondary-menu-container' , 'menu_class' => 'menu secondary-menu' ) ); ?>
			
			<?php $social_links = get_theme_mod( 'aperture_social_links' );
				if ( false != $social_links ) $social_links = array_filter( $social_links );
				if ( ! empty( $social_links ) ) { ?>
					<div class="navbarsocial">
						<?php if ( isset( $social_links['rss'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['rss'] ); ?>" class="genericon genericon-feed" title="<?php esc_attr_e( 'RSS Feed', 'aperture' ); ?>" target="_blank" rel="alternate" type="application/rss+xml"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['email'] ) ) : ?>
							<a href="mailto:<?php echo antispambot( sanitize_email( $social_links['email'] ) ); ?>" class="genericon genericon-mail" title="<?php esc_attr_e( 'E-Mail', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['wordpress'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['wordpress'] ); ?>" class="genericon genericon-wordpress" title="<?php esc_attr_e( 'WordPress', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['github'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['github'] ); ?>" class="genericon genericon-github" title="<?php esc_attr_e( 'GitHub', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['dribbble'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['dribbble'] ); ?>" class="genericon genericon-dribbble" title="<?php esc_attr_e( 'Dribbble', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['stumbleupon'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['stumbleupon'] ); ?>" class="genericon genericon-stumbleupon" title="<?php esc_attr_e( 'StumbleUpon', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['reddit'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['reddit'] ); ?>" class="genericon genericon-reddit" title="<?php esc_attr_e( 'Reddit', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['digg'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['digg'] ); ?>" class="genericon genericon-digg" title="<?php esc_attr_e( 'Digg', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['youtube'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['youtube'] ); ?>" class="genericon genericon-youtube" title="<?php esc_attr_e( 'YouTube', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['vimeo'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['vimeo'] ); ?>" class="genericon genericon-vimeo" title="<?php esc_attr_e( 'Vimeo', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['flickr'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['flickr'] ); ?>" class="genericon genericon-flickr" title="<?php esc_attr_e( 'Flickr', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['instagram'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['instagram'] ); ?>" class="genericon genericon-instagram" title="<?php esc_attr_e( 'Instagram', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['pinterest'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['pinterest'] ); ?>" class="genericon genericon-pinterest" title="<?php esc_attr_e( 'Pinterest', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['tumblr'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['tumblr'] ); ?>" class="genericon genericon-tumblr" title="<?php esc_attr_e( 'Tumblr', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['linkedin'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['linkedin'] ); ?>" class="genericon genericon-linkedin" title="<?php esc_attr_e( 'LinkedIn', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['googleplus'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['googleplus'] ); ?>" class="genericon genericon-googleplus-alt" title="<?php esc_attr_e( 'Google+', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['twitter'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['twitter'] ); ?>" class="genericon genericon-twitter" title="<?php esc_attr_e( 'Twitter', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>

						<?php if ( isset( $social_links['facebook'] ) ) : ?>
							<a href="<?php echo esc_url( $social_links['facebook'] ); ?>" class="genericon genericon-facebook" title="<?php esc_attr_e( 'Facebook', 'aperture' ); ?>" target="_blank" rel="me"></a>
						<?php endif; ?>
					</div><!-- .navbarsocial -->
			<?php } ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
<?php if ( !is_page_template('page-slider.php') ) { ?>
	<div id="content" class="site-content">
<?php } ?>
