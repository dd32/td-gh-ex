<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
get_header();
	get_template_part('navigation'); ?>
	<!-- Body -->
    <div id="body">
    	<div class="row">
        	<div id="main" class="col width-100 last">
            	<div id="error-404">
                	<h1 class="title">Sorry, this page isn't available!</h1>
                    <h2 class="sub-title">The link you followed may be broken, or the page may have been removed.</h1>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>
	<!-- Body end -->
<?php get_footer(); ?>