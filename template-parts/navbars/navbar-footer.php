<?php
/**
 * Main navigation bar.
 *
 * @package BA Tours
 */

?>
<nav id="footer-site-navigation" class="navbar navbar-expand-lg navbar-dark" role="navigation">

	<div class="container">
	
		<!-- Copyright -->
		<div id="copyrights" class="copyrights"><?php echo wp_kses_post(apply_filters( 'bathemos_option', '', 'copyrights' )); ?></div>

		<!-- Toggler/collapsible button -->
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse-footer" aria-controls="footer-menu" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<!-- Main menu -->
		<?php
		$walker = apply_filters( 'bathemos_nav_menu_walker', '' );
		$fallback = apply_filters( 'bathemos_nav_menu_fallback', '' );
		wp_nav_menu( array(
			'theme_location' => 'footer_menu',
			'menu_class' => 'navbar-nav',
			'menu_id' => 'footer_nav_menu',
			'container' => 'div',
			'container_class' => 'collapse navbar-collapse navbar-collapse-footer justify-content-end',
			'container_id' => 'footer_nav_menu_container',
			'walker' => new $walker,
			'fallback_cb' => $fallback,
		) );
		?>
	</div>
	
</nav><!-- #footer-site-navigation -->