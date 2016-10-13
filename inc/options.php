<?php
/**
 * Beauty and Spa Options Page
 * @ Copyright: D5 Creation, All Rights, www.d5creation.com
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'beautyandspa';
}

function optionsframework_options() {
	
	// add_filter( 'wp_default_editor', create_function('', 'return "html";') ); 
	
	$wp_editor_settings = array(
		'wpautop' => false, // Default
		'textarea_rows' => 5,
		'editor_css' => '<style>.wp-editor-tools, .quicktags-toolbar { visibility: hidden; display: none; height:0px;} </style>',
		'teeny' => true,
		'tinymce' => false,
		'quicktags' => false
	);	
	
	$wp_editor_settingst = array(
		'wpautop' => false, // Default
		'textarea_rows' => 2,
		'editor_css' => '<style>.wp-editor-tools, .quicktags-toolbar { visibility: hidden; height:0px;} </style>',
		'teeny' => true,
		'tinymce' => false,
		'quicktags' => false
	);	
	
	$sliding_effects = array(
		'3dslide' => '3D Slide', 
		'random' => 'Random', 
		'randomSmart' => 'Random Smart',  
		'cube' => 'Cube',  
		'cubeRandom' => 'Cube Random',  
		'block' => 'Block',  
		'cubeStop' => 'Cube Stop',  
		'cubeHide' => 'Cube Hide',  
		'cubeSize' => 'Cube Size',  
		'horizontal' => 'Horisontal',  
		'showBars' => 'Show Bars',  
		'showBarsRandom' => 'Show Bars Random',  
		'tube' => 'Tube', 
		'fade' => 'Fade', 
		'fadeFour' => 'Fade Four', 
		'paralell' => 'Paralell', 
		'blind' => 'Blind', 
		'blindHeight' => 'Blind Height', 
		'blindWidth' => 'Blind Width', 
		'directionTop' => 'Direction Top', 
		'directionBottom' => 'Direction Bottom', 
		'directionRight' => 'Direction Right', 
		'directionLeft' => 'Direction Left', 
		'cubeStopRandom' => 'Cube Stop Random', 
		'cubeSpread' => 'Cube Spread', 
		'cubeJelly' => 'Cube Jelly', 
		'glassCube' => 'Glass Cube', 
		'glassBlock' => 'Glass Block', 
		'circles' => 'Circles', 
		'circlesInside' => 'Circles Inside', 
		'circlesRotate' => 'Circles Rotate', 
		'cubeShow' => 'Cube Show', 
		'upBars' => 'Up Bars', 
		'downBars' => 'Down Bars', 
		'hideBars' => 'Hide Bars', 
		'swapBars' => 'Swap Bars', 
		'swapBarsBack' => 'Swap Bars Back' 
	);
	
	$truefalse = array(
		'true' => 'Yes', 
		'false' => 'No');
		
	$hmeurl = esc_url( home_url( '/' ) );


// Maintenance Page Settings	
	$options[] = array(
		'name' => 'Maintenance Mode', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Activate Maintenance Mode',
		'desc' => 'Check it if you want to Activate Maintenance Mode', 
		'id' => 'mmactive',
		'std' => '0',
		'capt' => array( '0' => 'NO', '1' => 'YES'),
		'type' => 'switch' );
		
	$uc_defaults = array(
		'color' => '#ffffff',
		'image' => get_template_directory_uri() . '/images/ucback.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );
		
	$options[] = array(
		'name' => 'Set Page Background', 
		'desc' => 'You can set the Background here. Defaults: <b>#ffffff  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.get_template_directory_uri() . '/images/ucback.jpg &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Repeat All &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Top Left &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scroll Normally</b>' ,
		'id' => 'ucp-back',
		'std' => $uc_defaults,
		'type' => 'background' );		
		
	$options[] = array(
		'name' => 'Timeline', 
		'desc' => 'Set the Timeline Year. Such As: '.date('Y'), 
		'id' => 'timeliney',
		'std' => date('Y'),
		'type' => 'text',
		'class' => 'mini' );
		
	$options[] = array(
		'desc' => 'Set the Timeline Month. Such As: '.date('m'),  
		'id' => 'timelinem',
		'std' => date('m'),
		'type' => 'text',
		'class' => 'mini' );
		
	$options[] = array(
		'desc' => 'Set the Timeline Day. Such As: '.date('d'),  
		'id' => 'timelined',
		'std' => date('d'),
		'type' => 'text',
		'class' => 'mini' );
		
	$options[] = array(
		'name' => 'Heading Text',
		'desc' => 'Set the Heading Text',  
		'id' => 'uct1',
		'std' => 'We are working our butts off to finish this website',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Heading Description',
		'desc' => 'Set the Heading Description',  
		'id' => 'uct2',
		'std' => 'Our developers, are doing their best to finish this website before the counter, but we can not help them',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'E-Mail Box Text',
		'desc' => 'Set the E-Mail Box Text',  
		'id' => 'uct3',
		'std' => 'Input your e-mail address here...',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'E-Mail Button Text',
		'desc' => 'Set the E-Mail Button Text',  
		'id' => 'uct4',
		'std' => 'Let Me Notified',
		'type' => 'text',
		'class' => 'mini' );
		
	$options[] = array(
		'name' => 'Social Items Text',
		'desc' => 'Set the Social Items Text',  
		'id' => 'uct5',
		'std' => 'Learn More from our Social Pages',
		'type' => 'text');		
	
	
//	General Options
	$options[] = array(
		'name' => 'General Options', 
		'type' => 'heading');
	
	$options[] = array(
		'name' => 'Site Favicon', 
		'desc' => 'Upload an Icon for the Site Favicon. 16px X 16px image is recommended.', 
		'id' => 'favicon',
		'std' => get_template_directory_uri() . '/images/favicon.ico',
		'type' => 'upload');	

	$options[] = array(
		'name' => 'Company Logo', 
		'desc' => 'Upload an image for the Company Logo. 250px X 70px image is recommended.', 
		'id' => 'site-logo',
		'std' => get_template_directory_uri() . '/images/logo.png',
		'type' => 'upload');
		
	$options[] = array(
		'name' => 'Show Site Logo in Login Page',
		'desc' => 'Check it if you want to show Site Logo in Login Page', 
		'id' => 'login-logo',
		'std' => '1',
		'type' => 'checkbox' );		
		
	$options[] = array(
		'name' => 'Fixed Header?',
		'desc' => 'Uncheck it if you do not want to show the Header Fixed. Default is YES', 
		'id' => 'header-fixed',
		'std' => '1',
		'capt' => array( '0' => 'NO', '1' => 'YES'),
		'type' => 'switch' );
		
	$options[] = array(
		'name' => "Site Layout",
		'desc' => "You can set the Site Layout for Whole the Site.",
		'id' => "site-layout",
		'std' => "2c-r-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => get_template_directory_uri() . '/images/1col.png',
			'2c-l-fixed' => get_template_directory_uri() . '/images/2cl.png',
			'2c-r-fixed' => get_template_directory_uri() . '/images/2cr.png')
	);
	
	$options[] = array(
		'name' => 'Use Responsive Layout', 
		'desc' => 'Check the Box if you want the Responsive Layout of your Website', 
		'id' => 'responsive',
		'std' => '1',
		'type' => 'checkbox');
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">Other Settings</span>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Custom Code within Head Area', 
		'desc' => 'You can input any Custom Code Here like Google Analytics Code, CSS, Java Script etc.', 
		'id' => 'headcode',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	$options[] = array(
		'name' => 'Show Log In Panel on the Top',
		'desc' => 'Show Log In and Membership Panel to the Top.',
		'id' => 'lbox-check',
		'std' => '1',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'name' => 'Show Search Box on the Top Right Corner',
		'desc' => 'Show Search Box on the Top Right Corner of the Site.',
		'id' => 'sbox-check',
		'std' => '1',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'name' => 'Phone Number', 
		'desc' => 'You can input your Phone Number here', 
		'id' => 'phone-num',
		'std' => '0123-456789',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Anything Extra before the Phone Number', 
		'desc' => 'You can input anything Extra before the Phone Number. ShortCode is Acceptable here', 
		'id' => 'extra-num',
		'std' => '',
		'type' => 'text' );	
		
	$options[] = array(
		'desc' => 'You may insert any Icon Name like <b>fa-envelope-o</b> from Font Awesome which may be appropriate. You can find the icon name  <a href="'.esc_url('http://fortawesome.github.io/Font-Awesome/icons').'" target="_blank">Here</a>', 
		'id' => 'extra-num-icon',
		'std' => '',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => '404 Not Found Error Page Image', 
		'desc' => 'Upload an image for the 404 Not Found Error Page Image. 800px X 400px image is recommended', 
		'id' => 'nfi404',
		'std' => get_template_directory_uri() . '/images/404.jpg',
		'type' => 'upload');
		
		
	$contype = array( '1' => 'Full Content in Blog Page. Also Support Read More Button if inserted during Editing.', '2' => 'Some Words and Read More Button in the Blog Page' );
	
	$options[] = array(
		'name' => 'Select the Content Type in the Blog Page.',
		'desc' => 'Select whether you want to show the Full / Selected Content or Some Words and Read More Button Automatically.', 
		'id' => 'contype',
		'std' => '1',
		'type' => 'radio',
		'options' => $contype);
	
	$options[] = array(
		'name' => 'Copyright Notice',
		'desc' => 'You can input your copyright notice or other links like sitemap here.',
		'id' => 'copyright',
		'std' => '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ) . ', All Rights Reserved',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => 'Author and WordPress Credit', 
		'desc' => 'Hide Author and CMS Credit from Footer', 
		'id' => 'credit',
		'std' => '0',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'name' => 'Featured/ Thumbnail Image in Pages',
		'desc' => 'Hide Featured/ Thumbnail Images from All Pages',
		'id' => 'tpage',
		'std' => '1',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'name' => 'Show Comments Box ?',
		'desc' => 'Hide WordPress Comments Box from All Pages',
		'id' => 'cpage',
		'std' => '0',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'desc' => 'Hide WordPress Comments Box from All Posts',
		'id' => 'cpost',
		'std' => '0',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'name' => 'Hide Admin Bar',
		'desc' => 'Hide WordPress Admin Bar for Logged In Users',
		'id' => 'admin-bar',
		'std' => '0',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'name' => 'Show Author Bio/Biographical Info with Single Post/Page',
		'desc' => 'Show Author Bio/Biographical Info in Single Posts',
		'id' => 'sabpst',
		'std' => '1',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'desc' => 'Show Author Bio/Biographical Info in Single Pages',
		'id' => 'sabpge',
		'std' => '0',
		'type' => 'checkbox' );
	
	$options[] = array(
		'desc' => 'Change the word <b>Author :</b>',
		'id' => 'auttname',
		'std' => 'Author :',
		'type' => 'text',
		'class' => 'mini');		
		
		
	$options[] = array(
		'name' => 'Hide Author, Posted in, Comments Off, Tag etc. from Posts',
		'desc' => 'Hide Author, Posted in, Comments Off, Tag etc. from Posts',
		'id' => 'wppct',
		'std' => '0',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'desc' => '<span class="featured-area-title sub-item">Front Page Parts Ordering</span>', 
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Activate This Ordering for Front Page Components', 
		'desc' => 'Check the Box if you want to activate This Ordering for Front Page Components', 
		'id' => 'fporder-check',
		'std' => '0',
		'capt' => array( '0' => 'NO', '1' => 'YES'),
		'type' => 'switch' );

	$fpoarray = array( 'heading'=>'Heading and Sub Heading', 'slide'=>'Main Slide', 'featuredc'=>'Featured Contents', 'featuredb'=>'Featured Boxes', 'service'=>'Services and Booking', 'ecom'=>'E-Commerce', 'staffs'=>'Staff Box', 'extra'=>'Extra Box', 'blog'=>'Selected Blog Posts', 'gallery'=>'Gallery', 'contact'=>'Contact Box', 'map'=>'Location Map', 'testimonial'=>'Testimonials', 'clients'=>'Clients', 'wpblog'=>'Blog Index or Page' );
	
	$options[] = array(
		'name' => 'Front Page Parts Ordering',
		'desc' => 'Drag and Drop Parts to Reorder the Front Page Components. You can Hide/Disable any Part from the Settings Page of Specific Part',
		'id' => 'fporder',
		'std' => $fpoarray,
		'type' => 'sorter'
	);	
		

// Front Page Heading
		
	$options[] = array(
		'name' => 'Front Page Heading', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#heading-box-item</strong>  the Link for This Section ',
		'type' => 'info');	
		
	$options[] = array(
		'name' => 'Heading Background Color',
		'desc' => 'Set the Slide Background Color if you want. Default is <b>#ff00ff</b>', 
		'id' => 'hdback-color',
		'std' => '#ff00ff',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Do not Show Stripe Background. Check This if want Plain Background', 
		'id' => 'plainfbb',
		'std' => '0',
		'type' => 'checkbox' );	
		
		$options[] = array(
		'name' => 'Front Page Heading', 
		'desc' => 'Input your heading text here.  Please limit it within 30 Letters.', 
		'id' => 'heading_text',
		'std' => 'Welcome to the World of Beauty !',
		'type' => 'text');
		
	$options[] = array(
		'desc' => 'Set the Font Color if you want. Default is <b>#ffffff</b>', 
		'id' => 'heading-color',
		'std' => '#ffffff',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Front Page Heading Description', 
		'desc' => 'Input your heading description here. Please limit it within 100 Letters.', 
		'id' => 'heading_des',
		'std' => 'You can use Beauty and Spa Extend Theme for more options, more functions and more visual elements. Extend Version has come with simple color customization option.',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => 'Set the Font Color if you want. Default is <b>#ffffff</b>', 
		'id' => 'hdes-color',
		'std' => '#ffffff',
		'type' => 'color' );
		
		
// Slider Settings
	$options[] = array(
		'name' => 'Slider', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#mslideback</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show the Main Slider',
		'desc' => '<strong>Check This if You want to Show the Main Slider</strong>', 
		'id' => 'slide-visibility',
		'std' => '1',
		'capt' => array( '0' => 'HIDE', '1' => 'SHOW'),
		'type' => 'switch' );
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">EMBEDDED VIDEO, IFRAME OR HTML</span>.',
		'type' => 'info');
	
	$options[] = array(
		'desc' => 'You can insert Video or anything else you want instead of the Sliding Image. But it will disable the Sliding Image. If you want to enable the Sliding Image again you must remove the contents of the following editor.',
		'type' => 'info');
	
		
	$options[] = array(
		'name' => 'Banner Video or another Thing', 
		'desc' => 'Input your Content here. You can input the Embedded Code for Videos like You Tube Video or any other HTML, iframe content here. If it is activated the following sliding images will not work. ', 
		'id' => 'banner-video',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	$options[] = array(
		'name' => 'Slide Background Color',
		'desc' => 'Set the Slide Background Color if you want. Default is <b>#ff00ff</b>', 
		'id' => 'sldback-color',
		'std' => '#ff00ff',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Do not Show Stripe Background. Check This if want Plain Background', 
		'id' => 'plainsldb',
		'std' => '0',
		'type' => 'checkbox' );
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">IMAGE, VIDEO OR ANY SLIDE</span>.',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Select Sliding Effect',
		'desc' => 'Select the Sliding Effect. Default is 3D Slide.',
		'id' => 'slide-effect',
		'std' => '3dslide',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $sliding_effects );
		
	$options[] = array(
		'name' => 'Number of Slides', 
		'desc' => 'Set the Number of Slides. Dafault is 10.', 
		'id' => 'slide-number',
		'std' => '10',
		'type' => 'text',
		'class' => 'mini' ); 

	$options[] = array(
		'name' => 'Slide Orientation', 
		'desc' => "Select the Slide orientation, Default is Vertical. This is Applicable for 3D Slide only. ",
		'id' => "slide-orientation",
		'std' => "v",
		'type' => 'radio',
		'options' => array(
			'v' => 'Vertical',
			'h' => 'Horizontal',
			'r' => 'Random',
			)
	);
	
	$options[] = array(
		'name' => 'Slide Animation Type',
		'desc' => 'Slide Animation Type, Default is Ease. This is Applicable for 3D Slide only',
		'id' => 'slide-atyp',
		'std' => 'ease',
		'type' => 'radio',
		'options' => array(
			'ease' => 'Ease',
			'noease' => 'No Ease',
			)
	);
	
	$options[] = array(
		'name' => 'Auto Play Slides',
		'desc' => 'Slide AutoPaly during Starting, Default is Yes.',
		'id' => 'slide-autoplay',
		'std' => 'true',
		'type' => 'radio',
		'options' => array(
			'true' => 'Yes',
			'false' => 'No',
			)
	);
	
	$options[] = array(
		'name' => 'Slide Autoplay Interval', 
		'desc' => 'Set the time in ms between each rotation, if autoplay is true. Dafault is 5000.', 
		'id' => 'slide-interval',
		'std' => '5000',
		'type' => 'text',
		'class' => 'mini' ); 
		
	$options[] = array(
		'name' => 'Slide Perspective',
		'desc' => 'Set the Slide Perspective. Default is 700. This is Applicable for 3D Slide only.', 
		'id' => 'slide-perspective',
		'std' => '700',
		'type' => 'text',
		'class' => 'mini' );
	
	$options[] = array(
		'name' => 'Number of Slices / Cuboids', 
		'desc' => 'Set the Number between 0 to 25 of Slices / Cuboids. Default is 11. This is Applicable for 3D Slide only.', 
		'id' => 'slide-cuboidscount',
		'std' => '11',
		'type' => 'text',
		'class' => 'mini');
	
	$options[] = array(
		'name' => 'Random Number of Slices / Cuboids?', 
		'desc' => 'if true then the number of slices / cuboids is going to be random (cuboidsCount is overwitten). Default is No. This is Applicable for 3D Slide only.', 
		'id' => 'slide-cuboidsrandom',
		'std' => 'false',
		'type' => 'radio',
		'options' => array(
			'true' => 'Yes',
			'false' => 'No',
			)
	);
	
	$options[] = array(
		'name' => 'Show Slide Navigation Dots under the Slider', 
		'desc' => 'Show Slide Navigation Dots under the Slider. Default is Yes.', 
		'id' => 'slide-navdots',
		'std' => 'show',
		'type' => 'radio',
		'options' => array(
			'show' => 'Yes',
			'hide' => 'No',
			)
	);
	
		$options[] = array(
		'name' => 'Show Slide Navigation Arrows', 
		'desc' => 'Show Slide Navigation Arrows. Default is Yes.', 
		'id' => 'slide-nav',
		'std' => 'show',
		'type' => 'radio',
		'options' => array(
			'show' => 'Yes',
			'hide' => 'No',
			)
	);
	
	$options[] = array(
		'name' => 'Show Slide Image 100% Width of Container Always',
		'desc' => 'Check it if you want to show the Slide Image 100% Width of Container Always, Recommended !', 
		'id' => 'sldimfull',
		'std' => '1',
		'type' => 'checkbox' );	
	
	
	$opsin = beautyandspa_get_option('slide-number', '10');
	foreach (range(1, $opsin) as $opsinumber) {
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">Sliding Image - ' . $opsinumber . '</span>', 
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Sliding Image', 
		'desc' => 'Upload a Sliding Image. 2000px X 741px image is recommended. Please upload an optimized image for smooth running of the slides.', 
		'id' => 'slide-image' . $opsinumber,
		'std' => get_template_directory_uri() . '/images/slide-image/slide-image' . $opsinumber . '.jpg',
		'type' => 'upload');
	
	$options[] = array(
		'name' => 'Image Title', 
		'desc' => 'Input the Caption of the Image. Please limit the words within 50 so that the layout should be clean and attractive.', 
		'id' => 'slide-image' . $opsinumber . '-title',
		'std' => 'This is a Test Image Title',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Image Caption', 
		'desc' => 'Input the Caption of the Image. Please limit the words within 50 so that the layout should be clean and attractive.', 
		'id' => 'slide-image' . $opsinumber . '-caption',
		'std' => 'This is a Test Image for Beauty and Spa Theme. If you feel any problem please contact with D5 Creation.',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => 'Videos or Other HTML', 
		'desc' => 'You can input any Embedded Code for Videos like You Tube Video or any other HTML, iframe content here. The Content Width must be within 460px. This is Applicable for 3D Slide only.', 
		'id' => 'slide-image' . $opsinumber . '-emb',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => 'Image Link', 
		'desc' => 'Input the URL where the image will redirect the visitors.', 
		'id' => 'slide-image' . $opsinumber . '-link',
		'std' => '#',
		'type' => 'text');
	
	}
	

// Front Page Fearured Contents
		
	$options[] = array(
		'name' => 'Featured Contents', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#fcontent-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show the Featured Contents',
		'desc' => 'Uncheck this if you do not want to show the Featured Contents', 
		'id' => 'srfbox',
		'std' => '1',
		'type' => 'checkbox' );	
	
	$options[] = array(
		'name' => 'Number of Featured Contents', 
		'desc' => 'Set the Number of Featured Contents you want. Defaut is 4', 
		'id' => 'nfbox2',
		'std' => '4',
		'type' => 'text',
		'class' => 'mini');
		
	$numfbox2 = beautyandspa_get_option('nfbox2', '4');
	foreach (range(1, $numfbox2 ) as $fbsinumber) {
		
	if( $fbsinumber % 2 == 0 ): $fboxcb = '#ff00ff'; else: $fboxcb = '#f808b1'; endif;
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">Featured Contents: ' . $fbsinumber . '</span>',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Background Color', 
		'desc' => 'Set Background Color. Default is <b>'.$fboxcb. '</b>', 
		'id' => 'featuredc-bcolor' . $fbsinumber,
		'std' => $fboxcb,
		'type' => 'color'); 
	
	$options[] = array(
		'name' => 'Image', 
		'desc' => 'Upload an image for the Featured Content. 50px X 50px PNG image is recommended. If you do not want to show anything here leave the box blank.', 
		'id' => 'featured-image2' . $fbsinumber,
		'std' => get_template_directory_uri() . '/images/featured-image' . $fbsinumber . '.png',
		'type' => 'upload');	
	
	$options[] = array(
		'name' => 'Title', 
		'desc' => 'Input your Featured Title here. Please limit it within 30 Letters. If you do not want to show anything here leave the box blank.', 
		'id' => 'featured-title2' . $fbsinumber,
		'std' => 'Beauty and Spa WP Theme',
		'type' => 'text'); 
		
	$options[] = array(
		'desc' => 'Set Font Color if your want. Default is <b>#ffffff</b>', 
		'id' => 'featuredc-ftcolor' . $fbsinumber,
		'std' => '#ffffff',
		'type' => 'color'); 
	
	$options[] = array(
		'name' => 'Description', 
		'desc' => 'Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive. You can also input any HTML, Videos or iframe here. But Please keep in mind about the limitation of Width of the box.', 
		'id' => 'featured-description2' . $fbsinumber,
		'std' => 'Beauty and Spa is super elegant and Professional Responsive Theme which will create the business widely expressed.',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	
	$options[] = array(
		'desc' => 'Set Font Color if your want. Default is <b>#ffffff</b>', 
		'id' => 'featuredc-fdcolor' . $fbsinumber,
		'std' => '#ffffff',
		'type' => 'color'); 

	$options[] = array(
		'name' => 'Link', 
		'desc' => 'Input your Featured Items URL here.', 
		'id' => 'featured-link2' . $fbsinumber,
		'std' => '#',
		'type' => 'text');

	}
	
	
// Front Page Fearured Boxs
		
	$options[] = array(
		'name' => 'Featured Boxs', 
		'type' => 'heading');
	
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#fbox-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show the Featured Boxs',
		'desc' => 'Uncheck this if you do not want to show the Featured Boxs', 
		'id' => 'frfbox',
		'std' => '1',
		'type' => 'checkbox' );	
		
	$fbox_background_defaults = array(
		'color' => '#ffffff',
		'image' => get_template_directory_uri() . '/images/back.jpg',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );
		
	$options[] = array(
		'name' => 'Set Box Background', 
		'desc' => 'You can set the WebSite Background here. Defaults: <b>#ffffff  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.get_template_directory_uri() . '/images/back.jpg'.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Repeat All &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Top Left &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scroll Normally</b>' ,
		'id' => 'fboxi-back',
		'std' => $fbox_background_defaults,
		'type' => 'background' );	
	
	$options[] = array(
		'name' => 'Number of Featured Boxes', 
		'desc' => 'Set the Number of Featured Boxes you want. Default is 7', 
		'id' => 'nfbox1',
		'std' => '7',
		'type' => 'text',
		'class' => 'mini');
		
	$options[] = array(
		'name' => 'Colors',
		'desc' => 'Set the Title Font Color, Picture Shadow Color etc. if you want. Default is <b>#d50776</b>', 
		'id' => 'fbox-tcolor',
		'std' => '#d50776',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Set the Description Font Color if you want. Default is <b>#6a6969</b>', 
		'id' => 'fbox-dcolor',
		'std' => '#6a6969',
		'type' => 'color' );
		
	$numfbox1 = beautyandspa_get_option('nfbox1', '7');
	foreach (range(1, $numfbox1 ) as $fbsinumber) {
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">FEATURED BOX: ' . $fbsinumber . '</span>',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Image', 
		'desc' => 'Upload an image for the Featured Box. 200px X 100px image is recommended.  If you do not want to show anything here leave the box blank.', 
		'id' => 'featured-image' . $fbsinumber,
		'std' => get_template_directory_uri() . '/images/featured-image' . $fbsinumber . '.jpg',
		'type' => 'upload');	
	
	$options[] = array(
		'name' => 'Title', 
		'desc' => 'Input your Featured Title here. Please limit it within 30 Letters. If you do not want to show anything here leave the box blank.', 
		'id' => 'featured-title' . $fbsinumber,
		'std' => 'The Best Beauty and Spa WP Theme',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Description', 
		'desc' => 'Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive. You can also input any HTML, Videos or iframe here. But Please keep in mind about the limitation of Width of the box.', 
		'id' => 'featured-description' . $fbsinumber,
		'std' => 'The Color changing options of Beauty and Spa will give the WordPress Driven Site an attractive look. Beauty and Spa is super elegant and Professional Responsive Theme which will create the business widely expressed.',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => 'Link', 
		'desc' => 'Input your Featured Items URL here.', 
		'id' => 'featured-link' . $fbsinumber,
		'std' => '#',
		'type' => 'text');
	}


// 	Front Page Services and Booking

	$options[] = array(
		'name' => 'Services and Booking', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#service-box-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show The Services and Booking',
		'desc' => 'Uncheck this if you do not want to show these', 
		'id' => 'snfbox',
		'std' => '1',
		'capt' => array( '0' => 'NO', '1' => 'YES'),
		'type' => 'switch' );
		
	$options[] = array(
		'name' => 'Base Color', 
		'desc' => 'Set the Base Color. Default is <b>#ff1493</b>', 
		'id' => 'snfcolor',
		'std' => '#ff1493',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">Service Items</span>', 
		'type' => 'info');
		
		
	$options[] = array(
		'name' => 'Services Heading', 
		'desc' => 'Set the Services Heading', 
		'id' => 'ser-heading',
		'std' => 'Services',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Number of Items', 
		'desc' => 'Set the Number of Service Items', 
		'id' => 'sitem-number',
		'std' => '7',
		'type' => 'text',
		'class' => 'mini');
		
	$ser_number = beautyandspa_get_option('sitem-number', '7');
	foreach (range(1, $ser_number ) as $sernumber ) {
		
	$options[] = array(
		'name' => 'SERVICE ITEM -'. $sernumber, 
		'desc' => 'Input the Title', 
		'id' => 'sertitle' . $sernumber,
		'std' => 'SERVICE ITEM - '. $sernumber,
		'type' => 'text' );	
		
	$options[] = array(
		'desc' => 'Input the description here. Please limit it within 200 Letters', 
		'id' => 'serdes' . $sernumber,
		'std' => 'It is Amazing!  <em>Over 60 million people</em> have chosen WordPress to power the place on the web',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
	
	$options[] = array(
		'desc' => 'Input the Link URL. Leave it blank for No Link', 
		'id' => 'serlurl' . $sernumber,
		'std' => '#',
		'type' => 'text' );	
		
	$options[] = array(
		'desc' => 'Input the Link Text. Leave it blank for No Link', 
		'id' => 'serltext' . $sernumber,
		'std' => 'READ MORE',
		'type' => 'text',
		'class'	=> 'mini' );	
		
	}
	
	$options[] = array(
		'name' => 'Anthing Special You may want ?',
		'desc' => 'You can use HTML, JavaScript, CSS, ShortCode here. If you want to show an Image you can use <b>'. esc_html('<img src="http://domain.com/image.jpg" />') .'</b> this HTML Code replacing the Image URL. You can use any ShortCode of Plugin, too',
		'id' => 'bspecial',
		'std' => '<img src="'.get_template_directory_uri() . '/images/special.jpg'.'" />',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
		
	
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">Booking or Something</span>', 
		'type' => 'info');
		
		
	$options[] = array(
		'name' => 'Booking Heading', 
		'desc' => 'Set the Booking Heading', 
		'id' => 'booking-heading',
		'std' => 'Book a Time !',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Booking Code',
		'desc' => 'You can use HTML, JavaScript, CSS, ShortCode here. You can use any ShortCode of Plugin for Appointment/Booking System. There are many Free Plugins for you. We have used the ShortCode  <b style="color:red;">[ea_bootstrap]</b> of <a href="https://wordpress.org/plugins/easy-appointments" target="_blank"><b>Easy Appointments</b></a> Plugin in our Demo',
		'type' => 'info');
		
	$options[] = array(
		'id' => 'booking-content',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
		
	$options[] = array(
		'desc' => 'Someone may be interested on <a href="https://wordpress.org/plugins/birchschedule" target="_blank">Appointment Booking Calendar - BirchPress Scheduler</a>, <a href="https://wordpress.org/plugins/booking-ultra-pro" target="_blank">Booking Ultra Pro Appointments Plugin</a>, <a href="https://wordpress.org/plugins/webba-booking-lite" target="_blank">Webba Booking Lite</a> etc.',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Alternative Image if No Code',
		'desc' => 'You can show an Image in this Space in case you do not have any Booking Plugin Installed or do not have any Code/ShortCode',
		'id' => 'booking-image',
		'std' => get_template_directory_uri() . '/images/booking.jpg',
		'type' => 'upload');
		

// Front E-Commerce Box
	$options[] = array(
		'name' => 'E-Commerce', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#ecom-box-item</strong> the Link for This Section ',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Show The E-Commerce/WooCommerce Box',
		'desc' => 'Uncheck this if you do not want to show the E-Commerce/WooCommerce Box in Front Page', 
		'id' => 'ecombox',
		'std' => '0',
		'capt' => array( '0' => 'NO', '1' => 'YES'),
		'type' => 'switch' );

	$options[] = array(
		'name' => 'Full Width Layout for WooCommerce Pages',
		'desc' => 'Check it if you want to show Full Width Layout for WooCommerce Pages', 
		'id' => 'woo-page-full',
		'std' => '1',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'name' => 'Show Cart Icon with Main Menu',
		'desc' => 'Check it if you want to Show Cart Icon with Main Menu. This will work only with WooCommerce', 
		'id' => 'woo-cart-icon',
		'std' => '1',
		'type' => 'checkbox' );	
		
	$options[] = array(
		'name' => 'Base Colors',
		'desc' => 'Change the Base Color 01 <b>#f72bc0</b>', 
		'id' => 'wooc1',
		'std' => '#f72bc0',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Change the Base Color 02 <b>#ae058c</b>', 
		'id' => 'wooc2',
		'std' => '#ae058c',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Box Title',
		'desc' => 'Input the Title. It also Supports HTML, JavaScripts, ShortCode etc.', 
		'id' => 'ecomtitle',
		'std' => 'OUR AWESOME PRODUCTS',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );	
		
	$options[] = array(
		'name' => 'Box Sub Title',
		'desc' => 'Input the Sub Title. It also Supports HTML, JavaScripts, ShortCode etc.', 
		'id' => 'ecomsubtitle',
		'std' => 'Where <em>Passion and Creativity</em> Meets Experience',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );		
		
	$options[] = array(
		'name' => 'Box Description',
		'desc' => 'Input the description here. Please limit it within 200 Letters. It also Supports HTML, JavaScripts, ShortCode etc.', 
		'id' => 'ecomdes',
		'std' => 'We are a small team of industry veterans having decades of <em>Experience in web Development</em> and design',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
		
	$options[] = array(
		'name' => 'Input ShortCode for E-Commerce/WooCommerce',
		'desc' => '', 		
		'id' => 'wooshortcod',
		'std' => '[products]',
		'type' => 'editor',
		'settings' => $wp_editor_settings );	

	$options[] = array(
		'desc' => 'This Box Supports HTML, JavaScripts, ShortCode etc. You can use one or more ShortCodes here. WooCommerce ShortCodes are like: <strong style="color:#f808b1;">[featured_products]</strong>. You can find more <a href="'.esc_url('https://docs.woothemes.com/document/woocommerce-shortcodes').'" target="_blank">WooCommerce ShortCodes Here</a>. But, you should have the <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce E-Commerce Plugin</a> installed in your site',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Anything Extra in the Bottom',
		'desc' => 'You can input any Terms or Other things Here', 		
		'id' => 'wooextra',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings );


// Front Staff Boxes
	$options[] = array(
		'name' => 'Staff Boxes', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#staff-box-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show The Staff Boxes',
		'desc' => 'Uncheck this if you do not want to show the Staff Boxes', 
		'id' => 'staffbox',
		'std' => '1',
		'capt' => array( '0' => 'HIDE', '1' => 'SHOW'),
		'type' => 'switch' );
		
	$options[] = array(
		'name' => 'Colors', 
		'desc' => 'Set the Background Color. Default is <b>#ffffff</b>', 
		'id' => 'stfbcolor',
		'std' => '#ffffff',
		'type' => 'color' );	
		
	$options[] = array(
		'desc' => 'Set the Base Color. Default is <b>#f808b1</b>', 
		'id' => 'stffcolor',
		'std' => '#f808b1',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Staff Boxes Heading', 
		'desc' => 'Set the Staff Boxes Heading', 
		'id' => 'staffboxes-heading',
		'std' => 'WE ARE INSIDE',
		'type' => 'text');
		
	$options[] = array(
		'desc' => 'Text Color. Default is <b>#f808b1</b>', 
		'id' => 'stfbhcolor',
		'std' => '#f808b1',
		'type' => 'color' );	
		
	$options[] = array(
		'name' => 'Staff Boxes Heading Description', 
		'desc' => 'Set the Staff Boxes Heading description', 
		'id' => 'staffboxes-heading-des',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => 'Text Color. Default is <b>#555555</b>', 
		'id' => 'stfbdcolor',
		'std' => '#555555',
		'type' => 'color' );	
	
	$options[] = array(
		'name' => 'Number of Staff Boxes', 
		'desc' => 'Set the Number of Staff Boxes you want', 
		'id' => 'staffboxes-number',
		'std' => '4',
		'type' => 'text',
		'class' => 'mini');
		
	$staffboxes_number = beautyandspa_get_option('staffboxes-number', '4');
	foreach (range(1, $staffboxes_number ) as $staffboxsnumber) {
	
	
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">Staff Box: ' . $staffboxsnumber . '</span>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Staff Image', 
		'desc' => 'Uoload the Staff Image. The Sample Image is 300px X 400px', 
		'id' => 'staffboxes-image' . $staffboxsnumber,
		'std' => get_template_directory_uri() . '/images/stf'.  $staffboxsnumber . '.jpg',
		'type' => 'upload');
	
	$options[] = array(
		'name' => 'Name', 
		'desc' => 'Staff Name', 
		'id' => 'staffboxes-title' . $staffboxsnumber,
		'std' => 'OUR PROUD STAFF '. $staffboxsnumber,
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Designation', 
		'desc' => 'Input the Designation', 
		'id' => 'staffboxes-description' . $staffboxsnumber,
		'std' => 'Service Executive',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Profile Link', 
		'desc' => 'Input the Staff Profile URL here.', 
		'id' => 'staffboxes-link' . $staffboxsnumber,
		'std' => '#',
		'type' => 'text');
		
	$options[] = array(
		'desc' => 'Open Link in New Window/Tab', 
		'id' => 'staffboxes-link-onw' . $staffboxsnumber,
		'std' => '0',
		'type' => 'checkbox' );	
		
	foreach ( range(1, 5 ) as $numstns ) { 
		
	$options[] = array(
		'name' => 'Social Links', 
		'desc' => 'Input the Social Network URL here, like Facebook, Twitter, Google Plus etc. For Nothing Leave This Field Blank', 
		'id' => 'staffboxes-link'.$numstns.'-' .$staffboxsnumber,
		'std' => '#',
		'type' => 'text');	
		
		}
		
	}
	

// Front Page Extra

	$options[] = array(
		'name' => 'Front Page Extra', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#extra-box-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Open Box Area in Front Page', 
		'desc' => 'You can input anything here like HTML, Java Script, ShortCode etc. to show any Extra Items in Front Page. You should style them properly', 
		'id' => 'fpextrab',
		'std' => '<img src="'.get_template_directory_uri() . '/images/extra.jpg" width="100%" />',
		'type' => 'editor',
		'settings' => $wp_editor_settings );


// Front Page Blog Posts
	$options[] = array(
		'name' => 'Front Page Blog Posts', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#fpblog-box-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show The Front Page Blog Posts',
		'desc' => 'Uncheck this if you do not want to show the Front Page Blog Posts', 
		'id' => 'fpblogpost',
		'std' => '1',
		'capt' => array( '0' => 'HIDE', '1' => 'SHOW'),
		'type' => 'switch' );
		
	$options[] = array(
		'name' => 'Base Color', 
		'desc' => 'Change the Color <b>#f808b1</b>', 
		'id' => 'lbpcolor',
		'std' => '#f808b1',
		'type' => 'color' );

	$options[] = array(
		'name' => 'Front Page Blog Posts Heading', 
		'desc' => 'Input the Front Page Blog Posts Heading here.', 
		'id' => 'latest-blog-text',
		'std' => 'Latest <em>Blog</em> Posts',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
	
	$options[] = array(
		'name' => 'All Blog Link',
		'desc' => 'Input the URL of All Blog Page',
		'id' => 'blog-page-link',
		'std' => '#',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => 'Open Link in New Window/Tab', 
		'id' => 'blog-page-onw',
		'std' => '1',
		'type' => 'checkbox' );
		
	$options[] = array(
		'desc' => 'Set All Blog Link Text Here',
		'id' => 'blog-page-link-text',
		'std' => 'READ ALL',
		'type' => 'text',
		'class' => 'mini');		
	
		
	$options[] = array(
		'name' => 'Front Page Total Post Number',
		'desc' => 'Set Front Page Total Post Number Here',
		'id' => 'fpblogpost-number',
		'std' => '6',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Blog Post Open in New Window/Tab ?',
		'desc' => 'Open Link in New Window/Tab', 
		'id' => 'blog-post-onw',
		'std' => '1',
		'type' => 'checkbox' );
		
	$fposttype = array( '1' => 'Do not Show any Post or Page in the Front Page.', '2' => 'Show Posts or Page and Left/Right Sidebar.', '3' => 'Show Posts or Page Full Width without Left/Right Sidebar.' );
	
	$options[] = array(
		'name' => 'Front Page Post/Page Visibility as per Settings > Reading Configuration', 
		'desc' => 'Select Option how you want to show or do not want to show Posts/Pages in the Front Page', 
		'id' => 'fpostex',
		'std' => '1',
		'type' => 'radio',
		'options' => $fposttype);
		
	$options[] = array(
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#wpbp-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'desc' => 'Do not Show Page Title in Front Page', 
		'id' => 'dnsptfp',
		'std' => '1',
		'type' => 'checkbox' );
		
		
// Front Gallery Boxes
	$options[] = array(
		'name' => 'Our Gallery', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#gallery-box-item</strong>  the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show The Gallery Boxes',
		'desc' => 'Uncheck this if you do not want to show the Gallery Boxes', 
		'id' => 'gallerybox',
		'std' => '1',
		'capt' => array( '0' => 'HIDE', '1' => 'SHOW'),
		'type' => 'switch' );
		
	$options[] = array(
		'name' => 'Background Color',
		'desc' => 'Set the Background Color if you want. Default is <b>#f6f6f6</b>', 
		'id' => 'gallerybox-color',
		'std' => '#f6f6f6',
		'type' => 'color' );	
		
	$options[] = array(
		'name' => 'Gallery Boxes Heading', 
		'desc' => 'Set the Gallery Boxes Heading', 
		'id' => 'galleryboxes-heading',
		'std' => 'OUR GALLERY',
		'type' => 'text');
	
	$options[] = array(
		'desc' => 'Set the Background Color if you want. Default is <b>#ff1493</b>', 
		'id' => 'gbox-hcolor',
		'std' => '#ff1493',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Gallery Boxes Heading Description', 
		'desc' => 'Set the Gallery Boxes Heading description', 
		'id' => 'galleryboxes-heading-des',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
		'type' => 'textarea');
		
	$options[] = array(
		'desc' => 'Set the Font Color if you want. Default is <b>#555555</b>', 
		'id' => 'gbox-hdcolor',
		'std' => '#555555',
		'type' => 'color' );		
	
	$options[] = array(
		'name' => 'Number of List Categories', 
		'desc' => 'Set the Number of List Categories', 
		'id' => 'gallerylist-number',
		'std' => '7',
		'type' => 'text',
		'class' => 'mini');
 
 	$options[] = array(
		'desc' => 'List Categories', 
		'type' => 'info');
			
	$gallerylist_number = beautyandspa_get_option('gallerylist-number', '7');
	foreach (range(1, $gallerylist_number ) as $gallerylistnumber) {
	
	$options[] = array(
		'desc' => 'List Category: '. $gallerylistnumber, 
		'id' => 'gallerylist'. $gallerylistnumber ,
		'std' => 'List'.$gallerylistnumber,
		'type' => 'text',
		'class' => 'mini');
	}
	
	$options[] = array(
		'name' => 'Default Loading Category', 
		'desc' => 'Set the Default Loading Category. <strong>You should/must set This for better performance</strong>', 
		'id' => 'gallerylist-default',
		'std' => 'All',
		'type' => 'text',
		'class' => 'mini');
	
	$options[] = array(
		'name' => 'Number of Items', 
		'desc' => 'Set the Number of Gallery Items', 
		'id' => 'galleryboxes-number',
		'std' => '12',
		'type' => 'text',
		'class' => 'mini');
		
	$options[] = array(
		'name' => 'Base Color',
		'desc' => 'Set the Base Color if you want. Default is <b>#ff1493</b>', 
		'id' => 'gallery-bcolor',
		'std' => '#ff1493',
		'type' => 'color' );
		
	$galleryboxes_number = beautyandspa_get_option('galleryboxes-number', '8');
	foreach (range(1, $galleryboxes_number ) as $galleryboxsnumber) {
	
	
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">Gallery Box: ' . $galleryboxsnumber . '</span>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Gallery Image', 
		'desc' => 'Uoload the Gallery Image. The Sample Image is 400px X 400px', 
		'id' => 'galleryboxes-image' . $galleryboxsnumber,
		'std' => get_template_directory_uri() . '/images/gl'.  $galleryboxsnumber . '.jpg',
		'type' => 'upload');
		
	$options[] = array(
		'name' => 'Preview Image', 
		'desc' => 'Uoload the Large Image for Preview. The Sample Image is 1000px X 600px', 
		'id' => 'galleryboxes-imagel' . $galleryboxsnumber,
		'std' => get_template_directory_uri() . '/images/gll'.  $galleryboxsnumber . '.jpg',
		'type' => 'upload');
		
	$options[] = array(
		'name' => 'Item Categories', 
		'desc' => 'Input the Item Categories from the List Categories. You can input one or more like sameple format: <b>"All Image", "red", "Blue", "GreEn"</b>. But, These Categories should be set in the above List Categories first. <a href="'.esc_url('http://d5creation.com/forums/topic/travel-searchlight-selfie-awesome-themes-gallery-categories-setting').'" target="_blank">This Tutorial</a> may help you', 
		'id' => 'galleryboxes-cat' . $galleryboxsnumber,
		'std' => '"All", "List1", "List3"',
		'type' => 'text' );
		
	$options[] = array(
		'name' => 'Title', 
		'desc' => 'Input the description of Gallery Box. Please limit the words within 30 so that the layout should be clean and attractive.', 
		'id' => 'galleryboxes-title' . $galleryboxsnumber,
		'std' => 'Our Recent Work-' . $galleryboxsnumber,
		'type' => 'text' );
	
	$options[] = array(
		'name' => 'Description', 
		'desc' => 'Input the description of Gallery Box. Please limit the words within 30 so that the layout should be clean and attractive.', 
		'id' => 'galleryboxes-description' . $galleryboxsnumber,
		'std' => 'Beauty and Spa Professional Responsive Theme',
		'type' => 'textarea' );

	$options[] = array(
		'name' => 'Link', 
		'desc' => 'Input OUR GALLERY Item URL here.', 
		'id' => 'galleryboxes-link' . $galleryboxsnumber,
		'std' => '#',
		'type' => 'text');
		
	$options[] = array(
		'desc' => 'Open Link in New Window/Tab', 
		'id' => 'galleryboxes-onwl' . $galleryboxsnumber,
		'std' => '0',
		'type' => 'checkbox' );
		
	$options[] = array(
		'desc' => 'Set the Link Text here', 
		'id' => 'galleryboxes-link-text' . $galleryboxsnumber,
		'std' => 'Take a Look',
		'type' => 'text',
		'class' => 'mini');
	}	
	
	
// Front Contact Box
	$options[] = array(
		'name' => 'Contact Box', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#contact-box-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show The Contact Box',
		'desc' => 'Uncheck this if you do not want to show the Contact Box', 
		'id' => 'contactbox',
		'std' => '1',
		'capt' => array( '0' => 'NO', '1' => 'YES'),
		'type' => 'switch' );
		
	$options[] = array(
		'name' => 'Background Color and/or Image',
		'desc' => 'Set the Background Color if you want. Default is <b>#ec04a8</b>', 
		'id' => 'contactbox-color',
		'std' => '#ec04a8',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Set the Background Image. Recommended Size 2000px X 1300px but you should use as per your Box Size', 
		'id' => 'contactbox-image',
		'std' => get_template_directory_uri() . '/images/contact.jpg',
		'type' => 'upload' );	
		
	$options[] = array(
		'name' => 'Contact Box Heading', 
		'desc' => 'Set the Contact Box Heading', 
		'id' => 'contactbox-heading',
		'std' => 'GET IN TOUCH',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Contact Box Heading Description', 
		'desc' => 'Set the Contact Box Heading description', 
		'id' => 'contactbox-heading-des',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
		
	$options[] = array(
		'name' => 'Contact Form ShortCode', 
		'desc' => '<strong>You Should Install any Contact Form Plugin and Generate ShortCode. You can use that ShortCode Here. We Recommend to install <a href="https://wordpress.org/plugins/contact-form-7" target="_blank" >Contact Form 7 Plugin</a></strong>', 
		'id' => 'contactbox-form',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
	
	
	$options[] = array(
		'name' => 'Contact Items Box Sub Heading', 
		'desc' => 'Set the Contact Items Box Sub Heading', 
		'id' => 'contactbox-item-title',
		'std' => 'Contact Information',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Contact Items Box Sub Heading Description', 
		'desc' => 'Set the Contact Items Box Sub Heading description', 
		'id' => 'contactbox-item-descrp',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
	
	
	$options[] = array(
		'name' => 'Number of Contact Item', 
		'desc' => 'Set the Number of Contact Item you want', 
		'id' => 'contactbox-item-number',
		'std' => '3',
		'type' => 'text',
		'class' => 'mini');
		
		
	$conbox = beautyandspa_get_option('contactbox-item-number', '3'); foreach (range(1, $conbox ) as $conboxx )  {
	
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">Contact Item: ' . $conboxx . '</span>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Name', 
		'desc' => 'Itam Name', 
		'id' => 'contactbox-item'. $conboxx,
		'std' => 'ADDRESS',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Description', 
		'desc' => 'Itam Description', 
		'id' => 'contactbox-item-des'. $conboxx,
		'std' => 'Lorem ipsum dolor sit amet',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
		
	$options[] = array(
		'name' => 'Item Icon Name from Font Awesome ', 
		'desc' => 'Insert any icon name from Font Awesome which may be appropriate. You can find this <a href="'.esc_url('http://fortawesome.github.io/Font-Awesome/icons').'" target="_blank">Here</a>. The default icon is <b>fa-envelope-o</b>', 
		'id' => 'contactbox-item-icon'. $conboxx,
		'std' => 'fa-envelope-o',
		'type' => 'text',
		'class' => 'mini');

	}


// Front Mapping Box
	$options[] = array(
		'name' => 'Mapping Box', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#mapping-box-item</strong> the Link for This Section ',
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Show The Mapping Box',
		'desc' => 'Uncheck this if you do not want to show the Mapping Box', 
		'id' => 'mappingbox',
		'std' => '1',
		'capt' => array( '0' => 'NO', '1' => 'YES'),
		'type' => 'switch' );	

	$options[] = array(
		'name' => 'Mapping ShortCode', 
		'desc' => 'You Should Install any Mapping Plugin and Generate ShortCode. You can use that ShortCode Here. We Recommend to install <a href="https://wordpress.org/plugins/simple-map" target="_blank" >Simple Map Plugin</a>. For this Plugin You need not find any Setting Page. You can just use the ShortCode here Like This:  <strong>[map lat="37.77493" lng="-122.41942" width="100%" height="400px" zoom="15"][/map]</strong>', 
		'id' => 'mappingtbox-map',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );	
		
		
		
// Front Page Clients' Testimonial
	$options[] = array(
		'name' => 'Testimonial',
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#testimonial-box-item</strong> the Link for This Section ',
		'type' => 'info');	
		
	$options[] = array(
		'name' => 'Show the Clients Testimonials',
		'desc' => 'You can hide the Clients Testimonials  Unchecking this Box.',
		'id' => 'tes-cln',
		'std' => '1',
		'capt' => array( '0' => 'HIDE', '1' => 'SHOW'),
		'type' => 'switch' );
		
	$options[] = array(
		'name' => 'Box Background Color',
		'desc' => 'Change the Container Background Color <b>#f6f6f6</b>', 
		'id' => 'tesbcolor',
		'std' => '#f6f6f6',
		'type' => 'color' );
	
	$options[] = array(
		'desc' => 'Show Plain Background Color', 
		'id' => 'tes-backp',
		'std' => '0',
		'type' => 'checkbox' );
		
	$options[] = array(
		'name' => 'Quote Background Color',
		'desc' => 'Change the Quote Box Color <b>#ffffff</b>', 
		'id' => 'tesqbcolor',
		'std' => '#ffffff',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Show Plain Background Color', 
		'id' => 'tesq-backp',
		'std' => '0',
		'type' => 'checkbox' );
		
	$options[] = array(
		'name' => 'Other Colors',
		'desc' => 'Change the Quote Title, Arrow, Dot Color <b>#f808b1</b>', 
		'id' => 'tesqtlcolor',
		'std' => '#f808b1',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Change the Quote Text Color <b>#141414</b>', 
		'id' => 'tesqtcolor',
		'std' => '#141414',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Change the Client Text Color <b>#555555</b>', 
		'id' => 'tesctcolor',
		'std' => '#555555',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Testimonial Heading', 
		'desc' => 'Input the Testimonial Heading here.', 
		'id' => 'testimonial-text',
		'std' => 'Sweet Words from our <em>Proud Clients</em> Worldwide',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
		
	$options[] = array(
		'desc' => 'Change the Color <b>#ff1493</b>', 
		'id' => 'teshcolor',
		'std' => '#ff1493',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Number of Clients Testimonials', 
		'desc' => 'Set the Number of Clients Testimonials you want. Default is 10', 
		'id' => 'numclientt',
		'std' => '10',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Auto Play Testimonials',
		'desc' => 'Check This if You want Auto Play of Testimonials. Default is <b>Yes</b>',
		'id' => 'test-autoplay',
		'std' => 'true',
		'type' => 'radio',
		'options' => $truefalse );	
	
	$options[] = array(
		'name' => 'Show the Navigation Arrows',
		'desc' => 'Check This if You want to Show the Navigation Arrows. . Default is <b>Yes</b>',
		'id' => 'test-navarrows',
		'std' => 'true',
		'type' => 'radio',
		'options' => $truefalse );
		
	$options[] = array(
		'name' => 'Show the Navigation Dots',
		'desc' => 'Check This if You want to Show the Navigation Dots. . Default is <b>Yes</b>',
		'id' => 'test-navdots',
		'std' => 'true',
		'type' => 'radio',
		'options' => $truefalse );
		
	$options[] = array(
		'name' => 'Testimonials Scrolling Speed',
		'desc' => 'Select the Scrolling Speed in MilliSeconds. Default is 2000',
		'id' => 'test-speed',
		'std' => '2000',
		'type' => 'text',
		'class' => 'mini');
		
	$options[] = array(
		'name' => 'Testimonial Page Link ( Optional )',
		'desc' => 'Input the Testimonial Page URL here. Leave this box blank for No Page.',
		'id' => 'tes-link',
		'std' => '',
		'type' => 'text');
		
	$options[] = array(
		'desc' => 'Open Link in New Window/Tab', 
		'id' => 'tes-link-onw',
		'std' => '1',
		'type' => 'checkbox' );
	
	$options[] = array(
		'desc' => '<span class="featured-area-title" style="font-size:30px;">CLIENTS TESTIMONIALS</span>',
		'type' => 'info');
		
	$ctes= beautyandspa_get_option('numclientt', '10');
	foreach (range(1, $ctes) as $ctesnumber) {
		
	$options[] = array(
		'desc' => '<span class="featured-area-sub-title">Testimonial - ' . $ctesnumber . '</span>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Name of the Client',
		'desc' => 'Input the Name of the Client',
		'id' => 'bottom-quotation-cn' . $ctesnumber,
		'std' => 'Beauty and Spa Client',
		'type' => 'text');

	$options[] = array(
		'name' => 'Photo of the Client',
		'desc' => 'Upload the Photo of the Client. 150px X 150px Image is recommended',
		'id' => 'bottom-quotation-ph' . $ctesnumber,
		'std' => get_template_directory_uri() . '/images/featured-image3.png',
		'type' => 'upload');
		
	$options[] = array(
		'name' => 'Title of the Quote',
		'desc' => 'Input the Title of the Quote',
		'id' => 'bottom-quotation-title' . $ctesnumber,
		'std' => 'Beauty and Spa Testimonial: '. $ctesnumber,
		'type' => 'text');

	$options[] = array(
		'name' => 'Quote Text',
		'desc' => 'Input your Front Page Bottom Quotation here. Please limit it within 150 Letters.',
		'id' => 'bottom-quotation' . $ctesnumber,
		'std' => 'All the developers of D5 Creation have come from the disadvantaged part or group of the society. All have established themselves after a long and hard struggle in their life',
		'type' => 'textarea');
		
	}

	
	
// Front Page Client List
	$options[] = array(
		'name' => 'Clients', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Main Menu Link of This Section', 
		'desc' => 'You can use <strong style="color:#ff1493;">' . $hmeurl . '#client-box-item</strong> the Link for This Section ',
		'type' => 'info');	
		
	$options[] = array(
		'name' => 'Show the Clients List',
		'desc' => '<strong>Check This if You want to Show Your Clients List</strong>', 
		'id' => 'client-visibility',
		'std' => '1',
		'capt' => array( '0' => 'HIDE', '1' => 'SHOW'),
		'type' => 'switch' );	
		
	$options[] = array(
		'desc' => '<span class="featured-area-title">Clients or Partners List</span>', 
		'type' => 'info'); 
		
	$clntype = array( '1' => 'Show One Row Client List. This will show Up to 07 Client Logos.', '2' => 'Show Multiple Rows Client Logos. This will show All Client Logos.',  '3' => 'Show Slider Client Logos. This will show All Client Logos within One Row with Scrolling Effect .' );
	
	$options[] = array(
		'name' => 'Select the Client Listing.',
		'desc' => 'Select how you want to show the Client List.', 
		'id' => 'clntype',
		'std' => '3',
		'type' => 'radio',
		'options' => $clntype);
		
	$options[] = array(
		'name' => 'Box Background Color',
		'desc' => 'Change the Container Background Color <b>#f6f6f6</b>', 
		'id' => 'clntbcolor',
		'std' => '#f6f6f6',
		'type' => 'color' );
	
	$options[] = array(
		'desc' => 'Show Plain Background Color', 
		'id' => 'clnt-backp',
		'std' => '0',
		'type' => 'checkbox' );
		
	$options[] = array(
		'name' => 'Client Text', 
		'desc' => 'Input the Client Text here.', 
		'id' => 'client-text',
		'std' => 'Some of our <em>Proud Partners</em>',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
		
	$options[] = array(
		'desc' => 'Set the Font Color if you want. Default is <b>#f808b1</b>. It will also be used for Slide Arrows and Dots', 
		'id' => 'clntt-color',
		'std' => '#f808b1',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Description Text', 
		'desc' => 'Input the Client Box Description Text here.', 
		'id' => 'client-des',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
		'type' => 'editor',
		'settings' => $wp_editor_settingst );
		
	$options[] = array(
		'desc' => 'Set the Font Color if you want. Default is <b>#555555</b>', 
		'id' => 'clntd-color',
		'std' => '#555555',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Number of Client Logos', 
		'desc' => 'Set the Number of Client Logos you want. Default is 14', 
		'id' => 'numclient',
		'std' => '14',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Auto Play Clients Logos',
		'desc' => 'Check This if You want Auto Scrool of the Clients Logo. Default is <b>Yes</b>',
		'id' => 'client-autoplay',
		'std' => 'true',
		'type' => 'radio',
		'options' => $truefalse );	
	
	$options[] = array(
		'name' => 'Show the Navigation Arrows',
		'desc' => 'Check This if You want to Show the Navigation Arrows. . Default is <b>Yes</b>',
		'id' => 'client-navarrows',
		'std' => 'true',
		'type' => 'radio',
		'options' => $truefalse );
		
	$options[] = array(
		'name' => 'Show the Navigation Dots',
		'desc' => 'Check This if You want to Show the Navigation Dots. . Default is <b>Yes</b>',
		'id' => 'client-navdots',
		'std' => 'true',
		'type' => 'radio',
		'options' => $truefalse );
		
	$options[] = array(
		'name' => 'Clients Logo Scrolling Speed',
		'desc' => 'Select the Scrolling Speed in MilliSeconds. Default is 3000',
		'id' => 'client-speed',
		'std' => '3000',
		'type' => 'text',
		'class' => 'mini');
	
	$csin = beautyandspa_get_option('numclient', '14');
	foreach (range(1, $csin ) as $csinumber) {
			
	$options[] = array(
		'desc' => '<div class="vsep"> </div>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Client 0'. $csinumber, 
		'desc' => 'Upload a Logo of the Client. 200px width PNG image is recommended', 
		'id' => 'client' . $csinumber,
		'std' => get_template_directory_uri() . '/images/client.png',
		'type' => 'upload');
		
	$options[] = array(
		'desc' => 'Input the URL where the image will redirect the visitors, if Applicable.', 
		'id' => 'client-image' . $csinumber . '-link',
		'std' => '',
		'type' => 'text');
		
	}

	
// 	Color Settings
	$options[] = array(
		'name' => 'Color', 
		'type' => 'heading');	
		
	$options[] = array(
		'desc' => 'This settings will overwrite the color settings during Font Styling', 
		'type' => 'info');
		
	$site_background_defaults = array(
		'color' => '#ffffff',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top left',
		'attachment'=>'scroll' );
		
	$options[] = array(
		'name' => 'Set Site Background', 
		'desc' => 'You can set the WebSite Background here. Defaults: <b>#ffffff  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Repeat All &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Top Left &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Scroll Normally</b>' ,
		'id' => 'website-back',
		'std' => $site_background_defaults,
		'type' => 'background' );	
		
	$options[] = array(
		'name' => 'Website Body Font Color',
		'desc' => 'Set the Website Body Font Color if you want. Default is <b>#6a6969</b>', 
		'id' => 'webbody-color',
		'std' => '#6a6969',
		'type' => 'color' );

	$options[] = array(
		'name' => 'Header Background Color',
		'desc' => 'Set the Header Background Color if you want. Default is <b>#ffffff</b>', 
		'id' => 'headerbackc',
		'std' => '#ffffff',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Top Social Bar Background Color',
		'desc' => 'Set the Top Social Bar Background Color if you want. Default is <b>#f7f7f7</b>', 
		'id' => 'topsbackc',
		'std' => '#f7f7f7',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Main Menu Font Color',
		'desc' => 'Set the Main Menu Color if you want. Default is <b>#fb4baa</b>', 
		'id' => 'menu-color',
		'std' => '#fb4baa',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Set the Main Menu Hover ( Mouse Over ) Color if you want. Default is <b>#e200ba</b>', 
		'id' => 'menu-color-mo',
		'std' => '#e200ba',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Sub-Menu Font Color',
		'desc' => 'Set the Sub-Menu Color if you want. Default is <b>#e200ba</b>', 
		'id' => 'submenu-color',
		'std' => '#e200ba',
		'type' => 'color' );	
		
	$options[] = array(
		'desc' => 'Set the Sub-Menu Hover ( Mouse Over ) Color if you want. Default is <b>#ffffff</b>', 
		'id' => 'submenu-color-mo',
		'std' => '#ffffff',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Footer Color',
		'desc' => 'Set the Footer Background Color if you want. Default is <b>#ff00ff</b>', 
		'id' => 'footerback-color',
		'std' => '#ff00ff',
		'type' => 'color' );
		
	$options[] = array(
		'desc' => 'Do not Show Stripe Background. Check This if want Plain Background', 
		'id' => 'plainfoot',
		'std' => '0',
		'type' => 'checkbox' );
		
	$options[] = array(
		'desc' => 'Set the Footer Font Color if you want. Default is <b>#ffffff</b>', 
		'id' => 'footer-color',
		'std' => '#ffffff',
		'type' => 'color' );
		
	$options[] = array(
		'name' => 'Base Color [ Link, Titles, Buttons etc. ]',
		'desc' => 'Set the Base Color if you want. Default is <b>#e200ba</b>. This will change the Link, Title, Button etc. Colors', 
		'id' => 'sbase-color',
		'std' => '#e200ba',
		'type' => 'color' );
	

	$options[] = array(
		'name' => 'Color CSS of your Site', 
		'desc' => 'You can set your own colors and image locations for your site. You can also paste Custom CSS in the following Box. You need not use starting and closing <b>style</b> tag.', 
		'id' => 'color-setting',
		'std' => '',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	
// Social Links	
	$options[] = array(
		'name' => 'Social Links', 
		'type' => 'heading');
		
	$options[] = array(
		'name' => 'Show the Header Social Links',
		'desc' => 'You can Show or Hide the Header Social Links',
		'id' => 'hslinks',
		'std' => '1',
		'capt' => array( '0' => 'HIDE', '1' => 'SHOW'),
		'type' => 'switch' );
		
	$options[] = array(
		'name' => 'Show the Footer Social Links',
		'desc' => 'You can Show or Hide the Footer Social Links',
		'id' => 'fslinks',
		'std' => '1',
		'capt' => array( '0' => 'HIDE', '1' => 'SHOW'),
		'type' => 'switch' );

	$options[] = array(
		'name' => 'Number of Social Links', 
		'desc' => 'Set the Number of Social Links you want.', 
		'id' => 'nslinks',
		'std' => '7',
		'type' => 'text',
		'class' => 'mini');
		
	$numslinks = beautyandspa_get_option('nslinks', '7');
	foreach (range(1, $numslinks ) as $beautyandspa_numslinksn) {
		
	$options[] = array(
		'name' => 'Social Link - '. $beautyandspa_numslinksn, 
		'desc' => 'Input Your Social Page Link. Example: <b>http://facebook.com/d5creation</b>.  If you do not want to show anything here leave the box blank.', 
		'id' => 'sl' . $beautyandspa_numslinksn,
		'std' => '#',
		'type' => 'text');	
		
	}

	
// Language Settings
	$options[] = array(
		'name' => 'Language',
		'type' => 'heading');		
	
	$options[] = array(
		'desc' => 'You can change the texts as your own language. These are only the Front End Texts which your visitors will see.',
		'type' => 'info');	
		
	$options[] = array(
		'name' => 'Your Search Text Here',
		'desc' => 'Change the Text <b>Your Search Text Here</b>.',
		'id' => 'sth',
		'std' => 'Search Text Here',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Search',
		'desc' => 'Change the Text <b>Search</b>.',
		'id' => 'src',
		'std' => 'Search',
		'type' => 'text',
		'class' => 'mini');	
	
	$options[] = array(
		'name' => 'Read More',
		'desc' => 'Change the Text <b>Read More</b>.',
		'id' => 'readmore',
		'std' => 'Read More',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'No Comments',
		'desc' => 'Change the Text <b>No Comments</b>.',
		'id' => 'nocomments',
		'std' => 'No Comments',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Comments',
		'desc' => 'Change the Text <b>Comments</b>.',
		'id' => 'comments',
		'std' => 'Comments',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'One Comment',
		'desc' => 'Change the Text <b>One Comment</b>.',
		'id' => '1comment',
		'std' => 'One Comment',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Comments are Closed',
		'desc' => 'Change the Text <b>Comments are Closed</b>.',
		'id' => 'cac',
		'std' => 'Comments are Closed',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'To',
		'desc' => 'Change the Text <b>to</b>.',
		'id' => 'to2',
		'std' => 'to',
		'type' => 'text',
		'class' => 'mini');	
		
		$options[] = array(
		'name' => 'Leave a Reply',
		'desc' => 'Change the Text <b>Leave a Reply</b>.',
		'id' => 'lar',
		'std' => 'Leave a Reply',
		'type' => 'text');	
		
	$options[] = array(
		'name' => 'Leave a Reply to',
		'desc' => 'Change the Text <b>Leave a Reply to</b>.',
		'id' => 'lart',
		'std' => 'Leave a Reply to',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Cancel Reply',
		'desc' => 'Change the Text <b>Cancel Reply</b>.',
		'id' => 'crply',
		'std' => 'Cancel Reply',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Post Comment',
		'desc' => 'Change the Text <b>Post Comment</b>.',
		'id' => 'pcmnt',
		'std' => 'Post Comment',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Comment:',
		'desc' => 'Change the Text <b>Comment:</b>.',
		'id' => 'commentsin',
		'std' => 'Comment:',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'For Posting a Comment You must be',
		'desc' => 'Change the Text <b>For Posting a Comment You must be</b>.',
		'id' => 'mbli',
		'std' => 'For Posting a Comment You must be',
		'type' => 'text');	
		
	$options[] = array(
		'name' => 'Logged In',
		'desc' => 'Change the Text <b>Logged In</b>.',
		'id' => 'loggedin',
		'std' => 'Logged In',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'logged In as',
		'desc' => 'Change the Text <b>logged In as</b>.',
		'id' => 'lias',
		'std' => 'Logged In as',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Log out of this account',
		'desc' => 'Change the Text <b>Log out of this account</b>.',
		'id' => 'lota',
		'std' => 'Log out of this account',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Log out?',
		'desc' => 'Change the Text <b>Log out?</b>.',
		'id' => 'loout',
		'std' => 'Log out?',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Name:',
		'desc' => 'Change the Text <b>Name:</b>.',
		'id' => 'comntname',
		'std' => 'Name:',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'E-Mail:',
		'desc' => 'Change the Text <b>E-Mail:</b>.',
		'id' => 'comntemail',
		'std' => 'E-Mail:',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Website:',
		'desc' => 'Change the Text <b>Website:</b>.',
		'id' => 'comntweb',
		'std' => 'Website:',
		'type' => 'text',
		'class' => 'mini');	

	$options[] = array(
		'name' => 'This post is password protected. Enter the password to view comments.',
		'desc' => 'Change the Text <b>This post is password protected. Enter the password to view comments</b>.',
		'id' => 'ppp1',
		'std' => 'This post is password protected. Enter the password to view comments.',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Previous',
		'desc' => 'Change the Text <b>Previous</b>.',
		'id' => 'pi3',
		'std' => 'Previous',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Next',
		'desc' => 'Change the Text <b>Next</b>.',
		'id' => 'ni3',
		'std' => 'Next',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Newer',
		'desc' => 'Change the Text <b>Newer</b>.',
		'id' => 'pe3',
		'std' => 'Newer',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Older',
		'desc' => 'Change the Text <b>Older</b>.',
		'id' => 'ne3',
		'std' => 'Older',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Main Menu',
		'desc' => 'Change the Text <b>Main Menu</b>.',
		'id' => 'mobile-menu-name',
		'std' => 'Main Menu',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'SEARCH RESULTS',
		'desc' => 'Change the Text <b>SEARCH RESULTS</b>.',
		'id' => 'srslt',
		'std' => 'SEARCH RESULTS',
		'type' => 'text',
		'class' => 'mini');	

	
	$options[] = array(
		'name' => 'Search Term',
		'desc' => 'Change the Text <b>Search Term</b>.',
		'id' => 'strm',
		'std' => 'Search Term',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Number of Results',
		'desc' => 'Change the Text <b>Number of Results</b>.',
		'id' => 'nosrc',
		'std' => 'Number of Results',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'SORRY, NOT FOUND ANYTHING',
		'desc' => 'Change the Text <b>SORRY, NOT FOUND ANYTHING</b>.',
		'id' => 'swcf',
		'std' => 'SORRY, NOT FOUND ANYTHING',
		'type' => 'text');	
		
	$options[] = array(
		'name' => 'You Can Try Another Search...',
		'desc' => 'Change the Text <b>You Can Try Another Search...</b>.',
		'id' => 'yctas',
		'std' => 'You Can Try Another Search...',
		'type' => 'text');	

	$options[] = array(
		'name' => 'Or Return to the Home Page',
		'desc' => 'Change the Text <b>Or Return to the Home Page</b>.',
		'id' => 'orhp',
		'std' => 'Or Return to the Home Page',
		'type' => 'text');	
		
	$options[] = array(
		'name' => 'User LogIn',
		'desc' => 'Change the Text <b>User LogIn</b>.',
		'id' => 'ul3',
		'std' => 'User LogIn',
		'type' => 'text',
		'class' => 'mini');	

	
	$options[] = array(
		'name' => 'Username',
		'desc' => 'Change the Text <b>Username</b>.',
		'id' => 'username',
		'std' => 'Username',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Password',
		'desc' => 'Change the Text <b>Password</b>.',
		'id' => 'password',
		'std' => 'Password',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Remember Me',
		'desc' => 'Change the Text <b>Remember Me</b>.',
		'id' => 'rememberme',
		'std' => 'Remember Me',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Log In',
		'desc' => 'Change the Text <b>Log In</b>.',
		'id' => 'log-in',
		'std' => 'Log In',
		'type' => 'text',
		'class' => 'mini');	
	

	$options[] = array(
		'name' => 'Create an Account',
		'desc' => 'Change the Text <b>Create an Account</b>.',
		'id' => 'caa3',
		'std' => 'Create an Account',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Forget Password',
		'desc' => 'Change the Text <b>Forget Password?</b>.',
		'id' => 'fp3',
		'std' => 'Forget Password?',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Welcome',
		'desc' => 'Change the Text <b>Welcome</b>.',
		'id' => 'welcome',
		'std' => 'Welcome',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Go to My Profile',
		'desc' => 'Change the Text <b>Go to My Profile</b>.',
		'id' => 'gtmp3',
		'std' => 'Go to My Profile',
		'type' => 'text',
		'class' => 'mini');	
		
	$options[] = array(
		'name' => 'Logout',
		'desc' => 'Change the Text <b>Logout</b>.',
		'id' => 'logout',
		'std' => 'Logout',
		'type' => 'text',
		'class' => 'mini');	


	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>


<?php
}
