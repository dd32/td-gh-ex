<?php
/**
 * B3 functions and definitions
 *
 * @package B3
 */

define('B3_URI', get_template_directory_uri());
define('B3_PATH', get_template_directory());

function add_b3_menu() {
	add_theme_page(__('B3 Theme settings', 'b3'), __('B3 Theme settings', 'b3'), 'manage_options', 'b3_settings', 'b3_settings_page');
}

add_action('admin_menu', 'add_b3_menu');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

function b3_setup() {
global $b3_options;
	$b3_options = get_option('b3_options');
	if (!$b3_options) {
		update_option('b3_options', array());
		$b3_options = get_option('b3_options');
	}
	load_theme_textdomain('b3', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-header', array('default-image' => B3_URI . '/images/b3-logo.png'));
	register_nav_menus(array('primary' => __('Primary Menu', 'b3'),));
	add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
	add_theme_support('custom-background', apply_filters('b3_custom_background_args',
		array('default-color' => 'ffffff', 'default-image' => '',)
	));
	add_theme_support('post-thumbnails');
	add_filter('wp_nav_menu_container_allowedtags', 'b3_empty_array');
	add_filter('wp_nav_menu_args', 'b3_wp_nav_menu_args');

		require B3_PATH . '/inc/options.php';
		add_action('admin_init', 'b3_register_settings');

	register_post_type('b3_slide', array(
		'label' => 'Slides',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => ''),
		'query_var' => true,
		'supports' => array('title', 'editor', 'thumbnail',),
		'labels' => array (
			'name' => 'Slides',
			'singular_name' => 'Slide',
			'menu_name' => 'B3 Slides',
			'add_new' => 'Add Slide',
			'add_new_item' => 'Add New Slide',
			'edit' => 'Edit',
			'edit_item' => 'Edit Slide',
			'new_item' => 'New Slide',
			'view' => 'View Slide',
			'view_item' => 'View Slide',
			'search_items' => 'Search Slides',
			'not_found' => 'No Slides Found',
			'not_found_in_trash' => 'No Slides Found in Trash',
			'parent' => 'Parent Slide',
	)));
}

add_action('after_setup_theme', 'b3_setup');

if ( !isset( $content_width ) ) {
	$content_width = 970;
}

/*
	$content_width not really used currently in this theme but required by Wordpress theme autochecker.
	Content width is calculated and being set by Bootstrap.
*/

function b3_empty_array($arr) {
	return array();
}

function b3_add_slide_metaboxes() {
	add_meta_box('b3-slide-uri', __('Slide URL', 'b3'),
		'b3_slide_uri_metabox', 'b3_slide', 'normal', 'core');
}

add_action('add_meta_boxes', 'b3_add_slide_metaboxes');

function b3_slide_uri_metabox($post) {
	wp_nonce_field('b3_inner_custom_box', 'b3_inner_custom_box_nonce');
?>
	<div style="margin: 20px;">
		<p><input type="text" name="b3_slide_uri" style="width: 100%;" placeholder="Enter URL the slide links to" value="<?php echo $post->post_excerpt; ?>" /></p>
		<p style="text-align: right;"><?php
		$set_featured = '<a href="'
			. admin_url('media-upload.php?post_id=' . $post->ID . '&type=image&TB_iframe=1&width=640&height=285')
			. '" class="thickbox">' . __('to set the Featured Image', 'b3') . '</a> ';
		printf(__('Don&#39;t forget %1$s as it is the slide picture.', 'b3'), $set_featured); ?></p>
	</div>
<?php
}

function b3_save_slide_postdata($post_id) {
	if (!isset($_POST['b3_inner_custom_box_nonce'])) {
		return $post_id;
	}
	$nonce = $_POST['b3_inner_custom_box_nonce'];
	if (!wp_verify_nonce($nonce, 'b3_inner_custom_box'))
		return $post_id;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
		return $post_id;
	}
	if ('b3_slide' != $_POST['post_type'] || !current_user_can('edit_post', $post_id )) {
		return $post_id;
	}
	$slide_uri = sanitize_text_field($_POST['b3_slide_uri']);

	remove_action('save_post', 'b3_save_slide_postdata'); // required to avoid infinite loop!
	wp_update_post(array(
		'ID' => $post_id,
		'post_type' => 'b3_slide',
		'post_excerpt' => $slide_uri,
	));
	add_action('save_post', 'b3_save_slide_postdata');
}

