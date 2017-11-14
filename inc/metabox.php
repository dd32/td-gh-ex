<?php
	
	/**
		Post Formats Metaboxes
	*
	*/
	
	
 
 	$metaboxes = array(
						'anorya_video_url' => array(
							'title' => __('Video Post', 'anorya'),
							'applicableto' => 'post',
							'location' => 'normal',
							'display_condition' => 'post-format-video',
							'priority' => 'low',
							'fields' => array('anorya_v_url' => array('title' => __('Your video:', 'anorya'),
											'type' => 'text',
											'description' => __('Your video url. Please use valid url from supported oEmbed providers.  Don\'t forget to select video post type format','anorya'),
											'size' => 60,))),
											
						'anorya_audio_url' => array(
							'title' => __('Audio Post', 'anorya'),
							'applicableto' => 'post',
							'location' => 'normal',
							'display_condition' => 'post-format-audio',
							'priority' => 'low',
							'fields' => array('anorya_a_url' => array('title' => __('Your audio:', 'anorya'),
											'type' => 'text',
											'description' => __('Your audio url. Please use valid url from supported oEmbed providers. Don\'t forget to select audio post type format','anorya'),
											'size' => 60,))),

						'anorya_gallery' => array(
							'title' => __('Gallery', 'anorya'),
							'applicableto' => 'post',
							'location' => 'normal',
							'display_condition' => 'post-format-gallery',
							'priority' => 'low',
							'fields' => array('anorya_g' => array('title' => __('Select the post gallery:', 'anorya'),
											'type' => 'anorya_custom_field',))),											
    );
 
 
 
	function anorya_code_add_post_format_metabox() {
		global $metaboxes;
 
		if ( ! empty( $metaboxes ) ) {
			foreach ( $metaboxes as $id => $metabox ) {
				add_meta_box( $id, $metabox['title'], 'show_metaboxes', $metabox['applicableto'], $metabox['location'], $metabox['priority'], $id );
			}
		}
	}
	add_action( 'admin_init', 'anorya_code_add_post_format_metabox' );
	
	function show_metaboxes( $post, $args ) {
		global $metaboxes;
 
		$custom = get_post_custom( $post->ID );
		$fields = $tabs = $metaboxes[$args['id']]['fields'];
 
		/** Nonce **/
		echo '<input type="hidden" name="post_format_meta_box_nonce" value="' . esc_attr(wp_create_nonce( basename( __FILE__ ) )) . '" />';
 
		if ( sizeof( $fields ) ) {
			foreach ( $fields as $id => $field ) {
				switch ( $field['type'] ) {
					default:
						break;
					case "text":
						echo '<p>'.esc_attr($field['description']) .'</p>';
						echo '<label for="' .esc_attr($id) . '">'.esc_attr($field['title']) . '</label>';
						echo '<input id="' . esc_attr($id) . '" type="text" name="' . esc_attr($id) . '" value="';
						if(isset($custom[$id][0])){
							echo esc_attr($custom[$id][0]);
						}	
						echo '" size="' . esc_attr($field['size']) . '" />';
						break;
					case "textarea":
						echo '<p>'.esc_attr($field['description']) .'</p>';
						echo '<textarea id="' . esc_attr($id) . '"  name="' . esc_attr($id) . '" cols="' . esc_attr($field['size']) . '">' ;
						if(isset($custom[$id][0])){
							echo esc_attr($custom[$id][0]);
						}	
						echo '</textarea>';
						break;
					case "anorya_custom_field":	
						echo '<p>'.esc_attr($field['title']) ;
						echo '<input id="' . esc_attr($id) . '" type="hidden" name="' . esc_attr($id) . '" value="';
						if(isset($custom[$id][0])){
							echo esc_attr($custom[$id][0]);
						}	
						echo '" /><a id="'.esc_attr($id).'_open" class="button button-primary button-large">'.__('Select Gallery','anorya').'</a></p>';
						break;
				}
			}
		}
	}
	
	
	
 
	function anorya_code_save_metaboxes( $post_id ) {
		global $metaboxes;
 
		// verify nonce
		if ( isset($_POST['post_format_meta_box_nonce']) && ! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename( __FILE__ ) ) )
			return $post_id;
 
		// check autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
 
		// check permissions
		if ( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ){
				return $post_id;
			}	
		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
 
		$post_type = get_post_type();
 
		// loop through fields and save the data
		foreach ( $metaboxes as $id => $metabox ) {
			// check if metabox is applicable for current post type
			if ( $metabox['applicableto'] == $post_type ) {
				$fields = $metaboxes[$id]['fields'];
 
				foreach ( $fields as $id => $field ) {
					$old = get_post_meta( $post_id, $id, true );
					if(isset($_POST[$id])){
						$new = $_POST[$id];
					}
					else{
						$new = false;
					}	
 
					if ( $new && $new != $old ) {
						update_post_meta( $post_id, $id, $new );
					}
					elseif ( '' == $new && $old || ! isset( $_POST[$id] ) ) {
						delete_post_meta( $post_id, $id, $old );
					}
				}
			}
		}
	}
	add_action( 'save_post', 'anorya_code_save_metaboxes' );
 ?>