jQuery(document).ready( function($) {
	
	var templatedirectory = template.directory;
	
	if ( $("#color-blue").is(":checked") )
		{
			var color = "blue";
		}
		else if ( $("#color-pink").is(":checked") )
		{
			var color = "pink";
		}
		else if ( $("#color-green").is(":checked") )
		{
			var color = "green";
		}
		else
		{
			var color = "purple";
		}
		
		if ( $("#skin-medium").is(":checked") )
		{
			var skin = "medium";
		}
		else if ( $("#skin-dark").is(":checked") )
		{
			var skin = "dark";
		}
		else
		{
			var skin = "light";
		}
		
		if ( $("#hair-black").is(":checked") )
		{
			var hair = "black";
		}
		else if ( $("#hair-blonde").is(":checked") )
		{
			var hair = "blonde";
		}
		else if ( $("#hair-red").is(":checked") )
		{
			var hair = "red";
		}
		else
		{
			var hair = "brown";
		}
		
		$("#preview-image").attr("src", templatedirectory + color + "-" + skin + "-" + hair + ".png");
		
	$("#wpbody").click ( function() {
		if ( $("#color-blue").is(":checked") )
		{
			var color = "blue";
		}
		else if ( $("#color-pink").is(":checked") )
		{
			var color = "pink";
		}
		else if ( $("#color-green").is(":checked") )
		{
			var color = "green";
		}
		else
		{
			var color = "purple";
		}
		
		if ( $("#skin-medium").is(":checked") )
		{
			var skin = "medium";
		}
		else if ( $("#skin-dark").is(":checked") )
		{
			var skin = "dark";
		}
		else
		{
			var skin = "light";
		}
		
		if ( $("#hair-black").is(":checked") )
		{
			var hair = "black";
		}
		else if ( $("#hair-blonde").is(":checked") )
		{
			var hair = "blonde";
		}
		else if ( $("#hair-red").is(":checked") )
		{
			var hair = "red";
		}
		else
		{
			var hair = "brown";
		}
		
		$("#preview-image").attr("src", templatedirectory + color + "-" + skin + "-" + hair + ".png");
	});
}
);