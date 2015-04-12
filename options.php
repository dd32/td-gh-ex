<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'fmi_options';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'fmi'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'fmi' ),
		'two' => __( 'Two', 'fmi' ),
		'three' => __( 'Three', 'fmi' ),
		'four' => __( 'Four', 'fmi' ),
		'five' => __( 'Five', 'fmi' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'fmi' ),
		'two' => __( 'Pancake', 'fmi' ),
		'three' => __( 'Omelette', 'fmi' ),
		'four' => __( 'Crepe', 'fmi' ),
		'five' => __( 'Waffle', 'fmi' )
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
		'name' => __( 'General Settings', 'fmi' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Favicon', 'fmi' ),
		'desc' => __( 'Upload a favicon to your website, this needs to be 16 pixels by 16 pixels.', 'fmi' ),
		'id' => 'vs-favicon',
		'type' => 'upload'
	);
	$options[] = array(
		'name' => __( 'Header Search', 'fmi' ),
		'desc' => __( 'Select this to show the search in the header.', 'fmi' ),
		'id' => 'vs-header-search',
		'std' => '1',
		'type' => 'checkbox'
	);
	
	$options[] = array(
		'name' => __( 'Design', 'fmi' ),
		'type' => 'heading'
	);


	$options[] = array(
		'name' 		=> __( 'Default layout', 'fmi' ),
		'desc' 		=> __( 'Select default layout. This layout will be reflected in whole site archives, search etc. The layout for a single post and page can be controlled from below options.', 'fmi' ),
		'id' 			=> 'fmi_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> get_template_directory_uri() . '/images/right-sidebar.png',
								'left_sidebar' 		=> get_template_directory_uri() . '/images/left-sidebar.png',
								'no_sidebar_full_width'				=> get_template_directory_uri() . '/images/no-sidebar-full-width-layout.png',
							)
	);

	$options[] = array(
		'name' 		=> __( 'Default layout for pages only', 'fmi' ),
		'desc' 		=> __( 'Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page.', 'fmi' ),
		'id' 			=> 'fmi_pages_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> get_template_directory_uri() . '/images/right-sidebar.png',
								'left_sidebar' 		=> get_template_directory_uri() . '/images/left-sidebar.png',
								'no_sidebar_full_width'				=> get_template_directory_uri() . '/images/no-sidebar-full-width-layout.png',
							)
	);

	$options[] = array(
		'name' 		=> __( 'Default layout for single posts only', 'fmi' ),
		'desc' 		=> __( 'Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post.', 'fmi' ),
		'id' 			=> 'fmi_single_posts_default_layout',
		'std' 		=> 'right_sidebar',
		'type' 		=> 'images',
		'options' 	=> array(
								'right_sidebar' 	=> get_template_directory_uri() . '/images/right-sidebar.png',
								'left_sidebar' 		=> get_template_directory_uri() . '/images/left-sidebar.png',
								'no_sidebar_full_width'				=> get_template_directory_uri() . '/images/no-sidebar-full-width-layout.png',
							)
	);
	
	$options[] = array(
		'name' => __( 'Social Links', 'fmi' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( 'Email Address', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-email',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Skype', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-skype',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Facebook', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-facebook',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Twitter', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-twitter',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Google Plus', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-google-plus',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'YouTube', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-youtube',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Instagram', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-instagram',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Pinterest', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-pinterest',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'LinkedIn', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-linkedin',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Tumblr', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-tumblr',
		'std' => '',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Flickr', 'fmi' ),
		'desc' => '',
		'id' => 'vs-social-flickr',
		'std' => '',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Website Text', 'fmi' ),
		'type' => 'heading'
	);
	$options[] = array(
		'name' => __( '404 Error Page Heading', 'fmi' ),
		'desc' => __( 'Enter the heading for the 404 Error page.', 'fmi' ),
		'id' => 'vs-website-error-head',
		'std' => 'Oops! That page can\'t be found.',
		'type' => 'text'
	);
	$options[] = array(
		'name' => __( 'Error 404 Message', 'fmi' ),
		'desc' => __( 'Enter the default text on the 404 error page (Page not found).', 'fmi' ),
		'id' => 'vs-website-error-msg',
		'std' => 'The page you are looking for can\'t be found. Please select one of the options below.',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __( 'No Search Results', 'fmi' ),
		'desc' => __( 'Enter the default text for when no search results are found.', 'fmi' ),
		'id' => 'vs-website-nosearch-msg',
		'std' => 'Sorry, but nothing matched your search terms. Please try again with some different keywords or return to home.',
		'type' => 'textarea'
	);
	
	/*************************************************************************/

	$options[] = array(
		'name' => __( 'Slider', 'fmi' ),
		'type' => 'heading'
	);

	// Slider activate option
	$options[] = array(
		'name' 		=> __( 'Activate slider', 'fmi' ),
		'desc' 		=> __( 'Check to activate slider.', 'fmi' ),
		'id' 			=> 'fmi_activate_slider',
		'std' 		=> '0',
		'type' 		=> 'checkbox'
	);

	// Slide options
	for( $i=1; $i<=4; $i++) {
		$options[] = array(
			'name' 	=>	sprintf( __( 'Image Upload #%1$s', 'fmi' ), $i ),
			'desc' 	=> __( 'Upload slider image.', 'fmi' ),
			'id' 		=> 'fmi_slider_image'.$i,
			'type' 	=> 'upload'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter title for your slider.', 'fmi' ),
			'id' 		=> 'fmi_slider_title'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter your slider description.', 'fmi' ),
			'id' 		=> 'fmi_slider_text'.$i,
			'std' 	=> '',
			'type' 	=> 'textarea'
		);
		$options[] = array(
			'desc' 	=> __( 'Enter link to redirect slider when clicked', 'fmi' ),
			'id' 		=> 'fmi_slider_link'.$i,
			'std' 	=> '',
			'type' 	=> 'text'
		);
	}

	return $options;
}

add_action( 'optionsframework_after','fmi_options_display_sidebar' );
/**
 * admin sidebar
 */
function fmi_options_display_sidebar() { ?>
	<div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="postbox">
	    		<h3><?php esc_attr_e( 'About Fmi', 'fmi' ); ?></h3>
      			<div class="inside">
					<div class="option-btn"><a class="btn demo" target="_blank" href="<?php echo esc_url( 'http://forrss.com/demo/fmi/' ); ?>"><?php esc_attr_e( 'View Demo' , 'fmi' ); ?></a></div>

	      			<div align="center" style="padding:5px; background-color:#fafafa;border: 1px solid #CCC;margin-bottom: 10px;">
	      				<strong><?php esc_attr_e( 'If you like our work. Buy us a beer.', 'fmi' ); ?></strong>
	      				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="EZZUACHETUBXW">
							<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
						</form>
					</div>
      			</div>
	    	</div>
	  	</div>
	</div>
<?php
}


?>