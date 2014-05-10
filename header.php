<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<a href="#wrapper" class="keyboard-shortcut"><?php _e('Skip to content', 'cherish' );?></a>

<a href="#" id="mobile-menu" title="<?php esc_attr_e( 'Show and hide menu', 'cherish' ); ?>"></a>
<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'nav-menu' ) ); ?>
<!-- End mobile menu-->

<div id="menu-wrap" role="navigation">
	<?php 
	wp_nav_menu( array( 'theme_location' => 'header', 'container' => 'div', 'container_id' => 'header-menu', ) ); 
	if ( is_home() || is_front_page() ) {?>
		<span class="fa-angle-down fa" title="<?php esc_attr_e( 'Skip to content', 'cherish' ); ?>"></span>
	<?php
	}
	?>
</div>

<?php if ( is_home() || is_front_page() ) {?>
	<div id="header" role="banner">
	<?php if (display_header_text() ) {	?>
		<h1 class="site-title" data-0="opacity:1;" data-200="opacity:0.0;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php if (get_option('blogdescription')<> ''){	?>	
			<h2 class="site-description" data-0="opacity:1;" data-200="opacity:0.0;"><?php bloginfo( 'description' ); ?></h2>
		<?php
			}
		if( get_theme_mod( 'cherish_hide_action' ) == '') {
		?>
			<div id="action">
			<?php 
			if( get_theme_mod( 'cherish_action_text' ) <> '') {
				if( get_theme_mod( 'cherish_action_link' ) <> '') {
					echo '<a href="' . esc_url( get_theme_mod( 'cherish_action_link' ) ) .'">';
				}
				echo get_theme_mod( 'cherish_action_text' );
				if( get_theme_mod( 'cherish_action_link' ) <> '') {
					echo '</a>';
				}
			}else{			
				_e("This is your call to action area. You can change it's appearance and text in the customizer.", 'cherish');
			}
			?>
			</div>
		<?php
		}
	}
	?>
	</div>
<?php 
}
?>
<div id="wrapper" role="main">