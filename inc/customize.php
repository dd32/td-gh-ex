<?php

function d5socialia_customize_register($wp_customize){

    
    $wp_customize->add_section('d5socialia_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> esc_html__('SOCIALIA OPTIONS', 'd5-socialia'),
        'description'   => ' <div class="infohead">' . esc_html__('We appreciate an','d5-socialia') . ' <a href="http://wordpress.org/support/view/theme-reviews/d5-socialia" target="_blank">' . esc_html__('Honest Review','d5-socialia') . '</a> ' . esc_html__('of this Theme if you Love our Work','d5-socialia') . '<br /> <br />

' . esc_html__('Need More Features and Options including Exciting Slide and 100+ Advanced Features? Try ','d5-socialia') . '<a href="' . esc_url('https://d5creation.com/theme/socialia/') .'
" target="_blank"><strong>' . esc_html__('Socialia Extend','d5-socialia') . '</strong></a><br /> <br /> 
        
        
' . esc_html__('You can Visit the Socialia Extend ','d5-socialia') . ' <a href="' . esc_url('http://demo.d5creation.com/themes/?theme=Socialia') .'" target="_blank"><strong>' . esc_html__('Demo Here','d5-socialia') . '</strong></a> 
        </div>		
		'
    ));

  
  
  foreach (range(1, 12) as $opsinumber) {
	  
//  Slide Image
    $wp_customize->add_setting('d5_socialia_pro[slide-image-'. $opsinumber .']', array(
        'default'           => get_template_directory_uri() . '/images/slides/(' . $opsinumber . ').jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'
		

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image-'. $opsinumber, array(
        'label'    			=> esc_html__('Sliding Image', 'd5-socialia') . '-' . $opsinumber,
        'section'  			=> 'd5socialia_options',
        'settings' 			=> 'd5_socialia_pro[slide-image-'. $opsinumber .']',
		'description'   	=> esc_html__('1000px X 288px image is recommended','d5-socialia')
    )));
  
// Slide Image Title
    $wp_customize->add_setting('d5_socialia_pro[slide-image-' . $opsinumber . '-title]', array(
        'default'        	=> esc_html__('Slide Image ','d5-socialia') . $opsinumber . esc_html__(' Title | Welcome to D5 Socialia Theme, Visit D5 Creation for Details','d5-socialia'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5socialia_slide-image-' . $opsinumber . '-title' , array(
        'label'      => esc_html__('Image Title', 'd5-socialia') . '-' . $opsinumber,
        'section'    => 'd5socialia_options',
        'settings'   => 'd5_socialia_pro[slide-image-' . $opsinumber .'-title]'
    ));


// Image Description
    $wp_customize->add_setting('d5_socialia_pro[slide-image-' . $opsinumber . '-description]', array(
        'default'        	=> esc_html__('D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms','d5-socialia'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_textarea',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5socialia_slide-image-' . $opsinumber . '-description' , array(
        'label'      => esc_html__('Image Description', 'd5-socialia') . '-' . $opsinumber,
        'section'    => 'd5socialia_options',
        'settings'   => 'd5_socialia_pro[slide-image-' . $opsinumber .'-description]',
		'type' 		 => 'textarea'
    ));
	
// Image Link
    $wp_customize->add_setting('d5_socialia_pro[slide-image-' . $opsinumber . '-link]', array(
        'default'        	=> '#',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_url',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5socialia_slide-image-' . $opsinumber . '-link' , array(
        'label'      => esc_html__('Image Link', 'd5-socialia') . '-' . $opsinumber,
        'section'    => 'd5socialia_options',
        'settings'   => 'd5_socialia_pro[slide-image-' . $opsinumber .'-link]',
		'description'   	=> 'Input the URL where the image will redirect the visitors'
    ));

  }
 
 
//  Facebook Link
    $wp_customize->add_setting('d5_socialia_pro[facebook_link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5socialia_facebook_link', array(
        'label'      => esc_html__('Facebook Link', 'd5-socialia'),
        'section'    => 'd5socialia_options',
        'settings'   => 'd5_socialia_pro[facebook_link]'
    ));
	
//  Twitter Link
    $wp_customize->add_setting('d5_socialia_pro[twitter_link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5socialia_twitter_link', array(
        'label'      => esc_html__('Twitter Link', 'd5-socialia'),
        'section'    => 'd5socialia_options',
        'settings'   => 'd5_socialia_pro[twitter_link]'
    ));


//  Blog/News Link
    $wp_customize->add_setting('d5_socialia_pro[blog_link]', array(
        'default'        	=> '#',
    	'sanitize_callback' => 'esc_url',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('d5socialia_blog_link', array(
        'label'      => esc_html__('Blog/News Link', 'd5-socialia'),
        'section'    => 'd5socialia_options',
        'settings'   => 'd5_socialia_pro[blog_link]'
    ));



}


add_action('customize_register', 'd5socialia_customize_register');


	if ( ! function_exists( 'd5socialia_get_option' ) ) :
	function d5socialia_get_option( $d5socialia_name, $d5socialia_default = false ) {
	$d5socialia_config = get_option( 'd5_socialia_pro' );

	if ( ! isset( $d5socialia_config ) ) : return $d5socialia_default; else: $d5socialia_options = $d5socialia_config; endif;
	if ( isset( $d5socialia_options[$d5socialia_name] ) ):  return $d5socialia_options[$d5socialia_name]; else: return $d5socialia_default; endif;
	}
	endif;