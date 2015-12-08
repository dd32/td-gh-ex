<?php
/**
 * Contains Customizer Extended Controls
 *
 * @since 1.0
 */
 

if (class_exists('WP_Customize_Control')):

    /**
     * Actuate Customize Important Links Control
     *
     * Controls Important Links for the Theme
     */
    class Actuate_Customize_Important_Links_Control extends WP_Customize_Control {

        public function render_content() {
            echo '<p><a href="' . ACTUATE_DOCS_URL . '" target="_blank">' . __('Theme Documentation', 'actuate') . '</a></p>';
            echo '<p><a href="' . ACTUATE_CONTACT_URL . '" target="_blank">' . __('Contact us', 'actuate') . '</a></p>';
        }

    }

endif;