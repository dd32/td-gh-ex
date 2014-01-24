<?php 

	define('IsMobile', wp_is_mobile());
	define('TPLDIR', get_template_directory_uri());

// for /languages/
load_theme_textdomain( 'olo', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);

//Add background for theme
add_theme_support('custom-background');
add_theme_support( "custom-header" );

//post-thumbnails
if(function_exists('add_theme_support')){
    add_theme_support( 'post-thumbnails' );
}
if ( has_post_thumbnail()) {the_post_thumbnail();}

//editor style
add_editor_style('editor.css');

//for forbidden wordpress version displayed
remove_action('wp_head','wp_generator');

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

//forbidden wptexturize
remove_filter('the_content', 'wptexturize');

if ( ! isset( $content_width ) )
	$content_width = 700;

	//del rel='category'
	    foreach(array(
        'rsd_link',//rel="EditURI"
        'index_rel_link',//rel="index"
        'start_post_rel_link',//rel="start"
        'wlwmanifest_link'//rel="wlwmanifest"
    ) as $xx)
    remove_action('wp_head',$xx);
    //rel="category" or rel="category tag",
    function the_category_filter($thelist){
        return preg_replace('/rel=".*?"/','rel="tag"',$thelist);
    }  
    add_filter('the_category','the_category_filter');
	
// Enqueue style-file, if it exists.
add_action('wp_enqueue_scripts', 'olo_script');
function olo_script() {
	if( !IsMobile ){
		wp_enqueue_style( 'olo', get_stylesheet_uri(),  array(), '20140121', false);
	}else{
		wp_enqueue_style('mobile', TPLDIR . '/mobile.css', array(), '20140121', 'screen');
	}
	//del l10n.js
	wp_deregister_script( 'l10n' );	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.10.2.min.js', array(), '20140121', false);
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'olo', TPLDIR . '/js/olo.js', array(), '20140121', true);
	wp_enqueue_script( 'comments-ajax', TPLDIR . '/js/comments-ajax.js', array(), '20140121', true);
	wp_localize_script('comments-ajax', 'ajaxL10n', array(
		'edt1' => __('Before Refresh, you can','olo'),
		'edt2' => __('Edit','olo'),
		'cancel_edit' => __('Cancel Editing','olo'),
		'txt1' => __('Wait a moment...','olo'),
		'txt3' => __('Good Comment','olo')
	));
	
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
			
	if( is_page('archives') ){
		wp_enqueue_script( 'archives', TPLDIR . '/js/archives.js', array(), '20140121', false);
		wp_enqueue_style( 'archives', TPLDIR . '/css/archives.css', array(), '20140121', 'screen');
	};
}

/*editor begin*/
function add_more_buttons($buttons) {  
$buttons[] = 'fontsizeselect';  
$buttons[] = 'styleselect';  
$buttons[] = 'fontselect';  
$buttons[] = 'hr';  
$buttons[] = 'sub';  
$buttons[] = 'sup';  
$buttons[] = 'cleanup';  
$buttons[] = 'image';  
$buttons[] = 'code';  
$buttons[] = 'media';  
$buttons[] = 'backcolor';  
$buttons[] = 'visualaid';  
return $buttons;  
}  
add_filter("mce_buttons_3", "add_more_buttons");
/*editor end*/

//par_pagenavi	
function par_pagenavi($range = 9){
	global $paged, $wp_query;
	$max_page = '';
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	echo "<i>Total: ".$max_page."</i>";
	previous_posts_link('Pre');
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='current'";echo ">$i</a>";}}
	next_posts_link('Next');
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='Skip to the last page'>Last</a>";}}
}

//copyright below single
function olo_copyright($content) {
	if( is_single() ){
		$content.= '<p>--'.__('Copy and Specify','olo').': <a href="'.get_bloginfo('url').'">'.get_bloginfo('name').'</a> &raquo; <a href="'.get_permalink().'">'.get_the_title().'</a></p>';
	}
	return $content;
}
add_filter('the_content', 'olo_copyright');

//del p tag and newline
function deletehtml($description) { 
$description = trim($description); 
$description = strip_tags($description,""); 
return ($description);
}
add_filter('category_description', 'deletehtml');

// Add menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation','olo'),
		'mobile' => __( 'Mobile Navigation', 'olo'),
	) );

// Add sidebar
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
		'name'=>''.__('Home', 'olo').'',
		'description'   => ''.__('Just For Three Widgets', 'olo').'',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
    register_sidebar(array(
		'name'=>''.__('Single', 'olo').'',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
	register_sidebar(array(
		'name'=>''.__('Other', 'olo').'',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
	}
function olo_login() {      
echo '<link rel="stylesheet" tyssspe="text/css" href="' .TPLDIR. '/css/login.css" />'; }      
add_action('login_head', 'olo_login');  
	
//change CSS on admin page
add_action('login_head', 'olo_login_logo');
//change the logo on admin page
function olo_login_logo() { 
	echo '<style type="text/css">h1 a{background-image:url('.TPLDIR.'/images/logo.gif) !important; }</style>';
}

//define the url of logo
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) { return ''.home_url().''; }

//add author information 
add_filter('admin_footer_text', 'olo_admin_footer');
function olo_admin_footer() {
	echo '<a target="_blank" href="http://hjyl.org/">hjyl.org</a> - hjyl.org (QQ: <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=4953363&site=qq&menu=yes">4953363</a> Email: <a href="mailto:i@hjyl.org">i@hjyl.org</a>) - <a target="_blank" href="http://hjyl.org/">hjyl.org</a>';
}

//reload posts on home
function posts_on_homepage( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '5' );
    }
}
add_action( 'pre_get_posts', 'posts_on_homepage' );

  /*Custom parts*/
 include (get_template_directory() . '/inc/theme_inc.php'); 
 include (get_template_directory() . '/inc/oloComment.php'); 
?>