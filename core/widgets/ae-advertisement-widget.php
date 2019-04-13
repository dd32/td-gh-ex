<?php
/**
 * Custom widgets.
 *
 * @package Agency_Ecommerce
 */

if ( ! class_exists( 'Agency_Ecommerce_Advertisement_Widget' ) ) :

	/**
	 * Advertisement widget class.
	 *
	 * @since 1.0.0
	 */
	class Agency_Ecommerce_Advertisement_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'agency_ecommerce_widget_advertisement',
				'description' => esc_html__( 'Widget to display advertisement. Recommended to use in Advertisement Below Slider area', 'agency-ecommerce' ),
			);
			parent::__construct( 'agency-ecommerce-advertisement', esc_html__( 'AE: Advertisement', 'agency-ecommerce' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {
			$title       	= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$sub_title   	= ! empty( $instance['sub_title'] ) ? esc_html( $instance['sub_title'] ) : '';
			$offer_percent  = ! empty( $instance['offer_percent'] ) ? esc_html( $instance['offer_percent'] ) : '';
			$offer_text  	= ! empty( $instance['offer_text'] ) ? esc_html( $instance['offer_text'] ) : '';
			$button_text 	= ! empty( $instance['button_text'] ) ? esc_html( $instance['button_text'] ) : '';
			$button_url  	= ! empty( $instance['button_url'] ) ? esc_url( $instance['button_url'] ) : '';
			$content_position 	= !empty( $instance['content_position'] ) ? $instance['content_position'] : '';
			$content_style 	= !empty( $instance['content_style'] ) ? $instance['content_style'] : '';
			$background_image  	 	= ! empty( $instance['background_image'] ) ? esc_url( $instance['background_image'] ) : '';

			$parallax_background = ! empty( $instance['parallax_background'] ) ? (boolean) $instance['parallax_background'] : 0;

			$disable_overlay = ! empty( $instance['disable_overlay'] ) ? $instance['disable_overlay'] : 0;

			echo $args['before_widget']; 

			$content_class = 'content-left-aligned';
			//For content position
			if( 'right' === $content_position ){

				$content_class = 'content-right-aligned';

			}else if ('center' === $content_position ){

				$content_class = 'content-center-aligned';

			} else{
			    $content_class = 'content-left-aligned';
			}

			//For content styles
			if( 'style-2' === $content_style ){

				$content_style = 'content-style-two';

			}else{

				$content_style = 'content-style-one';

			}

			//For overlay position
			if( 1 === $disable_overlay ){

				$overlay_class = 'overlay-disabled';

			}else{

				$overlay_class = 'overlay-enabled';

			}  ?>

			<div class="advertisement-content-holder advertisement-widget <?php echo $content_class.' '.$content_style.' '.$overlay_class; ?>">

				<?php 
				if( !empty( $background_image ) ){ ?>

					<div class="advertisement-wrap <?php echo $parallax_background ? 'mb-parallax':'' ?>" style="background: url(<?php echo esc_url( $background_image ); ?>); background-size: cover; background-position: center center;">

					<?php 

				} else{ ?>

					<div class="advertisement-wrap no-background">

					<?php 

				} ?>

				<div class="advertisement-text-wrap">

					<?php

					if ( ! empty( $title ) || !empty( $sub_title ) ) { ?>

						<div class="advertisement-content">

							<?php

							if ( ! empty( $title ) ) {
								echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
							}

							if ( ! empty( $sub_title ) ) {
								echo '<p>' . esc_html( $sub_title ) . '</p>';
							} ?>
							
						</div>	

					<?php } ?>

				    <?php if ( ! empty( $offer_percent ) || ! empty( $offer_text ) ){ ?>

						<div class="advertisement-offer">

							<div class="advertisement-offer-inner">

								<div class="advertisement-offer-wrap">
								
									<?php

									if ( ! empty( $offer_percent ) ) {
										echo '<span class="offer-percent">' . esc_html( $offer_percent ) . '</span>';
									}

									if ( ! empty( $offer_text ) ) {
										echo '<span class="offer-text">' . esc_html( $offer_text ) . '</span>';
									} ?>

								</div>

							</div>
							
						</div><!-- .advertisement-offer -->

					<?php } ?>

					<?php if ( ! empty( $button_text ) && ! empty( $button_url ) ){ ?>

						<div class="advertisement-buttons">
							
							<a href="<?php echo esc_url( $button_url ); ?>" class="button advertisement-button"><?php echo esc_attr( $button_text ); ?></a>

						</div><!-- .advertisement-buttons -->

					<?php } ?>

				</div>
					
				</div>

			</div><!-- .advertisement-widget -->

			<?php
			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title'] 				= sanitize_text_field( $new_instance['title'] );

			$instance['sub_title'] 	 		= sanitize_text_field( $new_instance['sub_title'] );

			$instance['offer_percent'] 		= sanitize_text_field( $new_instance['offer_percent'] );

			$instance['offer_text'] 		= sanitize_text_field( $new_instance['offer_text'] );

			$instance['button_text'] 		= sanitize_text_field( $new_instance['button_text'] );
			
			$instance['button_url']  		= esc_url_raw( $new_instance['button_url'] );

			$instance['content_position'] 	= sanitize_text_field( $new_instance['content_position'] );

			$instance['content_style'] 		= sanitize_text_field( $new_instance['content_style'] );

			$instance['background_image']  	 		= esc_url_raw( $new_instance['background_image'] );

			$instance['parallax_background']    = (bool) $new_instance['parallax_background'] ? 1 : 0;

			$instance['disable_overlay']    = (bool) $new_instance['disable_overlay'] ? 1 : 0;

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title'       			=> '',
				'sub_title'    			=> '',
				'offer_percent'         => esc_html__( '50%', 'agency-ecommerce' ),
				'offer_text'            => esc_html__( 'OFF', 'agency-ecommerce' ),
				'button_text' 			=> esc_html__( 'Start Shopping', 'agency-ecommerce' ),
				'button_url'  			=> '',
				'content_position'  	=> 'left',
				'content_style'  	    => 'style-1',
				'background_image'      			=> '',
				'parallax_background'      			=> 0,
				'disable_overlay'   	=> 0,
			) );

			$background_image = '';

            if ( ! empty( $instance['background_image'] ) ) {

                $background_image = $instance['background_image'];

            }

            $wrap_style = '';

            if ( empty( $background_image ) ) {

                $wrap_style = ' style="display:none;" ';
            }

            $image_status = false;

            if ( ! empty( $background_image ) ) {
                $image_status = true;
            }

            $delete_button = 'display:none;';

            if ( true === $image_status ) {
                $delete_button = 'display:inline-block;';
            }
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'agency-ecommerce' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>"><strong><?php esc_html_e( 'Sub Title:', 'agency-ecommerce' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sub_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sub_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['sub_title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offer_percent' ) ); ?>"><strong><?php esc_html_e( 'Offer Percent:', 'agency-ecommerce' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offer_percent' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offer_percent' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['offer_percent'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offer_text' ) ); ?>"><strong><?php esc_html_e( 'Offer Text:', 'agency-ecommerce' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'offer_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offer_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['offer_text'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><strong><?php esc_html_e( 'Primary Button Text:', 'agency-ecommerce' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['button_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><strong><?php esc_html_e( 'Primary Button URL:', 'agency-ecommerce' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['button_url'] ); ?>" />
			</p>

	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'content_position' ) ); ?>"><strong><?php esc_html_e( 'Content Position:', 'agency-ecommerce' ); ?></strong></label>
				<?php
	            $this->dropdown_content_position( array(
					'id'       => $this->get_field_id( 'content_position' ),
					'name'     => $this->get_field_name( 'content_position' ),
					'selected' => esc_attr( $instance['content_position'] ),
					)
	            );
				?>
	        </p>

            <p>
              <label for="<?php echo esc_attr( $this->get_field_id( 'content_style' ) ); ?>"><strong><?php esc_html_e( 'Content style:', 'agency-ecommerce' ); ?></strong></label>
    			<?php
                $this->dropdown_content_style( array(
    				'id'       => $this->get_field_id( 'content_style' ),
    				'name'     => $this->get_field_name( 'content_style' ),
    				'selected' => esc_attr( $instance['content_style'] ),
    				)
                );
    			?>
            </p>

			<div class="cover-image">
                <label for="<?php echo esc_attr( $this->get_field_id( 'background_image' ) ); ?>">
                    <strong><?php esc_html_e( 'Background Image:', 'agency-ecommerce' ); ?></strong>
                </label>
                <input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'background_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'background_image' ) ); ?>" value="<?php echo esc_url( $instance['background_image'] ); ?>" />
                <div class="rtam-preview-wrap" <?php echo $wrap_style; ?>>
                    <img src="<?php echo esc_url( $background_image ); ?>" alt="<?php esc_attr_e( 'Preview', 'agency-ecommerce' ); ?>" />
                </div><!-- .rtam-preview-wrap -->
                <input type="button" class="select-img button button-primary" value="<?php esc_html_e( 'Upload', 'agency-ecommerce' ); ?>" data-uploader_title="<?php esc_html_e( 'Select Background Image', 'agency-ecommerce' ); ?>" data-uploader_button_text="<?php esc_html_e( 'Choose Image', 'agency-ecommerce' ); ?>" />
                <input type="button" value="<?php echo esc_attr_x( 'X', 'Remove Button', 'agency-ecommerce' ); ?>" class="button button-secondary btn-image-remove" style="<?php echo esc_attr( $delete_button ); ?>" />
            </div>

            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance['parallax_background'] ); ?> id="<?php echo $this->get_field_id( 'parallax_background' ); ?>" name="<?php echo $this->get_field_name( 'parallax_background' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'parallax_background' ); ?>"><?php esc_html_e( 'Enable parallax background', 'agency-ecommerce' ); ?></label>
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked( $instance['disable_overlay'] ); ?> id="<?php echo $this->get_field_id( 'disable_overlay' ); ?>" name="<?php echo $this->get_field_name( 'disable_overlay' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'disable_overlay' ); ?>"><?php esc_html_e( 'Disable overlay of the image', 'agency-ecommerce' ); ?></label>
            </p>
		<?php
		} 

	    function dropdown_content_position( $args ) {
			$defaults = array(
		        'id'       => '',
		        'name'     => '',
		        'selected' => 'left',
			);

			$r = wp_parse_args( $args, $defaults );
			$output = '';

			$choices = apply_filters( 'agency_ecommerce_advertisement_widget_content_position',array(
			     'left' 		=> esc_html__( 'Left', 'agency-ecommerce' ),
				'right' 	=> esc_html__( 'Right', 'agency-ecommerce' ),
				'center' 	=> esc_html__( 'Center', 'agency-ecommerce' ),
			));

			if ( ! empty( $choices ) ) {

				$output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "'>\n";
				foreach ( $choices as $key => $choice ) {
					$output .= '<option value="' . esc_attr( $key ) . '" ';
					$output .= selected( $r['selected'], $key, false );
					$output .= '>' . esc_html( $choice ) . '</option>\n';
				}
				$output .= "</select>\n";
			}

			echo $output;
	    }

        function dropdown_content_style( $args ) {
    		$defaults = array(
    	        'id'       => '',
    	        'name'     => '',
    	        'selected' => 'style-1',
    		);

    		$r = wp_parse_args( $args, $defaults );
    		$output = '';

    		$choices = apply_filters( 'agency_ecommerce_advertisement_widget_content_style',array(
    			'style-1' 	=> esc_html__( 'Style One', 'agency-ecommerce' ),
    			'style-2' 	=> esc_html__( 'Style Two', 'agency-ecommerce' ),
    		));

    		if ( ! empty( $choices ) ) {

    			$output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "'>\n";
    			foreach ( $choices as $key => $choice ) {
    				$output .= '<option value="' . esc_attr( $key ) . '" ';
    				$output .= selected( $r['selected'], $key, false );
    				$output .= '>' . esc_html( $choice ) . '</option>\n';
    			}
    			$output .= "</select>\n";
    		}

    		echo $output;
        }
	
	}

endif;