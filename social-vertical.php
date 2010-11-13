<?php $shortname = 'drcms'; ?>
<?php if( !get_option($shortname. '_hide_vertical_icons') ) : ?>
	<div id="vsocial-bar">
		<div class="vsocial-item" onclick="location.href='#'">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icons/24x24/topofpage.png" style="width:24px; height:24px;" alt="Top of Page" />
		</div>
		<?php if(get_option($shortname .'_icon_1') && get_option($shortname .'_icon_1_url')): ?>
			<div class="vsocial-item" onclick="location.href='<?php echo stripslashes(get_option($shortname .'_icon_1_url')); ?>'">
				<img src="<?php echo get_template_directory_uri(); ?>/images/icons/24x24/<?php echo get_option($shortname .'_icon_1'); ?>" style="width:24px; height:24px;" alt="<?php echo get_option($shortname .'_icon_1_alt'); ?>" />
			</div>
		<?php endif; ?>
		<?php if(get_option($shortname .'_icon_2') && get_option($shortname .'_icon_2_url')): ?>
			<div class="vsocial-item" onclick="window.open('<?php echo stripslashes(get_option($shortname .'_icon_2_url')); ?>','<?php echo get_option($shortname .'_icon_2_alt'); ?>','width=800, height=600, scrollbars=yes')">
				<img src="<?php echo get_template_directory_uri(); ?>/images/icons/24x24/<?php echo get_option($shortname .'_icon_2'); ?>" style="width:24px; height:24px;" alt="<?php echo get_option($shortname .'_icon_2_alt'); ?>" />
			</div>
		<?php endif; ?>
		<?php if(get_option($shortname .'_icon_3') && get_option($shortname .'_icon_3_url')): ?>
			<div class="vsocial-item" onclick="window.open('<?php echo stripslashes(get_option($shortname .'_icon_3_url')); ?>','<?php echo get_option($shortname .'_icon_3_alt'); ?>','width=800, height=600, scrollbars=yes')">
				<img src="<?php echo get_template_directory_uri(); ?>/images/icons/24x24/<?php echo get_option($shortname .'_icon_3'); ?>" style="width:24px; height:24px;" alt="<?php echo get_option($shortname .'_icon_3_alt'); ?>" />
			</div>
		<?php endif; ?>
		<?php if(get_option($shortname .'_icon_4') && get_option($shortname .'_icon_4_url')): ?>
			<div class="vsocial-item" onclick="window.open('<?php echo stripslashes(get_option($shortname .'_icon_4_url')); ?>','<?php echo get_option($shortname .'_icon_4_alt'); ?>','width=800, height=600, scrollbars=yes')">
				<img src="<?php echo get_template_directory_uri(); ?>/images/icons/24x24/<?php echo get_option($shortname .'_icon_4'); ?>" style="width:24px; height:24px;" alt="<?php echo get_option($shortname .'_icon_4_alt'); ?>" />
			</div>
		<?php endif; ?>
		<?php if(get_option($shortname .'_icon_5') && get_option($shortname .'_icon_5_url')): ?>
			<div class="vsocial-item" onclick="window.open('<?php echo stripslashes(get_option($shortname .'_icon_2_url')); ?>','<?php echo get_option($shortname .'_icon_2_alt'); ?>','width=800, height=600, scrollbars=yes')">
				<img src="<?php echo get_template_directory_uri(); ?>/images/icons/24x24/<?php echo get_option($shortname .'_icon_5'); ?>" style="width:24px; height:24px;" alt="<?php echo get_option($shortname .'_icon_5_alt'); ?>" />
			</div>
		<?php endif; ?>
		<?php if(get_option($shortname .'_rss_icon')) :?>
			<div class="vsocial-item" onclick="window.open('<?php bloginfo('rss2_url'); ?>','RSS Feed','width=800, height=600, scrollbars=yes')">
				<img src="<?php echo get_template_directory_uri(); ?>/images/icons/24x24/<?php echo get_option($shortname .'_rss_icon'); ?>" style="width:24px; height:24px;" alt="RSS" />
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>