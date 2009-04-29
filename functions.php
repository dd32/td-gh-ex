<?php
/* Arclite/digitalnature */

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
class ArcliteOptions {
	function getOptions() {
		$options = get_option('arclite_options');
		if (!is_array($options)) {
			$options['metakeywords'] = '';
			$options['header'] = 'default';
			$options['imageless'] = false;
			$options['hidehometab'] = false;
			$options['hidecategories'] = false;
			$options['hidesearch'] = false;
			$options['categorytabs'] = false;
			$options['sidebarpos'] = 'right';
			$options['nojquery'] = false;
			$options['customcss'] = '';
			update_option('arclite_options', $options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['arclite_save'])) {
			$options = ArcliteOptions::getOptions();

			// meta keywords
			$options['metakeywords'] = stripslashes($_POST['metakeywords']);

			// no images?
			if ($_POST['imageless']) {  $options['imageless'] = (bool)true;	} else { $options['imageless'] = (bool)false; }
			$options['imageless'] = stripslashes($_POST['imageless']);

			// header bg
			$options['header'] = stripslashes($_POST['header']);

			// hide home tab
			if ($_POST['hidehometab']) {  $options['hidehometab'] = (bool)true;	} else { $options['hidehometab'] = (bool)false; }
			$options['hidehometab'] = stripslashes($_POST['hidehometab']);

			// hide categories
			if ($_POST['hidecategories']) {  $options['hidecategories'] = (bool)true;	} else { $options['hidecategories'] = (bool)false; }
			$options['hidecategories'] = stripslashes($_POST['hidecategories']);

			// hide search
			if ($_POST['hidesearch']) {  $options['hidesearch'] = (bool)true;	} else { $options['hidesearch'] = (bool)false; }
			$options['hidesearch'] = stripslashes($_POST['hidesearch']);

			// show category tabs instead of page tabs
			if ($_POST['categorytabs']) {  $options['categorytabs'] = (bool)true;	} else { $options['categorytabs'] = (bool)false; }
			$options['categorytabs'] = stripslashes($_POST['categorytabs']);


            // page width
			$options['sidebarpos'] = stripslashes($_POST['sidebarpos']);


			// disable jquery
			if ($_POST['nojquery']) {  $options['nojquery'] = (bool)true;	} else { $options['nojquery'] = (bool)false; }
			$options['nojquery'] = stripslashes($_POST['nojquery']);

			// meta keywords
			$options['customcss'] = stripslashes($_POST['customcss']);

			update_option('arclite_options', $options);

		} else {
			ArcliteOptions::getOptions();
		}

		add_theme_page(__("Arclite Theme Options","arclite"), __("Arclite Theme Options","arclite"), 'edit_themes', basename(__FILE__), array('ArcliteOptions', 'display'));
	}

