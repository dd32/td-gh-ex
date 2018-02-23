<?php
/**
 * Template part for displaying single post gallery format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package anorya
 */

	
	if(has_post_format('gallery')): 

		$anorya_post_gallery_array  = rwmb_meta( 'anorya_g', 'type=image&size=anorya_xlarge' ); 
	
	?>
	
		<div id="gallery_post<?php echo esc_html($post->ID); ?>" class="full-width-post-gallery-container owl-carousel owl-theme">
			<?php
				foreach ($anorya_post_gallery_array as $anorya_attachment_id): ?>
					<div class="full-width-post-gallery-item">
						<?php echo '<img class="img-responsive" src="'.esc_url_raw($anorya_attachment_id['url']).'" alt="'.esc_html($anorya_attachment_id['alt']).'" />'   ?>
					</div>
				<?php endforeach; ?>
		</div>
	<?php endif; ?>	