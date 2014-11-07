<?php
/**
 * Displays an Electa Icon
 ****************************************************************************************************** */
class electa_icon extends WP_Widget {
	function __construct() {
		parent::__construct(
			'electa_icon',
			__( 'Electa Icon', 'electa' ),
			array(
				'description' => __( 'Displays a Font Awesome Icon of your choice.', 'electa' ),
			)
		);
	}

	function widget( $args, $instance ) {
		if ( empty( $instance['icon_name'] ) ) return;
        
        $icon_link = '';
        if ( $instance['icon_link'] ) :
            $icon_link = ' href="' . esc_url( $instance['icon_link'] ) . '"';
        endif;
		
		$output = '';
		$output .= $args['before_widget'];
		$output .= $args['before_title'];
		
		$output .= '<div class="electa-icon electa-icon-size-' . esc_attr( $instance['icon_size'] ) . ' electa-icon-style-' . esc_attr( $instance['icon_style'] ) . ' electa-icon-align-' . esc_attr( $instance['icon_align'] ) . '">';
            $output .= '<a' . esc_url( $icon_link ) . ' class="electa-icon-inner" target="' . esc_attr( $instance['icon_link_target'] ) . '" style="background-color: ' . esc_attr( $instance['icon_bg_color'] ) . '; color: ' . esc_attr( $instance['icon_color'] ) . '; font-size: ' . esc_attr( $instance['icon_size'] ) . 'px;">';
		
			    $output .= '<i class="fa ' . esc_attr( $instance['icon_name'] ) . '"></i>';
                
            $output .= '</a>';
		$output .= '</div>';
		$output .= $args['after_title'];
		$output .= $args['after_widget'];
		
		echo $output;
	}

	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'icon_name' => 'fa-home',
            'icon_bg_color' => 'transparent',
            'icon_color' => '#000000',
            'icon_size' => '20',
            'icon_style' => 'round',
            'icon_align' => 'center',
            'icon_link' => '',
            'icon_link_target' => '_self',
		) ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'icon_name' ) ?>"><?php echo __( 'Icon Name', 'electa' ) ?></label>
			<input type="text" class="widefat" name="<?php echo $this->get_field_name( 'icon_name' ) ?>" id="<?php echo $this->get_field_id( 'icon_name' ) ?>" value="<?php echo esc_attr( $instance['icon_name'] ) ?>" />
            <span class="widgets-desc"><?php echo __( 'Select the icon from <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Font Awesome</a>, select the text name and add it here. Eg: "fa-glass".', 'electa' ) ?></span>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'icon_bg_color' ) ?>"><?php echo __( 'Icon Background Color', 'electa' ) ?></label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'icon_bg_color' ) ?>" id="<?php echo $this->get_field_id( 'icon_bg_color' ) ?>" value="<?php echo esc_attr( $instance['icon_bg_color'] ) ?>" />
            <span class="widgets-desc"><?php echo __( 'Enter the hash value for the background color of the icon. Eg: "#000000" (Include the "#"")', 'electa' ) ?></span>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'icon_color' ) ?>"><?php echo __( 'Icon Color', 'electa' ) ?></label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'icon_color' ) ?>" id="<?php echo $this->get_field_id( 'icon_color' ) ?>" value="<?php echo esc_attr( $instance['icon_color'] ) ?>" />
            <span class="widgets-desc"><?php echo __( 'Enter the hash value for the color of the icon. Eg: "#000000" (Include the "#"")', 'electa' ) ?></span>
        </p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'icon_size' ) ?>"><?php echo __( 'Icon Size', 'electa' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'icon_size' ) ?>" id="<?php echo $this->get_field_id( 'icon_size' ) ?>">
				<option value="18" <?php selected( $instance['icon_size'], '18' ) ?>><?php esc_html_e( '18px', 'electa' ) ?></option>
				<option value="26" <?php selected( $instance['icon_size'], '26' ) ?>><?php esc_html_e( '26px', 'electa' ) ?></option>
                <option value="34" <?php selected( $instance['icon_size'], '34' ) ?>><?php esc_html_e( '34px', 'electa' ) ?></option>
                <option value="48" <?php selected( $instance['icon_size'], '48' ) ?>><?php esc_html_e( '48px', 'electa' ) ?></option>
                <option value="66" <?php selected( $instance['icon_size'], '66' ) ?>><?php esc_html_e( '66px', 'electa' ) ?></option>
                <option value="86" <?php selected( $instance['icon_size'], '86' ) ?>><?php esc_html_e( '86px', 'electa' ) ?></option>
                <option value="100" <?php selected( $instance['icon_size'], '100' ) ?>><?php esc_html_e( '100px', 'electa' ) ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'icon_style' ) ?>"><?php echo __( 'Icon Style', 'electa' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'icon_style' ) ?>" id="<?php echo $this->get_field_id( 'icon_style' ) ?>">
                <option value="none" <?php selected( $instance['icon_style'], 'none' ) ?>><?php esc_html_e( 'None', 'electa' ) ?></option>
				<option value="round" <?php selected( $instance['icon_style'], 'round' ) ?>><?php esc_html_e( 'Round', 'electa' ) ?></option>
				<option value="square" <?php selected( $instance['icon_style'], 'square' ) ?>><?php esc_html_e( 'Square', 'electa' ) ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'icon_align' ) ?>"><?php echo __( 'Icon Alignment', 'electa' ) ?></label>
			<select class="widefat" name="<?php echo $this->get_field_name( 'icon_align' ) ?>" id="<?php echo $this->get_field_id( 'icon_align' ) ?>">
				<option value="left" <?php selected( $instance['icon_align'], 'left' ) ?>><?php esc_html_e( 'Left', 'electa' ) ?></option>
				<option value="center" <?php selected( $instance['icon_align'], 'center' ) ?>><?php esc_html_e( 'Center', 'electa' ) ?></option>
				<option value="right" <?php selected( $instance['icon_align'], 'right' ) ?>><?php esc_html_e( 'Right', 'electa' ) ?></option>
			</select>
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'icon_link' ) ?>"><?php echo __( 'Icon Link', 'electa' ) ?></label>
            <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'icon_link' ) ?>" id="<?php echo $this->get_field_id( 'icon_link' ) ?>" value="<?php echo esc_url_raw( $instance['icon_link'] ) ?>" />
            <span class="widgets-desc"><?php echo __( 'Enter the link url for the icon. Don\'t forget the "http://"', 'electa' ) ?></span>
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'icon_link_target' ) ?>"><?php echo __( 'Icon Link Target', 'electa' ) ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name( 'icon_link_target' ) ?>" id="<?php echo $this->get_field_id( 'icon_link_target' ) ?>">
                <option value="_self" <?php selected( $instance['icon_link_target'], '_self' ) ?>><?php esc_html_e( 'Open in the same window', 'electa' ) ?></option>
                <option value="_blank" <?php selected( $instance['icon_link_target'], '_blank' ) ?>><?php esc_html_e( 'Open in a new tab', 'electa' ) ?></option>
            </select>
        </p>
	<?php
	}
} ?>