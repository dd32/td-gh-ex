<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Post list Hooks
 */
add_action( 'kadence_post_excerpt_header', 'ascend_post_excerpt_header_title', 10 );
function ascend_post_excerpt_header_title() {
	echo '<a href="'.get_the_permalink().'">';
    	echo '<h3 class="entry-title" itemprop="name headline">';
          		the_title();
    	echo '</h3>';
    echo '</a>';
}

add_action( 'kadence_single_loop_post_header', 'ascend_post_full_loop_title', 20 );
function ascend_post_full_loop_title() {
	echo '<a href="'.get_the_permalink().'">';
    	echo '<h2 class="entry-title" itemprop="name headline">';
          		the_title();
    	echo '</h2>';
    echo '</a>';
}
function ascend_get_postsummary() {
  global $post, $ascend;
  if ( has_post_format( 'video' )) {
        $postsummery = get_post_meta( $post->ID, '_kad_video_post_summery', true );
        if(empty($postsummery) || $postsummery == 'default') {
            if(!empty($ascend['video_post_summery_default'])) {
                $postsummery = $ascend['video_post_summery_default'];
            } else {
                $postsummery = 'video';
            }
        }
    } else if (has_post_format( 'gallery' )) {
        $postsummery = get_post_meta( $post->ID, '_kad_gallery_post_summery', true );
        if(empty($postsummery) || $postsummery == 'default') {
            if(!empty($ascend['gallery_post_summery_default'])) {
                $postsummery = $ascend['gallery_post_summery_default'];
            } else {
                $postsummery = 'slider_landscape';
            }
        }
    } elseif (has_post_format( 'image' )) {
        $postsummery = get_post_meta( $post->ID, '_kad_image_post_summery', true );
        if(empty($postsummery) || $postsummery == 'default') {
            if(!empty($ascend['image_post_summery_default'])) {
                $postsummery = $ascend['image_post_summery_default'];
            } else {
                $postsummery = 'img_portrait';
            }
        }
    } else {
        $postsummery = get_post_meta( $post->ID, '_kad_post_summery', true );
        if(empty($postsummery) || $postsummery == 'default') {
            if(!empty($ascend['post_summery_default'])) {
                $postsummery = $ascend['post_summery_default'];
            } else {
                $postsummery = 'img_portrait';
            }
        }
    }

    return $postsummery;
}
function ascend_get_postlayout($type = 'normal') {
	if(isset($type) && $type == 'full') {
        $r['sum']    	= 'full'; 
        $r['pclass']  	= "postlist fullpost";
        $r['tclass']  	= '';
        $r['data']      = '';
        $r['highlight'] = 'false';
    } else if (isset($type) && $type == 'grid'){
    	global $ascend;
    	if(isset($ascend['blog_grid_display_height']) && $ascend['blog_grid_display_height'] == 0 ) {
    		$masonry_style = 'masonry';
    	} else {
    		$masonry_style = 'matchheight';
    	}
        $r['sum']    	= 'grid'; 
        $r['pclass']  	= "grid-postlist";
        $r['tclass']  	= 'init-masonry row';
        $r['data']      = 'data-masonry-selector=".b_item" data-masonry-style="'.$masonry_style.'"';
        $r['highlight'] = 'false';
    } else if (isset($type) && $type == 'grid_standard') {
        $r['sum']   	= 'grid'; 
        $r['pclass']  	= 'grid-postlist';
        $r['tclass']  	= 'init-masonry row';
        $r['data']      = 'data-masonry-selector=".b_item" data-masonry-style="matchheight"';
        $r['highlight'] = 'true';
    } else if (isset($type) && $type == 'photo'){
        $r['sum']    	= 'photo'; 
        $r['pclass']  	= "photo-postlist";
        $r['tclass']  	= 'init-masonry-intrinsic row-margin-small';
        $r['data']      = 'data-masonry-selector=".b_item" data-masonry-style="masonry"';
        $r['highlight'] = 'false';
    } else if (isset($type) && $type == 'below_title'){
        $r['sum']    	= 'below_title'; 
        $r['pclass']  	= "postlist";
        $r['tclass']  	= '';
        $r['data']      = '';
        $r['highlight'] = 'false';
    } else {
        $r['sum']    	= 'normal'; 
        $r['pclass']  	= 'postlist';
        $r['tclass']  	= '';
        $r['data']      = '';
        $r['highlight'] = 'false';
    } 
    return $r;
}