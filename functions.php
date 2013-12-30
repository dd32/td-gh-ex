<?php  
error_reporting(0);
if ( ! function_exists( 'adt_get_option' ) ) :	
  function adt_get_option($Aoption_name, $default = null)
  {
    return stripslashes(get_option($Aoption_name, $default));
  };
endif;
if ( ! function_exists( 'adt_enqueue_comment_reply' ) ) :	
function adt_enqueue_comment_reply() {
  if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	};
	endif;
add_action( 'wp_enqueue_scripts', 'adt_enqueue_comment_reply' );

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
	add_theme_support( 'custom-background' );	
	if ( ! defined( 'HEADER_TEXTCOLOR' ) )
	  define( 'HEADER_TEXTCOLOR', '87fda1' );
	
	//set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	if ( ! defined( 'NO_HEADER_TEXT' ) )
	  define( 'NO_HEADER_TEXT', false );
	  if ( ! defined( 'HEADER_IMAGE' ) )
	  $args = array(
	'width'         => 1000,
	'height'        => 80,
	'default-image' => get_template_directory_uri() . '%s/img/top-default1.png',
);
	add_theme_support( 'custom-header', $args );
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
  

function adt_filter_wp_title( $title ) {
	global $page, $paged;
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
      return $filtered_title;
	  $site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'adsticle' ), max( $paged, $page ) ); 
}

add_filter( 'wp_title', 'adt_filter_wp_title' );	
  
  
if ( ! function_exists( 'adt_ilc_farbtastic_script' ) ) :	
  function adt_ilc_farbtastic_script( $hook_suffix ) 
  { 
      wp_enqueue_style( 'farbtastic' );
      wp_enqueue_script( 'farbtastic' );
  };
 endif;
  
