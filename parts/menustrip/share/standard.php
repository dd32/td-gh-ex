<div id="shareForm">
	<div id="shareButtons">
<?PHP	
$absolute_url = urlencode(antonine_full_url( $_SERVER ));
?>
		<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?PHP echo $absolute_url; ?>"><?PHP echo __("Facebook","antonine"); ?></a>
		<a target="_blank" href="https://twitter.com/intent/tweet?source=tweet_button&url=<?PHP echo $absolute_url; ?>"><?PHP echo __("Twitter","antonine"); ?></a>
		<a target="_blank" href="whatsapp://send?text=<?PHP echo $absolute_url; ?>"><?PHP echo __("Whatsapp","antonine"); ?></a>
		<span id="shareClose"><span class="fa fa-times"></span></span></p>
	</div>
</div>