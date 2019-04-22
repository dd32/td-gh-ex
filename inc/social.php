<?php if( ! defined( 'ABSPATH' ) ) exit;

	function baw_social_section () { ?>
		
			<div <?php if(get_theme_mod( 'social_media_activate' )){ ?> style="float: none;"<?php } ?> class="fa-icons">
			
				<?php if (get_theme_mod( 'baw_facebook' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' )) == "_blank"){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_facebook' )); ?>"><i class="fa fa-facebook-f"></i></a>
				<?php endif; ?>
							
				<?php if (get_theme_mod( 'baw_twitter' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_twitter' )) ?>"><i class="fa fa-twitter"></i></a>
				<?php endif; ?>
											
				<?php if (get_theme_mod( 'baw_google' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_google' )); ?>"><i class="fa fa-google-plus"></i></a>
				<?php endif; ?>
															
				<?php if (get_theme_mod( 'baw_youtube' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_youtube' )); ?>"><i class="fa fa-youtube"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'baw_vimeo' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_vimeo' )); ?>"><i class="fa fa-vimeo"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'baw_pinterest' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_pinterest' )); ?>"><i class="fa fa-pinterest"></i></a>
				<?php endif; ?>	
				
				<?php if (get_theme_mod( 'baw_instagram' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_instagram' )); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'baw_linkedin' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_linkedin' )); ?>"><i class="fa fa-linkedin"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'baw_rss' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_rss' )); ?>"><i class="fa fa-rss"></i></a>
				<?php endif; ?>
																			
				<?php if (get_theme_mod( 'baw_stumbleupon' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_stumbleupon' )); ?>"><i class="fa fa-stumbleupon"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_flickr' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_flickr' )); ?>"><i class="fa fa-flickr" aria-hidden="true"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_dribbble' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_dribbble' )); ?>"><i class="fa fa-dribbble"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_digg' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_digg' )); ?>"><i class="fa fa-digg"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_skype' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_skype' )); ?>"><i class="fa fa-skype"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_deviantart' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_deviantart' )); ?>"><i class="fa fa-deviantart"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_yahoo' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_yahoo' )); ?>"><i class="fa fa-yahoo"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_reddit_alien' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_reddit_alien' )); ?>"><i class="fa fa-reddit-alien"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_paypal' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_paypal' )); ?>"><i class="fa fa-paypal"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_dropbox' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_dropbox' )); ?>"><i class="fa fa-dropbox"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_soundcloud' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_soundcloud' )); ?>"><i class="fa fa-soundcloud"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_vk' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_vk' )); ?>"><i class="fa fa-vk"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_envelope' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_envelope' )); ?>"><i class="fa fa-envelope"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_address_book' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_book' )); ?>"><i class="fa fa-address-book" aria-hidden="true"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_address_apple' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_apple' )); ?>"><i class="fa fa-apple"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_address_amazon' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_amazon' )); ?>"><i class="fa fa-amazon"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_address_slack' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_slack' )); ?>"><i class="fa fa-slack"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_address_slideshare' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_slideshare' )); ?>"><i class="fa fa-slideshare"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_address_wikipedia' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_wikipedia' )); ?>"><i class="fa fa-wikipedia-w"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_address_wordpress' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_wordpress' )); ?>"><i class="fa fa-wordpress"></i></a>
				<?php endif; ?>
																							
				<?php if (get_theme_mod( 'baw_address_odnoklassniki' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_odnoklassniki' )); ?>"><i class="fa fa-odnoklassniki"></i></a>
				<?php endif; ?>
																											
				<?php if (get_theme_mod( 'baw_address_tumblr' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_tumblr' )); ?>"><i class="fa fa-tumblr"></i></a>
				<?php endif; ?>

				<?php if (get_theme_mod( 'baw_address_github' )) : ?>
					<a target="<?php if(esc_attr(get_theme_mod( 'baw_social_link_type' ))){echo esc_attr(get_theme_mod( 'baw_social_link_type' )); } else {echo "_self"; } ?>" href="<?php echo esc_url(get_theme_mod( 'baw_address_github' )); ?>"><i class="fa fa-github-alt" aria-hidden="true"></i></a>
				<?php endif; ?>	
				
			</div>
		
<?php } 


Kirki::add_section( 'baw_social_section', array(
    'title'          => __( 'Social Media', 'baw' ),
	'description' => __( 'Social media buttons', 'baw' ),	
    'priority'       => 64,
    'capability'     => 'edit_theme_options',
) );


Kirki::add_field( 'baw_options', array(
	'type'        => 'switch',
	'settings'    => 'social_media_activate',
	'label'       => __( 'Activate Social Icons in Footer', 'baw' ),
	'section'     => 'baw_social_section',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_html__( 'On', 'baw' ),
		'' => esc_html__( 'Off', 'baw' ),
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'select',
	'settings'    => 'baw_social_link_type',
	'label'       => __( 'Link Type', 'baw' ),
	'section'     => 'baw_social_section',
	'default'     => '',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'' => esc_html__( ' ', 'baw' ),
		'_self' => esc_html__( '_self', 'baw' ),
		'_blank' => esc_html__( '_blank', 'baw' ),		
	),
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'social_media_color',
	'label'       => __( 'Social Icons Color', 'baw' ),
	'section'     => 'baw_social_section',
) );

Kirki::add_field( 'baw_options', array(
	'type'        => 'color',
	'settings'    => 'social_media_hover_color',
	'label'       => __( 'Social Icons Hover Color', 'baw' ),
	'section'     => 'baw_social_section',
) );

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_facebook',
	'label'    => esc_attr__( 'Enter Facebook url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_twitter',
	'label'    => esc_attr__( 'Enter Twitter url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_google',
	'label'    => esc_attr__( 'Enter Google+ url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_linkedin',
	'label'    => esc_attr__( 'Enter Linkedin url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_rss',
	'label'    => esc_attr__( 'Enter RSS url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_pinterest',
	'label'    => esc_attr__( 'Enter Pinterest url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_youtube',
	'label'    => esc_attr__( 'Enter Youtube url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_vimeo',
	'label'    => esc_attr__( 'Enter Vimeo url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_instagram',
	'label'    => esc_attr__( 'Enter Ynstagram url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_stumbleupon',
	'label'    => esc_attr__( 'Enter Stumbleupon url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_flickr',
	'label'    => esc_attr__( 'Enter Flickr url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_dribbble',
	'label'    => esc_attr__( 'Enter Dribbble url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_digg',
	'label'    => esc_attr__( 'Enter Digg url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_skype',
	'label'    => esc_attr__( 'Enter Skype url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_deviantart',
	'label'    => esc_attr__( 'Enter Deviantart url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_yahoo',
	'label'    => esc_attr__( 'Enter Yahoo url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_reddit_alien',
	'label'    => esc_attr__( 'Enter Reddit Alien url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_paypal',
	'label'    => esc_attr__( 'Enter Paypal url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_dropbox',
	'label'    => esc_attr__( 'Enter Dropbox url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_soundcloud',
	'label'    => esc_attr__( 'Enter Soundcloud url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_vk',
	'label'    => esc_attr__( 'Enter VK url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_envelope',
	'label'    => esc_attr__( 'Enter Envelope url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_book',
	'label'    => esc_attr__( 'Enter Address Book url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_apple',
	'label'    => esc_attr__( 'Enter Apple url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_apple',
	'label'    => esc_attr__( 'Enter Amazon url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_apple',
	'label'    => esc_attr__( 'Enter Amazon url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_slack',
	'label'    => esc_attr__( 'Enter Slack url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_slideshare',
	'label'    => esc_attr__( 'Enter Slideshare url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_wikipedia',
	'label'    => esc_attr__( 'Enter Wikipedia url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_wordpress',
	'label'    => esc_attr__( 'Enter WordPress url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_odnoklassniki',
	'label'    => esc_attr__( 'Enter Odnoklassniki url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_tumblr',
	'label'    => esc_attr__( 'Enter Tumblr url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

Kirki::add_field( 'baw_options', array(
	'type'     => 'url',
	'settings' => 'baw_address_github',
	'label'    => esc_attr__( 'Enter GitHub url', 'baw' ),
	'section'  => 'baw_social_section',
	'default'  => '',
	'sanitize_callback' => 'esc_url_raw',	
) );	

/********************************************
* Social styles
*********************************************/ 	

function baw_social_method() {

        $social_media_color_mod = get_theme_mod( 'social_media_color' );
        $social_media_hover_color_mod = get_theme_mod( 'social_media_hover_color' );

		if($social_media_color_mod) { $social_media_color = ".social .fa-icons i, .social-top .fa {color: {$social_media_color_mod} !important;}";} else {$social_media_color ="";}
		if($social_media_hover_color_mod) { $social_media_hover_color = ".social .fa-icons i:hover, .social-top a:hover .fa {color: {$social_media_hover_color_mod} !important;}";} else {$social_media_hover_color ="";}

        wp_add_inline_style( 'black-and-white-style', 
		$social_media_color.$social_media_hover_color);
}
add_action( 'wp_enqueue_scripts', 'baw_social_method' );				
		