<?php
/**
* Functions file used by the iFeature theme.
*
* Author: Tyler Cunningham
* Copyright: © 2011
* {@link http://cyberchimps.com/ CyberChimps LLC}
*
* Released under the terms of the GNU General Public License.
* You should have received a copy of the GNU General Public License,
* along with this software. In the main directory, see: license.txt.
* If not, see: {@link http://www.gnu.org/licenses/}.
*
* @package iFeature
* @since 3.1
*/

/**
* Define the theme globals.
*/ 
	$themename = 'ifeature';
	$themenamefull = 'iFeature';
	$themeslug = 'if';
	$root = get_template_directory_uri(); 
	$slider_default = "$root/images/ifeaturefree.jpg";
	$pagedocs = 'http://cyberchimps.com/question/using-the-ifeature-free-3-page-options/';
	$sliderdocs = 'http://cyberchimps.com/question/using-the-ifeature-3-slider/';
	
/**
* Redirect to the theme options panel upon activation.
*/ 
if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=ifeature' );
	
/**
* Show a single gallery thumb and list the number of photos in the gallery.
*/ 
function if_custom_gallery_post_format( $content ) {
global $options, $themeslug, $post;
$root = get_template_directory_uri(); 
ob_start();
?>
	<?php if ($options->get($themeslug.'_post_formats') == '1') : ?>
		<div class="postformats"><!--begin format icon-->
			<img src="<?php echo get_template_directory_uri(); ?>/images/formats/gallery.png" />
		</div><!--end format-icon-->
	<?php endif;?>
	
		<h2 class="posts_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<!--Call @Core Meta hook-->
			<?php chimps_post_byline(); ?>
		<!--End @Core Meta hook-->
		<?php
			if ( has_post_thumbnail() && $options->get($themeslug.'_show_featured_images') == '1' && !is_single() ) {
 		 		echo '<div class="featured-image">';
 		 		echo '<a href="' . get_permalink($post->ID) . '" >';
 		 			the_post_thumbnail();
  				echo '</a>';
  				echo '</div>';
			}
		?>	
		<div class="entry" <?php if ( has_post_thumbnail() && $options->get($themeslug.'_show_featured_images') == '1' ) { echo 'style="min-height: 115px;" '; }?>>
				
			<?php if (!is_single()): ?>
				<?php $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
			<figure class="gallery-thumb">
				<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				<br /><br />
				This gallery contains <?php echo $total_images ; ?> images
				<?php endif;?>
			</figure><!-- .gallery-thumb -->
			<?php endif;?>
		
			<?php if (is_single()): ?>
				<?php the_content(); ?>
			<?php endif;?>
		</div><!--end entry-->
		<div style=clear:both;></div>
		
	<?php	
	$content = ob_get_clean();
	
	return $content;
}
add_filter('chimps_post_formats_gallery_content', 'if_custom_gallery_post_format' ); 

/**
* Custom post excerpts based on theme options.
*/ 
function if_new_excerpt_more($more) {

	global $themename, $themeslug, $options;
    
    	if ($options->get($themeslug.'_excerpt_link_text') == '') {
    		$linktext = '(Read More...)';
   		}
    
    	else {
    		$linktext = $options->get($themeslug.'_excerpt_link_text');
   		}
    
    global $post;
	return '<a href="'. get_permalink($post->ID) . '"> <br /><br /> '.$linktext.'</a>';
}
add_filter('excerpt_more', 'if_new_excerpt_more');

function if_new_excerpt_length($length) {

	global $themename, $themeslug, $options;
	
		if ($options->get($themeslug.'_excerpt_length') == '') {
    		$length = '55';
    	}
    
    	else {
    		$length = $options->get($themeslug.'_excerpt_length');
    	}

	return $length;
}
add_filter('excerpt_length', 'if_new_excerpt_length');

/**
* Auto-feed links.
*/ 
add_theme_support('automatic-feed-links');
	
/**
* Featured image options.
*/ 
function if_init_featured_image() {	
	if ( function_exists( 'add_theme_support' ) ) {
 		global $themename, $themeslug, $options;
	
		if ($options->get($themeslug.'_featured_image_height') == '') {
			$featureheight = '100';
		}		
		else {
			$featureheight = $options->get($themeslug.'_featured_image_height'); 
		
		}
		if ($options->get($themeslug.'_featured_image_width') == "") {
			$featurewidth = '100';
		}		
		else {
			$featurewidth = $options->get($themeslug.'_featured_image_width'); 
		} 
	 
	set_post_thumbnail_size( $featurewidth, $featureheight, true );
	}	
}
add_action( 'init', 'if_init_featured_image', 11);	

