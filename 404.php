<?php get_header(); ?>
		<?php get_template_part('navigation'); ?>
    	<!-- BODY -->
    	<div id="body">
        	<div class="container row">
            	<!-- CONTENT -->
            	<div id="content" class="last col width-100">
                	<div class="padded-box">
                    	<h1 class="large"><?php echo __('Error 404', 'autoadjust'); ?></h1>
                        <h1 class="medium"><?php echo __('Sorry, the page you are looking for cannot be found.', 'autoadjust'); ?></h1>
                        <?php get_search_form(); ?>
                    </div>
                </div>
                <!-- CONTENT END -->
            </div>
        </div>
        <!-- BODY END --> 
<?php get_footer(); ?>