<?php


if ( ! function_exists( 'aemi_sidebar' ) )
{
	function aemi_sidebar()
	{
		/*
		Later Support
		if ( is_active_sidebar( 'sidebar-widget-area' ) ) { ?>
		<aside id="sidebar-area" class="widget-area">
		<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
		</aside>
		<?php }
		*/
	}
}


if ( ! function_exists( 'aemi_scrollup' ) )
{
	function aemi_scrollup()
	{ ?>
		<div id="scroll-up">
			&#8593
		</div>
	<?php }
}


if ( ! function_exists( 'aemi_footer_widgets' ) )
{
	function aemi_footer_widgets()
	{
		if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>

			<div id="footer-widgets" class="widget-area">

				<?php dynamic_sidebar( 'footer-widget-area' ); ?>

			</div>

		<?php }
	}
}


if ( ! function_exists( 'aemi_footer_site_description' ) )
{
	function aemi_footer_site_description()
	{
		if ( get_bloginfo( 'description' ) ) { ?>

			<h4 id="site-description" class="site-description">

				&#60; <?php echo esc_html( get_bloginfo( 'description' ) ); ?> &#62;

			</h4>

		<?php }
	}
}


if ( ! function_exists( 'aemi_footer_menu' ) )
{
	function aemi_footer_menu()
	{
		if ( has_nav_menu( 'footer-menu' ) ) { ?>

			<nav id="footer-menu">

				<?php wp_nav_menu( array(
					'theme_location' => 'footer-menu',
					'depth' => '1'
				) ); ?>

			</nav>

		<?php }
	}
}


if ( ! function_exists( 'aemi_footer_credit' ) )
{
	function aemi_footer_credit()
	{ ?>

		<div id="copyright">

			<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'aemi' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>

		</div>

		<?php
	}
}


if ( ! function_exists( 'aemi_footer_wp_footer' ) )
{
	function aemi_footer_wp_footer()
	{
		if ( wp_footer() ) { ?>

			<div id="wp-footer">

				<?php wp_footer(); ?>

			</div>

		<?php }
	}
}
