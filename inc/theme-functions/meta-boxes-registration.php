<?php
add_filter( 'rwmb_meta_boxes', 'absolutte_meta_boxes' );

function absolutte_meta_boxes( $meta_boxes ) {

    $prefix = 'absolutte_';

    $meta_boxes[] = array(
		'title' => esc_html__( 'Page Options', 'absolutte' ),
        'post_types' => 'page',
		'fields' => array(
			array(
				'name'    => esc_html__( 'Show Title', 'absolutte' ),
				'id'      => "{$prefix}show_title",
				'type'    => 'select',
				'std'     => 'yes',
				'options' => array(
					'yes' => 'Yes',
					'no' => 'No',
					)
			),
			array(
				'name'    => esc_html__( 'Header Margin', 'absolutte' ),
				'id'      => "{$prefix}header_margin",
				'type'    => 'number',
				'std'     => '30',
				'placeholder'     => '30',
			),
			array(
				'name'    => esc_html__( 'Header Position', 'absolutte' ),
				'id'      => "{$prefix}header_position",
				'type'    => 'select',
				'std'     => 'normal',
				'desc' => esc_attr__( 'If "absolute" is selected the header stays above the content, like position: absolute;.', 'absolutte' ),
				'options' => array(
					'normal' => 'Normal',
					'absolutte' => 'Absolutte',
					)
			),
			array(
				'name'          => esc_html__( 'Header Background Color', 'absolutte' ),
				'id'            => "{$prefix}header_bck_color",
				'type'          => 'color',
				'alpha_channel' => true,
			),
			array(
				'name'          => esc_html__( 'Header Logo Color', 'absolutte' ),
				'id'            => "{$prefix}header_logo_color",
				'type'          => 'color',
				'alpha_channel' => false,
			),
			array(
				'name'          => esc_html__( 'Header Text Color', 'absolutte' ),
				'id'            => "{$prefix}header_text_color",
				'type'          => 'color',
				'alpha_channel' => false,
			),
			array(
				'name'          => esc_html__( 'Header Hover Color', 'absolutte' ),
				'id'            => "{$prefix}header_hover_color",
				'type'          => 'color',
				'alpha_channel' => false,
			),
			array(
				'name'          => esc_html__( 'Header Menu Mobile Background', 'absolutte' ),
				'desc' => esc_attr__( 'This is the background color of the open menu on mobile.', 'absolutte' ),
				'id'            => "{$prefix}header_mobile_menu_bck_color",
				'type'          => 'color',
				'alpha_channel' => true,
			),
			array(
				'name'    => esc_html__( 'Select Logo', 'absolutte' ),
				'desc' => esc_attr__( 'Select if you want the contrast logo on this page.', 'absolutte' ),
				'id'      => "{$prefix}logo_type",
				'type'    => 'select',
				'std'     => 'default',
				'options' => array(
					'default' => 'Default',
					'contrast' => 'Contrast',
					)
			),
		),
	);

	$meta_boxes[] = array(
		'title' => esc_html__( 'Testimonial Options', 'absolutte' ),
        'post_types' => 'jetpack-testimonial',
		'fields' => array(
			array(
				'name'    => esc_html__( 'Position:', 'absolutte' ),
				'desc' => esc_attr__( 'Job Position or Company, example: CEO.', 'absolutte' ),
				'id'      => "{$prefix}job_position",
				'type'    => 'text',
				'std'     => '',
			),
		),
	);


    return $meta_boxes;
}
