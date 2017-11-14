<?php
/**
 * Template part for displaying single post gallery format
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package anorya
 */


 
 
	if(get_post_meta($post->ID,'anorya_g',true)): 
		$anorya_post_gallery_array = explode(',',get_post_meta($post->ID,'anorya_g',true));
		
	?>
	
		<div id="gallery_post<?php echo esc_html($post->ID); ?>" class="full-width-post-gallery-container owl-carousel owl-theme">
			
				<?php
				foreach ($anorya_post_gallery_array as $key => $anorya_attachment_id): ?>
					<div class="full-width-post-gallery-item">
						<?php echo wp_get_attachment_image( $anorya_attachment_id, 'anorya_xlarge', "", array( "class" => "img-responsive" ) ); ?>
					</div>
				<?php endforeach; ?>	
				
		</div>
	
	<?php endif; ?>