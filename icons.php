<?php
/*
	Section: Icons
	Authors: Trent Lapinski, Tyler Cunningham 
	Description: Creates header icons.
	Version: 1.0	
*/

	$facebook		= get_option('if_facebook') ? '' : 'http://www.facebook.com';
	$twitter		= get_option('if_twitter') ? '' : 'http://www.twitter.com';
	$linkedin		= get_option('if_linkedin') ? '' : 'http://www.linkedin.com';
	$youtube		= get_option('if_youtube') ? '' : 'http://www.youtube.com';
	$googlemaps		= get_option('if_googlemaps') ?'' : 'http://maps.google.com';
	$email			= get_option('if_email') ? '' : 'no@way.com';
	$rss			= get_option('if_rsslink') ? '' : 'default';

?>

<div class="icons">

	<?php if ($facebook != 'hide' ):?>
		<a href="<?php echo $facebook ?>" /><img src="<?php echo get_template_directory_uri(); ?>/images/social/facebook.png" alt="Facebook" /></a>
	<?php endif;?>
	<?php if ($twitter != 'hide' ):?>
		<a href="<?php echo $twitter ?>" /><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt="Twitter" /></a>
	<?php endif;?>
	<?php if ($linkedin != 'hide' ):?>
		<a href="<?php echo $linkedin ?>" /><img src="<?php echo get_template_directory_uri(); ?>/images/social/linkedin.png" alt="LinkedIn" /></a>
	<?php endif;?>
	<?php if ($youtube != 'hide' ):?>
		<a href="<?php echo $youtube ?>" /><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" alt="YouTube" /></a>
	<?php endif;?>
	<?php if ($googlemaps != 'hide' ):?>
		<a href="<?php echo $googlemaps ?>" /><img src="<?php echo get_template_directory_uri(); ?>/images/social/googlemaps.png" alt="Google Maps" /></a>
	<?php endif;?>
	<?php if ($email != 'hide' ):?>
		<a href="mailto:<?php echo $email ?>" /><img src="<?php echo get_template_directory_uri(); ?>/images/social/email.png" alt="E-mail" /></a>
	<?php endif;?>
	<?php if ($rss != 'hide' and $rss != 'default' ):?>
		<a href="<?php echo $rss ?>" /><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" alt="RSS" /></a>
	<?php endif;?>
	<?php if ($rss == 'default' ):?>
		<a href="<?php bloginfo('rss2_url'); ?>" /><img src="<?php echo get_template_directory_uri(); ?>/images/social/rss.png" alt="RSS" /></a>
	<?php endif;?>
	
</div>