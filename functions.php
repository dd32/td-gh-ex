<?php  
if ( ! function_exists( 'adt_get_option' ) ) :	
  function adt_get_option($Aoption_name, $default = null)
  {
    return stripslashes(get_option($Aoption_name, $default));
  };
endif;

if ( ! function_exists( 'adt_template_setup' ) ) :	
  function adt_template_setup() 
  {	
    global $adt_content_width, $adt_favicon_url, $adt_footer_text; 
	
    if ( ! isset( $content_width ) ) 
      $content_width = 630;
  
	load_theme_textdomain('adsticle', get_template_directory() . '/languages');
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if (is_readable($locale_file ))
	  require_once($locale_file);	
	  
    $adt_favicon_url = get_template_directory_uri().'/img/favicon.png';	
    $adt_footer_text = '&copy;'.date('Y').' <a href="'.get_home_url().'">'.get_bloginfo('name').'</a>.'
      .' Powered by <a href="http://wordpress.org">WordPress</a>.';	  

    if (function_exists('add_theme_support')) 
	{
      add_theme_support('menus');	  
      register_nav_menu('primary', __('primary', 'adsticle'));	
	};
		
	add_theme_support( 'automatic-feed-links' );	
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 100, 100, true );
	add_custom_background();	
		
	if ( ! defined( 'ADT_HEADER_TEXTCOLOR' ) )
	  define( 'ADT_HEADER_TEXTCOLOR', '87fda1' );
	if ( ! defined( 'ADT_HEADER_IMAGE' ) )
	  define( 'ADT_HEADER_IMAGE', '%s/img/top-default1.png' );
	define( 'ADT_HEADER_IMAGE_WIDTH', apply_filters( 'adsticle_header_image_width', 1000 ) );
	define( 'ADT_HEADER_IMAGE_HEIGHT', apply_filters( 'adsticle_header_image_height', 80 ) );
	//set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	if ( ! defined( 'ADT_NO_HEADER_TEXT' ) )
	  define( 'ADT_NO_HEADER_TEXT', false );
	add_custom_image_header( '', 'adsticle_admin_header_style' );
	register_default_headers( array(
		'default1' => array(
			'url' => '%s/img/top-default1.jpg',
			'thumbnail_url' => '%s/img/top-default1-thumb.jpg',
			'description' => __( 'Default', 'adsticle' )
		)));
	
    if ( ! defined( 'ADT_BACKGROUND_COLOR' ) )
	  define( 'ADT_BACKGROUND_COLOR', '#14253e' );	
    if ( ! defined( 'ADT_COLOR_H' ) )
	  define( 'ADT_COLOR_H', '#1152c0' );
	if ( ! defined( 'ADT_COLOR_LINK' ) )
	  define( 'ADT_COLOR_LINK', '#008000' );	
	if ( ! defined( 'ADT_COLOR_TEXT' ) )	
	  define( 'ADT_COLOR_TEXT', '#000000' );
	if ( ! defined( 'ADT_COLOR_STICKY' ) )	
	  define( 'ADT_COLOR_STICKY', '#7af0b5' );
	if ( ! defined( 'ADT_COLOR_BACKGROUND1' ) )
	  define( 'ADT_COLOR_BACKGROUND1', '#ffffff' );	
	if ( ! defined( 'ADT_COLOR_LINE' ) )
	  define( 'ADT_COLOR_LINE', '#8ab1b7' );
	if ( ! defined( 'ADT_COLOR_MENUBACKGROUND' ) )
	  define( 'ADT_COLOR_MENUBACKGROUND', '#8ab1b7' );	  
	  
	if ( ! defined( 'ADT_WIDTH_LINE_MAINMENU' ) )
	  define( 'ADT_WIDTH_LINE_MAINMENU', '3' );  
	if ( ! defined( 'ADT_WIDTH_LINE_WIDGET' ) )
	  define( 'ADT_WIDTH_LINE_WIDGET', '1' );  
	if ( ! defined( 'ADT_WIDTH_LINE_FOOTER' ) )
	  define( 'ADT_WIDTH_LINE_FOOTER', '1' );  
  };
endif;
  
  add_action('after_setup_theme', 'adt_template_setup');
  
  add_action('init', 'adt_ilc_farbtastic_script');
  
