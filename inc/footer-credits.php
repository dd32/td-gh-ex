<?php

/**
 * Custom footer credits
 * @package appsetter
 */
 
function appsetter_footer()
{
	$appsetter_footer_text = get_theme_mod('appsetter_footer_text');
?>
	<p><?php echo esc_html($appsetter_footer_text); ?></p>
<?php 
if ( ! class_exists('appsetter_license')):
	appsetter_footer_credits(); 
endif;
}