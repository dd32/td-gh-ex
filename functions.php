<?php

if (function_exists("register_sidebar")) {
        register_sidebar(Array("name" => "sidebar"));
}

// custom widgets

function widget_yes_search() {
?>		
		<?php _e('Search'); ?>
   		<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div>
				<input type="text" name="s" id="s" size="15" /><br />
				<? /*<input type="submit" value="<?php _e('Search'); ?>" />*/?>
			</div>
		</form>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_yes_search');

?>