<?php
	
	/**
		Post Formats - Metaboxes
	*
	*/
	
	
	add_filter( 'rwmb_meta_boxes', 'anorya_metaboxes' );
	
	function anorya_metaboxes( $metaboxes ){

	// Better has an underscore as last sign
	//$prefix = 'humble_';

	// Gallery Metabox
	$metaboxes[] = array(
		'id'         => 'anorya_gallery',
		'title'      => __( 'Gallery', 'anorya' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Upload  Images', 'anorya' ),
				'id'               => "anorya_g",
				'type'             => 'image_advanced',
				'max_file_uploads' => 10,
			),
		)
	);

	// Video Metabox
	$metaboxes[] = array(
		'id'         => 'anorya_video_url',
		'title'      => __( 'Video Post', 'anorya' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			// TEXTAREA
			array(
				'name' => __( 'Your Video Embed Code:', 'anorya' ),
				'id'   => "anorya_v_url",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 4,
			),
		)
	);

	// Audio Metabox
	$metaboxes[] = array(
		'id'         => 'anorya_audio_url',
		'title'      => __( 'Audio Post', 'anorya' ),
		'post_types' => array( 'post' ),
		'context'    => 'normal',
		'priority'   => 'high',
		'autosave'   => true,
		'fields'     => array(
			// TEXTAREA
			array(
				'name' => __( 'Your Audio Embed Code:', 'anorya' ),
				'id'   => "anorya_a_url",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 4,
			),
		)
	);

	

	return $metaboxes;
}
 
 	
 ?>