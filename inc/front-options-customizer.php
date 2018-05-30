<?php
// Panel: Front Page Options.
$wp_customize->add_panel( 'a_portfolio_front_option', array(
    'priority' => 20,
    'title'          => __( 'Front Page Options', 'a-portfolio' ),
    'description'    => __( 'Front Page Options.', 'a-portfolio' ),
    'capability'     => 'edit_theme_options',
    'active_callback'=> '', // is_front_page
    'theme_supports' => '',
) );

/*=============================================================================
=========================Front Banner Start====================================
===============================================================================*/
$wp_customize->add_section( 'a_portfolio_banner_section', array(
    'capability'            => 'edit_theme_options',
    'title'                 => __( 'Front Banner Section', 'a-portfolio' ),
    'panel'             => 'a_portfolio_front_option'
) );

//What we do section enable disable
$wp_customize->add_setting( 'a_portfolio_banner_section_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'a_portfolio_sanitize_checkbox'
) );

$wp_customize->add_control( 'a_portfolio_banner_section_enable', array(
    'label'                 =>  __( 'Enable Banner Section', 'a-portfolio' ),
    'section'               => 'a_portfolio_banner_section',
    'type'                  => 'checkbox',
    'settings'              => 'a_portfolio_banner_section_enable',
) );
// Banner Heading
$wp_customize->add_setting( 'a_portfolio_banner_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'a_portfolio_banner_page_title', array(
    'label'                 =>  __( 'Banner title', 'a-portfolio' ),
    'section'               => 'a_portfolio_banner_section',
    'type'                  => 'text',
    'settings'              => 'a_portfolio_banner_page_title',
) );


// Banner Sub heading
$wp_customize->add_setting( 'a_portfolio_banner_page_subtitle', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'a_portfolio_banner_page_subtitle', array(
    'label'                 =>  __( 'Banner Sub title', 'a-portfolio' ),
    'section'               => 'a_portfolio_banner_section',
    'type'                  => 'text',
    'settings'              => 'a_portfolio_banner_page_subtitle',
) );

// Banner Button
$wp_customize->add_setting( 'a_portfolio_banner_button_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'a_portfolio_banner_button_title', array(
    'label'                 =>  __( 'Type Button Title', 'a-portfolio' ),
    'section'               => 'a_portfolio_banner_section',
    'type'                  => 'text',
    'settings'              => 'a_portfolio_banner_button_title',
) );

// Banner page and title
$wp_customize->add_setting( 'a_portfolio_banner_button_url_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'esc_url_raw'
) );

$wp_customize->add_control( 'a_portfolio_banner_button_url_title', array(
    'label'                 =>  __( 'Type button URL(Link)', 'a-portfolio' ),
    'section'               => 'a_portfolio_banner_section',
    'type'                  => 'url',
    'settings'              => 'a_portfolio_banner_button_url_title',
) );
/*=============================================================================
===========================Front Banner End==================================*/
/*==============================================================================
============================What we do Customizer Start=========================
===============================================================================*/
$wp_customize->add_section( 'a_portfolio_what_we_do_section', array(
    'capability'            => 'edit_theme_options',
     'title'                 => __( 'Front What we do Section', 'a-portfolio' ),
    'description'           => __( 'Select pages for What we do section', 'a-portfolio' ),
    'panel'             => 'a_portfolio_front_option'
) );

//What we do section enable disable
$wp_customize->add_setting( 'a_portfolio_what_we_do_section_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'a_portfolio_sanitize_checkbox'
) );

$wp_customize->add_control( 'a_portfolio_what_we_do_section_enable', array(
    'label'                 =>  __( 'Enable What we do Section', 'a-portfolio' ),
    'section'               => 'a_portfolio_what_we_do_section',
    'type'                  => 'checkbox',
    'settings'              => 'a_portfolio_what_we_do_section_enable',
) );

// What we do page and title
$wp_customize->add_setting( 'a_portfolio_what_we_do_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'a_portfolio_what_we_do_page_title', array(
    'label'                 =>  __( 'Select Page for What we do Title and Description', 'a-portfolio' ),
    'section'               => 'a_portfolio_what_we_do_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_what_we_do_page_title',
) );


// what we do page 1 and Icon 1
for($i=1;$i<5;$i++){
$wp_customize->add_setting( 'a_portfolio_what_we_do_page_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'a_portfolio_what_we_do_page_'.$i, array(
    /* translators: %s: Label */ 
    'label'                 =>  sprintf( __( 'Select Page %1$s for What we do Section', 'a-portfolio' ), $i),
    'section'               => 'a_portfolio_what_we_do_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_what_we_do_page_'.$i,
) );

