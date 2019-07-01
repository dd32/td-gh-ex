<?php
/**
 *
 * Proposition section
 *
 * @author      CodeGearThemes
 * @category    WordPress
 * @package     Acoustics
 * @version     1.0.0
 *
 */
?>
<div id="section_porposition" class="section-proposition section--porposition-imagetext" style="background: #000;">
    <div class="container">
      <div class="row">
		  	<?php
			for( $i=0; $i<4; $i++ ):
				$acoustics_proposition_icon = get_theme_mod( 'acoustics_values_section_image_'.$i );
				$acoustics_proposition_title = get_theme_mod( 'acoustics_values_section_title_'.$i );
				$acoustics_proposition_content = get_theme_mod( 'acoustics_values_section_details_'.$i ); ?>
		            <div class="col-md-3 col-sm-6 col-xs-6 proposition-block">
		              <div class="proposition-item">
						  	<?php if( !empty( $acoustics_proposition_icon ) ): ?>
			                    <div class="proposition--item-thumb">
			                      <img width="40" class="proposition--item-icon" src="<?php echo esc_url( $acoustics_proposition_icon ); ?>" alt="<?php echo $acoustics_proposition_title; ?>">
			                    </div>
							<?php endif; ?>
							<?php if( !empty( $acoustics_proposition_title ) || !empty( $acoustics_proposition_content ) ): ?>
				                <div class="proposition--item-caption">
								  <?php if( ! empty( $acoustics_proposition_title ) ): ?>
				                  	<h5 class="proposition--item-title"><?php echo esc_html( $acoustics_proposition_title ); ?></h5>
								  <?php endif; ?>
								  <?php if( ! empty( $acoustics_proposition_content ) ): ?>
				                  	<p class="proposition--item-desc"><?php echo esc_html( $acoustics_proposition_content ); ?></p>
								  <?php endif; ?>
				                </div>
							<?php endif; ?>
		              </div>
		            </div>
				<?php
			endfor;
		?>
      </div>
    </div>
  </div>
