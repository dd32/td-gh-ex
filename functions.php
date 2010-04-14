<?php

automatic_feed_links();

//Load the Options CSS
add_action('admin_print_styles', 'altop_option_css');
function altop_option_css() {
	wp_enqueue_style('altop_Admin_CSS', get_bloginfo('template_directory').'/admin/admin.css');
}

//Localisiation
load_theme_textdomain('altop', get_template_directory() . '/lang');

//altop Options
$themename = "A little touch of purple";
$shortname = "altop";
$imgurl = get_bloginfo('template_directory');

$options = array (

	array( "type" => "open"),
	
	array( "name" => __("Menu", 'altop'),
		   "type" => "title",
		   ),

	array( "name" => __("Pages or categories", 'altop'),
		   "type" => "select",
		   "desc" => __("Show <strong>PAGES</strong> or <strong>CATEGORIES</strong> in the main menu. <i>Theme default is &quot;Pages&quot;</i>", 'altop'),
		   "id" => $shortname."_menue_pages",
		   "std" => "",
		   "options" => array ("","Pages","Categories"),
		   ),
		
		array( "name" => __("Exclude"),
		       "type" => "text",
		       "desc" => __("Exclude this pages or categories from menu (comma seperated)", 'altop'),
		       "id" => $shortname."_page_exclude",
		       "std" => "",
		    ),

		array( "name" => __("Depth", 'altop'),
		       "type" => "select",
		       "desc" => __("How many level are to be displayed? 0 (all), 1 or 2. <br /> See also <a href=\"http://codex.wordpress.org/Template_Tags/wp_list_pages\">Wordpress-Codex | wp_list_pages</a> for pages or <a href=\"http://codex.wordpress.org/Template_Tags/wp_list_categories\">Wordpress-Codex | wp_list_categories</a> for categories. <i>Theme default is 0 for both</i>. <br /> <span class='note'><i>Note</i>: Depth &quot;0&quot; will be display all pages or categories. The menu effect works perfect with this value.</span>", 'altop'),
		       "id" => $shortname."_page_depth",
		       "std" => "",
			   "options" => array("","0","1","2"),
		    ),

	array( "name" => __("Home Link", 'altop'),
		   "type" => "text",
		   "desc" => __("Show a <i>HOME-Link</i> in your main menu. Type in the name of your Home Link. If you leave it blank, the home link will not been shown!", 'altop'),
		   "id" => $shortname."_home_link",
		   "std" => "",
		   ),
		   
	array( "name" => __("Posts & Pages", 'altop'),
		   "type" => "title",
		   ),
	
	array( "name" => __("Author", 'altop'),
		   "type" => "checkbox",
		   "desc" => __("Show the author on posts", 'altop'),
		   "id" => $shortname."_posts_author",
		   "std" => "",
		   ),	

	array( "name" => __("Post Thumbnail", 'altop'),
		   "type" => "checkbox",
		   "desc" => __("Show the post thumbnail in posts, archives and pages?", 'altop'),
		   "id" => $shortname."_post_thumbnail",
		   "std" => "",
		   ),
	
	array( "name" => __("Comment Tags", 'altop'),
		   "type" => "checkbox",
		   "desc" => __("Show allowed XHTML-Tags in your comment form.", 'altop'),
		   "id" => $shortname."_xhtml_tags",
		   "std" => "",
		   ),	   
		   
	array( "name" => __("Bottombar", 'altop'),
		   "type" => "title",
		   ),
		   
	array( "name" => __("Bottombar", 'altop'),
		   "type" => "select",
		   "desc" => __("Use the &quot;Bottombar&quot; in your theme and choose the background image. Here you can place some little widgets or text. If you don&#180;t want to show the Bottombar, choose <b>none</b>. <br />", 'altop') . '<img src="'.$imgurl.'/admin/bottombar-purple-admin.jpg" alt="Purple" />' . (__("<strong> 1</strong> = purple (default) <br />", 'altop')) . '<img src="'.$imgurl.'/admin/bottombar-grey-admin.jpg" alt="Grey" />' . (__(" 2 = grey <br />", 'altop')) . '<img src="'.$imgurl.'/admin/just-grey-admin.jpg" alt="just grey" />' . (__(" 0 = only color grey", 'altop')),
		   "id" => $shortname."_bottombar",
		   "std" => "none",
		   "options" => array("none","1","2","0"),
		   ),	
		   
	array( "name" => "Sidebar",
		   "type" => "title",
		   ),
		   
	array( "name" => __("Sidebar align", 'altop'),
		   "type" => "select",
		   "desc" => __("Sidebar align left, right or none (hidden). <i>Theme default is &quot;right&quot;</i> <span class='note'><i>Note:</i> You will hide the sidebar on <b>any</b> page and posts if you select none. If you only want to hide the sidebar for some pages, use the page template without sidebar.</span>", 'altop'),
		   "id" => $shortname."_sidebar_align",
		   "std" => "",
		   "options" => array("","left","right","none"),
		   ),
			
	array( "name" => "Twitter",
		   "type" => "title",
		   ),
	
	array( "name" => "Account",
		   "type" => "text",
		   "desc" => __("Type in your Twitter-Username (without slashes!) to create a link to your Twitter Account. The Twitter Logo will be displayed in the head of your site. <br /> <a href='http://twitter.com/t3blogart' title='Visit me on Twitter...' target='blank'>You can follow me on Twitter too. Visit my page under twitter.com/t3blogart.</a>", 'altop'),
		   "id" => $shortname."_twitter",
		   "std" => ""),
		   
	array( "name" => "RSS Feed",
		   "type" => "title",
		   ),

	array( "name" => __("Custom Feed URL", 'altop'),
		   "type" => "text",
		   "desc" => __("Your custom feed URL? (Feedburner...)", 'altop'),
		   "id" => $shortname."_feed_url",
		   "std" => "",
		   ),

	array( "type" => "close")
	);
	
		function altop_add_admin() {
		 
		global $themename, $shortname, $options;
		 
		if ( $_GET['page'] == basename(__FILE__) ) {
		 
		if ( 'save' == $_REQUEST['action'] ) {
		 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
		 
		foreach ($options as $value) {
		if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
		 
		header("Location: themes.php?page=functions.php&saved=true");
		die;
		 
		} else if( 'reset' == $_REQUEST['action'] ) {
		 
		foreach ($options as $value) {
		delete_option( $value['id'] ); }
		 
		header("Location: themes.php?page=functions.php&reset=true");
		die;
		 
		}
		}
		 
		add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'altop_admin');
		 
		}
		 
		function altop_admin() {
		 
		global $themename, $shortname, $options;
		$saved = __('settings saved.', 'altop');
		$reset = __('settings reset.', 'altop');
		 
		if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.$saved.'</strong></p></div>';
		if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' '.$reset.'</strong></p></div>';
		 
?>


<div class="wrap">
<h2><?php echo $themename; ?> <?php _e('Settings', 'altop'); ?></h2>
 
		<form method="post" action="">
		 
		<?php foreach ($options as $value) { switch ( $value['type'] ) {
		  case "open": 	?>
		 	<table border="0">
		 		<?php break; case "close": ?>
			</table>
		
		<br />
		 
		<?php break; case 'title': ?>
			
			<tr>
				<td colspan="2" class="title" ><h3><?php echo $value['name']; ?></h3></td>
			</tr>
		 
		<?php break; case 'text': ?>
		 
			<tr>
				<td width="20%" rowspan="2" valign="top" class="name" > <?php echo esc_attr($value['name']); ?> </td>
				<td width="80%"><input class="inputfield" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
			</tr>
		 
			<tr>
				<td style="padding-bottom: 5px;"> <small><?php echo $value['desc']; ?></small> </td>
			</tr>				
			
		 
		<?php break; case 'textarea': ?>
			<?php $input = get_option( $value['id'] ); $output = stripslashes ($input); ?>
		 
			<tr>
				<td width="20%" rowspan="2" valign="top" class="name" > <?php echo $value['name']; ?> </td>
				<td width="80%"><textarea name="<?php echo $value['id']; ?>" cols="60" rows="10"><?php if ( get_option( $value['id'] ) != "") { echo $output; } else { echo $value['std']; } ?></textarea></td>
		 
			</tr>
		 
			<tr>
				<td style="padding-bottom: 5px;"><small><?php echo $value['desc']; ?></small></td>
			</tr>
	 
		<?php break; case 'select': ?>
		
		<tr>
			<td width="20%" rowspan="2" valign="top" class="name" > <?php echo $value['name']; ?> </td>
			<td width="80%"><select class="inputfield" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
		</tr>
		 
		<tr>
			<td style="padding-bottom: 5px;"><small><?php echo $value['desc']; ?></small></td>
		</tr>
		
		<?php break; case "checkbox": ?>
		
		<tr>
			<td width="20%" rowspan="2" valign="top" class="name" > <?php echo $value['name']; ?> </td>
			<td width="80%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
				<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
			</td>
		</tr>
		 
		<tr>
			<td style="padding-bottom: 5px;"><small><?php echo $value['desc']; ?></small></td>
		</tr>
	
		 
		<?php break; }
		}	?>
		 
		 <br clear="all" />
		<p class="submit">
		<input name="save" type="submit" value="<?php _e('Save changes', 'altop'); ?>" />
		<input type="hidden" name="action" value="save" />
		</p>
		</form>		
		
		<form method="post" action="">
		<p class="submit">
		<input name="reset" type="submit" value="<?php _e('Reset', 'altop'); ?>" />
		<input type="hidden" name="action" value="reset" />
		</p>
		</form>
		
		<div class="support">
			<h3><?php echo _e('Thank you for using the &quot;altop Theme&quot; !', 'altop'); ?></h3>
			<p><?php echo _e('If you have any questions or problems with this theme, leave a reply at my <a href="http://blog.t3-artwork.info">site</a>. <br /> Update informations and bugfixes are also available at my site or follow me on Twitter. <br /> Have fun with my theme and <strong>Happy Blogging...</strong> :)', 'altop'); ?></p>
		</div>
		
	</div>
 
<?php }

