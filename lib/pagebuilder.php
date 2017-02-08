<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Extend - Site Origin Panels 
 */
add_filter('siteorigin_panels_full_width_container', 'ascend_fullwidth_container_id');
function ascend_fullwidth_container_id($tag) {
	if($tag == 'body') {
		$tag = '#inner-wrap';
	}
	return $tag;
}


function ascend_siteoriginpanels_row_attributes($attr, $row) {
  if(!empty($row['style']['class'])) {
    if(empty($attr['style'])) $attr['style'] = '';
    $attr['style'] .= 'margin-bottom: 0px;';
    $attr['style'] .= 'margin-left: 0px;';
    $attr['style'] .= 'margin-right: 0px;';
  }

  return $attr;
}
add_filter('siteorigin_panels_row_attributes', 'ascend_siteoriginpanels_row_attributes', 10, 2);

function ascend_panels_row_background_styles($fields) {
	$fields['background_image_url'] = array(
        'name'      => __('Background image external url', 'ascend'),
        'group'     => 'design',
        'description' => 'optional, overridden by button below.',
        'type'      => 'url',
        'priority'  => 4,
      );
  	$fields['background_image'] = array(
        'name'      => __('Background Image', 'ascend'),
        'group'     => 'design',
        'type'      => 'image',
        'priority'  => 5,
      );
  	$fields['background_image_position'] = array(
        'name'      => __('Background Image Position', 'ascend'),
        'type'      => 'select',
        'group'     => 'design',
        'default'   => 'center top',
        'priority'  => 6,
        'options'   => array(
               "left top"       => __("Left Top", "ascend"),
               "left center"    => __("Left Center", "ascend"),
               "left bottom"    => __("Left Bottom", "ascend"),
               "center top"     => __("Center Top", "ascend"),
               "center center"  => __("Center Center", "ascend"),
               "center bottom"  => __("Center Bottom", "ascend"),
               "right top"      => __("Right Top", "ascend"),
               "right center"   => __("Right Center", "ascend"),
               "right bottom"   => __("Right Bottom", "ascend")
                ),
      );
  $fields['background_image_style'] = array(
        'name'      => __('Background Image Style', 'ascend'),
        'type'      => 'select',
        'group'     => 'design',
        'default'   => 'center top',
        'priority'  => 6,
        'options'   => array(
             "cover"      => __("Cover", "ascend"),
             "parallax"   => __("Parallax", "ascend"),
             "contain"  	=> __("contain", "ascend"),
             "no-repeat"  => __("No Repeat", "ascend"),
             "repeat"     => __("Repeat", "ascend"),
             "repeat-x"   => __("Repeat-X", "ascend"),
             "repeat-y"   => __("Repeat-y", "ascend"),
              ),
        );
  $fields['border_top'] = array(
        'name'      => __('Border Top Size', 'ascend'),
        'type'      => 'measurement',
        'group'     => 'design',
        'priority'  => 8,
  );
  $fields['border_top_color'] = array(
        'name'      => __('Border Top Color', 'ascend'),
        'type'      => 'color',
        'group'     => 'design',
        'priority'  => 8.5,
      );
  $fields['border_bottom'] = array(
        'name'      => __('Border Bottom Size', 'ascend'),
        'type'      => 'measurement',
        'group'     => 'design',
        'priority'  => 9,
  );
  $fields['border_bottom_color'] = array(
        'name' => __('Border Bottom Color', 'ascend'),
        'type' => 'color',
        'group' => 'design',
        'priority' => 9.5,
  );
  $fields['row_separator'] = array(
        'name'      => __('Row Separator', 'ascend'),
        'type'      => 'select',
        'group'     => 'design',
        'default'   => 'none',
        'priority'  => 10,
        'options'   => array(
               "none"       				=> __("None", "ascend"),
               "center_triangle"    		=> __("Center Triangle", "ascend"),
               "center_triangle_double"    	=> __("Center Triangle Double", "ascend"),
               "left_triangle"  			=> __("Left Triangle", "ascend"),
               "right_triangle"  			=> __("Right Triangle", "ascend"),
               "tilt_left"     				=> __("Tilt Left", "ascend"),
               "tilt_right"  				=> __("Tilt Right", "ascend"),
               "center_small_triangle"  	=> __("Center Small Triangle", "ascend"),
               "three_small_triangle"  	=> __("Three Small Triangle", "ascend"),
                ),
      );
  $fields['next_row_background_color'] = array(
        'name'      => __('Next Row Background Color', 'ascend'),
        'type'      => 'color',
        'group'     => 'design',
        'default'   => 'none',
        'priority'  => 10.5,
      );
  return $fields;
}
add_filter('siteorigin_panels_row_style_fields', 'ascend_panels_row_background_styles');
function ascend_panels_remove_row_background_styles($fields) {
 unset( $fields['background_image_attachment'] );
 unset( $fields['background_display'] );
 unset( $fields['border_color'] );
 return $fields;
}
add_filter('siteorigin_panels_row_style_fields', 'ascend_panels_remove_row_background_styles');

