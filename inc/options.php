<?php
function optionsframework_option_name() {
	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}
function optionsframework_options() {
	
/**********************************************************************/
/************** DESIGN
/**********************************************************************/	
    // Design
    $options[] = array(
        'name' => __('Designs', 'athenea'),
        'type' => 'heading');

    // Cambio de designs diversos
    $imagepath =  get_template_directory_uri() . '/images/';

    $options[] = array( 
        'name' => __('Theme Design', 'athenea'),
        'desc' => __('Choose a layout for your website', 'athenea'),
        'id' => "unique_design",
        'std' => "design-red",
        'type' => "images",
        'options' => array(
            'design-red' => $imagepath . 'red.png',
            'design-blue' => $imagepath . 'blue.png')
    );

/**********************************************************************/
/************** TITULOS Y LOGOS
/**********************************************************************/
	// Tab configuracion general
	$options[] = array( 
		 'name' => __('Logos', 'athenea'),
		 'type' => 'heading');
	
	// Objetos 
	$options[] = array(
	     'name' => __('Logos Trademark', 'athenea'),
		 'desc' => __('Select the logo to be shown on the web with a maximum size of 292px wide.', 'athenea'),
		 'std' => '',
		 'id'   => 'athenea_logo',
		 'type' => 'upload');
		 
	$options[] = array(
	     'name' => __('Favicon', 'athenea'),
		 'desc' => __('Choose a Favicon in png with a maximum size of 64 x 64 px.', 'athenea'),
		 'std' => '',
		 'id'   => 'athenea_favicon',
		 'type' => 'upload');

/**********************************************************************/
/************** SECCIONES EN PORTADA
/**********************************************************************/	
	$options[] = array( 
		 'name' => __('Featured sections', 'athenea'),
		 'type' => 'heading');	
	// Seccion Derecha
	$options[] = array(
		'name' => __('BLOCK RIGHT', 'athenea'),
		'desc' => __('Title', 'athenea'),
		'id' => 'principal_1a',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Brief description.', 'athenea'),
		'id' => 'principal_1b',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Button Text', 'athenea'),
		'id' => 'principal_1c',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('URL Button', 'athenea'),
		'id' => 'principal_1d',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		 'desc' => __('Select an image to display. The image must be transparent gif or png background', 'athenea'),
		 'std' => '',
		 'id'   => 'principal_1e',
		 'type' => 'upload');
	
	// Seccion Central
	$options[] = array(
		'name' => __('CENTRAL BLOCK', 'athenea'),
		'desc' => __('Titulo', 'athenea'),
		'id' => 'principal_2a',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Brief description.', 'athenea'),
		'id' => 'principal_2b',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Button Text', 'athenea'),
		'id' => 'principal_2c',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('URL Button', 'athenea'),
		'id' => 'principal_2d',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		 'desc' => __('Select an image to display. The image must be transparent gif or png background', 'athenea'),
		 'id'   => 'principal_2e',
		 'std' => '',
		 'type' => 'upload');
	
	// Seccion Izquierda
	$options[] = array(
		'name' => __('BLOCK LEFT', 'athenea'),
		'desc' => __('Title', 'athenea'),
		'id' => 'principal_3a',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Brief description.', 'athenea'),
		'id' => 'principal_3b',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Button Text', 'athenea'),
		'id' => 'principal_3c',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('URL Button', 'athenea'),
		'id' => 'principal_3d',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		 'desc' => __('Select an image to display. The image must be transparent gif or png background', 'athenea'),
		 'id'   => 'principal_3e',
		 'std' => '',
		 'type' => 'upload');
		 
		// Seccion en Medio
	$options[] = array(
		'name' => __('BODY CENTRAL BLOC', 'athenea'),
		'desc' => __('Title', 'athenea'),
		'id' => 'present_1',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Brief description.', 'athenea'),
		'id' => 'present_2',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'desc' => __('Button Text', 'athenea'),
		'id' => 'present_3',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('URL Button', 'athenea'),
		'id' => 'present_4',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		 'desc' => __('Select an image to display. The image must be transparent gif or png background', 'athenea'),
		 'id'   => 'present_5',
		 'std' => '',
		 'type' => 'upload');
			
/**********************************************************************/
/************** REDES SOCIALES
/**********************************************************************/	
	$options[] = array( 
		 'name' => __('Social Icons', 'athenea'),
		 'type' => 'heading');
	
	$test_array = array(
		'Y' => __('Activate', 'athenea'),
		'N' => __('Deactivate', 'athenea')
	);
	// Facebook
	$options[] = array(
		'name' => __('Facebook', 'athenea'),
		'id' => 'athenea_face',
		'std' => 'N',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_facebook',
		'std' => '',
		'type' => 'text');	
	// Twitter
	$options[] = array(
		'name' => __('Twitter', 'athenea'),
		'id' => 'athenea_twit',
		'std' => 'N',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_twitter',
		'std' => '',
		'type' => 'text');
	// YouTube
	$options[] = array(
		'name' => __('YouTube', 'athenea'),
		'id' => 'athenea_yout',
		'std' => 'N',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_youtube',
		'std' => '',
		'type' => 'text');
	// Vimeo
	$options[] = array(
		'name' => __('Vimeo', 'athenea'),
		'id' => 'athenea_vime',
		'std' => 'N',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_vimeo',
		'std' => '',
		'type' => 'text');
	// Google+
	$options[] = array(
		'name' => __('Google +', 'athenea'),
		'id' => 'athenea_goog',
		'std' => 'N',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_google',
		'std' => '',
		'type' => 'text');
	// Feed
	$options[] = array(
		'name' => __('Feed', 'athenea'),
		'id' => 'athenea_fee',
		'std' => 'Y',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_feed',
		'std' => '',
		'type' => 'text');
		
/**********************************************************************/
/************** Direccion de contacto
/**********************************************************************/
	// Tab configuracion general
	$options[] = array( 
		 'name' => __('Contact', 'athenea'),
		 'type' => 'heading');
	
	// Datos de Contacto
	$options[] = array(
		'name' => __('Contact Details.', 'athenea'),
		'desc' => __('Company Name', 'athenea'),
		'id' => 'address_1',
		'std' => __('', 'athenea'),
		'type' => 'text');
	$options[] = array(
		'desc' => __('CIF/NIF/NIE (tax id). Mandatory for companies in the European Community.', 'athenea'),
		'id' => 'address_2',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Address', 'athenea'),
		'id' => 'address_3',
		'std' => __('', 'athenea'),
		'type' => 'text');
	$options[] = array(
		'desc' => __('Postal Code', 'athenea'),
		'id' => 'address_4',
		'std' => __('', 'athenea'),
		'type' => 'text');
	$options[] = array(
		'desc' => __('City', 'athenea'),
		'id' => 'address_5',
		'std' => __('', 'athenea'),
		'type' => 'text');
	$options[] = array(
		'desc' => __('Country', 'athenea'),
		'id' => 'address_6',
		'std' => __('', 'athenea'),
		'type' => 'text');
	$options[] = array(
		'desc' => __('Phone', 'athenea'),
		'id' => 'address_7',
		'std' => __('', 'athenea'),
		'type' => 'text');
	$options[] = array(
		'desc' => __('E-Mail contact', 'athenea'),
		'id' => 'address_8',
		'std' => __('', 'athenea'),
		'type' => 'text');
	
	return $options;
}
?>
