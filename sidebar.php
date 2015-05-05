<div id="sidebar">
	<?php 
		if (of_get_option('optimize_activate_ltposts' ) =='1' ) {get_template_part('/includes/ltposts.php'); } 
		dynamic_sidebar('opsidebar'); 
	?>
</div>	<!-- end div #sidebar -->

		