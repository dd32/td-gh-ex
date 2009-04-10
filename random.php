<?php
	global $options;
	foreach ($options as $value) {
		if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } 
		else { $$value['id'] = get_settings( $value['id'] ); } 
	}
	$random=round(rand(1,$themebanners)); // edit second digit for number of left/rightbanner pictures
?>
<style type="text/css">
	#banner-1 {
		background: url("<?php echo bloginfo('template_url')."/images/banners/banner-1-".$random.".jpg"; ?>") no-repeat;
	}
	#banner-2 {
		background: url("<?php echo bloginfo('template_url')."/images/banners/banner-2-".$random.".jpg"; ?>") no-repeat;
	}
	#banner-3 {
		background: url("<?php echo bloginfo('template_url')."/images/banners/banner-3-".$random.".jpg"; ?>") no-repeat;
	}
	#banner-4 {
		background: url("<?php echo bloginfo('template_url')."/images/banners/banner-4-".$random.".jpg"; ?>") no-repeat;
	}
</style>