function ascend_panels_row_background_styles_sep($attributes, $args) {
	$attributes['style'] = '';
	$attributes['class'] = 'panel-row-style kt-row-style-no-padding';
	if(!empty($args['background_image']) || !empty($args['background_image_url'] )) {
	   if(!empty($args['background_image'])){
	    	$url = wp_get_attachment_image_src( $args['background_image'], 'full' );
	    } else {
	    	$url = false;
	    }
	    if($url == false ) {
	        $attributes['style'] .= 'background-image: url(' . $args['background_image_url'] . ');';
	    } else {
	        $attributes['style'] .= 'background-image: url(' . $url[0] . ');';
	    }
      	if(!empty($args['background_image_style'])) {
            switch( $args['background_image_style'] ) {
              	case 'no-repeat':
                	$attributes['style'] .= 'background-repeat: no-repeat;';
                break;
              	case 'repeat':
                	$attributes['style'] .= 'background-repeat: repeat;';
                break;
              	case 'repeat-x':
                	$attributes['style'] .= 'background-repeat: repeat-x;';
                break;
              	case 'repeat-y':
                	$attributes['style'] .= 'background-repeat: repeat-y;';
                break;
                case 'contain':
                	$attributes['style'] .= 'background-repeat: no-repeat;';
                	$attributes['style'] .= 'background-size: contain;';
                break;
              	case 'cover':
                	$attributes['style'] .= 'background-size: cover;';
                break;
              	case 'parallax':
                	$attributes['class'] .= ' kt-parallax-stellar';
                	$attributes['data-ktstellar-background-ratio'] = '0.5';
                break;
            }
        }
  	}
	if( !empty( $args['background'] ) ) {
		$attributes['style'] .= 'background-color:' . $args['background']. ';';
	}
  	if( !empty( $args['row_stretch'] ) ) {
  		$attributes['class'] .= ' siteorigin-panels-stretch';
    	$attributes['data-stretch-type'] = $args['row_stretch'];
    	wp_enqueue_script('siteorigin-panels-front-styles');
  	}
  	if(!empty( $args['row_stretch']) && $args['row_stretch'] == 'full') {
    	$attributes['class'] .= ' kt-panel-row-stretch';
  	}
  	if(!empty( $args['row_stretch']) && $args['row_stretch'] == 'full-stretched') {
    	$attributes['class'] .= ' kt-panel-row-full-stretch';
  	}
 	if(!empty($args['border_top'])){
   		$attributes['style'] .= 'border-top: '.esc_attr($args['border_top']).' solid; ';
 	}
	if(!empty($args['border_top_color'])){
   		$attributes['style'] .= 'border-top-color: '.$args['border_top_color'].'; ';
 	}
 	if(!empty($args['border_bottom'])){
   		$attributes['style'] .= 'border-bottom: '.esc_attr($args['border_bottom']).' solid; ';
 	}
  	if(!empty($args['border_bottom_color'])){
   		$attributes['style'] .= 'border-bottom-color: '.$args['border_bottom_color'].'; ';
 	}

  	return $attributes;
}

