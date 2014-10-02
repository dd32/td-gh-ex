<?php 
// theme footer
	$bartleby_options = bartleby_get_theme_options();
?>
<footer>
	<div class="row">
		<div class="sixteen columns">
			<hr>
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
<?php if( $bartleby_options['footer_link'] == 'on' ) : ?>
<div class="row">
	<div id="credit" class="sixteen columns">
		<a href="https://www.edwardrjenkins.com/" rel="nofollow">
			<?php esc_attr_e( 'Bartleby Theme by Edward R. Jenkins' , 'bartleby' ); ?>
		</a>
	</div>
</div>
<?php else: ?>
<div class="row">
	<div id="credit" class="sixteen columns">
		<?php esc_attr_e( 'Bartleby Theme by Edward R. Jenkins' , 'bartleby' ); ?>
	</div>
</div>
<?php endif; ?>
</footer>
</div><!-- ends opening container -->
<?php wp_footer(); ?>
</body>
</html>