$wp_customize->add_setting( 'a_portfolio_what_we_do_icon_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'a_portfolio_what_we_do_icon_'.$i, array(
     /* translators: %s: Label */ 
     'label'                 =>  sprintf( __( 'Select Page %1$s icon for What we do', 'a-portfolio' ), $i),
    /* translators: %s: Description */ 
    'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s. %2$s See more here %3$s', 'a-portfolio' ), 'fa-check','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>'),
    'section'               => 'a_portfolio_what_we_do_section',
    'type'                  => 'text',
    'settings' => 'a_portfolio_what_we_do_icon_'.$i,
) );    
}

/*==============================================================================
============================What we do Customizer End===========================
===============================================================================*/

/*==============================================================================
============================Work Customizer Start=========================
===============================================================================*/
$wp_customize->add_section( 'a_portfolio_work_section', array(
    'capability'            => 'edit_theme_options',
     'title'                 => __( 'Front work Section', 'a-portfolio' ),
    'description'           => __( 'Select pages for work section', 'a-portfolio' ),
    'panel'             => 'a_portfolio_front_option'
) );

//work section enable disable
$wp_customize->add_setting( 'a_portfolio_work_section_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'a_portfolio_sanitize_checkbox'
) );

$wp_customize->add_control( 'a_portfolio_work_section_enable', array(
    'label'                 =>  __( 'Enable work Section', 'a-portfolio' ),
    'section'               => 'a_portfolio_work_section',
    'type'                  => 'checkbox',
    'settings'              => 'a_portfolio_work_section_enable',
) );

//Our work Title
$wp_customize->add_setting( 'a_portfolio_work_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'a_portfolio_work_page_title', array(
    'label'                 =>  __( 'Select Page for Work Title and Description', 'a-portfolio' ),
    'section'               => 'a_portfolio_work_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_work_page_title',
) );

$wp_customize->add_setting('a_portfolio_work_category_id',array(
    'capability'            => 'edit_theme_options',
    'default' =>  '',
    'sanitize_callback' => 'a_portfolio_sanitize_category',
));
    
$wp_customize->add_control(new a_portfolio_Customize_Dropdown_Taxonomies_Control($wp_customize,'a_portfolio_work_category_id',
array(
       'label' => __('Select Main Category of Work having sub category','a-portfolio'),
        'section' => 'a_portfolio_work_section',
        'settings' => 'a_portfolio_work_category_id',
        'type'=> 'dropdown-taxonomies',
    )
));
/*==============================================================================
============================Work Customizer End===========================
===============================================================================*/

/*==============================================================================
============================Team Customizer Start=========================
===============================================================================*/
$wp_customize->add_section( 'a_portfolio_team_section', array(
    'capability'            => 'edit_theme_options',
     'title'                 => __( 'Front team Section', 'a-portfolio' ),
    'description'           => __( 'Select pages for team section', 'a-portfolio' ),
    'panel'             => 'a_portfolio_front_option'
) );

//team section enable disable
$wp_customize->add_setting( 'a_portfolio_team_section_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'a_portfolio_sanitize_checkbox'
) );

$wp_customize->add_control( 'a_portfolio_team_section_enable', array(
    'label'                 =>  __( 'Enable team Section', 'a-portfolio' ),
    'section'               => 'a_portfolio_team_section',
    'type'                  => 'checkbox',
    'settings'              => 'a_portfolio_team_section_enable',
) );

// Team Title
$wp_customize->add_setting( 'a_portfolio_team_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'a_portfolio_team_page_title', array(
    'label'                 =>  __( 'Select Page for  Team Title & Description', 'a-portfolio' ),
    'section'               => 'a_portfolio_team_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_team_page_title',
) );

//  Team Us pages

for ($i=1;$i<5;$i++) {

$wp_customize->add_setting( 'a_portfolio_team_page_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'a_portfolio_team_page_'.$i, array(
     /* translators: %s: Description */ 
    'label'                 => sprintf( __( 'Select  Team Page %s', 'a-portfolio' ), $i ),
    'section'               => 'a_portfolio_team_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_team_page_'.$i,
) );

$wp_customize->add_setting( 'a_portfolio_team_position_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'a_portfolio_team_position_'.$i, array(
     /* translators: %s: Label */ 
    'label'                 =>  sprintf( __( 'Select Designation For page %s', 'a-portfolio' ), $i ),
    'description'           =>  __( 'Designation like Creative Director,Web Developer,Server Administor,UI/UX Design', 'a-portfolio' ),
    'section'               => 'a_portfolio_team_section',
    'type'                  => 'text',
    'settings' => 'a_portfolio_team_position_'.$i,
) );
}
/*==============================================================================
============================Team Customizer End===========================
===============================================================================*/


