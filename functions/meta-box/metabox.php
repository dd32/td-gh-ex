<?php
//code for the meta data...

add_action('admin_init','my_meta_init');

function my_meta_init()
{
	foreach ( array( 'post' , 'page' ) as $type) 
	{
		add_meta_box('my_all_meta', 'Description', 'my_meta_banner', $type, 'normal', 'high');
	}
					
	add_meta_box('my_all_meta', 'Description', 'my_meta_link_slider','spa_slider', 'normal', 'high');
	add_meta_box('my_all_meta', 'Description', 'my_meta_product','spa_products', 'normal', 'high');
	add_meta_box('my_all_meta', 'Description', 'my_meta_services','spa_services', 'normal', 'high');
	add_meta_box('my_all_meta', 'Description', 'my_meta_team','spa_team', 'normal', 'high');
	
	add_action('save_post','my_meta_save');
}
				
// code for banner description
function my_meta_banner()
{
	global $post ;
					
	$meta = get_post_meta($post->ID,'_my_meta',TRUE); ?>
	
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
				
function my_meta_link_slider() { 
				
	global $post ;
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
	
	<p><label><?php _e('Slide Link','spasalon');?></label></p>
	<p><input  name="_my_meta[link]" placeholder="Enter The Link URL text for Slide Image" type="text" value="<?php if(!empty($meta['link'])) echo $meta['link'];?>"></input>&nbsp;<?php _e('Use Proper http:// formate','spasalon'); ?></p>
				
	<p> <input name="_my_meta[check]" type="checkbox" id="_my_meta[check]" <?php if(!empty($meta['check'])) echo "checked"; ?> > </input>
	<label> <?php _e('Open link in a new window/tab','spasalon'); ?> </label> </p>
	
<?php
}
				
				
function my_meta_product()
{
	global $post;
	
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);
?>
	
	<p><label><?php _e('Product detail','spasalon');?></label></p>
	<p><textarea style="width:100%; height:100px;padding: 10px;" placeholder="Enter product description" name="_my_meta[description]" rows="3" cols="10" ><?php if(!empty($meta['description'])) echo $meta['description']; ?></textarea></p>
				
	<p><label><?php _e('Price','spasalon');?></label></p>
	<p><input  name="_my_meta[price]" placeholder="$320.00" type="text" value="<?php if(!empty($meta['price'])) echo $meta['price']; ?>"> </input></p>	
	
	<p><label><?php _e('Enable Banner','spasalon');?></label></p>
	<p><input type="checkbox" style="padding: 10px;" name="_my_meta[banner_enable]"<?php if((isset($meta['banner_enable']))==true) echo 'checked'; ?> /></p>
	
	<p><label><?php _e('Banner Description','spasalon');?></label></p>
	<p><textarea style="width:100%; height:100px;padding: 10px;" placeholder="Enter product banner description" name="_my_meta[banner_description]" rows="3" cols="10" ><?php if(!empty($meta['banner_description'])) echo $meta['banner_description']; ?></textarea></p>
	
	<p><label><?php _e('Banner Heading One','spasalon');?></label></p>
	<p><input  name="_my_meta[heading_one]" placeholder="Enter text for product banner heading one" type="text" value="<?php if(!empty($meta['heading_two'])) echo $meta['heading_one']; ?>"> </input></p>	
	
	<p><label><?php _e('Banner Heading Two','spasalon');?></label></p>
	<p><input  name="_my_meta[heading_two]" placeholder="Enter text for product banner heading two" type="text" value="<?php if(!empty($meta['heading_two'])) echo $meta['heading_two']; ?>"> </input></p>
	
	<p><label><?php _e('Product Link','spasalon');?></label></p>
	<p><input  name="_my_meta[link]" placeholder="Enter The Link URL text for Product Image" type="text" value="<?php if(!empty($meta['link'])) echo $meta['link'];?>">&nbsp;</input><?php _e('Use Proper http:// formate','spasalon'); ?></p>
				
	<p> <input name="_my_meta[check]" type="checkbox" id="_my_meta[check]" <?php if(!empty($meta['check'])) echo "checked"; ?> > </input>
	<label> <?php _e('Open link in a new window/tab','spasalon'); ?> </label> </p>
<?php 
}
				
