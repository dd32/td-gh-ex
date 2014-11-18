<div id="footer">
	<div id="colophon"  class="container_16 containermargin">
		<div id="footer-info" class="grid_16">
			<div id="copyright"><?php echo stripslashes (rwp('copyright')); ?></div>
			<?php if ( has_nav_menu( 'menufooter' ) ) {  wp_nav_menu( array('menu_id' => 'menufooter',  'container_class' => 'menu footernav', 'theme_location' => 'menufooter' ) ); } ?>
	<div style="clear:both;"></div>	
	<?php get_sidebar ( 'footer' ); ?>
	</div>		
	</div><!-- #colophon -->
	<div style="clear:both;"></div>
	</div><!-- #footer -->
	<?php wp_footer(); ?>
</body>
</html>