<div id="TopMenuSocial">
<?php if(of_get_option('fb')) : ?>
	<div class="socialfb">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('fb'));?>" alt="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<?php if(of_get_option('yt')) : ?>
	<div class="socialyt">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('yt'));?>" alt="YouTube" target="_blank"><i class="fa fa-youtube-play"></i></a>
		</div>	
	<?php else : ?>
	<?php endif; ?>
	<?php if(of_get_option('tw')) : ?>	
	<div class="socialtw">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('tw'));?>" alt="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<?php if(of_get_option('gp')) : ?>	
	<div class="socialgp">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('gp'));?>" alt="Google+" target="_blank"><i class="fa fa-google-plus"></i></a>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<?php if(of_get_option('rss')) : ?>
	<div class="socialrss">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('rss'));?>" alt="RSS Feed" target="_blank"><i class="fa fa-rss"></i></a>
		</div>
	<?php else : ?>
	<?php endif; ?>	

	<?php if(of_get_option('instagram')) : ?>
	<div class="socialinsta">
		<a rel="nofollow" href="<?php echo esc_url(of_get_option('instagram'));?>" alt="Instagram" target="_blank">
		<i class="fa fa-instagram"></i></a>
		</div>
	<?php else : ?>
	<?php endif; ?>		
</div>