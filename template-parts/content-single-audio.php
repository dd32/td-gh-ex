<?php
/**
 * Template part for displaying single post audio format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package anorya
 */
 
 
	if($anorya_audio_url = get_post_meta($post->ID,'anorya_a_url',true)):?>
	<div class="full-width-post-audio-container">
		<?php 
			$embedCode = wp_oembed_get(esc_url_raw($anorya_audio_url));
			
			//clean embed code from obsolete attributes
			$embedCode = preg_replace('/scrolling="(.*?)"/', '', $embedCode);
			$embedCode = preg_replace('/frameborder="(.*?)"/', '', $embedCode);
			
			print  $embedCode;
		?>
	</div>
	<?php endif; ?>
