<?php

/* Button */

function ig_shortcodes_button($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'url' => '', 
		'icon' => '',
		'label' => '', 
		'colour' => '', 
		'colour_custom' => '', 
		'size' => 'medium', 
		'edge' => 'straight', 
		'target' => '_self'
	), $atts));
	
	/* Return Button */
	$button_style = "";
	if($colour_custom) {
		$button_style = ' style="background-color: '.$colour_custom.'"';
	}
	if($icon) {
		$icon = '<i class="fa-icon-'.$icon.'"></i>&nbsp;&nbsp;';
	}
	return '<a href="'.$url.'" class="ig-shortcode ig-shortcode-button ig-shortcode-button-colour-'.$colour.' ig-shortcode-button-size-'.$size.' ig-shortcode-button-edge-'.$edge.'" target="'.$target.'"'.$button_style.'>'.$icon.$label.'</a>';
	
}
add_shortcode('ig_button', 'ig_shortcodes_button');


/* Columns */

function ig_shortcodes_columns($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'structure' => '50|50'
	), $atts));
	
	$structure_class = str_replace('|', '-', $structure);
	$structure_class = str_replace('50', 'half', $structure_class);
	$structure_class = str_replace('33', 'third', $structure_class);
	$structure_class = str_replace('67', 'twothirds', $structure_class);
	$structure_class = str_replace('25', 'quarter', $structure_class);
	
	$structure_class = ' ig-shortcode-cols-'.$structure_class.' ';

	/* Return Columns */
	return '<div class="ig-shortcode ig-shortcode-cols '.$structure_class.'">'.do_shortcode($content).'</div>';
	 
}
add_shortcode('ig_columns', 'ig_shortcodes_columns');



/* Column */

function ig_shortcodes_column($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'position' => 'a'
	), $atts));
	
	return '<div class="ig-shortcode ig-shortcode-col ig-shortcode-col-'.$position.'"><div class="ig-shortcode-col-inner">'.wpautop(do_shortcode($content)).'</div></div>';

}
add_shortcode('ig_col', 'ig_shortcodes_column');



/* Social */

function ig_social($atts, $content = null) {
	
	/* Return Social */
	return '<p class="ig-shortcode ig-shortcode-social-links">'.do_shortcode($content).'</p>';
	 
}
add_shortcode('ig_social', 'ig_social');


/* Social Link */

function ig_social_link($atts, $content = null) {
	
	/* Set up variables */
	extract(shortcode_atts(array(
		'service' => '',
		'link' => ''
	), $atts));
	
	if(strpos($service, 'ja-social-icon-') !== false) {
		
		$social_link_code = '<a href="'.$link.'" target="_blank" class="ja-social-icon '.$service.'"></a>';
	}

	/* Return Social */
	return $social_link_code;
	 
}
add_shortcode('ig_social_link', 'ig_social_link');


/* Toggles */

function ig_shortcodes_toggle($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'heading' => '',
		'icon' => '',
		'accordion' => '',
		'onload' => 'closed'
	), $atts));
	if($onload == "open") { $active_class = "ig-shortcode-toggle-active"; } else { $active_class = ""; }
	if($icon) { $icon_code = '<i class="fa-icon-'.$icon.'"></i>'; } else { $icon_code = ''; }
	if($accordion == 1) {
		$toggle_icons = '<i class="toggle-down fa-icon-plus"></i><i class="toggle-up fa-icon-minus"></i>';
	} else {
		$toggle_icons = '<i class="toggle-down fa-icon-caret-down"></i><i class="toggle-up fa-icon-caret-up"></i>';
	}
	
	return '<div class="ig-shortcode ig-shortcode-toggle '.$active_class.'"><h3 class="ig-shortcode ig-shortcode-toggle-heading">'.$icon_code.$heading.$toggle_icons.'</h3><div class="ig-shortcode ig-shortcode-toggle-content"><p>'.do_shortcode($content).'</p></div></div>';

}
add_shortcode('ig_toggle', 'ig_shortcodes_toggle');



/* Accordion */

function ig_shortcodes_accordion($atts, $content = null) {

	/* Return Toggles */
	return '<div class="ig-shortcode ig-shortcode-accordion"><p>'.do_shortcode($content).'</p></div>';
	
}
add_shortcode('ig_accordion', 'ig_shortcodes_accordion');



/* Tabs */

