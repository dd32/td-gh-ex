<?php
  //default data


if ( !function_exists( 'ascreen_section_default_order' ) ) {
	function ascreen_section_default_order() 
	{
		$section_default = array( 		
				'slider',
				'download',					
				'blog',	

				);				
		return $section_default;
	}
}

if ( ! function_exists( 'ascreen_section_default_choices' ) ) {
	function ascreen_section_default_choices() 
	{
		$section_default = array( 
			'slider'			 => esc_attr__( 'Slider', 'ascreen' ),	
			
			'download'	 => esc_attr__( 'Download', 'ascreen' ),			
			'blog'		 => esc_attr__( 'Blog Post', 'ascreen' ),	

				);
						
		return $section_default;
	}
}


  
if ( !function_exists( 'ascreen_get_default_title_font' ) ){
  function ascreen_get_default_title_font($key)
  {
	switch($key){

	case 'blog':
	  $section_title_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => '100',
			  'font-size'      => '36px',
			  'color'          => '#f2f2f2',
			  'text-transform' => 'Uppercase',
			  'text-align'     => 'center'
		  ); 
	  break;	  
  	  
	case 'download':
	  $section_title_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => '100',
			  'font-size'      => '18px',
			  'color'          => '#E8E8E8',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		  );  
	  break;	
	    	  	
	default:
	  $section_title_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => '100',
			  'font-size'      => '36px',
			  'color'          => '#000000',
			  'text-transform' => 'Uppercase',
			  'text-align'     => 'center'
		  ); 
	}
	return $section_title_default_font;		 
  }
}

if ( !function_exists( 'ascreen_get_description_font' ) ){
  function ascreen_get_description_font($key)
  {
	switch($key){
	
		  
	case 'download':
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '18px',
			  'color'          => '#ffffff',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
		  );   
	  break;	  
	  	
	  
	case 'blog':
	  $section_description_default_font     = array(
			  'font-family'    => 'Roboto',
			  'variant'        => 'regular',
			  'font-size'      => '16px',
			  'color'          => '#f3f3f3',
			  'text-transform' => 'none',
			  'text-align'     => 'center'
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
	   

  //section public set
  
function ascreen_get_section_default()//section public css
{ 
  $imagepath =  get_template_directory_uri() . '/custom/images/';    
  return $sections_default = array(
 
	 	
   	'blog'		 => array(
		'title'		 => __( 'From The Blog', 'ascreen' ),
		'description'	=> __( 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrice', 'ascreen' ),
  		'menu'		 => 'blog',				
  		'color'		 => '#ffffff',
  		'img'	 => esc_url($imagepath.'post-bg.jpg'),
  		'padding_top'	 => '60px',
  		'padding_bottom'	 => '70px',
		
  	), 
   	'download'		 => array(
		'title'		 => __( 'built your site with ascreen', 'ascreen' ),
		'description'	=> __( 'Ascreen is a creative & multipurpose template.', 'ascreen' ),
  		'menu'		 => 'download',				
  		'color'		 => '#00ccff',
  		'img'	 => '',
  		'padding_top'	 => '70px',
  		'padding_bottom'	 => '70px',
		
  	),

	 		
		
  );
}

function ascreen_section_content_default($key)
{  
  $imagepath =  get_template_directory_uri() . '/custom/images/'; 
  switch($key){

	case 'slider':	
		$default     = array(
			array(
				'slider_image' => esc_url($imagepath.'banner1.jpg'),
				'slider_title'  => esc_attr__( 'Welcome to Ascreen', 'ascreen' ),
				'slider_desc'  => esc_attr__( 'Simple and easy to use, Ascreen is the perfect solution to your business or personal needs!', 'ascreen' ),			
				'slider_button_text'  => esc_attr__( 'Check it out', 'ascreen' ),			
				'link_url'  => '#',
			),
			
			array(
				'slider_image' => esc_url($imagepath.'banner2.jpg'),
				'slider_title'  => esc_attr__( 'Awesome theme', 'ascreen' ),
				'slider_desc'  => esc_attr__( 'Many preset sections, parallax scrolling, video background, and much more features.', 'ascreen' ),			
				'slider_button_text'  => esc_attr__( 'Downlaod Now', 'ascreen' ),			
				'link_url'  => '#',
			),		
			
			array(
				'slider_image' => esc_url($imagepath.'banner3.jpg'),
				'slider_title'  => esc_attr__( 'Awesome theme', 'ascreen' ),
				'slider_desc'  => esc_attr__( 'Absolutely suited for your business or personal needs!', 'ascreen' ),			
				'slider_button_text'  => esc_attr__( 'Check it out', 'ascreen' ),			
				'link_url'  => '#',
			),
		);
 	  break;

	  	
	default:
	  $default     = array();	
	  	  

  }
  return $default;
}


?>