add_action('save_post', 'b3_save_slide_postdata');

function b3_option($key) {
	global $b3_options;
	if (isset($b3_options[$key])) {
		return $b3_options[$key];
	}
	return '';
}

function b3_wp_nav_menu_args($args) {
	$args['container'] = false;
	return $args;
}

function b3_wp_page_menu($args) {
	$pages = get_pages();
	foreach($pages as $key=>$page) {
		$pages[$key]->db_id = $page->ID;
		$pages[$key]->menu_item_parent = $page->post_parent;
		$pages[$key]->url = get_page_link($page->ID);
	}
	$pages =  b3_wp_nav_menu_objects($pages);
	$out = '<ul class="nav navbar-nav">';

	if ('Y'==b3_option('show_home')) {
		$class = '';
		if ( is_front_page() && !is_paged() ) {
			$class = 'class="current_page_item"';
		}
		$out .= '<li ' . $class . '><a href="' . home_url('/') . '">'
			. $args['link_before'] . __('Home', 'b3') . $args['link_after'] . '</a></li>';
	}

	$walker = new Tb3_Walker_Nav_Menu();
	$tree = $walker->walk($pages, 0);
	$out .= $tree;
	$out .= '</ul>';
	return $out;
}

add_filter('wp_nav_menu_objects', 'b3_wp_nav_menu_objects');

function b3_wp_nav_menu_objects ($menu_items) {
	foreach($menu_items as $key => $item) {
		$sort_num_of[$item->db_id] = $key;
	}
	foreach($menu_items as $key => $item) {
		if ($item->menu_item_parent) {
			$menu_items[ $sort_num_of[$item->menu_item_parent] ]->has_children = 1;
		}
	}
	return $menu_items;
}

