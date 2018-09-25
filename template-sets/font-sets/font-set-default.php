<?php
/**
 * Default font set.
 *
 * @package BA Tours
 */


$data = array(
	'meta' => array(
		// Font set meta data.
		'name' => __( 'Default font set', 'ba-tours-light' ),
		'desc' => __( 'Default font set.', 'ba-tours-light' ),
	),
	'font_title_1' => array(
		'name' => __( 'Titles H1', 'ba-tours-light' ),
		'values' => array(
			'google'      => true,
			'font-family' => 'Open Sans',
			'font-style'  => '',
			'font-weight' => '600',
		),
		'selectors' => array(
			'h1',
		),
	),
    'font_title_2' => array(
		'name' => __( 'Titles H2', 'ba-tours-light' ),
		'values' => array(
			'google'      => true,
			'font-family' => 'Open Sans',
			'font-style'  => '',
			'font-weight' => '400',
		),
		'selectors' => array(
			'h2',
		),
	),
    'font_title_3' => array(
		'name' => __( 'Titles H3', 'ba-tours-light' ),
		'values' => array(
			'google'      => true,
			'font-family' => 'Open Sans',
			'font-style'  => '',
			'font-weight' => '600',
		),
		'selectors' => array(
			'h3',
		),
	),
    'font_title_4' => array(
		'name' => __( 'Titles H4', 'ba-tours-light' ),
		'values' => array(
			'google'      => true,
			'font-family' => 'Open Sans',
			'font-style'  => '',
			'font-weight' => '400',
		),
		'selectors' => array(
			'h4',
		),
	),
    'font_title_5' => array(
		'name' => __( 'Titles H5', 'ba-tours-light' ),
		'values' => array(
			'google'      => true,
			'font-family' => 'Open Sans',
			'font-style'  => '',
			'font-weight' => '400',
		),
		'selectors' => array(
			'h5',
		),
	),
    'font_title_6' => array(
		'name' => __( 'Titles H6', 'ba-tours-light' ),
		'values' => array(
			'google'      => true,
			'font-family' => 'Open Sans',
			'font-style'  => '',
			'font-weight' => '400',
		),
		'selectors' => array(
			'h6',
		),
	),
	'font_text_1' => array(
		'name' => __( 'Buttons and menus', 'ba-tours-light' ),
		'values' => array(
			'google'      => true,
			'font-family' => 'Open Sans',
			'font-style'  => '',
			'font-weight' => '400',
		),
		'selectors' => array(
			'button',
            '.btn',
            '.button',
			'.nav-menu li',
			'.nav-menu li a',
            'input[type=button]',
			'input[type=reset]',
			'input[type=submit]',
		),
	),
	'font_text_2' => array(
		'name' => __( 'Text', 'ba-tours-light' ),
		'values' => array(
			'google'      => true,
			'font-family' => 'Open Sans',
			'font-style'  => '',
			'font-weight' => '400',
		),
		'selectors' => array(
			'*',
			'p',
			'div',
			'span',
			'ul',
			'ol',
			'a',
		),
	),
);


do_action( 'bathemos_collect_data', $data, 'font-set' );