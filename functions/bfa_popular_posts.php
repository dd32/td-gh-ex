<?php
/*
Plugin Name: BFA Popular Posts
Plugin URI: http://wordpress.bytesforall.com/
Description: Configurable WordPress widget that displays the most popular posts based on the number of comments 
Version: 1.0
Author: BFA Webdesign
Author URI: http://www.bytesforall.com/
*/
/*
Based on Plugin "Most Commented" by Nick Momrik http://mtdewvirus.com/ Version 1.5
and the modification Last X days by DJ Chuang www.djchuang.com 
*/


	// Check for the required plugin functions. This will prevent fatal
	// errors occurring when you deactivate the dynamic-sidebar plugin.
	if ( !function_exists('register_sidebar_widget') )
		return;

	// This is the function that outputs our little widget
	function widget_mdv_most_commented($args) {
	  extract($args);

	  // Fetch our parameters
	  $bfa_pp_options = get_option('widget_mdv_most_commented');
	  $bfa_pp_title = $bfa_pp_options['bfa_pp_title'];
	  $bfa_pp_no_posts = $bfa_pp_options['bfa_pp_no_posts'];
	  $bfa_pp_duration = $bfa_pp_options['bfa_pp_duration'];
	  $bfa_pp_min_amount_comments = $bfa_pp_options['bfa_pp_min_amount_comments'];
	  $bfa_pp_display_homepage = $bfa_pp_options['bfa_pp_display_homepage'];
	  $bfa_pp_display_category = $bfa_pp_options['bfa_pp_display_category'];
	  $bfa_pp_display_post = $bfa_pp_options['bfa_pp_display_post'];
	  $bfa_pp_display_page = $bfa_pp_options['bfa_pp_display_page'];
	  $bfa_pp_display_archive = $bfa_pp_options['bfa_pp_display_archive'];
	  $bfa_pp_display_tag = $bfa_pp_options['bfa_pp_display_tag'];
	  $bfa_pp_display_search = $bfa_pp_options['bfa_pp_display_search'];
	  $bfa_pp_display_author = $bfa_pp_options['bfa_pp_display_author'];
	  $bfa_pp_display_404 = $bfa_pp_options['bfa_pp_display_404'];
	  	  
	  global $wpdb;


		$bfa_pp_request = "SELECT ID, post_title, comment_count FROM $wpdb->posts";
		$bfa_pp_request .= " WHERE post_status = 'publish' AND comment_count >= $bfa_pp_min_amount_comments";
		$bfa_pp_request .= " AND post_password =''";
	
		if ($bfa_pp_duration !="") $bfa_pp_request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$bfa_pp_duration." DAY) < post_date ";
	
		$bfa_pp_request .= " ORDER BY comment_count DESC LIMIT $bfa_pp_no_posts";
		$bfa_pp_posts = $wpdb->get_results($bfa_pp_request);

		if ($bfa_pp_posts) {
			foreach ($bfa_pp_posts as $bfa_pp_post) {
				$bfa_pp_post_title = stripslashes($bfa_pp_post->post_title);
				$bfa_pp_comment_count = $bfa_pp_post->comment_count;
				$bfa_pp_permalink = get_permalink($bfa_pp_post->ID);
				$widget_mdv_most_commented .= '<li><a href="' . $bfa_pp_permalink . '" title="' . $bfa_pp_post_title.'">' . $bfa_pp_post_title . ' (' . $bfa_pp_comment_count . ')</a></li>';
			}
		} else {
			$widget_mdv_most_commented = "None found";
		}
	

    if ($widget_mdv_most_commented != "None found") {
    echo $before_widget . $before_title . $bfa_pp_title . $after_title;	
    echo "<ul>" . $widget_mdv_most_commented . "</ul>";
    echo $after_widget;
    } else { return $widget_mdv_most_commented; }
}



	// This is the function that outputs the form to let the users edit
	// the widget's parameters.
	function widget_mdv_most_commented_control() {

	  // Fetch the options, check them and if need be, update the options array
	  $bfa_pp_options = $bfa_pp_newoptions = get_option('widget_mdv_most_commented');
	  if ( $_POST["bfa_pp_src-submit"] ) {
	    $bfa_pp_newoptions['bfa_pp_title'] = strip_tags(stripslashes($_POST["bfa_pp_src-title"]));
	    $bfa_pp_newoptions['bfa_pp_no_posts'] = (int) $_POST["bfa_pp_no_posts"];
	    $bfa_pp_newoptions['bfa_pp_duration'] = (int) $_POST["bfa_pp_duration"];
	    $bfa_pp_newoptions['bfa_pp_min_amount_comments'] = (int) $_POST["bfa_pp_min_amount_comments"];
	    $bfa_pp_newoptions['bfa_pp_display_homepage'] = !isset($_POST["bfa_pp_display_homepage"]) ? NULL : $_POST["bfa_pp_display_homepage"];
	    $bfa_pp_newoptions['bfa_pp_display_category'] = !isset($_POST["bfa_pp_display_category"]) ? NULL : $_POST["bfa_pp_display_category"];
	    $bfa_pp_newoptions['bfa_pp_display_post'] = !isset($_POST["bfa_pp_display_post"]) ? NULL : $_POST["bfa_pp_display_post"];
	    $bfa_pp_newoptions['bfa_pp_display_page'] = !isset($_POST["bfa_pp_display_page"]) ? NULL : $_POST["bfa_pp_display_page"];
	    $bfa_pp_newoptions['bfa_pp_display_archive'] = !isset($_POST["bfa_pp_display_archive"]) ? NULL : $_POST["bfa_pp_display_archive"];
	    $bfa_pp_newoptions['bfa_pp_display_tag'] = !isset($_POST["bfa_pp_display_tag"]) ? NULL : $_POST["bfa_pp_display_tag"];
	    $bfa_pp_newoptions['bfa_pp_display_search'] = !isset($_POST["bfa_pp_display_search"]) ? NULL : $_POST["bfa_pp_display_search"];
	    $bfa_pp_newoptions['bfa_pp_display_author'] = !isset($_POST["bfa_pp_display_author"]) ? NULL : $_POST["bfa_pp_display_author"];
	    $bfa_pp_newoptions['bfa_pp_display_404'] = !isset($_POST["bfa_pp_display_404"]) ? NULL : $_POST["bfa_pp_display_404"];
	    	    	    	    
	  }
	  if ( $bfa_pp_options != $bfa_pp_newoptions ) {
	    $bfa_pp_options = $bfa_pp_newoptions;
	    update_option('widget_mdv_most_commented', $bfa_pp_options);
	  }

	  // Default options to the parameters
	  if ( !$bfa_pp_options['bfa_pp_no_posts'] ) $options['bfa_pp_no_posts'] = 10;
	  if ( !$bfa_pp_options['bfa_pp_min_amount_comments'] OR $bfa_pp_options['bfa_pp_min_amount_comments'] == 0) $bfa_pp_options['bfa_pp_min_amount_comments'] = 1;

	  $bfa_pp_no_posts = $bfa_pp_options['bfa_pp_no_posts'];
	  $bfa_pp_duration = $bfa_pp_options['bfa_pp_duration'];
	  $bfa_pp_min_amount_comments = $bfa_pp_options['bfa_pp_min_amount_comments'];
	  $bfa_pp_display_homepage = $bfa_pp_options['bfa_pp_display_homepage'];
	  $bfa_pp_display_category = $bfa_pp_options['bfa_pp_display_category'];
	  $bfa_pp_display_post = $bfa_pp_options['bfa_pp_display_post'];
	  $bfa_pp_display_page = $bfa_pp_options['bfa_pp_display_page'];
	  $bfa_pp_display_archive = $bfa_pp_options['bfa_pp_display_archive'];
	  $bfa_pp_display_tag = $bfa_pp_options['bfa_pp_display_tag'];	  
	  $bfa_pp_display_search = $bfa_pp_options['bfa_pp_display_search'];
	  $bfa_pp_display_author = $bfa_pp_options['bfa_pp_display_author'];
	  $bfa_pp_display_404 = $bfa_pp_options['bfa_pp_display_404'];
	  	  
	  // Deal with HTML in the parameters
	  $bfa_pp_title = htmlspecialchars($bfa_pp_options['bfa_pp_title'], ENT_QUOTES);

?>
	    <?php _e('Title:','atahualpa'); ?> <input style="width: 450px;" id="bfa_pp_src-title" name="bfa_pp_src-title" type="text" value="<?php echo $bfa_pp_title; ?>" />
            <hr noshade size="1" style="clear:left; color: #ccc">
            <p style="text-align: left;"><?php _e('Show','atahualpa'); ?> <input style="width: 20px;" id="bfa_pp_no_posts" name="bfa_pp_no_posts" type="text" value="<?php echo $bfa_pp_no_posts; ?>" /> 
            <?php _e('posts not older than','atahualpa'); ?> <input style="width: 40px;" id="bfa_pp_duration" name="bfa_pp_duration" type="text" value="<?php echo $bfa_pp_duration; ?>" /> <?php _e('days and with at least','atahualpa'); ?>&nbsp;
   	    <input style="width: 20px;" id="bfa_pp_min_amount_comments" name="bfa_pp_min_amount_comments" type="text" value="<?php echo $bfa_pp_min_amount_comments; ?>" /> <?php _e('comment(s)','atahualpa'); ?>
   	    </p>
  	    <hr noshade size="1" style="clear:left; color: #ccc">
            <p><?php _e('And display the list on:','atahualpa'); ?> </p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_homepage" name="bfa_pp_display_homepage" type="checkbox" <?php if($bfa_pp_display_homepage == "on"){echo " CHECKED";}?> /> <?php _e('Homepage','atahualpa'); ?></p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_category" name="bfa_pp_display_category" type="checkbox" <?php if($bfa_pp_display_category == "on"){echo " CHECKED";}?> /> <?php _e('Category Pages','atahualpa'); ?></p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_post" name="bfa_pp_display_post" type="checkbox" <?php if($bfa_pp_display_post == "on"){echo " CHECKED";}?> /> <?php _e('Single Post Pages','atahualpa'); ?></p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_page" name="bfa_pp_display_page" type="checkbox" <?php if($bfa_pp_display_page == "on"){echo " CHECKED";}?> /> <?php _e('"Page" Pages','atahualpa'); ?></p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_archive" name="bfa_pp_display_archive" type="checkbox" <?php if($bfa_pp_display_archive == "on"){echo " CHECKED";}?> /> <?php _e('Archive Pages','atahualpa'); ?></p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_tag" name="bfa_pp_display_tag" type="checkbox" <?php if($bfa_pp_display_tag == "on"){echo " CHECKED";}?> /> <?php _e('Tag Pages','atahualpa'); ?></p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_search" name="bfa_pp_display_search" type="checkbox" <?php if($bfa_pp_display_search == "on"){echo " CHECKED";}?> /> <?php _e('Search Result Pages','atahualpa'); ?></p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_author" name="bfa_pp_display_author" type="checkbox" <?php if($bfa_pp_display_author == "on"){echo " CHECKED";}?> /> <?php _e('Author Pages','atahualpa'); ?></p>
            <p style="float: left; width: 160px; text-align: left;"><input id="bfa_pp_display_404" name="bfa_pp_display_404" type="checkbox" <?php if($bfa_pp_display_404 == "on"){echo " CHECKED";}?> /> <?php _e('404 Not Found Pages','atahualpa'); ?></p>
            <div style="clear:left"></div>
  	    <input type="hidden" id="bfa_pp_src-submit" name="bfa_pp_src-submit" value="1" />     
<?php
	 }
	
	// This registers our widget so it appears with the other available
	// widgets and can be dragged and dropped into any active sidebars.
	register_sidebar_widget('BFA Popular Posts', 'widget_mdv_most_commented');

	// This registers our optional widget control form. Because of this
	// our widget will have a button that reveals a 520x480 pixel form.
	register_widget_control('BFA Popular Posts', 'widget_mdv_most_commented_control', 520, 480);
?>