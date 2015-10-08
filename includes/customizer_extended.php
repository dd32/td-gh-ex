<?php
/**
 * Contains Customizer Extended Controls
 *
 * @since 1.0
 */
 

if (class_exists('WP_Customize_Control')):

    /**
     * Afford Customize Important Links Control
     *
     * Controls Important Links for the Theme
     */
    class Afford_Customize_Important_Links_Control extends WP_Customize_Control {

        public function render_content() {
            echo '<p><a href="' . AFFORD_DOCS_URL . '" target="_blank">' . __('Theme Documentation', 'afford') . '</a></p>';
            echo '<p><a href="' . AFFORD_CONTACT_URL . '" target="_blank">' . __('Contact us', 'afford') . '</a></p>';
        }

    }

endif;