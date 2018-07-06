<?php /* Theme Customizer For belfast Theme */
   
function belfast_customize_register ( $wp_customize ) {
	
	
	// Social Links
	
	$wp_customize->add_section( 'sociallinks', array(
        'title' => __('Social Links','belfast'), // The title of section
        'description' => __('Add Your Social Links Here.','belfast'), // The description of section
        'priority' => '900',
	) );
	
	$wp_customize->add_setting( 'belfast_facebooklink', array('default' => '','sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'belfast_facebooklink', array('label' => __('Facebook URL','belfast'), 'section' => 'sociallinks', ) );
	$wp_customize->add_setting( 'belfast_twitterlink', array('default' => '','sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'belfast_twitterlink', array('label' => __('Twitter Handle','belfast'), 'section' => 'sociallinks', ) );
    $wp_customize->add_setting( 'belfast_googlelink', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'belfast_googlelink', array('label' => __('Google Plus URL','belfast'),'section' => 'sociallinks',) );
	$wp_customize->add_setting( 'belfast_pinterestlink', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'belfast_pinterestlink', array('label' => __('Pinterest URL','belfast'),'section' => 'sociallinks',) );
	$wp_customize->add_setting( 'belfast_youtubelink', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'belfast_youtubelink', array('label' => __('Youtube URL','belfast'),'section' => 'sociallinks',) );
	$wp_customize->add_setting( 'belfast_stumblelink', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'belfast_stumblelink', array('label' => __('Stumbleupon Link','belfast'),'section' => 'sociallinks', ) );
	$wp_customize->add_setting( 'belfast_rsslink', array('default' => '', 'sanitize_callback' => 'esc_url_raw') );
    $wp_customize->add_control( 'belfast_rsslink', array('label' => __('RSS Feeds URL','belfast'),'section' => 'sociallinks',) );

	// Social Links Ends
 	// Footer Copyright Section
	
	$wp_customize->add_section( 'fcopyright', array(
        'title' => __('Footer Copyright','belfast'), // The title of section
        'description' => __('Add Your Copyright Notes Here.','belfast'), // The description of section
        'priority' => '900',
	) );
 
	$wp_customize->add_setting( 'belfast_footer_top', array('default' => __('Any Text Here','belfast'),'sanitize_callback' => 'belfast_sanitize_footer_text',) );
    $wp_customize->add_control( 'belfast_footer_top', array('label' => __('Footer Text','belfast'),'section' => 'fcopyright',) );
	$wp_customize->add_setting( 'belfast_footer_cr_left', array('default' => __('Your Copyright Here.','belfast'),'sanitize_callback' => 'belfast_sanitize_footer_text',) );
	$wp_customize->add_control( 'belfast_footer_cr_left', array('label' => __('Copyright Note Left','belfast'),'section' => 'fcopyright',) );

	function belfast_sanitize_footer_text( $input ) {
    return sanitize_text_field(  $input  );}
}
    
	// Footer Copyright Section Ends
	
    // This will output the custom WordPress settings to the live theme's WP head. */
   
   function belfast_header_output() {
     $sidebar_pos = get_theme_mod('sidebar_position_option');
     $bgcolor = get_theme_mod('bg_color');
	 $primarycolor = get_theme_mod('primary_color');
	 $secondarycolor = get_theme_mod('secondary_color');
	 $tertiarycolor = get_theme_mod('tertiary_color');
	 
	 
	 
	 ?><?php 
      if ( ($sidebar_pos == 'sidebar_display_left') || ( ! empty( $bgcolor )) || (!empty($primarycolor)) || (!empty($secondarycolor)) || (!empty($tertiarycolor))){
?>	  <!--Customizer CSS--> 
      
	  <style type="text/css">
	       

		    <?php if($bgcolor) { ?>
		      #header{background-color: <?php echo esc_attr($bgcolor); ?>}
			  .primary-navigation ul li:hover li a, .primary-navigation ul li.iehover li a{ background-color: <?php echo esc_attr($bgcolor); ?>}
		   	<?php } ?>
            <?php if($primarycolor) { ?>

             h1, h2, h3, h4, h5, h6, .related-article h5 a:hover, .entry-title h2, .entry-title a, .pagenavi a,
			  h1 a, .h1 a, h2 a, .h2 a, h3 a, .h3 a, h4 a, .h4 a, h5 a, .h5 a, h6 a, .h6 a, a:hover, a:visited:hover, a:focus, a:visited:focus,
			  .widget_tag_cloud a {color: <?php echo esc_attr($primarycolor); ?>;}
			  			  
		   	<?php } ?>
			<?php if($secondarycolor) { ?> p, .entry-summary ul li, .entry-content ul li, entry-summary ol li, entry-content ol li, dd
					  			{color:<?php echo esc_attr($secondarycolor); ?>;}
		      		  <?php } ?>

			<?php if($tertiarycolor) { ?>
		      .catbox a, .hcat a:visited, #main-nav  #main-menu li:hover, #main-nav #main-menu li.current-menu-item, 
  .entry-summary a, .entry-meta a, .entry-title h3 a:hover, .entry-title h2 a:hover,
ul.popular-posts-sdr li a, .widget_recent_entries ul li a, .widget_categories ul li a, .widget_archive li a, .widget_meta li a,
			  a, .cdetail h3 a:hover, .cdetail h2 a:hover, .belfast-category-posts li p, .widget_recent_entries li a, .nav-links a,
			  .entry-content a, .comment-content a{color:<?php echo esc_attr($tertiarycolor); ?>;} 
			
			<?php } ?>
			
			
	  </style>
      <!--/Customizer CSS-->
	<?php } ?>
	<?php } 
	
	  

add_action( 'customize_register', 'belfast_customize_register', 11 );
add_action( 'wp_head', 'belfast_header_output', 11 );