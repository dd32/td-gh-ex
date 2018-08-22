<?php

function best_restaurant_section_default_order() 
{
	$section_default = array( 	
		'slider',
		'about',		
		'service',		
		'blog',
	);		
	return $section_default;
}


if ( !function_exists( 'best_restaurant_get_default_title_font' ) ){
  function best_restaurant_get_default_title_font($key)
  {  
  
	switch($key){

		case 'service':
	
		  $section_title_default_font     = array(
				  'font-family'    => 'Oswald',
				  'variant'        => 'regular',
				  'font-size'      => '55px',
				  'color'          => '#ffffff',
				  'text-transform' => 'Uppercase',
				  'text-align'     => 'center'
			  ); 
		  break;	
		case 'tool':		
		  $section_title_default_font     = array(
				  'font-family'    => 'Dancing Script',
				  'variant'        => '700',
				  'font-size'      => '30px',
				  'color'          => '#ffffff',
				  'text-transform' => 'none',
				  'text-align'     => 'left'
			  ); 
		  break;	
		
		case 'blog':
		  $section_title_default_font     = array(
				  'font-family'    => 'Dancing Script',
				  'variant'        => '700',
				  'font-size'      => '36px',
				  'color'          => '#000000',
				  'text-transform' => 'Uppercase',
				  'text-align'     => 'center'
			  ); 
		  break;	
		
	
		default:
		  $section_title_default_font     = array(
				  'font-family'    => 'Dancing Script',
				  'variant'        => '700',
				  'font-size'      => '36px',
				  'color'          => '#000000',
				  'text-transform' => 'Uppercase',
				  'text-align'     => 'center'
			  ); 
	}
	return $section_title_default_font;	
  
		 
  }
}

if ( !function_exists( 'best_restaurant_get_description_font' ) ){
  function best_restaurant_get_description_font($key)
  {  
	switch($key){

		
	case 'about':
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '16px',
			  'color'          => '#1c1c1c',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		  ); 
	  break;
	  

	case 'service':		

	  $section_description_default_font     = array(
				'font-family'    => 'Tangerine',
				'variant'        => 'regular',
				'font-size'      => '60px',
			  'color'          => THEME_COLOR,
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		  );
	  break;
	case 'tool':	
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '16px',
			  'color'          => '#dedede',
			  'text-transform' => 'none',
			  'text-align'     => 'left'
		  );
	  break;
	  
	  
	default:
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '14px',
			  'color'          => '#999999',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		);   
	}
	return $section_description_default_font;
	 
  }
}
	   

  
function best_restaurant_public_content_default()
{ 
  $imagepath =  get_stylesheet_directory_uri() . '/custom/images/';    
  return $sections_default = array(
 
    'about'		 => array(
		'title'		 => __( 'About Us', 'best-restaurant' ),
		'description'	=> '',
  		'menu'		 => 'about',				
  		'color'		 => '#ffffff',
  		'opacity'		 => 1,
  		'parallax'		 => 0,				
  		'img'	 => '',
  		'padding_top'	 => '70px',
  		'padding_bottom'	 => '90px',
		
  	),
	
   	'service'		 => array(
		'title'		 => __( 'Vestibulum iaculis sapien sit amet metus mattis', 'best-restaurant' ),
		'description'	=> __( 'Lorem ipsum dolor sit amet', 'best-restaurant' ),
  		'menu'		 => 'service',				
  		'color'		 => '#000000',
  		'opacity'		 => 0.5,
  		'parallax'		 => 1,				
  		'img'	 => esc_url($imagepath.'service.jpg'),
  		'padding_top'	 => '80px',
  		'padding_bottom'	 => '100px',	
  	), 	
	
   	'blog'		 => array(
		'title'		 => __( 'From The Blog', 'best-restaurant' ),
		'description'	=> __( 'You can write a description of the section here!', 'best-restaurant' ),
  		'menu'		 => 'blog',				
  		'color'		 => '#ffffff',
  		'opacity'		 => 1,	
  		'parallax'		 => 0,		
  		'img'	 => '',
  		'padding_top'	 => '100px',
  		'padding_bottom'	 => '80px',
		
  	), 
	
   	'tool'		 => array(
		'title'		 => '',
		'description'	=> '',
  		'menu'		 => 'tool',				
  		'color'		 => '#252425',
  		'opacity'		 => 1,	
  		'parallax'		 => 0,	
  		'img'	 => '',
  		'padding_top'	 => '60px',
  		'padding_bottom'	 => '40px',
		
  	),		



 	
  );
}

function best_restaurant_section_content_default($key)
{  
  $imagepath =  get_stylesheet_directory_uri() . '/custom/images/'; 
  switch($key){

	case 'slider':	
	  $default     = array(
		array(
			'slider_page' => '',		
			'slider_button_text'  => esc_html__( 'Check it out', 'best-restaurant' ),			
			'slider_url'  => '#',
		),
		
		array(
			'slider_page' => '',	
			'slider_button_text'  => esc_html__( 'Downlaod Now', 'best-restaurant' ),			
			'slider_url'  => '#',
		),		
		
		array(
			'slider_page' => '',
			'slider_button_text'  => esc_html__( 'Check it out', 'best-restaurant' ),			
			'slider_url'  => '#',		
		),
	  );
 	  break;
	  
	case 'service':
	  $default     = array();
 	  break;

	case 'tool':	
		$default     = array(
			array(
				'tool_2_icon' => 'fa-home',
				'tool_2_text' => esc_attr__( '383 Waterview Lane, Las Vegas, US', 'best-restaurant' ),//====pro====													
			),
	
			array(
				'tool_2_icon' => 'fa-phone',
				'tool_2_text' => esc_attr__( '+1 123 456 789', 'best-restaurant' ),												
			),
	
			array(
				'tool_2_icon' => 'fa-envelope-o',
				'tool_2_text' => 'support@example.com',	//====pro====											
			),
	
	
			array(
				'tool_2_icon' => 'fa-internet-explorer',
				'tool_2_text' => esc_url('https://www.example.com'),	//====pro====												
			),
	
		);
 	  break;


	default:
	  $default     = array();	
	  	  

  }
  return $default;
}


function best_restaurant_button_default_arr($key) 
{
	$default     = array();	
 switch($key){

	case 'about':	
	  $default     = array(
		'key'=>'about',
		'button_text'=>__( 'Read More', 'best-restaurant' ),
		'opacity'=>1,
		'button_font'=>array(
				'font-family'    => 'Roboto',
				'variant'        => '300',
				'font-size'      => '16px',
				'color'          => '#ffffff',
				'text-transform' => 'Uppercase',
				'text-align'     => 'center'
			),
		'button_radius'=>30,	
			
		'button_spacing'=>array(
				  'top'    => '6px',
				  'bottom' => '6px',
				  'left'   => '16px',
				  'right'  => '16px',
			  )
	  );
 	  break;
	  
	  
	case 'blog':	
	  $default     = array(
		'key'=>'blog',
		'button_text'=>__( 'View The Blog', 'best-restaurant' ),
		'opacity'=>0,
		'button_font'=>array(
				'font-family'    => 'Roboto',
				'variant'        => '300',
				'font-size'      => '16px',
				'color'          => THEME_COLOR,
				'text-transform' => 'Uppercase',
				'text-align'     => 'center'
			),
		'button_radius'=>30,	
			
		'button_spacing'=>array(
				  'top'    => '12px',
				  'bottom' => '12px',
				  'left'   => '30px',
				  'right'  => '30px',
			  )
	  );
 	  break;
	  

	
	default:
	  $default     = array();	
	  	  

  }
  return $default;
}

?>