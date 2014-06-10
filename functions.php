<?php 



/* TGM */
require get_template_directory() . '/admin/admin-init.php';




function newsmag_setup() {

	if ( ! isset( $content_width ) )
	$content_width = 663;
	
	load_theme_textdomain( 'newsmag', get_template_directory() . '/lang' );
	
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );	

	add_theme_support('custom-background');

	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'post-formats', array(
		'audio', 'gallery', 'image', 'video'
	) );


	register_nav_menus(array(
		'top-menu' => __( 'Top Menu', 'newsmag' ),
		'footer-menu' => __( 'Footer Menu', 'newsmag' ),
		));
	
}
add_action( 'after_setup_theme', 'newsmag_setup' );






function newsmag_scripts_styles() {
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );	
	
	wp_enqueue_script('GoogleMaps','https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false',array('jquery'),'',true);	

	wp_enqueue_script('modernizr',get_template_directory_uri().'/js/modernizr.js',array('jquery'),'',false);

	wp_enqueue_script('smoothscroll',get_template_directory_uri().'/js/smoothscroll.js',array('jquery'),'',true);

	wp_enqueue_script('slickslider',get_template_directory_uri().'/js/slick.js',array('jquery'),'',true);

	wp_enqueue_script('fitvid',get_template_directory_uri().'/js/jquery.fitvids.js',array('jquery'),'',true);	

	wp_enqueue_script('newsmag-custom',get_template_directory_uri().'/js/newsmag-custom.js',array('jquery'),'',true);


	wp_enqueue_style( 'newsmag-style', get_stylesheet_uri(), array(), '' );
	
}
add_action( 'wp_enqueue_scripts', 'newsmag_scripts_styles' );


function load_google_fonts() {

			wp_register_style('googleFontsRoboto','//fonts.googleapis.com/css?family=Roboto+Slab');
            wp_enqueue_style( 'googleFontsRoboto'); 

            wp_register_style('googleFontsPT','//fonts.googleapis.com/css?family=PT+Sans');
            wp_enqueue_style( 'googleFontsPT');

            wp_register_style('googleFontsOpen','//fonts.googleapis.com/css?family=Open+Sans');
            wp_enqueue_style( 'googleFontsOpen');


}
add_action('wp_print_styles', 'load_google_fonts');




function newsmag_title($title){

	$name=get_bloginfo('title');

	$desc=get_bloginfo('description');

	$title.=$name.' | '.$desc;

	return $title;

}

add_filter('wp_title','newsmag_title');





function header_fallback(){ ?>

	<nav class="primary-navigation col-sm-12">
		<ul class="nav navbar-nav">
			<?php wp_list_pages(
				array(

					'title_li' => '',
					'depth' => 3

			)); ?>
		</ul>
	</nav>

<?php }



function footer_fallback(){ ?>

	<div class="footer-menu">
		<ul>
			<?php wp_list_pages(array(
				'title_li' => '',
				'depth' => 1,
			)); ?>
		</ul>
	</div>

<?php }



function newsmag_excerpt_length() {
	return 40;
}
add_filter( 'excerpt_length', 'newsmag_excerpt_length');



function newsmag_excerpt_more() {
	return ' .....';
}
add_filter('excerpt_more', 'newsmag_excerpt_more');






