<?php if( ! defined( 'ABSPATH' ) ) exit;

			
/**
 * Read More Button
 */
Kirki::add_section( 'baw_read_more', array(
    'title'          => __( 'Read More Button Options', 'baw' ),
    'priority'       => 94,
    'capability'     => 'edit_theme_options',
) ); 

Kirki::add_field( 'bawoptions', array(
	'type'        => 'switch',
	'settings'    => 'baw_read_more_activate',
	'label'       => __( 'Activate Read More Button', 'baw' ),
	'section'     => 'baw_read_more',
	'default'  => true,	
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
) );

Kirki::add_field( 'bawoptions', array(
	'type'     => 'text',
	'settings' => 'baw_read_more_setting',
	'label'    => __( 'Read More Button Text', 'baw' ),
	'section'  => 'baw_read_more',
	'priority' => 10,
) );

Kirki::add_field( 'bawoptions', array(
	'type'        => 'number',
	'settings'    => 'baw_read_more_length',
	'label'       => esc_html__( 'Read More Button Length', 'baw' ),
	'section'     => 'baw_read_more',
	'choices'     => array(
		'min'  => 0,
		'max'  => 1000,
		'step' => 1,
	),
) );
		
Kirki::add_field( 'bawoptions', array(
	'type'        => 'color',
	'settings'    => 'baw_read_more_color',
	'label'       => __( 'Read More Button Color', 'baw' ),
	'section'     => 'baw_read_more',
	'default'     => '',
) );
			
Kirki::add_field( 'bawoptions', array(
	'type'        => 'color',
	'settings'    => 'baw_read_more_hover_color',
	'label'       => __( 'Read More Button Hover Color', 'baw' ),
	'section'     => 'baw_read_more',
) );
	

/**
 * Excerpt
 */
	function baw_excerpt_more( $more ) {
		if (get_theme_mod('baw_read_more_activate', true)) {
			return '<p class="link-more"><a class="myButt three" href="'. get_permalink( get_the_ID() ) . '">' . baw_return_read_more_text (). '</a></p>';
		}
	}
	add_filter( 'excerpt_more', 'baw_excerpt_more' );	
	
	function customize_custom_excerpt_length( $length ) {
		if (get_theme_mod('baw_read_more_length')) {
			return get_theme_mod('baw_read_more_length');
		}
		else return 42;
	}
	
	add_filter( 'excerpt_length', 'customize_custom_excerpt_length', 999 );
	
	function baw_return_read_more_text () {
		if (get_theme_mod('baw_read_more_setting')) {	 
			return get_theme_mod('baw_read_more_setting');
		} 
		return "Read More";
	}	
	
/**
 * Read More Styles
 */
function bawread_more_method() {

        $read_more_color_mod = get_theme_mod( 'baw_read_more_color' );
        $read_more_hover_color_mod = get_theme_mod( 'baw_read_more_hover_color' );
		

		if($read_more_color_mod) { $read_more_color = ".read-more, .read-slide, .link-more a {color: {$read_more_color_mod};}";} else {$read_more_color ="";}
		if($read_more_hover_color_mod) { $read_more_hover_color = ".read-more, .read-slide:hover, .link-more a:hover {color: {$read_more_hover_color_mod};}";} else {$read_more_hover_color ="";}

        wp_add_inline_style( 'black-and-white-style', $read_more_color.$read_more_hover_color);
}
add_action( 'wp_enqueue_scripts', 'bawread_more_method' );	