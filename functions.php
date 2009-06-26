<?php

if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
		'1' => 'Wide',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    
}


	/* -------------------------------------------------
				  SEARCH WIDGET
	-------------------------------------------------- */
	// define the widget
	function widget_search() {
		global $tag_widget_title;
?>
			<div class="widget_search">
				<h3><?php _e('Search', 'default'); ?></h3>
				<form action="<?php bloginfo('home'); ?>/" method="post">
					<div class="search-wrapper">
						<input type="text" value="" class="textfield" name="s" />
						<input type="submit" value="Find" class="button" />
					</div>
				</form>
			</div>


<?php
	}

// if wp supports widgets, register it (make it available)
if (function_exists('register_sidebar_widget'))
	register_sidebar_widget('Search', 'widget_search');


$themename = "Beauty";
$shortname = "tpl";
$dir = get_bloginfo ( 'template_directory' );
$options = array (
	array(  "name" => __("Featured category id", 'default'),
			"id" => $shortname."_featured_cat_id",
			"type" => "text",
			"std" => "9999"
			),
	 array (  "name" => __("Featured posts", 'default'),
            "id" => $shortname."_featured_visibility",
            "type" => "select",
            "std" => "on",
            "options" => array("Show" => "on",
    		"Hide" => "off"
    		),
        )
);


foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
    
    
function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                    

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                wp_redirect("themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }
    add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> <?php _e('settings', 'default'); ?></h2>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) { 
    
if ($value['type'] == "text") { ?>
        
<tr valign="top"> 
    <th scope="row"><?php echo $value['name']; ?>:</th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
    </td>
</tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="top"> 
        <th scope="row"><?php echo $value['name']; ?>:</th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $key => $val) { ?>
                <option value="<?php echo $val; ?>"<?php if (get_option ( $value['id'] )) {if ( get_option( $value['id'] ) == $val) { echo ' selected="selected"'; }} elseif ($val == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $key; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>

<?php } elseif ($value['type'] == "textarea") { ?>

	<tr valign="top"> 
	    <th scope="row"><?php echo $value['name']; ?>:</th>
	    <td>
	        <textarea cols="100" rows="10" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea>
	    </td>
	</tr>


<?php 
} 
}
?>

</table>

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

add_action('admin_menu', 'mytheme_add_admin'); 

function theme_init(){
	load_theme_textdomain('default', get_template_directory() . '/languages');
}
add_action ('init', 'theme_init');

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div class="com-wrapper <?php if (1 == $comment->user_id) echo "admin"; ?>">
	        	<div id="comment-<?php comment_ID(); ?>" class="com-header">
					<?php echo get_avatar( $comment, 48); ?>

	                <p class="tp">
	                    <span><?php comment_author_link() ?></span>
	                    <?php if ($comment->comment_approved == '0') : ?>
	                    <em><?php _e('Your comment is awaiting moderation', 'default'); ?>.</em>
	                    <?php endif; ?>
	                    
	                    <small class="commentmetadata">
	                    	<a href="#comment-<?php comment_ID() ?>" title=""><?php printf( __('%1$s at %2$s', 'default'), get_comment_time(__('F jS, Y', 'default')), get_comment_time(__('H:i', 'default')) ); ?></a>
	                    	<?php edit_comment_link(__('Edit', 'default'),'&nbsp;&nbsp;',''); ?>
	                    </small>
					</p>
	                <div class="clear"></div>
	            </div>
		
				<?php comment_text() ?>
			    <div class="reply">
			    	<p><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
			    </div>
		    </div>
<?php
        }



function mytheme_ping($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   	   
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div class="com-wrapper">
	        	<div id="comment-<?php comment_ID(); ?>" class="com-header">
					<img height="48" width="48" class="avatar avatar-48 photo" src="<?php bloginfo('stylesheet_directory'); ?>/images/ico/link.png" alt="Link"/>
			
	                <p class="tp">
	                    <span><?php comment_author_link() ?></span>
	                    <?php if ($comment->comment_approved == '0') : ?>
	                    <em><?php _e('Your comment is awaiting moderation', 'default'); ?>.</em>
	                    <?php endif; ?>
	                    
	                    <small class="commentmetadata">
	                    	<a href="#comment-<?php comment_ID() ?>" title=""><?php printf( __('%1$s at %2$s', 'default'), get_comment_time(__('F jS, Y', 'default')), get_comment_time(__('H:i', 'default')) ); ?></a>
	                    	<?php edit_comment_link(__('Edit', 'default'),'&nbsp;&nbsp;',''); ?>
	                    </small>
					</p>
	                <div class="clear"></div>
	            </div>
		
				<?php comment_text() ?>
			</div>
<?php
        }

?>