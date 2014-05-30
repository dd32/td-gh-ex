<?php 
	$site_title_color = of_get_option('site_title_color','#2980B9');
	$site_des_color = of_get_option('site_des_color','#8D8D8D');
	$footer_sicon_bg_color = of_get_option('footer_sicon_bg_color','#3498DB');
	$footer_sicon_bg_hover_color = of_get_option('footer_sicon_bg_hover_color','#3498DB');
	$footer_sicon_link_color = of_get_option('footer_sicon_link_color','#ffffff');
	$footer_sicon_link_hover_color = of_get_option('footer_sicon_link_hover_color','#ffffff');
?>
<style type="text/css">

	.logo a{
		color: <?php echo $site_title_color ?>;
	}
	.tagline{
		color: <?php echo $site_des_color ?>;
	}
	.footer-social li a {
		background: <?php echo $footer_sicon_bg_color ?>;
		color: <?php echo $footer_sicon_link_color ?>;
	}
	.footer-social li a:hover {
		background: <?php echo $footer_sicon_bg_hover_color ?>;
		color: <?php echo $footer_sicon_link_hover_color ?>;
	}
	
	<?php if(is_admin_bar_showing()) :; ?>
		.my-sticky-element.stuck{
		<?php if(floatval($wp_version) >= 3.8) : ?>
			top: 32px;
		<?php else: ?>
			top: 28px;
		<?php endif ?>
		}
		<?php else:; ?>
		.my-sticky-element.stuck{
			height: 42px;
		}
	<?php endif ?>

	<?php if(of_get_option('custom_css')) echo of_get_option('custom_css'); ?>

</style>
<script>
	<?php if(of_get_option('custom_javascript')) echo of_get_option('custom_javascript'); ?>
</script>