class Tb3_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$has_children = empty($item->has_children) ? false : true;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		if($has_children) {
			if ($depth ) {
				$classes[] = 'dropdown-submenu';
			}
			else {
				$classes[] = 'dropdown';
			}
		}
		$classes[] = 'depth-'.$depth;
		$args_dummy = array('link_before' => '', 'link_after' => '', 'before' => '', 'after' => '');
		$args = array_merge($args_dummy, $args);
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args['before'];
		$item_output .= '<a'. $attributes
			. ( !empty($item->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' :'')
			. '>';
		$item_output .= $args['link_before']
			. apply_filters('the_title', !empty($item->post_title) ? $item->post_title : $item->title, $item->ID)
			. $args['link_after'];
		
		$item_output .= (!empty($item->has_children) && !$depth) ? ' <b class="caret"></b>' :'';
		$item_output .= '</a>';
		$item_output .= $args['after'];
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


function b3_widgets_init() {
	if ('Y' == b3_option('panel_widget')) {
		$args= array(
			'before_widget' => '<aside id="%1$s" class="widget %2$s panel panel-default">',
			'after_widget' => '</div><!-- /.panel-body --></aside>',
			'before_title' => '',
			'after_title' => '', // see b3_panel_widget_title()
		);
	}
	else {
		$args= array(
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		);
	}
	$args['name'] = __('Sidebar 1', 'b3');
	$args['id']   = 'sidebar-1';
	register_sidebar($args);

	register_sidebar(array(
		'name'          => __('Top Sidebar', 'b3'),
		'id'            => 'sidebar-top',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar( array(
		'name'          => __('Bottom Sidebar', 'b3'),
		'id'            => 'sidebar-bottom',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-3 col-sm-4 col-xs-12">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

}
add_action('widgets_init', 'b3_widgets_init');

function b3_panel_widget_title($title) {
	if ('Y' == b3_option('panel_widget')) {
		if (!$title) {
			$title = '&nbsp;';
		}
		$out = '<div class="panel-heading"><h3 class="widget-title panel-title">'
		. $title . '</h3></div><div class="panel-body">';
	}
	else {
		$out = $title ? '<h3 class="widget-title ">' . $title . '</h3>' : $title;
	}
	return $out;
}

/**
 * Enqueue scripts and styles
 */
function b3_enqueue_scripts() {
	$src =  ('cdn' == b3_option('bootstrap_src')) ?
		'//netdna.bootstrapcdn.com/bootstrap/3.0.2' : B3_URI . '/bootstrap';
	wp_enqueue_script('bootstrap', $src . '/js/bootstrap.min.js', array('jquery'), null, true );
	wp_enqueue_script('b3',  B3_URI . '/js/b3.js', array('jquery'), null, true );
	if ( is_singular() && comments_open() && get_option('thread_comments') ) {
		wp_enqueue_script('comment-reply');
	}
	if (is_singular() && wp_attachment_is_image()) {
		wp_enqueue_script('b3-keyboard-image-navigation',  B3_URI . '/js/keyboard-image-navigation.js', array('jquery'), '20120202');
	}
}

add_action('wp_enqueue_scripts', 'b3_enqueue_scripts');

function b3_enqueue_styles() {
	$src =  ('cdn' == b3_option('bootstrap_src')) ?
		'//netdna.bootstrapcdn.com/bootstrap/3.0.2' : B3_URI . '/bootstrap';
	wp_enqueue_style('bootstrap', $src . '/css/bootstrap.min.css');
	wp_enqueue_style('b3-style',  B3_URI . '/style.css');
	wp_add_inline_style('b3-style', b3_options_css());
//	add_editor_style();
/*
  the Bootstrap and custom theme css settings are not used in admin area
  so adding editor style is moot point yet.
*/
}

add_action('wp_enqueue_scripts', 'b3_enqueue_styles');

function b3_admin_enqueue_scripts() {
	wp_enqueue_script('wp-color-picker', '', array('jquery'));
	wp_enqueue_script('b3-admin', B3_URI . '/js/b3-admin.js', array('wp-color-picker'), null, true);
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_style('b3-admin', B3_URI . '/css/b3-admin.css');
}

add_action('admin_enqueue_scripts', 'b3_admin_enqueue_scripts');

function b3_options_css() {
	$out = '';
	if ('left' == b3_option('sidebar_main')) {
		$out .= '#secondary {float: left;} #primary {float: right;} ';
	}
	if (($css = b3_option('text_color')) && $css != '#333333') {
		$out .= 'body {color:'. $css . ';} ';
		$out .= '.entry-meta {color:'. b3_option('text_color2') . ';} ';
	}
	if ($css = b3_option('headers_color')) {
		$out .= 'h1,h2,h3,h4,h5,h6 {color:'. $css . ';} ';
	}
	if ($css = b3_option('link_color')) {
		$out .= 'a, a:visited {color:'. $css . ';} ';
	}
	if ($css = b3_option('link_hover_color')) {
		$out .= 'a:hover {color:'. $css . ';} ';
	}
	if (($css = b3_option('navbar_color')) && '#F8F8F8' != $css) {
		$color2 =  b3_option('navbar_color2');
		$out .= '.navbar-b3 {background-color: '. $css .'; background-image: linear-gradient(to bottom, '
			. $css . ' 0px, '. $color2 .' 100%); ' 
//    . 'filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=' . $css. ',endColorstr=' . $color2 . ');'
// (dropdown menu in IE8 doesn't work with filter )
//      .'-ms-filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=' . $css .',endColorstr=' . $color2 .')";'
			.' border: ' . b3_option('navbar_border') .' solid 1px;}';
	}
	if (($css = b3_option('navbar_link_color')) && '#777777' != $css) {
		$out .= '.navbar-nav > li > a, .navbar-nav > li > a:visited, a.navbar-brand {color:'. $css . ' !important;} ';
		$out .= '.navbar-nav > li > a:hover, a.navbar-brand:hover {color:'. b3_option('navbar_link_color2') . ' !important;} ';
	}
	return $out;
}

add_filter('sanitize_option_b3_options', 'b3_sanitize_options');

function b3_sanitize_options($arr) {
	$defaults = array(
		'logo_enabled' => 'Y',
		'site_title_enabled' => 'Y',
		'site_description_enabled' => 'Y',
		'navbar_brand' => 'Project Name',
		'copyright' => date('Y ') . get_option('blogname'),
		'show_home' => 'N',
		'disable_comment_page' => 'N',
		'sidebar_main' => 'right',
		'sidebar_top' => 'Y',
		'sidebar_bottom' => 'Y',
		'panel_widget' => 'N', 
		'panel_post' => 'N',
		'carousel' => 'demo',
		'image_rounded' => 'N',
		'credits' => 'Y',
		'post_thumbnail' => 'Y',
		'post_date' => 'Y',
		'post_author' => 'Y',
		'excerpt' => 'N',
		'text_color' => '#333333',
		'headers_color' => '',
		'link_color' => '',
		'link_hover_color' => '',
		'navbar_color' => '',
		'navbar_color2' => '',
		'navbar_border' => '',
		'navbar_link_color' => '',
		'navbar_link_color2' => '',
		'bootstrap_src' => 'local',
	);

	if ( !empty($_POST['b3_action_reset']) ) {
		return $defaults;
	}
	elseif (!empty($_POST['b3_action_upload'])) {
		if ( ($file = $_FILES['b3_upload_settings']) && !$file['error'] && $file['size']) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
			require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';
			$f = new WP_Filesystem_Direct('');
			$content = $f->get_contents($file['tmp_name']);
// I can obtain it by one call file get contents but Theme-Check grumbles
			$import = maybe_unserialize($content);
			$f->delete($file['tmp_name']);
			if (is_array($import)) {
				$arr = array_merge($arr, $import);
			}
		}
	}
	$out = array();
	foreach ($defaults as $key => $value) {
		$out[$key] = isset($arr[$key]) ? $arr[$key] : $value;
		if (strpos($key, 'color') && !preg_match('/^#[0-9a-f]{6,6}$/i', $out[$key])) {
			$out[$key] = '';
		}
	}


	if ($out['text_color']) {
		$out['text_color2'] = b3_smudge_color($out['text_color'], 40);
	}
	else {
		$out['text_color'] = $out['text_color2'] = '';
	}

	if ($out['link_color']) {
		$out['link_hover_color'] = b3_darken($out['link_color'], 15);
	}
	else {
		$out['link_color'] = $out['link_hover_color'] = '';
	}
	if ($out['navbar_color']) {
		$out['navbar_color2'] = b3_lighten($out['navbar_color'], 75);
		$out['navbar_border'] = b3_lighten($out['navbar_color'], 25);
	}
	else {
		$out['navbar_color'] = $out['navbar_color2'] = $out['navbar_border'] = '';
	}
	if ($out['navbar_link_color']) {
		$out['navbar_link_color2'] = b3_darken($out['navbar_link_color'], 40);
	}
	else {
		$out['navbar_link_color'] = $out['navbar_link_color2'] = '';
	}
	$out['copyright'] = htmlspecialchars($out['copyright']);
	$out['navbar_brand'] = htmlspecialchars($out['navbar_brand']);
	return $out;
}

function b3_darken($color, $percent) {
	$p = min(abs($percent), 100);
	$ratio = 1 - $p*0.01;
	$dec = hexdec(substr($color, 1));
	$b = dechex(floor((0xFF & $dec) * $ratio));
	if (strlen($b) == 1) $b = '0'.$b;
	$g = dechex(floor(((0xFF00 & $dec) / 256) * $ratio));
	if (strlen($g) == 1) $g = '0'.$g;
	$r = dechex(floor(((0xFF0000 & $dec) / 65536) * $ratio));
	if (strlen($r) == 1) $r = '0'.$r;
	return "#$r$g$b";
}

function b3_lighten($color, $percent) {
	$p = min(abs($percent), 100);
	$ratio =  1 + $p*0.01;
	$dec = hexdec(substr($color, 1));
	$b = dechex(min( floor((0xFF & $dec) * $ratio), 255 ));
	if (strlen($b) == 1) $b = '0'.$b;
	$g = dechex(min( floor(((0xFF00 & $dec) / 256) * $ratio), 255 ));
	if (strlen($g) == 1) $g = '0'.$g;
	$r = dechex(min( floor(((0xFF0000 & $dec) / 65536) * $ratio), 255 ));
	if (strlen($r) == 1) $r = '0'.$r;
	return "#$r$g$b";
}

/*

*/
function b3_smudge($c, $r) {
	$x = dechex(floor($c*(1-$r) + (255-$c)*$r));				
	if (strlen($x) == 1) $b = '0'.$x;
	return $x;
}

function b3_smudge_color($color, $percent) {
	$p = min(abs($percent), 100);
	$ratio = $p*0.01;
	 $dec = hexdec(substr($color, 1));
	$b = b3_smudge(0xFF & $dec, $ratio);
	$g = b3_smudge((0xFF00 & $dec)/256, $ratio);
	$r = b3_smudge((0xFF0000 & $dec)/65536, $ratio);
	return "#$r$g$b";
}

function b3_comment_form_before() {
	echo '<div class="form-group">';
}

function b3_comment_form_after() {
	echo '</div>';
}

function b3_post_class($classes) {
	if ('Y'==b3_option('panel_post')) {
		$classes[]= 'panel-body';
	}
	$classes[]= 'clearfix';
	return $classes;
}

function b3_content_wrap_class() {
	$classes = array();
	if ('Y'==b3_option('panel_post')) {
		$classes[]= 'panel';
	}
	if ($classes) {
		echo 'class="' . implode(' ', $classes) . '"';
	}
}

add_filter('post_class', 'b3_post_class');
add_action('comment_form_before', 'b3_comment_form_before');
add_action('comment_form_after', 'b3_comment_form_after');


function b3_carousel() {
	$case = b3_option('carousel');
	if ('N' == $case) {
		return;
	}
	else {
			if ('Y' == $case) {
				$slides = get_posts(array('post_type' => 'b3_slide'));
			}
			else {
				include B3_PATH . '/inc/demo-slides.php';
			}
			if ( $total = count($slides) ) {

?>
	<div id="b3-slider" class="carousel slide spacer-bottom" data-ride="carousel" >
<?php if ( $total > 1 ) { ?>
	<ol class="carousel-indicators">
<?php
				for($i=0; $i<$total; $i++) {
					echo '<li data-target="#b3-slider" data-slide-to="' . $i . '" ' . ($i ? '' : 'class="active"') . '></li>';
				} ?>
	</ol>
<?php } ?>
	<div class="carousel-inner clearfix" >
<?php
		foreach ($slides as $c => $slide ) {
			if ('Y' == $case) {
				$slide = (array)$slide;
				$attachment_id = get_post_thumbnail_id($slide['ID']);
				$img = wp_get_attachment_image_src($attachment_id, 'full');
				$slide['src'] = $img[0];
				$slide['alt'] = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
			}
?>
				<div class="item <?php echo $c ? '' : 'active'; ?>" >
					<a href="<?php echo $slide['post_excerpt'] ? $slide['post_excerpt'] : '#'; ?>"><img style="width:100%" src="<?php echo $slide['src']; ?>" alt="<?php echo $slide['alt'] ?>" /></a>
					<div class="container">
							<div class="carousel-caption">
								<h1><a href="<?php echo $slide['post_excerpt']; ?>"><?php echo apply_filters('the_title', $slide['post_title']); ?></a></h1>
							<?php
									echo '<div>' . apply_filters('the_title', $slide['post_content']) . '</div>';
									if ('Y' == $case) {
										echo '<p>';
										edit_post_link( __('Edit', 'b3'), '<span class="edit-link">', '</span>');
										echo '</p>';
									}
							?>
							</div>
					 </div>
				</div>
<?php
		}
?>
				</div><!-- /.carousel-inner -->
			<?php
			if ($total>1) { ?>
				<a class="left carousel-control" href="#b3-slider" data-slide="prev"><span class="glyphicon glyphicon-chevron-left icon-large"></span></a>
				<a class="right carousel-control" href="#b3-slider" data-slide="next"><span class="glyphicon glyphicon-chevron-right glyphicon-large"></span></a>
			 <?php
			} ?>
	</div>
<?php
		} else {
			echo '<div class="alert alert-warning text-center">';
			printf( __('You have no slides yet. You can <a href="%1$s">add your slides</a> or activate demo slides. The optimum image width/height ratio is %2$s, the best image size: %3$s.', 'b3'),
				admin_url('post-new.php?post_type=b3_slide'),
				'17:5', '1140 &times; 300 pixel');
		echo '</div>';
		}
	}
}

require B3_PATH . '/inc/template-tags.php';
require B3_PATH . '/inc/extras.php';
require B3_PATH . '/inc/customizer.php';
require B3_PATH . '/inc/jetpack.php';

function b3_footer_script() {
	if ('Y' == b3_option('image_rounded')) {
?>
<script type="text/javascript">
	jQuery('.entry-content img, img.avatar').addClass('img-rounded');
</script>
<?php
	}
}

add_action('wp_footer', 'b3_footer_script');