if ( ! function_exists( 'adt_ilc_farbtastic_script' ) ) :	
  function adt_ilc_farbtastic_script() 
  { 
    if (is_admin())
	{
      wp_enqueue_style( 'farbtastic' );
      wp_enqueue_script( 'farbtastic' );
	};
  };
 endif;
 
  function adsticle_sidebars()
  {
  
  if ( function_exists('register_sidebar') )
  {   	
    register_sidebar(array(
	    'id' => 'big1',
        'name' => __('First right wide sidebar area', 'adsticle'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
		
	register_sidebar(array(
	    'id' => 'small-left1',
        'name' => __('First right slim sidebar area (left part)', 'adsticle'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	register_sidebar(array(
	    'id' => 'small-right1',
        'name' => __('First right slim sidebar area (right part)', 'adsticle'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	register_sidebar(array(
	    'id' => 'big2',
        'name' => __('Second right wide sidebar area', 'adsticle'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	register_sidebar(array(
	    'id' => 'small-left2',
        'name' => __('Second right slim sidebar area (left part)', 'adsticle'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
	
	register_sidebar(array(
	    'id' => 'small-right2',
        'name' => __('Second right slim sidebar area (right part)', 'adsticle'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
		
  };	
  
  };
  
  add_action( 'widgets_init', 'adsticle_sidebars' );
  if ( ! function_exists( 'adsticle_comment' ) ) :	
  function adsticle_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'adsticle' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'adsticle' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'adsticle' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'adsticle' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'adsticle' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'adsticle' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
  };
  endif; 
  if ( ! function_exists( 'adsticle_admin_header_style' ) ) :

  function adsticle_admin_header_style() {
?>
<style type="text/css">      
  #headimg #name {position:relative; left: 10px; top: -5px; font-size: 35px;
    text-decoration: none; font-weight:400; line-height: 1.3em; margin:0px; padding: 0px;
	font-family:"Verdana", "Adobe Garamond", "Georgia", "Times New Roman", "serif";}	
	
  #headimg #desc { position:relative; left: 10px; top: -8px;
  font-size: 14px; margin:0px; padding:0px; text-transform:uppercase;}
</style>
<?php
  };
  endif;
  
  add_action('wp_head', 'adsticle_head');
    if ( ! function_exists( 'adsticle_head' ) ) :
  function adsticle_head()
  {  
    if (!is_admin())
	{
	  global $adt_favicon_url;
?>	
<link rel="shortcut icon" href="<?php echo adt_get_option('adt_favicon_url', $adt_favicon_url); ?>" type="image/x-icon" />
<?php	
	  $background = get_theme_mod('background_image', false);
	  $bgcolor = get_theme_mod('background_color', false);
	  $textcolor = get_theme_mod('adt_header_textcolor', ADT_HEADER_TEXTCOLOR);
?>
<style type="text/css"> 
body, .header  {background-color:#14253e; color: <?php echo get_option('ADT_COLOR_TEXT', ADT_COLOR_TEXT); ?>}

.middle, input, textarea, .ads_728-15-top, .ads_728-15-footer {background-color:<?php echo get_option('ADT_COLOR_BACKGROUND1', ADT_COLOR_BACKGROUND1); ?> }  

.sticky {background: <?php echo get_option('ADT_COLOR_STICKY', ADT_COLOR_STICKY); ?>}
a, a:hover, a:link, a:active, a:visited {color:<?php echo get_option('ADT_COLOR_LINK', ADT_COLOR_LINK); ?>}
.header{background:white;}
.footer{background:<?php echo get_option('ADT_COLOR_BACKGROUND1', ADT_COLOR_BACKGROUND1); ?>;}

#access {background:<?php echo get_option('ADT_COLOR_BACKGROUND1', ADT_COLOR_BACKGROUND1); ?>; 
  border-bottom: <?php echo get_option('ADT_WIDTH_LINE_MAINMENU', ADT_WIDTH_LINE_MAINMENU); ?>px solid <?php echo get_option('ADT_COLOR_LINE', ADT_COLOR_LINE); ?>}
  
#access li:hover > a, #access ul ul :hover > a, #access ul ul a {background: <?php echo get_option('ADT_COLOR_MENUBACKGROUND', ADT_COLOR_MENUBACKGROUND); ?>;}

.footer {border-top: <?php echo get_option('ADT_WIDTH_LINE_FOOTER', ADT_WIDTH_LINE_FOOTER); ?>px solid <?php echo get_option('ADT_COLOR_LINE', ADT_COLOR_LINE); ?>}
.widget h3, .widget h2 {border-bottom: <?php echo get_option('ADT_WIDTH_LINE_WIDGET', ADT_WIDTH_LINE_WIDGET); ?>px solid <?php echo get_option('ADT_COLOR_LINE', ADT_COLOR_LINE); ?>}
h1,h2,h3,h4,h5, .widget_rss a.rsswidget, .post h1 a, #comments h3 {color: <?php echo get_option('ADT_COLOR_H', ADT_COLOR_H); ?>;}

<?php if (get_header_image()): ?>
.header {background: url('<?php header_image(); ?>') }  
<?php endif; ?>

.header .title h1 a {color: #<?php echo $textcolor; ?>;}
.header .title span {color: #<?php echo $textcolor; ?>; }
<?php if ('blank' == $textcolor || '' == $textcolor): ?>
.header .title h1 a, .header .title span {display:none;}
<?php endif; ?>     

<?php if (!$background && $bgcolor) : ?>
body{background-image:none;}
<?php endif; ?>       
</style>
<?php	  
	};
  };
    endif;
	    if ( ! function_exists( 'adt_options_admin_menu' ) ) :
  function adt_options_admin_menu() 
  {	    
	add_theme_page(__("Adsticle Options", 'adsticle'), __("Adsticle Options", 'adsticle'), 
	  'edit_theme_options', 'adsticle_general_options_page', 'adsticle_general_options_page');	  
  };
  endif; 
  
  add_action('admin_menu', 'adt_options_admin_menu');
if ( ! function_exists( 'adt_show_color_picker' ) ) :
  function adt_show_color_picker($Aname, $Aoption, $Adefault)
  {  
?>  
<label for="<?php echo $Aname; ?>">
<input type="text" id="<?php echo $Aname; ?>" 
name="<?php echo $Aname; ?>" value="<?php echo get_option($Aoption, $Adefault); ?>" /> 
<?php _e('Pick link color', 'adsticle'); ?></label>
<div id="<?php echo $Aname.'_p'; ?>"></div>

<script type="text/javascript">
  jQuery(document).ready(function() {
  jQuery('#<?php echo $Aname.'_p'; ?>').hide();
  jQuery('#<?php echo $Aname.'_p'; ?>').farbtastic("#<?php echo $Aname; ?>");
  jQuery("#<?php echo $Aname; ?>").click(function(){jQuery('#<?php echo $Aname.'_p'; ?>').slideToggle()});
});
</script>
<?php
   };
    endif;  
	if ( ! function_exists( 'adt_show_number_select' ) ) :
  function adt_show_number_select($Aname, $Adef, $Amax = 5)
  {
	echo '<select name="'.$Aname.'">';
    for ($i=0; $i<=$Amax; $i++)
	{
	  $s = '';
	  if ($i == $Adef) $s = ' selected ';
	  echo '<option'.$s.'>'.$i.'</option>';
    };					
    echo '</select>';
  };
 endif;  	
 $default_options = array(
     'ADT_COLOR_H' => 'ADT_COLOR_H',
     'ADT_COLOR_LINK' => 'ADT_COLOR_LINK',
	 'ADT_COLOR_TEXT' => 'ADT_COLOR_TEXT',
	 'ADT_COLOR_STICKY' => 'ADT_COLOR_STICKY',
	 'ADT_COLOR_BACKGROUND1' => 'ADT_COLOR_BACKGROUND1',
	 'ADT_COLOR_LINE' => 'ADT_COLOR_LINE',
	 'ADT_WIDTH_LINE_MAINMENU' => 'ADT_WIDTH_LINE_MAINMENU',
	 'ADT_WIDTH_LINE_WIDGET' => 'ADT_WIDTH_LINE_WIDGET',
	 'ADT_WIDTH_LINE_FOOTER' => 'ADT_WIDTH_LINE_FOOTER',
	 'ADT_COLOR_MENUBACKGROUND' => 'ADT_COLOR_MENUBACKGROUND',
	 'adt_a468x60' => trim('adt_a468x60'),
	 'adt_a728x15-top' => trim('adt_a728x15-top'),
	 'adt_a728x15-footer' => trim('adt_a728x15-footer'),
	 'ads_250-250-post' => trim('ads_250-250-post')
);

$adsticle_options = $default_options;
update_option( 'adsticle_options', $adsticle_options );	
   if ( ! function_exists( 'adt_options_update' ) ) :
   function adt_options_update() 
   {
     global $_POST, $adt_favicon_url, $adt_footer_text;
		
	 if ($_POST['adt_favicon_url'] != '')
	 {
	   update_option('adt_favicon_url', $_POST['adt_favicon_url']);
	 } else 
	 {
	   update_option('adt_favicon_url', $adt_favicon_url);	  
	 };

				
	if ($_POST['adt_footer_text'] != '')
	{
	  update_option('adt_footer_text', $_POST['adt_footer_text']);
	} else 
	{
	  update_option('adt_footer_text', $footer_text);	  
	};	
	
	if ($_POST['adt_show_main_menu'] != '')
	{
	  update_option('adt_show_main_menu', $_POST['adt_show_main_menu']);
	} else 
	{
	  update_option('adt_show_main_menu', '0');	  
	};	
	
	
	if ($_POST['adt_show_featured_image'] != '')
	{
	  update_option('adt_show_featured_image', $_POST['adt_show_featured_image']);
	} else 
	{
	  update_option('adt_show_featured_image', '0');	  
	};	
		

		
  };
   endif;  
   
      if ( ! function_exists( 'adsticle_general_options_page' ) ) :
  function adsticle_general_options_page()
  {
    global  $_POST, $adt_favicon_url, $adt_footer_text; 
	
 if ( isset($_POST['update_options']) && $_POST['update_options'] == 'true' )
	?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php _e('Adsticle General Options', 'adsticle'); ?></h2>

        <form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

			
            <table class="form-table">			    		
			    <tr valign="top">
                    <th scope="row"><label for="adt_favicon_url"><?php _e('Favicon:', 'adsticle'); ?></label></th>
                    <td><input type="text" name="adt_favicon_url" size="95" 
					  value="<?php echo adt_get_option('adt_favicon_url', $adt_favicon_url); ?>"/>
					<br/>
					<span class="description"> 
					<?php printf(__('<a href="%s" target="_blank">Upload your favicon</a> using WordPress Media Library and insert its URL here', 
					  'adsticle'), bloginfo("url").'/wp-admin/media-new.php'); ?>
					</span><br/><br/>
					<img src="<?php echo adt_get_option('adt_favicon_url', $adt_favicon_url); ?>" alt=""/>
					</td>
                </tr>
				
				<tr valign="top">
                    <th scope="row"><label for="adt_footer_text"><?php _e('Footer copyright text:', 'adsticle'); ?></label></th>
                    <td><textarea style="width:100%" name="adt_footer_text"><?php echo adt_get_option('adt_footer_text', 
					  $adt_footer_text); ?></textarea></td>
                </tr> 				
				
				<tr valign="top">
                    <th scope="row"><label for="adt_a468x60"><?php _e('468x60 adsense code for head:', 'adsticle'); ?></label></th>
                    <td><textarea style="width:100%" name="adt_a468x60"><?php echo adt_get_option('adt_a468x60'); ?></textarea></td>					
                </tr>	
				<tr valign="top">
                    <th scope="row"><label for="adt_a728x15-top"><?php _e('728x15 adsense code for head:', 'adsticle'); ?></label></th>
                    <td><textarea style="width:100%" name="adt_a728x15-top"><?php echo adt_get_option('adt_a728x15-top'); ?></textarea></td>					
                </tr>				
				<tr valign="top">
                    <th scope="row"><label for="adt_a728x15-footer"><?php _e('728x15 adsense code for footer:', 'adsticle'); ?></label></th>
                    <td><textarea style="width:100%" name="adt_a728x15-footer"><?php echo adt_get_option('adt_a728x15-footer'); ?></textarea></td>
                </tr>				
				<tr valign="top">
                    <th scope="row"><label for="ads_250-250-post"><?php _e('250x250 adsense code for post at top:', 'adsticle'); ?></label></th>
                    <td><textarea style="width:100%" name="ads_250-250-post"><?php echo adt_get_option('ads_250-250-post'); ?></textarea></td>
                </tr>
				
				<tr valign="top">
					<th scope="row"><label for="adt_show_main_menu"><?php _e('Show main menu:', 'adsticle'); ?></label></th>
				    <td><input name="adt_show_main_menu" type="checkbox" id="adt_show_main_menu" value="1" <?php checked('1', get_option('adt_show_main_menu')); ?> />
					<?php _e('Show', 'adsticle'); ?>
					</td>
                </tr> 	
				
				<tr valign="top">
                    <th scope="row"><label for="adt_show_featured_image"><?php _e('Show featured image for post:', 'adsticle'); ?></label></th>
                    <td><input type="checkbox" id="adt_show_featured_image" name="adt_show_featured_image" value="1"<?php checked('1', get_option('adt_show_featured_image')); ?> />
					<?php _e('Show', 'adsticle'); ?></td>
                </tr> 				
                <tr valign="top">
                  <th scope="row"><label><?php _e('H color'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_H', 'ADT_COLOR_H', ADT_COLOR_H); ?></td>
                </tr>				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Links color'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_LINK', 'ADT_COLOR_LINK', ADT_COLOR_LINK); ?></td>
                </tr>
				<tr valign="top">
                  <th scope="row"><label><?php _e('Text color'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_TEXT', 'ADT_COLOR_TEXT', ADT_COLOR_TEXT); ?></td>				  
                </tr>				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Sticky post background color'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_STICKY', 'ADT_COLOR_STICKY', ADT_COLOR_STICKY); ?></td>				  
                </tr>							
				<tr valign="top">
                  <th scope="row"><label><?php _e('Body background color'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_BACKGROUND1', 'ADT_COLOR_BACKGROUND1', ADT_COLOR_BACKGROUND1); ?></td>				  
                </tr>
				<tr valign="top">
                  <th scope="row"><label><?php _e('Line color'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_LINE', 'ADT_COLOR_LINE', ADT_COLOR_LINE); ?></td>				  
                </tr>				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Main menu dropdown background color'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_MENUBACKGROUND', 'ADT_COLOR_MENUBACKGROUND', ADT_COLOR_MENUBACKGROUND); ?></td>				  
                </tr>				
				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Main menu line width'); ?></label></th>
                  <td>
				    <?php adt_show_number_select('ADT_WIDTH_LINE_MAINMENU', get_option('ADT_WIDTH_LINE_MAINMENU', ADT_WIDTH_LINE_MAINMENU)); ?>									  			  
				  </td>
                </tr>				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Widget line width'); ?></label></th>
                  <td>
				    <?php adt_show_number_select('ADT_WIDTH_LINE_WIDGET', get_option('ADT_WIDTH_LINE_WIDGET', ADT_WIDTH_LINE_WIDGET)); ?>
				  </td>
                </tr>	
				<tr valign="top">
                  <th scope="row"><label><?php _e('Footer line width'); ?></label></th>
                  <td>
				    <?php adt_show_number_select('ADT_WIDTH_LINE_FOOTER', get_option('ADT_WIDTH_LINE_FOOTER', ADT_WIDTH_LINE_FOOTER)); ?>
				  </td>
                </tr>	
            </table>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="adt_favicon_url,adt_footer_text,adt_a468x60,adt_a728x15-top,adt_a728x15-footer,ads_250-250-post,
ADT_COLOR_H,ADT_COLOR_LINK,ADT_COLOR_TEXT,ADT_COLOR_STICKY,ADT_COLOR_LINE,ADT_COLOR_BACKGROUND1,ADT_COLOR_MENUBACKGROUND,ADT_WIDTH_LINE_MAINMENU,ADT_WIDTH_LINE_WIDGET,ADT_WIDTH_LINE_FOOTER, adt_show_main_menu, adt_show_featured_image" />
     			<p><?php submit_button( $text=null, $type='submit', $name = 'submit', $wrap = true, $other_attributes = null) ?></p>
        </form>
    </div>
<?php
  };
   endif; 
?>