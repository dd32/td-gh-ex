<?php

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

/*-----------------------------------------------------------------------------------*/
/* Socials */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('alhena_lite_socials_function')) {

	function alhena_lite_socials_function() {

		$allowed = array(
			'a' => array(
				'href' => array(),
				'title' => array(),
				'class' => array(),
				'target' => array()
			),
			'i' => array(
				'class' => array(),
			)
		);

		$socials = array ( 
			
			"facebook" => array( "icon" => "fa fa-facebook" , "target" => "_blank" ),
			"twitter" => array( "icon" => "fa fa-twitter" , "target" => "_blank" ),
			"flickr" => array( "icon" => "fa fa-flickr" , "target" => "_blank" ),
			"linkedin" => array( "icon" => "fa fa-linkedin" , "target" => "_blank" ),
			"pinterest" => array( "icon" => "fa fa-pinterest" , "target" => "_blank" ),
			"tumblr" => array( "icon" => "fa fa-tumblr" , "target" => "_blank" ),
			"youtube" => array( "icon" => "fa fa-youtube" , "target" => "_blank" ),
			"vimeo" => array( "icon" => "fa fa-vimeo" , "target" => "_blank" ),
			"skype" => array( "icon" => "fa fa-skype" , "target" => "_self" ),
			"instagram" => array( "icon" => "fa fa-instagram" , "target" => "_blank" ),
			"deviantart" => array( "icon" => "fa fa-deviantart" , "target" => "_blank" ),
			"github" => array( "icon" => "fa fa-github" , "target" => "_blank" ),
			"xing" => array( "icon" => "fa fa-xing" , "target" => "_blank" ),
			"whatsapp" => array( "icon" => "fa fa-whatsapp" , "target" => "_self" ),
			"telegram" => array( "icon" => "fa fa-telegram" , "target" => "_self" ),
			"email" => array( "icon" => "fa fa-envelope" , "target" => "_self" ),
		
		);

		$i = 0;
		$html = "";
		
		foreach ( $socials as $k => $v) { 
		
			if ( alhena_lite_setting('wip_footer_'.$k.'_button') ): 
			
				$i++;	
				$html.= '<a href="'.esc_url(alhena_lite_setting('wip_footer_'.$k.'_button'), array( 'http', 'https', 'tel', 'skype', 'mailto' )).'" target="'.$v['target'].'" title="'.ucfirst($k).'" class="social"><i class="'.$v['icon'].'" ></i></a> ';
			
			endif;
			
		}
		
		if ( alhena_lite_setting('wip_footer_rss_button') == "on" ): 
		
			$i++;	
			$html.= '<a href="'. esc_url(get_bloginfo('rss2_url')). '" title="Rss" class="social rss"> <i class="fa fa-rss" ></i>  </a> ';
		
		endif; 
			
		if ( $i > 0 ) {
			
			echo wp_kses($html, $allowed);
	
		}
		
	}
	
	add_action( 'alhena_lite_socials', 'alhena_lite_socials_function', 10, 2 );

}

?>