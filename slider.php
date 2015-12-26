
 <div id="slider-wrapper" class="container">
	<ul class="bxslider">
		<?php 
		for($i = 1; $i <= 3; $i++) { 
			$s = 'attirant-slide_' . $i;
			$d = 'attirant-desc-' . $i;
			$u = 'attirant-url-' . $i;
		?>	
			<li><div class="slide"><a href="<?php echo esc_url( get_theme_mod($u) ); ?>">		
				<img src="<?php echo get_theme_mod( $s ); ?>">	
			</a><div class="slide_caption"><a href="<?php echo esc_url( get_theme_mod($u) ); ?>"><p><?php echo __(get_theme_mod($d), 'attirant' ); ?> </p></a></div></div>
			 </li>
		<?php } ?>
	</ul>
</div>