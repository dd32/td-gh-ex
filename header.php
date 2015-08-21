<?php
/**
 *	The template for displaying the Header.
 *
 *	@package WordPress
 *	@subpackage AccountantLaw
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header role="banner" class="cf">
			<div class="wide-header">
				<div class="wrapper cf">
					<div class="header-left cf">
						<div class="site-title">
							<a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
						</div><!--/.site-title-->
					</div><!--/div .header-left .cf-->
					<div class="header-contact">
    					<?php
						if ( get_theme_mod( 'lawyeria_lite_header_title', __( 'Contact us now', 'accountantlaw' ) ) ) {
							echo esc_attr( get_theme_mod( 'lawyeria_lite_header_title', __( 'Contact us now', 'accountantlaw' ) ) );
						}
    					?>
    					<br />
    					<span>
    						<?php if ( get_theme_mod( 'lawyeria_lite_header_subtitle', __( '+1-888-846-1732', 'accountantlaw' ) )) { ?>
                                <a href="tel: <?php echo esc_attr( get_theme_mod( 'lawyeria_lite_header_subtitle', __( '+1-888-846-1732', 'accountantlaw' ) ) ); ?>" title="<?php echo esc_attr( get_theme_mod( 'lawyeria_lite_header_subtitle', __( '+1-888-846-1732', 'accountantlaw' ) ) ); ?>"><?php echo esc_attr( get_theme_mod( 'lawyeria_lite_header_subtitle', __( '+1-888-846-1732', 'accountantlaw' ) ) ); ?></a>
							<?php } ?>
    					</span><!--/span-->
					</div><!--/.header-contact-->
				</div><!--/div .wrapper-->
			</div><!--/div .wide-header-->
			<div class="wrapper cf">
			    <nav role="navigation" aria-label="<?php _e( 'Header Menu', 'accountantlaw' ); ?>">
    				<div class="openresponsivemenu">
    					<?php _e( 'Open Menu', 'accountantlaw' ); ?>
    				</div><!--/div .openresponsivemenu-->
    				<div class="container-menu cf">
        				<?php
        				$wp_nav_menu_args = array(
        					'theme_location'	=> 'header-menu'
        				);
    					wp_nav_menu( $wp_nav_menu_args );
        				?>
    				</div><!--/div .container-menu .cf-->
    			</nav><!--/nav .navigation-->
		    </div>
			<div class="wrapper">
			<?php $has_header = get_header_image(); ?>
			<?php  if( $has_header ): ?>
				<img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>" class="lawyeria-lite-header-image" />
			<?php endif; ?>
			</div>