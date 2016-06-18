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
	'call_us'=> __( '201 567 8978' , 'spasalon' ),
	'call_us_text'=>__( 'Call us on' , 'spasalon' ),
	
	// slider settings
	'slider_bannerstrip_enable'=>'yes',
	'line_one'=>__('Get Yourself','spasalon'),
	'line_two'=>__('Refreshed','spasalon'),
	'description'=>__('Donec justo odio, lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla. Curabitur sed lectus nulla.lobortis eget congue sed, rutrum sit amet mauris. Curabitur sed lectus nulla rutrum sit amet mauris','spasalon'),
	'home_feature'=> get_template_directory_uri().'/images/default/home_banner.jpg',
	'first_thumb_image' => get_template_directory_uri().'/images/default/home_thumb.jpg',
	'second_thumb_image' => get_template_directory_uri().'/images/default/home_thumb.jpg',
	'third_thumb_image' => get_template_directory_uri().'/images/default/home_thumb.jpg',
	
	// services settings
	'tagline_title'=>__( 'Treatment we are offering' , 'spasalon' ),
	'tagline_contents'=>__( 'In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu,congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.' , 'spasalon' ),
	
	'service1_title'=>__('Spa Treatment','spasalon'),
	'service1_desc'=>__('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','spasalon'),
	'service1_image'=> get_template_directory_uri().'/images/default/home_service_thumb.jpg',
	
	'service2_title'=>__('Spa Treatment','spasalon'),
	'service2_desc'=>__('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','spasalon'),
	'service2_image'=> get_template_directory_uri().'/images/default/home_service_thumb.jpg',
	
	'service3_title'=>__('Spa Treatment','spasalon'),
	'service3_desc'=>__('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','spasalon'),
	'service3_image'=> get_template_directory_uri().'/images/default/home_service_thumb.jpg',
	
	'service4_title'=>__('Spa Treatment','spasalon'),
	'service4_desc'=>__('Pellen tesque habitant morbi tristique netus et malesuada fames ac turpis egestas In in massa urna, vitae vestibulum orci. yoursb Maecenas quis est sed mauris...','spasalon'),
	'service4_image'=> get_template_directory_uri().'/images/default/home_service_thumb.jpg',
	
	// project settings
	'product_title'=>__( 'Spasalon Our product rang' , 'spasalon' ),
	'product_contents'=>__( 'A Spasalon Produc Heading Title In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu, congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.' , 'spasalon' ),
	
	'product1_title'=>__('Product 1','spasalon'),
	'product1_desc'=>__('Pellentesque habitant...','spasalon'),
	'product1_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	'product2_title'=>__('Product 2','spasalon'),
	'product2_desc'=>__('Pellentesque habitant...','spasalon'),
	'product2_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	'product3_title'=>__('Product 3','spasalon'),
	'product3_desc'=>__('Pellentesque habitant...','spasalon'),
	'product3_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	'product4_title'=>__('Product 4','spasalon'),
	'product4_desc'=>__('Pellentesque habitant...','spasalon'),
	'product4_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	'product5_title'=>__('Product 5','spasalon'),
	'product5_desc'=>__('Pellentesque habitant...','spasalon'),
	'product5_image'=> get_template_directory_uri().'/images/default/home_product_thumb.jpg',
	
	// home page news settings
	'news_title'=>__('Our Latest News & Events','spasalon'),
	'news_contents'=>__('A spasalon Produc Heading Title In commodo pulvinar metus, id tristique massa ultrices at. Nulla auctor turpis ut mi pulvinar eu accumsan risus sagittis. Mauris nunc ligula, ullamcorper vitae accumsan eu, congue in nulla. Cras hendrerit mi quis nisi semper in sodales nisl faucibus. Sed quis quam eu ante ornare hendrerit.','spasalon'),
	'enable_news'=>'yes',
	);
}