<?php global $chip_life_global; ?>
<script language="javascript" type="text/javascript">
jQuery(document).ready(function($) {
	
	<!-- Begin Superfish Code -->
	$(".primarymenubox ul,.secondarymenubox ul").supersubs({ 
		minWidth:    12,
		maxWidth:    15,
		extraWidth:  1
	}).superfish();
	<!-- End Superfish Code -->
	
});
</script>

<!-- Begin Analytic Code -->
<?php
if( $chip_life_global['theme_options']['chip_life_analytic'] == "yes" ):
echo htmlspecialchars_decode( $chip_life_global['theme_options']['chip_life_analytic_code'] );
endif;
?>
<!-- End Analytic Code -->