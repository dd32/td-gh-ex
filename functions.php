<?php
/* Arclite/digitalnature */

// xili-language plugin check
function init_language(){
	if (class_exists('xili_language')) {
		define('THEME_TEXTDOMAIN','arclite');
		define('THEME_LANGS_FOLDER','/lang');
	} else {
	   load_theme_textdomain('arclite', get_template_directory() . '/lang');
	}
}
add_action ('init', 'init_language');


// theme options
$options = array (
  array(	"type" => "open"),

  array(
   "id" => "arclite_imageless",
   "default" => "no",
   "type" => "arclite_imageless"),

  array(
   "id" => "arclite_jquery",
   "default" => "yes",
   "type" => "arclite_jquery"),

  array(
   "id" => "arclite_meta",
   "default" => "",
   "type" => "arclite_meta"),

  array(
   "id" => "arclite_header",
   "default" => "default",
   "type" => "arclite_header"),

  array(
   "id" => "arclite_logo",
   "default" => "no",
   "type" => "arclite_logo"),

  array(
   "id" => "arclite_sidebarpos",
   "default" => "right",
   "type" => "arclite_sidebarpos"),

  array(
   "id" => "arclite_sidebarcat",
   "default" => "yes",
   "type" => "arclite_sidebarcat"),

  array(
   "id" => "arclite_topnav",
   "default" => "pages",
   "type" => "arclite_topnav"),

  array(
   "id" => "arclite_search",
   "default" => "yes",
   "type" => "arclite_search"),

  array(
   "id" => "arclite_footer",
   "default" => "",
   "type" => "arclite_footer"),

  array(
   "id" => "arclite_css",
   "default" => "",
   "type" => "arclite_css"),

  array(
   "id" => "arclite_headercolor",
   "default" => "261c13",
   "type" => "arclite_headercolor"),

  array(  "type" => "close")
);

function arclite_options() {
  global $options;

  if ( 'save' == $_REQUEST['action'] ) {

    foreach ($options as $value) {
     if( !isset( $_REQUEST[ $value['id'] ] ) ) {  } else { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } }
     if(stristr($_SERVER['REQUEST_URI'],'&saved=true')) {
     $location = $_SERVER['REQUEST_URI'];
    } else {
     $location = $_SERVER['REQUEST_URI'] . "&saved=true";
    }

    if ($_FILES["file-logo"]["type"]){
     $directory = dirname(__FILE__) . "/upload/";
     move_uploaded_file($_FILES["file-logo"]["tmp_name"],
     $directory . $_FILES["file-logo"]["name"]);
     update_option('arclite_logoimage', get_option('siteurl'). "/wp-content/themes/". get_option('template')."/upload/". $_FILES["file-logo"]["name"]);
    }

    if ($_FILES["file-header"]["type"]){
     $directory = dirname(__FILE__) . "/upload/";
     move_uploaded_file($_FILES["file-header"]["tmp_name"],
     $directory . $_FILES["file-header"]["name"]);
     update_option('arclite_headerimage', get_option('siteurl'). "/wp-content/themes/". get_option('template')."/upload/". $_FILES["file-header"]["name"]);
    }

    if ($_FILES["file-header2"]["type"]){
     $directory = dirname(__FILE__) . "/upload/";
     move_uploaded_file($_FILES["file-header2"]["tmp_name"],
     $directory . $_FILES["file-header2"]["name"]);
     update_option('arclite_headerimage2', get_option('siteurl'). "/wp-content/themes/". get_option('template')."/upload/". $_FILES["file-header2"]["name"]);
    }

    header("Location: $location");
    die;
  }

  // set default options
  foreach ($options as $default) {
  if(get_option($default['id'])=="") {
  	update_option($default['id'],$default['default']);
  }
  }

    /*
  // delete all options
  foreach ($options as $default) {
  delete_option($default['id'],$default['default']);
  }
  */

  // add_menu_page('Arclite', __('Arclite theme','arclite'), 10, 'arclite-settings', 'arclite_admin');
  add_theme_page(__('Arclite settings','arclite'), __('Arclite settings','arclite'), 10, 'arclite-settings', 'arclite_admin');
}

