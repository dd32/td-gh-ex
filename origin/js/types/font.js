jQuery(function($){
    var webfonts = undefined;
    
    $('fieldset.type-font select.family').chosen({}).change(function(){
        // Trigger an update on Chosen
        $(this).trigger("liszt:updated");
    });
    
    $('fieldset.type-font select.family')
        .change(function(){
            var fieldset = $(this).closest('fieldset');
            var option = fieldset.find('select.family option:selected');
            
            var id = fieldset.attr('id');
            
            fieldset.find('.variants').empty();
            var variants = option.attr('data-variants').split(',');
            for(var i = 0; i < variants.length; i++){
                var tid = id + i;
                var n = $("<label />").attr('for', tid).html(" "+variants[i]+" ").prepend(
                    $('<input type="radio" />')
                        .attr('id', tid)
                        .val(variants[i])
                        .attr('name', id+'_variant_radio') 
                ).appendTo(fieldset.find('.variants'));
            }
            
            // Pick a default
            var opts = [fieldset.find('.variants').attr('data-current'), 'regular', 400];
            
            for(var i = 0; i < opts.length; i++){
                var f = fieldset.find('.variants input[value=' + opts[i] + ']')
                if(f.length > 0) {
                    // This also triggers a change on the variant
                    f.click();
                    break;
                }
            }
            
            // Add the new CSS for web fonts
            var newWebfonts = [];
            $('fieldset.type-font').each(function(){
                var $$ = $(this);
                var family = $$.find('select.family').val();
                var variant = $$.find('input.variant').val();
                
                newWebfonts.push(encodeURIComponent(family) + ':' + variant);
            });
            newWebfonts = newWebfonts.join('|');
            
            if(newWebfonts != webfonts){
                webfonts = newWebfonts;
                var stylesheet = $('<link rel="stylesheet" id="google-webfonts-css" class="google-webfonts-css" type="text/css" />')
                    .attr('href', 'http://fonts.googleapis.com/css?family=' + webfonts);
                
                $('#preview-iframe').contents().find('.google-webfonts-css').remove()
                    .end().find('head').append(stylesheet);
            }
            
            previewUpdate();
            
        });
    
    // When ever the preview iframe loads, we need to reload the google fonts
    $('#preview-iframe').load(function(){
        // Load all the webfonts
        var webfonts = [];
        $('fieldset.type-font').each(function(){
            var $$ = $(this);
            webfonts.push(encodeURIComponent($$.find('select.family').val()) + ':' + $$.find('input.variant').val());
        });
        webfonts = webfonts.join('|');

        var stylesheet = $('<link rel="stylesheet" id="google-webfonts-css" class="google-webfonts-css" type="text/css" />')
            .attr('href', 'http://fonts.googleapis.com/css?family=' + webfonts);

        $('#preview-iframe').contents().find('.google-webfonts-css').remove()
            .end().find('head').append(stylesheet);
    })

    $('fieldset.type-font .variants input').live('click', function(){
        var fieldset = $(this).closest('fieldset');
        $(this).closest('.variants').attr('data-current', $(this).val());
        fieldset.find('input[type=hidden]').val($(this).val());

        previewUpdate();
    });
});