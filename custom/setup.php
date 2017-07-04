<?php

function ascreen_check_enable_section($key)
{
	
  $section_default = ascreen_section_default_order();
  
  $sortable_value = maybe_unserialize( get_theme_mod( 'home_layout',$section_default ) );
  $return = false;
  
  if ( ! empty( $sortable_value ) ) : 
	foreach ( $sortable_value as $checked_value ) :
	  if($checked_value == $key){  $return = true; break;  }
	endforeach;
  endif; 	
	
	
  return $return;
}


$theme_info = wp_get_theme();
$template_directory = get_template_directory();

require_once( $template_directory . '/custom/widgets/widgets.php');



// add next and previous article in the page bootom
if ( ! function_exists( 'ascreen_previous_next' ) )
{
	function ascreen_previous_next($exclude_id)
	{		

		$str = get_theme_mod( 'post_previous_next','normal');

		
		if($str == 'cat')
		{
			$categories = get_the_category();
			$categoryIDS = array();
			foreach ($categories as $category)
			{
				array_push($categoryIDS, $category->term_id);
			}
			$categoryIDS = implode(",", $categoryIDS);
				
			if (get_previous_post($categoryIDS) || get_next_post($categoryIDS))	{
				echo '<div class="ct_border">';
			}
			
			if (get_previous_post($categoryIDS))
			{
				previous_post_link('&lt;&lt; %link','%title',true);
				echo '&nbsp;&nbsp;&nbsp;';
			}	
			
			if (get_next_post($categoryIDS)) { next_post_link('%link &gt;&gt;','%title',true);}
			
			if (get_previous_post($categoryIDS) || get_next_post($categoryIDS))	{
				echo '</div>';
			}			
		}

		else if($str == 'normal')
		{
			if(get_previous_post() || get_next_post()){
				//echo '<div class="ct_border">';
			}
			if (get_previous_post()){		
				previous_post_link('&lt;&lt; %link');
				echo '&nbsp;&nbsp;&nbsp;';
			 }
			if (get_next_post()){			
				next_post_link('%link &gt;&gt;');
			}
			if(get_previous_post() || get_next_post()){
				//echo '</div>';
			}			
		}
		
		else
		{
			if(get_previous_post() || get_next_post()){
				echo '<div class="ct_border">';
			}
			if (get_previous_post()){		
				previous_post_link('&lt;&lt; %link');
				echo '&nbsp;&nbsp;&nbsp;';
			 }
			if (get_next_post()){			
				next_post_link('%link &gt;&gt;');
			}
			if(get_previous_post() || get_next_post()){
				echo '</div>';
			}				
		}
	}
}

if ( ! function_exists( 'ascreen_get_section_menu' ) ) {
	function ascreen_get_section_menu(){
		$section_menu = '';

		$sortable_value = maybe_unserialize( get_theme_mod( 'home_layout',ascreen_section_default_order() ) );
	
		if ( ! empty( $sortable_value ) ) : 
		  foreach ( $sortable_value as $checked_value ) :
			$section_menu .= '<li><a href="'.esc_url(home_url('/')).'#'.$checked_value.'">'.ucfirst($checked_value).'</a></li>';
		  endforeach;
		endif; 
	
		return $section_menu;
	}

}



