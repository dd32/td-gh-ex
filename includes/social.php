<div id="TopMenuSocial">
<?php if(of_get_option('fb')) : ?>
	<div class="socialfb">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('fb'));?>" alt="Facebook" target="_blank"></a>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<?php if(of_get_option('yt')) : ?>
	<div class="socialyt">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('yt'));?>" alt="YouTube" target="_blank"></a>
		</div>	
	<?php else : ?>
	<?php endif; ?>
	<?php if(of_get_option('tw')) : ?>	
	<div class="socialtw">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('tw'));?>" alt="Twitter" target="_blank"></a>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<?php if(of_get_option('gp')) : ?>	
	<div class="socialgp">
		<a  rel="nofollow" href="<?php echo esc_url(of_get_option('gp'));?>" alt="Google+" target="_blank"></a>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<?php if(of_get_option('rss')) : ?>
	<div class="socialrss">
		<a  rel="nofollow" href="<?php echo esc_url(of_get_option('rss'));?>" alt="RSS Feed" target="_blank"></a>
		</div>
	<?php else : ?>
	<?php endif; ?>		
</div>