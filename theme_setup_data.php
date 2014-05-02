<?php
/**
* @Theme Name	:	Quality
* @file         :	theme_stup_data.php
* @package      :	Quality
* @author       :	Vibhor
* @license      :	license.txt
* @filesource   :	wp-content/themes/quality/theme_stup_data.php
*/
function theme_data_setup()
{	
	
	return $theme_options=array(
			//Logo and Fevicon header			
			'front_page'  => 'on',
			'home_feature' => WEBRITI_TEMPLATE_DIR_URI .'/images/slider/slide.png',
			'upload_image_logo'=>'',
			'height'=>'80',
			'width'=>'200',
			'text_title'=>'on',
			'upload_image_favicon'=>'',	
			
			'service_title'=>'What We Do',
			'service_description' =>'We provide best WordPress solutions for your business. Thanks to our framework you will get more happy customers.',
			
			'service_enable' => 'on',
			'service_one_title' => 'Fully Responsive',
			'service_two_title' => 'SEO Friendly',
			'service_three_title' => 'Easy Customization',
			'service_four_title' => 'Well Documentation',
			
			'service_one_icon' => 'fa fa-shield',
			'service_two_icon' => 'fa fa-tablet',
			'service_three_icon' => 'fa fa-edit',
			'service_four_icon' => 'fa fa-star-half-o',
			
			'service_one_text' => 'Lorem Ipsum which looks reason able. The generated Lorem Ipsum is ',
			'service_two_text' => 'Lorem Ipsum Lorem Ipsum which looks reason able. The generated Lorem Ipsum is which looks reason able. The generated Lorem Ipsum is ',
			'service_three_text' => 'fLorem Ipsum which looks reason able. The generated Lorem Ipsum is t',
			'service_four_text' => 'Lorem Ipsum which looks reason able. The generated Lorem Ipsum is-o',
			
			'webrit_custom_css'=>'',						
			'footer_customizations' => '&copy; 2014 <span> Quality </span>. Design & Developed by',
			'created_by_webriti_text' => 'Webriti',
			'created_by_link' => 'http://www.webriti.com',
		);
}
?>