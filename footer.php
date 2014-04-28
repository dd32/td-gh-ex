</div>
<div id="footer">

<?php if ( is_home() || is_front_page() || is_404() ) {?>
	<div class="widget_wrap">
	<?php 
	if (is_active_sidebar(1)){
		echo '<ul class="footer_widget_1">';
			dynamic_sidebar(1);
		echo '</ul>';
	}
	if (is_active_sidebar(2)){
			echo '<ul class="footer_widget_2">';
			dynamic_sidebar(2);
		echo '</ul>';
	}
	if (is_active_sidebar(3)){
			echo '<ul class="footer_widget_3">';
			dynamic_sidebar(3);
		echo '</ul>';
	}
	?>
	</div>
<?php
}
?>
	<div class="footer-credit">
	<?php
	if( get_theme_mod( 'cherish_logo' ) ) {
		if( get_theme_mod( 'cherish_logo_link' ) <> '') {
			echo '<a href="' . get_theme_mod( 'cherish_logo_link' ) . '">';
		}
		echo '<img src="' . get_theme_mod( 'cherish_logo' ) . '" alt="Logo" class="footer-logo">';
		if( get_theme_mod( 'cherish_logo_link' ) <> '') {
			echo '</a>';
		}
	}
	if( get_theme_mod( 'cherish_footer_title' ) <> '') {
	?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	<?php
	}
	?>
	<a href="http://wordpress.org/"><?php printf( __( 'Proudly powered by %s', 'cherish' ), 'WordPress' ); ?></a>
	<span class="sep"> | </span>
	<a href="http://gratistema.se/cherish/"><?php printf( __( 'Theme: %1$s', 'cherish' ), 'Cherish'); ?></a>
	</div> <!--End Footer Credit -->
	
<a href="#wrapper" class="fa-angle-up fa" title="<?php esc_attr_e( 'Back to the top', 'cherish' ); ?>"></a>
</div> <!--End Footer -->
<?php wp_footer(); ?>
</body>
</html>