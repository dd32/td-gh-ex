<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'akasse'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();
	$imagepath =  get_template_directory_uri() . '/images/';
		
	
	//Basic Settings
	
	$options[] = array(
		'name' => __('General', 'akasse'),
		'type' => 'heading');
			
	$options[] = array(
		'name' => __('Site Logo', 'akasse'),
		'desc' => __('Leave Blank to use text Heading.', 'akasse'),
		'id' => 'logo',
		'class' => '',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Show Post Summary on Homepage', 'akasse'),
		'desc' => __('By default, the theme shows either the full post or content up till the point where you placed the &lt;!--more--> tag. Check this if you want to you enable Excerpts on Homepage. Excerpts are short summary of your posts.', 'akasse'),
		'id' => 'excerpt1',
		'std' => '0',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Display Featured Images on Posts', 'akasse'),
		'desc' => __('Check this to display the featured images on post pages too, at the start of content.','akasse'),
		'id' => 'posts-img',
		'std' => '0',
		'type' => 'checkbox');						
		
	$options[] = array(
		'name' => __('Copyright Text', 'akasse'),
		'desc' => __('Some Text regarding copyright of your site, you would like to display in the footer.', 'akasse'),
		'id' => 'footertext2',
		'std' => '',
		'type' => 'text');
		
	//Design Settings
		
	$options[] = array(
		'name' => __('Design', 'akasse'),
		'type' => 'heading');	
	
	$options[] = array(
		'name' => "Sidebar Layout",
		'desc' => "Select Layout for Posts & Pages.",
		'id' => "sidebar-layout",
		'std' => "right",
		'type' => "images",
		'options' => array(
			'left' => $imagepath . '2cl.png',
			'right' => $imagepath . '2cr.png')
	);
	
	//SLIDER SETTINGS

	$options[] = array(
		'name' => __('Slider', 'akasse'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Enable Slider', 'akasse'),
		'desc' => __('Check this to Enable Slider.', 'akasse'),
		'id' => 'slider_enabled',
		'type' => 'checkbox',
		'std' => '0' );
		
	$options[] = array(
		'name' => __('Using the Slider', 'akasse'),
		'desc' => __('This Slider supports upto 5 Images. To show only 3 Slides in the slider, upload only 3 images. Leave the rest Blank. For best results, upload images of size 1180x500px.', 'akasse'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Slider Image 1', 'akasse'),
		'desc' => __('First Slide', 'akasse'),
		'id' => 'slide1',
		'class' => '',
		'type' => 'upload');
	
	$options[] = array(
		'desc' => __('Title', 'akasse'),
		'id' => 'slidetitle1',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'akasse'),
		'id' => 'slidedesc1',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Url', 'akasse'),
		'id' => 'slideurl1',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'akasse'),
		'desc' => __('Second Slide', 'akasse'),
		'class' => '',
		'id' => 'slide2',
		'type' => 'upload');
	
	$options[] = array(
		'desc' => __('Title', 'akasse'),
		'id' => 'slidetitle2',
		'std' => '',
		'type' => 'text');	
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'akasse'),
		'id' => 'slidedesc2',
		'std' => '',
		'type' => 'textarea');		
		
	$options[] = array(
		'desc' => __('Url', 'akasse'),
		'id' => 'slideurl2',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Slider Image 3', 'akasse'),
		'desc' => __('Third Slide', 'akasse'),
		'id' => 'slide3',
		'class' => '',
		'type' => 'upload');	
	
	$options[] = array(
		'desc' => __('Title', 'akasse'),
		'id' => 'slidetitle3',
		'std' => '',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'akasse'),
		'id' => 'slidedesc3',
		'std' => '',
		'type' => 'textarea');	
			
	$options[] = array(
		'desc' => __('Url', 'akasse'),
		'id' => 'slideurl3',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'name' => __('Slider Image 4', 'akasse'),
		'desc' => __('Fourth Slide', 'akasse'),
		'id' => 'slide4',
		'class' => '',
		'type' => 'upload');	
		
	$options[] = array(
		'desc' => __('Title', 'akasse'),
		'id' => 'slidetitle4',
		'std' => '',
		'type' => 'text');
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'akasse'),
		'id' => 'slidedesc4',
		'std' => '',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Url', 'akasse'),
		'id' => 'slideurl4',
		'std' => '',
		'type' => 'text');		
	
	$options[] = array(
		'name' => __('Slider Image 5', 'akasse'),
		'desc' => __('Fifth Slide', 'akasse'),
		'id' => 'slide5',
		'class' => '',
		'type' => 'upload');	
		
	$options[] = array(
		'desc' => __('Title', 'akasse'),
		'id' => 'slidetitle5',
		'std' => '',
		'type' => 'text');	
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'akasse'),
		'id' => 'slidedesc5',
		'std' => '',
		'type' => 'textarea');		
		
	$options[] = array(
		'desc' => __('Url', 'akasse'),
		'id' => 'slideurl5',
		'std' => '',
		'type' => 'text');	
			
	//Social Settings
	
	$options[] = array(
	'name' => __('Social Networks', 'akasse'),
	'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook', 'akasse'),
		'desc' => __('Facebook Profile or Page URL i.e. http://facebook.com/username/ ', 'akasse'),
		'id' => 'facebook',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Twitter', 'akasse'),
		'desc' => __('Twitter Username', 'akasse'),
		'id' => 'twitter',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Google Plus', 'akasse'),
		'desc' => __('Google Plus profile url, including "http://"', 'akasse'),
		'id' => 'google',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Feeburner', 'akasse'),
		'desc' => __('URL for your RSS Feeds', 'akasse'),
		'id' => 'feedburner',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Pinterest', 'akasse'),
		'desc' => __('Your Pinterest Profile URL', 'akasse'),
		'id' => 'pinterest',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Instagram', 'akasse'),
		'desc' => __('Your Instagram Profile URL', 'akasse'),
		'id' => 'instagram',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Linked In', 'akasse'),
		'desc' => __('Your Linked In Profile URL', 'akasse'),
		'id' => 'linkedin',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Youtube', 'akasse'),
		'desc' => __('Your Youtube Channel URL', 'akasse'),
		'id' => 'youtube',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Flickr', 'akasse'),
		'desc' => __('Your Flickr Profile URL', 'akasse'),
		'id' => 'flickr',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
		
	

	return $options;
}