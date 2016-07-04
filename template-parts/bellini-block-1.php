<?php 
/*--------------------------------------------------------------
## Block One 
--------------------------------------------------------------*/
if (get_option('bellini_feature_block_image_one') or get_option('bellini_feature_block_title_one') or get_option('bellini_feature_block_content_one') ): ?>
<div class="<?php echo esc_attr(get_option('bellini_feature_block_row', 'col-sm-4' ));?>">
<div class="feature-block__inner text-center">
	<?php 
	// Block Image
	if (get_option('bellini_feature_block_image_one') == true): ?>
		<img src="<?php echo esc_url(get_option('bellini_feature_block_image_one'));?>" >
	<?php endif; ?>
	<div class="block-one feature-block__content">
	<?php 
	// Block Title
	if(get_option('bellini_feature_block_title_one') == true):?>
		<h2 class="block-title">
		<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_feature_block_title_one')));?>			
		</h2>
	<?php endif;?>
	<?php
	// Block Content
	if (get_option('bellini_feature_block_content_one') == true): ?>
		<p>
			<?php echo do_shortcode(wp_kses_post(get_option('bellini_feature_block_content_one'))); ?>
		</p>
	<?php endif; ?>
	</div>
</div>
</div>
<?php endif;?>


<?php
/*--------------------------------------------------------------
## Block Two
--------------------------------------------------------------*/ 
if (get_option('bellini_feature_block_image_two') or get_option('bellini_feature_block_title_two') or get_option('bellini_feature_block_content_two') ): ?>
<div class="<?php echo esc_attr(get_option('bellini_feature_block_row', 'col-sm-4' ));?>">
<div class="feature-block__inner text-center">
	<?php 
	// Block Image
	if (get_option('bellini_feature_block_image_two') == true): ?>
		<img src="<?php echo esc_url(get_option('bellini_feature_block_image_two'));?>">
	<?php endif; ?>
	<div class="block-two feature-block__content">
	<?php 
	// Block Title
	if(get_option('bellini_feature_block_title_two') == true):?>
		<h2 class="block-title">
			<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_feature_block_title_two')));?>		  		
		</h2>
	<?php endif;?>
	<?php 
	// Block Content
	if (get_option('bellini_feature_block_content_two' ) == true): ?>
		<p>
			<?php echo do_shortcode(wp_kses_post(get_option('bellini_feature_block_content_two'))); ?>
		</p>
	<?php endif; ?>
	</div>
</div>
</div>
<?php endif;?>


<?php 
/*--------------------------------------------------------------
## Block Three
--------------------------------------------------------------*/
if (get_option('bellini_feature_block_image_three') or get_option('bellini_feature_block_title_three') or get_option('bellini_feature_block_content_three') ): ?>
<div class="<?php echo esc_attr(get_option('bellini_feature_block_row', 'col-sm-4' ));?>">
<div class="feature-block__inner text-center">
	<?php 
	// Block Image
	if (get_option('bellini_feature_block_image_three') == true): ?>
		<img src="<?php echo esc_url(get_option('bellini_feature_block_image_three'));?>">
	<?php endif; ?>
	<div class="block-three feature-block__content">
	<?php 
	// Block Title
	if(get_option('bellini_feature_block_title_three') == true):?>
		<h2 class="block-title">
		  	<?php echo do_shortcode(wp_kses_post(get_option( 'bellini_feature_block_title_three')));?>		  		
		</h2>
	<?php endif;?>
	<?php 
	// Block Content
	if (get_option('bellini_feature_block_content_three') == true): ?>
		<p>
			<?php echo do_shortcode(wp_kses_post(get_option('bellini_feature_block_content_three'))); ?>
		</p>
	<?php endif; ?>
	</div>
</div>
</div>
<?php endif;?>