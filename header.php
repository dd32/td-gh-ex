<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package star
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php
if ( is_singular() && pings_open() ) {
	echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
}
wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'star' ); ?></a>
<?php
if ( has_nav_menu( 'header' ) ) {
?>
	<nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
	<span class="screen-reader-text"><?php esc_html_e( 'Main Menu', 'star' ); ?></span>
	</button>
	<?php wp_nav_menu( array( 'theme_location' => 'header', 'fallback_cb' => false, 'depth' => 2, 'menu_id' => 'primary-menu' ) );  ?>
	</nav><!-- #site-navigation -->
<?php
}

if ( is_home() || is_front_page() ) { ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-icon"></div>
		<?php
		the_custom_logo();
		if ( display_header_text() ) {
		?>
			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php
			if ( get_bloginfo( 'description' ) ) {
			?>
				<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			<?php
			}
		} else {
			/*If there is no visible site title, make sure there is still a h1 for screen reader*/
			?>
			<h1 class="screen-reader-text"><?php bloginfo( 'name' ); ?></h1>
		<?php
		}
		if ( ! get_theme_mod( 'star_hide_action' ) ) {
			if ( get_theme_mod( 'star_action_text' ) ) {
				if ( get_theme_mod( 'star_action_link' ) ) {
					echo '<div id="action"><a href="' . esc_url( get_theme_mod( 'star_action_link' ) ) . '">' . esc_html( get_theme_mod( 'star_action_text' ) ) . '</a></div>';
				} else {
					echo '<div id="action">' . esc_html( get_theme_mod( 'star_action_text' ) ) . '</div>';
				}
			} elseif ( current_user_can( 'edit_theme_options' ) ) {
				echo '<div id="action"><a href="' . wp_customize_url() . '">' . esc_html__( 'Click here to setup your Call to Action', 'star' ) . '</a></div>';
			}
		}
		?>
		</header><!-- #masthead -->
<?php } ?>
	
<div id="content" class="site-content">
