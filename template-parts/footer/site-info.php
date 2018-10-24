<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage adventure_travelling
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<div class="container">
		<p><?php echo esc_html(get_theme_mod('adventure_travelling_footer_text',__('Travelling WordPress Theme By','adventure-travelling'))); ?> <?php adventure_travelling_credit(); ?></p>
	</div>
</div>