function ig_shortcodes_tabs($atts, $content = null) {
	/* Return Tabs */
	return '<div class="ig-shortcode ig-shortcode-tabs">'.do_shortcode($content).'</div>';
}
add_shortcode('ig_tabs', 'ig_shortcodes_tabs');


/* Tab */

function ig_shortcodes_tab($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'label' => ''
	), $atts));
		
	return '<div class="ig-shortcode ig-shortcode-tabpane"><div class="ig-shortcode ig-shortcode-tab-label">'.$label.'</div>'.wpautop(do_shortcode($content)).'</div>';

}
add_shortcode('ig_tab', 'ig_shortcodes_tab');

/* Alert Box */

function ig_shortcodes_alertbox($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'icon' => '',
		'colour' => '', 
		'custom_colour' => ''
	), $atts));
	
	
	$alertbox_style = "";
	if($custom_colour) {
		$alertbox_style = ' style="background-color: '.$custom_colour.'"';
	}
	if($icon) { $icon_code = '<i class="fa-icon-'.$icon.'"></i>'; } else { $icon_code = ''; }
	
	return '<div class="ig-shortcode ig-shortcode-alertbox ig-shortcode-alertbox-colour-'.$colour.'"'.$alertbox_style.'><p class="ig-shortcode ig-shortcode-alertbox-content">'.$icon_code.do_shortcode($content).'</p></div>';

}
add_shortcode('ig_alertbox', 'ig_shortcodes_alertbox');


/* Pull Quote Left */

function ig_shortcodes_pullleft($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'text' => '',
		'colour' => '', 
		'colour_custom' => ''
	), $atts));
	
	
	$pullleft_style = "";
	if($colour_custom) {
		$pullleft_style = ' style="color: '.$colour_custom.'"';
	}
	
	return '<div class="ig-shortcode ig-shortcode-pullleft ig-shortcode-pullleft-colour-'.$colour.'"'.$pullleft_style.'>'.$text.'</div>';

}
add_shortcode('ig_pullleft', 'ig_shortcodes_pullleft');


/* Pull Quote Right */

function ig_shortcodes_pullright($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'text' => '',
		'colour' => '', 
		'colour_custom' => ''
	), $atts));
	
	
	$pullright_style = "";
	if($colour_custom) {
		$pullright_style = ' style="color: '.$colour_custom.'"';
	}
	
	return '<div class="ig-shortcode ig-shortcode-pullright ig-shortcode-pullright-colour-'.$colour.'"'.$pullright_style.'>'.$text.'</div>';

}
add_shortcode('ig_pullright', 'ig_shortcodes_pullright');


/*
 * List
 */

function ig_shortcodes_list($atts, $content = null) {

/* Set up variables */
	extract(shortcode_atts(array(
		'icon' => '',
		'colour' => '', 
		'custom_colour' => ''
	), $atts));
	$list_style = "";
	if($custom_colour) {
		$list_style = ' style="color: '.$custom_colour.'"';
	}
	if($icon) { $icon_code = '<i class="fa-icon-'.$icon.' fa-icon-'.$colour.'" '.$list_style.'></i>&nbsp;'; } else { $icon_code = ''; }
	$content=str_ireplace('*','<li class="ig-shortcode ig-shortcode-list-content">' . $icon_code , $content);
	return '<ul class="ig-shortcode ig-shortcode-list">' . do_shortcode($content) . '</li>'.'</ul>';
}
add_shortcode('ig_list', 'ig_shortcodes_list');

/*
 * Box features
 */
function ig_shortcodes_features($atts, $content = null) {

	/* Set up variables */
	extract(shortcode_atts(array(
		'url'=> '',
		'title' => '',
		'icon' => '',
		'custom_colour' => ''
	), $atts));
	
	$features_style = "";
	if($custom_colour) {
		$features_style = 'style="color: '.$custom_colour.'"';
	}
	if($url) { $features_url = '<a href="'.$url.'" " target="_blank"><h3 class="title-features">'.$title.'</h3></a>'; } else {$features_url = '<h3 class="title-features">'.$title.'</h3>'; }
	
	if($icon) { $icon_code = '<span class="features-icon"><i class="fa-icon-3x fa-icon-'.$icon.'"'.$features_style.'></i></span>'; } else { $icon_code = ''; }
	
	return '<div class="ig-shortcode ig-shortcode-featurs">'.$icon_code.$features_url.do_shortcode($content).'</div>';
}
add_shortcode('ig_features', 'ig_shortcodes_features');