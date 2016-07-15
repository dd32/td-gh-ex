<?php
function acool_setup(){
	global $content_width;
	$lang = get_template_directory(). '/languages';
	load_theme_textdomain('acool', $lang);
	add_theme_support( 'post-thumbnails' ); 
	$args = array();
	$header_args = array( 
	    'default-image'          => '',
		'default-repeat' => 'no-repeat',
        'default-text-color'     => '2C2C2C',
		'url'                    => '',
        'width'                  => 1920,
        'height'                 => 89,
        'flex-height'            => true
     );
	add_theme_support( 'custom-background', $args );
	add_theme_support( 'custom-header', $header_args );
	
	add_theme_support( 'automatic-feed-links' );//
	add_theme_support('nav_menus');//
	add_theme_support( "title-tag" );//
	
	add_theme_support( 'custom-logo', array(
			   'height'      => 52,
			   'width'       => 262,
			   'flex-width' => true,
			) );

	// set support  "Featured Image"
	add_theme_support('post-thumbnails'); 
	add_image_size('s475', 475, 475);

	//register menus
	register_nav_menus(
					   array(
						'primary-menu' => __( 'Primary Menu', 'acool' ) ,
					   	'secondary-menu' => __( 'Secondary Menu', 'acool' ),
					   	'footer-menu' => __( 'footer Menu', 'acool' )	
					   )
					   );
					   
	add_editor_style("editor-style.css");
	if ( !isset( $content_width ) ) $content_width = 1170;
}
add_action( 'after_setup_theme', 'acool_setup' );


	
function acool_custom_scripts()
{
	global $is_IE;
	$theme_info = wp_get_theme();
	
	wp_enqueue_style('acool-font-awesome-css',  get_template_directory_uri() .'/css/font-awesome.min.css', false, '4.5.0', false);
	wp_enqueue_style('acool-bootstrap-css',  get_template_directory_uri() .'/css/bootstrap.min.css', false, '3.3.5', false);	
	wp_enqueue_style('acool-main', get_stylesheet_uri(), array(), $theme_info->get( 'Version' ) );	
		
	//js
	wp_enqueue_script('acool-bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '3.3.5', false );	
	if(acool_get_option( 'ct_acool','enable_query_loader',0))
	{
		wp_enqueue_script( 'acool-queryloader2', get_template_directory_uri().'/js/queryloader2.min.js', array( 'jquery' ), '', false );
	}
	$fixed_header  =  acool_get_option( 'ct_acool','fixed_header',0);	
	if( ($fixed_header && !is_front_page() ) || ($fixed_header && is_front_page() && !acool_get_option( 'ct_acool','enable_home_page',1) ) || is_home()   )	
	{		
		wp_enqueue_script( 'acool-fixed-header', get_template_directory_uri().'/js/fixed-header.js', array( 'jquery' ), '', false );		
	}		
	wp_enqueue_script('acool-main', get_template_directory_uri().'/js/common.js', array( 'jquery' ), $theme_info->get( 'Version' ), false );
	wp_enqueue_script( 'acool-waypoints', get_template_directory_uri().'/js/jquery.waypoints.min.js', array( 'jquery' ), $theme_info->get( 'Version' ), false );
}
  
if (!is_admin())
{
	add_action( 'wp_enqueue_scripts', 'acool_custom_scripts' );
}

//change tag cloud font size
add_filter('widget_tag_cloud_args','acool_set_tag_cloud_sizes');
function acool_set_tag_cloud_sizes($args)
{
	$args['smallest'] = 11;
	$args['largest'] = 19;
	return $args;
}

// Generating Live CSS
function acool_customize_css()
{
    ?>
		<style  id='acool_customize_css' type="text/css">
	<?php
			$acool_custom_css = "";
			$header_image       = get_header_image();
			if (isset($header_image) && ! empty( $header_image ))
			{
				$acool_custom_css .= "header.ct_header_class{background:url(".esc_url($header_image). ");}\n";
			}
			
			if ( 'blank' != get_header_textcolor() && '' != get_header_textcolor() )
			{
				$header_textcolor  =  ' color:#' . get_header_textcolor() . ';';
				$acool_custom_css .=  '.ct_site_name,.ct_site_tagline	{'.esc_attr($header_textcolor).'}';
				$acool_custom_css .=  '#ct-top-navigation nav#top-menu-nav ul li a,#ct_mobile_nav_menu ul li a{'.esc_attr($header_textcolor).'}';
				$acool_custom_css .=  '#ct-top-navigation nav#top-menu-nav ul li a:hover,#ct_mobile_nav_menu ul li a:hover{color:#0c8432}';		 
			}
			
			$header_opacity       =  acool_get_option( 'ct_acool','header_opacity',0.6);

			$fixed_header  =  acool_get_option( 'ct_acool','fixed_header',0);	
			//$section_1_content        = esc_attr(of_get_option('section_1_content','content'));
			if( $fixed_header )
			{
				$acool_custom_css  .= ".fixed{ position: fixed; width: 100%; background: rgba(220, 220, 220, ".$header_opacity.") !important;opacity:".$header_opacity.";z-index:999;}.carousel-caption{bottom: 10%;top: 25%;}";
			}
			
			$acool_custom_css  .=  '.ct_header_class_post_page{border-bottom-width: 1px;border-bottom-style: solid;	border-bottom-color: #EEE;}';

			if ( acool_get_option( 'ct_acool','show_search_icon',1 ) ) {
				
				$acool_custom_css  .=  '#top-menu{ margin-right:10px;}';
				$acool_custom_css  .=  '#ct_top_search{ margin:18px 40px 0 0;}';
			}
			
			$acool_custom_css   = esc_html($acool_custom_css);
			
			$acool_custom_css   = str_replace('&gt;','>',$acool_custom_css);
			echo $acool_custom_css;		
	
			//------- customize css  -------
			$header_bgcolor = acool_get_option( 'ct_acool','header_bgcolor','#ffffff');

			if($header_bgcolor !='' && $header_bgcolor !='#ffffff')
			{
				echo '.site-header { background-color:'.$header_bgcolor.';}';
			}

			$fixed_header  =  acool_get_option( 'ct_acool','fixed_header',0);	
			if($header_bgcolor == '#ffffff') 
			{
				if(!$fixed_header){
					echo '.ct_header_class{border-bottom-color:#F0F0F0;}';	
				}
			}
			else
			{				
				if(!$fixed_header){
					echo '.ct_header_class{border-bottom-color:'.$header_bgcolor.'; }';
				}
			}
			
			if( defined( 'CT_GOOGLE_FONTS_USED' ) && CT_GOOGLE_FONTS_USED )
			{			

				$ct_gf_heading_font     = sanitize_text_field(acool_get_option( 'ct_acool','heading_font','' ),'');
				$ct_gf_heading_font_css = '.ct_logo .ct_site_name,.ct_logo .ct_site_tagline';

				$ct_gf_menu_font     	= sanitize_text_field(acool_get_option( 'ct_acool','menu_font','' ),'');
				$ct_gf_menu_font_css 	= '#ct-top-navigation nav#top-menu-nav ul li a,#ct_mobile_nav_menu ul li a';
				
				$ct_gf_title_font     	= sanitize_text_field(acool_get_option( 'ct_acool','title_font','' ),'');
				$ct_gf_title_font_css 	= 'h1, h2, h3, h4, h5, h6,.case-tx0,.case-tx1,h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,.footer-widget .ioftsc-lt span';				
							
				$ct_gf_body_font        = sanitize_text_field(acool_get_option( 'ct_acool','body_font','' ),'');
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
				}
			}
			if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			{			
				echo '.ct_site_name{ line-height:52px; }';	
			}
			if(acool_get_option( 'ct_acool','box_header_center',0 ))
			{
				echo '#ct-top-navigation{ margin:15px 0 0 0;}.ct_logo{ padding-left:20px;}';
			
			}

			if ( '' != acool_get_option( 'ct_acool','footer_info','' ) )
			{
				echo '.ct_social{ margin-top:15px;}';
			}
			
			$other_link_color      		= acool_get_option( 'ct_acool','other_link_color','' );
			$other_link_hover_color 	= acool_get_option( 'ct_acool','other_link_hover_color','' );			
			$content_link_color 		= acool_get_option( 'ct_acool','content_link_color','' );			
			$content_link_hover_color 	= acool_get_option( 'ct_acool','content_link_hover_color','' );			
			
			if( $other_link_color !='' )
			{
				echo 'a:link, a:visited, a:focus,a{color:'.$other_link_color.';}';	
			}
			else
			{
				echo 'a:link, a:visited, a:focus,a{color:#2b2b2b;}';
			}
			if( $other_link_hover_color !='' )
			{
				echo  'a:hover{color:'.$other_link_hover_color.';}';	
			}
			else
			{
				echo  'a:hover{color:#0c8432;}';
			}
			
			if( $content_link_color !='' )
			{				
				echo '.ct_single_content a{color: '.$content_link_color.';}';
			}
			else
			{
				echo '.ct_single_content a{color: #03a325;}';
			}
			if( $content_link_hover_color !='' )
			{
				echo  '.ct_single_content a:hover{color: '.$content_link_hover_color.';text-decoration: none;}';
			}
			else
			{
				echo  '.ct_single_content a:hover{color: #0c8432;text-decoration: none;}';
			}
			
			?></style>
    <?php
}
add_action( 'wp_head', 'acool_customize_css');
add_action( 'customize_controls_print_styles', 'acool_customize_css' );