(function($) {
	//Responsive menu for the navigation
	$(function() {
		$("<select />").appendTo("#navigation ul");
		$("<option />", {
			"selected": "selected",
			"value"   : "",
			"text"    : "Go to ..."
		}).appendTo("#navigation select");
		$("#navigation ul li a").each(function() {
			var el = $(this);
			var padding = "";
			for (var i = 0; i < el.parentsUntil('div > ul').length - 2; i++)
			padding += "—";
			padding += " ";
			$("<option />", {
			  "value"   : el.attr("href"),
			  "text"    : padding + el.text()
			}).appendTo("#navigation select");
		});     
		$("#navigation select").change(function() {
			window.location = $(this).find("option:selected").val();
		});
	}); 
	//Script to slide to the top of the page
	$(document).ready(function() {
		$('#gototop').click(function(){
			$('html, body').animate({scrollTop:0}, 'slow');
			return false;
		});	
	});
})(jQuery);
