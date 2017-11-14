<?php
/**
 * Template part for displaying single post video format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package anorya
 */
 
	if($anorya_video_url = get_post_meta($post->ID,'anorya_v_url',true)):?>
	<div class="full-width-post-video-container">
		<?php 
			$embedCode = wp_oembed_get(esc_url_raw($anorya_video_url)); 
			
			//clean embed frame code from obsolete attributes
			$embedCode = preg_replace('/scrolling="(.*?)"/', '', $embedCode);
			$embedCode = preg_replace('/frameborder="(.*?)"/', '', $embedCode);
			$embedCode = preg_replace('/gesture="(.*?)"/', '', $embedCode);
			
			print  $embedCode;
		?>
	</div>
	<?php endif; ?>
