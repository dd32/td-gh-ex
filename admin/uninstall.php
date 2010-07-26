<?php 
	// AdSense options
	delete_option('graphene_show_adsense', $show_adsense);
	delete_option('graphene_adsense_pubid', $adsense_pubid);
	delete_option('graphene_adsense_adslot', $adsense_adslot);
	
	// AddThis options
	delete_option('graphene_show_addthis', $show_addthis);
	delete_option('graphene_addthis_code', $addthis_code);
	
	// Google Analytics options
	delete_option('graphene_show_ga', $show_ga);
	delete_option('graphene_ga_code', $ga_code);
	
	// Footer options
	delete_option('graphene_show_cc', $show_cc);
	delete_option('graphene_copy_text', $copy_text);
	
	delete_option('graphene');
	switch_theme('default', 'default');
	wp_cache_flush();
	
	wp_redirect('themes.php?activated=true');
	return;
?>