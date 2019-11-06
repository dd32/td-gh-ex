<?php
function best_classifieds_setup() {
	load_theme_textdomain( 'best-classifieds',get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'best-classifieds-blog-image', $width = 750, $height = 500, true );
	
	register_nav_menus( array(
		'primary'    => esc_html__( 'Top Menu', 'best-classifieds' ),
	) );
	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',));
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-header');
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
}
add_action( 'after_setup_theme', 'best_classifieds_setup' );
function best_classifieds_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'best_classifieds_content_width', 640 );
}
add_action( 'after_setup_theme', 'best_classifieds_content_width', 0 );

add_filter('get_custom_logo','best_classifieds_change_logo_class');
function best_classifieds_change_logo_class($html)
{
	$html = str_replace('class="custom-logo"', 'class="img-responsive logo-fixed"', $html);
	$html = str_replace('width=', 'original-width=', $html);
	$html = str_replace('height=', 'original-height=', $html);
	$html = str_replace('class="custom-logo-link"', 'class="img-responsive logo-fixed"', $html);
	return $html;
}
// Filter for search form.
add_filter('get_search_form', 'best_classifieds_search_form');
function best_classifieds_search_form($html) {
	if(is_front_page()):
		$html='<form action="<?php echo esc_url(home_url()); ?>" role="search" method="get" id="searchformtop">
            <div class="filter-category">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">                           
                    <input type="search"  placeholder="'.esc_attr(get_theme_mod('search_area_placeholder',esc_attr__('What are you looking for?','best-classifieds'))).'" name="s" id="s" required="">                        
                </div>                        
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <input type="submit" value="'.esc_attr(get_theme_mod('search_area_btn_title',esc_attr__('Search','best-classifieds'))).'">
                </div>
            </div>
        </form>';
    endif;
 return $html;
}

add_action( 'admin_menu', 'best_classifieds_admin_menu');
function best_classifieds_admin_menu( ) {
    add_theme_page( esc_html__('Pro Feature','best-classifieds'), esc_html__('Best Classifieds Pro','best-classifieds'), 'manage_options', 'best-classifieds-pro-buynow', 'best_classifieds_pro_buy_now', 300 );   
}
function best_classifieds_pro_buy_now(){ ?>
<div class="best_classifieds_pro_version">
  <a href="<?php echo esc_url('https://fasterthemes.com/wordpress-themes/best-classifieds-pro/'); ?>" target="_blank">
    <img src ="<?php echo esc_url( get_template_directory_uri().'/assets/images/best-classifieds-pro-features.png' ); ?>" width="70%" height="auto" />
  </a>
</div>
<?php
}

include get_template_directory().'/inc/breadcumbs.php';
include get_template_directory().'/inc/fontawasome.php';
include get_template_directory().'/inc/template-setup.php';
include get_template_directory().'/inc/enqueues.php';
include get_template_directory().'/inc/theme-customization.php';