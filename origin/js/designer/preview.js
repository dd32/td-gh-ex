/**
 * Handles previewing a design
 */

var lastInput = undefined;
var updateLocked = false;

/**
 * This function should be called every time a value is changed.
 * 
 * @param mixed trigger What triggered the update
 * @param bool refresh Set to true if we just want to refresh the preview
 */
var previewUpdate = function(trigger, refresh, clean){
    if (simpleHistory.lock) return;
    
    var confirm = false;
    if(refresh == undefined && clean == undefined) confirm = true; 
    
    if (refresh == undefined) refresh = false;
    if (clean == undefined) clean = false;
    
	var input = getOriginValues();
    
    if(refresh){
        setPreviewInput(input, clean);
    }
    else{
        if(lastInput == JSON.stringify(input)) return false;
        lastInput = JSON.stringify(input);
        simpleHistory.add(input);
        setPreviewInput(input, clean);
    }
    
    if(confirm){
        jQuery(window).unbind('beforeunload');
        jQuery(window).bind('beforeunload', function(){
            return 'Are you sure you want to navigate away from this page?';
        });
    }
    
    return input;
}

var getOriginValues = function(){
    var $ = jQuery;
    
    var input = {};

    $('.preview-field').each(function () {
        var $$ = $(this);
        
        var reg = (/\[(.*?)\]/g);
        var match;
        var name = [];
        while(match = reg.exec($$.attr('name'))){
            name.push(match[1]);
        }
        
        if (input[name[0]] == undefined) input[name[0]] = {};
        
        var val;
        if($$.attr('type') == 'checkbox') val = $$.is(':checked');
        else val = $$.val();
        
        if(name[2] == undefined) input[name[0]][name[1]] = val;
        else{
            if (input[name[0]][name[1]] == undefined) input[name[0]][name[1]] = {};
            input[name[0]][name[1]][name[2]] = val;
        }
    });
    
    return input;
}

/**
 * @param input
 */
var setPreviewInput = function(input, clean){
    if(clean == undefined) first = false;
    var $ = jQuery;
    
    // Generate Origin CSS, then parse it
    var css = originGenerateCss(input, originExecutor);
    
    if(clean){
        // On the first run, we'll just create an empty stylesheet.
        
        $('#preview-iframe').contents()
            .find('#origin-css').remove().end()
            .find('head').append($('<style type="text/css" id="origin-css"></style>').html(css));

        return;
    }

    var parser = new CSSParser();
    var newSheet = parser.parse(css, false, true);

    // Fetch the CSS stylesheet from the designer frame
    if (frames['preview-iframe'].document.getElementById('origin-css') == null) return;
    var previewSheet = frames['preview-iframe'].document.getElementById('origin-css').sheet;
    var cssRule = false;
    var i = 0;
    
    // Manipulate the Origin CSS so its like the newly generated one
    do {
        if (previewSheet.cssRules) {
            // We're dealing with cool browsers
            cssRule = previewSheet.cssRules[i];
        }
        else {
            // We're dealing with IE
            cssRule = previewSheet.rules[i];
        }
        
        if (cssRule) {
            var newCssRule = newSheet.cssRules[i];
            // Make sure that the selectors match
            if (newCssRule.mSelectorText == cssRule.selectorText) {
                // Perform the manipulation
                for (var k in newCssRule.declarations) {
                    var d = newCssRule.declarations[k];
                    if (cssRule.style[d.property] != d.valueText) {
                        // Assign the new value to elements that have changed
                        cssRule.style[d.property] = d.valueText;
                    }
                }
            }
        }
        i++;
    } while (cssRule);
}

jQuery(function($){
	$("#preview-iframe").load(function(){
        // Refresh the preview
        previewUpdate(null, true, true);
	});
});
