<?php


function bellini_start_load_admin_scripts() {

	// Load styles only on our page
	global $pagenow;
	if( 'themes.php' != $pagenow )
		return;

	wp_register_style( 'bellini-getting-started', get_template_directory_uri() . '/inc/dashboard/bellini-info-dashboard.css', false, '1.0.0' );
	wp_enqueue_style( 'bellini-getting-started' );
}

add_action( 'admin_enqueue_scripts', 'bellini_start_load_admin_scripts' );


/* Hook a menu under Appearance */
function bellini_getting_started_menu() {
	add_theme_page(
		esc_attr__( 'Bellini: Get Started', 'bellini' ),
		esc_attr__( 'Bellini: Get Started', 'bellini' ),
		'manage_options',
		'bellini-getting-started',
		'bellini_getting_started'
	);
}

add_action( 'admin_menu', 'bellini_getting_started_menu' );



/**
 * Theme Info Page
 */
function bellini_getting_started() {

	// Theme info
	$theme = wp_get_theme( 'bellini' );
?>

		<div class="wrap getting-started">
		<div class="getting-started__header">
		<div class="row">
			<div class="col-md-5 intro">
				<h2><?php esc_html_e( 'Welcome to Bellini ', 'bellini' ); ?></h2>
				<p>Version: <?php echo $theme['Version'];?></p>
				<span class="intro__version">
				Congratulations! You are about to use the most easy to use and felxible WordPress theme built for launching an online store.
				</span>

				<div class="dashboard__block">
					<h3>Getting Started</h3>
					<ol>
						<li>Start <a href="<?php echo esc_url( admin_url('customize.php') ); ?>">Customizing</a> your website.</li>
						<li>Install <a href="<?php echo esc_url('https://wordpress.org/plugins/homepage-control/'); ?>">Homepage Control</a> to re-order Frontpage sections.</li>
						<li>Upgrade to Pro to unlock all features.</li>
					</ol>
				</div>

			</div>

			<div class="col-md-7">
			<div class="dashboard__block block--pro">
				<img src="<?php echo get_template_directory_uri() . '/images/why-bellini-pro.jpg'; ?>" alt="<?php esc_html_e( 'Why Upgrade To Bellini Pro', 'bellini' ); ?>" /></a>
			</div>
			</div>

			<div class="col-md-12 bellini__upgrade-info-box">
				<h2>Upgrade to get the most out of Bellini</h2>
				<p>Live customization is the beginning of what Bellini can do to help you design your website. Upgrade now.</p>
				<a class="theme__cta--download--pro" href="<?php echo esc_url('https://atlantisthemes.com'); ?>">Upgrade Now To Bellini Pro for $45</a>
				<a class="theme__cta--demo" href="<?php echo esc_url('https://atlantisthemes.com'); ?>">Live Demo</a>
			</div>

		</div>
		</div>

		<div class="dashboard__blocks">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">


					</div>

					<div class="col-md-12">
					<div class="dashboard__block">
						<h3>Get Support</h3>
						<ul>
							<li>Bellini <a href="<?php echo esc_url('https://atlantisthemes.com/documentation/'); ?>">Documentation</a></li>
							<li>WordPress.org <a href="<?php echo esc_url('https://wordpress.org/support/theme/bellini'); ?>">Support Forum</a></li>
							<li><a href="<?php echo esc_url('https://atlantisthemes.com/contact/'); ?>">Email Support</a> (Pro Users)</li>
						</ul>
					</div>
					</div>
				</div>
			</div>

		</div>
		</div>

		</div><!-- .getting-started -->

	<?php
}