<?php
/**
 * The header for our theme 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'aagaz-startup' ) ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'aagaz-startup' ); ?></a>
	<div id="page" class="site">
		<?php if( get_theme_mod('aagaz_startup_show_hide_topbar',true) != ''){ ?>
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-4 col-md-12">
							<div class="row">
								<div class="col-lg-3 col-md-3">
									<?php if( get_theme_mod( 'aagaz_startup_contact_number','' ) != '') { ?>
						                <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('aagaz_startup_contact_number','' )); ?></span>
						            <?php } ?>
								</div>
								<div class="col-lg-4 col-md-4">
						            <?php if( get_theme_mod( 'aagaz_startup_email_address','' ) != '') { ?>
						                <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('aagaz_startup_email_address','') ); ?></span>
						            <?php } ?>
						        </div>
								<div class="col-lg-5 col-md-5">
									<div class="social-icon">
										<?php if( get_theme_mod( 'aagaz_startup_facebook_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'aagaz_startup_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','aagaz-startup' );?></span></a>
										<?php } ?>
										<?php if( get_theme_mod( 'aagaz_startup_twitter_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'aagaz_startup_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','aagaz-startup' );?></span></a>
										<?php } ?>
										<?php if( get_theme_mod( 'aagaz_startup_linkedin_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'aagaz_startup_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin','aagaz-startup' );?></span></a>
										<?php } ?>
										<?php if( get_theme_mod( 'aagaz_startup_pinterest_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'aagaz_startup_pinterest_url','' ) ); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest','aagaz-startup' );?></span></a>
										<?php } ?>
										<?php if( get_theme_mod( 'aagaz_startup_insta_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'aagaz_startup_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','aagaz-startup' );?></span></a>
										<?php } ?>
										<?php if( get_theme_mod( 'aagaz_startup_youtube_url') != '') { ?>
										    <a href="<?php echo esc_url( get_theme_mod( 'aagaz_startup_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','aagaz-startup' );?></span></a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="logo">
								<?php if ( has_custom_logo() ) : ?>
					              <div class="site-logo"><?php the_custom_logo(); ?></div>
					              <?php else: ?>
					              <?php $blog_info = get_bloginfo( 'name' ); ?>
					              <?php if ( ! empty( $blog_info ) ) : ?>
					                <?php if ( is_front_page() && is_home() ) : ?>
					                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					                <?php else : ?>
					                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					                <?php endif; ?>
					              <?php endif; ?>
					              <?php
					              $description = get_bloginfo( 'description', 'display' );
					              if ( $description || is_customize_preview() ) :
					                ?>
					              <p class="site-description">
					                <?php echo esc_html($description); ?>
					              </p>
					            <?php endif; ?>
					            <?php endif; ?>
					        </div>
						</div>
						<div class="col-lg-9 col-md-8">
							<?php if ( has_nav_menu( 'top' ) ) : ?>
								<div class="navigation-top">
									<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	<div class="site-content-contain">
		<div id="content">