function arclite_admin() {
    global $options;
?>
<div class="wrap">
  <h2 class="alignleft"><?php _e("Arclite theme settings","arclite");?></h2><a class="alignright" style="margin: 20px;" href="http://digitalnature.ro/projects/arclite">Arclite homepage</a>
  <br clear="all" />
  <?php if ( $_REQUEST['saved'] ) { ?><div id="message" class="updated fade"><p><strong><?php _e('Settings saved.','arclite'); ?></strong></p></div><?php } ?>
  <style type="text/css"> @import "<?php print get_option('siteurl'). "/wp-content/themes/". get_option('template') ?>/js/colorpicker/colorpicker.css"; </style>
  <script type="text/javascript" src="<?php print get_option('siteurl'). "/wp-content/themes/". get_option('template') ?>/js/colorpicker/colorpicker.js"></script>
  <script type="text/javascript">

   // disable the ability to change options based on what the user previously selected
   function checkoptions(){
    if (document.getElementById('arclite_imageless-yes').checked){
      document.getElementById('arclite_header').disabled=true;
      document.getElementById("userheader").style.display = "none";
      document.getElementById("usercolor").style.display = "none";
    }
    else {
      document.getElementById('arclite_header').disabled=false;
      var headervalue = document.getElementById("arclite_header").value;
      if(headervalue == "user") { document.getElementById("userheader").style.display = "block"; } else { document.getElementById("userheader").style.display = "none"; }
      if(headervalue == "user2") { document.getElementById("usercolor").style.display = "block"; } else { document.getElementById("usercolor").style.display = "none"; }
    };

    if (document.getElementById('arclite_logo-yes').checked){
      document.getElementById("userlogo").style.display = "block";
    }
    else { document.getElementById("userlogo").style.display = "none"; }


   }

   // run at page load
   jQuery(document).ready(function() {
    checkoptions();


   jQuery('#arclite_headercolor').ColorPicker({
	onSubmit: function(hsb, hex, rgb) {
		jQuery('#arclite_headercolor').val(hex);
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	},
	onChange: function(hsb, hex, rgb) {
		jQuery('#arclite_headercolor').val(hex);
        jQuery('#arclite_headercolor').css("background-color","#"+hex);
        colortype = hex[0];
        if (isNaN(colortype)) jQuery('#arclite_headercolor').css("color","#000");
        else jQuery('#arclite_headercolor').css("color","#fff");
	}
    })
    .bind('keyup', function(){
    	jQuery(this).ColorPickerSetColor(this.value);
    });
   });

  </script>

<form method="post" id="myForm" enctype="multipart/form-data" onclick="checkoptions();">

 <div id="poststuff" class="metabox-holder">

  <div class="stuffbox">
   <h3><label for="link_url"><?php _e("General","arclite"); ?></label></h3>
    <div class="inside">
        <table class="form-table" style="width: auto">
    <?php
     foreach ($options as $value) {
      switch ( $value['type'] ) {
        case "arclite_imageless": ?>
        <tr>
        <th scope="row"><?php _e("Disable all design-related images","arclite") ?><br /><?php _e("(Full CSS layout, no background images)","arclite"); ?></th>
        <td>
         <label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-yes" type="radio" value="yes"<?php if ( get_option( $value['id'] ) == "yes") { echo " checked"; } ?> /><?php _e("Yes","arclite"); ?></label>
         &nbsp;&nbsp;
         <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-no" type="radio" value="no"<?php if ( get_option( $value['id'] ) == "no") { echo " checked"; } ?> /><?php _e("No","arclite"); ?></label>
        </td>
        </tr>

      <?php break;
        case "arclite_jquery": ?>

        <tr>
        <th scope="row"><?php _e("Use jQuery effects","arclite"); ?><br /><?php _e("(for testing purposes only, you shouldnt change this)","arclite"); ?></th>
        <td>
         <label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-yes" type="radio" value="yes"<?php if ( get_option( $value['id'] ) == "yes") { echo " checked"; } ?> /><?php _e("Yes","arclite"); ?></label>
         &nbsp;&nbsp;
         <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-no" type="radio" value="no"<?php if ( get_option( $value['id'] ) == "no") { echo " checked"; } ?> /><?php _e("No","arclite"); ?></label>
        </td>
        </tr>

      <?php break;
      case "arclite_meta": ?>
        <tr>
        <th scope="row"><?php _e("Homepage meta keywords","arclite"); ?><br><?php _e("(Separate with commas. Tags are used as keywords on other pages. Leave empty if you are using a SEO plugin)","arclite"); ?></th>
        <td>
         <label>
          <input type="text" size="60" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php print get_option($value['id']); ?>" />
         </label>
        </td>
        </tr>

      <?php break;
	}
	}
	?>
        </table>
       </div>
     </div>
   </div>


 <div id="poststuff" class="metabox-holder">

  <div class="stuffbox">
   <h3><label for="link_url"><?php _e("Header","arclite"); ?></label></h3>
    <div class="inside">
        <table class="form-table" style="width: auto">
    <?php
     foreach ($options as $value) {
      switch ( $value['type'] ) {
        case "arclite_topnav": ?>
        <tr>
        <th scope="row"><?php _e("Top navigation shows","arclite"); ?></th>
        <td>
         <label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-pages" type="radio" value="pages"<?php if ( get_option( $value['id'] ) == "pages") { echo " checked"; } ?> /><?php _e("Pages","arclite"); ?></label>
         &nbsp;&nbsp;
         <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-categories" type="radio" value="categories"<?php if ( get_option( $value['id'] ) == "categories") { echo " checked"; } ?> /><?php _e("Categories","arclite"); ?></label>
        </td>
        </tr>

      <?php break;
        case "arclite_search": ?>
        <tr>
        <th scope="row"><?php _e("Show search","arclite"); ?></th>
        <td>
         <label><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-yes" type="radio" value="yes"<?php if ( get_option( $value['id'] ) == "yes") { echo " checked"; } ?> /><?php _e("Yes","arclite"); ?></label>
         &nbsp;&nbsp;
         <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-no" type="radio" value="no"<?php if ( get_option( $value['id'] ) == "no") { echo " checked"; } ?> /><?php _e("No","arclite"); ?></label>
        </td>
        </tr>

      <?php break;
        case "arclite_header": ?>

        <tr>
        <th scope="row"><?php _e("Header background","arclite"); ?></th>
        <td>
         <label>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="code">
              <option <?php if (get_option($value['id'])=='default') {?> selected="selected" <?php } ?> value="default">Light Noise: brown (default)</option>
              <option <?php if (get_option($value['id'])=='green') {?> selected="selected" <?php } ?> value="green">Light Noise: green</option>
              <option <?php if (get_option($value['id'])=='red') {?> selected="selected" <?php } ?> value="red">Light Noise: red</option>
              <option <?php if (get_option($value['id'])=='blue') {?> selected="selected" <?php } ?> value="blue">Light Noise: blue</option>
              <option <?php if (get_option($value['id'])=='wall') {?> selected="selected" <?php } ?> value="wall">Dirty Wall</option>
              <option <?php if (get_option($value['id'])=='wood') {?> selected="selected" <?php } ?> value="wood">Wood</option>
              <option style="color: #ed1f24" <?php if (get_option($value['id'])=='user') {?> selected="selected" <?php } ?> value="user"><?php _e('User defined image (upload)','arclite'); ?></option>
              <option style="color: #ed1f24" <?php if (get_option($value['id'])=='user2') {?> selected="selected" <?php } ?> value="user2"><?php _e('User defined color','arclite'); ?></option>
            </select>
         </label>

         <div id="userheader" style="display: none;">
          <?php _e('Upload a 960x190 image for best fit:','arclite'); ?><br />
          <input type="file" name="file-header" id="file-header" />
          <?php if(get_option('arclite_headerimage')) { echo '<div><img src="'; echo get_option('arclite_headerimage'); echo '"  style="margin-top:10px;" /></div>'; } ?>
          <?php _e('Repeat background (same size, optional):','arclite'); ?><br />
          <input type="file" name="file-header2" id="file-header2" />
          <?php if(get_option('arclite_headerimage2')) { echo '<div><img src="'; echo get_option('arclite_headerimage2'); echo '"  style="margin-top:10px;" /></div>'; } ?>
         </div>

         <div id="usercolor" style="display: none;">
          <?php _e('Pick a color','arclite'); ?> <input type="text" id="arclite_headercolor" name="arclite_headercolor" style="background: #<?php print get_option('arclite_headercolor'); ?>; color: #<?php $colortype = get_option('arclite_headercolor'); $colortype = $colortype[0]; if(is_numeric($colortype)) print 'fff'; else print '000';  ?>" value="<?php print get_option('arclite_headercolor'); ?>" />
         </div>

        </td>
        </tr>

      <?php break;
      case "arclite_logo": ?>

        <tr>
        <th scope="row"><?php _e("Logo image","arclite"); ?></th>
        <td>
         <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-yes" type="radio" value="yes"<?php if ( get_option( $value['id'] ) == "yes") { echo " checked"; } ?> /><?php _e("Yes","arclite"); ?></label>

         &nbsp;&nbsp;
        <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>-no" type="radio" value="no"<?php if ( get_option( $value['id'] ) == "no") { echo " checked"; } ?> /><?php _e("No","arclite"); ?></label>

        <div id="userlogo">
        <?php _e("Upload a custom logo image","arclite"); ?><br />
         <input type="file" name="file-logo" id="file-logo" />
         <?php if(get_option('arclite_logoimage')) { echo '<div><img src="'; echo get_option('arclite_logoimage'); echo '"  style="margin-top:10px;border:1px solid #aaa;padding:10px;" /></div>'; } ?>
        </div>

        </td>
        </tr>




	<?php break;
    	}
      }
	?>
        </table>
       </div>
     </div>


	 <div class="stuffbox">
      <h3><label for="link_url"><?php _e("Sidebar","arclite"); ?></label></h3>
      <div class="inside">
        <table class="form-table" style="width: auto">
<?php
 foreach ($options as $value) {
  switch ( $value['type'] ) {
	case "arclite_sidebarpos": ?>

        <tr>
        <th scope="row"><?php _e("Sidebar position","arclite"); ?></th>
        <td>
         <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="radio" value="left"<?php if ( get_option( $value['id'] ) == "left") { echo " checked"; } ?> /><?php _e("Left","arclite"); ?></label>

         &nbsp;&nbsp;
        <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="radio" value="right"<?php if ( get_option( $value['id'] ) == "right") { echo " checked"; } ?> /><?php _e("Right","arclite"); ?></label>
        </td>
        </tr>
	<?php break;
	case "arclite_sidebarcat": ?>
        <tr>
        <th scope="row"><?php _e("Show theme-default category block","arclite"); ?></th>
        <td>
         <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="radio" value="yes"<?php if ( get_option( $value['id'] ) == "yes") { echo " checked"; } ?> /><?php _e("Yes","arclite"); ?></label>

         &nbsp;&nbsp;
        <label><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="radio" value="no"<?php if ( get_option( $value['id'] ) == "no") { echo " checked"; } ?> /><?php _e("No","arclite"); ?></label>
        </td>
        </tr>
    <?php
    	}
     	}
	?>
        </table>
      </div>
     </div>


     	 <div class="stuffbox">
      <h3><label for="link_url"><?php _e("Footer","arclite"); ?></label></h3>
      <div class="inside">
        <table class="form-table" style="width: auto">
<?php
 foreach ($options as $value) {
  switch ( $value['type'] ) {
	case "arclite_footer": ?>

        <tr>
        <th scope="row"><?php _e("Add content","arclite"); ?><br /><?php _e("(HTML allowed)","arclite"); ?></th>
        <td>
         <label>
          <textarea rows="4" cols="60" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php print get_option($value['id']); ?></textarea>
         </label>
        </td>
        </tr>

    <?php
    	}
    	}
	?>
        </table>
      </div>
     </div>



     	 <div class="stuffbox">
      <h3><label for="link_url"><?php _e("User CSS code","arclite"); ?></label></h3>
      <div class="inside">
        <table class="form-table" style="width: auto">
<?php
 foreach ($options as $value) {
  switch ( $value['type'] ) {
	case "arclite_css": ?>

        <tr>
        <th scope="row"><?php _e("Modify anything related to design using simple CSS","arclite"); ?><br /><br /><span style="color: #ed1f24"><?php _e("Avoid modifying theme files and use this option instead to preserve changes after update","arclite"); ?></span></th>
        <td valign="top">
         <label>
          <textarea rows="12" cols="60" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php print get_option($value['id']); ?></textarea>
         </label>
        </td>
        <td valign="top">
        Examples:
        <p><em style="color: #5db408">/* Set a fixed page width (960px) */</em><br /><code>.block-content{ width: 960px; max-width: 960px; }</code></p>
        <p><em style="color: #5db408">/* Set fluid page width (not recommended) */</em><br /><code>.block-content{ width: 95%; max-width: 95%; }</code></p>

        <p><em style="color: #5db408">/* Hide post information bar */</em><br /><code>.post p.post-date, .post p.post-author{ display: none; }</code></p>
        <p><em style="color: #5db408">/* Use Windows Arial style fonts, instead of Mac's Lucida */</em><br /><code>body, input, textarea, select, h1, h2, h6,<br />.post h3, .box .titlewrap h4{ font-family: Arial, Helvetica; }</code></p>

        </td>
        </tr>

    <?php
    	}
    	}
	?>
        </table>
      </div>
     </div>


</div>
    <input name="save" type="submit" class="button-primary" value="Save changes" />
	<input type="hidden" name="action" value="save" />


<?php

?>



</form>
</div>
<?php
}

