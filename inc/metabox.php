<?php

// Add metabox
add_action('admin_init', 'mwblog_metabox');
function mwblog_metabox(){
	add_meta_box('blog-metabox', 'Options', 'metabox_callback', 'post', 'normal');
}

// Metabox callback
function metabox_callback() {
	$videourl = get_post_meta(get_the_ID(), 'videourl', true);
	$audiourl = get_post_meta(get_the_ID(), 'audiourl', true);

	?>		
	<p>
		<label for="videourl"><?php _e('Link Video','mwblog');  ?></label><br />
		<input name="videourl" id="videourl" type="text" style="width: 60%;" value="<?php echo $videourl; ?>" />
	</p>
	<p>
		<label for="audiourl"><?php _e('Link Audio','mwblog');  ?></label><br />
		<input name="audiourl" id="audiourl" type="text" style="width: 60%;" value="<?php echo $audiourl; ?>" />
	</p>
	
	<?php
}

// Action when save post
add_action('save_post', 'admin_save_team');
function admin_save_team($post_id){
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
		return;
	if( isset($_POST['post_type']) && 'post' == $_POST['post_type'] ){
		if( isset($_POST['videourl']) ){
			update_post_meta($post_id, 'videourl', $_POST['videourl']);
		}
		if( isset($_POST['audiourl']) ){
			update_post_meta($post_id, 'audiourl', $_POST['audiourl']);
		}
	}
}
?>