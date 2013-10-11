<?php
/*
 * The footer for displaying secondary menu and site-info.
 */
?>

<div id="footer">
	
	<?php if ( has_nav_menu( 'foot-menu' ) ) : ?> 
		<?php wp_nav_menu( array( 'theme_location' => 'foot-menu', 'container_class' => 'nav-foot' ) ); ?>
	<?php endif; ?>

	<div class="site-info">
		<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'guido' ) ); ?>" title="<?php esc_attr_e( 'WordPress Blog Platform', 'guido' ); ?>"><?php printf( __( 'Proudly powered by %s', 'guido' ), 'WordPress' ); ?></a>
	</div>

</div>
</div><!-- #container -->

<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.
    */
    wp_footer();
?>
</body>
</html>