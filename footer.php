<div id="footer">
	<div id="colophon"  class="container_16 containermargin">
		<div id="footer-info" class="grid_16">
			<?php get_sidebar ( 'footer' ); ?>
			
			<div id="copyright"><?php echo stripslashes (minimumminimaloptions('copyright')); ?></div>
			<?php if ( has_nav_menu( 'menufooter' ) ) {  wp_nav_menu( array('menu_id' => 'menufooter',  'container_class' => 'menu footernav', 'theme_location' => 'menufooter' ) ); } ?>
			<div style="clear:both;"></div>	
			<?php minimum_minimal_powered_by(); ?>
		</div><!-- #footer-info -->		
	</div><!-- #colophon -->
	<div style="clear:both;"></div>
	</div><!-- #footer -->
	<?php wp_footer(); ?>
</body>
</html>