<?php
/**
 *  The template for displaying Header.
 *
 *  @package accountant
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta http-equiv="<?php echo get_template_directory_uri();?>/content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="cf">
			<div class="wide-header">
				<div class="wrapper cf">
					<div class="header-left cf">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
						</h1><!--/.site-title-->
					</div><!--/div .header-left .cf-->
					<div class="header-contact">
    					<?php
    						if ( get_theme_mod( 'lawyeria_lite_header_title','Contact us now' ) ) {
    							echo get_theme_mod( 'lawyeria_lite_header_title','Contact us now' );
    						}
    					?>
    					<br />
    					<span>
    						<?php
    							if ( get_theme_mod( 'lawyeria_lite_header_subtitle','+1-888-846-1732' )) { ?>
                                    <a href="tel: <?php echo get_theme_mod( 'lawyeria_lite_header_subtitle','+1-888-846-1732' ); ?>" title="<?php echo get_theme_mod( 'lawyeria_lite_header_subtitle','+1-888-846-1732' ); ?>"><?php echo get_theme_mod( 'lawyeria_lite_header_subtitle','+1-888-846-1732' ); ?></a>
    							<?php }
    						?>
    					</span><!--/span-->
					</div><!--/.header-contact-->
				</div><!--/div .wrapper-->
			</div><!--/div .wide-header-->
			<div class="wrapper cf">
			    <nav>
    				<div class="openresponsivemenu">
    					<?php _e('Open Menu','lawyeria-lite'); ?>
    				</div><!--/div .openresponsivemenu-->
    				<div class="container-menu cf">
        				<?php
        					wp_nav_menu(
        					    array(
        						        'theme_location' => 'header-menu',
        							)
        						);
        					?>
    				</div><!--/div .container-menu .cf-->
    			</nav><!--/nav .navigation-->
		    </div>
			<div class="wrapper">
			<?php 
					$has_header = get_header_image(); 
					if( $has_header ) :
					?>
						<img src="<?php header_image(); ?>" alt="" class="lawyeria-lite-header-image" />
				<?php endif; ?>
			</div>