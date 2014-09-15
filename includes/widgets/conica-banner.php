<?php
/**
 * Displays an Conica Banner
 ****************************************************************************************************** */
class conica_banner extends WP_Widget {
	function __construct() {
		parent::__construct(
			'conica_banner',
			__( 'Conica Banner Heading', 'conica' ),
			array(
				'description' => __( 'Displays a banner heading.', 'conica' ),
			)
		);
	}

	function widget( $args, $instance ) {
		$output = '';
		$output .= $args['before_widget'];
		$output .= $args['before_title'];
        
        if($instance['banner-full-width'] == "on") {
            $output .= '<script type="text/javascript">';
            $output .=     'jQuery(window).load(function() {';
            $output .=          'jQuery(".banner-full-width-on").parent().addClass("banner-full-width-on-parent").css("height", jQuery(".banner-full-width-on").height());';
            $output .=     '});';
            $output .= '</script>';
        }
        
            $output .= '<div class="conica-banner-heading banner-full-width-' . esc_attr( $instance['banner-full-width'] ) . ' conica-banner-style-' . esc_attr( $instance['style'] ) . '" style="background-color: ' . esc_attr( $instance['banner-bg-color'] ) .'; background-image: url(' . esc_url( $instance['banner-bg-image'] ) . ');">';
		    $output .=  '<h3 style="color: ' . esc_url( $instance['banner-font-color'] ) . ';">' . wp_kses_post( $instance['banner-heading'] ) . '</h3>';
            $output .=  '<h5 style="color: ' . esc_url( $instance['banner-font-color'] ) . ';">' . wp_kses_post( $instance['banner-text'] ) . '</h5>';
					if($instance['button-link']) {
		    $output .=  '<a href="' . esc_url( $instance['button-link'] ) . '" target="' . esc_html( $instance['button-target'] ) . '" class="conica-button">' . esc_html( $instance['button-text'] ) . '</a>';
					}
	    $output .=  '</div>' . $args['after_title'];
		$output .=  $args['after_widget'];
		echo $output;
	}

	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'style' => 'bottom-shadow',
            'banner-heading' => '',
            'banner-bg-image' => 'none',
            'banner-bg-color' => 'transparent',
            'banner-font-color' => 'inherit',
            'banner-full-width' => 'on',
            'banner-text' => '',
			'button-link' => '',
			'button-text' => 'Read More',
			'button-target' => ''
		) );
		?>
        <script type="text/javascript">
            jQuery( document ).ready( function() {
                jQuery('.conica-banner-select-style').change(function(){
                    if(this.value == 'bg-color') {
                        jQuery('.conica-banner-select-style-bgimage').slideUp('fast');
                        jQuery('.conica-banner-select-style-bgcolor').slideDown();
                    } else if (this.value == 'bg-image') {
                        jQuery('.conica-banner-select-style-bgcolor').slideUp('fast');
                        jQuery('.conica-banner-select-style-bgimage').slideDown();
                    } else {
                        jQuery('.conica-banner-select-style-bgimage').slideUp('fast');
                        jQuery('.conica-banner-select-style-bgcolor').slideUp('fast');
                    }
                });
            });
        </script>
        <p>
            <label for="<?php echo $this->get_field_id( 'style' ) ?>"><?php _e( 'Banner Style', 'conica' ) ?></label>
            <select class="widefat conica-banner-select-style" name="<?php echo $this->get_field_name( 'style' ) ?>" id="<?php echo $this->get_field_id( 'style' ) ?>">
                <option value="none" <?php selected( $instance['style'], 'none' ) ?>><?php esc_html_e( 'None', 'conica' ) ?></option>
                <option value="bottom-shadow" <?php selected( $instance['style'], 'bottom-shadow' ) ?>><?php esc_html_e( 'Bottom Shadow', 'conica' ) ?></option>
                <option value="bg-color" <?php selected( $instance['style'], 'bg-color' ) ?>><?php esc_html_e( 'Background Color', 'conica' ) ?></option>
                <option value="bg-image" <?php selected( $instance['style'], 'bg-image' ) ?>><?php esc_html_e( 'Background Image', 'conica' ) ?></option>
            </select>
        </p>
        
        <p class="conica-banner-select-style-bgimage" style="display: none;">
            <label for="<?php echo $this->get_field_id( 'banner-bg-image' ) ?>"><?php _e( 'Banner Background Image Url', 'conica' ) ?></label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'banner-bg-image' ) ?>" id="<?php echo $this->get_field_id( 'banner-bg-image' ) ?>" value="<?php echo esc_attr( $instance['banner-bg-image'] ) ?>" />
            <span class="widgets-desc"><?php _e( 'Upload the image into the <a href="' . admin_url( 'upload.php' ) . '" target="_blank">Media Section</a>, then add the URL to the image here', 'conica' ) ?></span>
        </p>
        
        <p class="conica-banner-select-style-bgcolor" style="display: none;">
            <label for="<?php echo $this->get_field_id( 'banner-bg-color' ) ?>"><?php _e( 'Banner Background Color', 'conica' ) ?></label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'banner-bg-color' ) ?>" id="<?php echo $this->get_field_id( 'banner-bg-color' ) ?>" value="<?php echo esc_attr( $instance['banner-bg-color'] ) ?>" />
            <span class="widgets-desc"><?php _e( 'Enter the hash value of the color you want the background to be. Eg: #000000 (Don\'t forget the hash)', 'conica' ) ?></span>
        </p>
        <p class="conica-banner-select-style-bgcolor" style="display: none;">
            <label for="<?php echo $this->get_field_id( 'banner-font-color' ) ?>"><?php _e( 'Banner Font Color', 'conica' ) ?></label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'banner-font-color' ) ?>" id="<?php echo $this->get_field_id( 'banner-font-color' ) ?>" value="<?php echo esc_attr( $instance['banner-font-color'] ) ?>" />
            <span class="widgets-desc"><?php _e( 'Enter the hash value of the color you want the text to be. Eg: #FFFFFF (Don\'t forget the hash)', 'conica' ) ?></span>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'banner-full-width' ) ?>"><?php _e( 'Banner Full Width', 'conica' ) ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name( 'banner-full-width' ) ?>" id="<?php echo $this->get_field_id( 'banner-full-width' ) ?>">
                <option value="off" <?php selected( $instance['banner-full-width'], 'off' ) ?>><?php esc_html_e( 'No', 'conica' ) ?></option>
                <option value="on" <?php selected( $instance['banner-full-width'], 'on' ) ?>><?php esc_html_e( 'Yes', 'conica' ) ?></option>
            </select>
        </p>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'banner-heading' ) ?>"><?php _e( 'Banner Heading', 'conica' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'banner-heading' ) ?>" id="<?php echo $this->get_field_id( 'banner-heading' ) ?>" value="<?php echo esc_attr( $instance['banner-heading'] ) ?>" />
		    <span class="widgets-desc"><?php _e( 'Add html <a href="http://www.tizag.com/htmlT/htmlbold.php" target="_blank">bold tags</a> around the words you want to take on the theme color', 'conica' ) ?></span>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'banner-text' ) ?>"><?php _e( 'Banner Text', 'conica' ) ?></label>
            <textarea class="widefat" name="<?php echo $this->get_field_name( 'banner-text' ) ?>" id="<?php echo $this->get_field_id( 'banner-text' ) ?>"><?php echo esc_attr( $instance['banner-text'] ) ?></textarea>
        </p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button-link' ) ?>"><?php _e( 'Button Link', 'conica' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'button-link' ) ?>" id="<?php echo $this->get_field_id( 'button-link' ) ?>" value="<?php echo esc_attr( $instance['button-link'] ) ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'button-text' ) ?>"><?php _e( 'Button Text', 'conica' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'button-text' ) ?>" id="<?php echo $this->get_field_id( 'button-text' ) ?>" value="<?php echo esc_attr( $instance['button-text'] ) ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'button-target' ) ?>"><?php _e( 'Button Target', 'conica' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'button-target' ) ?>" id="<?php echo $this->get_field_id( 'button-target' ) ?>">
				<option value="" <?php selected( $instance['button-target'], '' ) ?>><?php esc_html_e( 'None', 'conica' ) ?></option>
				<option value="_blank" <?php selected( $instance['button-target'], '_blank' ) ?>><?php esc_html_e( '_blank', 'conica' ) ?></option>
			</select>
		</p>
		<?php
	}
} ?>