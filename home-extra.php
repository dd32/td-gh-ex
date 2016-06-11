<?php $awada_theme_options = awada_theme_options();
if ($awada_theme_options['home_extra_enabled'] == 1){ ?>
<section class="white-wrapper">
	<div class="container">
		<div class="general-title">
			<?php if ($awada_theme_options['home_extra_title'] != ""){ ?>
			<h2><?php echo esc_attr($awada_theme_options['home_extra_title']); ?></h2>
			<hr>
			<?php } if ($awada_theme_options['home_extra_description'] != ""){ ?>
			<p class="lead"><?php echo esc_attr($awada_theme_options['home_extra_description']); ?></p>
			<?php } ?>
		</div><!-- end general title -->
		<div class="blog-masonry">
			<?php echo apply_filters('the_content', $awada_theme_options['extra_content_home']); ?>
		</div><!-- end blog-masonry -->   
	</div><!-- end container -->
</section><!-- end white-wrapper -->
<?php } ?>