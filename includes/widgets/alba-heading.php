<?php

/**
 * Displays an Alba Heading
 ****************************************************************************************************** */
class alba_heading extends WP_Widget {
	function __construct() {
		parent::__construct(
			'alba_heading',
			__( 'Alba Heading', 'alba' ),
			array(
				'description' => __( 'Displays an Alba styled heading.', 'alba' ),
			)
		);
	}

	function widget( $args, $instance ) {
		if ( empty( $instance['heading'] ) ) return;
		
		$output = '';
		$output .= $args['before_widget'];
		$output .= $args['before_title'];
		
		$output .= '<div class="alba-heading alba-heading-size-' . esc_attr( $instance['size'] ) . ' alba-heading-style-' . esc_attr( $instance['style'] ) . ' alba-heading-align-' . esc_attr( $instance['align'] ) . '">';
		            if($instance['icon_name']) {
			$output .= '<h3><i class="fa ' . esc_attr( $instance['icon_name'] ) . '"></i> ' . wp_kses_post( $instance['heading'] ) . '</h3>';
                    } else {
            $output .= '<h3>' . wp_kses_post( $instance['heading'] ) . '</h3>';
                    }
                    if($instance['heading-text']) {
            $output .= '<div class="alba-heading-text">' . wp_kses_post( $instance['heading-text'] ) . '</div>';
                    }
		$output .= '</div>';
        
		$output .= $args['after_title'];
		$output .= $args['after_widget'];
		
		echo $output;
	}

	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
            'icon_name' => '',
			'heading' => '',
            'heading-text' => '',
			'style' => 'lined',
			'size' => 'medium',
			'align' => 'left'
		) );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'icon_name' ) ?>"><?php _e( 'Icon Name', 'alba' ) ?></label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'icon_name' ) ?>" id="<?php echo $this->get_field_id( 'icon_name' ) ?>" value="<?php echo esc_attr( $instance['icon_name'] ) ?>" />
            <span class="widgets-desc"><?php _e( 'Select the icon from <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Font Awesome</a>, select the text name and add it here. Eg: "fa-glass".', 'alba' ) ?></span>
        </p>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'heading' ) ?>"><?php _e( 'Heading Text', 'alba' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'heading' ) ?>" id="<?php echo $this->get_field_id( 'heading' ) ?>" value="<?php echo esc_attr( $instance['heading'] ) ?>" />
            <span class="widgets-desc"><?php _e( 'Add <a href="http://www.tizag.com/htmlT/htmlbold.php" target="_blank">Bold Tags</a> around words to make them take on the theme main color', 'alba' ) ?></span>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'heading-text' ) ?>"><?php _e( 'Heading Text', 'alba' ) ?></label>
            <textarea class="widefat" name="<?php echo $this->get_field_name( 'heading-text' ) ?>" id="<?php echo $this->get_field_id( 'heading-text' ) ?>"><?php echo esc_attr( $instance['heading-text'] ) ?></textarea>
        </p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'style' ) ?>"><?php _e( 'Style', 'alba' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'style' ) ?>" id="<?php echo $this->get_field_id( 'style' ) ?>">
				<option value="lined" <?php selected( $instance['style'], 'lined' ) ?>><?php esc_html_e( 'Lined heading', 'alba' ) ?></option>
				<option value="title" <?php selected( $instance['style'], 'title' ) ?>><?php esc_html_e( 'Title heading', 'alba' ) ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'size' ) ?>"><?php _e( 'Size', 'alba' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'size' ) ?>" id="<?php echo $this->get_field_id( 'size' ) ?>">
				<option value="small" <?php selected( $instance['size'], 'small' ) ?>><?php esc_html_e( 'Small', 'alba' ) ?></option>
				<option value="medium" <?php selected( $instance['size'], 'medium' ) ?>><?php esc_html_e( 'Medium', 'alba' ) ?></option>
				<option value="large" <?php selected( $instance['size'], 'large' ) ?>><?php esc_html_e( 'Large', 'alba' ) ?></option>
				<option value="extra-large" <?php selected( $instance['size'], 'extra-large' ) ?>><?php esc_html_e( 'Extra Large', 'alba' ) ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'align' ) ?>"><?php _e( 'Alignment', 'alba' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'align' ) ?>" id="<?php echo $this->get_field_id( 'align' ) ?>">
				<option value="left" <?php selected( $instance['align'], 'left' ) ?>><?php esc_html_e( 'Left', 'alba' ) ?></option>
				<option value="center" <?php selected( $instance['align'], 'center' ) ?>><?php esc_html_e( 'Center', 'alba' ) ?></option>
				<option value="right" <?php selected( $instance['align'], 'right' ) ?>><?php esc_html_e( 'Right', 'alba' ) ?></option>
			</select>
		</p>
		<?php
	}
} ?>