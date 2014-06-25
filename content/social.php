<?php
/**
 * Social link.
 */
?>

<div class="social-url">
        <?php if ( of_get_option('facebook_url') ) {
              $facebook_url = of_get_option('facebook_url', '');
			  echo "<a href='$facebook_url' title='Facebook' target='_blank' class='facebook-icon'></a>";
		}?>
         <?php if ( of_get_option('twitter_url') ) {
              $twitter_url = of_get_option('twitter_url', '');
			  echo "<a href='$twitter_url' title='Twitter' target='_blank' class='twitter-icon'></a>";
		}?>
         <?php if ( of_get_option('google_url') ) {
              $google_url = of_get_option('google_url', '');
			  echo "<a href='$google_url' title='Google Plus' target='_blank' class='google-icon'></a>";
		}?>
        <?php if ( of_get_option('pinterest_url') ) {
              $pinterest_url = of_get_option('pinterest_urll', '');
			  echo "<a href='$pinterest_url' title='Pinterest' target='_blank' class='pinterest-icon'></a>";
		}?>
 </div><!-- .social url -->  