function my_meta_services()
{
	global $post;
	
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);
?>
	<p><label><?php _e('Enable Banner','spasalon');?></label></p>
	<p><input type="checkbox" style="padding: 10px;" name="_my_meta[banner_enable]"<?php if((isset($meta['banner_enable']))==true) echo 'checked'; ?> /></p>
	
	<p><label><?php _e('Banner Description','spasalon');?></label></p>
	<p><textarea style="width:100%; height:100px;padding: 10px;" placeholder="Enter product banner description" name="_my_meta[banner_description]" rows="3" cols="10" ><?php if(!empty($meta['banner_description'])) echo $meta['banner_description']; ?></textarea></p>	
					
	<p><label><?php _e('Banner Heading One','spasalon');?></label></p>
	<p><input  name="_my_meta[heading_one]" placeholder="Enter text for product banner heading one" type="text" value="<?php if(!empty($meta['heading_two'])) echo $meta['heading_one']; ?>"> </input></p>	
					
	<p><label><?php _e('Banner Heading Two','spasalon');?></label></p>
	<p><input  name="_my_meta[heading_two]" placeholder="Enter text for product banner heading two" type="text" value="<?php if(!empty($meta['heading_two'])) echo $meta['heading_two']; ?>"> </input></p>
					
	<p><label><?php _e('Service Link','spasalon');?></label></p>
	<p><input  name="_my_meta[link]" placeholder="Enter The Link URL text for Service" type="text" value="<?php if(!empty($meta['link'])) echo $meta['link'];?>">&nbsp;</input><?php _e('Use Proper http:// formate','spasalon'); ?></p>
	<p> <input name="_my_meta[check]" type="checkbox" id="_my_meta[check]" <?php if(!empty($meta['check'])) echo "checked"; ?> > </input>
	<label><?php _e('Open link in a new window/tab','spasalon'); ?> </label> </p>
<?php 	
}
				
function my_meta_team()
{
	global $post;
	$meta = get_post_meta($post->ID,'_my_meta',TRUE);
?>
	<p><label><?php _e('Designation','spasalon');?></label></p>
	<p><input style="width:100%; height:40px;padding: 10px;" name="_my_meta[Designation]" type="text" tabindex="1" value="<?php if(!empty($meta['Designation'])) echo $meta['Designation']; ?>"> </input></p>
					
	<p><label><?php _e('Description','spasalon');?> </label></p>
	<p><textarea style="width:100%; height:100px;padding: 10px;" tabindex="2" name="_my_meta[description]" rows="3" ><?php if(!empty($meta['description'])) echo $meta['description']; ?></textarea></p>
	</br>
					
	<h3 class="hndle"><span><?php _e('Social Media Setting','spasalon');?></span></h3>
	<p><h4> <label><?php _e('Facebook','spasalon');?></label></h4>
	<input style="width:80%; height:40px;padding: 10px;" type="text" tabindex="3" name="_my_meta[facebook_url]" placeholder="Enter Your Fb's URL in https formate" value="<?php if(!empty($meta['facebook_url'])) echo $meta['facebook_url']; ?>"/>
	<input type="checkbox" style="margin: 10px;" name="_my_meta[facebook_chkbx]" value="1"<?php if(isset($meta['facebook_chkbx'])) checked($meta['facebook_chkbx'],'1') ; ?> /></p>
					
	<h4><?php _e('Twitter Url','spasalon')?></h4>
					 
	<p><input style="width:80%; height:40px;padding: 10px;" type="text" tabindex="4" name="_my_meta[twitter_url]" placeholder="Enter Your Twitter's URL in https formate"  value="<?php if(!empty($meta['twitter_url'])) echo $meta['twitter_url']; ?>"/>
					
	<input type="checkbox" style="margin: 10px;" name="_my_meta[twitter_chkbx]" value="1"<?php if(isset($meta['twitter_chkbx'])) checked($meta['twitter_chkbx'],'1') ; ?> /></p>
					
	<p><h4> <label><?php _e('Google Url','spasalon');?></label>	</h4>
	<input style="width:80%; height:40px;padding: 10px;" type="text" tabindex="5" name="_my_meta[google_url]" placeholder="Enter Your Google's URL in https formate" value="<?php if(!empty($meta['google_url'])) echo $meta['google_url']; ?>"/>
	<input type="checkbox" style="margin: 10px;" name="_my_meta[google_chkbx]" value="1" <?php if(isset($meta['google_chkbx'])) checked($meta['google_chkbx'],'1') ; ?> /></p>			
<?php  	
}
  
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
		
		update_post_meta($post_ID,'_my_meta',$_POST['_my_meta']);
	}
}