function ascreen_section_live_css($key){
  $custom_css ='';
    	
  switch($key){

	case 'slider':	
	  //slider css	
	  $i=1;
	  $key = 'slider';
	  
	  $default_content = ascreen_section_content_default($key);
	
	  $slider_title_typography_default     = array(
		  'font-family'    => 'Roboto',
		  'variant'        => '100',
		  'font-size'      => '56px',
		  'color'          => '#ffffff',
		  'text-transform' => 'Uppercase',
		  'text-align'     => 'center'
	  );
	  $slider_description_typography_default     = array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'color'          => '#ffffff',
			'text-transform' => 'none',
			'text-align'     => 'center'
		);	
	  $slider_button_typography_default     = array(
			'font-family'    => 'Roboto',
			'variant'        => '300',
			'font-size'      => '20px',
			'color'          => '#ffffff',
			'text-transform' => 'Uppercase',
			'text-align'     => 'center'
		);
		
	  $slider_title_typography = ascreen_get_typography( 'slider_title_typography', $slider_title_typography_default );
	  $slider_description_typography = ascreen_get_typography( 'slider_description_typography', $slider_description_typography_default );  
	  $slider_button_typography = ascreen_get_typography( 'slider_button_typography', $slider_button_typography_default );  
	  
	  $slider_button_background = get_theme_mod( 'slider_button_background', '#00c8f2' );  
	  
	  $slider_button_background_hover = ascreen_change_color($slider_button_background,0.8);;
	
	
	  $j=0;

	
	  $custom_css .=".ct_slider_warp .carousel-caption h1.slider_title{ $slider_title_typography font-weight: lighter;}.ct_slider_warp .carousel-caption p.ct_slider_text{  $slider_description_typography font-weight: lighter;}.ct_slider .ct_slider_warp  a.btn{ $slider_button_typography background-color: $slider_button_background; border-color:$slider_button_background_hover;border-radius: 4px;font-weight: lighter; }.ct_slider .ct_slider_warp a:hover.btn{ background-color:$slider_button_background_hover;}";
	
	  
	  $repeater_value = get_theme_mod( 'repeater_slider',$default_content);	
	  if ( ! empty( $repeater_value ) ) :	
		foreach ( $repeater_value as $row ) : 
		  if ( isset( $row[ 'slider_image' ] ) && !empty( $row[ 'slider_image' ] ) ) :
			$image_id = wp_get_attachment_url( $row[ 'slider_image' ] );
			if ( $image_id )
			{
			  $slide_image = esc_url( $image_id );
			} else {
			  $slide_image = esc_url( $row[ 'slider_image' ] );
			}
	
			$custom_css .=".ct_slider_item_".($j+1)."{background-image: url(".$slide_image.");background-size:auto 100%;background-position: center;}.ct_slider_item_".($j+1).":after {content: '';position: absolute;width: 100%;height: 100%;top: 0;left: 0;background-color: rgba(37, 46, 53, 0.5);}";
	
	 
		  endif;
		  
		  $j++;
		endforeach;	
	  endif;
	  //slider css end 
 	  break;
	  	
	
	
	case 'download':
	   
	//download
	  $i=12;
	  $key = 'download';

	  //--------------public css set-------------------
	  $sections = ascreen_get_section_default(); 
	  $default = $sections[$key];
	  
	  // section title hr	  
	  $title_typography_value = get_theme_mod( $key.'_title_typography', ascreen_get_default_title_font($key) );
	  $title_bottom_hr_color  = ascreen_change_color($title_typography_value['color'],0.5);
	  
	  $custom_css .='section.ct_section_'.$i.' .section-title-hr { border-top: 1px solid '.$title_bottom_hr_color.';}
	  section.ct_section_'.$i.'  .section-title-hr:after {  border-top: 10px solid '.$title_bottom_hr_color.';}';
	  
	 
	  //background color and  opacity  
	  $section_background_color     = get_theme_mod( $key.'_section_background_color',$default['color']); 
	  $section_background_opacity     = get_theme_mod( $key.'_section_background_opacity',1); 
	
	  $background                    = ascreen_get_background( $section_background_color , $section_background_opacity );	
	  $custom_css .='section.ct_section_'.$i.' {'.$background.' background-size: 100% auto;}';  
	  
	  // background_image 
	  $section_background_image     = get_theme_mod( $key.'_section_background_image',$default['img']); 
	  if ( $section_background_image != '' ){$custom_css .='section.ct_section_'.$i.' {background-image:url('.$section_background_image.');}';  } 
	  
	  //padding 
	  $padding_default = array( 'top' => $default['padding_top'] ,'bottom' => $default['padding_bottom'] ,'left' => '0' ,'right' => '0' );
	  $section_padding     = get_theme_mod( $key.'_section_padding',$padding_default);
		
	  $custom_css .='section.ct_section_'.$i.' .section_content{padding:'.$section_padding['top'].' '.$section_padding['right'].' '.$section_padding['bottom'].' '.$section_padding['left'].';}'; 
	
	  //--------------public css set end----------------
	
	
	  //--------------section css set-------------------

	  $download_button_color_hover     = get_theme_mod( 'download_button_color_hover','#00ccff'); 

	  $custom_css.= 'section.ct_section_12  a.btn:hover{	background-color: #fff;text-decoration: none;color:'.$download_button_color_hover.' ; border: 1px solid '.$download_button_color_hover.';}';
	  
	  $custom_css.= 'section.ct_download p{ font-weight: lighter;}';
	  break;			  	  
	
	case 'blog':	
		
	  $i=10;
	  $key = 'blog';
  
	  //--------------public css set-------------------
	  $sections = ascreen_get_section_default(); 
	  
	  $default = $sections[$key];


	  $enable_parallax_background = get_theme_mod( $key.'_enable_parallax_background', 1 );
	 
	
	  
	  // section title hr	  
	  $title_typography_value = get_theme_mod( $key.'_title_typography', ascreen_get_default_title_font($key) );
	  $title_bottom_hr_color  = ascreen_change_color($title_typography_value['color'],0.5);
	  
	  $custom_css .='section.ct_section_'.$i.' .section-title-hr { border-top: 1px solid '.$title_bottom_hr_color.';}
	  section.ct_section_'.$i.'  .section-title-hr:after {  border-top: 10px solid '.$title_bottom_hr_color.';}';
	  
	 
	  //background color and  opacity  
	  $section_background_color     = get_theme_mod( $key.'_section_background_color',$default['color']); 
	  $section_background_opacity     = get_theme_mod( $key.'_section_background_opacity',1); 
	
	
	  // background
	  $section_background_image  = get_theme_mod( $key.'_section_background_image',$default['img']); 
	  
	  if(!$enable_parallax_background){
		$background                    = ascreen_get_background( $section_background_color , $section_background_opacity );	
		$custom_css .='section.ct_section_'.$i.' {'.$background.' background-size: 100% auto;}';  
	  
		if ( $section_background_image != '' ){$custom_css .='section.ct_section_'.$i.' {background-image:url('.$section_background_image.');}';  } 
	  }
	  
	  //padding 
	  $padding_default = array( 'top' => $default['padding_top'] ,'bottom' => $default['padding_bottom'] ,'left' => '0' ,'right' => '0' );
	  $section_padding     = get_theme_mod( $key.'_section_padding',$padding_default);
		
	  $custom_css .='section.ct_section_'.$i.' .section_content{padding:'.$section_padding['top'].' '.$section_padding['right'].' '.$section_padding['bottom'].' '.$section_padding['left'].';}'; 
	
	  $blog_button_color_hover = get_theme_mod( 'blog_button_color_hover','#00c8f2');
	  $blog_button_bg_color=ascreen_hex2rgb( $blog_button_color_hover );
	  
	  
	  $custom_css .= '.post_readmore_bttn { background-color: rgba('.$blog_button_bg_color[0].','.$blog_button_bg_color[1].','.$blog_button_bg_color[2].',0.1);   color: '.$blog_button_color_hover.'; border: 1px solid '.$blog_button_color_hover.';} 
	  .post_readmore_bttn:hover,.post_readmore_bttn:active { background-color: '.$blog_button_color_hover.';  }';		

 	  break;
	  
	default:
	  $custom_css  = '';	
	  	  

  }
  
  return $custom_css;	
}



function ascreen_section_live_js($key){
  $custom_js ='';
    	
  switch($key){

	case 'slider': 
	  $custom_js .= '	var height_all = jQuery(window).height();
		jQuery(".carousel-inner .item").css("height",height_all);	

		jQuery(window).resize(function() {
			var height_all = jQuery(window).height();
			jQuery(".carousel-inner .item").css("height",height_all);
		});';		
	
	
 	  break;

	
	case 'download':
	   
	  $custom_js .= 'var waypoint = new Waypoint({
	  element: jQuery("#ct_download"),
	  handler: function(direction) {
		jQuery("#ct_download .col-md-8").addClass("animated bounceInLeft"); 
		jQuery("#ct_download .col-md-4").addClass("animated bounceInRight"); 	
	  },
	  offset: "80%"
	});';	   

	break;	
	
	case 'blog':	
		
	  $custom_js .= 'var waypoint = new Waypoint({
		  element: jQuery(".ct_blog"),
		  handler: function(direction) {
			jQuery(".ct_blog .ct_post_img").addClass("animated rotateIn"); 
		  },
		  offset: "80%"
		});';

 	  break;	

	  
	default:
	  $custom_js  = '';	
	  	  
  }
  return $custom_js;	

}	