add_action('admin_menu', 'altop_add_admin');

//Get post thumbnails
add_theme_support('post-thumbnails');

//Register sidebar(s)
if ( function_exists('register_sidebar') ) 
	register_sidebar(array( 'name'=>'sidebar',
		'before_widget' => '<ul> <li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li> </ul>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

	register_sidebar(array( 'name'=>'bottombar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

//Comments
  function list_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
		global $commentnumber;
			if(!$commentnumber) {
				$commentnumber = 0;
	}
				
	printf(__('<li id="comment-%1s" %2s>'), get_comment_ID(), comment_class('', null, null, false) );
	printf(__('<div class="commentbody"> %1s'), get_avatar( $comment, 50 ) );
	 if($comment->comment_approved == '0') { 
     echo __('<em> Your comment is awaiting moderation.</em>'); }
 	comment_text();
	printf(__('<p class="commentfooter"> <span class="commnumber">%1s</span> <span class="commauthor">%2s</span> said this <small>(%3s at %4s)</small> %5s', 'altop'), ++$commentnumber, get_comment_author_link(), get_comment_date(), get_comment_time(), get_comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ); 
	edit_comment_link(__('Edit', 'altop'), ' |', '<br />');
	echo ('</p>');
	echo ('<br clear="all" /> </div>');
	} 
//Ping- and trackbacks
  function list_tracks($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment; {
 
  printf(__('<li id="comment-%1s">'), get_comment_ID());
  comment_author_link();
  printf(__('&nbsp;<small>%1s at %2s</small>', 'altop'), get_comment_date(), get_comment_time()); edit_comment_link(__('Edit', 'altop'), ' |');
 }
}

?>
