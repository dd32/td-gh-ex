<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'atomic';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'atomic' ),
		'two' => __( 'Two', 'atomic' ),
		'three' => __( 'Three', 'atomic' ),
		'four' => __( 'Four', 'atomic' ),
		'five' => __( 'Five', 'atomic' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'atomic' ),
		'two' => __( 'Pancake', 'atomic' ),
		'three' => __( 'Omelette', 'atomic' ),
		'four' => __( 'Crepe', 'atomic' ),
		'five' => __( 'Waffle', 'atomic' )
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
		'sizes' => array( '6','12','14','16','20','22','24','26','28','30','32','34','36','38','40','42','44','46','48','50' ),
		'faces' => array( 'Helvetica' => 'Helvetica','Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial','proxima-nova' => 'proxima-nova' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => array( '#FFFFFF' )
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
		'name' => __( 'Header and Footer', 'atomic' ),
		'type' => 'heading'
	);
	
	$options['header_topleft_text'] = array(
		'name' => __( 'Header Top-Left Corner Text (Site-wide)', 'atomic' ),
		'desc' => __( 'Text (clear to disable)', 'atomic' ),
		'id' => 'header_topleft_text',
		'std' => 'MySite',
		'type' => 'text'
	);
	
	$options['header_top_text'] = array(
		'name' => __( 'Header Text (Front Page', 'atomic' ),
		'desc' => __( 'First Line (clear to disable)', 'atomic' ),
		'id' => 'header_top_text',
		'std' => 'A top row of text',
		'type' => 'text'
	);
	
	$options['header_bottom_text'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Second Line (clear to disable)', 'atomic' ),
		'id' => 'header_bottom_text',
		'std' => 'A second row of text',
		'type' => 'text'
	);
	
	$options['header_linkone_text'] = array(
		'name' => __( 'First Header Link (Front Page)', 'atomic' ),
		'desc' => __( 'Link Text (clear to disable)', 'atomic' ),
		'id' => 'header_linkone_text',
		'std' => 'A Link',
		'type' => 'text'
	);
	
	$options['header_linkone_address'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Link Address', 'atomic' ),
		'id' => 'header_linkone_address',
		'std' => '#',
		'type' => 'text'
	);
	
	$options['header_linktwo_text'] = array(
		'name' => __( 'Second Header Link (Front Page)', 'atomic' ),
		'desc' => __( 'Link Text (clear to disable)', 'atomic' ),
		'id' => 'header_linktwo_text',
		'std' => 'Another Link',
		'type' => 'text'
	);
	
	$options['header_linktwo_address'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Link Address', 'atomic' ),
		'id' => 'header_linktwo_address',
		'std' => '#',
		'type' => 'text'
	);
	
	$options['headertypography'] = array(
		'name' => __( 'Custom Post Title and Date Typography', 'atomic' ),
		'desc' => __( 'Enable custom typography of post title and date that appears in the header when viewing a single post.', 'atomic' ),
		'id' => 'headertypography',
		'std' => '1',
		'type' => 'checkbox'
	);
	
	$typography_copyright_defaults = array(
		'size' => '12px',
		'face' => 'Helvetica',
		'style' => 'normal',
		'color' => '#FFFFFF' );

	$typography_post_date_defaults = array(
		'size' => '32px',
		'face' => 'Helvetica',
		'style' => 'normal',
		'color' => '#FFFFFF' );

	$typography_post_title_defaults = array(
		'size' => '48px',
		'face' => 'proxima-nova',
		'style' => 'bold',
		'color' => '#FFFFFF' );
		
	$options['header_date_typography'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Typography of Post Date', 'atomic' ),
		'id' => 'header_date_typography',
		'std' => $typography_post_date_defaults,
		'type' => 'typography',
		'options' => $typography_options
	);
	
	$options['header_title_typography'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Typography of Post Title', 'atomic' ),
		'id' => 'header_title_typography',
		'std' => $typography_post_title_defaults,
		'type' => 'typography',
		'options' => $typography_options
	);
	
	$options['copyright'] = array(
		'name' => __( 'Copyright Text', 'atomic' ),
		'desc' => __( 'Enable copyright text in the footer', 'atomic' ),
		'id' => 'copyright',
		'std' => '1',
		'type' => 'checkbox'
	);

	$options['copyright_text'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Copyright Text', 'atomic' ),
		'id' => 'copyright_text',
		'std' => 'Copyright &copy; 2015',
		'type' => 'text'
	);
		
	$options['copyright_typography'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Typography of Copyright Text', 'atomic' ),
		'id' => 'copyright_typography',
		'std' => $typography_copyright_defaults,
		'type' => 'typography'
	);

	return $options;
}