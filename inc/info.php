<?php
/**
 * Benevolent Theme Info
 *
 * @package Benevolent
 */

function benevolent_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Information Links' , 'benevolent' ),
		'priority'    => 500,
		));

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
   	$theme_info = '';
	$theme_info .= '<h3 class="sticky_title">' . __( 'Need help?', 'benevolent' ) . '</h3>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View demo', 'benevolent' ) . ': </label><a href="' . esc_url( 'http://raratheme.com/previews/?theme=benevolent' ) . '" target="_blank">' . __( 'here', 'benevolent' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View documentation', 'benevolent' ) . ': </label><a href="' . esc_url( 'http://raratheme.com/documentation/benevolent/' ) . '" target="_blank">' . __( 'here', 'benevolent' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support ticket', 'benevolent' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/support-ticket/' ) . '" target="_blnak">' . __( 'here', 'benevolent' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="more-detail row-element">' . __( 'More Details', 'benevolent' ) . ': </label><a href="' . esc_url( 'http://raratheme.com/wordpress-themes/' ) . '" target="_blank">' . __( 'here', 'benevolent' ) . '</a></span><br />';
	

	$wp_customize->add_control( new Theme_Info_Custom_Control( $wp_customize ,'theme_info_theme',array(
		'label' => __( 'About Benevolent' , 'benevolent' ),
		'section' => 'theme_info',
		'description' => $theme_info
		)));

	$wp_customize->add_setting('theme_info_more_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
}
add_action( 'customize_register', 'benevolent_customizer_theme_info' );


if( class_exists( 'WP_Customize_control' ) ){

	class Theme_Info_Custom_Control extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
}//class close