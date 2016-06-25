<?php $awada_theme_options = awada_theme_options(); ?>
<section id="home_callout" class="make-bg-full">
	<div class="calloutbox-full container">
		<?php if ($awada_theme_options['home_callout_title'] != "") { ?>
		<h2 id="callout_title"><?php echo esc_attr($awada_theme_options['home_callout_title']); ?></h2>
		<?php } if ($awada_theme_options['home_callout_description'] != "") { ?>
		<p id="callout_description" class="lead"><?php echo esc_attr($awada_theme_options['home_callout_description']); ?></p>
		<?php } if($awada_theme_options['callout_btn_text'] != ""){ ?>
		<a id="callout_link" class="btn btn-dark btn-lg" href="<?php echo esc_url($awada_theme_options['callout_btn_link']); ?>" target="_blank"><span 
                    class="intro_text"><?php echo esc_attr($awada_theme_options['callout_btn_text']); ?></span></a>
		<?php } ?>
	</div><!-- end calloutbox -->
</section><!-- make bg -->