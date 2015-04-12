<?php
if ( ! function_exists( 'fmi_slider' ) ) :
/**
 * display featured post slider
 */
function fmi_slider() { ?>
	<div class="slider-wrap">
		<div class="slider-cycle">
			<?php
			for( $i = 1; $i <= 4; $i++ ) {
				$fmi_slider_title = of_get_option( 'fmi_slider_title'.$i , '' );
				$fmi_slider_text = of_get_option( 'fmi_slider_text'.$i , '' );
				$fmi_slider_image = of_get_option( 'fmi_slider_image'.$i , '' );
				$fmi_slider_link = of_get_option( 'fmi_slider_link'.$i , '#' );

				if( !empty( $fmi_slider_image ) ) {
					if ( $i == 1 ) { $fmi_classes = "slides displayblock"; } else { $fmi_classes = "slides displaynone"; }
					?>
					<section id="featured-slider" class="<?php echo $fmi_classes; ?>">
						<figure class="slider-image-wrap">
							<img alt="<?php echo esc_attr( $fmi_slider_title ); ?>" src="<?php echo esc_url( $fmi_slider_image ); ?>">
					    </figure>
					    <?php if( !empty( $fmi_slider_title ) || !empty( $fmi_slider_text ) ) { ?>
						    <article id="slider-text-box">
					    		<div class="inner-wrap">
						    		<div class="slider-text-wrap">
						    			<?php if( !empty( $fmi_slider_title )  ) { ?>
							     			<span id="slider-title" class="clearfix"><a title="<?php echo esc_attr( $fmi_slider_title ); ?>" href="<?php echo esc_url( $fmi_slider_link ); ?>"><?php echo esc_html( $fmi_slider_title ); ?></a></span>
							     		<?php } ?>
							     		<?php if( !empty( $fmi_slider_text )  ) { ?>
							     			<span id="slider-content"><?php echo esc_html( $fmi_slider_text ); ?></span>
							     		<?php } ?>
							     	</div>
							    </div>
							</article>
						<?php } ?>
					</section><!-- .featured-slider -->
				<?php
				}
			}
			?>
		</div>
		<nav id="controllers" class="clearfix">
		</nav><!-- #controllers -->
	</div><!-- .slider-cycle -->
<?php
}
endif;

?>