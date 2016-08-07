<?php

/**
 * Calls the class on the post edit screen.
 */
function Avata_call_metaboxClass() {
    new Avata_metaboxClass();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'Avata_call_metaboxClass' );
    add_action( 'load-post-new.php', 'Avata_call_metaboxClass' );
}

/** 
 * The Class.
 */
class Avata_metaboxClass {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'avata_add_meta_box' ) );
		add_action( 'save_post', array( $this, 'avata_save' ) );
	}
	/**
	 * Adds the meta box container.
	 */
	public function avata_add_meta_box( $post_type ) {
            $post_types = array( 'page');     //limit meta box to certain post types
            if ( in_array( $post_type, $post_types )) {
		add_meta_box(
			'some_meta_box_name'
			,__( 'Avata Metabox Options', 'avata' )
			,array( $this, 'avata_render_meta_box_content' )
			,$post_type
			,'advanced'
			,'high'
		);
            }
	}

  
	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function avata_save( $post_id ) {
	
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */
		

		// Check if our nonce is set.
		if ( ! isset( $_POST['avata_inner_custom_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['avata_inner_custom_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'avata_inner_custom_box' ) )
			return $post_id;
			
			

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}


		/* OK, its safe for us to save the data now. */


		if( isset($_POST) && $_POST ){
			
			
		$post_metas                      = array();
		$post_metas['full_width']        =  isset($_POST['full_width'])?sanitize_text_field($_POST['full_width']):'0';
		$post_metas['padding_top']       =  isset($_POST['padding_top'])?sanitize_text_field($_POST['padding_top']):'';
		$post_metas['padding_bottom']    =  isset($_POST['padding_bottom'])?sanitize_text_field($_POST['padding_bottom']):'';
		$post_metas['display_title_bar'] =  isset($_POST['display_title_bar'])?sanitize_text_field($_POST['display_title_bar']):'1';
		$post_metas['nav_menu']          =  isset($_POST['nav_menu'])?sanitize_text_field($_POST['nav_menu']):'';
		$post_metas['page_layout']       =  isset($_POST['page_layout'])?sanitize_text_field($_POST['page_layout']):'none';
		$post_metas['left_sidebar']      =  isset($_POST['left_sidebar'])?sanitize_text_field($_POST['left_sidebar']):'';
		$post_metas['right_sidebar']     =  isset($_POST['right_sidebar'])?sanitize_text_field($_POST['right_sidebar']):'';
		$post_metas['header_overlay']     =  isset($_POST['header_overlay'])?sanitize_text_field($_POST['header_overlay']):'0';
			 
		$avata_post_meta = json_encode( $post_metas );
		// Update the meta field.
		update_post_meta( $post_id, '_avata_post_meta', $avata_post_meta );
		}

	
	}


	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function avata_render_meta_box_content( $post ) {
	
	   global $wp_registered_sidebars;
	
	   
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'avata_inner_custom_box', 'avata_inner_custom_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
	    $avata_page_meta  = get_post_meta( $post->ID ,'_avata_post_meta',true);
		if( $avata_page_meta  ){
		$avata_page_metas = @json_decode( $avata_page_meta,true );
		if( is_array($avata_page_metas) && $avata_page_metas !=null )
	      extract( $avata_page_metas );
		}
	
		/************ get nav menus*************/
		
		$nav_menus[] = array(
            'label'       => __( 'Default', 'avata' ),
            'value'       => ''
          );
		$menus = get_registered_nav_menus();
		
		foreach ( $menus as $location => $description ) {
		$nav_menus[] = array(
					'label'       => $description,
					'value'       => $location
				  );
			
		}
		
		/* sidebars */

	  $avata_sidebars[] = array(
				  'label'       => __( 'Default', 'avata' ),
				  'value'       => ''
				);
	  
	  foreach( $wp_registered_sidebars as $key => $value){
		  
		  $avata_sidebars[] = array(
				  'label'       => $value['name'],
				  'value'       => $value['id'],
				);
		  }
		  
		  $full_width      = isset( $full_width )?esc_attr($full_width):'no';
		  $padding_top     = isset( $padding_top )?esc_attr($padding_top):'50px';
		  $padding_bottom  = isset( $padding_bottom )?esc_attr($padding_bottom):'50px';
		  $display_title_bar = isset( $display_title_bar )?esc_attr($display_title_bar):'1';
		  $page_layout     = isset( $page_layout )?esc_attr($page_layout):'none';
	      $header_overlay  = isset( $header_overlay )?esc_attr($header_overlay):'0';
		
		echo '<p class="meta-options"><label for="header_overlay"  style="display: inline-block;width: 150px;">';
		_e( 'Header Overlay', 'avata' );
		echo '</label> ';
		echo '<select name="header_overlay" id="header_overlay">
		<option '.selected($header_overlay,'0',false).' value="0">'.__("No","avata").'</option>
		<option '.selected($header_overlay,'1',false).' value="1">'.__("Yes","avata").'</option>
		</select></p>';
		
		
		echo '<p class="meta-options"><label for="full_width"  style="display: inline-block;width: 150px;">';
		_e( 'Content Full Width', 'avata' );
		echo '</label> ';
		echo '<select name="full_width" id="full_width">
		<option '.selected($full_width,'0',false).' value="0">'.__("No","avata").'</option>
		<option '.selected($full_width,'1',false).' value="1">'.__("Yes","avata").'</option>
		</select></p>';
		
		
		echo '<p class="meta-options"><label for="padding_top"  style="display: inline-block;width: 150px;">';
		_e( 'Padding Top', 'avata' );
		echo '</label> ';
		echo '<input name="padding_top" id="padding_top" value="'.$padding_top.'" type="text" />';
		echo '</p>';
		
		echo '<p class="meta-options"><label for="padding_bottom"  style="display: inline-block;width: 150px;">';
		_e( 'Padding Bottom', 'avata' );
		echo '</label> ';
		echo '<input name="padding_bottom" id="padding_bottom" value="'.$padding_bottom.'" type="text" />';
		echo '</p>';
		
		echo '<p class="meta-options"><label for="display_title_bar"  style="display: inline-block;width: 150px;">';
		_e( 'Display Title Bar', 'avata' );
		echo '</label> ';
		echo '<select name="display_title_bar" id="display_title_bar">
		<option '.selected($display_title_bar,'1',false).' value="1">'.__("Yes","avata").'</option>
		<option '.selected($display_title_bar,'0',false).' value="0">'.__("No","avata").'</option>
		</select></p>';
		
		echo '<p class="meta-options"><label for="nav_menu"  style="display: inline-block;width: 150px;">';
		_e( 'Select Nav Menu', 'avata' );
		echo '</label> ';
		echo '<select name="nav_menu" id="nav_menu">';
		foreach( $nav_menus as $nav_menu_item ){
		echo '<option '.selected($nav_menu,$nav_menu_item['value'],false).' value="'.esc_attr($nav_menu_item['value']).'">'.esc_attr($nav_menu_item['label']).'</option>';
		}
		echo '</select></p>';
		
		echo '<p class="meta-options"><label for="page_layout"  style="display: inline-block;width: 150px;">';
		_e( 'Page Layout', 'avata' );
		echo '</label> ';
		echo '<select name="page_layout" id="page_layout">
		<option '.selected($page_layout,'none',false).' value="none">'.__("No Sidebar","avata").'</option>
		<option '.selected($page_layout,'left',false).' value="left">'.__("Left Sidebar","avata").'</option>
		<option '.selected($page_layout,'right',false).' value="right">'.__("Right Sidebar","avata").'</option>
		<option '.selected($page_layout,'both',false).' value="both">'.__("Both Sidebar","avata").'</option>
		</select></p>';
		
		
		echo '<p class="meta-options"><label for="left_sidebar"  style="display: inline-block;width: 150px;">';
		_e( 'Select Left Sidebar', 'avata' );
		echo '</label> ';
		echo '<select name="left_sidebar" id="left_sidebar">';
		foreach( $avata_sidebars as $sidebar ){
		echo '<option '.selected($left_sidebar,$sidebar['value'],false).' value="'.esc_attr($sidebar['value']).'">'.esc_attr($sidebar['label']).'</option>';
		}
		echo '</select></p>';
		
		echo '<p class="meta-options"><label for="right_sidebar"  style="display: inline-block;width: 150px;">';
		_e( 'Select Right Sidebar', 'avata' );
		echo '</label> ';
		echo '<select name="right_sidebar" id="right_sidebar">';
		foreach( $avata_sidebars as $sidebar ){
		echo '<option '.selected($right_sidebar,$sidebar['value'],false).' value="'.esc_attr($sidebar['value']).'">'.esc_attr($sidebar['label']).'</option>';
		}
		echo '</select></p>';
		
		
		
		
	}
}