<?php
/**
 * Astrid Theme Customizer.
 *
 * @package Astrid
 */

function astrid_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_section( 'header_image' )->panel         = 'astrid_header_panel';
    $wp_customize->get_section( 'title_tagline' )->priority     = '9';
    $wp_customize->get_section( 'title_tagline' )->title        = __('Site branding', 'astrid');
    $wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );


    //Titles
    class Astrid_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;border-bottom:1px solid;padding:5px;color:#111;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
    //___Header area___//
    $wp_customize->add_panel( 'astrid_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header area', 'astrid'),
    ) );
    //___Header type___//
    $wp_customize->add_section(
        'astrid_header_type',
        array(
            'title'         => __('Header type', 'astrid'),
            'priority'      => 10,
            'panel'         => 'astrid_header_panel', 
            'description'   => __('Select your header type', 'astrid'),
        )
    );
    //Front page
    $wp_customize->add_setting(
        'front_header_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'astrid_sanitize_header',
        )
    );
    $wp_customize->add_control(
        'front_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Front page header type', 'astrid'),
            'section'     => 'astrid_header_type',
            'description' => __('Select the header type for your front page', 'astrid'),
            'choices' => array(
                'image'     => __('Image', 'astrid'),
                'nothing'   => __('Only menu', 'astrid')
            ),
        )
    );
    //Site
    $wp_customize->add_setting(
        'site_header_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'astrid_sanitize_header',
        )
    );
    $wp_customize->add_control(
        'site_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site header type', 'astrid'),
            'section'     => 'astrid_header_type',
            'description' => __('Select the header type for all pages except the front page', 'astrid'),
            'choices' => array(
                'image'     => __('Image', 'astrid'),
                'nothing'   => __('Only menu', 'astrid')
            ),
        )
    );

    //___Header text___//
    $wp_customize->add_section(
        'astrid_header_text',
        array(
            'title'         => __('Header text', 'astrid'),
            'priority'      => 14,
            'panel'         => 'astrid_header_panel', 
        )
    );    
    $wp_customize->add_setting(
        'header_text',
        array(
            'default' => __('FAST / EASY / FREE','astrid'),
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'header_text',
        array(
            'label' => __( 'Header text', 'astrid' ),
            'section' => 'astrid_header_text',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'header_subtext',
        array(
            'default' => __('Time to meet Astrid','astrid'),
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'header_subtext',
        array(
            'label' => __( 'Header subtext', 'astrid' ),
            'section' => 'astrid_header_text',
            'type' => 'text',
            'priority' => 10
        )
    );    
    $wp_customize->add_setting(
        'header_button',
        array(
            'default' => __('Explore','astrid'),
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'header_button',
        array(
            'label' => __( 'Button text', 'astrid' ),
            'section' => 'astrid_header_text',
            'type' => 'text',
            'priority' => 10
        )
    );
    $wp_customize->add_setting(
        'header_button_url',
        array(
            'default' => '#primary',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'header_button_url',
        array(
            'label' => __( 'Button URL', 'astrid' ),
            'section' => 'astrid_header_text',
            'type' => 'text',
            'priority' => 11
        )
    );


    //___Mobile header image___//
    $wp_customize->add_setting(
        'mobile_header',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'mobile_header',
            array(
               'label'          => __( 'Small screens header image', 'astrid' ),
               'type'           => 'image',
               'section'        => 'header_image',
               'settings'       => 'mobile_header',
               'description'    => __( 'Add a header image for screen widths smaller than 1024px', 'astrid' ),
               'priority'       => 10,
            )
        )
    );

    //___Menu style___//
    $wp_customize->add_section(
        'astrid_menu_style',
        array(
            'title'         => __('Menu style', 'astrid'),
            'priority'      => 15,
            'panel'         => 'astrid_header_panel', 
        )
    );
    //Sticky menu
    $wp_customize->add_setting(
        'sticky_menu',
        array(
            'default'           => 'sticky',
            'sanitize_callback' => 'astrid_sanitize_sticky',
        )
    );
    $wp_customize->add_control(
        'sticky_menu',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Sticky menu', 'astrid'),
            'section' => 'astrid_menu_style',
            'choices' => array(
                'sticky'   => __('Sticky', 'astrid'),
                'static'   => __('Static', 'astrid'),
            ),
        )
    );
    //Menu style
    $wp_customize->add_setting(
        'menu_style',
        array(
            'default'           => 'inline',
            'sanitize_callback' => 'astrid_sanitize_menu_style',
        )
    );
    $wp_customize->add_control(
        'menu_style',
        array(
            'type'      => 'radio',
            'priority'  => 11,
            'label'     => __('Menu style', 'astrid'),
            'description'     => __('Menu style Menu styleMenu style___ Menu style Menu style Menu style', 'astrid'),
            'section'   => 'astrid_menu_style',
            'choices'   => array(
                'inline'     => __('Inline', 'astrid'),
                'centered'   => __('Centered', 'astrid'),
            ),
        )
    );

    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'astrid' ),
               'type'           => 'image',
               'section'        => 'title_tagline',
               'priority'       => 12,
            )
        )
    );


    //___Fonts___//
    $wp_customize->add_section(
        'astrid_fonts',
        array(
            'title' => __('Fonts', 'astrid'),
            'priority' => 15,
            'description' => __('You can use any Google Fonts you want for the heading and/or body. See the fonts here: google.com/fonts. See the documentation if you need help with this: athemes.com/documentation/astrid', 'astrid'),
        )
    );
    //Body fonts
    $wp_customize->add_setting(
        'body_font_name',
        array(
            'default' => 'Open+Sans:300,300italic,600,600italic',
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_name',
        array(
            'label' => __( 'Body font name/style/sets', 'astrid' ),
            'section' => 'astrid_fonts',
            'type' => 'text',
            'priority' => 11
        )
    );
    //Body fonts family
    $wp_customize->add_setting(
        'body_font_family',
        array(
            'default' => '\'Open Sans\', serif',
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'body_font_family',
        array(
            'label' => __( 'Body font family', 'astrid' ),
            'section' => 'astrid_fonts',
            'type' => 'text',
            'priority' => 12
        )
    );   
    //Headings fonts
    $wp_customize->add_setting(
        'headings_font_name',
        array(
            'default' => 'Josefin+Sans:300italic,300',
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_name',
        array(
            'label' => __( 'Headings font name/style/sets', 'astrid' ),
            'section' => 'astrid_fonts',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Headings fonts family
    $wp_customize->add_setting(
        'headings_font_family',
        array(
            'default' => '\'Josefin Sans\', sans-serif',
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'headings_font_family',
        array(
            'label' => __( 'Headings font family', 'astrid' ),
            'section' => 'astrid_fonts',
            'type' => 'text',
            'priority' => 15
        )
    );
    // Site title
    $wp_customize->add_setting(
        'site_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'site_title_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'astrid_fonts',
        'label'       => __('Site title', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) ); 
    // Site description
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'astrid_fonts',
        'label'       => __('Site description', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );         
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'astrid_fonts',
        'label'       => __('H1 font size', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '30',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'astrid_fonts',
        'label'       => __('H2 font size', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '24',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'astrid_fonts',
        'label'       => __('H3 font size', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'astrid_fonts',
        'label'       => __('H4 font size', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'astrid_fonts',
        'label'       => __('H5 font size', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'astrid_fonts',
        'label'       => __('H6 font size', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'astrid_fonts',
        'label'       => __('Body font size', 'astrid'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
            'style' => 'margin-bottom: 15px; padding: 10px;',
        ),
    ) );


    //___Blog options___//
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'astrid'),
            'priority' => 13,
        )
    );  
    // Blog layout
    $wp_customize->add_setting('astrid_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Astrid_Info( $wp_customize, 'layout', array(
        'label' => __('Layout', 'astrid'),
        'section' => 'blog_options',
        'settings' => 'astrid_options[info]',
        'priority' => 10
        ) )
    );    
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'list',
            'sanitize_callback' => 'astrid_sanitize_blog',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Blog layout', 'astrid'),
            'section'   => 'blog_options',
            'priority'  => 11,
            'choices'   => array(
                'list'           	=> __( 'List', 'astrid' ),
                'fullwidth'         => __( 'Full width (no sidebar)', 'astrid' ),
                'masonry-layout'    => __( 'Masonry (grid style)', 'astrid' )
            ),
        )
    ); 


    //___Footer___//
    $wp_customize->add_section(
        'astrid_footer',
        array(
            'title'         => __('Footer', 'astrid'),
            'priority'      => 18,
        )
    );
    $wp_customize->add_setting(
        'footer_widget_areas',
        array(
            'default'           => '3',
            'sanitize_callback' => 'astrid_sanitize_fwidgets',
        )
    );
    $wp_customize->add_control(
        'footer_widget_areas',
        array(
            'type'        => 'radio',
            'label'       => __('Footer widget area', 'astrid'),
            'section'     => 'astrid_footer',
            'description' => __('Choose the number of widget areas in the footer, then go to Appearance > Widgets and add your widgets.', 'astrid'),
            'choices' => array(
                '1'     => __('One', 'astrid'),
                '2'     => __('Two', 'astrid'),
                '3'     => __('Three', 'astrid'),
            ),
        )
    );
    //Logo Upload
    $wp_customize->add_setting(
        'footer_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'footer_logo',
            array(
               'label'          => __( 'Upload your footer logo', 'astrid' ),
               'type'           => 'image',
               'section'        => 'astrid_footer',
               'priority'       => 11,
            )
        )
    );
    // Footer contact
    $wp_customize->add_setting('astrid_options[info]', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Astrid_Info( $wp_customize, 'footer_contact', array(
        'label' => __('Layout', 'astrid'),
        'section' => 'astrid_footer',
        'settings' => 'astrid_options[info]',
        'priority' => 12
        ) )
    );    
    //Activate contact
    $wp_customize->add_setting(
        'toggle_contact_footer',
        array(
            'sanitize_callback' => 'astrid_sanitize_checkbox',
            'default'           => 1
        )       
    );
    $wp_customize->add_control(
        'toggle_contact_footer',
        array(
            'type' => 'checkbox',
            'label' => __('Activate the footer contact and logo area?', 'astrid'),
            'section' => 'astrid_footer',
            'priority' => 13,
        )
    );
    //Address
    $wp_customize->add_setting(
        'footer_contact_address',
        array(
            'default' => '29 Bedford St, London',
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'footer_contact_address',
        array(
            'label' => __( 'Address', 'astrid' ),
            'section' => 'astrid_footer',
            'type' => 'text',
            'priority' => 14
        )
    );
    //Email
    $wp_customize->add_setting(
        'footer_contact_email',
        array(
            'default' => 'office@site.com',
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'footer_contact_email',
        array(
            'label' => __( 'Email address', 'astrid' ),
            'section' => 'astrid_footer',
            'type' => 'text',
            'priority' => 15
        )
    );
    //Phone
    $wp_customize->add_setting(
        'footer_contact_phone',
        array(
            'default' => '(020) 4513 3568',
            'sanitize_callback' => 'astrid_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'footer_contact_phone',
        array(
            'label' => __( 'Phone number', 'astrid' ),
            'section' => 'astrid_footer',
            'type' => 'text',
            'priority' => 16
        )
    );   





}
add_action( 'customize_register', 'astrid_customize_register' );


/**
 * Sanitize
 */
//Header type
function astrid_sanitize_header( $input ) {
    if ( in_array( $input, array( 'image', 'nothing' ), true ) ) {
        return $input;
    }
}
//Text
function astrid_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Checkboxes
function astrid_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
//Menu style
function astrid_sanitize_menu_style( $input ) {
    if ( in_array( $input, array( 'inline', 'centered' ), true ) ) {
        return $input;
    }
}
//Menu style
function astrid_sanitize_sticky( $input ) {
    if ( in_array( $input, array( 'sticky', 'static' ), true ) ) {
        return $input;
    }
}
//Footer widget areas
function astrid_sanitize_fwidgets( $input ) {
    if ( in_array( $input, array( '1', '2', '3' ), true ) ) {
        return $input;
    }
}
//Blog layout
function astrid_sanitize_blog( $input ) {
    if ( in_array( $input, array( 'list', 'fullwidth', 'masonry-layout' ), true ) ) {
        return $input;
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function astrid_customize_preview_js() {
	wp_enqueue_script( 'astrid_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'astrid_customize_preview_js' );
