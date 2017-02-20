<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $ascend;
	// Check for Sidebar
	if(isset($ascend['home_post_column'])) {
	} 

	if(!empty($ascend['home_blog_title'])) {
		$btitle = $ascend['home_blog_title'];
	} else { 
		$btitle = '';
	}
	if(isset($ascend['home_blog_style'])) {
		$type = $ascend['home_blog_style'];
	} else {
		$type = 'grid'; 
	}
	if(isset($ascend['home_post_count'])) {
		$blogcount = $ascend['home_post_count'];
	} else {
		$blogcount = '4'; 
	}
	if(isset($ascend['home_post_column'])) {
		$blogcolumns = $ascend['home_post_column'];
	} else {
		$blogcolumns = '3'; 
	}
	if(!empty($ascend['home_post_type'])) { 
		$blog_cat = get_term_by ('id',$ascend['home_post_type'],'category');
		$blog_cat_slug = $blog_cat -> slug;
	} else {
		$blog_cat_slug = '';
	}

echo '<div class="home_blog home-margin clearfix home-padding">';
	if(!empty($btitle)) {
		echo '<div class="clearfix">';
			echo '<h3 class="hometitle">';
				echo '<span>'.esc_html($btitle).'</span>';
			echo '</h3>';
		echo '</div>';
	}
	$lay = ascend_get_postlayout($type);
	global $kt_grid_columns, $kt_blog_loop, $kt_grid_carousel;
	$kt_blog_loop['loop'] = 1;
	$kt_grid_columns = $blogcolumns;
	$kt_grid_carousel = false;
	if ($blogcolumns == '2') {
        $itemsize = 'col-xxl-4 col-xl-6 col-md-6 col-sm-6 col-xs-12 col-ss-12'; 
    } else if ($blogcolumns == '3'){ 
        $itemsize = 'col-xxl-3 col-xl-4 col-md-4 col-sm-4 col-xs-6 col-ss-12'; 
    } else {
        $itemsize = 'col-xxl-25 col-xl-3 col-md-3 col-sm-4 col-xs-6 col-ss-12';
   	} ?>
   	<div class="kt_blog_home <?php echo esc_attr($lay['pclass']); ?>">
	   	<div class="kt_archivecontent <?php echo esc_attr($lay['tclass']);?>" <?php echo $lay['data'];?>> 
		   	<?php 
		   	if(isset($wp_query)) {
				$temp = $wp_query;
			} else {
				$temp = null;
			}
			$wp_query = null; 
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'orderby' 				=> 'date',
				'order' 				=> 'DESC',
				'category_name'	 		=> $blog_cat_slug,
				'post_type' 			=> 'post',
				'ignore_sticky_posts' 	=> false,
				'posts_per_page' 		=> $blogcount
				)
			);
		if ( $wp_query ) : 
			$kt_blog_loop['count'] = $wp_query->post_count;

			while ( $wp_query->have_posts() ) : $wp_query->the_post();
			if($lay['sum'] == 'full'){ 
                if (has_post_format( 'quote' )) {
                    get_template_part('templates/content', 'post-full-quote'); 
                } else {
                    get_template_part('templates/content', 'post-full'); 
                }
	        } else if($lay['sum'] == 'grid') { 
	        	if($lay['highlight'] == 'true' && $kt_blog_loop['loop'] == 1) {
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
        endwhile; else: ?>
			<div class="error-not-found"><?php _e('Sorry, no blog entries found.', 'ascend'); ?></div>
		<?php 
		endif; 

		$wp_query = $temp;  // Reset 
		wp_reset_query(); ?>
		</div>
	</div>
	<?php  	
	if(isset($ascend['home_post_readmore']) && $ascend['home_post_readmore'] == 1) {
		if(isset($ascend['home_post_readmore_text'])) {
			$readmore = $ascend['home_post_readmore_text'];
		} else {
			$readmore = __('Read More', 'ascend'); 
		}
		if(isset($ascend['home_post_readmore_link'])) {
			$link = $ascend['home_post_readmore_link'];
		} else {
			$link = ''; 
		}
		echo '<div class="home_blog_readmore">';
			echo '<a href="'.esc_url(get_permalink($link)).'" class="btn btn-primary">'.esc_html($readmore).'</a>';
		echo '</div>';
	}
echo '</div>';