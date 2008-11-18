//Remove the text from the search form.
jQuery(document).ready(function() {
	var defaut_text=jQuery("#searchform input").val();
	jQuery("#searchform input").focus(function(){
		if(jQuery("#searchform input").val()==defaut_text)
			jQuery("#searchform input").val("");
	});
});

