<form class="searchform" method="get" action="<?php echo esc_url(home_url()); ?>/">
	<input type="text" name="s" id="s" value="<?php _e('Search here..', 'wp-news-stream'); ?>" onfocus='if (this.value == "<?php _e('Search here..', 'wp-news-stream'); ?>") { this.value = ""; }' onblur='if (this.value == "") { this.value = "<?php _e('Search here..', 'wp-news-stream'); ?>"; }' />
	<input type="image" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/search-button.png" value="" id="search-button">
</form>