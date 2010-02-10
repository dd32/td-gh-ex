<?php  function excerpt_ellipse($text) {
   return str_replace('[...]', ' <a href="'.get_permalink().'">...Read more.</a>', $text); }
add_filter('the_excerpt', 'excerpt_ellipse');
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>"><div class="comment-pic">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
</div>
<div class=comment-span>
<h4 class="author-name"> <?php printf(__('<cite class="fn">%s</cite> says:'), comment_author()) ?></h4>
   <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>
<div class="comment-meta commentmetadata"><p><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></p></div>
<?php comment_text() ?>&nbsp; 
      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div></p>
<div class="chase">
    </div>
      
      </div></div>
<?php
        }
?>
<?php include ("scripts/base.php");
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'sidebar',
'before_widget' => '<div class="sidebar-box">',
'after_widget' => '</div>',
'before_title' => '<h3 class="widget">',
'after_title' => '</h3>',
));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Footer 1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="f1">',
        'after_title' => '</h3>',
    ));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Footer 2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="f1">',
        'after_title' => '</h3>',
    ));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Footer 3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="f1">',
        'after_title' => '</h3>',
    ));    
function mytheme_add_admin() {
    global $themename, $shortname, $options;
 if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); }  }
                header("Location: themes.php?page=functions.php&saved=true");
                die;
        } 
           else if( 'reset' == $_REQUEST['action'] ) {
         foreach ($options as $value) {
                delete_option( $value['id'] ); }
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
add_theme_page($themename." Options", "".$themename."  Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="green-message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="red-message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/ajaxtabs.js">


/***********************************************
* Ajax Tabs Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<div id="flowertabs" class="modernbricksmenu2"><ul>
<li><a href="" rel="x1x"  rev="z-a">Home</a></li>
<li><a href="" rel="x1x" rev="z-b">Page and Container</a></li>
<li><a href="" rel="x1x" rev="z-g">Head</a></li>
<li><a href="" rel="x1x" rev="z-s">Navigation</a></li>
<li><a href="" rel="x1x"rev="z-c">Front Page</a></li>
<li><a href="" rel="x1x" rev="z-d">Post Title & Meta</a></li>
<li><a href="" rel="x1x" rev="z-e">Comments</a></li>
<li><a href="" rel="x1x" rev="z-f">Images</a></li>
<li><a href="" rel="x1x" rev="z-h">Footer</a></li>
<li><a href="" rel="x1x" rev="z-i">P Text</a></li>
<li><a href="" rel="x1x" rev="z-j">Sidebar</a></li>
<li><a href="" rel="x1x" rev="z-aa">Footer Widget Areas</a></li>
<li><a href="" rel="x1x" rev="z-k">Headings</a></li>
<li><a href="" rel="x1x" rev="z-l">Sticky Posts</a></li>
<li><a href="" rel="x1x" rev="z-m">Tag Cloud </a></li>
<li><a href="" rel="x1x" rev="z-n">Block Quotes</a></li>
<li><a href="" rel="x1x" rev="z-o">Adverts</a></li>
<li><a href="" rel="x1x" rev="z-w">Links</a></li>
<li><a href="" rel="x1x" rev="z-v">Lists</a></li>
<li><a href="" rel="x1x" rev="z-u">Tables</a></li>
<li><a href="" rel="x1x" rev="z-t">Error Pages</a></li>
<li><a href="" rel="x1x" rev="z-p">Google Anayltics</a></li>
<li><a href="" rel="x1x" rev="z-xx">Favicon</a></li>
<li><a href="" rel="x1x" rev="z-xa">Tutorials</a></li>
<li><a href="" rel="x1x" rev="z-q">Help</a></li>
<li><a href="" rel="x1x" rev="z-r">FREE PSD</a></li>
<li><a href="" rel="x1x" rev="z-x">Reset Options</a></li>
</ul><div class="clearbox"></div></div>
<div class="clearbox"></div>
 <?php
include ("scripts/base.php");
include ("scripts/melon.php"); 
include ("scripts/backend.php"); 
?>
<div id="x1x" style="display:none;">
</div>
<br style="clear: left" />
<script type="text/javascript">
var myflowers=new ddajaxtabs("flowertabs", "x1x")
myflowers.setpersist(true)
myflowers.setselectedClassTarget("link") //"link" or "linkparent"
myflowers.init()
</script>
<?php
}
add_action('admin_menu', 'mytheme_add_admin');
?>