<?php
	if ( ! is_active_sidebar( 'content-header' ) )
		return;
?>

<div class="container">
	<div id="footer-widgets" class="clearfix" style="margin-top:30px;">
	<?php

			if ( is_active_sidebar( 'content-header' ) ) :
				echo '<div class="footer-widget">';
				dynamic_sidebar( 'content-header' );
				echo '</div> <!-- end .content-header -->';
			endif;
	?>
	</div> <!-- #footer-widgets -->
</div>	<!-- .container -->