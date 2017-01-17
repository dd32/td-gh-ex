<?php
get_header();
if(!is_home()) { echo '</div>'; }
 ?>
<div class="page_mycarousel">
	<div class="container page_title_col">
		<div class="row">
			<div class="hc_page_header_area">
				<h1><?php _e('Error 404','corpbiz'); ?></h1>		
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">	
		<div class="col-md-12">
			<div class="error_404">
				<h2><?php _e('Error 404','corpbiz'); ?></h2>
				<h4><?php _e('Oops! Page not found','corpbiz'); ?></h4>
				<p><?php _e('We are sorry, but the page you are looking for does not exist.','corpbiz'); ?></p>
				<p><a href="<?php echo esc_html(site_url());?>" class="cont_btn btn_red"><?php _e('Go Back','corpbiz'); ?></a></p>
			</div>
		</div>
	</div>
</div>
<!-- 404 Error Section -->
<?php
get_template_part('index', 'call-out-area');
get_footer(); ?>