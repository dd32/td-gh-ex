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
	<link rel="profile" href="http://gmpg.org/xfn/11">         
<?php wp_head(); ?>
    </head>     
    <body <?php body_class(); ?>> 
              <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atlas-concern' ); ?></a>
        <?php get_template_part('inc/top','bar'); ?>
        <header> 
            <nav class="navbar navbar-default navbar-sticky bootsnav"> 
                <div class="container">                 
                    <div class="navbar-header"> 
 
						<div class="site-branding" >
		              	  <?php
			             the_custom_logo();
			              if ( is_front_page() && is_home() ) :
				           ?>
				            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				           <?php
			              else :
				          ?>
				         <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			        	<?php
		            	endif;
			            $atlas_concern_description = get_bloginfo( 'description', 'display' );
			           if ( $atlas_concern_description || is_customize_preview() ) :
				         ?>
			           	<p class="site-description"><?php echo esc_html($atlas_concern_description); /* WPCS: xss ok. */ ?></p>
			             <?php endif; ?>
		              </div><!-- .site-branding -->	
					
						 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> 
                            <i class="fa fa-bars"></i> 
                        </button>   
                    </div>                     
                
                    <div class="collapse navbar-collapse pull-right" id="navbar-menu"> 
		<?php
		wp_nav_menu( array(
			'theme_location'    => 'primary',
			'depth'             => 2,
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse',
			'container_id'      => 'bs-example-navbar-collapse-1',
			'menu_class'        => 'nav navbar-nav',
			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			'walker'            => new WP_Bootstrap_Navwalker(),
		) );
		?>
                    </div>             
                </div>                 
            </nav>   


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


        </header>        