add_action('admin_menu', 'arclite_options');

// check if sidebar has widgets
function is_sidebar_active($index = 1) {
  global $wp_registered_sidebars;

  if (is_int($index)): $index = "sidebar-$index";
  else :
  	$index = sanitize_title($index);
  	foreach ((array) $wp_registered_sidebars as $key => $value):
    	if ( sanitize_title($value['name']) == $index):
		 $index = $key;
	     break;
		endif;
	endforeach;
  endif;

  $sidebars_widgets = wp_get_sidebars_widgets();
  if (empty($wp_registered_sidebars[$index]) || !array_key_exists($index, $sidebars_widgets) || !is_array($sidebars_widgets[$index]) || empty($sidebars_widgets[$index]))
    return false;
  else
  	return true;
}

if ( function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Default sidebar',
		'before_widget' => '<li class="block widget %2$s" id="%1$s"><div class="box">',
		'after_widget' => '</div></div></div></div></div></div> </div></li>',
		'before_title' => '<div class="titlewrap"><h4><span>',
		'after_title' => '</span></h4></div> <div class="wrapleft"><div class="wrapright"><div class="tr"><div class="bl"><div class="tl"><div class="br the-content">'
    ));

    register_sidebar(array(
        'name' => 'Footer',
		'before_widget' => '<li class="block widget %2$s" id="%1$s"><div class="the-content">',
		'after_widget' => '</div></li>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>'
    ));
}