function newsmag_widgets(){

		

	register_sidebar(array(
		'id'          => 'sidebar',
	    'name'        => __( 'Right Sidebar', 'newsmag' ),
	    'description' => __( 'This widget is located right side as sidebar.', 'newsmag' ),
	    'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		));


	register_sidebar(array(
		'id'          => 'footer-1',
	    'name'        => __( 'Footer 1', 'newsmag' ),
	    'description' => __( 'This widget is located footer.', 'newsmag' ),
	    'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		));


	register_sidebar(array(
		'id'          => 'footer-2',
	    'name'        => __( 'Footer 2', 'newsmag' ),
	    'description' => __( 'This widget is located footer.', 'newsmag' ),
	    'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		));


	register_sidebar(array(
		'id'          => 'footer-3',
	    'name'        => __( 'Footer 3', 'newsmag' ),
	    'description' => __( 'This widget is located footer.', 'newsmag' ),
	    'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		));


	register_sidebar(array(
		'id'          => 'footer-4',
	    'name'        => __( 'Footer 4', 'newsmag' ),
	    'description' => __( 'This widget is located footer.', 'newsmag' ),
	    'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		));


}

add_action('widgets_init','newsmag_widgets');







function newsmag_custom_comment_form($defaults) {
	
	
	$defaults['comment_notes_before'] = '';	
	$defaults['id_form'] = 'comment-form';
	$defaults['comment_field'] = '<p><textarea name="comment" id="comment" class="form-control" rows="6"></textarea></p>';

	return $defaults;
}

add_filter('comment_form_defaults', 'newsmag_custom_comment_form');

function newsmag_custom_comment_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');
	
	$fields = array(
		'author' => '<p>' . 
						'<input id="author" name="author" type="text" class="form-control" placeholder="Name ( required )" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ' />' .
						
		            '</p>',
		'email' => '<p>' . 
						'<input id="email" name="email" type="text" class="form-control" placeholder="Email ( required )" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' />'  .
		            '</p>',
		'url' => '<p>' . 
						'<input id="url" name="url" type="text" class="form-control" placeholder="Website" value="' . esc_attr($commenter['comment_author_url']) . '" />'  .
		            '</p>'
	);

	return $fields;
}

add_filter('comment_form_default_fields', 'newsmag_custom_comment_fields');






/************************************************************************
// Shortcodes
*************************************************************************/
function one_column($attr, $content){

	echo '<p class="col-sm-3 row">'.$content.'</p>';	

}

add_shortcode('one','one_column');


function two_column($attr, $content){

	echo '<p class="col-sm-6 row">'.$content.'</p>';

}

add_shortcode('two','two_column');



function three_column($attr, $content){

	echo '<p class="col-sm-9 row padding-left">'.$content.'</p>';

}

add_shortcode('three','three_column');



function four_column($attr, $content){

	echo '<p class="col-sm-12 row">'.$content.'</p>';

}

add_shortcode('four','four_column');








function button_short($attr,$content){


	extract(shortcode_atts(array(
		'href' => ''
		),$attr));


	return '<a href="'.esc_url($href).'" class="btn-short" target="_blank" rel="nofollow">'.$content.'</a>';


}

add_shortcode('button','button_short');



function newsmag_widget_init() {

	require_once get_template_directory() . '/admin/widgets.php';
	register_widget( 'Newsmag_Flickr_Widget' );	
	register_widget( 'Newsmag_PopularPosts_Widget' );	

}

add_action( 'widgets_init', 'newsmag_widget_init' );




define( 'ACF_LITE' , true );



if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_5392cbb2d4d33',
	'title' => 'Audio',
	'fields' => array (
		array (
			'key' => 'field_5392ceda5d9a3',
			'label' => 'Audio',
			'name' => 'audio',
			'prefix' => '',
			'type' => 'oembed',
			'instructions' => 'This field supports Mixcloud, Rdio, SoundCloud and Spotify',
			'required' => 0,
			'conditional_logic' => 0,
			'width' => 663,
			'height' => 200,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'audio',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_539304283b4c0',
	'title' => 'Contact Form',
	'fields' => array (
		array (
			'key' => 'field_5393042f04a5c',
			'label' => 'Google Maps',
			'name' => 'google_maps',
			'prefix' => '',
			'type' => 'google_map',
			'instructions' => 'You can add to contact page where you are',
			'required' => 0,
			'conditional_logic' => 0,
			'center_lat' => '',
			'center_lng' => '',
			'zoom' => '',
			'height' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-contact.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_5392d9fddeac9',
	'title' => 'Gallery',
	'fields' => array (
		array (
			'key' => 'field_5392da04153cc',
			'label' => 'Gallery',
			'name' => 'gallery',
			'prefix' => '',
			'type' => 'gallery',
			'instructions' => 'You can create image gallery. If you type something in caption, it will appear below the per images.',
			'required' => 0,
			'conditional_logic' => 0,
			'min' => '',
			'max' => '',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'gallery',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_5393413e7fd7c',
	'title' => 'Homepage Builder',
	'fields' => array (
		array (
			'key' => 'field_53934169df8a6',
			'label' => 'Home Page Builder',
			'name' => 'home_page_builder',
			'prefix' => '',
			'type' => 'repeater',
			'instructions' => 'Click the Add Block button to add a new block to homepage. Click the minus sign of the	block to delete. You can also drag and drop the blocks',
			'required' => 0,
			'conditional_logic' => 0,
			'min' => '',
			'max' => '',
			'layout' => 'row',
			'button_label' => 'Add Block',
			'sub_fields' => array (
				array (
					'key' => 'field_539341c14a973',
					'label' => 'Title',
					'name' => 'title',
					'prefix' => '',
					'type' => 'text',
					'instructions' => 'Set the title of the content block.	If you leave this empty, it will appear \'Category\' ( No need the title Slider and Single Post Banner )',
					'required' => 0,
					'conditional_logic' => 0,
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'formatting' => 'html',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_539341d44a974',
					'label' => 'Filter by Categories',
					'name' => 'filter_by_categories',
					'prefix' => '',
					'type' => 'taxonomy',
					'instructions' => 'Filter posts by a category.',
					'required' => 1,
					'conditional_logic' => 0,
					'column_width' => '',
					'taxonomy' => 'category',
					'field_type' => 'select',
					'allow_null' => 0,
					'load_save_terms' => 0,
					'return_format' => 'id',
					'multiple' => 0,
				),
				array (
					'key' => 'field_539341f34a975',
					'label' => 'Style',
					'name' => 'style',
					'prefix' => '',
					'type' => 'select',
					'instructions' => 'Select a style',
					'required' => 1,
					'conditional_logic' => 0,
					'column_width' => '',
					'choices' => array (
						'thumbnails_one' => 'Small Thumbnail',
						'one_column' => 'One Column',
						'two_columns' => 'Two Columns',
						'post_banner' => 'Single Post Banner',
						'slick_slider' => 'Slider',
					),
					'default_value' => 'Select',
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'disabled' => 0,
					'readonly' => 0,
				),
				array (
					'key' => 'field_5393423e4a976',
					'label' => 'Posts to show',
					'name' => 'posts_to_show',
					'prefix' => '',
					'type' => 'number',
					'instructions' => 'Set the maximum number of posts to show',
					'required' => 1,
					'conditional_logic' => 0,
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'min' => 1,
					'max' => 20,
					'step' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'template-homepage.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_5392d34cd151a',
	'title' => 'Image',
	'fields' => array (
		array (
			'key' => 'field_5392d35c5cdcc',
			'label' => 'Image',
			'name' => 'image',
			'prefix' => '',
			'type' => 'image',
			'instructions' => 'You can upload a single image. ',
			'required' => 0,
			'conditional_logic' => 0,
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'image',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_53932669a2e5a',
	'title' => 'Slider Image',
	'fields' => array (
		array (
			'key' => 'field_539326750f3d8',
			'label' => 'Slider',
			'name' => 'slider_one_check',
			'prefix' => '',
			'type' => 'true_false',
			'instructions' => 'Enable Slide for this post ?',
			'required' => 0,
			'conditional_logic' => 0,
			'message' => '',
			'default_value' => 0,
		),
		array (
			'key' => 'field_539326cd0f3d9',
			'label' => '',
			'name' => 'slider_one_image',
			'prefix' => '',
			'type' => 'image',
			'instructions' => 'Add image for this post',
			'required' => 0,
			'conditional_logic' => 0,
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

register_field_group(array (
	'key' => 'group_5392e10a8ef57',
	'title' => 'Video',
	'fields' => array (
		array (
			'key' => 'field_5392e12a85615',
			'label' => 'Video',
			'name' => 'video',
			'prefix' => '',
			'type' => 'oembed',
			'instructions' => 'You can enter video url. ',
			'required' => 0,
			'conditional_logic' => 0,
			'width' => '',
			'height' => 450,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'video',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;










function options(){ 

	global $newsmag;		

		echo '<link rel="shortcut icon" href="'.$newsmag['favicon']['url'].'">';		

 ?> <style>

	<?php echo $newsmag['opt-ace-editor-css']; ?>

 </style> <?php 

	

}

add_action('wp_head','options');