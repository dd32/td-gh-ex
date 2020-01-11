<div class="enigma_callout_area" id="callout">
	<div class="container">
		<div class="row">
		<?php if ( ! empty ( get_theme_mod( 'fc_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ' ) ) ) { ?>
			<div class="col-md-9">
			<p>
				<?php if ( ! empty ( get_theme_mod( 'fc_icon', 'fa fa-thumbs-up' ) ) ) { ?>
				<i class="<?php echo esc_attr( get_theme_mod( 'fc_icon', 'fa fa-thumbs-up' ) ) ?>"></i>
				<?php } esc_html_e( get_theme_mod( 'fc_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ' ), 'enigma' );?>
			</p>
			</div>
			<?php } if ( ! empty ( get_theme_mod( 'fc_btn_txt', 'More Features' ) ) ) { ?>
			<div class="col-md-3">
			<a href="<?php echo esc_url( get_theme_mod( 'fc_btn_link', '#' ) ); ?>" class="enigma_callout_btn"><?php esc_html_e( get_theme_mod( 'fc_btn_txt', 'More Features' ), 'enigma' ); ?></a>
			</div>
			<?php } ?>
		</div>		
	</div>
	<div class="enigma_callout_shadow"></div>
</div>