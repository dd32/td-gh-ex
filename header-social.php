
<?php

// Social

global $options;
$options = get_option('admired_theme_options');
?>
	<div class="admired-social">

		<ul class="admired-social">

			<?php // Youtube
			if ( isset ($options['admired_youtube_id']) &&  ($options['admired_youtube_id']!="") ) {
				$output = '<li><a target="_blank" href="http://youtube.com/user/'."";
				$output .= $options['admired_youtube_id'] ."";
				$output .= '" id="admired-youtube" title="Youtube"></a></li>'."";
				echo stripslashes($output);
			} // Google Buzz
			if ( isset ($options['admired_google_buzz_id']) &&  ($options['admired_google_buzz_id']!="") ) {
				$output = '<li><a target="_blank" href="http://google.com/profiles/'."";
				$output .= $options['admired_google_buzz_id'] ."";
				$output .= '" id="admired-buzz" title="Google buzz"></a></li>'."";
				echo stripslashes($output);
			} // Google Plus
			if ( isset ($options['admired_google_plus_id']) &&  ($options['admired_google_plus_id']!="") ) {
				$output = '<li><a target="_blank" href="http://plus.google.com/'."";
				$output .= $options['admired_google_plus_id'] ."";
				$output .= '" id="admired-plus" title="Google Plus"></a></li>'."";
				echo stripslashes($output);
			} // Twitter
			if ( isset ($options['admired_twitter_id']) &&  ($options['admired_twitter_id']!="") ) {
				$output = '<li><a target="_blank" href="http://twitter.com/'."";
				$output .= $options['admired_twitter_id'] ."";
				$output .= '" id="admired-twitter" title="Twitter"></a></li>'."";
				echo stripslashes($output);
			} // Facebook
			if ( isset ($options['admired_facebook_id']) &&  ($options['admired_facebook_id']!="") ) {
				$output = '<li><a target="_blank" href="http://facebook.com/'."";
				$output .= $options['admired_facebook_id'] ."";
				$output .= '" id="admired-facebook" title="Facebook"></a></li>'."";
				echo stripslashes($output);
			} // Rss
			if ( isset ($options['admired_rss_feed']) &&  ($options['admired_rss_feed']!="") ) {
				echo ('<li><a target="_blank" href="');
				echo ( bloginfo( 'rss_url'));
				echo ('" id="admired-rss" title="RSS"></a></li>');	
			}
			?>
		</ul>
	</div><!-- .admired-social -->