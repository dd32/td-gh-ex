<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_excerpt_function')) {

	function suevafree_excerpt_function() {
		
		global $post,$more;

		$allowed = array(
			'span' => array(
				'class' => array(),
			),
		);

		$more = 0;
		
		$class = 'button ' . suevafree_setting('suevafree_readmore_layout');
		$button = esc_html__('Read More','suevafree');
		$container = 'class="read-more"';

		if ( ( suevafree_setting('suevafree_readmore_layout') == "default" ) || ( suevafree_setting('suevafree_readmore_layout') == "sneak" ) || ( ! suevafree_setting('suevafree_readmore_layout')) ) : 
		
			$class = 'button ' . suevafree_setting('suevafree_readmore_layout');
			$button = esc_html__('Read More','suevafree');
			$container = 'class="read-more"';

		else :

			$class = 'nobutton';
			$button = ' [&hellip;] ';
			$container = '';

		endif;
	
		if ($pos=strpos($post->post_content, '<!--more-->')): 
		
			$content = substr(apply_filters( 'the_content', get_the_content()), 0, -5);
		
		else:
		
			$content = substr(apply_filters( 'the_excerpt', get_the_excerpt()), 0, -5);
		
		endif;

		echo $content. '<a '. wp_kses($container, $allowed) . ' href="' . esc_url(get_permalink($post->ID)) . '" title="'.esc_html__('Read More','suevafree').'"> <span class="'.esc_attr($class).'">'.$button.'</span></a>';

	}

	add_action( 'suevafree_excerpt', 'suevafree_excerpt_function', 10, 2 );

}

?>