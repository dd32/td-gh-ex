/* Autoadjust JS Library v1.0.0

License:GNU General Public License v3 or later
License URI:license.txt

Copyright (C) 2013 Andrew Dyer */

/* TRANSFORM DROP DOWN MENU INTO SELECT MENU 
--------------------------------------------------------------- */
(function($) {
	$(function() {
		$("<select />").appendTo("ul.drop-down-menu");
		$("<option />", {
			"selected": "selected",
			"value"   : "",
			"text"    : "Go to ..."
		}).appendTo(".drop-down-menu select");
		$("ul.drop-down-menu li a").each(function() {
			var el = $(this);
			var padding = "";
			for (var i = 0; i < el.parentsUntil('div > ul').length - 2; i++)
			padding += "—";
			padding += " ";
			$("<option />", {
			  "value"   : el.attr("href"),
			  "text"    : padding + el.text()
			}).appendTo(".drop-down-menu select");
		});     
		$(".drop-down-menu select").change(function() {
			window.location = $(this).find("option:selected").val();
		});
	});
})(jQuery);