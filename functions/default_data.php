<?php 
function default_data(){
	return array(
	
	// general settings
	'spa_bannerstrip_enable' => 'yes',
	'upload_image'=> '',
	'height'=>35,
	'width'=>150,
	'color_scheme_style'=>'default.css',
	'spa_custom_css'=>'',
	'enable_logo_text'=>false,
	
	// footer copyright
	'footer_tagline'=>'&copy; Copyright 2016. All Rights Reserved by <a href="#">Webriti</a>',
	
	// home page settings
	'call_us'=> __( '201 567 8978' , 'sis_spa' ),
	'call_us_text'=>__( 'Call us on' , 'sis_spa' ),
	
	// slider settings
	'slider_bannerstrip_enable'=>'yes',
	'line_one'=>__('Get Yourself','sis_spa'),
	'line_two'=>__('Refreshed','sis_spa'),
	'description'=>__('Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris','sis_spa'),
	'home_feature'=> get_template_directory_uri().'/images/default/home_banner.jpg',
	'first_thumb_image' => get_template_directory_uri().'/images/default/home_thumb.jpg',
	'second_thumb_image' => get_template_directory_uri().'/images/default/home_thumb.jpg',
	'third_thumb_image' => get_template_directory_uri().'/images/default/home_thumb.jpg',
	
	// services settings
	'tagline_title'=>__( 'Treatment we are offering' , 'sis_spa' ),
	'tagline_contents'=>__( 'In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu,congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.' , 'sis_spa' ),
	
	'service1_title'=>__('Spa Treatment','sis_spa'),
	'service1_desc'=>__('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','sis_spa'),
	'service1_image'=> get_template_directory_uri().'/images/default/home_service_thumb.jpg',
	
	'service2_title'=>__('Spa Treatment','sis_spa'),
	'service2_desc'=>__('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','sis_spa'),
	'service2_image'=> get_template_directory_uri().'/images/default/home_service_thumb.jpg',
	
	'service3_title'=>__('Spa Treatment','sis_spa'),
	'service3_desc'=>__('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','sis_spa'),
	'service3_image'=> get_template_directory_uri().'/images/default/home_service_thumb.jpg',
	
	'service4_title'=>__('Spa Treatment','sis_spa'),
	'service4_desc'=>__('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','sis_spa'),
	'service4_image'=> get_template_directory_uri().'/images/default/home_service_thumb.jpg',
	
	// project settings
	'product_title'=>__( 'Spasalon Our product rang' , 'sis_spa' ),
	'product_contents'=>__( 'A Spasalon Produc Heading Title In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu, congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.' , 'sis_spa' ),
	
	'product1_title'=>__('Product 1','sis_spa'),
	'product1_desc'=>__('Pellentesque habitant...','sis_spa'),
	'product1_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	'product2_title'=>__('Product 2','sis_spa'),
	'product2_desc'=>__('Pellentesque habitant...','sis_spa'),
	'product2_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	'product3_title'=>__('Product 3','sis_spa'),
	'product3_desc'=>__('Pellentesque habitant...','sis_spa'),
	'product3_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	'product4_title'=>__('Product 4','sis_spa'),
	'product4_desc'=>__('Pellentesque habitant...','sis_spa'),
	'product4_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	'product5_title'=>__('Product 5','sis_spa'),
	'product5_desc'=>__('Pellentesque habitant...','sis_spa'),
	'product5_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	// home page news settings
	'news_title'=>__('Our Latest News & Events','sis_spa'),
	'news_contents'=>__('A spasalon Produc Heading Title In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu, congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','sis_spa'),
	'enable_news'=>'yes',
	
	// typography settings
	
	'h1_size'=>36,
	'h1_fontfamily'=>'Roboto',
	'h1_fontstyle'=>'normal',
	
	'h2_size'=>30,
	'h2_fontfamily'=>'Roboto',
	'h42_fontstyle'=>'normal',
	
	'h3_size'=>24,
	'h3_fontfamily'=>'Roboto',
	'h3_fontstyle'=>'normal',
	
	'h4_size'=>18,
	'h4_fontfamily'=>'Roboto',
	'h4_fontstyle'=>'normal',
	
	'h5_size'=>14,
	'h5_fontfamily'=>'Roboto',
	'h5_fontstyle'=>'normal',
	
	'h6_size'=>12,
	'h6_fontfamily'=>'Roboto',
	'h6_fontstyle'=>'normal',
	
	'home_section_title_fontsize'=>42,
	'home_section_title_fontfamily'=>'MarketingScript',
	'home_section_title_fontstyle'=>'normal',
	
	'home_section_desc_fontsize'=>16,
	'home_section_desc_fontfamily'=>'Droid Serif',
	'home_section_desc_fontstyle'=>'italic',
	
	'menu_title_fontsize'=>15,
	'menu_title_fontfamily'=>'Raleway',
	'menu_title_fontstyle'=>'normal',
	
	'post_title_fontsize'=>18,
	'post_title_fontfamily'=>'Roboto',
	'post_title_fontstyle'=>'normal',
	
	'postexcerpt_title_fontsize'=>15,
	'postexcerpt_fontfamily'=>'Roboto',
	'postexcerpt_fontstyle'=>'normal',
	
	'widget_title_fontsize'=>18,
	'widget_title_fontfamily'=>'Roboto',
	'widget_title_fontstyle'=>'normal',
	
	
	// categories slugs
	'spa_slider_slug' => 'spa-slider',
	'spa_services_slug' => 'spa-service',
	'spa_service_category_slug' => 'service-categories',
	'spa_team_slug' => 'spa-team',
	'spa_products_slug' => 'spa-products',
	'spa_products_category_slug' => 'product-categories',
	
	// banner settings for archive
	'banner_title_one_category'=>__( 'GET YOURSELF' , 'sis_spa' ),
	'banner_title_two_category'=>__( 'REFRESHED' , 'sis_spa' ),
	'banner_description_category'=>__( 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris' , 'sis_spa' ),
	
	'banner_title_one_author'=>__( 'GET YOURSELF' , 'sis_spa' ),
	'banner_title_two_author'=>__( 'REFRESHED' , 'sis_spa' ),
	'banner_description_author'=>__( 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris' , 'sis_spa' ),
	
	'banner_title_one_404'=>__( 'GET YOURSELF' , 'sis_spa' ),
	'banner_title_two_404'=>__( 'REFRESHED' , 'sis_spa' ),
	'banner_description_404'=>__( 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris' , 'sis_spa' ),
	
	'banner_title_one_tag'=>__( 'GET YOURSELF' , 'sis_spa' ),
	'banner_title_two_tag'=>__( 'REFRESHED' , 'sis_spa' ),
	'banner_description_tag'=>__( 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris' , 'sis_spa' ),
	
	'banner_title_one_search'=>__( 'GET YOURSELF' , 'sis_spa' ),
	'banner_title_two_search'=>__( 'REFRESHED' , 'sis_spa' ),
	'banner_description_search'=>__( 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris' , 'sis_spa' ),
	
	'banner_title_one_woo'=>__( 'GET YOURSELF' , 'sis_spa' ),
	'banner_title_two_woo'=>__( 'REFRESHED' , 'sis_spa' ),
	'banner_description_woo'=>__( 'Banner Description Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris' , 'sis_spa' ),
	
	'front_page_data'=>'slider,Service Section,product section,news',
	
	);
}