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
