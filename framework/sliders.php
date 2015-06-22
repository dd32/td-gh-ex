<?php if( get_theme_mod('enable_slider', false) ) : ?>
<div id="slider-wrapper" class="flexslider">
	<ul class="slides">
	
		<?php if( get_theme_mod('slide_1', '' ) ): ?>
		<li>
			<img src="<?php echo get_theme_mod('slide_1', '' ); ?>">
			<p class="flex-caption"><?php echo get_theme_mod('slide_1_title', ''); ?></p>
		</li>
		<?php endif; ?>
		
		<?php if( get_theme_mod('slide_2', '' ) ): ?>
		<li>
			<img src="<?php echo get_theme_mod('slide_2', '' ); ?>">
			<?php if( get_theme_mod('slide_2_title', '') ): ?>
			<p class="flex-caption"><?php echo get_theme_mod('slide_2_title', ''); ?></p>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		
		<?php if( get_theme_mod('slide_3', '' ) ): ?>
		<li>
			<img src="<?php echo get_theme_mod('slide_3', ''); ?>">
			<?php if( get_theme_mod('slide_3_title', '') ): ?>
			<p class="flex-caption"><?php echo get_theme_mod('slide_3_title', ''); ?></p>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		
		<?php if( get_theme_mod('slide_4', '' ) ): ?>
		<li>
			<img src="<?php echo get_theme_mod('slide_4', '' ); ?>">
			<?php if( get_theme_mod('slide_4_title', '') ): ?>
			<p class="flex-caption"><?php echo get_theme_mod('slide_4_title', ''); ?></p>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		
		<?php if( get_theme_mod('slide_5', '' ) ): ?>
		<li>
			<img src="<?php echo get_theme_mod('slide_5', '' ); ?>">
			<?php if( get_theme_mod('slide_5_title', '') ): ?>
			<p class="flex-caption"><?php echo get_theme_mod('slide_5_title', ''); ?></p>
			<?php endif; ?>
		</li>
		<?php endif; ?>
	
	</ul>
</div><!-- #slider-wrapper -->
<?php endif; ?>