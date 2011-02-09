<?php
/**
 * This function generates the theme's Display Options page in Wordpress administration.
 *
 * @package WordPress
 * @subpackage Graphene
 * @since Graphene 1.0.8
*/
function graphene_options_display(){
	
	// Initialise messages array
	$errors = array();
	$messages = array();
	
	/* Check authorisation */
	$authorised = true;
	// Check nonce
	if (isset($_POST['graphene-display'])){
		if (!wp_verify_nonce($_POST['graphene-display'], 'graphene-display')) { 
			$authorised = false;
		}
		// Check permissions
		if (!current_user_can('edit_theme_options')){
			$authorised = false;
		}
	} else {
		$authorised = false;	
	}
	
	// Updates the database
	if (isset($_POST['graphene_submitted']) && $_POST['graphene_submitted'] == true) {		
		
		// Check authorisation status
		if (!$authorised){
			wp_die(__('ERROR: You are not authorised to perform that operation', 'graphene'));
		}
		
		// Process the header display options
		$light_header = (!empty($_POST['light_header'])) ? $_POST['light_header'] : false ;
		$link_header_img = (!empty($_POST['link_header_img'])) ? $_POST['link_header_img'] : false ;
		$featured_img_header = (!empty($_POST['featured_img_header'])) ? $_POST['featured_img_header'] : false ;
		$use_random_header_img = (!empty($_POST['use_random_header_img'])) ? $_POST['use_random_header_img'] : false ;
		$hide_top_bar = (!empty($_POST['hide_top_bar'])) ? $_POST['hide_top_bar'] : false ;
		$hide_feed_icon = (!empty($_POST['hide_feed_icon'])) ? $_POST['hide_feed_icon'] : false;
		$search_box_location = (!empty($_POST['search_box_location'])) ? $_POST['search_box_location'] : 'top_bar' ;
		
		// Sidebar options
		$content_sidebar_position = (!empty($_POST['content_sidebar_position'])) ? $_POST['content_sidebar_position'] : 'right' ;
		$hide_sidebar = (!empty($_POST['hide_sidebar'])) ? $_POST['hide_sidebar'] : false ;
		
		// Process the posts display options
		$posts_show_excerpt = (!empty($_POST['posts_show_excerpt'])) ? $_POST['posts_show_excerpt'] : false ;
		$hide_post_author = (!empty($_POST['hide_post_author'])) ? $_POST['hide_post_author'] : false ;
		$hide_post_date = (!empty($_POST['hide_post_date'])) ? $_POST['hide_post_date'] : false ;
        $show_post_year = (!empty($_POST['show_post_year'])) ? $_POST['show_post_year'] : false ;
		$hide_post_commentcount = (!empty($_POST['hide_post_commentcount'])) ? $_POST['hide_post_commentcount'] : false ;
		$hide_post_cat = (!empty($_POST['hide_post_cat'])) ? $_POST['hide_post_cat'] : false ;
		$hide_post_tags = (!empty($_POST['hide_post_tags'])) ? $_POST['hide_post_tags'] : false ;
		$show_post_avatar = (!empty($_POST['show_post_avatar'])) ? $_POST['show_post_avatar'] : false ;
		$show_post_author = (!empty($_POST['show_post_author'])) ? $_POST['show_post_author'] : false ;
		$show_excerpt_more = (!empty($_POST['show_excerpt_more'])) ? $_POST['show_excerpt_more'] : false ;
		
		// Process the text style options
		$header_title_font_type = (!empty($_POST['header_title_font_type'])) ? $_POST['header_title_font_type'] : false ;
		$header_title_font_size = (!empty($_POST['header_title_font_size'])) ? $_POST['header_title_font_size'] : false ;
		$header_title_font_lineheight = (!empty($_POST['header_title_font_lineheight'])) ? $_POST['header_title_font_lineheight'] : false ;
		$header_title_font_weight = (!empty($_POST['header_title_font_weight'])) ? $_POST['header_title_font_weight'] : false ;
		$header_title_font_style = (!empty($_POST['header_title_font_style'])) ? $_POST['header_title_font_style'] : false ;
		
		$header_desc_font_type = (!empty($_POST['header_desc_font_type'])) ? $_POST['header_desc_font_type'] : false ;
		$header_desc_font_size = (!empty($_POST['header_desc_font_size'])) ? $_POST['header_desc_font_size'] : false ;
		$header_desc_font_lineheight = (!empty($_POST['header_desc_font_lineheight'])) ? $_POST['header_desc_font_lineheight'] : false ;
		$header_desc_font_weight = (!empty($_POST['header_desc_font_weight'])) ? $_POST['header_desc_font_weight'] : false ;
		$header_desc_font_style = (!empty($_POST['header_desc_font_style'])) ? $_POST['header_desc_font_style'] : false ;
		
		$content_font_type = (!empty($_POST['content_font_type'])) ? $_POST['content_font_type'] : false ;
		$content_font_size = (!empty($_POST['content_font_size'])) ? $_POST['content_font_size'] : false ;
		$content_font_lineheight = (!empty($_POST['content_font_lineheight'])) ? $_POST['content_font_lineheight'] : false ;
		$content_font_colour = (!empty($_POST['content_font_colour'])) ? $_POST['content_font_colour'] : false ;
		
		$link_colour_normal = (!empty($_POST['link_colour_normal'])) ? $_POST['link_colour_normal'] : false ;
		$link_colour_visited = (!empty($_POST['link_colour_visited'])) ? $_POST['link_colour_visited'] : false ;
		$link_colour_hover = (!empty($_POST['link_colour_hover'])) ? $_POST['link_colour_hover'] : false ;
		$link_decoration_normal = (!empty($_POST['link_decoration_normal'])) ? $_POST['link_decoration_normal'] : false ;
		$link_decoration_hover = (!empty($_POST['link_decoration_hover'])) ? $_POST['link_decoration_hover'] : false ;
		
		// Process the footer widget display options
		if (empty($_POST['footerwidget_column'])){
			$footerwidget_column = false;
		} else if (!is_numeric($_POST['footerwidget_column'])){
			$errors[] = __('Please enter only numerical value for the footer widget column count.', 'graphene');
			$footerwidget_column = false;
		} else{
			$footerwidget_column = $_POST['footerwidget_column'];
		}
		// This is for the alternate front page widget
		if (empty($_POST['alt_footerwidget_column'])){
			$alt_footerwidget_column = false;
		} else if (!is_numeric($_POST['alt_footerwidget_column'])){
			$errors[] = __('Please enter only numerical value for the front page footer widget column count.', 'graphene');
			$alt_footerwidget_column = false;
		} else{
			$alt_footerwidget_column = $_POST['alt_footerwidget_column'];
		}
		
		// Process the nav menu display options
		if (empty($_POST['navmenu_child_width'])) {
			$navmenu_child_width = false;	
		} else if (!is_numeric($_POST['navmenu_child_width'])){
			$errors[] = __('Please enter only numerical value for the navigation menu dropdown item width.', 'graphene');
			$navmenu_child_width = false;
		} else {
			$navmenu_child_width = $_POST['navmenu_child_width'];
		}
		
		// Comments display options
		$hide_allowedtags = (!empty($_POST['hide_allowedtags'])) ? $_POST['hide_allowedtags'] : false ;
		
		// Miscellaneous options
		$swap_title = (!empty($_POST['swap_title'])) ? $_POST['swap_title'] : false ;
		
		// Custom CSS
		$custom_css = (!empty($_POST['custom_css'])) ? $_POST['custom_css'] : '' ;
		
		// Updates all options
		if (empty($errors)) {
			
			// Header options
			update_option('graphene_light_header', $light_header);	
			update_option('graphene_link_header_img', $link_header_img);
			update_option('graphene_featured_img_header', $featured_img_header);
			update_option('graphene_use_random_header_img', $use_random_header_img);
			update_option('graphene_hide_top_bar', $hide_top_bar);
			update_option('graphene_hide_feed_icon', $hide_feed_icon);
			update_option('graphene_search_box_location', $search_box_location);
			
			// Sidebar position
			update_option('graphene_content_sidebar_position', $content_sidebar_position);
			update_option('graphene_hide_sidebar', $hide_sidebar);
			
			// Posts Display options
			update_option('graphene_posts_show_excerpt', $posts_show_excerpt);
			update_option('graphene_hide_post_author', $hide_post_author);
			update_option('graphene_hide_post_date', $hide_post_date);
                        update_option('graphene_show_post_year', $show_post_year);
			update_option('graphene_hide_post_commentcount', $hide_post_commentcount);
			update_option('graphene_hide_post_cat', $hide_post_cat);
			update_option('graphene_hide_post_tags', $hide_post_tags);
			update_option('graphene_show_post_avatar', $show_post_avatar);
			update_option('graphene_show_post_author', $show_post_author);
			update_option('graphene_show_excerpt_more', $show_excerpt_more);
			
			// Text style options
			update_option('graphene_header_title_font_type', $header_title_font_type);
			update_option('graphene_header_title_font_size', $header_title_font_size);
			update_option('graphene_header_title_font_lineheight', $header_title_font_lineheight);
			update_option('graphene_header_title_font_weight', $header_title_font_weight);
			update_option('graphene_header_title_font_style', $header_title_font_style);
			
			update_option('graphene_header_desc_font_type', $header_desc_font_type);
			update_option('graphene_header_desc_font_size', $header_desc_font_size);
			update_option('graphene_header_desc_font_lineheight', $header_desc_font_lineheight);
			update_option('graphene_header_desc_font_weight', $header_desc_font_weight);
			update_option('graphene_header_desc_font_style', $header_desc_font_style);
			
			update_option('graphene_content_font_type', $content_font_type);
			update_option('graphene_content_font_size', $content_font_size);
			update_option('graphene_content_font_lineheight', $content_font_lineheight);
			update_option('graphene_content_font_colour', $content_font_colour);
			
			update_option('graphene_link_colour_normal', $link_colour_normal);
			update_option('graphene_link_colour_visited', $link_colour_visited);
			update_option('graphene_link_colour_hover', $link_colour_hover);
			update_option('graphene_link_decoration_normal', $link_decoration_normal);
			update_option('graphene_link_decoration_hover', $link_decoration_hover);
			
			// Bottom widget display options
			update_option('graphene_footerwidget_column', $footerwidget_column);
			update_option('graphene_alt_footerwidget_column', $alt_footerwidget_column);
			
			// Nav menu display options
			update_option('graphene_navmenu_child_width', $navmenu_child_width);
			
			// Comments display options
			update_option('graphene_hide_allowedtags', $hide_allowedtags);
			
			// Miscellaneous options
			update_option('graphene_swap_title', $swap_title);
			
			// Custom CSS
			update_option('graphene_custom_css', $custom_css);
			
			// Print successful message
			$messages[] = __('Settings updated.', 'graphene');
		}
	}
	
	// Get the current options from database
	$light_header = get_option('graphene_light_header');
	$link_header_img = get_option('graphene_link_header_img');
	$featured_img_header = get_option('graphene_featured_img_header');
	$use_random_header_img = get_option('graphene_use_random_header_img');
	$hide_top_bar = get_option('graphene_hide_top_bar');
	$hide_feed_icon = get_option('graphene_hide_feed_icon');
	$search_box_location = get_option('graphene_search_box_location');
	
	$content_sidebar_position = get_option('graphene_content_sidebar_position');
	$hide_sidebar = get_option('graphene_hide_sidebar');
	
	$posts_show_excerpt = get_option('graphene_posts_show_excerpt');
	$hide_post_author = get_option('graphene_hide_post_author');
	$hide_post_date = get_option('graphene_hide_post_date');
    $show_post_year = get_option('graphene_show_post_year');
	$hide_post_commentcount = get_option('graphene_hide_post_commentcount');
	$hide_post_cat = get_option('graphene_hide_post_cat');
	$hide_post_tags = get_option('graphene_hide_post_tags');
	$show_post_avatar = get_option('graphene_show_post_avatar');
	$show_post_author = get_option('graphene_show_post_author');
	$show_excerpt_more = get_option('graphene_show_excerpt_more');
	
	$footerwidget_column = get_option('graphene_footerwidget_column');
	$alt_footerwidget_column = get_option('graphene_alt_footerwidget_column');
	
	$navmenu_child_width = get_option('graphene_navmenu_child_width');
	
	$header_title_font_type = get_option('graphene_header_title_font_type');
	$header_title_font_size = get_option('graphene_header_title_font_size');
	$header_title_font_lineheight = get_option('graphene_header_title_font_lineheight');
	$header_title_font_weight = get_option('graphene_header_title_font_weight');
	$header_title_font_style = get_option('graphene_header_title_font_style');
	
	$header_desc_font_type = get_option('graphene_header_desc_font_type');
	$header_desc_font_size = get_option('graphene_header_desc_font_size');
	$header_desc_font_lineheight = get_option('graphene_header_desc_font_lineheight');
	$header_desc_font_weight = get_option('graphene_header_desc_font_weight');
	$header_desc_font_style = get_option('graphene_header_desc_font_style');
	
	$content_font_type = get_option('graphene_content_font_type');
	$content_font_size = get_option('graphene_content_font_size');
	$content_font_lineheight = get_option('graphene_content_font_lineheight');
	$content_font_colour = get_option('graphene_content_font_colour');
	
	$link_colour_normal = get_option('graphene_link_colour_normal');
	$link_colour_visited = get_option('graphene_link_colour_visited');
	$link_colour_hover = get_option('graphene_link_colour_hover');
	$link_decoration_normal = get_option('graphene_link_decoration_normal');
	$link_decoration_hover = get_option('graphene_link_decoration_hover');
	
	$hide_allowedtags = get_option('graphene_hide_allowedtags');
	
	$swap_title = get_option('graphene_swap_title');
	
	$custom_css = get_option('graphene_custom_css');
	?>
    
    
    
    <?php 
		/**
		 * The main option page display is defined here.
		 * This determines how the option page is displayed in the Wordpress admin,
		 * including all the form inputs and messages
		*/
	?>
    <div class="wrap meta-box-sortables">
		<h2><?php _e('Graphene Display Options', 'graphene'); ?></h2>
		<?php 
			// Display errors if exist
			if (!empty($errors)) {
				echo '<div class="error">';
				foreach ($errors as $error) : ?>
					<p><strong><?php _e('ERROR:', 'graphene'); ?> </strong><?php echo $error; ?></p>
				<?php endforeach;
				echo '</div>';
			}
		?>
		
		<?php 
			// Display other messages if exist
			if (!empty($messages)) {
				echo '<div id="message" class="updated fade">';
				foreach ($messages as $message) : ?>
					<p><?php echo $message; ?></p>
				<?php endforeach;
				echo '</div>';
			}
		?>
        
        <div class="left-wrap">
        
        <?php // Begins the main html form. Note that one html form is used for *all* options ?>
        <form action="" method="post">

        <?php 
		/* Secure our form with nonce */
		wp_nonce_field('graphene-display', 'graphene-display');
		?>
        
        <?php /* Header Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Header Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Use light-coloured header bars', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="light_header" <?php if ($light_header == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Link header image to front page', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="link_header_img" <?php if ($link_header_img == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description"><?php _e('Check this if you disable the header texts and want the header image to be linked to the front page.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Disable Featured Image replacing header image', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="featured_img_header" <?php if ($featured_img_header == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description"><?php _e('Check this to prevent the posts Featured Image replacing the header image regardless of the featured image dimension.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Use random header image', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="use_random_header_img" <?php if ($use_random_header_img == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description">
								<?php _e('Check this to show a random header image (random image taken from the available default header images).', 'graphene'); ?><br />
                                <?php _e('<strong>Note:</strong> only works on pages where a specific header image is not defined.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide the top bar', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="hide_top_bar" <?php if ($hide_top_bar == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Search box location', 'graphene'); ?></label>
                        </th>
                        <td>
                            <select name="search_box_location">
                                <option value="top_bar" <?php if ($search_box_location == 'top_bar') {echo 'selected="selected"';} ?>><?php _e("Top bar", 'graphene'); ?></option>
                                <option value="nav_bar" <?php if ($search_box_location == 'nav_bar') {echo 'selected="selected"';} ?>><?php _e("Navigation bar", 'graphene'); ?></option>                        
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Sidebar Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Sidebar Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Content sidebar location', 'graphene'); ?></label>
                        </th>
                        <td>
                            <select name="content_sidebar_position">
                            	<option value="right" <?php if ($content_sidebar_position == 'right') {echo 'selected="selected"';} ?>><?php _e("Right", 'graphene'); ?></option>
                                <option value="left" <?php if ($content_sidebar_position == 'left') {echo 'selected="selected"';} ?>><?php _e("Left", 'graphene'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide sidebar', 'graphene'); ?></label>                   
                        </th>
                        <td>
                        	<input type="checkbox" name="hide_sidebar" <?php if ($hide_sidebar == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description"><?php _e('Will cause all posts and pages to be displayed in a single-column layout.', 'graphene'); ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        <?php /* Posts Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Posts Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Show excerpts in front page', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="posts_show_excerpt" <?php if ($posts_show_excerpt == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post author', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="hide_post_author" <?php if ($hide_post_author == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post date', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="hide_post_date" <?php if ($hide_post_date == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Show post year', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="show_post_year" <?php if ($show_post_year == true) echo 'checked="checked"' ?> value="true" /><br/>
                            <span class="description"><?php _e('Only works if the option "Hide post date" is disabled.', 'graphene'); ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post categories', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="hide_post_cat" <?php if ($hide_post_cat == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post tags', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="hide_post_tags" <?php if ($hide_post_tags == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide post comment count', 'graphene'); ?></label><br />
                            <small><?php _e('Only affects posts listing (such as the front page) and not single post view.', 'graphene'); ?></small>                        
                        </th>
                        <td><input type="checkbox" name="hide_post_commentcount" <?php if ($hide_post_commentcount == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Show post author's gravatar", 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="show_post_avatar" <?php if ($show_post_avatar == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Show post author's info", 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="show_post_author" <?php if ($show_post_author == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e("Show More link for manual excerpts", 'graphene'); ?></label></th>
                        <td><input type="checkbox" name="show_excerpt_more" <?php if ($show_excerpt_more == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                </table>
            </div>
        </div>
        
        
        
        <?php /* Comments Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Comments Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Hide allowed tags in comment form', 'graphene'); ?></label>
                        </th>
                        <td><input type="checkbox" name="hide_allowedtags" <?php if ($hide_allowedtags == true) echo 'checked="checked"' ?> value="true" /></td>
                    </tr>
                </table>
            </div>
        </div>
        
            
        <?php /* Text Style Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Text Style Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <p><?php _e('Note that these are CSS properties, so any valid CSS values for each particular property can be used.', 'graphene'); ?></p>
                <p><?php _e('Some example CSS properties values:', 'graphene'); ?></p>
                <table class="graphene-code-example">
                    <tr>
                        <th scope="row"><?php _e('Text font:', 'graphene'); ?></th>
                        <td><?php _e("<code>arial</code>, <code>tahoma</code>, <code>georgia</code>, <code>'Trebuchet MS'</code>", 'graphene'); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Text size and line height:', 'graphene'); ?></th>
                        <td><?php _e("<code>12px</code>, <code>12pt</code>, <code>12em</code>", 'graphene'); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Text weight:', 'graphene'); ?></th>
                        <td><?php _e("<code>normal</code>, <code>bold</code>, <code>100</code>, <code>700</code>", 'graphene'); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Text style:', 'graphene'); ?></th>
                        <td><?php _e(" <code>normal</code>, <code>italic</code>, <code>oblique</code>", 'graphene'); ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?php _e('Text colour:', 'graphene'); ?></th>
                        <td><?php _e("<code>blue</code>, <code>navy</code>, <code>red</code>, <code>#ff0000</code>", 'graphene'); ?></td>
                    </tr>        
                </table>
                <p><?php _e('Leave field empty to use the default value.', 'graphene'); ?></p>
                
                <h4><?php _e('Header Text', 'graphene'); ?></h4>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text font', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_title_font_type" value="<?php if ($header_title_font_type) echo $header_title_font_type; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text size', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_title_font_size" value="<?php if ($header_title_font_size) echo $header_title_font_size; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text weight', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_title_font_weight" value="<?php if ($header_title_font_weight) echo $header_title_font_weight; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text line height', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_title_font_lineheight" value="<?php if ($header_title_font_lineheight) echo $header_title_font_lineheight; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Title text style', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_title_font_style" value="<?php if ($header_title_font_style) echo $header_title_font_style; ?>" /></td>
                    </tr>
                </table>
                
                <table class="form-table" style="margin-top:30px;">               
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text font', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_desc_font_type" value="<?php if ($header_desc_font_type) echo $header_desc_font_type; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text size', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_desc_font_size" value="<?php if ($header_desc_font_size) echo $header_desc_font_size; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text weight', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_desc_font_weight" value="<?php if ($header_desc_font_weight) echo $header_desc_font_weight; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text line height', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_desc_font_lineheight" value="<?php if ($header_desc_font_lineheight) echo $header_desc_font_lineheight; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Description text style', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="header_desc_font_style" value="<?php if ($header_desc_font_style) echo $header_desc_font_style; ?>" /></td>
                    </tr>
                </table>
                
                <h4><?php _e('Content Text', 'graphene'); ?></h4>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text font', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="content_font_type" value="<?php if ($content_font_type) echo $content_font_type; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text size', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="content_font_size" value="<?php if ($content_font_size) echo $content_font_size; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text line height', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="content_font_lineheight" value="<?php if ($content_font_lineheight) echo $content_font_lineheight; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text colour', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="content_font_colour" value="<?php if ($content_font_colour) echo $content_font_colour; ?>" /></td>
                    </tr>
                </table>
                    
                <h4><?php _e('Link Text', 'graphene'); ?></h4>
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Link colour (normal state)', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="link_colour_normal" value="<?php if ($link_colour_normal) echo $link_colour_normal; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Link colour (visited state)', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="link_colour_visited" value="<?php if ($link_colour_visited) echo $link_colour_visited; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Link colour (hover state)', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="link_colour_hover" value="<?php if ($link_colour_hover) echo $link_colour_hover; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text decoration (normal state)', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="link_decoration_normal" value="<?php if ($link_decoration_normal) echo $link_decoration_normal; ?>" /></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Text decoration (hover state)', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="link_decoration_hover" value="<?php if ($link_decoration_hover) echo $link_decoration_hover; ?>" /></td>
                    </tr>
                </table>
            </div>
        </div>
		
        
		<?php /* Footer Widget Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Footer Widget Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
        		<p><?php _e('Leave field empty to use the default value.', 'graphene'); ?></p>
        
                <table class="form-table">
                    <tr>
                        <th scope="row" style="width:260px;">
                            <label><?php _e('Number of columns to display', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="footerwidget_column" value="<?php echo $footerwidget_column; ?>" maxlength="2" size="3" /></td>
                    </tr>
                    <?php if (get_option('graphene_alt_home_footerwidget')) : ?>
                    <tr>
                        <th scope="row">
                            <label><?php _e('Number of columns to display for front page footer widget', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="alt_footerwidget_column" value="<?php echo $alt_footerwidget_column; ?>" maxlength="2" size="3" /></td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
            
        
        <?php /* Navigation Menu Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Navigation Menu Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
		        <p><?php _e('Leave field empty to use the default value.', 'graphene'); ?></p>
        
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Dropdown menu item width', 'graphene'); ?></label>
                        </th>
                        <td><input type="text" class="code" name="navmenu_child_width" value="<?php echo $navmenu_child_width; ?>" maxlength="3" size="3" /> px</td>
                    </tr>
                </table>
            </div>
        </div>
        
            
        <?php /* Miscellaneous Display Options */ ?>
        <div class="postbox">
            <div class="head-wrap">
                <div title="Click to toggle" class="handlediv"><br /></div>
        		<h3 class="hndle"><?php _e('Miscellaneous Display Options', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label><?php _e('Swap title order', 'graphene'); ?></label>
                        </th>
                        <td>
                            <input type="checkbox" name="swap_title" <?php if ($swap_title == true) echo 'checked="checked"' ?> value="true" /><br />
                            <span class="description"><?php _e('If this is checked, the website title will be displayed first, followed by the page title.', 'graphene'); ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
                    
                    
        <?php /* Custom CSS */ ?>
        <div class="postbox">
            <div class="head-wrap">
            	<div title="Click to toggle" class="handlediv"><br /></div>
            	<h3 class="hndle"><?php _e('Custom CSS', 'graphene'); ?></h3>
            </div>
            <div class="panel-wrap inside">
                <table class="form-table">
                    <tr>
                        <th scope="row"><label><?php _e('Custom CSS styles', 'graphene'); ?></label></th>
                        <td>
                        	<span class="description"><?php _e("You can enter your own CSS codes below to modify any other aspects of the theme's appearance that is not included in the options.", 'graphene'); ?></span>
                        	<textarea name="custom_css" cols="60" rows="20" class="widefat code"><?php echo stripslashes($custom_css); ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
                    
        
        <?php /* Ends the main form */ ?>
            <input type="hidden" name="graphene_submitted" value="true" />
            <input type="submit" class="button-primary" value="<?php _e('Update Settings', 'graphene'); ?>" style="margin-top:20px;margin-bottom:50px;" />
        </form>
        
        </div><!-- $left-wrap -->
        
    </div><!-- #wrap -->
    
    
<?php } // Closes the graphene_options_display() function definition ?>