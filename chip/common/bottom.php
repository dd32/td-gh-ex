<script language="javascript" type="text/javascript">
jQuery(document).ready(function($) {
	
	<!-- Begin Superfish Code -->
	$(".primary-container ul,.secondary-container ul").supersubs({ 
		minWidth:    12,
		maxWidth:    15,
		extraWidth:  1
	}).superfish();
	<!-- End Superfish Code -->
	
});
</script>

<!-- Begin Analytics Code -->
<?php
if( get_option( $theme_options['c302']['id'] ) == "yes" ):
echo stripslashes( get_option( $theme_options['c303']['id'] ) );
endif;
?>
<!-- End Analytics Code -->