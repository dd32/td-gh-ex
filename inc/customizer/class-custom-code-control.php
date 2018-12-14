<?php

class Az_Authority_Custom_Text_Control extends WP_Customize_Control {

	public $type = 'cutom-text';

	public function render_content() { 

		?>
		<label>
            <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php endif;
            if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo wp_kses( $this->description ); ?></span>
            <?php endif; ?>
             <input <?php $this->link(); ?>>
        </label>
		<?php
			
	}
}

endif;


// Register our custom control with Kirki
if ( ! function_exists( 'azauthority_custom_code_control' )) {

    function azauthority_custom_code_control( $controls ) {

        $controls['cutom-code'] = 'Az_Authority_Custom_Code_Control';

        return $controls;
    }
}

// Register our custom text control with Kirki
if ( ! function_exists( 'azauthority_custom_text_control' )) {

    function azauthority_custom_text_control( $controls ) {

        $controls['cutom-text'] = 'Az_Authority_Custom_Text_Control';

        return $controls;
    }
}