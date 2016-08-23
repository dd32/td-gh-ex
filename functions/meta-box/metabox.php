<?php
//code for the meta data...

add_action('admin_init','my_meta_init');

function my_meta_init()
{
	foreach ( array( 'post' , 'page' ) as $type) 
	{
		add_meta_box('my_all_meta', 'Banner Settings', 'my_meta_banner', $type, 'normal', 'high');
	}
					
	add_action('save_post','my_meta_save');
}

// code for banner description
function my_meta_banner()
{
	global $post;
					
	$meta = get_post_meta($post->ID,'_my_meta',TRUE); 
	?>
	
	<p><label><?php _e('Enable Banner','spasalon');?></label></p>
	<p><input type="checkbox" style="padding: 10px;" name="_my_meta[banner_enable]"<?php if((isset($meta['banner_enable']))==true) echo 'checked'; ?> /></p>
					
	<p><label><?php _e('Banner Description','spasalon');?></label></p>
	<p><textarea style="width:100%; height:100px;padding: 10px;" placeholder="Enter banner description" name="_my_meta[banner_description]" rows="3" cols="10" ><?php if(!empty($meta['banner_description'])) echo $meta['banner_description']; ?></textarea></p>	
					
	<p><label><?php _e('Banner Heading One','spasalon');?></label></p>
	<p><input  name="_my_meta[heading_one]" placeholder="Enter text for banner heading one" type="text" value="<?php if(!empty($meta['heading_one'])) echo $meta['heading_one']; ?>"> </input></p>	
					
	<p><label><?php _e('Banner Heading Two','spasalon');?></label></p>
	<p><input  name="_my_meta[heading_two]" placeholder="Enter text for banner heading two" type="text" value="<?php if(!empty($meta['heading_two'])) echo $meta['heading_two']; ?>"></input></p>	
	
<?php
}
//end of banne description
				
function my_meta_save($post_id) 
{
	if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;
	
	if ( ! current_user_can( 'edit_page', $post_id ) )
	{     return ;	} 

	if(isset($_POST['post_ID']))
	{
		$post_ID   = $_POST['post_ID'];				
		$post_type = get_post_type($post_ID);
		
	if($post_type=='post'){
			update_post_meta($post_ID,'_my_meta',$_POST['_my_meta']);
		}
		else{
			update_post_meta($post_ID,'_my_meta',$_POST['_my_meta']);
		}
		
	}
}