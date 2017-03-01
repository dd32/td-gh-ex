<?php
/**
 * astrology Theme Customizer.
 *
 * @package astrology
 */
// Theme customization options
function astrology_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
	$wp_customize->add_section( 'social_icons_section' , array(
	    'title'      => __( 'Social Icons', 'astrology' ),
	    'priority'   => 30,
	) );

	// Social Account 1
	$wp_customize->add_setting( 'social_icon_1' , array(
	    'default'     => 'fa-facebook',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'social_icon_1', array(
		'label'        => __( 'Enter Social Icon 1', 'astrology' ),
		'section'    => 'social_icons_section',
	) );
	$wp_customize->add_setting( 'social_link_1' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'social_link_1', array(
		'label'        => __( 'Enter Link 1', 'astrology' ),
		'section'    => 'social_icons_section',
	) );

	// Social Account 2
	$wp_customize->add_setting( 'social_icon_2' , array(
	    'default'     => 'fa-twitter',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'social_icon_2', array(
		'label'        => __( 'Enter Social Icon 2', 'astrology' ),
		'section'    => 'social_icons_section',
	) );
	$wp_customize->add_setting( 'social_link_2' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'social_link_2', array(
		'label'        => __( 'Enter Link 2', 'astrology' ),
		'section'    => 'social_icons_section',
	) );

	// Social Account 3
	$wp_customize->add_setting( 'social_icon_3' , array(
	    'default'     => 'fa-instagram',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'social_icon_3', array(
		'label'        => __( 'Enter Social Icon 2', 'astrology' ),
		'section'    => 'social_icons_section',
	) );
	$wp_customize->add_setting( 'social_link_3' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'social_link_3', array(
		'label'        => __( 'Enter Link 3', 'astrology' ),
		'section'    => 'social_icons_section',
	) );

	// Social Account 4
	$wp_customize->add_setting( 'social_icon_4' , array(
	    'default'     => 'fa-pinterest-p',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'social_icon_4', array(
		'label'        => __( 'Enter Social Icon 4', 'astrology' ),
		'section'    => 'social_icons_section',
	) );
	$wp_customize->add_setting( 'social_link_4' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'social_link_4', array(
		'label'        => __( 'Enter Link 4', 'astrology' ),
		'section'    => 'social_icons_section',
	) );

	// Social Account 5
	$wp_customize->add_setting( 'social_icon_5' , array(
	    'default'     => 'fa-skype',
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'social_icon_5', array(
		'label'        => __( 'Enter Social Icon 5', 'astrology' ),
		'section'    => 'social_icons_section',
	) );
	$wp_customize->add_setting( 'social_link_5' , array(
	    'transport'   => 'refresh',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( 'social_link_5', array(
		'label'        => __( 'Enter Link 5', 'astrology' ),
		'section'    => 'social_icons_section',
	) );

	$wp_customize->add_setting(
		      'astrology_color_section_primary_color',
		      array(
		          'default' => '#ad2737',
		          'capability'     => 'edit_theme_options',
		          'sanitize_callback' => 'sanitize_text_field',
		      )
		);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'astrology_color_section_primary_color',
	        array(
	            'label'      => __('Theme Color','astrology'),
	            'section' => 'colors',
	            'settings' => 'astrology_color_section_primary_color',
	        )
	    )
	);

	$wp_customize->add_setting(
		      'astrology_color_section_secondary_color',
		      array(
		          'default' => '#4d4d4d',
		          'capability'     => 'edit_theme_options',
		          'sanitize_callback' => 'sanitize_text_field',
		      )
		);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'astrology_color_section_secondary_color',
	        array(
	            'label'      => __('Secondary Color','astrology'),
	            'section' => 'colors',
	            'settings' => 'astrology_color_section_secondary_color',
	        )
	    )
	);

}
add_action( 'customize_register', 'astrology_customize_register' );

function astrology_custom_css(){ 
	if(get_theme_mod('astrology_color_section_primary_color') == '') { $astrology_color_section_primary_color = '#ad2737'; }
	else { $astrology_color_section_primary_color = esc_attr(get_theme_mod('astrology_color_section_primary_color')); }

	if(get_theme_mod('astrology_color_section_secondary_color') == '') { $astrology_color_section_secondary_color = '#4d4d4d'; }
	else { $astrology_color_section_secondary_color = esc_attr(get_theme_mod('astrology_color_section_secondary_color')); } ?>
	<style type="text/css">
		/* Primary Color*/
		.blog-sidebar h2{ color: <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.bypostauthor > .comment-body > .comment-meta > .comment-author .avatar{border-color: <?php echo esc_attr($astrology_color_section_primary_color); ?>;}
		.logo a{ color: <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.menu-global{ border-top: 3px solid <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.footer-socail-icon span:hover,.reply a.comment-reply-link:hover { background: <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.postBtn,.footer-social-icon span:hover{ background : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.comment-info a{ color : <?php echo esc_attr($astrology_color_section_primary_color); ?>;	}
		.blog-sidebar .widget ul li a:hover,.blog-content-left a{ color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.footer-copyrights a:hover, .footer-copyrights a:focus{	color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.bloginner-content-part ul li a:hover{ color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.footer-menu ul li a:hover{	color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.meta-nav-next:hover, .meta-nav-prev:hover{	background : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.bar:before, .bar:after{ background : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		textarea:focus ~ label{	color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		input:focus ~ label, input:valid ~ label{ color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.footer-menu ul li:before{ border-top: 3px solid <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.footer-menu ul li:after{  border-bottom: 3px solid <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.blog-content-left h2:hover{ color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.blog-content-left a:hover,#breadcrumbs .separator{ color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.page-numbers.current, a.page-numbers:hover,.astrology-search-form .search-submit,
		.leave-reply-form p.form-submit:hover, .leave-reply-form p.form-submit:focus, .leave-reply-form p.form-submit:active,button.search-submit,button, html input[type=button]:hover, input[type=reset]:hover, input[type=submit]:hover{ background : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
        input:focus,textarea:focus,#top-menu ul.offside.open,#top-menu ul.offside{border-bottom-color: <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		#top-menu > ul > li:hover > a, #top-menu ul li.active a{border-top-color : <?php echo esc_attr($astrology_color_section_primary_color); ?>;}
		#blog-innerpage-content .bloginner-content-part blockquote{ border-left : 5px solid <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.search-form .screen-reader-text{ color : <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.blog-sidebar .search-submit{ background : <?php echo esc_attr($astrology_color_section_primary_color); ?>; border: 1px solid <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.blog-sidebar input:focus {	border: 1px solid <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		a:focus, a:hover{ color: <?php echo esc_attr($astrology_color_section_primary_color); ?>; }
		.blog-sidebar #today{ background : <?php echo esc_attr($astrology_color_section_primary_color); ?>;}
		/* Secondary Color*/
	   .blog-content-left:hover .blog-img a:after {
    		box-shadow: inset -20px 0 0px -6px <?php echo esc_attr($astrology_color_section_secondary_color); ?>, inset 20px 0 0px -6px <?php echo esc_attr($astrology_color_section_secondary_color); ?>, inset 0 -15px 0px -6px <?php echo esc_attr($astrology_color_section_secondary_color); ?>;
		}
        #top-menu .submenu-button::after, #top-menu .submenu-button::before,button, html input[type=button], input[type=reset], input[type=submit],.footer-social-icon span{Background-color: <?php echo esc_attr($astrology_color_section_secondary_color); ?>;}
        #top-menu > ul > li.has-sub > a::after{border-bottom-color: <?php echo esc_attr($astrology_color_section_secondary_color); ?>;border-right-color: <?php echo esc_attr($astrology_color_section_secondary_color); ?>; }
        .blog-sidebar th,.widget select,.blog-content-left ul li a,.blog-content-left ul li,.blog-sidebar .widget ul li a,.meta-nav-prev, .meta-nav-next,input, textarea,#top-menu > ul > li > a,.bloginner-content-part .title-data h2,.bloginner-content-part .title-data h2,.footer-copyrights p, a,.blog-content-left h2,.footer-menu ul li a,body,.bloginner-content-part .title-data ul li,.bloginner-content-part ul li a{color: <?php echo esc_attr($astrology_color_section_secondary_color); ?>;}
		@media screen and (min-width: 1025px){
			#top-menu ul ul li a {background: <?php echo esc_attr($astrology_color_section_primary_color); ?>;}
		}
		@media screen and (max-width: 1024px) {
			#top-menu ul li a, #top-menu ul ul li a {
				color: <?php echo esc_attr($astrology_color_section_secondary_color); ?>;
			}
		}
	</style>
<?php }
add_action('wp_head','astrology_custom_css');