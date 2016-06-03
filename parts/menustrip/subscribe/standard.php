<p id="subscribeClose" class="holderclose"><span><span class="fa fa-times"></span></span></p>
<h2><?PHP echo __("Subscribe", 'antonine'); ?></h2>
<div id="subscribesform">
	<form action="javascript:function(){return false;}">
		<p><?PHP echo __("Enter your email address to subscribe to new posts", 'antonine'); ?></p>
		<label for="emailaddress"><?PHP echo __("Email Address", 'antonine'); ?></label><input type="text" id="emailaddress" size="100" name="emailaddress" maxlength="100" />
		<p><input type="submit" id="subscribeButton" value="<?PHP echo __("Subscribe", 'antonine'); ?>" /></p>
	</form>
</div>
<p id="subscribeResponse"><?PHP echo __("A response will appear here", "antonine"); ?></p>