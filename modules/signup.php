<div class="right-col line-divider pull-left">
	<?php if (!is_user_logged_in()): ?>
		<a class="signin-button" href="<?php echo esc_url(wp_login_url(home_url('/'))); ?>"><?php _e('Sign in', 'beatmix_lite'); ?></a>
		<a class="reg-button" href="<?php echo esc_url(wp_registration_url()); ?>"><?php _e('Register', 'beatmix_lite'); ?></a>
	<?php else:?>
		<a class="signin-button" href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>"><?php _e('Log out', 'beatmix_lite'); ?></a>
	<?php endif;?>
</div>