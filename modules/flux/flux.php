<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function attire_enqueue_colorbox() {
	wp_enqueue_style( "attire-flux", get_template_directory_uri() . '/modules/flux/style.css' );
	wp_enqueue_script( "attire-flux", get_template_directory_uri() . '/modules/flux/flux.min.js', array( 'jquery' ) );
}

function attire_colorbox_init() {
	?>
    <script type="text/javascript">
        new flux.slider('.gallery-icon a');
    </script>
	<?php
}

add_action( "wp_enqueue_scripts", "attire_enqueue_colorbox" );
add_action( "wp_head", "attire_colorbox_init" );
