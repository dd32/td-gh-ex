<?php $awada_theme_options = awada_theme_options();
if($awada_theme_options['callout_home']==1){ ?>
<section class="make-bg-full">
	<div class="calloutbox-full container">
		<?php if ($awada_theme_options['home_callout_title'] != "") { ?>
		<h2><?php echo esc_attr($awada_theme_options['home_callout_title']); ?></h2>
		<?php } if ($awada_theme_options['home_callout_description'] != "") { ?>
		<p class="lead"><?php echo esc_attr($awada_theme_options['home_callout_description']); ?></p>
		<?php } if($awada_theme_options['callout_btn_text'] != ""){ ?>
		<a class="btn btn-dark btn-lg" href="<?php echo esc_url($awada_theme_options['callout_btn_link']); ?>" target="_blank"><?php echo esc_attr($awada_theme_options['callout_btn_text']); ?></a>
		<?php } ?>
	</div><!-- end calloutbox -->
</section><!-- make bg -->
<?php } ?>