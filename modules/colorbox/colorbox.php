<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function attire_enqueue_colorbox() {
	wp_enqueue_style( "wpdm-colorbox", get_template_directory_uri() . '/modules/colorbox/colorbox.css' );
	wp_enqueue_script( "wpdm-colorbox", get_template_directory_uri() . '/modules/colorbox/jquery.colorbox-min.js', array( 'jquery' ) );
}

function attire_colorbox_init() {
	?>
    <script type="text/javascript">
        jQuery(function () {

            jQuery('.gallery-icon a').colorbox({
                maxWidth: '95%',
                maxHeight: '95%'
            });

        });
    </script>
	<?php
}

add_action( "wp_enqueue_scripts", "attire_enqueue_colorbox" );
add_action( "wp_head", "attire_colorbox_init" );
