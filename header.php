<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package atlas-concern
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>> 
    <head>          
        <meta charset="<?php bloginfo( 'charset' ); ?>">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
	   <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atlas-concern' ); ?></a>
        <div id="canvas">
            <div id="box_wrapper">
               <?php get_template_part('inc/header','topline'); ?>
                <header class="page_header thin_header header_white affix-header table_section toggle_menu_left columns_padding_0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9">
                                <!-- main nav start -->
                                <nav class="mainmenu_wrapper">	
								<?php
		                         wp_nav_menu( array(
			                     'menu'    => 'primary',
			                     'depth'             => 2,
			                     'container'         => 'div',
			                     'menu_class'        => 'mainmenu nav sf-menu',
			                     'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			                     'walker'            => new WP_Bootstrap_Navwalker(),
		                          ) );
		                          ?>
                                </nav>
                                <!-- eof main nav -->
                            </div>
                         <?php get_template_part('inc/header','button'); ?>
                        </div>
                    </div>
                </header>
			<?php if ( get_header_image() ) : ?>
				<?php

					$custom_header_sizes = apply_filters( 'atlas_concern_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div>
			<?php endif; ?>				