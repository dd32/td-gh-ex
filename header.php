<?php
/*
 * The header for displaying logo, menu, header-image, header-widgets and search bar.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> >
<div id="container">

	<div id="header-first">
		<div class="logo"> 
			<?php if ( get_theme_mod( 'myknowledgebase_logo' ) ) : ?> 
				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
				<img src='<?php echo esc_url( get_theme_mod( 'myknowledgebase_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a> 
			<?php else : ?> 
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<h5><?php bloginfo('description'); ?></h5> 
			<?php endif; ?>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?> 
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
		<?php endif; ?>
	</div>

	<?php if ( is_front_page() ) {?> 
	<?php if ( get_header_image() ) {?> 
	<div id="header-second">
		<div class="image-homepage"> 
			<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
		</div>

		<?php if ( is_active_sidebar( 'homepage' ) ) {?> 
		<div class="sidebar-homepage"> 
			<?php dynamic_sidebar( 'homepage' ); ?>
		</div>
		<?php } ?>
	</div>
	<?php } ?> 
	<?php } ?>

	<div id="header-third"> 
		<h4 class="search-title"><?php _e( 'Search for posts...', 'myknowledgebase' ); ?></h4>
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
			<input type="search" class="search-field" placeholder="<?php _e( 'Search for posts...', 'myknowledgebase' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php _e( 'Search for posts...', 'myknowledgebase' ) ?>" /> 
			<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
			<input type="hidden" name="post_type" value="post" />
		</form>
	</div>