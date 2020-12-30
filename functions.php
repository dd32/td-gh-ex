<?php
wp_body_open();
function ascreen_setup(){	
	global $content_width;

	$lang = get_template_directory(). '/languages';
	load_theme_textdomain('ascreen', $lang);
	
	$template_directory = get_template_directory();
	
	get_template_part('/custom/setup');

	//get_template_part('/share/tgm-plugin.php');

	get_template_part('/custom/inc');		
	get_template_part('/custom/theme-config');
				
	get_template_part('/share/breadcrumb-trail');
	
	if ( !function_exists('ascreen_themes_pro')) { 			
    	require_once( trailingslashit( get_template_directory() ) . 'share/customizer-pro/class-customize.php' );
	}

	add_theme_support('post-thumbnails');
	$args = array();
	$header_args = array( 
        'default-text-color'     => '00BAE1',
        'width'                  => 1920,
        'height'                 => 89,
        'flex-height'            => true
     );
	$background_args = array(
		'default-color' => 'f7f8f8',
	);	 
	add_theme_support( "title-tag" );		 
	add_theme_support( 'custom-background', $background_args );
	add_theme_support( 'custom-header', $header_args );
	
	
	add_theme_support( 'automatic-feed-links' );
	

	add_theme_support( 'custom-logo', array(
			   'height'      => 50,
			   'width'       => 50,
			   'flex-width' => true,
			) );

	//register menus
	register_nav_menus(
					   array(
						'header-menu' => __( 'Header Menu', 'ascreen' ) ,
					   	'footer-menu' => __( 'Footer Menu', 'ascreen' )	
					   )
					   );					   
					   
	

	add_editor_style("editor-style.css");
	if ( !isset( $content_width ) ) $content_width = 1170;	
}
add_action( 'after_setup_theme', 'ascreen_setup' );

function ascreen_custom_scripts()
{
	$theme_info = wp_get_theme();
	
	wp_enqueue_style('ascreen-base',  get_template_directory_uri() .'/css/base.css', false, $theme_info->get( 'Version' ), false);			
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/custom/css/font-awesome.min.css', false,"4.6.3", false);	
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/custom/css/bootstrap.min.css', false,"3.3.7", false);	

	if(is_front_page() ){
		wp_enqueue_style('animate',  get_template_directory_uri() .'/custom/css/animate.css', false,"3.5.1", false);
	}
	wp_enqueue_style('ascreen-main', get_stylesheet_uri(), false, $theme_info->get( 'Version' ) );	

	
	// add js script
	if(  get_theme_mod( 'enable_loader',1) )
	{
		wp_enqueue_script( 'queryloader2', get_template_directory_uri().'/js/queryloader2.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'ascreen-loader', get_template_directory_uri().'/js/loader.js', array( 'jquery' ), '', true );		
	}
	
	
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/custom/js/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );	



	//Sliding plug, similar articles for the bottom of the article or articles recently， need query 2.1.4
	if( get_theme_mod( 'post_previous_next','slider') != 'no-display' )
	{
		wp_enqueue_style('slick',  get_template_directory_uri() .'/custom/slick/slick.css', false, '4.5.0', false);
		wp_enqueue_style('slick-theme',  get_template_directory_uri() .'/custom/slick/slick-theme.css', false, '4.5.0', false);	
		wp_enqueue_script( 'slick', get_template_directory_uri().'/custom/slick/slick.min.js', array( 'jquery' ), '', true );				
		wp_enqueue_script( 'slick-user', get_template_directory_uri().'/custom/slick/slick-user.js', array( 'jquery' ), '', true );	
	}
	if( get_theme_mod( 'post_previous_next','slider') != 'no-display' ){	
		wp_enqueue_script('nav', get_template_directory_uri().'/custom/js/jquery.nav.js', array( 'jquery' ), "1.4.14", true );		
	}
	
				
		
	if(is_front_page() ){		
		wp_enqueue_script('waypoints', get_template_directory_uri().'/custom/js/jquery.waypoints.min.js', array( 'jquery' ), '4.0.0', true );

		wp_enqueue_script( 'parallax', get_template_directory_uri().'/custom/js/parallax.js', array( 'jquery' ), '1.4.2', true );

		wp_enqueue_script('ascreen-custom', get_template_directory_uri().'/custom/js/custom.js', array( 'jquery' ), $theme_info->get( 'Version' ), true );	
		wp_localize_script( 'ascreen-custom', 'ascreen_params', array(
			'ajaxurl'        => admin_url('admin-ajax.php'),
			'themeurl' => get_template_directory_uri(),
			
		)  );	
				
	}	

	wp_enqueue_script('ascreen-main', get_template_directory_uri().'/js/main.js', array( 'jquery' ),$theme_info->get( 'Version' ), true );	
	
	wp_add_inline_script( 'ascreen-main', ascreen_script_method() );			
}

