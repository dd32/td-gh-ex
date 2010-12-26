<?php
wp_enqueue_script('jquery');
if( is_singular() ) { wp_enqueue_script('comment-reply'); }
wp_enqueue_script('hoverintent', SCRIPT_WSROOT.'jquery/hoverintent.min.js', array('jquery'), '5');
wp_enqueue_script('superfish', SCRIPT_WSROOT.'jquery/superfish.min.js', array('jquery'), '1.4.8');
wp_enqueue_script('supersubs', SCRIPT_WSROOT.'jquery/supersubs.min.js', array('superfish'), '0.2');
?>