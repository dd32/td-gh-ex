<?php
/*
 * Mobile logo centered
 */
?>
<!-- Mobile Logo -->
<div class="column col-2">

</div>
<div class="column col-8 show-md text-center">
	<?php
	$custom_logo_id = get_theme_mod('custom_logo');
	$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
	if (has_custom_logo()) {
		echo '<a href="' . esc_url(home_url('/')) . '">
        <img class="img-responsive" style="margin:0 auto;" src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '">
    </a>';
	} else { ?>

		<h2 class="site-title">
			<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_bloginfo('name')); ?></a>
		</h2>
		<p class="site-tagline hide-xs">
			<?php echo get_bloginfo('description'); ?>
		</p>
	<?php } ?>

</div>

<!-- Mobile Menu Trigger -->
<div class="column col-2 show-md text-right">
	<a href="#sidr-mobile" id="mobile-menu-nav" class="mobile-trigger link-transition">
		<span class="fa fa-bars"></span>
	</a>
</div>