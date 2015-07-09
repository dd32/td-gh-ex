<?php
//Inserts custom metabox as per the theme's features
add_action('add_meta_boxes', 'cpotheme_theme_metabox');
function cpotheme_theme_metabox(){
	add_meta_box('cpotheme_pages', __('Post Options', 'cpotheme'), 'cpotheme_theme_metabox_posts', 'post', 'normal', 'high');
	add_meta_box('cpotheme_pages', __('Page Options', 'cpotheme'), 'cpotheme_theme_metabox_pages', 'page', 'normal', 'high');
}


function cpotheme_theme_metabox_posts($post){
	cpotheme_meta_fields($post, cpotheme_metadata_featured_pages());
}
add_action('edit_post', 'cpotheme_theme_metabox_posts_save');
function cpotheme_theme_metabox_posts_save($post){
	cpotheme_meta_save(cpotheme_metadata_featured_pages());
}


function cpotheme_theme_metabox_pages($post){
	cpotheme_meta_fields($post, cpotheme_metadata_featured_pages());
}
add_action('edit_post', 'cpotheme_theme_metabox_pages_save');
function cpotheme_theme_metabox_pages_save($post){
	cpotheme_meta_save(cpotheme_metadata_featured_pages());
}


//Create page meta fields
function cpotheme_metadata_featured_pages(){

	$cpotheme_data = array();
	
	$cpotheme_data[] = array(
	'name' => 'page_featured',
	'std'  => '',
	'label' => __('Featured Item', 'cpotheme'),
	'desc' => __('Specifies whether this item is featured in the homepage.', 'cpotheme').' <b>'.sprintf(__('This option is now obsolete. To control the slider and homepage features, please install the %s plugin and use the Slides and Features section in the admin menu.', 'cpotheme'), '<a href="//wordpress.org/plugins/cpo-content-types" target="_blank">CPO Content Types</a>').'</b>',
	'type' => 'select',
	'option' => cpotheme_metadata_featureditem());
	
	return $cpotheme_data;
}


function cpotheme_metadata_featureditem(){
	$cpotheme_data = array(
	'none' => __('None', 'cpotheme'),
	'slider' => __('In The Homepage Slider', 'cpotheme'),
	'features' => __('In The Homepage Boxes', 'cpotheme'));
	return $cpotheme_data;
}