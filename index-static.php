<?php
/**
* @Theme Name	:	Quality
* @file         :	index-static.php
* @package      :	Quality
* @author       :	Vibhor
* @license      :	license.txt
* @filesource   :	wp-content/themes/Quality/index-static.php
*/
?>
<!-- Quality Main Slider --->
<?php $current_options=get_option('quality_options') ; ?>


<!-- /Quality Main Slider --->

<div class="carousel">

<?php 	if($current_options['home_feature']!=''){ ?>
	<img width="100%" src="<?php echo $current_options['home_feature']; ?>"  alt="Quality" class="img-responsive" />
	<?php } ?>
	<div class="flex-slider-center">
		<?php if($current_options['home_image_title']){ ?>
		<h2><?php echo $current_options['home_image_title']; ?></h2>
		<?php } ?>
		<?php if($current_options['home_image_description']){ ?>
		<div><span><?php echo $current_options['home_image_description']?></span></div>
		<?php } ?>
	</div>

</div>