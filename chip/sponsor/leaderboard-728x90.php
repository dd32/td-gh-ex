<?php
if( get_option($theme_options['c102']['id'] ) == "yes"):
	if( get_option($theme_options['c103']['id']) == "na" ):
?>
		<img src="<?php echo SPONSOR_WSROOT; ?>leaderboard-728x90.gif" width="728" height="90" />
<?php 
	else:
		echo stripslashes( get_option($theme_options['c103']['id']) );
	endif;
endif;
?>