   function display() {
   $options = ArcliteOptions::getOptions();
    ?>
      <form action="#" method="post" enctype="multipart/form-data" name="arclite_form" id="arclite_form">
      <div class="wrap">
            <h2><?php _e('Arclite Theme Options','arclite'); ?></h2>
            <br />
            <p style="color: #ed1f24">Note that Arclite is still under development; some options may change, others might be implemented. Make sure you backup your settings (especially the Custom CSS code part)</p>
            <label><?php _e('Meta keywords:','arclite'); ?></label><br />
            <input type="text" name="metakeywords" id="metakeywords" class="code" value="<?php echo($options['metakeywords']); ?>" /><br /><em><?php _e('Separate with commas. Leave empty if you are using a SEO plugin','arclite'); ?></em>
            </p>
            <br />
            <p>
            <input name="imageless" type="checkbox" value="checkbox" <?php if($options['imageless']) echo "checked='checked'"; ?> />
            <?php _e('Disable all design-related images ','arclite'); ?><em style="color: #ed1f24">(Testing)</em><br /><em><?php _e('(Full CSS layout)','arclite'); ?></em>
            </p>
            <br />
            <p>
            <label><?php _e('Header background:','arclite'); ?></label><br />
            <select name="header" id="header" class="code">
              <option <?php if ($options['header']=='default') {?> selected="selected" <?php } ?> value="default">Default (Dark brown noise)</option>
              <option <?php if ($options['header']=='wall') {?> selected="selected" <?php } ?> value="wall">Dirty Wall</option>
              <option <?php if ($options['header']=='wood') {?> selected="selected" <?php } ?> value="wood">Wood</option>
            </select>
            </p>
            <p>
            <input name="hidehometab" type="checkbox" value="checkbox" <?php if($options['hidehometab']) echo "checked='checked'"; ?> />
            <?php _e('Disable homepage navigation link','arclite'); ?><br /><em><?php _e('Check this if you are using a static page as the homepage','arclite'); ?></em>
            </p>
            <br />
            <p>
            <input name="categorytabs" type="checkbox" value="checkbox" <?php if($options['categorytabs']) echo "checked='checked'"; ?> />
            <?php _e('Show the categories as main navigation','arclite'); ?><br /><em><?php _e('(instead of pages)','arclite'); ?></em>
            </p>
            <br />
            <p>
            <input name="hidecategories" type="checkbox" value="checkbox" <?php if($options['hidecategories']) echo "checked='checked'"; ?> />
            <?php _e('Disable the default category block in the sidebar','arclite'); ?><br /><em><?php _e('Check if you prefer the widgetized category display or just want to hide the categories','arclite'); ?></em>
            </p>
            <br />
            <p>
            <input name="hidesearch" type="checkbox" value="checkbox" <?php if($options['hidesearch']) echo "checked='checked'"; ?> />
            <?php _e('Disable the default search block from the header','arclite'); ?><br /><em><?php _e('Check if you don\'t like the theme-default search look','arclite'); ?></em>
            </p>
            <br />
            <br />
            <p>
            <?php _e('Sidebar position:','arclite'); ?>
            <label>
            <input name="sidebarpos" type="radio" value="right" <?php if($options['sidebarpos'] != 'left') echo "checked='checked'"; ?> />
            <?php _e('Right (default)','arclite'); ?>
            </label>
            <label style="padding-left: 15px;">
            <input name="sidebarpos" type="radio" value="left" <?php if($options['sidebarpos'] == 'left') echo "checked='checked'"; ?> />
            <?php _e('Left','arclite'); ?>
            </label>
            </p>
            <br />
            <p>
            <input name="nojquery" type="checkbox" value="checkbox" <?php if($options['nojquery']) echo "checked='checked'"; ?> />
            <?php _e('Disable jQuery and the associated code','arclite'); ?><br /><em><?php _e('This will reduce the page load with ~70 KB, but will also disable some features and effects.<br />You shouldn\'t change this unless you have problems with your host regarding bandwidth','arclite'); ?></em>
            </p>
            <br />
            <h2><?php _e('Custom CSS code','arclite'); ?></h2>
            <p><em><?php printf(__('Here you can add or change anything related to design if you have some basic CSS knowledge. Check %s to see existing styles, which you can redefine here.','arclite'),'<a href="'.get_bloginfo('template_url').'/style.css">style.css</a>'); ?></em> <?php echo'<br /><br /><em style="color: #ed1f24">';_e('Don\'t modify style.css if you wish to preserve your changes after theme update! Use this option instead.','arclite');echo '</em><br /><br />'?>
            <textarea name="customcss" id="customcss" class="code" style='float: left' rows="18" cols="38"><?php echo($options['customcss']); ?></textarea>
            </p>
            <br clear="left" />



            <p class="submit">
            <input class="button-primary" type="submit" name="arclite_save" value="<?php _e('Save Changes','arclite'); ?>" />
            </p>

      </div>
      </form>
   <?php
  }
}




// register functions
add_action('admin_menu', array('ArcliteOptions', 'add'));

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
		'before_widget' => '<li><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></li>',
		'before_title' => '<h2 class="title">',
		'after_title' => '</h2>'
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
 ?> <!-- comment entry -->
	<li <?php if (function_exists('get_avatar') && get_option('show_avatars')) echo comment_class('with-avatar'); else comment_class(); ?> id="comment-<?php comment_ID() ?>">




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

             <?php comment_reply_link(array_merge( $args, array('add_below' => 'comment-reply', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<span>'.__('Reply','arclite').'</span>'.$my_comment_count))) ?> | <a title="<?php _e('Quote','arclite'); ?>" href="javascript:void(0);" onclick="MGJS_CMT.quote('commentauthor-<?php comment_ID() ?>', 'comment-<?php comment_ID() ?>', 'comment-body-<?php comment_ID() ?>', 'comment');"><span><?php _e('Quote','arclite'); ?></span></a> <?php edit_comment_link('| Edit'); ?>


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
