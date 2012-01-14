<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
	<?php
	global $page, $paged;	
	
	wp_title( '|', true, 'right' ); // only outputs if this page has a title
	bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'theme-adamsrazor' ), max( $paged, $page ) );
	?>	
</title>
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">					
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>	
				</<?php echo $heading_tag; ?>>
				<div id="site-description">
					<?php bloginfo( 'description' ); ?> - 
					<a class="skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'theme-adamsrazor' ); ?>"><?php _e( 'Skip to content', 'theme-adamsrazor' ); ?></a>
				</div>				
			</div>

			<div id="access" role="navigation">			  
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'depth' => 1 ) ); ?>
			</div>
		</div>
	</div>

	<div id="main">
