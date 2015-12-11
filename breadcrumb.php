<div class="bhumi_header_breadcrumb_title">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php if(is_home()){echo "";}else{the_title();} ?></h1>
				<!-- BreadCrumb -->
                <?php if (function_exists('bhumi_breadcrumbs')) bhumi_breadcrumbs(); ?>
                <!-- BreadCrumb -->
			</div>
		</div>
	</div>	
</div>