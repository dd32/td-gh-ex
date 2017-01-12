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
			<div class="col-md-8 intro">
				<h2><?php esc_html_e( 'Bellini', 'bellini' ); ?></h2>
				<span class="intro__version"><?php echo $theme['Version'];?></span>
			</div>
			<div class="col-md-4 intro__review">
			<p>Enjoying Bellini? Why not <a href="<?php echo esc_url('https://wordpress.org/support/theme/bellini/reviews/#new-post'); ?>">leave a review</a> on WordPress.org? We'd really appreciate it!</p>
			</div>
		</div>
		</div>

		<div class="dashboard__blocks">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
					<div class="dashboard__block">
						<h3>To Do</h3>
						<ol>
							<li>Start <a href="<?php echo esc_url( admin_url('customize.php') ); ?>">Customizing</a> your website.</li>
							<li>Install <a href="<?php echo esc_url('https://wordpress.org/plugins/homepage-control/'); ?>">Homepage Control</a> to re-order Frontpage sections.</li>
							<li>Upgrade to Pro to unlock all features.</li>
						</ol>
					</div>
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
			<div class="col-md-6">
			<div class="dashboard__block block--pro">
			<img src="<?php echo get_template_directory_uri() . '/images/why-bellini-pro.jpg'; ?>" alt="<?php esc_html_e( 'Why Upgrade To Bellini Pro', 'bellini' ); ?>" /></a>
			<a class="theme__cta--download--pro" href="<?php echo esc_url('https://atlantisthemes.com'); ?>">Upgrade To Bellini Pro for $45</a>
			</div>
			</div>
		</div>
		</div>

		</div><!-- .getting-started -->
	<?php
}