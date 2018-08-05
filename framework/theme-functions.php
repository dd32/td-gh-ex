<?php
/*
 * @package adviso, Copyright InkHive, rohitink.com
 * This file contains Custom Theme Related Functions.
 */
/*
* @package madhat, Copyright InkHive, rohitink.com
* This file contains Custom Theme Related Functions.
*/
//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/admin_scripts.php';
require get_template_directory() . '/framework/admin_modules/nav_walkers.php';


/*
** Function to check if Sidebar is enabled on Current Page
*/

function adviso_load_sidebar() {
    $load_sidebar = true;
    if ( get_theme_mod('adviso_disable_sidebar') == 'disable' ) :
        $load_sidebar = false;
    elseif( get_theme_mod('adviso_disable_sidebar_home') == 'disable' && is_home() )	:
        $load_sidebar = false;
    elseif( get_theme_mod('adviso_disable_sidebar_front') == 'disable' && e() ) :
        $load_sidebar = false;
    endif;

    return  $load_sidebar;
}


/*
** Add Body Class
*/
function adviso_body_class( $classes ) {

    $sidebar_class_name =  adviso_load_sidebar() ? "sidebar-enabled" : "sidebar-disabled" ;
    return array_merge( $classes, array( $sidebar_class_name ) );
}
add_filter( 'body_class', 'adviso_body_class' );



/*
**	Determining Sidebar and Primary Width
*/
function adviso_primary_class() {
    $sw = get_theme_mod('adviso_sidebar_width',4);
    $class = "col-md-".(12-$sw);

    if ( !adviso_load_sidebar() )
        $class = "col-md-12";

    echo $class;
}
add_action('adviso_primary-width', 'adviso_primary_class');


function adviso_secondary_class() {
    $sw = get_theme_mod('adviso_sidebar_width',4);
    $class = "col-md-".$sw;

    echo $class;
}
add_action('adviso_secondary-width', 'adviso_secondary_class');

/*
** Function to Get Theme Layout
*/
function adviso_get_blog_layout(){
    $ldir = 'framework/layouts/content';
    if (get_theme_mod('adviso_blog_layout') ) :
        get_template_part( $ldir , get_theme_mod('adviso_blog_layout') );
    else :
        get_template_part( $ldir ,'grid');
    endif;
}
add_action('adviso_blog_layout', 'adviso_get_blog_layout');

/*
** Function to Set Main Class
*/
function adviso_get_main_class(){

    $layout = get_theme_mod('adviso_blog_layout');
    if (strpos($layout,'adviso') !== false) {
        echo 'adviso-main';
    }
}
add_action('adviso_main-class', 'adviso_get_main_class');


	class Adviso_Comment_Walker extends Walker_Comment {
		var $tree_type = 'comment';
		var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
 
		// constructor – wrapper for the comments list
		function __construct() { ?>

			<li class="comments-list">

		<?php }

		// start_lvl – wrapper for child comments list
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>
			
			<ol class="child-comments comments-list">

		<?php }
	
		// end_lvl – closing wrapper for child comments list
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>

			</ol>

		<?php }

		// start_el – HTML for comment template
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $item;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 
	
			if ( 'article' == $args['style'] ) {
				$tag = 'article';
				$add_below = 'comment';
			} else {
				$tag = 'article';
				$add_below = 'comment';
			} ?>

			<li <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
				<div class="comment-container">
					<figure class="gravatar"><?php echo get_avatar( $item, 65, '', 'Author’s gravatar' ); ?></figure>
					<div class="comment-data">
						<div class="comment-meta post-meta" role="complementary">
							<h2 class="comment-author">
								<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
							</h2>
							<span><?php echo adviso_time_ago(); ?></span>
							<?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
							<?php if ($item->comment_approved == '0') : ?>
							<p class="comment-meta-item">Your comment is awaiting moderation.</p>
							<?php endif; ?>
						</div>
						<div class="comment-content post-content" itemprop="text">
							<?php comment_text() ?>
							<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div>
					</div>
				</div>

		<?php }

		// end_el – closing HTML for comment template
		function end_el(&$output, $item, $depth = 0, $args = array() ) { ?>

			</li>

		<?php }

		// destructor – closing wrapper for the comments list
		function __destruct() { ?>

			</li>
		
		<?php }

	}


/**
 *
 *	Transfer all toggle control values of Featured Areas to JS for use in Sorter
 *
**/

function adviso_sorter_val() {
	
	$adviso_val	=	array(
		
		'woocommerce'	=> 	class_exists('woocommerce'),
		'feat_posts'	=>	get_theme_mod( 'adviso_featposts_enable' ),
		'feat_posts_car'=> 	get_theme_mod( 'adviso_eta_enable' ),
		'feat_cat'		=> 	get_theme_mod( 'adviso_featposts_cat_enable' ),
		'feat_prod'		=> 	get_theme_mod( 'adviso_product_enable' ),
		'feat_prod_car'	=> 	get_theme_mod( 'adviso_product_eta_enable' ),
		
	);
	wp_localize_script( 'adviso-customize-control', 'sorter', $adviso_val );
}

add_action( 'customize_controls_enqueue_scripts', 'adviso_sorter_val' );



function adviso_sorter() {
	
	function show($s) {
		switch ($s) {
			case 'feat_posts' :
				get_template_part( 'framework/featured-components/featured', 'posts' );
			break;
			case 'feat_posts_car':
                get_template_part( 'framework/featured-components/featured-carousel', 'post' );
            break;
            case 'feat_cat':
                get_template_part( 'framework/featured-components/posts', 'cat' );
            break;
            case 'feat_prod':
                get_template_part( 'framework/featured-components/featured', 'products' );
            break;
            case 'feat_prod_car':
                get_template_part('framework/featured-components/featured-carousel', 'product' );
            break;
		}		
	}
	
	$order	=	explode( ',', get_theme_mod('adviso_sorter_control') );
	foreach( $order as $i ) {
		show( $i );
	}
}


/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return get_theme_mod('adviso_shop_column', 3); // Number of Products in a row
	}
}

/*
** Load WooCommerce Compatibility FIle
*/
if ( class_exists('woocommerce') ) :
    require get_template_directory() . '/framework/woocommerce.php';
endif;

/**
 *	Increase Quality of uploaded images
**/

add_filter('jpeg_quality', function($arg){return 100;});

add_filter( 'wp_editor_set_quality', function($arg){return 100;} );