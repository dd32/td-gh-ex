<?php

if ( ! is_active_sidebar( 'footer-widgets' ) ) {
	return;
}

?>

<div class="footer-widgets clear-fix">
	<div class="page-footer-inner <?php echo bard_options( 'general_footer_width' ) === 'contained' ? 'boxed-wrapper': ''; ?>">
		<?php dynamic_sidebar( 'footer-widgets' ); ?>
	</div>
</div>