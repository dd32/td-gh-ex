<form method="get" id="searchform" action="">
<div>

<input type="text" class="searchfield" value="<?php _e('Search for...', 'altop'); ?>" 
	onblur="if(this.value=='')this.value='<?php _e('Search for...', 'altop'); ?>';" 
	onfocus="if(this.value=='<?php _e('Search for...', 'altop'); ?>')this.value='';" 
	name="s" id="s" />

</div>
</form>