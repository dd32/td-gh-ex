<?php
/**
 * Template to show the front page.
 *
 *
 * @package Theme Freesia
 * @subpackage Arise
 * @since Arise 1.0
 */
get_header();
$arise_settings = arise_get_theme_options();
if ( 'posts' == get_option( 'show_on_front' ) ) {
	do_action('arise_show_front_page');
} else {
	echo '<div id="main">';
	if($arise_settings['arise_disable_services'] != 1){
		echo '<!-- Service Widget ============================================= -->';
		global $post;
		$arise_services = '';
		$arise_total_page_no = 0; 
		$arise_list_page	= array();
		for( $i = 1; $i <= $arise_settings['arise_total_services']; $i++ ){
			if( isset ( $arise_settings['arise_frontpage_services_' . $i] ) && $arise_settings['arise_frontpage_services_' . $i] > 0 ){
				$arise_total_page_no++;

				$arise_list_page	=	array_merge( $arise_list_page, array( $arise_settings['arise_frontpage_services_' . $i] ) );
			}

		}
		if (( !empty( $arise_list_page ) || !empty($arise_settings['arise_services_title']) || !empty($arise_settings['arise_services_description']) )  && $arise_total_page_no > 0 ) {
				$arise_services 	.= '<section class="widget widget_service">
						<div class="container clearfix">';
						$get_featured_posts 		= new WP_Query(array(
						'posts_per_page'      	=> $arise_settings['arise_total_services'],
						'post_type'           	=> array('page'),
						'post__in'            	=> $arise_list_page,
						'orderby'             	=> 'post__in',
					));
				if($arise_settings['arise_services_title'] != ''){
					$arise_services .= '<h2 class="widget-title">'. esc_attr($arise_settings['arise_services_title']).'</h2>';
				}
				if($arise_settings['arise_services_description'] != ''){
					$arise_services .= '<p class="widget-sub-title">'. esc_attr($arise_settings['arise_services_description']).'</p>';
				}
					$arise_services .= '<div class="column clearfix">';
				while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
				$attachment_id = get_post_thumbnail_id();
				$image_attributes = wp_get_attachment_image_src($attachment_id,'full');
							$title_attribute       	 	 = apply_filters('the_title', get_the_title($post->ID));
							$excerpt               	 	 = get_the_excerpt();
					$arise_services .= '<div class="three-column">';
					if ($image_attributes) {
						$arise_services 	.= '<a class="service-img" href="'.get_permalink().'" title="'.the_title('', '', false).'"' .' alt="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'thumbnail').'</a>';
					}
					$arise_services 	.= '<article>';
					if ($title_attribute != '') {
								$arise_services .= '<h3 class="service-title"><a href="'.get_permalink().'" title="'.the_title('', '', false).'" rel="bookmark">'.get_the_title().'</a></h3>';
					}
					if ($excerpt != '') {
						$excerpt_text = $arise_settings['arise_tag_text'];
						$arise_services .= '<p>'.$excerpt.' </p>';
					}
					$arise_services 	.= '</article>';
					$content = get_the_content();
					$excerpt = get_the_excerpt();
					if(strlen($excerpt) < strlen($content)){
						$excerpt_text = $arise_settings['arise_tag_text'];
						if($excerpt_text == '' || $excerpt_text == 'Read More') :
							$arise_services 	.= '<a title='.'"'.get_the_title(). '"'. ' '.'href="'.get_permalink().'"'.' class="more-link">'.__('Read More', 'arise').'</a>';
						else:
						$arise_services 	.= '<a title='.'"'.get_the_title(). '"'. ' '.'href="'.get_permalink().'"'.' class="more-link">'.$arise_settings[ 'arise_tag_text' ].'</a>';
						endif;
					}
					$arise_services 	.='</div><!-- .column -->';
					endwhile;
					$arise_services 	.='</div><!-- .end column clearfix -->';
					$arise_services 	.='</div><!-- .container clearfix -->
					</section><!-- end .widget_service -->';
				}
		echo $arise_services;
	}
   if( is_active_sidebar( 'arise_corporate_page_sidebar' ) ) {
			dynamic_sidebar( 'arise_corporate_page_sidebar' );
	} ?>
</div>
<!-- end #main -->
<?php } ?>
<?php get_footer(); ?>
