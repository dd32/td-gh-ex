<?php
/**
* @Theme Name	:	wallstreet
* @file         :	index-slider.php
* @package      :	wallstreet
* @author       :	Harish Lodha
* @license      :	license.txt
* @filesource   :	wp-content/themes/wallstreet/index-slider.php
*/
?>
<!-- wallstreet Main Slider --->
<?php
$current_options = get_option('wallstreet_lite_options');
$slider_title_one= $current_options['slider_title_one'];
$slider_title_two=$current_options['slider_title_two'];
$slider_description=$current_options['slider_description'];
$slider_image=$current_options['slider_image'];
?>
<!-- /Slider Section -->
<div class="homepage_mycarousel">
	<div class="static-banner">
	<?php if($current_options['home_banner_enabled'] == 'on') { ?>
				<li>
					<?php if($current_options['slider_image']){ ?>
					<img class="img-responsive" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['slider_image']); ?>">
					<?php } ?>
					<div class="flex-slider-center">
					<?php if($current_options['slider_title_one']){ ?>
						<div class="slide-text-bg1"><h2><?php echo esc_html ($current_options['slider_title_one']); ?></h2></div>
						<?php } ?>
						<?php if($current_options['slider_title_two']){ ?>
						<div class="slide-text-bg2"><h1><?php echo esc_html ($current_options['slider_title_two']); ?></h1></div>
						<?php } ?>
						<?php if($current_options['slider_description']) { ?>
						<div class="slide-text-bg3"><p><?php echo esc_html ($current_options['slider_description']); ?></p></div>
						<?php } ?>
					</div>
				</li>
			<?php } ?>
	</div>
</div>
<!-- /wallstreet Main Slider --->