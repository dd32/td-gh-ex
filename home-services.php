<!-- service section -->
<div class="enigma_service">
	<?php if ( ! empty( get_theme_mod( 'home_service_heading', 'Our Services' ) ) ) { ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="enigma_heading_title">
					<h3><?php esc_html_e( get_theme_mod( 'home_service_heading', 'Our Services' ), 'enigma' ); ?></h3>		
				</div>
			</div>
		</div>
	</div>	
	<?php } ?>
	<div class="container">
		<div class="row isotope" id="isotope-service-container">		
			<?php for($i=1; $i<4; $i++ ) { ?>
			<div class=" col-md-4 service">
				<div class="enigma_service_area appear-animation bounceIn appear-animation-visible">
					<?php if ( ! empty ( get_theme_mod( 'service_'.$i.'_icons', 'fa-database' ) ) ) { ?>
						<a href="<?php echo esc_url( get_theme_mod( 'service_'.$i.'_link', '#' ) ); ?>">
							<div class="enigma_service_iocn pull-left">
								<i class="<?php echo esc_attr( get_theme_mod( 'service_'.$i.'_icons', 'fa-database' ) ); ?>"></i>
							</div>
						</a>
					<?php } ?> 
					<div class="enigma_service_detail media-body">
						<?php if ( ! empty ( get_theme_mod( 'service_'.$i.'_title', 'Idea' ) ) ) { ?>
							<h3 class="head_<?php echo esc_attr( $i ) ?>">
								<a href="<?php echo esc_url( get_theme_mod( 'service_'.$i.'_link', '#' ) ); ?>">
									<?php echo esc_html( get_theme_mod( 'service_'.$i.'_title', 'Idea' ) ); ?>
								</a>
							</h3>
						<?php } if ( ! empty ( get_theme_mod( 'service_'.$i.'_text', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.' ) ) ) { ?>
							<p>
								<?php echo wp_kses_post( get_theme_mod( 'service_'.$i.'_text', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.' ) ); ?>
							</p>
						<?php } if ( ! empty ( get_theme_mod( 'service_'.$i.'_youtube' ) ) ) { ?>
							<iframe width="200" height="200" src="<?php echo esc_url( get_theme_mod( 'service_'.$i.'_youtube' ) ); ?>" frameborder="0"></iframe>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>	 
<!-- /Service section -->