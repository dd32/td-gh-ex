<div id="footer">
	<?php wp_nav_menu( array( 'menu' => 'Footer Navigation', 'container' => 'div','container_id' => 'footer-navi', 'depth' => '1', 'theme_location' => 'footer-menu',  'fallback_cb' => '' ) ); ?>
	<p><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo ('name');?>"><?php bloginfo ('name');?></a> <?php _e('powered by','undedicated'); ?> <a href="http://www.wordpress.org"><?php _e('WordPress','undedicated'); ?></a> and <a href="http://www.speckygeek.com/undedicated-minimal-wordpress-theme/" title="Undedicated"><?php _e('Undedicated','undedicated'); ?></a>.</p>
</div><!--#footer-->

</div><!--#wrapper -->

<?php if ( isset($options['analytics_code']) && ($options['analytics_code']!="") ){ ?>
<?php echo(stripslashes ($options['analytics_code']));?>
<?php } ?>
		

<!-- Do not remove this, it's required for certain plugins which generally use this hook to reference JavaScript files. -->
<?php wp_footer(); ?>	
</body>
</html>
