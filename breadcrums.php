<?php 
$wl_theme_options = weblizar_get_options();
if ( empty ( $wl_theme_options['breadcrumb_title'] ) ) {
	$class = 'no-breadcrumb';
} else {
	$class = '';
}
?>
<div class="enigma_header_breadcrum_title <?php echo esc_attr( $class ); ?>">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php $wl_theme_options = weblizar_get_options(); 
					if ( $wl_theme_options['breadcrumb_title']!='') { ?>
				<h1><?php if(is_home()){echo "";}else{the_title();} ?></h1>
				 <?php } ?>
				<!-- BreadCrumb -->
                <?php if (function_exists('weblizar_breadcrumbs')) weblizar_breadcrumbs(); ?>
                <!-- BreadCrumb -->
			</div>
		</div>
	</div>	
</div>