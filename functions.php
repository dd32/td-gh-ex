<?php
$template_directory = get_template_directory();
global $themename, $shortname, $ct_store_options_in_one_row, $default_colorscheme,$ct_plugin_dir_path;

$ct_plugin_dir_path = '';
//define 
define( 'CT_THEME_PRO_USED', false );

if( defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED ){
define( 'CT_SHORTCODES_USED', true );//false true
define( 'CT_FEATURED_HOMEPAGE_USED', true );//Homepage Slider
define( 'CT_HOMEPAGE_SLIDER_USED', true );
define( 'CT_VIDEO_BACKGROUND_USED', true );
define( 'CT_GOOGLE_FONTS_USED', true );
define( 'CT_PAGE_BUILDER_USED', false );
}
define( 'CT_ACOOL_VERSION', '1.3.1' );
define( 'CT_ACOOL_COOTHEMES', false );

add_action( 'wp_enqueue_scripts', 'jquery_register' );
function jquery_register()
{
	if ( !is_admin() )
	{
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', ( get_template_directory_uri() .'/js/jquery-2.1.4.min.js' ), false, '2.1.4', true );
		//replace   google url: https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js
		wp_enqueue_script( 'jquery' );
	}
}

require_once( $template_directory . '/includes/theme-setup.php' );

if ( defined( 'CT_THEME_PRO_USED' ) && CT_THEME_PRO_USED ){
	require_once( $template_directory . '/includes/pro-theme-setup.php');
}
/**
 * Theme functions
 //include comment.php 
 */
require_once( $template_directory . '/includes/custom-functions.php' );

if ( defined( 'CT_SHORTCODES_USED' ) && CT_SHORTCODES_USED ){
	require_once( $template_directory . '/includes/shortcodes/shortcodes.php');
}


//auto active_plugins
if ( defined( 'CT_PAGE_BUILDER_USED' ) && CT_PAGE_BUILDER_USED === true ){
			
	$plugins = get_option('active_plugins');
	$puginsToActiv = array('so-widgets-bundle/so-widgets-bundle.php');//'siteorigin-panels/siteorigin-panels.php',
	foreach ($puginsToActiv as $key => $value)
	{
		if (!in_array($value, $plugins))
		{
			array_push($plugins,$value);
			update_option('active_plugins',$plugins);
		}
	}		
}

if( !class_exists("Mobile_Detect") ) 
require_once( $template_directory . '/includes/Mobile_Detect.php' );

/*
 * Loads the Options Panel    theme options
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if (!function_exists('optionsframework_init'))
{
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/includes/options-framework/' );
	require_once( $template_directory . '/includes/options-framework/options-framework.php');	
}
	
	
/**
 * Theme functions
 */

// set support  "Featured Image"
add_theme_support('post-thumbnails'); 
add_image_size('s475', 475, 475);

//hiden admin header bar
/*
function hide_admin_bar($flag)
{
	return false;
}*/
//add_filter('show_admin_bar','hide_admin_bar');


//Theme Customizer

//-------------- Customizer add css ---------------
function ct_acool_customize_register( $wp_customize ) {

    $wp_customize->add_setting( 'ct_acool[header_bgcolor]', array(//ct_style_options[header_bgcolor]
        'default'        => '#ffffff',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => '__return_false',
        'transport'      => 'postMessage'
    ) );  
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bgcolor_html_id', array(
        'label'        => __( 'Header Background Color', 'Acool' ),
        'section'    => 'colors',
        'settings'   => 'ct_acool[header_bgcolor]',
    ) ) );


