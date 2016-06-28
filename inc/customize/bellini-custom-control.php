<?php

/**
 * Creates a toggle control
 */
class Bellini_UI_Helper_Title extends WP_Customize_Control {

	public $type = 'info';

	public function render_content() { ?>
		<label>
		<?php if ( !empty( $this->label ) ) : ?>
			<span class="customize-control-title bellini-ui__title">
				<?php echo esc_html( $this->label ); ?>
			</span>
		<?php endif; ?>
		</label>

		<?php if ( !empty( $this->description ) ) : ?>
			<span class="description customize-control-description">
				<?php echo $this->description; ?>
			</span>
		<?php endif; ?>

        <?php if ( !$this->value() ) : ?>
        	<?php echo $this->value(); ?>
		<?php endif; ?>

		<?php
	}
}