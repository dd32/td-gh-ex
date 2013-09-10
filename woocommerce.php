<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
get_header();
	get_template_part('navigation');
	get_breadcrumbs(); ?>
	<!-- Body -->
    <div id="body">
    	<div class="row">
        	<div id="main" class="col width-75">    
				<?php woocommerce_content(); ?>
            </div>
            <div id="sidebar" class="col width-25 last">
				<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
	<!-- Body end -->
<?php get_footer(); ?>