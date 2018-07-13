<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage akhada-fitness-gym
 * @since 1.0
 * @version 0.3
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'akhada-fitness-gym' ) ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'akhada-fitness-gym' ); ?></a>

<div class="top-header">
	<div class="container">	
		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>	
		<div class="top">
			<?php if( get_theme_mod( 'akhada_fitness_gym_mail','' ) != '') { ?>	
		        <i class="fas fa-envelope"></i><span class="col-org"><?php echo esc_html( get_theme_mod('akhada_fitness_gym_mail',__('support@example.com','akhada-fitness-gym')) ); ?></span>
		    <?php } ?>
	   		<?php if( get_theme_mod( 'akhada_fitness_gym_location','' ) != '') { ?>		
		        <i class="fas fa-map-marker-alt"></i><span class="col-org"><?php echo esc_html( get_theme_mod('akhada_fitness_gym_location',__('9870 st. vicent place, glasgaw ,D.C 45 Fr 45','akhada-fitness-gym')) ); ?></span>
		    <?php } ?>
		</div>
	</div>
</div>
<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','akhada-fitness-gym'); ?></a></div>

<div id="header">
	<div class="container">
		<div class="main-top">
			<div class="row padd0">
				<div class="col-md-4">
					<div class="logo">
				        <?php if( has_custom_logo() ){ akhada_fitness_gym_the_custom_logo();
				           }else{ ?>
				          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				          <?php $description = get_bloginfo( 'description', 'display' );
				          if ( $description || is_customize_preview() ) : ?> 
				            <p class="site-description"><?php echo esc_html($description); ?></p>       
				        <?php endif; }?>
				    </div>
				</div>
				<div class="nav col-md-8">
					<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>	
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>