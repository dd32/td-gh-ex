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

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20','22','24','26','28','30','32','34','36','38','40','42','44','46','48','50' ),
		'faces' => array( 'Helvetica' => 'Helvetica','Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial','proxima-nova' => 'proxima-nova' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold','italic' => 'Italic' ),
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
    
    $options[] = array(
        'name' => __( 'Header Notes', 'atomic' ),
		'desc' => __( 'The header image(s) can be changed under Appearance -> Customize -> Header Image. The site title and tagline that appears in the browser title is changed under Appearance -> Customize -> Site Title and Tagline.', 'atomic' ),
		'type' => 'info'
	);
	
	$options['header_title_text'] = array(
		'name' => __( 'Header Title (top-left corner text, site-wide)', 'atomic' ),
		'desc' => __( 'Title Text (leave blank to disable)', 'atomic' ),
		'id' => 'header_title_text',
		'std' => 'MySite',
		'type' => 'text'
	);

        $options['header_title_size'] = array(
		'desc' => __( 'Header Title Size (Default: 2.5em)', 'atomic' ),
		'id' => 'header_title_size',
		'std' => '2.5',
		'class' => 'mini',
		'type' => 'text'
	);
    
    $options['header_description_text'] = array(
		'name' => __( 'Header Description (top-left corner text, site-wide)', 'atomic' ),
		'desc' => __( 'Description Text (leave blank to disable)', 'atomic' ),
		'id' => 'header_description_text',
		'std' => 'MyDescription',
		'type' => 'text'
	);

        $options['header_description_size'] = array(
		'desc' => __( 'Header Description Size (Default: 1.75em)', 'atomic' ),
		'id' => 'header_description_size',
		'std' => '1.75',
		'class' => 'mini',
		'type' => 'text'
	);
	
	$options['header_top_text'] = array(
		'name' => __( 'Header Text (Front Page)', 'atomic' ),
		'desc' => __( 'First Line (leave blank to disable)', 'atomic' ),
		'id' => 'header_top_text',
		'std' => 'A top row of text',
		'type' => 'text'
	);

    $typography_top_text_defaults = array(
		'size' => '24px',
		'face' => 'proxima-nova',
		'style' => 'italic',
		'color' => '#FFFFFF'
	);
		
	$options['header_top_text_typography'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Typography of First Line', 'atomic' ),
		'id' => 'header_top_text_typography',
		'std' => $typography_top_text_defaults,
		'type' => 'typography',
		'options' => $typography_options
	);
	
	$options['header_bottom_text'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Second Line (leave blank to disable)', 'atomic' ),
		'id' => 'header_bottom_text',
		'std' => 'A second row of text',
		'type' => 'text'
	);

    $typography_bottom_text_defaults = array(
		'size' => '32px',
		'face' => 'proxima-nova',
		'style' => 'bold',
		'color' => '#FFFFFF' );
		
	$options['header_bottom_text_typography'] = array(
		'name' => __( '', 'atomic' ),
		'desc' => __( 'Typography of Second Line', 'atomic' ),
		'id' => 'header_bottom_text_typography',
		'std' => $typography_bottom_text_defaults,
		'type' => 'typography',
		'options' => $typography_options
	);
	
	$options['header_linkone_text'] = array(
		'name' => __( 'First Header Link (Front Page)', 'atomic' ),
		'desc' => __( 'Link Text (leave blank to disable)', 'atomic' ),
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
		'desc' => __( 'Link Text (leave blank to disable)', 'atomic' ),
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
		'color' => '#FFFFFF'
		);

	$typography_post_date_defaults = array(
		'size' => '32px',
		'face' => 'Helvetica',
		'style' => 'normal',
		'color' => '#FFFFFF'
		);

	$typography_post_title_defaults = array(
		'size' => '48px',
		'face' => 'proxima-nova',
		'style' => 'bold',
		'color' => '#FFFFFF'
		);
		
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