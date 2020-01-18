<div class="enigma_callout_area" id="callout">
	<div class="container">
		<div class="row">
			<?php 
			$fc_title = get_theme_mod( 'fc_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ' );
			if ( ! empty ( $fc_title ) ) { ?>
				<div class="col-md-9">
				<p>
					<?php 
					$fc_icon = get_theme_mod( 'fc_icon', 'fa fa-thumbs-up' );
					if ( ! empty ( $fc_icon ) ) { ?>
					<i class="<?php echo esc_attr( get_theme_mod( 'fc_icon', 'fa fa-thumbs-up' ) ) ?>"></i>
					<?php } echo esc_html( get_theme_mod( 'fc_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ' ), 'enigma' );?>
				</p>
				</div>
			<?php } 
			$fc_btn_txt = get_theme_mod( 'fc_btn_txt', 'More Features' );
			if ( ! empty ( $fc_btn_txt ) ) { ?>
				<div class="col-md-3">
					<a href="<?php echo esc_url( get_theme_mod( 'fc_btn_link', '#' ) ); ?>" class="enigma_callout_btn"><?php echo esc_html( get_theme_mod( 'fc_btn_txt', 'More Features' ), 'enigma' ); ?></a>
				</div>
			<?php } ?>
		</div>		
	</div>
	<div class="enigma_callout_shadow"></div>
</div>