add_action( 'wp_enqueue_scripts', 'ascreen_custom_scripts' );


function ascreen_styles_method() {
	wp_enqueue_style(
		'live-style',
		get_template_directory_uri() . '/css/custom_script.css'
	);
	
	$custom_css = '';


	$header_image       = get_header_image();
	if (isset($header_image) && ! empty( $header_image ))
	{
		$custom_css .= "header#header{background:url(".esc_url($header_image). ");}\n";
	}


	//if( ascreen_get_option( 'ascreen_option','fixed_header',1) == 0)
	if(get_theme_mod( 'fix_header',1))
	{
		
		$custom_css .= ".header{background-color: rgba(255,255,255,0.3);box-shadow: 0 1px 3px rgba(0,0,0,0.1);}.home .header{background-color:transparent;box-shadow:none;}.home .header-bg{background-color: rgba(255,255,255,0.3);box-shadow: 0 1px 3px rgba(0,0,0,0.1);}";
	}else{
		
		$custom_css .= "#header{position: inherit;}.blog-content{padding-top:30px;} .header{box-shadow: 0 1px 3px rgba(0,0,0,0.1);}";
		
		}	
	
	//if( ascreen_get_option( 'ascreen_option','box_header_center',0) == 0)
	if(!get_theme_mod( 'box_header_center',0))
	{
		$custom_css .= "#header .wrap{max-width:98%;}";
	}			
	if ( ! display_header_text() ){	
		$custom_css .=  '.ascreen_logo_text{ display:none;}';
	}			
		
	
	if ( 'blank' != get_header_textcolor() && '' != get_header_textcolor() )
	{
		$header_textcolor  =  ' color:#'.get_header_textcolor().';';
		
		$hover_color = ascreen_change_color('#'.get_header_textcolor(), 0.8);	
		
		$rbg_t = ascreen_hex2rgb( '#'.get_header_textcolor() );
		
		$custom_css .=  '#logo .blogdescription,#logo .blogname {'.esc_attr($header_textcolor).'}';
		$custom_css .=  '.header-nav>ul>li>a, .header-nav .btn>a,.header-nav > button{'.esc_attr($header_textcolor).';}';
		$custom_css .=  '.header-nav>button#header-nav-btn {
									'.esc_attr($header_textcolor).'
									border: #'.get_header_textcolor().' 1px solid;
									box-shadow: 0 0 4px rgba('.$rbg_t[0].','.$rbg_t[1].','.$rbg_t[2].',0.4);
								
								}	.header-nav>button:hover{
									background-color: rgba('.$rbg_t[0].','.$rbg_t[1].','.$rbg_t[2].',0.1);
								}';				
											
		$custom_css .=  '.header-nav>ul>li>a:hover, .header-nav .btn a:hover,.header-nav .sub-menu>li>a:hover{color:'.$hover_color.';}';
		
		$custom_css .=  '.header-nav .btn>a{border:#'.get_header_textcolor().' 1px solid;}';					
		$custom_css .=  '.header-nav .btn a:hover{background:'.$hover_color.';color:#ffffff;}';	
		
		if ( has_custom_logo() )
		{
							
			$custom_css .=  '@media screen and (max-width: 1000px)
			{
				.ascreen_logo_text{ display:none;}
			}';
		}else{
			
			$custom_css .=  '@media screen and (max-width: 1000px)
			{
				.blogdescription{ display:none;}
			}';	
			
		}
	}	
	$theme_color = get_theme_mod( 'theme_color_blue','#00c8f2');
	$theme_color_hover = ascreen_change_color($theme_color, 0.8); 
	
	$custom_css .= '.blog-category li a:hover,.blog-article-list .info .author a:hover,.blog-article-content a:hover{ color:'.$theme_color_hover.';  }';
	
	
	//siderbar			
	if( get_theme_mod( 'siderbar_layout','right-sidebar') == 'left-sidebar'){$custom_css .= '.blog-content .main{float: right;}.blog-content .sidebar {   float: left;  }';}

	if( get_theme_mod( 'siderbar_layout','right-sidebar') == 'no-sidebar'){$custom_css .= '.blog-content .main{float:none;width: 100%;}	.blog-content .sidebar { display:none;}';}
				

	//footer	
	$footer_background_color           = esc_attr(get_theme_mod( 'footer_background_color','#EAE8E8'));
	
	$footer_background_color_attr                   = ascreen_get_background($footer_background_color , 1);	
	
	$imagepath =  get_template_directory_uri() . '/custom/images/'; 
	$footer_background_image                   = esc_url(get_theme_mod('footer_background_image', $imagepath.'footer-bg.jpg'));	
	
	if($footer_background_image ==''){
		$custom_css .=  '#footer{'.$background_footer_bottom.'}';
	}else{
		
		$custom_css .=  '#footer{background-image: url('.$footer_background_image.');background-size: auto auto; }';
		
	}
	
	$footer_text_color     =  esc_attr(get_theme_mod( 'footer_text_color','#f9f9f9'));
	//echo '---888---';
	$footer_link_color     =  esc_attr(get_theme_mod( 'footer_link_color','#f2f2f2'));	
	//echo '---888---';			
	$footer_link_hover_color     =  esc_attr(get_theme_mod( 'footer_link_hover_color','#00c8f2'));	

	$custom_css .= ".footer-bottom .copyright,.footer-top dt{color: ".$footer_text_color.";}\r\n";
	$custom_css .= ".footer-top ul li>a,.footer-top ul li a,.copyright a{color: ".$footer_link_color.";}\r\n";				
	$custom_css .= ".footer-top ul li>a:hover,.footer-top ul li a:hover,.copyright a:hover{color: ".$footer_link_hover_color.";}\r\n";					

	$custom_css .=  '#features td, tbody {display:table-row-group; width: 100% !important;}';	


	//header css
	
	get_template_part('/share/Mobile_Detect');
	$detect = new Mobile_Detect;	
	if ( $detect->isMobile() ) {
		$custom_css .='
		
		';
	}

	if ( get_background_color() !=''  ){
		$custom_css .='html body {	background-image:none;}';	
	}
		
	if ( ! display_header_text() ){	
		$custom_css .=  '.ascreen_logo_text{ display:none;}';
	}			
		
	//siderbar			
	if( get_theme_mod( 'siderbar_layout','right-sidebar') == 'left-sidebar'){$custom_css .= '.main-body .col-md-8{float: right;}';}

	
	
	// get sction live css
	$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout', ascreen_section_default_order() ) );
	

	if ( ! empty( $sortable_value ) ) : 
	  foreach ( $sortable_value as $checked_value ) :
	  
		$custom_css .= ascreen_section_live_css($checked_value);

	  endforeach;
	endif; 


	
	wp_add_inline_style( 'live-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'ascreen_styles_method' );




function ascreen_script_method() {	
	$custom_js = 'jQuery(document).ready(function($){';

	// get sction live js
	$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout', ascreen_section_default_order() ) );
	

	if ( ! empty( $sortable_value ) ) : 
	  foreach ( $sortable_value as $checked_value ) :
	  
		$custom_js .= ascreen_section_live_js($checked_value);

	  endforeach;
	endif; 

	$custom_js .= '});';
	
	
	return $custom_js;
}


function ascreen_better_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
?>	
 
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment_avatar">
                <?php echo get_avatar($comment, $size = '45'); ?>
            </div>

            <div class="comment_postinfo">
                <?php printf(__('<cite class="fn">%s</cite> <span class="says"> on </span>','ascreen'), get_comment_author_link()) ?>
                <span class="comment_date"><?php printf(__('%1$s at %2$s','ascreen'), get_comment_date(),  get_comment_time()) ?></span><?php edit_comment_link(__('(Edit)','ascreen'),'  ','') ?>
            </div> <!-- .comment_postinfo -->

            <div class="comment_area">				
                <div class="comment-content clearfix">
                	<?php if ($comment->comment_approved == '0') : ?>
                     	<em><?php _e('Your comment is awaiting moderation.','ascreen') ?></em>
                     	<br />
                    <?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    
                    <div class="reply-container">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>
                      
                </div> <!-- end comment-content-->
            </div> <!-- end comment_area-->
        </article> <!-- .comment-body -->
        
<?php
}