function ascend_panels_row_background_styles_attributes($attributes, $args) {
	if(isset($args['row_separator']) && !empty($args['row_separator']) && $args['row_separator'] != 'none') {
		$attributes = array(
			'style' => '',
			'class' => array(),
			);
		if( !empty($args['row_css']) ){
		preg_match_all('/^(.+?):(.+?);?$/m', $args['row_css'], $matches);

		if(!empty($matches[0])){
				for($i = 0; $i < count($matches[0]); $i++) {
					$attributes['style'] .= $matches[1][$i] . ':' . $matches[2][$i] . ';';
				}
			}
		}
		if( !empty( $args['class'] ) ) {
			$attributes['class'] = array_merge( $attributes['class'], explode(' ', $args['class']) );
		}
	  	if( !empty( $args['padding'] ) ) {
	  		$attributes['style'] .= 'padding:'.$args['padding'].';';
				$attributes['style'] .= 'zoom:1;';
		}
		return $attributes;
	} else {
	  	if(!empty($args['background_image']) || !empty($args['background_image_url'] )) {
	  		if(!empty($args['background_image'])){
		    	$url = wp_get_attachment_image_src( $args['background_image'], 'full' );
		    } else {
		    	$url = false;
		    }
		    if($url == false ) {
		        $attributes['style'] .= 'background-image: url(' . $args['background_image_url'] . ');';
		    } else {
		        $attributes['style'] .= 'background-image: url(' . $url[0] . ');';
		    }
	      	if(!empty($args['background_image_style'])) {
	            switch( $args['background_image_style'] ) {
	              	case 'no-repeat':
	                	$attributes['style'] .= 'background-repeat: no-repeat;';
	                break;
	              	case 'repeat':
	                	$attributes['style'] .= 'background-repeat: repeat;';
	                break;
	              	case 'repeat-x':
	                	$attributes['style'] .= 'background-repeat: repeat-x;';
	                break;
	              	case 'repeat-y':
	                	$attributes['style'] .= 'background-repeat: repeat-y;';
	                break;
	                case 'contain':
	                	$attributes['style'] .= 'background-repeat: no-repeat;';
	                	$attributes['style'] .= 'background-size: contain;';
	                break;
	              	case 'cover':
	                	$attributes['style'] .= 'background-size: cover;';
	                break;
	              	case 'parallax':
	                	$attributes['class'][] .= 'kt-parallax-stellar';
	                	$attributes['data-ktstellar-background-ratio'] = '0.5';
	                break;
	            }
	        }
	  	}
	  	if( (!empty( $args['row_stretch']) && $args['row_stretch'] == 'full') || (!empty( $args['row_stretch']) && $args['row_stretch'] == 'full-stretched' )  ) {
	    	//$attributes['style'] .= 'visibility: hidden;';
	  	}
	  	if(!empty( $args['row_stretch']) && $args['row_stretch'] == 'full') {
	    	$attributes['class'][] .= 'kt-panel-row-stretch';
	  	}
	  	if(!empty( $args['row_stretch']) && $args['row_stretch'] == 'full-stretched') {
	    	$attributes['class'][] .= 'kt-panel-row-full-stretch';
	  	}
	 	if(!empty($args['border_top'])){
	   		$attributes['style'] .= 'border-top: '.esc_attr($args['border_top']).' solid; ';
	 	}
		if(!empty($args['border_top_color'])){
	   		$attributes['style'] .= 'border-top-color: '.$args['border_top_color'].'; ';
	 	}
	 	if(!empty($args['border_bottom'])){
	   		$attributes['style'] .= 'border-bottom: '.esc_attr($args['border_bottom']).' solid; ';
	 	}
	  	if(!empty($args['border_bottom_color'])){
	   		$attributes['style'] .= 'border-bottom-color: '.$args['border_bottom_color'].'; ';
	 	}

	  	return $attributes;
	}
}
add_filter('siteorigin_panels_row_style_attributes', 'ascend_panels_row_background_styles_attributes', 10, 2);

