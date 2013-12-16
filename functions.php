<?php
//Adding colors to customizer
function anjirai_customize_register( $wp_customize ) {

	$colors = array();
	$colors[] = array(
	'slug'=>'header_color', 
	'default' => '#333',
	'label' => __('Main Header Color', 'anjirai'),
);

$colors[] = array(
	'slug'=>'secondary_color', 
	'default' => '#88C34B',
	'label' => __('Secondary Bar Color', 'anjirai')
);

$colors[] = array(
	'slug'=>'search_bar_color', 
	'default' => '#88C34B',
	'label' => __('Search Bar Color', 'anjirai')
);

$colors[] = array(
	'slug'=>'content_text_color', 
	'default' => '#88C34B',
	'label' => __('Content Text Color / p color', 'anjirai')
);

$colors[] = array(
	'slug'=>'title_color', 
	'default' => '#88C34B',
	'label' => __('Title Color', 'anjirai')
);

$colors[] = array(
	'slug'=>'title_hover_color', 
	'default' => '#88C34B',
	'label' => __('Title Hover Color', 'anjirai'),
	);

$colors[] = array(
	'slug'=>'h1_color', 
	'default' => '#88C34B',
	'label' => __('h1,h2,h3,h4,h5,h6 Colors', 'anjirai')
);


$colors[] = array(
	'slug'=>'nav_bg_color', 
	'default' => '#88C34B',
	'label' => __('Primary Navigation BG Color', 'anjirai')
);

$colors[] = array(
	'slug'=>'nav_bg_hover_color', 
	'default' => '#88C34B',
	'label' => __('Primary Navigation BG Hover Color', 'anjirai')
);

$colors[] = array(
	'slug'=>'nav_text_color', 
	'default' => '#88C34B',
	'label' => __('Primary Navigation Text Color', 'anjirai')
);

$colors[] = array(
	'slug'=>'nav_text_hover_color', 
	'default' => '#88C34B',
	'label' => __('Primary Navigation Text Hover Color', 'anjirai')
);

foreach( $colors as $color ) {
	
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option', 
			'capability' => 
			'edit_theme_options'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'colors',
			'settings' => $color['slug'])
		)
	);
}
}
add_action( 'customize_register', 'anjirai_customize_register' );

//Adding color style to header
add_action ('wp_head', 'anjirai_style_header');
function anjirai_style_header () {

	$header_color = get_option('header_color');
	$secondary_color = get_option('secondary_color');
	$search_bar_color = get_option('search_bar_color');
	$h1_color = get_option('h1_color');
	$title_color = get_option('title_color');
	$title_hover_color = get_option('title_hover_color');
	$nav_text_hover_color = get_option('nav_text_hover_color');
	$nav_bg_hover_color = get_option('nav_bg_hover_color');
	$nav_text_color = get_option('nav_text_color');
	$nav_bg_color = get_option('nav_bg_color');
	$content_text_color = get_option ('content_text_color');?>
<style>
	.header-main { background-color:  <?php echo $header_color; ?>; }
	#secondary, .site:before { background-color:  <?php echo $secondary_color; ?>; }
	.search-toggle, .search-toggle:hover,.search-toggle.active,.search-box { background-color:  <?php echo $search_bar_color; ?>; }
	h1,h2,h3,h4,h5,h6 {color: <?php echo $h1_color; ?>; }
	.entry-title a { color: <?php echo $title_color;?>; }
	.entry-title a:hover { color: <?php echo $title_hover_color;?>; }
	.primary-navigation li:hover > a,.primary-navigation li.focus > a,.primary-navigation li:active > a,.primary-navigation ul ul a:hover,
	.primary-navigation ul ul li.focus > a {
		background-color: <?php echo $nav_bg_hover_color;?>;
		color: <?php echo $nav_text_hover_color;?>;	}
	.primary-navigation li a, .primary-navigation ul ul a,.primary-navigation ul ul li a {
		background-color: <?php echo $nav_bg_color;?>;
		color: <?php echo $nav_text_color;?>;	}
	p {color: <?php echo $content_text_color;?>; }
</style>

<?php 	
}