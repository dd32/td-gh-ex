<div id="sidebar">
	<?php
		if (get_theme_mod('promax_popular_posts' )!=='disable' ) {
			get_template_part('/includes/popular');
			}
		dynamic_sidebar('prosidebar');
	?>
</div>	<!-- end div #sidebar -->

		