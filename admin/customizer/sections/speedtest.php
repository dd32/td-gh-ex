<?php
/**
 * Define topography settings - Weaver Xtreme Customizer
 */

if ( ! function_exists( 'weaverx_customizer_define_speedtest_sections' ) ) :
/**
 * Define the sections and settings for the Speed Test panel
 * causes execution time out at: wp-includes/class-wp-customize-setting.php near line 522
 *
 */
function weaverx_customizer_define_speedtest_sections( $sections ) {
	$panel = 'weaverx_speedtest';
	$speedtest_sections = array();

	/**
	 * General
	 */
	$speedtest_sections['speedtest-general'] = array(
		'panel'   => $panel,
		'title'   => __( 'speedtest Test', 'weaver-xtreme' ),
		'description' => 'Add a different number of checkboxes to with different names to test the speedtest of the Customizer refresh operation.',
		'options' => array(
			'speedtest-heading-header' => array(
				'control' => array(
					'control_type' => 'WeaverX_Misc_Control',
					'label'   => __( 'speedtest Test Section', 'weaver-xtreme' ),
					'type'  => 'heading',
				),
			),
		),
	);

$max_items = 9;
$transport = 'refresh';

	for ($i = 0 ; $i < $max_items; $i++) {

		$speedtest_sections['speedtest-general']['options']["speedtest{$i}"] =
		array(
		'setting' => array(
			'sanitize_callback' => 'absint',
			'transport' => $transport,
			),
		'control' => array(
			'label' => "speedtest Control #{$i}",
			'type'  => 'checkbox',
			)
		);
	}




	/**
	 * Filter the definitions for the controls in the panel of the Customizer
	 */
	$speedtest_sections = apply_filters( 'weaverx_customizer_speedtest_sections', $speedtest_sections );

	// Merge with master array
	return array_merge( $sections, $speedtest_sections );


}
endif;

add_filter( 'weaverx_customizer_sections', 'weaverx_customizer_define_speedtest_sections' );
