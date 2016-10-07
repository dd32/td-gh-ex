<?php
/**
 * Create a Radio-Image control
 */
if( class_exists( 'WP_Customize_Control' ) ):
class IGthemes_Radio_Image_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         */
        public $type = 'radio-image';

        /**
         * Enqueue scripts and styles for the custom control.
         *
         * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
         *
         * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
         * at 'customize_controls_print_styles'.
         *
         * @access public
         */
        public function enqueue() {
            wp_enqueue_script( 'jquery-ui-button' );
        }

        /**
         * Render the control to be displayed in the Customizer.
         */
        public function render_content() {
            if ( empty( $this->choices ) ) {
                return;
            }

            $name = '_customize-radio-' . $this->id;
            ?>
            <span class="customize-control-title">
                <?php echo esc_attr( $this->label ); ?>
            </span>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
            <div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
                <?php foreach ( $this->choices as $value => $label ) : ?>
                    <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo $this->id . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                        <label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
                            <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                        </label>
                    </input>
                <?php endforeach; ?>
            </div>
            <script>jQuery(document).ready(function($) { $( '[id="input_<?php echo esc_attr( $this->id ); ?>"]' ).buttonset(); });</script>
            <?php
        }
    }
/**
 * The 'more' base-wp control class
 */
class IGthemes_More_Control extends WP_Customize_Control {

    /**
     * Render the content on the theme customizer page
     */
    public function render_content() {
        ?>

            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <p>
                <?php esc_html_e( 'Base WP Premium expands the already powerful free version of this theme and gives access to our priority support service.', 'base-wp' ); ?>
            <ul>
                <li><?php esc_html_e( 'All options enabled', 'base-wp' ); ?></li>
                <li><?php esc_html_e( 'Custom widgets', 'base-wp' ); ?></li>
                <li><?php esc_html_e( 'Custom page and post settings', 'base-wp' ); ?></li>
                <li><?php esc_html_e( 'Premium support', 'base-wp' ); ?></li>
                <li><?php esc_html_e( 'Money back guarantee', 'base-wp' ); ?></li>
            </ul>
            <a href="<?php echo esc_url( 'http://www.iograficathemes.com/downloads/base-wp-premium' ); ?>" target="_blank" class="button-upgrade">
                <?php esc_html_e('upgrade to premium', 'base-wp'); ?>
            </a>
            </p>
            <span class="customize-control-title"><?php esc_html_e( 'Enjoying the theme?', 'base-wp' ); ?></span>

            <p>
                <?php printf( esc_html__( 'Why not leave us a review on %sWordPress.org%s?  We\'d really appreciate it!', 'base-wp' ), '<a href="https://wordpress.org/themes/base-wp">', '</a>' ); ?>
            </p>

        <?php
    }
}
/**
 * The premium
 */
class IGthemes_Only_Premium extends WP_Customize_Control {

    public function render_content() {
        ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <span class="customize-control-description">
                <?php echo esc_html( $this->description ); ?>
                <a href="<?php echo esc_url('http://www.iograficathemes.com/downloads/base-wp-premium/'); ?>">
                    <?php esc_html_e( ' - only premium', 'base-wp' ); ?>
                </a>
            </span>
        <?php
    }
}
class IGthemes_Heading extends WP_Customize_Control {
    public $type = 'heading';
    public function render_content() {
    ?>
        <?php if ( ! empty( $this->label ) ) : ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php endif; ?>
        <?php if ( ! empty( $this->description ) ) : ?>
            <span class="customize-control-description"><?php echo esc_html( $this->description );  ?></span>
        <?php endif; ?>
    <?php
    }
}
endif;
