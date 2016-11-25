<!-- Page Title -->
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="page-title">
					<h2><?php 
						if( is_archive() ){ 
						
							the_archive_title(); 
							
						}
						else if( is_home() ){
							
							wp_title(' ');
							
						}
						else{ 
						
							the_title(); 
						}  
						?></h2>
					<p><?php bloginfo('description');?></p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="search_box">
					<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" id="appendedInputButton" class="search_input" placeholder=<?php _e( 'Search', 'busiprof' ); ?> name="s">
					<input type="button" value="" class="search_btn">
				</form>
				</div>
			</div>
		</div>
	</div>	
</section>
<!-- End of Page Title -->
<div class="clearfix"></div>