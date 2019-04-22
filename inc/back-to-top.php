<?php if( ! defined( 'ABSPATH' ) ) exit;

function baw_back_to_top_customize_register( $wp_customize ) {
	
/***********************************************************************************
 * Back to top button Options
***********************************************************************************/
 
		$wp_customize->add_section( 'back_to_top' , array(
			'title'       => __( 'Back To Top Button Options', 'baw' ),
			'priority'   => 98,
		) );
		
		$wp_customize->add_setting( 'activate_back_to_top', array (
			'sanitize_callback' => 'baw_sanitize_checkbox',
		) );
		
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_back_to_top', array(
			'label'    => __( 'Activate Back To Top Button', 'baw' ),
			'section'  => 'back_to_top',
			'settings' => 'activate_back_to_top',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'aback_to_top_speed', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'aback_to_top_speed', array(
			'label'    => __( 'Button Speed', 'baw' ),
			'section'  => 'back_to_top',
			'settings' => 'aback_to_top_speed',
			'type' => 'range',
			'input_attrs'     => array(
				'min'  => 10,
				'max'  => 4000,
				'step' => 10,
	),				
		) ) );
	
		$wp_customize->add_setting('back_button_background_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	
		$wp_customize->add_setting('back_top_button_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_top_button_color', array(
		'label' => __('Button Color', 'baw'),        
		'section' => 'back_to_top',
		'settings' => 'back_top_button_color'
		)));
		
		$wp_customize->add_setting('back_top_button_hover_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_top_button_hover_color', array(
		'label' => __('Button Hover Color', 'baw'),        
		'section' => 'back_to_top',
		'settings' => 'back_top_button_hover_color'
		)));
		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_button_background_color', array(
		'label' => __('Button Background Color', 'baw'),        
		'section' => 'back_to_top',
		'settings' => 'back_button_background_color'
		)));	
			
		$wp_customize->add_setting('back_button_background_hover_color', array(         
		'default'     => ' ',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'back_button_background_hover_color', array(
		'label' => __('Button Background Hover Color', 'baw'),        
		'section' => 'back_to_top',
		'settings' => 'back_button_background_hover_color'
		)));
}
add_action( 'customize_register', 'baw_back_to_top_customize_register' );

/********************************************
* Back to top styles
*********************************************/ 	

function baw_back_top_method() {

        $back_top_button_color_mod = get_theme_mod( 'back_top_button_color' );
        $back_top_button_hover_color_mod = get_theme_mod( 'back_top_button_hover_color' );
        $back_button_background_color_mod = get_theme_mod( 'back_button_background_color' );
        $back_button_background_hover_color_mod = get_theme_mod( 'back_button_background_hover_color' );
		
		if($back_top_button_color_mod) { $back_top_button_color = "#totop {color: {$back_top_button_color_mod} !important;}";} else {$back_top_button_color ="";}
		if($back_top_button_hover_color_mod) { $back_top_button_hover_color = "#totop:hover {color: {$back_top_button_hover_color_mod} !important;}";} else {$back_top_button_hover_color ="";}
		if($back_button_background_color_mod) { $back_button_background_color = "#totop {background: {$back_button_background_color_mod} !important;}";} else {$back_button_background_color ="";}
		if($back_button_background_hover_color_mod) { $back_button_background_hover_color = "#totop:hover {background: {$back_button_background_hover_color_mod} !important;}";} else {$back_button_background_hover_color ="";}
		
        wp_add_inline_style( 'black-and-white-style', 
		$back_top_button_color.$back_top_button_hover_color.$back_button_background_color.$back_button_background_hover_color
		);
}
add_action( 'wp_enqueue_scripts', 'baw_back_top_method' );		
		
		

/*********************************************************************************************************
* Back to top
**********************************************************************************************************/			
	
function baw_to_top() {
    echo '<a id="totop" href="#"><span class="dashicons dashicons-arrow-up-alt2"></span></a>';
    }

    add_action( 'wp_head', 'baw_back_to_top_style' );
    function baw_back_to_top_style() {
    echo '<style>
    #totop {
		position: fixed;
		right: 40px;
	    z-index: 9999999;
		bottom: 0;
		display: none;
		outline: none;
		background: #333333;
		width: 55px;
		height: 50px;
		text-align: center;
		color: #FFFFFF;
		padding: 15px;

		-webkit-transition: all 0.1s linear 0s;
		-moz-transition: all 0.1s linear 0s;
		-o-transition: all 0.1s linear 0s;
		transition: all 0.1s linear 0s;
		font-family: \'Tahoma\', sans-serif;
		}
		#totop .dashicons {
			font-size: 24px;		
		}
		#totop:hover {
			opacity: 0.8;	
		}
		
	#totop .dashicons{
		display: block;
	}
    </style>';
    }

    add_action( 'wp_footer', 'baw_to_top_script' );
    function baw_to_top_script() { ?>
    <script type="text/javascript">
		jQuery(document).ready(function($){
			$(window).scroll(function () {
			if ( $(this).scrollTop() > 500 )
				$("#totop").fadeIn();
				else
				$("#totop").fadeOut();
			});

			$("#totop").click(function () {
				$("body,html").animate({ scrollTop: 0 }, <?php if(get_theme_mod('aback_to_top_speed')){echo  get_theme_mod('aback_to_top_speed');} else { echo "800"; } ?> );
				return false;
			});
		});
    </script>
    <?php }		