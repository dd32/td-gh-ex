<?php	
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI',get_template_directory_uri());	
	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');	
	define('WEBRITI_THEME_OPTIONS_PATH',WEBRITI_TEMPLATE_DIR_URI.'/functions/theme_options');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php'); 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/webriti_nav_walker.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/woo/woocommerce.php' );
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tag.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');
	
	//Customizer 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-service.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-slider.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-home.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-project.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-blog.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-callout.php');
	
	
	//wp title tag starts here
	function webriti_head( $title, $sep )
	{	global $paged, $page;		
		if ( is_feed() )
			return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name','display' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description','display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( _e( 'Page %s', 'corpbiz' ), max( $paged, $page ) );
		return $title;
	}	
	add_filter( 'wp_title', 'webriti_head', 10, 2);
	
	add_action( 'after_setup_theme', 'webriti_setup' ); 	
	function webriti_setup()
	{	
		global $content_width;
        if ( ! isset( $content_width ) ){
              $content_width = 700;
        }
		// Load text domain for translation-ready
		load_theme_textdomain( 'corpbiz', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );
		add_theme_support( 'post-thumbnails' ); //supports featured image
		add_theme_support('woocommerce');//woocommerce support
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'corpbiz' ) ); //Navigation
		register_nav_menu( 'secondary', __( 'Secondary Menu', 'corpbiz' ) ); //Navigation
		// theme support 	
		//$args = array('default-color' => '#ffffff');
		//add_theme_support( 'custom-background', $args  ); 
		add_theme_support( 'automatic-feed-links');
		 add_theme_support( "title-tag" );
		
		require_once('theme_setup_data.php');
	} 
	
	add_filter('get_avatar','webriti_gravatar_class');
	function webriti_gravatar_class($class) {
		$class = str_replace("class='avatar", "class='img-responsive comment_img img-circle media-object", $class);
		return $class;
	}
	
		
	add_action( 'widgets_init', 'webriti_widgets_init');
	function webriti_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'corpbiz' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'corpbiz' ),
			'before_widget' => '<div class="sidebar_widget" >',
			'after_widget' => '</div>',
			'before_title' => '<div class="sidebar_widget_title"><h2>',
			'after_title' => '</h2></div>',
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'corpbiz' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'corpbiz' ),
			'before_widget' => '<div class="col-md-4 col-sm-6 footer_widget_column">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="footer_widget_title">',
			'after_title' => '</h2>',
		) );
	}
	/*******corpbiz css and js *******/
	function webriti_scripts()
	{	
		wp_enqueue_style('corpbiz-style', get_stylesheet_uri() );
		wp_enqueue_style('corpbiz-bootstrap-css', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap.css');
		wp_enqueue_style('corpbiz-submenu', WEBRITI_TEMPLATE_DIR_URI . '/css/bootstrap-submenu.css');
		wp_enqueue_style('corpbiz-theme-menu', WEBRITI_TEMPLATE_DIR_URI . '/css/theme-menu.css');	
		wp_enqueue_style('corpbiz-font-awesome-min',WEBRITI_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');	
		wp_enqueue_style('corpbiz-media-responsive', WEBRITI_TEMPLATE_DIR_URI . '/css/media-responsive.css');	
		
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script('jquery-collapse', WEBRITI_TEMPLATE_DIR_URI .'/js/collapse.js');
		wp_enqueue_script('jquery-flexslider-min-js', WEBRITI_TEMPLATE_DIR_URI .'/js/flexslider/jquery.flexslider-min.js');
		wp_enqueue_script('corpbiz-menu', WEBRITI_TEMPLATE_DIR_URI .'/js/menu/menu.js',array('jquery'));
		
		
		
		
		
		
		if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
	}
	add_action('wp_enqueue_scripts', 'webriti_scripts');
	// Read more tag to formatting in blog page 	
	function corpbiz_content_more($more)
	{  global $post;
		return '<div class="blog-btn-col"><a href="' . get_permalink() . "\" class=\"blog-btn\">Read More</a></div>";
	}   
	add_filter( 'the_content_more_link', 'corpbiz_content_more' );
	
	add_action('wp_head','head_enqueue_custom_css');
	function head_enqueue_custom_css()
	{
	$corpbiz_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); 
	if($current_options['webrit_custom_css']!='') {  ?>
	<style>
	<?php echo $current_options['webrit_custom_css']; ?>
	</style>
<?php } } 
function corpbiz_custmizer_style()
 {
		wp_enqueue_style('corpbiz-customizer-css',WEBRITI_TEMPLATE_DIR_URI.'/css/cust-style.css');
}
add_action('customize_controls_print_styles','corpbiz_custmizer_style');

function get_home_blog_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);		
		$original_len = strlen($excerpt);
		$excerpt = substr($excerpt, 0, 145);		
		$len=strlen($excerpt);	 
		if($original_len>275) {
		$excerpt = $excerpt;
		return $excerpt . '<div class="home-blog-btn"><a href="' . get_permalink() . '">Read More</a></div>';
		}
		else
		{ return $excerpt; }
	}


?>