/**
* Support featured images.
*/ 
add_theme_support( 'post-thumbnails' );

/**
* Editor style.
*/ 
add_editor_style();

/**
* PIE support.
*/   
function if_render_ie_pie() { ?>
	
	<style type="text/css" media="screen">
		#wrapper input, textarea, input[type=submit], input[type=reset], #imenu, .searchform, .post_container, .postformats, .postbar, .post-edit-link, .widget-container, .widget-title, .footer-widget-title, .comments_container, ol.commentlist li.even, ol.commentlist li.odd, .slider_nav, #twitterbar, ul.metabox-tabs li, .tab-content, .list_item, .section-info, #of_container #header, .menu ul li a, .submit input, #of_container textarea, #of_container input, #of_container select, #of_container .screenshot img, #of_container .of_admin_bar, #of_container .subsection > h3, .subsection, #of_container #content .outersection .section
  		
  		{behavior: url('<?php echo get_template_directory_uri(); ?>/core/library/pie/PIE.htc');}
  		
	</style>
<?php
}

add_action('wp_head', 'if_render_ie_pie', 8);
	
/**
* Call script for Nivo Slider.
*/ 
function if_nivoslider(){
	 
	$path =  get_template_directory_uri() ."/core/library/ns";
	$script = "<script type=\"text/javascript\" src=\"".$path."/jquery.nivo.slider.js\"></script>";
	
	echo $script;
}
add_action('wp_head', 'if_nivoslider');

/**
* Script for +1 button.
*/ 
function if_plusone(){
	
	$path =  get_template_directory_uri() ."/core/library/js";
	$script = "<script type=\"text/javascript\" src=\"".$path."/plusone.js\"></script>";
	
	echo $script;
}
add_action('wp_head', 'if_plusone');

/**
* Menu JS.
*/ 
function if_menu_script(){
	
	$path =  get_template_directory_uri() ."/core/library/js";
	$script = "<script type=\"text/javascript\" src=\"".$path."/menu.js\"></script>";
	
	echo $script;
}
add_action('wp_footer', 'if_menu_script');
	
/**
* Load jQuery.
*/ 
function if_jquery() {
	if ( !is_admin() ) {
	   wp_enqueue_script('jquery');
	}
}
add_action('wp_enqueue_scripts', 'if_jquery');	

// Menu fallback
	
	function if_menu_fallback() {
	global $post; ?>
	
	<ul id="menu-nav" class="sf-menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}

	
/**
* Register custom menus.
*/ 
function if_register_menus() {
	register_nav_menus(
	array( 'header-menu' => 'Header Menu', 'footer-menu' => 'Footer Menu' )
  );
}
	add_action( 'init', 'if_register_menus' );

/**
* Initialize the widgets. 
*/ 
function ifp_widgets_init() {
    register_sidebar(array(
    	'name' => 'Sidebar Widgets',
    	'id'   => 'sidebar-widgets',
    	'description'   => 'These are widgets for the sidebar.',
    	'before_widget' => '<div id="%1$s" class="widget-container">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="widget-title">',
    	'after_title'   => '</h2>'
    ));
   	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer-widgets',
		'description' => 'These are the footer widgets',
		'before_widget' => '<div class="grid_3 footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	));
}
add_action ('widgets_init', 'ifp_widgets_init');

/**
* Link to theme options in admin bar.
*/ 
function if_admin_link() {
	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array( 'id' => 'iFeature', 'title' => 'iFeature Options', 'href' => admin_url('themes.php?page=ifeature')  ) ); 
}
add_action( 'admin_bar_menu', 'if_admin_link', 113 );

/**
* Content width.
*/ 
if ( ! isset( $content_width ) ) $content_width = 608;

/**
* Initialize the CyberChimps Core Framework.
*/ 
require_once ( get_template_directory() . '/core/core-init.php' );
do_action('chimps_init');

/**
* Call additional files.
*/ 
require_once ( get_template_directory() . '/inc/classy-options-init.php' );
require_once ( get_template_directory() . '/inc/options-functions.php' );
require_once ( get_template_directory() . '/inc/meta-box.php' );	
require_once ( get_template_directory() . '/inc/theme-hooks.php' ); 
require_once ( get_template_directory() . '/inc/theme-actions.php' ); 

/**
* End of file.
*/ 
?>