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

    $options = array();
	
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
            'design-blue' => $imagepath . 'blue.png',
            'design-red' => $imagepath . 'red.png')
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
		'class' => 'form-signin',
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
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('URL Button', 'athenea'),
		'id' => 'principal_1d',
		'std' => '',
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		 'desc' => __('Select an image to display. The image must be transparent gif or png background', 'athenea'),
		 'std' => 'principal_1e',
		 'id'   => 'principal_1e',
		 'type' => 'upload');
	
	// Seccion Central
	$options[] = array(
		'name' => __('CENTRAL BLOCK', 'athenea'),
		'desc' => __('Titulo', 'athenea'),
		'id' => 'principal_2a',
		'std' => '',
		'class' => 'form-signin',
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
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('URL Button', 'athenea'),
		'id' => 'principal_2d',
		'std' => '',
		'class' => 'form-signin',
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
		'class' => 'form-signin',
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
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('URL Button', 'athenea'),
		'id' => 'principal_3d',
		'std' => '',
		'class' => 'form-signin',
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
		'class' => 'form-signin',
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
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('URL Button', 'athenea'),
		'id' => 'present_4',
		'std' => '',
		'class' => 'form-signin',
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
		'std' => 'Y',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_facebook',
		'std' => '#',
		'class' => 'form-signin',
		'type' => 'text');	
	// Twitter
	$options[] = array(
		'name' => __('Twitter', 'athenea'),
		'id' => 'athenea_twit',
		'std' => 'Y',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_twitter',
		'std' => '#',
		'class' => 'form-signin',
		'type' => 'text');
	// YouTube
	$options[] = array(
		'name' => __('YouTube', 'athenea'),
		'id' => 'athenea_yout',
		'std' => 'Y',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_youtube',
		'std' => '#',
		'class' => 'form-signin',
		'type' => 'text');
	// Vimeo
	$options[] = array(
		'name' => __('Vimeo', 'athenea'),
		'id' => 'athenea_vime',
		'std' => 'Y',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_vimeo',
		'std' => '#',
		'class' => 'form-signin',
		'type' => 'text');
	// Google+
	$options[] = array(
		'name' => __('Google +', 'athenea'),
		'id' => 'athenea_goog',
		'std' => 'Y',
		'type' => 'radio',
		'options' => $test_array);
	$options[] = array(
		'desc' => __('Enter the full URL.', 'athenea'),
		'id' => 'athenea_google',
		'std' => '#',
		'class' => 'form-signin',
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
		'std' => '#',
		'class' => 'form-signin',
		'type' => 'text');
		
/**********************************************************************/
/************** SEO
/**********************************************************************/	
	$options[] = array( 
		 'name' => __('Analytics and SEO', 'athenea'),
		 'type' => 'heading');	
	
	// ID Google Analytics
	$options[] = array(
		'name' => __('Google Analytics', 'athenea'),
		'desc' => __('Google Analytics ID. Insert only the code as in the example.', 'athenea'),
		'id' => 'athenea_analitics',
		'std' => 'UA-24955109-1',
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Google Analytics Domain without www. Enter the domain as shown in the verification code and installing Analytics.', 'athenea'),
		'id' => 'athenea_analidom',
		'std' => 'ibermega.com',
		'class' => 'form-signin',
		'type' => 'text');
		
	// Webmaster Tools
	$options[] = array(
		'name' => __('Webmaster Tools (Google)', 'athenea'),
		'desc' => __('ID google-site-verification. Log in to Google Webmasters to get the code and insert it into this field.', 'athenea'),
		'id' => 'athenea_webmaster',
		'std' => 'fjdg9yT9mZWC23C0HGdWu3nhqkIcWFNQNVLHoSl8eoU',
		'class' => 'form-signin',
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
		'name' => __('Contact Details. Insert into your pages or entries the following shortcode to display the Contact Form: [iberthemeform]', 'athenea'),
		'desc' => __('Company Name', 'athenea'),
		'id' => 'address_1',
		'std' => __('', 'athenea'),
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('CIF/NIF/NIE (tax id). Mandatory for companies in the European Community.', 'athenea'),
		'id' => 'address_2',
		'std' => '',
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Address', 'athenea'),
		'id' => 'address_3',
		'std' => __('', 'athenea'),
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Postal Code', 'athenea'),
		'id' => 'address_4',
		'std' => __('', 'athenea'),
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('City', 'athenea'),
		'id' => 'address_5',
		'std' => __('', 'athenea'),
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Country', 'athenea'),
		'id' => 'address_6',
		'std' => __('', 'athenea'),
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('Phone', 'athenea'),
		'id' => 'address_7',
		'std' => __('', 'athenea'),
		'class' => 'form-signin',
		'type' => 'text');
	$options[] = array(
		'desc' => __('E-Mail contact', 'athenea'),
		'id' => 'address_8',
		'std' => __('', 'athenea'),
		'class' => 'form-signin',
		'type' => 'text');
	
	return $options;
}
?>
