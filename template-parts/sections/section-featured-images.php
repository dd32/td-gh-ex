<?php
/**
 *
 * Featured section
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Acoustics
 * @version     1.0.0
 *
 */
 ?>
 <div id="section_featured" class="section-featured section--featured-image">
	 <div class="container">
		 <div class="row">
			 <?php
				 $acoustics_featured_image = get_theme_mod( 'acoustics_featured_image_0' );
				 $acoustics_featured_title = get_theme_mod( 'acoustics_featured_title_0' );
				 $acoustics_featured_details = get_theme_mod( 'acoustics_featured_details_0' );
				 $acoustics_featured_link = get_theme_mod( 'acoustics_featured_link_0' );
				 if( !empty( $acoustics_featured_image ) ): ?>
					 <div class="col-md-7 col-sm-6 col-xs-12">
						<figure class="block-featured-main">
							<img width="660"
								 src="<?php  echo esc_url( $acoustics_featured_image ); ?>"
								 alt="<?php echo esc_html( $acoustics_featured_title ); ?>">
							<?php
								if( !empty( $acoustics_featured_title ) or !empty( $acoustics_featured_details ) ): ?>
									<figcaption>
										<?php if( !empty( $acoustics_featured_title ) ): ?>
											<h2 class="h1 title"><?php echo esc_html( $acoustics_featured_title ); ?></h2>
										<?php endif; ?>
										<?php if( !empty( $acoustics_featured_details ) ): ?>
											<div class="rte rte-settings">
												<?php echo esc_html( $acoustics_featured_details ); ?>
											</div>
										<?php endif; ?>
										<?php if( !empty( $acoustics_featured_link ) ): ?>
										<a href="<?php esc_url( $acoustics_featured_link ); ?>" class="btn btn-primary"><?php esc_html_e( 'Shop Now', 'acoustics' ); ?></a>
										<?php endif; ?>
									</figcaption>
							<?php endif; ?>
						</figure>
					</div>
					<?php
				endif;
			?>
			<div class="col-md-5 col-sm-6 col-xs-12">
				<?php
					for( $i=1; $i<3; $i++){
						$acoustics_featured_image = get_theme_mod( 'acoustics_featured_image_'.$i );
						$acoustics_featured_title = get_theme_mod( 'acoustics_featured_title_'.$i );
	   				 	$acoustics_featured_details = get_theme_mod( 'acoustics_featured_details_'.$i );
						if( ! empty( $acoustics_featured_image ) ): ?>
								<figure class="block-featured-item">
									<?php if( ! empty( $acoustics_featured_link ) ): ?>
										<a href="<?php esc_url( $acoustics_featured_link ); ?>" class="block--featured-item-link">
									<?php endif; ?>
									<img width="460"
										 src="<?php  echo esc_url( $acoustics_featured_image ); ?>"
										 alt="<?php echo esc_html( $acoustics_featured_title ); ?>">
									<?php
										if( !empty( $acoustics_featured_title ) or !empty( $acoustics_featured_details ) ): ?>
											<figcaption>
												<?php if( !empty( $acoustics_featured_title ) ): ?>
													<h3 class="h3 title"><?php echo esc_html( $acoustics_featured_title ); ?></h3>
												<?php endif; ?>
												<?php if( !empty( $acoustics_featured_details ) ): ?>
													<div class="rte rte-settings">
														<?php echo esc_html( $acoustics_featured_details ); ?>
													</div>
												<?php endif; ?>
											</figcaption>
									<?php endif; ?>
									<?php if( !empty( $acoustics_featured_link ) ): ?>
									</a>
									<?php endif; ?>
								</figure>
							<?php
						endif;
					}
				?>
			</div>
		</div>
	</div>
 </div>