/*==============================================================================
============================Testimonials Customizer Start=======================
===============================================================================*/
$wp_customize->add_section( 'a_portfolio_testimonial_section', array(
    'capability'            => 'edit_theme_options',
     'title'                 => __( 'Front Testimonial Section', 'a-portfolio' ),
    'description'           => __( 'Select pages for testimonial section', 'a-portfolio' ),
    'panel'             => 'a_portfolio_front_option'
) );

//Testimonials section enable disable
$wp_customize->add_setting( 'a_portfolio_testimonial_section_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'a_portfolio_sanitize_checkbox'
) );

$wp_customize->add_control( 'a_portfolio_testimonial_section_enable', array(
    'label'                 =>  __( 'Enable Testimonial Section', 'a-portfolio' ),
    'section'               => 'a_portfolio_testimonial_section',
    'type'                  => 'checkbox',
    'settings'              => 'a_portfolio_testimonial_section_enable',
) );

// Testimonial Heading Start
$wp_customize->add_setting( 'a_portfolio_testimonial_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'a_portfolio_testimonial_title', array(
    'label'                 =>  __( 'Testimonial Title', 'a-portfolio' ),
    'section'               => 'a_portfolio_testimonial_section',
    'type'                  => 'text',
    'settings' => 'a_portfolio_testimonial_title',
) );
// Testimonial Heading End

// Testimonial page and Designation
for ($i=1;$i<7;$i++) {
$wp_customize->add_setting( 'a_portfolio_testimonial_page_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

 
$wp_customize->add_control( 'a_portfolio_testimonial_page_'.$i, array(
    /* translators: %s: Description */ 
    'label'                 => sprintf( __( 'Select Testimonial Page %s', 'a-portfolio' ), $i ),
    'section'               => 'a_portfolio_testimonial_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_testimonial_page_'.$i,
) );

$wp_customize->add_setting( 'a_portfolio_testimonial_position_'.$i, array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
) );


$wp_customize->add_control( 'a_portfolio_testimonial_position_'.$i, array(
     /* translators: %s: Description */ 
    'label'                 =>  sprintf( __( 'Select Designation or Company Name %s', 'a-portfolio' ), $i ),
    'description'           =>  __( 'Position like Developer, CEO MD', 'a-portfolio' ),
    'section'               => 'a_portfolio_testimonial_section',
    'type'                  => 'text',
    'settings' => 'a_portfolio_testimonial_position_'.$i,
) );
}
/*==============================================================================
============================Testimonials Customizer End===========================
===============================================================================*/

/*==============================================================================
============================Blog Customizer Start=======================
===============================================================================*/
$wp_customize->add_section( 'a_portfolio_blog_section', array(
    'capability'            => 'edit_theme_options',
     'title'                 => __( 'Front Blog Section', 'a-portfolio' ),
    'description'           => __( 'Select pages for blog section', 'a-portfolio' ),
    'panel'             => 'a_portfolio_front_option'
) );

//Blog section enable disable
$wp_customize->add_setting( 'a_portfolio_blog_section_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'a_portfolio_sanitize_checkbox'
) );

$wp_customize->add_control( 'a_portfolio_blog_section_enable', array(
    'label'                 =>  __( 'Enable Blog Section', 'a-portfolio' ),
    'section'               => 'a_portfolio_blog_section',
    'type'                  => 'checkbox',
    'settings'              => 'a_portfolio_blog_section_enable',
) );

$wp_customize->add_setting( 'a_portfolio_blog_page', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

 
$wp_customize->add_control( 'a_portfolio_blog_page', array(
    /* translators: %s: Description */ 
    'label'                 => __( 'Select Page For Blog Heading and Description', 'a-portfolio' ),
    'section'               => 'a_portfolio_blog_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_blog_page',
) );

$wp_customize->add_setting('a_portfolio_blog_category_id',array(
    'capability'            => 'edit_theme_options',
    'default' =>  '',
    'sanitize_callback' => 'a_portfolio_sanitize_category',
));
    
$wp_customize->add_control(new a_portfolio_Customize_Dropdown_Taxonomies_Control($wp_customize,'a_portfolio_blog_category_id',
array(
       'label' => __('Select Main Category For Blog','a-portfolio'),
        'section' => 'a_portfolio_blog_section',
        'settings' => 'a_portfolio_blog_category_id',
        'type'=> 'dropdown-taxonomies',
    )
));

$wp_customize->add_setting( 'a_portfolio_blog_number', array(
    'capability'            => 'edit_theme_options',
    'default'               => '3',
    'sanitize_callback'     => 'a_portfolio_sanitize_number_absint'
));

$wp_customize->add_control( 'a_portfolio_blog_number', array(
    'label'                 =>  __( 'Number of Recent Blogs to Show in Front Page', 'a-portfolio' ),
    'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'a-portfolio' ),
    'section'               => 'a_portfolio_blog_section',
    'type'                  => 'text',
    'settings' => 'a_portfolio_blog_number',
) );
/*==============================================================================
============================BLog Customizer End===========================
===============================================================================*/


/*==============================================================================
============================Contact Customizer Start=======================
===============================================================================*/
$wp_customize->add_section( 'a_portfolio_contact_section', array(
    'capability'            => 'edit_theme_options',
     'title'                 => __( 'Front contact Section', 'a-portfolio' ),
    'description'           => __( 'Select pages for contact section', 'a-portfolio' ),
    'panel'             => 'a_portfolio_front_option'
) );

//contact section enable disable
$wp_customize->add_setting( 'a_portfolio_contact_section_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'a_portfolio_sanitize_checkbox'
) );

