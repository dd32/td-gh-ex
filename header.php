<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section
*
* @package beam
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>> 

		<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>

			<header id="masthead" class="site-header">
				<div class="centeralign-header">
                    <div class="site-branding">

                    <?php 
                    $opt_logo = get_theme_mod( 'opt_logo', '' );
                        if( $opt_logo != '' ) { 
                    ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo $opt_logo; ?>" class="logo" alt="<?php echo get_bloginfo( 'name' );?>" /></a>
                    <?php } else { ?>

                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						
						<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
						
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						
						<?php 
							endif; ?>
						
                    <?php } ?>
                    </div><!-- #site-branding -->

                    <?php 
                    $opt_menu_visibility = get_theme_mod( 'opt_menu_visibility', 'option-1' );
                    if ($opt_menu_visibility == 'option-1') {
                    ?>
					
					<button class="menu-toggle button"><?php _e('Responsive Menu', 'beam' ); ?></button>
					
					<div class="mobile-menu">
					<?php $args = array(
								'theme_location' => 'primary',
								'container'      => '',
								'items_wrap'     => '<ul class="nav-menu">%3$s</ul>',
							); ?>
						<nav id="site-navigation" class="main-navigation clearfix">
							<?php wp_nav_menu($args);//extract the content from apperance-> nav menu ?>
						</nav><!-- #access -->
					</div>	

				
				<?php	
				}
				?>

				</div><!-- centeralign-header -->
			</header><!-- #header-->