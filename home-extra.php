<?php $awada_theme_options = awada_theme_options();
if ($awada_theme_options['home_extra_enabled'] == 1){ ?>
<section id="home_extra" class="white-wrapper">
	<div class="container">
		<div class="general-title">
			<?php if ($awada_theme_options['home_extra_title'] != ""){ ?>
			<h2 id="home_extra_title"><?php echo esc_attr($awada_theme_options['home_extra_title']); ?></h2>
			<hr>
			<?php } if ($awada_theme_options['home_extra_description'] != ""){ ?>
			<p id="home_extra_desc" class="lead"><?php echo esc_attr($awada_theme_options['home_extra_description']); ?></p>
			<?php } ?>
		</div><!-- end general title -->
		<div id="home_extra_content" class="blog-masonry">
			<?php echo apply_filters('the_content', $awada_theme_options['extra_content_home']); ?>
		</div><!-- end blog-masonry -->   
	</div><!-- end container -->
</section><!-- end white-wrapper -->
<?php } ?>