<?php
/* 	AssociationX Theme's Footer Sidebar Area
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/	
	$numoffwclmn = '4';	
	$fwcehck='f';
	foreach (range(1, $numoffwclmn) as $fwclmnn) {
	$fwnum = $fwclmnn+3;
		if (is_active_sidebar('sidebar-'.$fwnum)): $fwcehck='t'; endif;
	}
	if ($fwcehck != 't') return; 
?>
<div class="box90">
	<div id="footer-sidebar">
		<?php
		foreach (range(1, $numoffwclmn) as $fwclmnnx) {
		$fwnumx = $fwclmnnx+3; ?>
			<div class="footer-widgets">
				<?php if ( is_active_sidebar( 'sidebar-'.$fwnumx ) ) : dynamic_sidebar( 'sidebar-'.$fwnumx ); endif; ?>
			</div>
		<?php } ?>    	  
	</div><!-- #footer-sidebar -->
</div>