<?php
/*
	Front Page
	AssociationX Theme's Front Page to Display the Home Page if Selected
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/

get_header();
$fp_sections = array( 
		'frdlinks' 		=> 	esc_html__('Featured Links', 'associationx'),
		'about' 		=> 	esc_html__('About Us', 'associationx'),
		'featured' 		=> 	esc_html__('Featured Box', 'associationx'), 
		'noticeboard' 	=> 	esc_html__('Noticeboard and News', 'associationx'),
		'ecom'			=>	esc_html__('E-Commerce/WooCommerce', 'associationx'),
		'event'			=> 	esc_html__('Event Box', 'associationx'), 
		'staffs' 		=> 	esc_html__('Member Box', 'associationx'),
		'pagec'			=>	esc_html__('Specific Page Content', 'associationx'),		
		'wpblog' 		=> 	esc_html__('Blog/Page Index (WP Settings)', 'associationx'),
		'testimonial' 	=> 	esc_html__('Members Testimonials', 'associationx')
	);

foreach ( $fp_sections as $key => $value ) { 
	get_template_part( 'fpcontents/fp', $key ); 
}
get_footer();