function list_pings($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment;
 ?>
 <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php
}

// custom comments
function list_comments($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment;
 global $commentcount;
 if(!$commentcount) { $commentcount = 0; }
 ?>
  <!-- comment entry -->
  <li <?php if (function_exists('comment_class')) { if (function_exists('get_avatar') && get_option('show_avatars')) echo comment_class('with-avatar'); else comment_class(); } else { print 'class="comment';if (function_exists('get_avatar') && get_option('show_avatars')) print ' with-avatar'; print '"';  } ?> id="comment-<?php comment_ID() ?>">
   <div class="comment-mask<?php if($comment->comment_author_email == get_the_author_email()) echo ' admincomment'; else echo ' regularcomment'; ?>">
    <div class="comment-main">
     <div class="comment-wrap1">
      <div class="comment-wrap2">
       <div class="comment-head">
        <p>
          <?php
           if (get_comment_author_url()):
            $authorlink='<a id="commentauthor-'.get_comment_ID().'" href="'.get_comment_author_url().'">'.get_comment_author().'</a>';
           else:
            $authorlink='<b id="commentauthor-'.get_comment_ID().'">'.get_comment_author().'</b>';
           endif;
           printf(__('%s by %s at %s', 'arclite'), '<a href="#comment-'.get_comment_ID().'">#'.++$commentcount.'</a>', $authorlink, get_comment_time(__('F jS, Y', 'arclite')), get_comment_time(__('H:i', 'arclite')));
          ?>
         </p>

         <?php if(comments_open()) { ?>
         <p class="controls">

             <?php
              if (function_exists('comment_reply_link')) {
               comment_reply_link(array_merge( $args, array('add_below' => 'comment-reply', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span>'.__('Reply','arclite').'</span>'.$my_comment_count)));
              } ?>
              | <a title="<?php _e('Quote','arclite'); ?>" href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment-body-<?php comment_ID() ?>', 'comment');"><span><?php _e('Quote','arclite'); ?></span></a> <?php edit_comment_link('| Edit'); ?>


         </p>
          <?php } ?>
          </div>
         <div class="comment-body clearfix" id="comment-body-<?php comment_ID() ?>">
         <?php if (function_exists('get_avatar') && get_option('show_avatars')) { ?>
       <div class="avatar">
         <?php echo get_avatar($comment, 64); ?>
       </div>
       <?php } ?>

       <?php if ($comment->comment_approved == '0') : ?>
		 <p class="error"><small><?php _e('Your comment is awaiting moderation.','arclite'); ?></small></p>
		 <?php endif; ?>

          <?php comment_text(); ?>
          <a id="comment-reply-<?php comment_ID() ?>"></a>

      </div>
                 </div>
                </div>
               </div>
              </div>


<?php
  }
?>


 