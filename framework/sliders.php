<?php if( get_theme_mod('agama_enable_slider', false) ) : ?>
<div id="slider-wrapper" class="flexslider">
	<ul class="slides">
	
		<?php if( get_theme_mod('agama_slide_1', '' ) ): ?>
		<li>
			<img src="<?php echo esc_url( get_theme_mod('agama_slide_1', '' ) ); ?>">
			<?php if( get_theme_mod('agama_slide_1_title', '') ): ?>
			<h1 class="slide-title"><?php echo esc_html( get_theme_mod('agama_slide_1_title', '') ); ?></h1>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		
		<?php if( get_theme_mod('agama_slide_2', '' ) ): ?>
		<li>
			<img src="<?php echo esc_url( get_theme_mod('agama_slide_2', '' ) ); ?>">
			<?php if( get_theme_mod('agama_slide_2_title', '') ): ?>
			<h1 class="slide-title"><?php echo esc_html( get_theme_mod('agama_slide_2_title', '') ); ?></h1>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		
		<?php if( get_theme_mod('agama_slide_3', '' ) ): ?>
		<li>
			<img src="<?php echo esc_url( get_theme_mod('agama_slide_3', '') ); ?>">
			<?php if( get_theme_mod('agama_slide_3_title', '') ): ?>
			<h1 class="slide-title"><?php echo esc_html( get_theme_mod('agama_slide_3_title', '') ); ?></h1>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		
		<?php if( get_theme_mod('agama_slide_4', '' ) ): ?>
		<li>
			<img src="<?php echo esc_url( get_theme_mod('agama_slide_4', '' ) ); ?>">
			<?php if( get_theme_mod('agama_slide_4_title', '') ): ?>
			<h1 class="slide-title"><?php echo esc_html( get_theme_mod('agama_slide_4_title', '') ); ?></h1>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		
		<?php if( get_theme_mod('agama_slide_5', '' ) ): ?>
		<li>
			<img src="<?php echo esc_url( get_theme_mod('agama_slide_5', '' ) ); ?>">
			<?php if( get_theme_mod('agama_slide_5_title', '') ): ?>
			<h1 class="slide-title"><?php echo esc_html( get_theme_mod('agama_slide_5_title', '') ); ?></h1>
			<?php endif; ?>
		</li>
		<?php endif; ?>
	
	</ul>
</div><!-- #slider-wrapper -->
<?php endif; ?>