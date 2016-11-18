<?php
/**
 * astrology Theme Customizer.
 *
 * @package astrology
 */
// Theme customization options
function AstrologyCustomizeRegister( $wp_customize ) {
   //All our sections, settings, and controls will be added here
	$wp_customize->add_section( 'socialIconsSection' , array(
	    'title'      => __( 'Social Icons', 'astrology' ),
	    'priority'   => 30,
	) );

	// Social Account 1
	$wp_customize->add_setting( 'socialIcon1' , array(
	    'default'     => 'fa-facebook',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'socialIcon1', array(
		'label'        => __( 'Enter Social Icon 1', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );
	$wp_customize->add_setting( 'socialLink1' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'socialLink1', array(
		'label'        => __( 'Enter Link 1', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );

	// Social Account 2
	$wp_customize->add_setting( 'socialIcon2' , array(
	    'default'     => 'fa-twitter',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'socialIcon2', array(
		'label'        => __( 'Enter Social Icon 2', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );
	$wp_customize->add_setting( 'socialLink2' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'socialLink2', array(
		'label'        => __( 'Enter Link 2', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );

	// Social Account 3
	$wp_customize->add_setting( 'socialIcon3' , array(
	    'default'     => 'fa-instagram',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'socialIcon3', array(
		'label'        => __( 'Enter Social Icon 2', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );
	$wp_customize->add_setting( 'socialLink3' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'socialLink3', array(
		'label'        => __( 'Enter Link 3', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );

	// Social Account 4
	$wp_customize->add_setting( 'socialIcon4' , array(
	    'default'     => 'fa-pinterest-p',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'socialIcon4', array(
		'label'        => __( 'Enter Social Icon 4', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );
	$wp_customize->add_setting( 'socialLink4' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'socialLink4', array(
		'label'        => __( 'Enter Link 4', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );

	// Social Account 5
	$wp_customize->add_setting( 'socialIcon5' , array(
	    'default'     => 'fa-skype',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'socialIcon5', array(
		'label'        => __( 'Enter Social Icon 5', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );
	$wp_customize->add_setting( 'socialLink5' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'socialLink5', array(
		'label'        => __( 'Enter Link 5', 'astrology' ),
		'section'    => 'socialIconsSection',
	) );

	$wp_customize->add_setting(
		      'astrologyColorSectionPrimaryColor',
		      array(
		          'default' => '#ad2737',
		          'capability'     => 'edit_theme_options',
		          'sanitize_callback' => 'sanitize_text_field',
		      )
		);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'astrologyColorSectionPrimaryColor',
	        array(
	            'label'      => __('Theme Color','astrology'),
	            'section' => 'colors',
	            'settings' => 'astrologyColorSectionPrimaryColor',
	        )
	    )
	);

	$wp_customize->add_setting(
		      'astrologyColorSectionSecondaryColor',
		      array(
		          'default' => '#4d4d4d',
		          'capability'     => 'edit_theme_options',
		          'sanitize_callback' => 'sanitize_text_field',
		      )
		);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'astrologyColorSectionSecondaryColor',
	        array(
	            'label'      => __('Secondary Color','astrology'),
	            'section' => 'colors',
	            'settings' => 'astrologyColorSectionSecondaryColor',
	        )
	    )
	);

}
add_action( 'customize_register', 'AstrologyCustomizeRegister' );

function AstrologyCustomCss(){ 
	if(get_theme_mod('astrologyColorSectionPrimaryColor') == '') { $astrologyColorSectionPrimaryColor = '#ad2737'; }
	else { $astrologyColorSectionPrimaryColor = esc_attr(get_theme_mod('astrologyColorSectionPrimaryColor')); }

	if(get_theme_mod('astrologyColorSectionSecondaryColor') == '') { $astrologyColorSectionSecondaryColor = '#E1E1E1'; }
	else { $astrologyColorSectionSecondaryColor = esc_attr(get_theme_mod('astrologyColorSectionSecondaryColor')); } ?>
	<style type="text/css">
		/* Primary Color*/
		.blog-sidebar h2{ color: <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.logo a{ color: <?php echo $astrologyColorSectionPrimaryColor; ?>;	}
		.menu-global{ border-top: 3px solid <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.footer-socail-icon span:hover { background: <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.postBtn,.footer-social-icon span:hover{ background : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.comment-info a{ color : <?php echo $astrologyColorSectionPrimaryColor; ?>;	}
		.blog-sidebar .widget ul li a:hover,.blog-content-left a{ color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.footer-copyrights a:hover, .footer-copyrights a:focus{	color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.bloginner-content-part ul li a:hover{ color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.footer-menu ul li a:hover{	color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.meta-nav-next:hover, .meta-nav-prev:hover{	background : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.bar:before, .bar:after{ background : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		textarea:focus ~ label{	color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		input:focus ~ label, input:valid ~ label{ color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.footer-menu ul li:before{ border-top: 3px solid <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.footer-menu ul li:after{  border-bottom: 3px solid <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.blog-content-left h2:hover{ color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.blog-content-left a:hover,#breadcrumbs .separator{ color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.page-numbers.current, a.page-numbers:hover,.astrology-search-form .search-submit,
		.leave-reply-form p.form-submit:hover, .leave-reply-form p.form-submit:focus, .leave-reply-form p.form-submit:active,button.search-submit,button, html input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover{ background : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
        input:focus,textarea:focus,#top-menu ul.offside.open{border-bottom-color: <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		#top-menu > ul > li:hover > a, #top-menu ul li.active a{border-top-color : <?php echo $astrologyColorSectionPrimaryColor; ?>;}
		#blog-innerpage-content .bloginner-content-part blockquote{ border-left : 5px solid <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.search-form .screen-reader-text{ color : <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.blog-sidebar .search-submit{ background : <?php echo $astrologyColorSectionPrimaryColor; ?>; border: 1px solid <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.blog-sidebar input:focus {	border: 1px solid <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		a:focus, a:hover{ color: <?php echo $astrologyColorSectionPrimaryColor; ?>; }
		.blog-sidebar #today{ background : <?php echo $astrologyColorSectionPrimaryColor; ?>;}
		/* Secondary Color*/
	   .blog-content-left:hover .blog-img a:after {
    		box-shadow: inset -20px 0 0px -6px <?php echo $astrologyColorSectionSecondaryColor; ?>, inset 20px 0 0px -6px <?php echo $astrologyColorSectionSecondaryColor; ?>, inset 0 -15px 0px -6px <?php echo $astrologyColorSectionSecondaryColor; ?>;
		}
        #top-menu .submenu-button::after, #top-menu .submenu-button::before,button, html input[type=button], input[type=reset], input[type=submit],.footer-social-icon span{Background-color: <?php echo $astrologyColorSectionSecondaryColor; ?>;}
        #top-menu > ul > li.has-sub > a::after{border-bottom-color: <?php echo $astrologyColorSectionSecondaryColor; ?>;border-right-color: <?php echo $astrologyColorSectionSecondaryColor; ?>; }
        .blog-sidebar th,.widget select,.blog-content-left ul li a,.blog-content-left ul li,.blog-sidebar .widget ul li a,.meta-nav-prev, .meta-nav-next,input, textarea,#top-menu > ul > li > a,.bloginner-content-part .title-data h2,.bloginner-content-part .title-data h2,.footer-copyrights p, a,.blog-content-left h2,.footer-menu ul li a,body,.bloginner-content-part .title-data ul li,.bloginner-content-part ul li a{color: <?php echo $astrologyColorSectionSecondaryColor; ?>;}
		@media screen and (min-width: 1025px){
			#top-menu ul ul li a {background: <?php echo $astrologyColorSectionPrimaryColor; ?>;}
		}
		@media screen and (max-width: 1024px) {
			#top-menu ul li a, #top-menu ul ul li a {
				color: <?php echo $astrologyColorSectionSecondaryColor; ?>;
			}
		}
	</style>
<?php }
add_action('wp_head','AstrologyCustomCss');