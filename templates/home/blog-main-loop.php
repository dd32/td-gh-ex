<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $kt_has_sidebar, $kt_grid_columns, $kt_blog_loop;
$ascend = ascend_get_options(); 

    $kt_blog_loop['loop'] = 1;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if(isset($ascend['home_main_post_style'])) {
    	$layout = $ascend['home_main_post_style'];
    } else {
    	$layout = 'normal';
    }
    $lay = ascend_get_postlayout($layout);
    if(isset($ascend['home_main_columns'])) {
        $kt_grid_columns = $ascend['home_main_columns'];
    } else {
        $kt_grid_columns = '3';
    } 
    if(ascend_display_sidebar()) {
        $fullclass 		= '';
        $kt_has_sidebar = true;
    } else {
        $fullclass 		= 'fullwidth';
        $kt_has_sidebar = false;
    }
    $itemsize = ascend_get_post_grid_item_size($kt_grid_columns, $kt_has_sidebar);

		if (!have_posts()) : ?>
            <div class="error-not-found">
                <?php _e('Sorry, no results were found.', 'ascend'); ?>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
        <div class="<?php echo esc_attr($lay['pclass']); ?>">
            <div class="kt_archivecontent <?php echo esc_attr($lay['tclass']); ?>" data-masonry-selector="<?php echo esc_attr($lay['data_selector']);?>" data-masonry-style="<?php echo esc_attr($lay['data_style']);?>"> 
                <?php 
                $kt_blog_loop['count'] = $wp_query->post_count;
                while (have_posts()) : the_post();
	                if($lay['sum'] == 'full'){ 
	                    if (has_post_format( 'quote' )) {
	                        get_template_part('templates/content', 'post-full-quote'); 
	                    } else {
	                        get_template_part('templates/content', 'post-full'); 
	                    }
	                } else if($lay['sum'] == 'grid') { 
	                    if($lay['highlight'] == 'true' && $kt_blog_loop['loop'] == 1 && $paged == 1) {
	                        get_template_part('templates/content', get_post_format());
	                    } else { ?>
	                        <div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
	                            <?php get_template_part('templates/content', 'post-grid'); ?>
	                        </div>
	                   <?php }
	                } else if($lay['sum'] == 'photo') { ?>
	                    <div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
	                        <?php get_template_part('templates/content', 'post-photo-grid'); ?>
	                    </div>
	                <?php
	                } else if($lay['sum'] == 'below_title') {
	                    get_template_part('templates/content', 'post-title-above');
	                } else { 
	                    get_template_part('templates/content', get_post_format());
	                }
	                $kt_blog_loop['loop'] ++;
	            endwhile;

                ?>
            </div><!-- /.archive content -->
            <?php 
            /**
            * @hooked ascend_pagination - 20
            */
            do_action('ascend_pagination'); ?>
                </div>