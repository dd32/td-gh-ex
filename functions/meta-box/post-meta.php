<?php
/************ Home slider meta post ****************/
add_action('admin_init','quality_init');
function quality_init()
	{
		
		add_meta_box('quality_page', 'Page Info', 'page_layout_meta', 'page', 'normal', 'high');
		add_meta_box('quality_post', 'Post Info', 'post_layout_meta', 'post', 'normal', 'high');		
		add_action('save_post','quality_meta_save');
	}	
	function post_layout_meta()
	{
		global $post ;
		$post_description =sanitize_text_field( get_post_meta( get_the_ID(), 'post_description', true )); 
		?>
		<p><label><?php _e('Post Description','quality');?></label></p> 
		<p><input class="inputwidth"  name="post_description" id="post_description" style="width: 480px" placeholder="Enter post description " type="text" value="<?php if (!empty($post_description)) echo esc_attr($post_description);?>"></input></p>					
		<?php
	}
	function page_layout_meta()
	{
		global $post ;
		$page_description =sanitize_text_field( get_post_meta( get_the_ID(), 'page_description', true ));		
		?>
		<p><label><?php _e('Page Description','quality');?></label></p> 
		<p><input class="inputwidth"  name="page_description" id="page_description" style="width: 480px" placeholder="Enter page description " type="text" value="<?php if (!empty($page_description)) echo esc_attr($page_description);?>"> </input></p>		
		<?php
	}
	
function quality_meta_save($post_id) 
{	
	if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;
		
	if ( ! current_user_can( 'edit_page', $post_id ) )
	{     return ;	} 		
	if(isset($_POST['post_ID']))
	{ 	
		$post_ID = $_POST['post_ID'];				
		$post_type=get_post_type($post_ID);			
				
		if($post_type=='page'){
			update_post_meta($post_ID, 'page_description', sanitize_text_field($_POST['page_description']));			
		}
		elseif($post_type=='post'){	
			update_post_meta($post_ID, 'post_description', sanitize_text_field($_POST['post_description']));			
		}
	}			
} 
?>