$wp_customize->add_control( 'a_portfolio_contact_section_enable', array(
    'label'                 =>  __( 'Enable contact Section', 'a-portfolio' ),
    'section'               => 'a_portfolio_contact_section',
    'type'                  => 'checkbox',
    'settings'              => 'a_portfolio_contact_section_enable',
) );

// Contact Page Title and Description
$wp_customize->add_setting( 'a_portfolio_contact_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'a_portfolio_contact_page_title', array(
    'label'                 =>  __( 'Select First Page for Contact', 'a-portfolio' ),
    'section'               => 'a_portfolio_contact_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_contact_page_title',
) );

$wp_customize->add_setting( 'a_portfolio_contact_form_code', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'sanitize_text_field'
) );

$wp_customize->add_control( 'a_portfoliocontact_form_code', array(
    'label'                 =>  __( 'Contact Section Use Shortcode', 'a-portfolio' ),
    'description'           =>  __( 'eg [contact-form-7 id="108" title="Contact form 1"]', 'a-portfolio' ),
    'section'               => 'a_portfolio_contact_section',
    'type'                  => 'text',
    'settings' => 'a_portfolio_contact_form_code',
) );
/*==============================================================================
============================Testimonial Customizer End===========================
===============================================================================*/


/*==============================================================================
============================Newsletter Customizer Start=======================
===============================================================================*/
$wp_customize->add_section( 'a_portfolio_newsletter_section', array(
    'capability'            => 'edit_theme_options',
     'title'                 => __( 'Front newsletter Section', 'a-portfolio' ),
    'description'           => __( 'Select pages for newsletter section', 'a-portfolio' ),
    'panel'             => 'a_portfolio_front_option'
) );

//Newsletter section enable disable
$wp_customize->add_setting( 'a_portfolio_newsletter_section_enable', array(
    'capability'            => 'edit_theme_options',
    'default'               => 0,
    'sanitize_callback'     => 'a_portfolio_sanitize_checkbox'
) );

$wp_customize->add_control( 'a_portfolio_newsletter_section_enable', array(
    'label'                 =>  __( 'Enable newsletter Section', 'a-portfolio' ),
    'section'               => 'a_portfolio_newsletter_section',
    'type'                  => 'checkbox',
    'settings'              => 'a_portfolio_newsletter_section_enable',
) );

// Newsletter Page Title and Description
$wp_customize->add_setting( 'a_portfolio_newsletter_page_title', array(
    'capability'            => 'edit_theme_options',
    'default'               => '',
    'sanitize_callback'     => 'a_portfolio_sanitize_dropdown_pages'
) );

$wp_customize->add_control( 'a_portfolio_newsletter_page_title', array(
    'label'                 =>  __( 'Select First Page for Newsletter', 'a-portfolio' ),
    'section'               => 'a_portfolio_newsletter_section',
    'type'                  => 'dropdown-pages',
    'settings'              => 'a_portfolio_newsletter_page_title',
) );
// Newsletter Form Shortcode Descriptions
$wp_customize->add_setting('a_portfolio_newsletter_shortcode',array(
    'default'       =>      '',
    'sanitize_callback'     =>  'sanitize_text_field'
    ));
$wp_customize->add_control('a_portfolio_newsletter_shortcode',array(
    'section'       =>      'a_portfolio_newsletter_section',
     'label'                 =>  __( 'News Letter Section Use Shortcode', 'a-portfolio' ),
      /* translators: %s: Description */ 
    'description'           => sprintf( __( 'Use Newsletter Plugins shortcode: Eg: %1$s. %2$s See more here %3$s', 'a-portfolio' ), '[newsletter_form]','<a href="'.esc_url('https://wordpress.org/plugins/newsletter/').'" target="_blank">','</a>' ),
    'type'          =>      'text',
    'settings'      =>      'a_portfolio_newsletter_shortcode'
    ));
/*==============================================================================
============================Newsletter Customizer End===========================
===============================================================================*/