function ascreen_get_author_info() 
{
	?>
    <div class="author">
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> . 
        <time><?php the_date();?></time> . 
        <?php
        $categories = get_the_category();
        if(! empty( $categories ))
        {
            foreach($categories as $category) {
                $category->cat_ID;
                $category->cat_name;
				$cat_links=get_category_link($category->cat_ID );
				?>
				<a href="<?php echo esc_url($cat_links); ?>" title="<?php echo esc_html($category->cat_name); ?>">#<?php echo esc_html($category->cat_name);?>&nbsp;</a>
                <?php
            }
            
        }
        ?>                        
    </div>
	<?php
}

function ascreen_get_the_category() 
{
	$categories = get_the_category();
	 
	if ( ! empty( $categories ) ) {
		$cat_name = $categories[0]->cat_name;
		$cat_ID = $categories[0]->cat_ID;
	}
	
	$cat_links=get_category_link($cat_ID);
	
	echo "<a href=\"".esc_url($cat_links)."\" class=\"newsflash\">#".esc_html($cat_name)."</a>";
	
	
}


function ascreen_get_share_url() 
{
	?>
	<div class="share">
		<?php if( get_theme_mod( 'twitter_url','#') != ''){?>
		<a target="_blank" href="<?php echo esc_url(get_theme_mod( 'twitter_url','#') );?>" class="share-twitter cbutton cbutton--effect-jagoda"><i class="icon-twitter"></i></a>
		<?php }?>
		<?php if( get_theme_mod( 'google_plus_url','#') != ''){?>
		<a target="_blank" href="<?php echo esc_url(get_theme_mod( 'google_plus_url','#') );?>" class="share-google-plus cbutton cbutton--effect-jagoda"><i class="icon-google-plus"></i></a>
		<?php }?>
		<?php if( get_theme_mod( 'facebook_url','#') != ''){?>                                
		<a target="_blank" href="<?php echo esc_url(get_theme_mod( 'facebook_url','#'));?> " class="share-facebook cbutton cbutton--effect-jagoda"><i class="icon-facebook"></i></a>
		<?php }?>
	</div>
	<?php	
}