/*
	$wp_customize->add_section( 'ct_color_schemes' , array(
		'title'       => __( 'Schemes', 'Acool' ),
		'priority'    => 60,
		'description' => __( 'Note: Color settings set above should be applied to the Default color scheme.', 'Acool' ),
	) );
	$wp_customize->add_setting( 'ct_acool[color_schemes]', array(
		'default'		=> 'none',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );
	$wp_customize->add_control( 'ct_acool[color_schemes]', array(
		'label'		=> __( 'Color Schemes', 'Acool' ),
		'section'	=> 'ct_color_schemes',
		'settings'	=> 'ct_acool[color_schemes]',
		'type'		=> 'select',
		'choices'	=> array(
			'none'   => __( 'Default', 'Acool' ),
			'green'  => __( 'Green', 'Acool' ),
			'orange' => __( 'Orange', 'Acool' ),
			'pink'   => __( 'Pink', 'Acool' ),
			'red'    => __( 'Red', 'Acool' ),
		),
	) );
	*/
	

	//fonts	
	
	if ( defined( 'CT_GOOGLE_FONTS_USED' ) && CT_GOOGLE_FONTS_USED )
	{	
		$google_fonts = ct_get_google_fonts();
	
		$font_choices = array();
		$font_choices['none'] = 'Default Theme Font';
		foreach ( $google_fonts as $google_font_name => $google_font_properties ) 
		{
			$font_choices[ $google_font_name ] = $google_font_name;
		}	
		
		$wp_customize->add_section( 'ct_google_fonts' , array(
			'title'		=> __( 'Fonts', 'Acool' ),
			'priority'	=> 50,
		) );
	
		$wp_customize->add_setting( 'ct_acool[heading_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => '__return_false',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[heading_font]', array(
			'label'		=> __( 'Header Font', 'Acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[heading_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
	
	
		$wp_customize->add_setting( 'ct_acool[menu_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => '__return_false',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[menu_font]', array(
			'label'		=> __( 'Menu Font', 'Acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[menu_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
	
		$wp_customize->add_setting( 'ct_acool[title_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => '__return_false',
			'transport'		=> 'postMessage'
		) );
	
		$wp_customize->add_control( 'ct_acool[title_font]', array(
			'label'		=> __( 'Title Font', 'Acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[title_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );	
		$wp_customize->add_setting( 'ct_acool[body_font]', array(
			'default'		=> 'Open Sans',
			'type'			=> 'option',
			'capability'	=> 'edit_theme_options',
			'sanitize_callback' => '__return_false',
			'transport'		=> 'postMessage'
		) );
		$wp_customize->add_control( 'ct_acool[body_font]', array(
			'label'		=> __( 'Body Font', 'Acool' ),
			'section'	=> 'ct_google_fonts',
			'settings'	=> 'ct_acool[body_font]',
			'type'		=> 'select',
			'choices'	=> $font_choices
		) );
		
	}	
	

	//Theme Settings section
	$wp_customize->add_section( 'ct_acool_settings' , array(
		'title'		=> __( 'Theme Settings', 'Acool' ),
		'priority'	=> 40,
	) );
	$wp_customize->add_setting( 'ct_acool[show_search_icon]', array(
		'default'       => 'on',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => '__return_false',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[show_search_icon]', array(
		'label'		=> __( 'Show Search Icon', 'Acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );
		
	$wp_customize->add_setting( 'ct_acool[box_header_center]', array(
		'default'       => 'on',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'sanitize_callback' => '__return_false',
		'transport'		=> 'postMessage',
	) );
	$wp_customize->add_control( 'ct_acool[box_header_center]', array(
		'label'		=> __( 'Box Header Center', 'Acool' ),
		'section'	=> 'ct_acool_settings',
		'type'      => 'checkbox',
		'priority'  => 50,
	) );		
		
		
   //Custom CSS Section	
	/*// Custom CSS Settings Section
   $wp_customize->add_panel('ct_add_custom_css_setting', array(
      'capabitity' => 'edit_theme_options',
      'priority' => 50,
      'title' => __('Custom CSS Settings', 'Acool')
   ));*/
   
   
 /*  
	$wp_customize->add_section( 'ct_add_custom_css' , array(
		'title'		=> __( 'Custom CSS Section', 'Acool' ),
		'priority'	=> 60,
        //'panel' => 'ct_add_custom_css_setting',		
	) );
	$wp_customize->add_setting( 'ct_acool[add_custom_css]', array(
		'default'       => 'boby{margin:0;}',
		//'type'			=> 'textarea',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage',
		//'sanitize_callback' => 'ct_add_custom_css_f',
	) );
	$wp_customize->add_control( 'ct_acool[add_custom_css]', array(
		'label'		=> __( 'Custom CSS', 'Acool' ),
		'section'	=> 'ct_add_custom_css',
		'settings'	=> 'ct_acool[add_custom_css]',		
		'type'      => 'textarea',
		'priority'  => 60,
	) );
	
/*	
    //Footer Copy Right Text
   $wp_customize->add_section('acool_footer_copyright', array(
        'priority' => 70,
        'title' => __('Footer Copyright', 'Acool'),
    ));

    $wp_customize->add_setting('ct_acool[footer_copyright]', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        //'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('ct_acool[footer_copyright]',array(
        'type' => 'textarea',
        'label' => __('Copyright', 'Acool'),
        'section' => 'acool_footer_copyright',
        'setting' => 'ct_acool[footer_copyright]',
    ));
	
	*/
	
	
	
	
}
add_action( 'customize_register', 'ct_acool_customize_register' );

/* ==============================CUSTOM CSS================================ */
function add_custom_css()
{
	$options = get_theme_mod('ct_acool');
	//$options = get_option('theme_mods_acool');
	$custom_css = $options['add_custom_css'];
	
	if (!empty($custom_css)) {
?>
	<style type="text/css">
	<?php echo $custom_css; ?>
	</style>
<?php 
	}
}
add_action('wp_head','add_custom_css');

/*
add to head
<link rel='stylesheet' id='google-fonts-css'  href='http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
*/

if( defined( 'CT_GOOGLE_FONTS_USED' ) && CT_GOOGLE_FONTS_USED )
{
	function acool_google_fonts_scripts(){
		$ct_gf_heading_font_arr =  get_option( 'ct_acool');
		$ct_gf_heading_font     = sanitize_text_field($ct_gf_heading_font_arr['heading_font'],'');				
		$ct_gf_body_font        = sanitize_text_field($ct_gf_heading_font_arr['body_font'],'');
		$ct_gf_title_font       = sanitize_text_field($ct_gf_heading_font_arr['title_font'],'');	
		$ct_gf_menu_font        = sanitize_text_field($ct_gf_heading_font_arr['menu_font'],'');	
		
					if ( '' != $ct_gf_heading_font ){
						$str_name = str_replace(' ','-',$ct_gf_heading_font);
						wp_enqueue_style('acool-'.$str_name,  esc_url(ct_get_google_fonts_url($ct_gf_heading_font)) );
					}				
					if ( '' != $ct_gf_title_font ){
						$str_name = str_replace(' ','-',$ct_gf_title_font);						
						wp_enqueue_style('acool-'.$str_name,  esc_url(ct_get_google_fonts_url($ct_gf_title_font)), false, '', false);				
					}					
					if ( '' != $ct_gf_menu_font ){
						$str_name = str_replace(' ','-',$ct_gf_menu_font);
						wp_enqueue_style('acool-'.$str_name,  esc_url(ct_get_google_fonts_url($ct_gf_menu_font)) );
					}
					if ( '' != $ct_gf_body_font ){
						$str_name = str_replace(' ','-',$ct_gf_body_font);						
						wp_enqueue_style('acool-'.$str_name,  esc_url(ct_get_google_fonts_url($ct_gf_body_font)), false, '', false);				
					}
	}
	
	add_action( 'wp_enqueue_scripts', 'acool_google_fonts_scripts' );
}

//Part 2: Generating Live CSS
function ct_customize_css()
{
    $ct_acool = get_option('ct_acool');
    ?>
		<style type="text/css"><?php 
			if($ct_acool['header_bgcolor'] != '')
			{
				echo '.site-header { background-color:'.$ct_acool['header_bgcolor'].';}';
			}
			if($ct_acool['header_bgcolor'] == '#ffffff') 
			{
				echo '.ct_header_class{border-bottom-color:#F0F0F0;}';	
			}
			else
			{
				echo '.ct_header_class{border-bottom-color:'.$ct_acool['header_bgcolor'].'; }';
				
			}
			if( defined( 'CT_GOOGLE_FONTS_USED' ) && CT_GOOGLE_FONTS_USED )
			{			
				//$ct_gf_font_arr =  get_option( 'ct_acool');
				
				$ct_gf_heading_font     = sanitize_text_field($ct_acool[heading_font],'');
				$ct_gf_heading_font_css = '.ct_logo .ct_site_name,.ct_logo .ct_site_tagline';

				$ct_gf_menu_font     = sanitize_text_field($ct_acool[menu_font],'');
				$ct_gf_menu_font_css = '#ct-top-navigation nav#top-menu-nav ul li a,#ct_mobile_nav_menu ul li a';
				
				$ct_gf_title_font     = sanitize_text_field($ct_acool[title_font],'');
				$ct_gf_title_font_css = 'h1, h2, h3, h4, h5, h6,.case-tx0,.case-tx1,h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,.footer-widget .ioftsc-lt span';				
							
				$ct_gf_body_font        = sanitize_text_field($ct_acool[body_font],'');
				$ct_gf_body_font_css    = 'html, body, div, span, applet, object, iframe, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td ';


				if ( '' != $ct_gf_heading_font ){
					//Attaches Google Font to given css elements
					ct_gf_attach_font( $ct_gf_heading_font, $ct_gf_heading_font_css );
				}
				if ( '' != $ct_gf_title_font ){
					ct_gf_attach_font( $ct_gf_title_font, $ct_gf_title_font_css );
				}
				if ( '' != $ct_gf_menu_font ){
					ct_gf_attach_font( $ct_gf_menu_font, $ct_gf_menu_font_css );
				}
				if ( '' != $ct_gf_body_font )
				{
					ct_gf_attach_font( $ct_gf_body_font, $ct_gf_body_font_css );
				}/*else{
					ct_gf_attach_font( 'Open Sans', $ct_gf_body_font_css );
				}*/
			}
			if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			{			
				echo '.ct_site_name{ line-height:52px; }';	
			}
			if(ct_get_option( 'ct_acool','box_header_center' ))
			{
				echo '#ct-top-navigation{ margin:15px 0 0 0;}.ct_logo{ padding-left:20px;}';
			
			}
			
			?></style>
    <?php
}

add_action( 'wp_head', 'ct_customize_css');
add_action( 'customize_controls_print_styles', 'ct_customize_css' );


//real time show
function ct_acool_load_scripts(){
	global $wp_styles;

	$template_dir = get_template_directory_uri();

	$theme_version = '1.1.0';

	wp_enqueue_script( 
		  'acool-customizer',			//Give the script an ID
		  get_template_directory_uri().'/js/theme-customizer.js',//Point to file
		  array( 'jquery','customize-preview' ),	//Define dependencies
		  '',						//Define a version (optional) 
		  true						//Put script in footer?
	);


}

//footer.php add <?php wp_footer(); ?->
add_action( 'customize_preview_init', 'ct_acool_load_scripts' );


function ct_customizer_color_scheme_class( $body_class ) {
	$color_scheme        = get_option( 'ct_acool' );
	$color_scheme_prefix = 'ct_color_scheme_';

	if ( 'none' !== $color_scheme[color_schemes] ) $body_class[] = $color_scheme_prefix . $color_scheme[color_schemes];

	return $body_class;
}
//add_filter( 'body_class', 'ct_customizer_color_scheme_class' );

//-------------- add css end---------------


 	/*	
	*	get background 
	*	---------------------------------------------------------------------
	*/
function acool_get_background($args,$opacity=1)
{
	$background = "";
 	if (is_array($args))
	{
		if (isset($args['image']) && $args['image']!="")
		{
			$background .= "background-image:url(".esc_url($args['image']). ");";
			$background .= "background-repeat: ".esc_attr($args['repeat']).";";
			$background .= "background-position: ".esc_attr($args['position']).";";
			$background .= "background-attachment: ".esc_attr($args['attachment']).";";
		}
	
		if(isset($args['color']) && $args['color'] !="")
		{
			$rgb = acool_hex2rgb($args['color']);
			$background .= "background-color:rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",".esc_attr($opacity).");";
		}

	}
	return $background;
}

/**
 * Convert Hex Code to RGB
 * @param  string $hex Color Hex Code
 * @return array       RGB values
 */
function acool_hex2rgb( $hex )
{
	if ( strpos( $hex,'rgb' ) !== FALSE )
	{
		$rgb_part = strstr( $hex, '(' );
		$rgb_part = trim($rgb_part, '(' );
		$rgb_part = rtrim($rgb_part, ')' );
		$rgb_part = explode( ',', $rgb_part );
		
		$rgb = array($rgb_part[0], $rgb_part[1], $rgb_part[2], $rgb_part[3]);
		
	}
	elseif( $hex == 'transparent' )
	{
		$rgb = array( '255', '255', '255', '0' );
	}
	else
	{
		$hex = str_replace( '#', '', $hex );	
		if( strlen( $hex ) == 3 )
		{
			$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
			$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
			$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
		}
		else
		{
			$r = hexdec( substr( $hex, 0, 2 ) );
			$g = hexdec( substr( $hex, 2, 2 ) );
			$b = hexdec( substr( $hex, 4, 2 ) );
		}
		$rgb = array( $r, $g, $b );
	}

	return $rgb; // returns an array with the rgb values
}



//header add mobile_nav
function ct_add_mobile_navigation(){
	printf(
		'<div id="ct_mobile_nav_menu">
			<a href="#" class="mobile_nav closed">
				<span class="select_page">%1$s</span>
				<span class="mobile_menu_bar"></span>
			</a>
		</div>',
		esc_html__( 'Select Page', 'Acool' )
	);
}
add_action( 'ct_header_top', 'ct_add_mobile_navigation' );



function my_more_link($more_link, $more_link_text) {
return str_replace($more_link_text, 'Read More...', $more_link);
}
add_filter('the_content_more_link', 'my_more_link', 10, 2); 


function acool_paging_nav(){
	global $wp_query;
	$pages = $wp_query->max_num_pages; 
	if ( $pages >= 2 ): 
		$big = 999999999; 
		$paginate = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'end_size' => 13, 
			'type' => 'array' 
			));
		echo '<div class="ct_page_nav"><ul class="pagination">';
		foreach ($paginate as $value)
		{
			echo '<li>'.$value.'</li>';
		}
		echo '</ul></div>';
	endif;
}


/**
 * WordPress breadcrumbs
 * //since 1.0.2  ct_breadcrumbs()
 */
function ct_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span>';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $home = home_url();
	echo ' <a href="' . $home . '">'.$name. '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore;
      single_cat_title();
      echo  $currentAfter;
 
    } elseif ( is_day() ) {
		
      echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y' , 'Acool' ) ) . '">' . get_the_time('Y') . ' ' . $delimiter . '</a>';
      echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( esc_attr__( 'F' , 'Acool' ) ) . '">' . get_the_time('F') . '</a>' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      //echo '' . get_the_time('Y') . ' ' . $delimiter . ' ';
      echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( esc_attr__( 'Y' , 'Acool' ) ) . '">' . get_the_time('Y') . ' ' . $delimiter . '</a>';	  
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '' . get_the_title($page->ID) . '';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page', 'Acool') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}

?>