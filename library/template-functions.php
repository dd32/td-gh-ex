<?php
    /**
     * Functions which enhance the theme by hooking into WordPress
     *
     * @package avadanta
     */

function avadanta_theme_sidebars() {

    // Blog Sidebar

    register_sidebar(array(
        'name' => esc_html__( 'Blog Sidebar', "avadanta"),
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Sidebar on the blog layout.', "avadanta"),
        'before_widget' => '<div id="%1$s" class="wgs wgs-sidebar  sidebar-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="wgs-heading clearfix">',
        'after_title' => '</h3> ',
    ));
        

    // Footer Sidebar


    register_sidebars( 4, array(
		'name'          => esc_html__( 'Footer Area %d', 'avadanta' ),
		'id'            => 'avadanta-footer-area',
		'description'   => esc_html__( 'Added widgets are display at footer widget area.', 'avadanta' ),
		'before_widget' => '<div class="footer-widget wgs-content %2$s">',
        'after_widget' => '</div>', 
        'before_title' => ' <h3 class="wgs-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'avadanta_theme_sidebars' );


function avadanta_body_classes( $classes ) {
	$layout_option = sanitize_text_field( get_theme_mod('avadanta_site_layout', '') );
	// Adds a class of group-blog to blogs with more than 1 published author.
	
if( $layout_option == 'boxed' )
{
	$classes[]    = 'body-boxed';	
}
	return $classes;

}
add_filter( 'body_class', 'avadanta_body_classes' );

 if( !function_exists('avadanta_breadcrumbs') ): function avadanta_breadcrumbs() {
$image = get_header_image();
  ?>
<div class="banner banner-inner tc-light brdcrmbs">
        <div class="banner-block">
          <div class="container">
            <div class="row">
              <div class="<?php if ( is_singular() || is_search()  ) { ?>col-md-12 single-full <?php } else { ?>col-md-6 <?php } ?>">
                <div class="banner-content">
                  <?php if(is_home()): ?>
                            <h1 class="banner-heading" ><?php bloginfo('name'); ?></h1>
                            <?php else: ?>
                              <h1 class="banner-heading">
                                <?php if ( is_archive() ) {
                                  the_archive_title( '<h1 class="banner-heading">', '</h1>' );
                                }
                                 elseif(is_search()){

                                  echo  esc_html__('Search Results For ', 'avadanta') . ' " ' . esc_html(get_search_query()) . ' "';

                                 }elseif ( is_404() ) {
                                  echo  esc_html__('Nothing Found ', 'avadanta');
                                 }
                                 else{
                                  
                                    echo esc_html( get_the_title() );
                                    
                                  } 
                                 ?>
                              </h1>
                            <?php endif; 
                            ?>
                </div>
              </div>
              <?php if ( !is_singular() && !is_search() ) { ?>
                <div class="col-md-6">
                     <?php
                      $avadanta_header_show_breadcrumb =  get_theme_mod( 'avadanta_header_show_breadcrumb', 0 );
                      if($avadanta_header_show_breadcrumb==0){
                        ?>
                        <div class="header-bennar-right">
                            <?php breadcrumb_trail(); ?>
                        </div>
                      <?php } ?>
                    </div>
                  <?php } ?>
            </div>
          </div>
          <div class="bg-image header-bg-image">
            <img src="<?php echo esc_url(get_header_image()); ?>" alt="banner">
          </div>
        </div>
        
      </div>
<?php } endif;


function avadanta_inline_css(){

$custom_css      = '';

$avadanta_color_scheme = get_theme_mod( 'avadanta_color_scheme', '#1b1b1b' );

$custom_css      .= '.tc-light.footer-s1::after{background-color: ' . esc_attr( $avadanta_color_scheme) . ';}';

$avadanta_footer_widgets_title_color = get_theme_mod( 'avadanta_footer_widgets_title_color','#fff' );

$custom_css      .= '.footer-widget .wgs-title{color: ' . esc_attr( $avadanta_footer_widgets_title_color) . ';}';

$avadanta_footer_widgets_text_color = get_theme_mod( 'avadanta_footer_widgets_text_color','#fff' );

$custom_css      .= '.footer-widget a,.footer-widget.widget_categories li,.footer-widget.widget_meta li a,.footer-widget.widget_calendar td,.footer-widget.widget_nav_menu div li a, .footer-widget.widget_pages li a,.footer-widget .recentcomments,.footer-widget .recentcomments a{color: ' . esc_attr( $avadanta_footer_widgets_text_color) . ';}';

$avadanta_menubar_bg_color = get_theme_mod( 'avadanta_menubar_bg_color','#fff' );

$custom_css      .= '.header-s1 .header-main{background-color: ' . esc_attr( $avadanta_menubar_bg_color) . ' !important;}';

$avadanta_menu_item_color = get_theme_mod('avadanta_menu_item_color','#131313');

$custom_css      .= '.avadanta-navigate .nav-menu>.menu-item>a{color: ' . esc_attr( $avadanta_menu_item_color) . ';}';

$avadanta_menu_item_hover_color = get_theme_mod('avadanta_menu_item_hover_color','#ff7029');

$custom_css      .= '.avadanta-navigate .nav-menu>.menu-item>a:hover{color: ' . esc_attr( $avadanta_menu_item_hover_color) . ';}';

$avadanta_submenu_item_hover_color = get_theme_mod('avadanta_submenu_item_hover_color','#ff7029');

$custom_css      .= '.menu .sub-menu li:hover > a, .menu .children li:hover > a{color: ' . esc_attr( $avadanta_submenu_item_hover_color) . ';}';

$avadanta_breadcrumb_title_color = get_theme_mod('avadanta_breadcrumb_title_color','#fff');

$custom_css      .= '.brdcrmbs .banner-heading, .breadcrumb-row .breadcrumb-item.trail-end span{color: ' . esc_attr( $avadanta_breadcrumb_title_color) . ';}';

$avadanta_header_bg_color = get_theme_mod('avadanta_header_bg_color','#000');

$custom_css      .= '.brdcrmbs .bg-image.overlay-fall::after{background: ' . esc_attr( $avadanta_header_bg_color) . ';}';


$avadanta_theme_color_scheme = get_theme_mod('avadanta_theme_color_scheme','#ff7029');               

$custom_css      .= '.btn,.btn-theme:hover,.dash::before, .dash::after,
       .comment-respond .form-submit input,
       .widget_tag_cloud .tagcloud a:hover,.main-header-area .main-menu-area nav ul li ul > li:hover, .main-header-area .main-menu-area nav ul li ul > li .active,
       .main-slider-three .owl-carousel .owl-nav .owl-next:hover,.comment-respond .form-submit input:hover,.widget_tag_cloud .tagcloud a:hover,.srvc .bg-darker,.project-area.project-call
       {background-color: ' . esc_attr( $avadanta_theme_color_scheme) . ';}';

$custom_css      .= '.nav-links .page-numbers,.social li
       {
        background-color: ' . esc_attr( $avadanta_theme_color_scheme) . ';
        border: 1px solid '. esc_attr( $avadanta_theme_color_scheme) . '}';

$custom_css      .= 'blockquote
       {
        border-left: 5px solid '. esc_attr( $avadanta_theme_color_scheme) . '}';

$custom_css      .= '.comment-respond .form-submit input{border-color: ' . esc_attr( $avadanta_theme_color_scheme) . ';}';

$custom_css      .= '
       .post-content h4 a:hover,.header-bennar-right ul li a,.wgs-sidebar ul li a:hover,.post-full .post-content h3 a:hover,.reply a,.logged-in-as a,.heading-xs.tc-primary,.search-submit-header,.copyright a,.nav-links .page-numbers.current,.error-text-large,.post-content-s2 .post-tag,.heading-xs,.tes-author .author-con-s2 .author-name,.readmre a,.srvc .feature-icon{
                     color: ' . esc_attr( $avadanta_theme_color_scheme) . '!important; ;
                }';

$custom_css      .= '.avadanta-navigate ul ul
       {
        border-top: 4px solid '. esc_attr( $avadanta_theme_color_scheme) . '}';


$custom_css      .= '.btn-read-more-fill{border-bottom: 1px solid ' . esc_attr( $avadanta_theme_color_scheme) . ' !important;}';


$custom_css      .= ' .nav-links .page-numbers:hover{background-color:  #fff;
                     border-bottom: 1px solid ' . esc_attr( $avadanta_theme_color_scheme) . ' !important;
                     color:' . esc_attr( $avadanta_theme_color_scheme) . ' !important;}';


$custom_css      .= '.contact-banner-area .color-theme, .projects-2-featured-area .featuredContainer .featured-box:hover .overlay,.sidebar-title:before{background-color: ' . esc_attr( $avadanta_theme_color_scheme) . ';opacity:0.8;}';

$custom_css      .= '.bg-primary,.slick-dots li.slick-active,.post-full .post-date,.preloader.preloader-dalas:before,
.preloader.preloader-dalas:after,.back-to-top{background-color: ' . esc_attr( $avadanta_theme_color_scheme) . ' !important;}';


$avadanta_footer_opacity = get_theme_mod('avadanta_footer_opacity_section','0.0');

$custom_css      .= '.tc-light.footer-s1::after{opacity: ' . esc_attr( $avadanta_footer_opacity) . ';}';


$braedcrumb_height = get_theme_mod('braedcrumb_height','62');

$custom_css      .= '.banner.brdcrmbs .banner-block{min-height: ' . esc_attr( $braedcrumb_height) . 'vh;}';

    wp_add_inline_style( 'avadanta-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'avadanta_inline_css' );

function avadanta_check_plugin() {
  if ( !is_plugin_active('avadanta-companion/avadanta.php') ) {

    add_filter( 'theme_page_templates', 'avadanta_remove_page_template' );
    function avadanta_remove_page_template( $pages_templates ) {
    unset( $pages_templates['main-page.php'] );
    return $pages_templates;
}

  }
}
add_action( 'admin_init', 'avadanta_check_plugin' );

?>