/* this function gets thumbnail from Post Thumbnail or Custom field or First post image */
if ( ! function_exists( 'ascreen_get_thumbnail' ) ) {
	function ascreen_get_thumbnail($post_id)
	{
		if(has_post_thumbnail())
		{
			
			$ct_post_thumbnail_fullpath=wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), "Full");
			$thumb_array['fullpath'] = $ct_post_thumbnail_fullpath[0];
		
		}else{
			$post_content = get_post($post_id)->post_content;
			$thumb_array['fullpath'] = ascreen_catch_that_image($post_content);
		}	
		
		if($thumb_array['fullpath']=="" )
		{
			
			$thumb_array['fullpath'] = get_template_directory_uri()."/images/default-thumbnail.jpg";
		
		}		

		return $thumb_array;
		
	}
}

function ascreen_catch_that_image($post_content)
{
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
  if($output!='')  $first_img = $matches[1][0];

  return $first_img;
}


/**
 * Convert Hex Code to RGB   #FFFFFF -> 255 255 255
 * @param  string $hex Color Hex Code
 * @return array       RGB values
 
 ascreen_hex2rgb( '#FFFFFF')
 */
function ascreen_hex2rgb( $hex )
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

/* user:
$colour = '#00A800';
$brightness = 0.9; // 90% brighter
$newColour = cts_change_color($colour,$brightness);
*/
function ascreen_change_color($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE 
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}


function ascreen_get_typography( $option_name,$option_default= array() )
{
  $return = '';
	
  $value = get_theme_mod( $option_name, $option_default );

  if ( isset( $value['font-family'] ) ) {
	$return .= 'font-family: \''.$value['font-family'].'\', sans-serif;';
  }
  if ( isset( $value['variant'] ) ) {
	$return .= 'font-style:'.$value['variant'].';';  
  }

  if ( isset( $value['font-size'] ) ) {
	$return .= 'font-size:'.$value['font-size'].';';  
	//echo '<p>' . sprintf( esc_attr_e( 'Font Size: %s', 'ascreen' ), $value['font-size'] ) . '</p>';
  }
  if ( isset( $value['line-height'] ) ) {
	$return .= 'line-height:'.$value['line-height'].';';  
	//echo '<p>' . sprintf( esc_attr_e( 'Line Height: %s', 'ascreen' ), $value['line-height'] ) . '</p>';
  }
  if ( isset( $value['letter-spacing'] ) ) {
	$return .= 'letter-spacing:'.$value['letter-spacing'].';'; 
	//echo '<p>' . sprintf( esc_attr_e( 'Letter Spacing: %s', 'ascreen' ), $value['letter-spacing'] ) . '</p>';
  }
  if ( isset( $value['color'] ) ) {
	$return .= 'color:'.$value['color'].';'; 
	//echo '<p>' . sprintf( esc_attr_e( 'Color: %s', 'ascreen' ), $value['color'] ) . '</p>';
  }	
  if ( isset( $value['text-transform'] ) ) {
	$return .= 'text-transform:'.$value['text-transform'].';';  
  }  
  
  if ( isset( $value['text-transform'] ) ) {
	$return .= 'text-align:'.$value['text-align'].';';  
  }    
  
  return $return ; 
}

/*	
*	get background 
*	---------------------------------------------------------------------
*/
function ascreen_get_background($args,$opacity=1)
{
	$background = "";


	$rgb = ascreen_hex2rgb($args);
	$background .= "background-color:rgba(".$rgb[0].",".$rgb[1].",".$rgb[2].",".esc_attr($opacity).");";

	return $background;
}