if ( ! function_exists( 'adt_filter_wp_title' ) ) :	
function adt_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
      return $filtered_title;
}
endif; 
add_filter( 'wp_title', 'adt_filter_wp_title' );

  
if ( ! function_exists( 'adt_sidebars' ) ) :	  
  function adt_sidebars()
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
 endif; 
  
  add_action( 'widgets_init', 'adt_sidebars' );
  if ( ! function_exists( 'adt_comment' ) ) :	
  function adt_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo sanitize_text_field(get_avatar( $comment, 40 )); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'adsticle' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'adsticle' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo sanitize_text_field(esc_url( get_comment_link( $comment->comment_ID ) )); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'adsticle' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'adsticle' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php sanitize_text_field(comment_text()); ?></div>

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


  
  add_action('wp_head', 'adt_head');
    if ( ! function_exists( 'adt_head' ) ) :
  function adt_head()
  {  
    if (!is_admin())
	{
	  global $adt_favicon_url;
?>	
<link rel="shortcut icon" href="<?php echo sanitize_text_field(adt_get_option('adt_favicon_url', $adt_favicon_url)); ?>" type="image/x-icon" />
<?php	
	  $background = get_theme_mod('background_image', false);
	  $bgcolor = get_theme_mod('background_color', false);
	  $textcolor = get_theme_mod('header_textcolor', HEADER_TEXTCOLOR);
?>
<style type="text/css"> 
body, .header  {background-color:#14253e; color: <?php echo get_option('ADT_COLOR_TEXT', ADT_COLOR_TEXT); ?>}

.middle, input, textarea, .ads-728-15-top, .ads-728-15-footer {background-color:<?php echo get_option('ADT_COLOR_BACKGROUND1', ADT_COLOR_BACKGROUND1); ?> }  

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
if ( ! function_exists( 'adt_general_options_input' ) ) :	
function adt_general_options_input() {  
 register_setting('adt_general_options_page','adt_general_options_page','adt_options_validate'); 	
}
 endif;	
add_action( 'admin_init', 'adt_general_options_input' );  


	    if ( ! function_exists( 'adt_options_admin_menu' ) ) :
  function adt_options_admin_menu() 
  {	    
	$adt_theme_page = add_theme_page(__("Adsticle Options", 'adsticle'), __("Adsticle Options", 'adsticle'), 
	  'edit_theme_options', 'adt_general_options_page', 'adt_general_options_page');	
 if(!$adt_theme_page) return;	
    add_action('admin_print_styles-' . $adt_theme_page, 'adt_ilc_farbtastic_script'); 
  };
  endif; 
  
  add_action('admin_menu', 'adt_options_admin_menu');
  
     
  
if ( ! function_exists( 'adt_show_color_picker' ) ) :
  function adt_show_color_picker($Aname, $Aoption, $Adefault)
  {  
?>  
<label for="<?php echo $Aname; ?>">
<input type="text" id="<?php echo $Aname; ?>" 
name="<?php echo $Aname; ?>" value="<?php echo sanitize_text_field(get_option($Aoption, $Adefault)); ?>" /> 
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

	$adt_options = get_option( 'adt_options' );
	$ADT_COLOR_H = $adt_options['ADT_COLOR_H'];
	$ADT_COLOR_LINK = $adt_options['ADT_COLOR_LINK'];
	 $ADT_COLOR_TEXT = $adt_options['ADT_COLOR_TEXT'];
	 $ADT_COLOR_STICKY = $adt_options['ADT_COLOR_STICKY'];
	 $ADT_COLOR_BACKGROUND1 = $adt_options['ADT_COLOR_BACKGROUND1'];
	 $ADT_COLOR_LINE = $adt_options['ADT_COLOR_LINE'];
	 $ADT_WIDTH_LINE_MAINMENU = $adt_options['ADT_WIDTH_LINE_MAINMENU'];
	 $ADT_WIDTH_LINE_WIDGET = $adt_options['ADT_WIDTH_LINE_WIDGET'];
	 $ADT_WIDTH_LINE_FOOTER = $adt_options['ADT_WIDTH_LINE_FOOTER'];
	 $ADT_COLOR_MENUBACKGROUND = $adt_options['ADT_COLOR_MENUBACKGROUND'];
	 $adt_a468x60 = $adt_options[trim('adt_a468x60')];
	 $adt_a728x15_top = $adt_options[trim('adt_a728x15-top')];
	 $adt_a728x15_footer = $adt_options[trim('adt_a728x15-footer')];
	 $ads_250_250_post = $adt_options[trim('ads_250-250-post')];
	 


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
   	    if ( ! function_exists( 'adt_options_validate ' ) ) :
  function adt_options_validate ( $adt_options) {  
    $output = array();  
    foreach( $adt_options as $key => $value ) {  
        if( isset( $adt_options[$key] ) ) {  
            $output[$key] = strip_tags( stripslashes( $adt_options[ $key ] ) );        
        }          
    }  
    return apply_filters( 'adt_options_validate', $output, $adt_options );    
}  
   endif;  
      if ( ! function_exists( 'adt_general_options_page' ) ) :
  function adt_general_options_page()
  {
    global  $_POST, $adt_favicon_url, $adt_footer_text; 
	
 if ( isset($_POST['update_options']) && $_POST['update_options'] == 'true' )
	?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php _e('Adsticle General Options', 'adsticle'); ?></h2>

        <form method="post" action="options.php">
		<?php if ( function_exists('wp_nonce_field') ) 
 wp_nonce_field('update-options'); ?>

			
            <table class="form-table">			    		
			    <tr valign="top">
                    <th scope="row"><label for="adt_favicon_url"><?php _e('Favicon:', 'adsticle'); ?></label></th>
                    <td><input type="text" name="adt_favicon_url" size="95" 
					  value="<?php echo sanitize_text_field(adt_get_option('adt_favicon_url', $adt_favicon_url)); ?>"/>
					<br/>
					<span class="description"> 
					<?php printf(__('<a href="%s" target="_blank">Upload your favicon</a> using WordPress Media Library and insert its URL here', 
					  'adsticle'), esc_url(home_url()).'/wp-admin/media-new.php'); ?>
					</span><br/><br/>
					<img src="<?php echo sanitize_text_field(adt_get_option('adt_favicon_url', $adt_favicon_url)); ?>" alt=""/>
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
                    <th scope="row"><label for="adt_a728x15_top"><?php _e('728x15 adsense code for head:', 'adsticle'); ?></label></th>
                    <td><textarea style="width:100%" name="adt_a728x15_top"><?php echo adt_get_option('adt_a728x15_top'); ?></textarea></td>					
                </tr>				
				<tr valign="top">
                    <th scope="row"><label for="adt_a728x15_footer"><?php _e('728x15 adsense code for footer:', 'adsticle'); ?></label></th>
                    <td><textarea style="width:100%" name="adt_a728x15_footer"><?php echo adt_get_option('adt_a728x15_footer'); ?></textarea></td>
                </tr>				
				<tr valign="top">
                    <th scope="row"><label for="ads_250_250_post"><?php _e('250x250 adsense code for post at top:', 'adsticle'); ?></label></th>
                    <td><textarea style="width:100%" name="ads_250_250_post"><?php echo adt_get_option('ads_250_250_post'); ?></textarea></td>
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
                  <th scope="row"><label><?php _e('H color','adsticle'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_H', 'ADT_COLOR_H', ADT_COLOR_H); ?></td>
                </tr>				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Links color','adsticle'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_LINK', 'ADT_COLOR_LINK', ADT_COLOR_LINK); ?></td>
                </tr>
				<tr valign="top">
                  <th scope="row"><label><?php _e('Text color','adsticle'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_TEXT', 'ADT_COLOR_TEXT', ADT_COLOR_TEXT); ?></td>				  
                </tr>				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Sticky post background color','adsticle'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_STICKY', 'ADT_COLOR_STICKY', ADT_COLOR_STICKY); ?></td>				  
                </tr>							
				<tr valign="top">
                  <th scope="row"><label><?php _e('Body background color','adsticle'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_BACKGROUND1', 'ADT_COLOR_BACKGROUND1', ADT_COLOR_BACKGROUND1); ?></td>				  
                </tr>
				<tr valign="top">
                  <th scope="row"><label><?php _e('Line color','adsticle'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_LINE', 'ADT_COLOR_LINE', ADT_COLOR_LINE); ?></td>				  
                </tr>				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Main menu dropdown background color','adsticle'); ?></label></th>
                  <td><?php adt_show_color_picker('ADT_COLOR_MENUBACKGROUND', 'ADT_COLOR_MENUBACKGROUND', ADT_COLOR_MENUBACKGROUND); ?></td>				  
                </tr>				
				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Main menu line width','adsticle'); ?></label></th>
                  <td>
				    <?php adt_show_number_select('ADT_WIDTH_LINE_MAINMENU', get_option('ADT_WIDTH_LINE_MAINMENU', ADT_WIDTH_LINE_MAINMENU)); ?>									  			  
				  </td>
                </tr>				
				<tr valign="top">
                  <th scope="row"><label><?php _e('Widget line width','adsticle'); ?></label></th>
                  <td>
				    <?php adt_show_number_select('ADT_WIDTH_LINE_WIDGET', get_option('ADT_WIDTH_LINE_WIDGET', ADT_WIDTH_LINE_WIDGET)); ?>
				  </td>
                </tr>	
				<tr valign="top">
                  <th scope="row"><label><?php _e('Footer line width','adsticle'); ?></label></th>
                  <td>
				    <?php adt_show_number_select('ADT_WIDTH_LINE_FOOTER', get_option('ADT_WIDTH_LINE_FOOTER', ADT_WIDTH_LINE_FOOTER)); ?>
				  </td>
                </tr>	
            </table>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="adt_favicon_url,adt_footer_text,adt_a468x60,adt_a728x15_top,adt_a728x15_footer,ads_250_250_post,
ADT_COLOR_H,ADT_COLOR_LINK,ADT_COLOR_TEXT,ADT_COLOR_STICKY,ADT_COLOR_LINE,ADT_COLOR_BACKGROUND1,ADT_COLOR_MENUBACKGROUND,ADT_WIDTH_LINE_MAINMENU,ADT_WIDTH_LINE_WIDGET,ADT_WIDTH_LINE_FOOTER, HEADER_TEXTCOLOR, HEADER_IMAGE, adt_show_main_menu, adt_show_featured_image" />
     			<p><?php submit_button( $text=null, $type='submit', $name = 'submit', $wrap = true, $other_attributes = null) ?></p>
        </form>
		
    </div>
	<?php

if ( !empty($_POST) && check_admin_referer( 'update-options') ) {
}

  };
   endif; 
?>