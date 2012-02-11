

var akyuz_admin_panel;
(function($){akyuz_admin_panel={
	init:function(){
		//admin panel
		var wpi_title;
		$('#akyuz-options-panel .akyuz-options-panel-menu-link:first').addClass('visible');
		$('#akyuz-options-panel .akyuz-options-panel-content-box:first').addClass('visible');
		$('.akyuz-options-panel-menu-link').click(function(event) {
			event.preventDefault();
		});
		$('.akyuz-options-panel-menu-link').click(function() {
			wpi_title = $(this).attr("id").replace('akyuz-options-panel-menu-', '');
			$('.akyuz-options-panel-menu-link').removeClass('visible');
			$('#akyuz-options-panel-menu-' + wpi_title).addClass('visible');
			$('.akyuz-options-panel-content-box').removeClass('visible');
			$('.akyuz-options-panel-content-box').hide();
			$('#akyuz-options-panel-content-' + wpi_title).fadeIn("fast");
			$('.akyuz-options-panel-content-box').removeClass('visible');
		});
	}
};

$(document).ready(function(){
	akyuz_admin_panel.init()
})})(jQuery);