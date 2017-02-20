<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Image Functions
 */

function ascend_lazy_load_filter() {
  $lazy = false;
  if(function_exists( 'get_rocket_option' ) && get_rocket_option( 'lazyload') ) {
    $lazy = true;
  }
  return apply_filters('kadence_lazy_load', $lazy);
}

add_filter( 'max_srcset_image_width','ascend_srcset_max');
function ascend_srcset_max($string) {
  	return 2300;
}

function ascend_get_srcset($width,$height,$url,$id) {
  	if(empty($id) || empty($url)) {
    	return;
  	}
  
  	$image_meta = get_post_meta( $id, '_wp_attachment_metadata', true );
  	if(empty($image_meta['file'])){
    	return;
  	}
  	// If possible add in our images on the fly sizes
  	$ext = substr($image_meta['file'], strrpos($image_meta['file'], "."));
  	$pathflyfilename = str_replace($ext,'-'.$width.'x'.$height.'' . $ext, $image_meta['file']);
  	$retina_w = $width*2;
	$retina_h = $height*2;
  	$pathretinaflyfilename = str_replace($ext, '-'.$retina_w.'x'.$retina_h.'' . $ext, $image_meta['file']);
  	$flyfilename = basename($image_meta['file'], $ext) . '-'.$width.'x'.$height.'' . $ext;
  	$retinaflyfilename = basename($image_meta['file'], $ext) . '-'.$retina_w.'x'.$retina_h.'' . $ext;

	$upload_info = wp_upload_dir();
  	$upload_dir = $upload_info['basedir'];

  	$flyfile = trailingslashit($upload_dir).$pathflyfilename;
  	$retinafile = trailingslashit($upload_dir).$pathretinaflyfilename;
  	if(empty($image_meta['sizes']) ){ 
  		$image_meta['sizes'] = array();
  	}
	if (file_exists($flyfile)) {
      	$kt_add_imagesize = array(
        	'kt_on_fly' => array( 
          	'file'=> $flyfilename,
          	'width' => $width,
          	'height' => $height,
          	'mime-type' => isset($image_meta['sizes']['thumbnail']) ? $image_meta['sizes']['thumbnail']['mime-type'] : '',
          	)
      	);
      	$image_meta['sizes'] = array_merge($image_meta['sizes'], $kt_add_imagesize);
	}
	if (file_exists($retinafile)) {
  		$kt_add_imagesize_retina = array(
    			'kt_on_fly_retina' => array( 
	          	'file'=> $retinaflyfilename,
	          	'width' => $retina_w,
	          	'height' => $retina_h,
	          	'mime-type' => isset($image_meta['sizes']['thumbnail']) ? $image_meta['sizes']['thumbnail']['mime-type'] : '', 
	          	)
    		);
    	$image_meta['sizes'] = array_merge($image_meta['sizes'], $kt_add_imagesize_retina);
	}
	if(function_exists ( 'wp_calculate_image_srcset') ){
  		$output = wp_calculate_image_srcset(array( $width, $height), $url, $image_meta, $id);
	} else {
  		$output = '';
	}

    return $output;
}
function ascend_get_srcset_output($width,$height,$url,$id) {
    $img_srcset = ascend_get_srcset( $width, $height, $url, $id);
    if(!empty($img_srcset) ) {
      	$output = 'srcset="'.esc_attr($img_srcset).'" sizes="(max-width: '.esc_attr($width).'px) 100vw, '.esc_attr($width).'px"';
    } else {
      	$output = '';
    }
    return $output;
}
function ascend_get_options_placeholder_image() {
    global $ascend;
    if(isset($ascend['default_placeholder_image']['id']) && !empty($ascend['default_placeholder_image']['id'])){
        return $ascend['default_placeholder_image']['id'];
    } else {
        return '';
    }
}
function ascend_default_placeholder_image() {
    return apply_filters('kadence_default_placeholder_image', 'http://placehold.it/');
}
function ascend_get_image($width = null, $height = null, $crop = true, $class = null, $alt = null, $id = null, $placeholder = false) {
    if(empty($id)) {
        $id = get_post_thumbnail_id();
    }
    if(empty($id)){
        if($placeholder == true) {
            $id = ascend_get_options_placeholder_image();
        }
    }
    if(!empty($id)) {
        $image_src = wp_get_attachment_image_src($id, 'full' );
        $image = ascend_aq_resize($image_src[0], $width, $height, $crop, false, false, $id);
        if(empty($image[0])) {
            $image = array(
                $image_src[0],
                $image_src[1],
                $image_src[2]
            );
        }
        if(empty($alt)) {
            $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        }
        $return_array = array(
            'src' => $image[0],
            'width' => $image[1],
            'height' => $image[2],
            'srcset' => ascend_get_srcset_output($image[1],$image[2],$image_src[0],$id),
            'class' => $class,
            'alt' => $alt,
            'full' => $image_src[0],
        );
    } else if(empty($id) && $placeholder == true) {
    	if(empty($height)){
    		$height = $width;
    	}
    	if(empty($width)){
    		$width = $height;
    	}
        $return_array = array(
            'src' => ascend_default_placeholder_image().$width.'x'.$height,
            'width' => $width,
            'height' => $height,
            'srcset' => '',
            'class' => $class,
            'alt' => $alt,
            'full' => ascend_default_placeholder_image().$width.'x'.$height,
        );
    } else {
        $return_array = array(
            'src' => '',
            'width' => '',
            'height' => '',
            'srcset' => '',
            'class' => '',
            'alt' => '',
            'full' => '',
        );
    }

    return $return_array;
}
function ascend_get_image_output($width = null, $height = null, $crop = true, $class = null, $alt = null, $id = null, $placeholder = false, $lazy = false, $schema = true, $extra = null) {
    $img = ascend_get_image($width, $height, $crop, $class, $alt, $id, $placeholder);
    if($lazy) {
        if( ascend_lazy_load_filter() ) {
            $image_src_output = 'src="data:image/gif;base64,R0lGODdhAQABAPAAAP///wAAACwAAAAAAQABAEACAkQBADs=" data-lazy-src="'.esc_url($img['src']).'" '; 
        } else {
            $image_src_output = 'src="'.esc_url($img['src']).'"'; 
        }
    } else {
        $image_src_output = 'src="'.esc_url($img['src']).'"'; 
    }
    if(!empty($img['src']) && $schema == true) {
        $output = '<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
        $output .='<img '.$image_src_output.' width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" '.$img['srcset'].' class="'.esc_attr($img['class']).'" itemprop="contentUrl" alt="'.esc_attr($img['alt']).'" '.$extra.'>';
        $output .= '<meta itemprop="url" content="'.esc_url($img['src']).'">';
        $output .= '<meta itemprop="width" content="'.esc_attr($img['width']).'px">';
        $output .= '<meta itemprop="height" content="'.esc_attr($img['height']).'px">';
        $output .= '</div>';
      	return $output;

    } elseif(!empty($img['src'])) {
        return '<img '.$image_src_output.' width="'.esc_attr($img['width']).'" height="'.esc_attr($img['height']).'" '.$img['srcset'].' class="'.esc_attr($img['class']).'" alt="'.esc_attr($img['alt']).'" '.$extra.'>';
    } else {
        return null;
    }
}

function ascend_basic_image_sizes() {

	$sizes = array('full' => 'Full Size');

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
			$sizes[$_size]  = $_size .' - '. get_option( "{$_size}_size_w" ).'x'.get_option( "{$_size}_size_h" );
		} 
	}
	$sizes['custom'] = 'Custom';

	return $sizes;
}
