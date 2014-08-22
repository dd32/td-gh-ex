<?php
/*	@Theme Name	:	corpbiz
* 	@file         :	404.php
* 	@package      :	Corpbiz
* 	@author       :	Hari Maliya
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/corpbiz/404.php
*/
get_header();
 ?>
<div class="page_mycarousel">
	<div class="container page_title_col">
		<div class="row">
			<div class="hc_page_header_area">
				<h1><?php _e('Error -404','corpbiz'); ?></h1>		
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
				<p><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','corpbiz'); ?></p>
				<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="cont_btn btn_red"><?php _e('Go to Homepage','corpbiz'); ?></a></p>
			</div>
		</div>
	</div>
</div>
<!-- 404 Error Section -->
<?php
get_template_part('index', 'call-out-area');
get_footer(); ?>