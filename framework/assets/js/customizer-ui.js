jQuery(document).ready(function($) {


/*===================================================================*/                						
/*  CUSTOM CSS AREA		                							
/*===================================================================*/	
	var previewDiv = $('#customize-preview');
	$('.wp-full-overlay-header').append('<div id="themeora-tools"></div>');
	var themeoratools = $('#themeora-tools');
	var helloexpiration = $('li#customize-control-hello_bar_expiration label span');
	
	
/*===================================================================*/                						
/*  CUSTOM CSS			                							
/*===================================================================*/
	function toolsCSS() 
	{
		themeoratools.append('<a id="tools_css" class="button themeora-ui-button" href="#" title="Adjust your theme custom css">Custom CSS Editor</a>');
		previewDiv.prepend('<div id="themeora-customcss"><form><textarea id="csstextarea"></textarea></form></div>');

		var cssWindow = $('#customize-preview #themeora-customcss');
		var cssText = $('#customize-preview #themeora-customcss form textarea');
		var ogText = $("li#customize-control-themeora_tools_css").children('textarea');

		$('#tools_css').click(function(e)
		{
			e.preventDefault();
			if($(this).hasClass('active')) {
				$(this).removeClass('active');
				cssWindow.fadeToggle('fast');
				ogText.val(cssText.val()).keyup();

			} else {

				$(this).addClass('active');
				cssWindow.fadeToggle('fast');
				cssText.val('');
				cssText.focus();
				cssText.val(ogText.val());
			}
		});
	}
	toolsCSS();
	

/*===================================================================*/                						
/*  HELP DOC LINK			                							
/*===================================================================*/
	function toolsDOC() 
	{
		themeoratools.append('<a id="tools_doc" class="button themeora-ui-button" href="" target="_blank" title="Access your theme help guide">Help Guide</a>');

	}	//toolsDOC();	

/*===================================================================*/                						
/*  HELP DOC LINK			                							
/*===================================================================*/
	function helloexpirationAPPD() 
	{
		helloexpiration.append(' <a id="expiration_help" class="info-link" href="" target="_blank" >( ? )</a>');

	}	//helloexpirationAPPD();	



/*===================================================================*/                						
/*  LOADING		                							
/*===================================================================*/
	previewDiv.prepend('<div id="themeora-loading"></div>');
	loadingDiv = $('#customize-preview #themeora-loading');
	setInterval(function()
	{
		if( previewDiv.children('iframe').length > 1 ) 
		{
			loadingDiv.fadeIn('fast');
		} else 
		{
			loadingDiv.fadeOut('fast');
		}
	}, 1000);


/*===================================================================*/                						
/*  EDITOR TEXT		                							
/*===================================================================*/
HTMLTextAreaElement.prototype.getCaretPosition = function () { 
	    return this.selectionStart;
	};
	HTMLTextAreaElement.prototype.setCaretPosition = function (position) {
	    this.selectionStart = position;
	    this.selectionEnd = position;
	    this.focus();
	};
	HTMLTextAreaElement.prototype.hasSelection = function () {
	    if (this.selectionStart == this.selectionEnd) {
	        return false;
	    } else {
	        return true;
	    }
	};
	HTMLTextAreaElement.prototype.getSelectedText = function () {
	    return this.value.substring(this.selectionStart, this.selectionEnd);
	};
	HTMLTextAreaElement.prototype.setSelection = function (start, end) {
	    this.selectionStart = start;
	    this.selectionEnd = end;
	    this.focus();
	};
	var textarea = document.getElementById('csstextarea');

	textarea.onkeydown = function(event) {
	    
	    if (event.keyCode == 9) {
	        var newCaretPosition;
	        newCaretPosition = textarea.getCaretPosition() + "    ".length;
	        textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "    " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
	        textarea.setCaretPosition(newCaretPosition);
	        return false;
	    }
	    if(event.keyCode == 8){
	        if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") {
	            var newCaretPosition;
	            newCaretPosition = textarea.getCaretPosition() - 3;
	            textarea.value = textarea.value.substring(0, textarea.getCaretPosition() - 3) + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
	            textarea.setCaretPosition(newCaretPosition);
	        }
	    }
	    if(event.keyCode == 37){
	        var newCaretPosition;
	        if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") {
	            newCaretPosition = textarea.getCaretPosition() - 3;
	            textarea.setCaretPosition(newCaretPosition);
	        }    
	    }
	    if(event.keyCode == 39){
	        var newCaretPosition;
	        if (textarea.value.substring(textarea.getCaretPosition() + 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
	            newCaretPosition = textarea.getCaretPosition() + 3;
	            textarea.setCaretPosition(newCaretPosition);
	        }
	    } 
	}
	
	
});