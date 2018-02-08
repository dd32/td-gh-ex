<!-- Start Statics -->
<div id="statics">
	<div class="container">
		<div class="row  no-margin">
			<div class="statics">
				<?php for( $i = 1; $i <= 3; $i++ ) : ?>
					<?php $icon = get_theme_mod( 'counter_icon_'.$i, '' ); ?>
					<?php $value = get_theme_mod( 'counter_value_'.$i, 0 ); ?>
					<?php $title = get_theme_mod( 'counter_title_'.$i, '' ); ?>
					<!-- Static Single -->
					<div class="col-md-4 col-sm-4 col-xs-12 static-single<?php if( $i == 2 ) echo ' active'; ?>">
						<div class="icon">
							<i class="<?php echo esc_attr( $icon ); ?>"></i>
						</div>
						<div class="s-info">
							<div class="number"><span class="counter"><?php echo esc_html( $value ); ?></span></div>
							<p><?php echo esc_html( $title ); ?></p>
						</div>
					</div>
					<!-- End Single -->
				<?php endfor; ?>				
			</div>
		</div>
	</div>
</div>	
<!--/ End Statics -->