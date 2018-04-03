<?php
/**
 * Display an optional post thumbnail, video in according to post formats
 *
 * @package Beatrix Lite
 * @since 1.0 
 */

if( is_category() || is_archive() && !is_author()){
	$layout_masonry 	= beatrix_lite_get_theme_mod('cat_layout');	
	}	elseif (is_home() || is_front_page()){
	$layout_masonry 	= beatrix_lite_get_theme_mod('blog_layout');	
} else {
	$layout_masonry = "list";
}

if ( has_post_thumbnail() ) { 
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'beatrix-lite-soft-featured');?>    
				 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>  
               <div class="entry-media" style="background-image:url(<?php echo esc_url($featured_img_url); ?>);"></div>
<?php } else {  ?>
	 <div class="entry-media no-entry-media"> </div>
<?php } ?>  