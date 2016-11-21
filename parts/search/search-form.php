<div id="searchform">
	<form action="<?PHP echo esc_url( home_url( '/' ) ) ?>" method="GET">
		<label for="searchbox"><?PHP echo __("Search for", "antonine"); ?></label>
		<input id="searchbox" type="text" maxlength="100" class='antonine_search_box' name="s" value="<?PHP echo esc_html(__("Enter term....", "antonine")); ?>" />
		<input type="submit" value="<?PHP echo esc_html(__("Search", "antonine")); ?>" />
	</form>
</div>