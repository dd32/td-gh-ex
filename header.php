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
<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content" alt="<?php esc_html_e( 'Skip to content', 'akhada-fitness-gym' ); ?>"><?php esc_html_e( 'Skip to content', 'akhada-fitness-gym' ); ?></a>

	<div class="top-header">
		<div class="container">	
			<?php get_template_part( 'template-parts/header/header', 'image' ); ?>	
			<div class="top">
				<?php if( get_theme_mod( 'akhada_fitness_gym_mail','' ) != '') { ?>	
			        <span class="col-org"><i class="fas fa-envelope"></i><?php echo esc_html( get_theme_mod('akhada_fitness_gym_mail','') ); ?></span>
			    <?php } ?>
		   		<?php if( get_theme_mod( 'akhada_fitness_gym_location','' ) != '') { ?>		
			        <span class="col-org"><i class="fas fa-map-marker-alt"></i><?php echo esc_html( get_theme_mod('akhada_fitness_gym_location','') ); ?></span>
			    <?php } ?>
			</div>
		</div>
	</div>

	<header id="header">
		<div class="container">
			<div class="main-top">
				<div class="row padd0">
					<div class="col-lg-3 col-md-5 col-9">
						<div class="logo">
					        <?php if ( has_custom_logo() ) : ?>
						        <div class="site-logo"><?php the_custom_logo(); ?></div>
						    <?php endif; ?>
				            <?php if (get_theme_mod('akhada_fitness_gym_show_site_title',true)) {?>
						        <?php $blog_info = get_bloginfo( 'name' ); ?>
						        <?php if ( ! empty( $blog_info ) ) : ?>
						            <?php if ( is_front_page() && is_home() ) : ?>
							            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						        	<?php else : ?>
					            		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						            <?php endif; ?>
						        <?php endif; ?>
						    <?php }?>
				        	<?php if (get_theme_mod('akhada_fitness_gym_show_tagline',true)) {?>
						        <?php
						        $description = get_bloginfo( 'description', 'display' );
						        if ( $description || is_customize_preview() ) :
						          ?>
							        <p class="site-description">
							            <?php echo esc_html($description); ?>
							        </p>
						        <?php endif; ?>
						    <?php }?>
					    </div>
					</div>
					<div class="col-lg-9 col-md-7 col-3">
						<div class="toggle-menu responsive-menu">
				            <button onclick="akhada_fitness_gym_open()" role="tab"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','akhada-fitness-gym'); ?></span></button>
				        </div>
						<div id="sidelong-menu" class="nav sidenav">
			                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'akhada-fitness-gym' ); ?>">
			                    <?php 
			                    wp_nav_menu( array( 
			                      'theme_location' => 'primary',
			                      'container_class' => 'main-menu-navigation clearfix' ,
			                      'menu_class' => 'clearfix',
			                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			                      'fallback_cb' => 'wp_page_menu',
			                    ) ); 
			                    ?>
			                    <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="akhada_fitness_gym_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','akhada-fitness-gym'); ?></span></a>
			                </nav>
			            </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>

	<div class="site-content-contain">
		<div id="content" class="site-content">