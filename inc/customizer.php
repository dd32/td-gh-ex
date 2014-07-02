<?php
/**
 * Aperture Theme Customizer
 *
 * @package Aperture
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aperture_customize_register( $wp_customize ) {
    /* Rename existing sections and move existing controls */
    $wp_customize->get_section( 'title_tagline'     )->title              = 'Theme Options';
    $wp_customize->get_section( 'static_front_page'  )->title             = 'Frontpage Options';
    $wp_customize->get_control( 'background_color'  )->section            = 'title_tagline';
    $wp_customize->get_control( 'background_image'  )->section            = 'title_tagline';
    $wp_customize->get_control( 'background_repeat'  )->section           = 'title_tagline';
    $wp_customize->get_control( 'background_position_x'  )->section       = 'title_tagline';
    $wp_customize->get_control( 'background_attachment'  )->section       = 'title_tagline';

    /* Change the order of existing controls */
    $wp_customize->get_control( 'blogname'  )->priority                   = '1';
    $wp_customize->get_control( 'blogdescription'  )->priority            = '2';
    $wp_customize->get_control( 'background_color'  )->priority           = '10';
    $wp_customize->get_control( 'background_image'  )->priority           = '11';
    $wp_customize->get_control( 'background_repeat'  )->priority          = '12';
    $wp_customize->get_control( 'background_position_x'  )->priority      = '13';
    $wp_customize->get_control( 'background_attachment'  )->priority      = '14';

    /* Change the description of existing sections */
    $wp_customize->get_section( 'title_tagline'     )->description        = 'Your theme has several theme options.';

    /* Add a textarea custom control to the customizer */
    class Aperture_Customize_Textarea_Control extends WP_Customize_Control {
        public $type = 'textarea';
     
        public function render_content() {
            ?>
            <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
            <?php
        }
    }

    /* Fullscreen background image */
    $wp_customize->add_setting('aperture_background_size', array(
        'sanitize_callback'     => 'aperture_sanitize_background',
    ));

    $wp_customize->add_control( 'aperture_background_size', array(
        'label'                 => __( 'Background Size', 'aperture' ),
        'section'               => 'title_tagline',
        'type'                  => 'radio',
        'priority'              => 15,
        'choices'               => array(
            'default'           => 'Default',
            'fullscreen'        => 'Fullscreen',
        ),
    ) );

    /**
     *  Custom text for the footer.
     */
    $wp_customize->add_setting(
        'copyright_custom_text',
        array(
            'default'           => 'Some custom text',
            'sanitize_callback' => 'aperture_sanitize_text',
        )
    );

    $wp_customize->add_control(
        'copyright_custom_text',
        array(
            'label'             => 'Copyright',
            'section'           => 'title_tagline',
            'priority'          => 3,
            'type'              => 'text',
        )
    );

    /**
     * Add a social links section to the customizer.
     */
	$wp_customize->add_section( 'aperture_social_options' , array(
    	'title'                 => __( 'Social Links', 'aperture' ),
    	'description'      	    => __( 'Your theme supports social links.', 'aperture' ),
        'priority'              => 230,
	) );

    /* Facebook Social Link */
    $wp_customize->add_setting('aperture_social_links[facebook]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[facebook]', array(
        'label'                 => __( 'Facebook', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 10,
    ));

    /* Twitter Social Link */
    $wp_customize->add_setting('aperture_social_links[twitter]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[twitter]', array(
        'label'                 => __( 'Twitter', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 20,
    ));

    /* Google+ Social Link */
    $wp_customize->add_setting('aperture_social_links[googleplus]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[googleplus]', array(
        'label'                 => __( 'Google+', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 30,
    ));

    /* LinkedIn Social Link */
    $wp_customize->add_setting('aperture_social_links[linkedin]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[linkedin]', array(
        'label'                 => __( 'LinkedIn', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 40,
    ));

    /* Tumblr Social Link */
    $wp_customize->add_setting('aperture_social_links[tumblr]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[tumblr]', array(
        'label'                 => __( 'Tumblr', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 50,
    ));

    /* Pinterest Social Link */
    $wp_customize->add_setting('aperture_social_links[pinterest]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[pinterest]', array(
        'label'                 => __( 'Pinterest', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 60,
    ));

    /* Instagram Social Link */
    $wp_customize->add_setting('aperture_social_links[instagram]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[instagram]', array(
        'label'                 => __( 'Instagram', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 70,
    ));

    /* Flickr Social Link */
    $wp_customize->add_setting('aperture_social_links[flickr]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[flickr]', array(
        'label'                 => __( 'Flickr', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 80,
    ));

    /* Vimeo Social Link */
    $wp_customize->add_setting('aperture_social_links[vimeo]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[vimeo]', array(
        'label'                 => __( 'Vimeo', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 90,
    ));

     /* YouTube Social Link */
    $wp_customize->add_setting('aperture_social_links[youtube]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[youtube]', array(
        'label'                 => __( 'YouTube', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 100,
    ));

    /* Digg Social Link */
    $wp_customize->add_setting('aperture_social_links[digg]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[digg]', array(
        'label'                 => __( 'Digg', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 110,
    ));

    /* Reddit Social Link */
    $wp_customize->add_setting('aperture_social_links[reddit]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[reddit]', array(
        'label'                 => __( 'Reddit', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 120,
    ));

    /* StumbleUpon Social Link */
    $wp_customize->add_setting('aperture_social_links[stumbleupon]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[stumbleupon]', array(
        'label'                 => __( 'StumbleUpon', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 130,
    ));

    /* Dribbble Social Link */
    $wp_customize->add_setting('aperture_social_links[dribbble]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[dribbble]', array(
        'label'                 => __( 'Dribbble', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 140,
    ));

    /* GitHub Social Link */
    $wp_customize->add_setting('aperture_social_links[github]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[github]', array(
        'label'                 => __( 'GitHub', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 150,
    ));

     /* WordPress Social Link */
    $wp_customize->add_setting('aperture_social_links[wordpress]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[wordpress]', array(
        'label'                 => __( 'WordPress', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 160,
    ));

    /* E-Mail Social Link */
    $wp_customize->add_setting('aperture_social_links[email]', array(
        'default'               => '',
        'sanitize_callback'     => 'sanitize_email',
    ));
 
    $wp_customize->add_control('aperture_social_links[email]', array(
        'label'                 => __( 'E-Mail Address', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 170,
    ));

    /* RSS Social Link */
    $wp_customize->add_setting('aperture_social_links[rss]', array(
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw',
    ));
 
    $wp_customize->add_control('aperture_social_links[rss]', array(
        'label'                 => __( 'RSS Feed', 'Aperture' ),
        'section'               => 'aperture_social_options',
        'type'                  => 'text',
        'priority'              => 180,
    ));

    /**
     * Add a frontpage slider section to the customizer.
     */
    $wp_customize->add_section( 'aperture_frontpage_slider' , array(
        'title'                 => __( 'Fullscreen Slider Images', 'aperture' ),
        'description'           => __( 'Your theme supports a fullscreen slider. You can select the Slider template on the Edit Page screen under Page Attributes.', 'aperture' ),
        'priority'              => 240,
    ) );

    /* First Slide */
    $wp_customize->add_setting('aperture_slider_image[first]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[first]', array(
        'label'                 => __( 'First Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 10,
    ) ) );

    /* Second Slide */
    $wp_customize->add_setting('aperture_slider_image[second]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[second]', array(
        'label'                 => __( 'Second Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 20,
    ) ) );

    /* Third Slide */
    $wp_customize->add_setting('aperture_slider_image[third]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[third]', array(
        'label'                 => __( 'Third Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 30,
    ) ) );

    /* Fourth Slide */
    $wp_customize->add_setting('aperture_slider_image[fourth]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[fourth]', array(
        'label'                 => __( 'Fourth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 40,
    ) ) );

    /* Fifth Slide */
    $wp_customize->add_setting('aperture_slider_image[fifth]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[fifth]', array(
        'label'                 => __( 'Fifth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 50,
    ) ) );

    /* Sixth Slide */
    $wp_customize->add_setting('aperture_slider_image[sixth]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[sixth]', array(
        'label'                 => __( 'Sixth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 60,
    ) ) );

    /* Seventh Slide */
    $wp_customize->add_setting('aperture_slider_image[seventh]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[seventh]', array(
        'label'                 => __( 'Seventh Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 70,
    ) ) );

    /* Eighth Slide */
    $wp_customize->add_setting('aperture_slider_image[eighth]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[eighth]', array(
        'label'                 => __( 'Eighth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 80,
    ) ) );

    /* Nineth Slide */
    $wp_customize->add_setting('aperture_slider_image[nineth]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[nineth]', array(
        'label'                 => __( 'Nineth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 90,
    ) ) );

    /* Tenth Slide */
    $wp_customize->add_setting('aperture_slider_image[tenth]', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_image[tenth]', array(
        'label'                 => __( 'Tenth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider',
        'priority'              => 100,
    ) ) );

    /**
     * Add a frontpage slider text section to the customizer.
     */
    $wp_customize->add_section( 'aperture_frontpage_slider_text' , array(
        'title'                 => __( 'Fullscreen Slider Text', 'aperture' ),
        'description'           => __( 'You can add text to each slide.', 'aperture' ),
        'priority'              => 250,
    ) );

    /* First Slide Text */
    $wp_customize->add_setting('aperture_slider_text[first]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[first]', array(
        'label'                 => __( 'First Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 10,
    ) ) );

    /* Second Slide */
    $wp_customize->add_setting('aperture_slider_text[second]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[second]', array(
        'label'                 => __( 'Second Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 20,
    ) ) );

    /* Third Slide */
    $wp_customize->add_setting('aperture_slider_text[third]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[third]', array(
        'label'                 => __( 'Third Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 30,
    ) ) );

    /* Fourth Slide */
    $wp_customize->add_setting('aperture_slider_text[fourth]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[fourth]', array(
        'label'                 => __( 'Fourth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 40,
    ) ) );

    /* Fifth Slide */
    $wp_customize->add_setting('aperture_slider_text[fifth]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[fifth]', array(
        'label'                 => __( 'Fifth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 50,
    ) ) );

    /* Sixth Slide */
    $wp_customize->add_setting('aperture_slider_text[sixth]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[sixth]', array(
        'label'                 => __( 'Sixth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 60,
    ) ) );

    /* Seventh Slide */
    $wp_customize->add_setting('aperture_slider_text[seventh]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[seventh]', array(
        'label'                 => __( 'Seventh Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 70,
    ) ) );

    /* Eighth Slide */
    $wp_customize->add_setting('aperture_slider_text[eighth]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[eighth]', array(
        'label'                 => __( 'Eighth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 80,
    ) ) );

    /* Nineth Slide */
    $wp_customize->add_setting('aperture_slider_text[nineth]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[nineth]', array(
        'label'                 => __( 'Nineth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 90,
    ) ) );

    /* Tenth Slide */
    $wp_customize->add_setting('aperture_slider_text[tenth]', array(
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));

    $wp_customize->add_control( new Aperture_Customize_Textarea_Control( $wp_customize, 'aperture_slider_text[tenth]', array(
        'label'                 => __( 'Tenth Slide', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_text',
        'priority'              => 100,
    ) ) );

    /**
     * Add a frontpage slider options section to the customizer.
     */
    $wp_customize->add_section( 'aperture_frontpage_slider_options' , array(
        'title'                 => __( 'Fullscreen Slider Options', 'aperture' ),
        'description'           => __( 'You can change the slide animation and the slide timer. You can also add a badge to be displayed on the first slide.', 'aperture' ),
        'priority'              => 260,
    ) );

    /* Fade or Slide effect */
    $wp_customize->add_setting('aperture_slider_fx', array(
        'sanitize_callback'     => 'aperture_sanitize_sliderfx',
    ));

    $wp_customize->add_control( 'aperture_slider_fx', array(
        'label'                 => __( 'Slide Animation:', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_options',
        'type'                  => 'radio',
        'priority'              => 110,
        'choices'               => array(
            'slide'             => 'Slide',
            'fade'              => 'Fade',
        ),
    ) );

    /* Slider Timer */
    $wp_customize->add_setting('aperture_slider_timer', array(
        'default'               => '5000',
        'sanitize_callback'     => 'aperture_sanitize_text',
    ));
 
    $wp_customize->add_control('aperture_slider_timer', array(
        'label'                 => __( 'Slide Timer (ms):', 'Aperture' ),
        'section'               => 'aperture_frontpage_slider_options',
        'type'                  => 'text',
        'priority'              => 120,
    ));

    /* Slider Badge */
    $wp_customize->add_setting('aperture_slider_badge', array(
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aperture_slider_badge', array(
        'label'                 => __( 'Optional Badge', 'aperture' ),
        'section'               => 'aperture_frontpage_slider_options',
        'priority'              => 130,
    ) ) );

    /**
     * Add a portfolio section to the customizer.
     */
    $wp_customize->add_section( 'aperture_portfolio_options' , array(
        'title'                 => __( 'Portfolio Options', 'aperture' ),
        'description'           => __( 'Your theme supports the portfolio custom post type.', 'aperture' ),
        'priority'              => 220,
    ) );

    /* Default or Fullwidth portfolio page. */
    $wp_customize->add_setting('aperture_portfolio_pagesize', array(
        'sanitize_callback'     => 'aperture_sanitize_page_size',
    ));

    $wp_customize->add_control( 'aperture_portfolio_pagesize', array(
        'label'                 => __( 'Portfolio Page Size:', 'aperture' ),
        'section'               => 'aperture_portfolio_options',
        'type'                  => 'radio',
        'priority'              => 100,
        'choices'               => array(
            'default'           => 'Default',
            'fullwidth'         => 'Fullwidth',
        ),
    ) );

    /* Enable or disable description on portfolio type/tag pages. */
    $wp_customize->add_setting('aperture_portfolio_description', array(
        'sanitize_callback'     => 'aperture_sanitize_description',
    ));

    $wp_customize->add_control( 'aperture_portfolio_description', array(
        'label'                 => __( 'Description:', 'aperture' ),
        'section'               => 'aperture_portfolio_options',
        'type'                  => 'radio',
        'priority'              => 110,
        'choices'               => array(
            'enable'           => 'Enable',
            'disable'          => 'Disable',
        ),
    ) );

    /* Sanitization copyright text and slider texts */
    function aperture_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    /* Sanitization background */
    function aperture_sanitize_background( $value ) {
    if ( ! in_array( $value, array( 'default', 'fullscreen' ) ) )
        $value = 'default';
    return $value;
    }

    /* Sanitization sliderfx */
    function aperture_sanitize_sliderfx( $value ) {
    if ( ! in_array( $value, array( 'slide', 'fade' ) ) )
        $value = 'fade';
    return $value;
    }

    /* Sanitization portfolio page size */
    function aperture_sanitize_page_size( $value ) {
    if ( ! in_array( $value, array( 'default', 'fullwidth' ) ) )
        $value = 'default';
    return $value;
    }

    /* Sanitization portfolio description */
    function aperture_sanitize_description( $value ) {
    if ( ! in_array( $value, array( 'enable', 'disable' ) ) )
        $value = 'enable';
    return $value;
    }

	$wp_customize->get_setting( 'blogname' )->transport        			= 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  		= 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport 		= 'postMessage';
	$wp_customize->get_setting( 'copyright_custom_text' )->transport 	= 'postMessage';
}
add_action( 'customize_register', 'aperture_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aperture_customize_preview_js() {
	wp_enqueue_script( 'aperture_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), rand(), true );
}
add_action( 'customize_preview_init', 'aperture_customize_preview_js' );
