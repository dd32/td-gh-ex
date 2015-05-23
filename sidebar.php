<div id="sidebar">
	<?php
		if (of_get_option('promax_popular' ) =='1' ) {
			get_template_part('/includes/popular');
			}
		dynamic_sidebar('prosidebar');
	?>
</div>	<!-- end div #sidebar -->

		