<form role="search" method="get" class="pie_search_form search-form" action="<?php echo home_url( '/' ); ?>">
<div id="terminal" onclick="$('s').focus();" onblur="alert('blur');">
		<input type="text" value="<?php get_search_query();?>" name="s" id="s" onkeydown="writeit(this, event);moveIt(this.value.length, event)" onkeyup="writeit(this, event)" onkeypress="writeit(this, event);" maxlength="75" />
		<div id="getter">
			<span id="writer"></span><span id="cursor">&nbsp;</span>
		</div>
	</div>
	</form>
