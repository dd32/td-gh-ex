<?php
// ==================================================================
// Add admin menu link
// ==================================================================
function my_admin_menu() {
	add_theme_page( 'Getting Started', 'Getting Started', 'manage_options', 'adelle_getting_started.php', 'adelle_getting_started', '', 100  );
}
add_action( 'admin_menu', 'my_admin_menu' );

// ==================================================================
// Stylesheets
// ==================================================================
function adelle_getting_started_style() {
	wp_register_style( 'adelle-getting-started-style', get_template_directory_uri() . '/includes/style.css', false, '1.0.0' );
	wp_enqueue_style( 'adelle-getting-started-style' );
}
add_action( 'admin_enqueue_scripts', 'adelle_getting_started_style' );

function adelle_getting_started() { ?>

<div class="wrap text-center">

	<h1>Welcome to Bluchic!</h1>

	<p>Check out the <a href="https://help.bluchic.com/category/adelle/">theme documentation</a> here to setup your theme now!</p>

	<p>Sweet deal <strong>15% off</strong> when you upgrade to the premium theme.</p>

	<section class="split-columns">
		<article class="col1">
			<a href="<?php echo esc_url( 'http://www.bluchic.com/shop/wordpress-themes/jacqueline-theme/' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/images/screenshot-jacqueline.jpg" alt="Jacqueline Theme" /></a>
		</article><!-- .col1 -->
		<article class="col2">
			<a href="<?php echo esc_url( 'http://www.bluchic.com/shop/wordpress-themes/isabelle-theme/' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/images/screenshot-isabelle.jpg" alt="Isabelle Theme" /></a>
		</article><!-- .col2 -->
		<article class="col3">
			<a href="<?php echo esc_url( 'http://www.bluchic.com/shop/wordpress-themes/samantha-theme/' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/includes/images/screenshot-samantha.jpg" alt="Samantha Theme" /></a>
		</article><!-- .col3 -->
	</section><!-- .split-columns -->

	<p>As a bonus for subscribing, save <strong>15% off</strong> your next Bluchic purchase with coupon code <strong>BCFORYOU</strong> at checkout.</p>
	<p><a href="http://www.bluchic.com/shop/" style="display:block; width:100%; padding:20px 0; background:#000; color:#fff; text-decoration:none;" target="_blank">REDEEM NOW</a></p>

</div>

<?php }
