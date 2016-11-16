<p id="searchClose" class="holderclose"><span><span class="fa fa-times"></span></span></p>
<div id="sitesearchform">
	<form action="<?PHP echo esc_url( home_url( '/' ) ) ?>" method="GET">
		<label for="searchbox"><?PHP echo __("Search for", "antonine"); ?></label>
		<input id="searchbox" type="text" maxlength="100" class='antonine_search_box' name="s" value="<?PHP echo __("Enter term....", "antonine"); ?>" />
		<input type="submit" value="<?PHP echo __("Search", "antonine"); ?>" />
	</form>
</div>