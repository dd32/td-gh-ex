

	<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'nav', 'container_id' => 'footermenu', 'fallback_cb' => 'false' )); ?>

	<div id="footer">

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php dynamic_sidebar( 'footer-1' ); ?>
	<?php endif; ?>
	</div>
	


		<div id="credits">
		Powered by <a href="http://wordpress.org/">Wordpress</a>.
		Redesign Theme by <a href="http://toth-illustration.com">Robert Toth</a>
		</div>

	

</div>


<?php wp_footer(); ?> 

</body>
</html>