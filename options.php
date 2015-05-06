<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'bakery_options';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'bakery'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'bakery' ),
		'two' => __( 'Two', 'bakery' ),
		'three' => __( 'Three', 'bakery' ),
		'four' => __( 'Four', 'bakery' ),
		'five' => __( 'Five', 'bakery' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'bakery' ),
		'two' => __( 'Pancake', 'bakery' ),
		'three' => __( 'Omelette', 'bakery' ),
		'four' => __( 'Crepe', 'bakery' ),
		'five' => __( 'Waffle', 'bakery' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Header', 'bakery' ),
		'type' => 'heading'
	);

	// Header Logo upload option
	$options[] = array(
		'name'  => __( 'Header Logo', 'bakery' ),
		'desc' => __( 'Upload logo for your header.', 'bakery' ),
		'id' => 'bakery_header_logo_image',
		'type' => 'upload'
	);

	// Header logo and text display type option
	$header_display_array = array(
		'logo_only' => __( 'Header Logo Only', 'bakery' ),
		'text_only' => __( 'Header Text Only', 'bakery' ),
		'both' => __( 'Show Both', 'bakery' ),
		'none' => __( 'Disable', 'bakery' )
	);
	$options[] = array(
		'name' => __( 'Show', 'bakery' ),
		'desc' => __( 'Choose the option that you want.', 'bakery' ),
		'id' => 'bakery_show_header_logo_text',
		'std' => 'text_only',
		'type' => 'radio',
		'options' => $header_display_array 
	);
	$options[] = array(
		'name' => __( 'Header Icon and Size', 'bakery' ),
		'desc' => __( 'Example:"<strong>fa-3x fa-child</strong>". All icons list '. esc_url( 'http://fortawesome.github.io/Font-Awesome/icons/#search'), 'bakery' ),
		'id' => 'bakery_header_text_icon',
		'std' 	=> 'fa-3x fa-birthday-cake',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Adress', 'bakery' ),
		'id' => 'bakery_header_adress',
		'std' 	=> '77 Massachusetts Ave, Cambridge, MA, USA',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Mail', 'bakery' ),
		'desc' => __( 'Link or mail', 'bakery' ),
		'id' => 'bakery_header_mail',
		'std' 	=> 'info@example.com',
		'type' 	=> 'text'
	);
	$options[] = array(
		'name' => __( 'Phone', 'bakery' ),
		'id' => 'bakery_header_phone',
		'std' 	=> '+1 617-253-1000',
		'type' 	=> 'text'
	);

	/*************************************************************************/
	
	$options[] = array(
		'name' => __( 'Design', 'bakery' ),
		'type' => 'heading'
	);
	// Site primary color option
	$options[] = array(
		'name' 		=> __( 'Primary color option', 'bakery' ),
		'desc' 		=> __( 'This will reflect in links, buttons and many others. Choose a color to match your site.', 'bakery' ),
		'id' 			=> 'bakery_primary_color',
		'std' 		=> '',
		'type' 		=> 'color' 
	);
	
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Additional', 'bakery' ),
		'type' => 'heading'
	);

	// Favicon activate option
	$options[] = array(
		'name' 		=> __( 'Activate favicon', 'bakery' ),
		'desc' 		=> __( 'Check to activate favicon. Upload fav icon from below option', 'bakery' ),
		'id' 			=> 'bakery_activate_favicon',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Fav icon upload option
	$options[] = array(
		'name' 	=> __( 'Upload favicon', 'bakery' ),
		'desc' 	=> __( 'Upload favicon for your site.', 'bakery' ),
		'id' 		=> 'bakery_favicon',
		'type' 	=> 'upload'
	);
	
	
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Slider', 'bakery' ),
		'type' => 'heading'
	);

	// Slider activate option
	$options[] = array(
		'name' 		=> __( 'Activate slider', 'bakery' ),
		'desc' 		=> __( 'Check to activate slider.', 'bakery' ),
		'id' 			=> 'bakery_activate_slider',
		'std' 		=> 1,
		'type' 		=> 'checkbox'
	);

	// Slide options
	$def_image = 1;
	for( $i=1; $i<=4; $i++) {
		$options[] = array(
			'name' 	=>	sprintf( __( 'Image Upload #%1$s', 'bakery' ), $i ),
			'desc' 	=> __( 'Upload slider image.', 'bakery' ),
			'id' 		=> 'bakery_slider_image'.$i,
			'std' 	=> $imagepath."slider$def_image.jpg",
			'type' 	=> 'upload'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter title for your slider.', 'bakery' ),
			'id' 		=> 'bakery_slider_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter your slider description.', 'bakery' ),
			'id' 		=> 'bakery_slider_text'.$i,
			'std' 	=> '',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect slider when clicked', 'bakery' ),
			'id' 		=> 'bakery_slider_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$def_image ++;
		if ($def_image>4) $def_image = 1;
	}

	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Services', 'bakery' ),
		'type' => 'heading'
	);

	//  activate option
	$options[] = array(
		'name' 		=> __( 'Activate services', 'bakery' ),
		'desc' 		=> __( 'Check to activate services.', 'bakery' ),
		'id' 			=> 'bakery_activate_services',
		'std' 		=> 1,
		'type' 		=> 'checkbox'
	);
	$options[] = array(
		'name' => __('Main Service','bakery'),
		'desc' 	=> __( 'Service Title', 'bakery' ),
		'id' 		=> 'bakery_main_service_title',
		'std' 	=> __('Our Awesome Bakery','bakery'),
		'type' 	=> 'text'
	);
	$options[] = array(
		'desc' 	=> __( 'Service Description', 'bakery' ),
		'id' 		=> 'bakery_main_service_desc',
		'std' 	=> 'Lorem ipsum dolor sit amet consectetur adipricies adipiscing!',
		'type' 	=> 'textarea'
	);	
	
	//
	$scarr = array();
	for( $i=1; $i<=16; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
        'name' => __('Number of services','bakery'),
        'desc' => __('How many services is the homepage. (Set and click SAVE)', 'bakery'),
        'id' => 'bakery_services_count',
        'std' => '4',
        'type' => 'select',
        'options' => $scarr
	);

	// Services options
	$rand_icons = array("pencil","scissors","bell-o","birthday-cake","comments-o","futbol-o","paw","music");
	$services_count = of_get_option( 'bakery_services_count', 4 );
	for( $i=1; $i<=$services_count; $i++) {
		shuffle($rand_icons);
		$options[] = array(
			'name' 	=>	sprintf( __( 'Service #%1$s', 'bakery' ), $i ),
			'desc' 	=> __( 'Service Icon<br />
			Service Icon (Using Font Awesome icons name) like: fa-medkit. <a href="'.esc_url( 'http://fortawesome.github.io/Font-Awesome/icons/' ) . '">Get your fontawesome icons.</a>', 'bakery' ),
			'id' 		=> 'bakery_service_icon'.$i,
			'std' 	=> "fa-".$rand_icons[0],
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Service Title', 'bakery' ),
			'id' 		=> 'bakery_service_title'.$i,
			'std' 	=> "Lorem ipsum",
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Service Description', 'bakery' ),
			'id' 		=> 'bakery_service_desc'.$i,
			'std' 	=> 'Lorem ipsum dolor sit amet, consectetur adipricies sem Cras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis ',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect service when clicked', 'bakery' ),
			'id' 		=> 'bakery_service_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Projects', 'bakery' ),
		'type' => 'heading'
	);

	// activate option
	$options[] = array(
		'name' 		=> __( 'Activate projects', 'bakery' ),
		'desc' 		=> __( 'Check to activate projects.', 'bakery' ),
		'id' 			=> 'bakery_activate_projects',
		'std' 		=> 1,
		'type' 		=> 'checkbox'
	);
	$options[] = array(
		'name' => __('Main Project','bakery'),
		'desc' 	=> __( 'Title', 'bakery' ),
		'id' 		=> 'bakery_main_project_title',
		'std' 	=> __('Bakery Portfolio Projects', 'bakery' ),
		'type' 	=> 'text'
	);
	$options[] = array(
		'desc' 	=> __( 'Description', 'bakery' ),
		'id' 		=> 'bakery_main_project_desc',
		'std' 	=> 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit lorem ipsum dolor sit amet.',
		'type' 	=> 'textarea'
	);	
	
	//
	$scarr = array();
	for( $i=1; $i<=16; $i++) {
		$scarr [$i] = $i;
	}
	$options[] = array(
        'name' => __('Number of projects','bakery'),
        'desc' => __('How many projects is the homepage. (Set and click SAVE)', 'bakery'),
        'id' => 'bakery_projects_count',
        'std' => '4',
        'type' => 'select',
        'options' => $scarr
	);

	// Services options
	$services_count = of_get_option( 'bakery_services_count', 4 );
	for( $i=1; $i<=$services_count; $i++) {
		$options[] = array(
			'name'  => __( 'Service', 'bakery' ). ' #'.$i,
			'desc' => __( 'Image', 'bakery' ),
			'id' => 'bakery_project_image'.$i,
			'std' 	=> $imagepath.'thumbnail.png',
			'type' => 'upload'
		);
		$options[] = array(
			'desc' 	=> __( 'Title', 'bakery' ),
			'id' 		=> 'bakery_project_title'.$i,
			'std' 	=> "Lorem ipsum",
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Description', 'bakery' ),
			'id' 		=> 'bakery_project_desc'.$i,
			'std' 	=> 'Lorem ipsum dolor sit amet, consectetur adipricies sem Cras pulvin, maurisoicituding adipiscing, Lorem ipsum dolor sit amet, consect adipiscing elit, sed diam nonummy nibh euis ',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect project when clicked', 'bakery' ),
			'id' 		=> 'bakery_project_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}

/////	
	
	return $options;
}

?>