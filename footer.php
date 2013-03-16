  <!-- Footer -->
  
  <footer>
<div class="row">
	<div class="sixteen columns">
	  <hr />
	  <div class="row">
		<div class="seven columns">
		<div id="colophon">
		  <small>&copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?></small>
</div>
		</div>
		<div class="nine columns">
<nav id="footermenu" role="navigation"><?php wp_nav_menu( array( 'theme_location' => 'bottom-menu' ) ); ?></nav>
		</div>
	  </div>
	</div>
</div>
<div class="row">
<div id="credit" class="sixteen columns">
<?php esc_attr_e( 'Bartleby Theme by Edward R. Jenkins' , '' ); ?>
</div>
</div>
<?php wp_footer(); ?>
  </footer>
</body>
</html>