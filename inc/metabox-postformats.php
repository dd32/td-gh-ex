<?php
	
	/**
		Post Formats - Metaboxes
	*
	*/
	
	
	add_filter( 'rwmb_meta_boxes', 'anorya_metaboxes' );
	
	function anorya_metaboxes( $metaboxes ){

	
		// Gallery Metabox
		$metaboxes[] = array(
			'id'         => 'anorya_gallery',
			'title'      => esc_html__( 'Gallery', 'anorya' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				array(
					'name'             => esc_html__( 'Upload  Images', 'anorya' ),
					'id'               => "anorya_g",
					'type'             => 'image_advanced',
					'max_file_uploads' => 10,
				),
			)
		);

		// Video Metabox
		$metaboxes[] = array(
			'id'         => 'anorya_video_url',
			'title'      => esc_html__( 'Video Post', 'anorya' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				// TEXTAREA
				array(
					'name' => esc_html__( 'Your Video Embed Code:', 'anorya' ),
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
			'title'      => esc_html__( 'Audio Post', 'anorya' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'autosave'   => true,
			'fields'     => array(
				// TEXTAREA
				array(
					'name' => esc_html__( 'Your Audio Embed Code:', 'anorya' ),
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