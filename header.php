<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package aaron
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<?php
	/* If the highlights are visible on the frontpage, skip to the highlights and not to #content.*/
	if( get_theme_mod( 'aaron_hide_highlight' ) =="" && is_front_page() ) {
	?>
		<a class="skip-link screen-reader-text" href="#highlight"><?php _e( 'Skip to content', 'aaron' ); ?></a>
	<?php }else{ ?>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'aaron' ); ?></a>
	<?php
	}

	 if ( has_nav_menu( 'header' )  ) {
	?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><span class="screen-reader-text"><?php _e( 'Main Menu', 'aaron' ); ?></span></button>
			<?php wp_nav_menu( array( 'theme_location' => 'header', 'fallback_cb' => false, 'depth'=>2 ) );  ?>
		</nav><!-- #site-navigation -->
	<?php
	}
	
	 if ( is_home() || is_front_page() ) {?>
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">	
				<?php 
				aaron_the_site_logo(); ?>
				<?php if (display_header_text() ) {	?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php }else{
					/*If there is no visible site title, make sure there is still a h1 for screen reader*/
					?>
						<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
					<?php } ?>

				<?php if( get_theme_mod( 'aaron_hide_action' ) == '') {?>
							<div id="action">
								<?php 
								if( get_theme_mod( 'aaron_action_text' ) <> '') {
									if( get_theme_mod( 'aaron_action_link' ) <> '') {
										echo '<a href="' . esc_url( get_theme_mod( 'aaron_action_link' ) ) .'">';
									}
									echo esc_html( get_theme_mod( 'aaron_action_text' ) );
									if( get_theme_mod( 'aaron_action_link' ) <> '') {
										echo '</a>';
									}
								}else{			
									echo '<a href="' . esc_url( home_url( '/wp-admin/customize.php' ) ) . '">' . __("Click here to setup your Call to Action", 'aaron') . '</a>';
								}
								?>
						</div>
					<?php
					 } 
					
					aaron_highlights();
					?>

					<?php if (display_header_text() && get_bloginfo('description') <> '') {
					?>
						<div class="site-description"><?php bloginfo( 'description' ); ?></div>
					<?php
					}
					?>
					</div><!-- .site-branding -->
			</header><!-- #masthead -->
	<?php } ?>
	
	<div id="content" class="site-content">