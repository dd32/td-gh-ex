<div id="sidebar">
<?php if (promax_get_option('promax_activate_popular' ) =='1' ) {load_template(get_template_directory() . '/includes/popular.php'); } ?>
	<?php if (!dynamic_sidebar('Sidebar Right') ) : ?>				
		<?php endif; ?>	</div>	<!-- end div #sidebar -->

		