add_filter('siteorigin_panels_row_attributes', 'ascend_panels_row_attributes', 10, 3);
function ascend_panels_row_attributes($attributes, $panelsdata) {
	if(isset($panelsdata['style']['row_separator']) && !empty($panelsdata['style']['row_separator']) && $panelsdata['style']['row_separator'] != 'none') {
		$attributes['data-id'] = $attributes['id'];
		$attributes['id'] = 'sep-'.$attributes['id'];
	}
	return $attributes;
}
add_filter('siteorigin_panels_before_row', 'ascend_panels_separator', 10, 3);
function ascend_panels_separator($content, $panelsdata, $attributes) {
	if(isset($panelsdata['style']['row_separator']) && !empty($panelsdata['style']['row_separator']) && $panelsdata['style']['row_separator'] != 'none') {
		$att = ascend_panels_row_background_styles_sep(null, $panelsdata['style']);
		$content =  '<div ';
		foreach ( $attributes as $name => $value ) {
			if($name == 'id') {
				$content .= $name.'="'.esc_attr($attributes['data-id']).'" ';
			} else {
				$content .= $name.'="'.esc_attr($value).'" ';
			}
		}
		$content .= '>';
		$content .=  '<div ';
		foreach ( $att as $name => $value ) {
				$content .= $name.'="'.esc_attr($value).'" ';
		}
		$content .= '>';
		$content .=  '<div class="inner-sep-content-wrap">';
	}
	return $content;
}
add_filter('siteorigin_panels_after_row', 'ascend_panels_separator_after', 10, 3);
function ascend_panels_separator_after($content, $panelsdata, $attributes) {
	if(isset($panelsdata['style']['row_separator']) && !empty($panelsdata['style']['row_separator']) && $panelsdata['style']['row_separator'] != 'none') {
		if(isset($panelsdata['style']['next_row_background_color']) && !empty($panelsdata['style']['next_row_background_color']) ) {
			$fill = $panelsdata['style']['next_row_background_color'];
		} else {
			$fill = '#fff';
		}
		if(isset($panelsdata['style']['row_stretch']) && !empty($panelsdata['style']['row_stretch']) ) {
			$class = 'siteorigin-panels-stretch';
		} else {
			$class = '';
		}
		if($panelsdata['style']['row_separator'] == 'center_triangle') {
			$svg = '<svg style="fill:'.esc_attr($fill).';" viewBox="0 0 100 100" preserveAspectRatio="none"><path class="large-center-triangle" d="M0 0 L50 90 L100 0 V100 H0"/></svg>';
		} else if($panelsdata['style']['row_separator'] == 'center_triangle_double') {
			$svg = '<svg style="fill:'.esc_attr($fill).';" viewBox="0 0 100 100" preserveAspectRatio="none"><path class="large-center-triangle" d="M0 0 L50 90 L100 0 V100 H0"/><path class="second-large-center-triangle" d="M0 40 L50 90 L100 40 V100 H0"/></svg>';
		} else if($panelsdata['style']['row_separator'] == 'center_small_triangle') {
			if(isset($panelsdata['style']['background']) && !empty($panelsdata['style']['background']) ) {
				$background = $panelsdata['style']['background'];
			} else {
				$background = '#fff';
			}
			$svg = '<div class="sep-triangle-bottom" style="border-top-color:'.$background.'"></div>';
		} else if($panelsdata['style']['row_separator'] == 'three_small_triangle') {
			if(isset($panelsdata['style']['background']) && !empty($panelsdata['style']['background']) ) {
				$background = $panelsdata['style']['background'];
			} else {
				$background = '#fff';
			}
			$svg = '<div class="sep-triangle-bottom left-small" style="border-top-color:'.$background.'"></div><div class="sep-triangle-bottom" style="border-top-color:'.$background.'"></div><div class="sep-triangle-bottom right-small" style="border-top-color:'.$background.'"></div>';
		} else if($panelsdata['style']['row_separator'] == 'left_triangle') {
			$svg = '<svg style="fill:'.esc_attr($fill).';" viewBox="0 0 2000 100" preserveAspectRatio="none"><polygon xmlns="http://www.w3.org/2000/svg" points="600,90 0,0 0,100 2000,100 2000,0 "></polygon></svg>';
		} else if($panelsdata['style']['row_separator'] == 'right_triangle') {
			$svg = '<svg style="fill:'.esc_attr($fill).';" viewBox="0 0 2000 100" preserveAspectRatio="none"><polygon xmlns="http://www.w3.org/2000/svg" points="600,90 0,0 0,100 2000,100 2000,0 "></polygon></svg>';
		} else if($panelsdata['style']['row_separator'] == 'tilt_right' || $panelsdata['style']['row_separator'] == 'tilt_left') {
			$svg = '<svg style="fill:'.esc_attr($fill).';" viewBox="0 0 100 100" preserveAspectRatio="none"><path class="large-angle" d="M0 0 L100 90 L100 0 V100 H0"/></svg>';
		}
		
			$content .= '<div class="panel-row-style kt-row-style-no-padding kt_sep_panel sep_'.esc_attr($panelsdata['style']['row_separator']).' '.esc_attr($class).'" data-stretch-type="full-stretched">';
				$content .= $svg;
			$content .= '</div>';
		$content .= '</div>';
		$content .= '</div>';
		$content .= '</div>';
	}
	return $content;
}

add_filter( 'siteorigin_premium_upgrade_teaser', 'ascend_siteorigin_panels_update_notice'); 
function ascend_siteorigin_panels_update_notice() {
	return false;
}