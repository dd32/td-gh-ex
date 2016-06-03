function repairloop(node, css_element){
	jQuery(node)
			.children()
		.each(
			function(index,value){
				jQuery(value)
					.css(css_element,jQuery(value).attr(css_element));
				Cookies.set('basic_accessibility_' + css_element, jQuery(value).attr(css_element));
				if(jQuery(value).children().length!=0){
					repairloop(jQuery(value), css_element);
				}
			}
		);
}

function loop(node, css_element, colour){
	Cookies.set('basic_accessibility_' + css_element, colour);
	jQuery(node)
		.children()
		.each(
			function(index,value){
				bg = jQuery(value).css(css_element);
				if(bg.indexOf("0, 0, 0")==-1){
					jQuery(value)
						.css(css_element,colour);
				}
				if(jQuery(value).attr("id")!="basic_accessibility_widget"){
					loop(jQuery(value),css_element,colour);
				}
				
			}
		);
}

function setloop(node,css_element){
	jQuery(node)
		.children()
		.each(
			function(index,value){
				bg = jQuery(value).css(css_element);
				if(bg.indexOf("0, 0, 0")==-1){
					jQuery(value)
						.attr(css_element, bg);
				}
				setloop(jQuery(value),css_element);	
			}
		);
}

function initialise(css_element){
	setting = Cookies.get('basic_accessibility_' + css_element);
	if(setting){
		if(css_element!=="font-size"){
			jQuery("#basic_accessibility_" + css_element).spectrum("set", setting);
		}else{
			jQuery("#basic_accessibility_font-size").slider('value',setting);
		}
		if(setting){
			loop(jQuery("html"), css_element, setting);
		}
	}else{
		if(css_element=="font-size"){
			jQuery("#basic_accessibility_font-size").slider('value',jQuery("#basic_accessibility_font-size_default").val());
			jQuery("#basic_accessibility_font-size_display").html(jQuery("#basic_accessibility_font-size_default").val());
		}else{
			jQuery("#basic_accessibility_" + css_element).spectrum("set", jQuery("#basic_accessibility_" + css_element + "_default").val());
		}
	}
}

jQuery(document)
	.ready(
		function(){

			jQuery("#access-font-size").slider(
				{
					min: 12,
				 	max: 100,
				    slide: function( event, ui ) {
					    jQuery("#basic_accessibility_font-size_display").html(ui.value);
						loop(jQuery("html"), "font-size", ui.value + "px");
      				}
				}
			);

			jQuery("#basic_accessibility_background-color").spectrum({
				color: "#f00",
				showInput: true,
				showInitial: true,
				showButtons: false,
				move: function(color) {
					loop(jQuery("html"), "background-color", color.toHexString());
				}
			});

			jQuery("#basic_accessibility_color").spectrum({
				color: "#f00",
				showInput: true,
				showInitial: true,
				showButtons: false,
				move: function(color) {
					loop(jQuery("html"), "color", color.toHexString());
				}
			});

			initialise("background-color");
			initialise("color");	
			initialise("font-size");
	
			setloop(jQuery("html"), "background-color");
			setloop(jQuery("html"), "color");
			setloop(jQuery("html"), "font-size");

			jQuery("#basic_accessibility_widget_restore_background")
				.on("click", function(){
						repairloop(jQuery("html"), "background-color");
						jQuery("#basic_accessibility_background-color").spectrum("set", jQuery("body").css("background-color"));
					}
				);

			jQuery("#basic_accessibility_widget_restore_colour")
				.on("click", function(){
						repairloop(jQuery("html"), "color");
						jQuery("#basic_accessibility_color").spectrum("set", jQuery("body").css("color"));

					}
				);

			jQuery("#basic_accessibility_widget_font-size_restore")
				.on("click", function(){
						repairloop(jQuery("html"), "font-size");
						jQuery("#basic_accessibility_font-size_display").html(parseInt(jQuery("body").css("font-size")));
						jQuery("#basic_accessibility_font-size").slider('value', parseInt(jQuery("body").css("font-size")));
					}
				);

			jQuery("#basic_accessibility_widget_default")
				.on("click", function(){
						loop(jQuery("html"),"background-color", jQuery("#basic_accessibility_background-color_default").val());
						loop(jQuery("html"),"color", jQuery("#basic_accessibility_color_default").val());	
						loop(jQuery("html"),"color", jQuery("#basic_accessibility_font-size_default").val());	
						Cookies.remove('basic_accessibility_background-color');
						Cookies.remove('basic_accessibility_color');
						Cookies.remove('basic_accessibility_font-size');
						location.reload();
					}
				);

			jQuery("#basic_accessibility_widget_options_show")
				.on("click", function(){
						if(jQuery("#basic_accessibility_widget_options").is(':visible')){
							jQuery("#basic_accessibility_widget_options_show").html("Show Options");
							jQuery("#basic_accessibility_widget_options").slideUp(200);
						}else{
							jQuery("#basic_accessibility_widget_options_show").html("Hide Options");
							jQuery("#basic_accessibility_widget_options").slideDown(200);
						}	
					}
				);

		}
	);