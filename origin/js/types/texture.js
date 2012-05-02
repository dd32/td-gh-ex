jQuery(function($){
	$('fieldset.type-texture select.texture').chosen({})
		.change(function(){
			var $$ = $(this);
			var option = $$.find('option[value="'+$$.val()+'"]');
			
			if(option.attr('data-image') != undefined){
				$$.parent().find('.current').css({
					'background-image' : 'url('+option.attr('data-image')+')'
				});
			}
			else{
				$$.parent().find('.current').css({
					'background-image' : 'none'
				});
			}

            $$.trigger("liszt:updated");
            
			// Update the preview to include the new texture
			previewUpdate($$);
		})
        .each(function(){
            var $$ = $(this);
            var option = $$.find('option[value="' + $$.val() + '"]');

            if (option.attr('data-image') != undefined) {
                $$.parent().find('.current').css({
                    'background-image':'url(' + option.attr('data-image') + ')'
                });
            }
            else {
                $$.parent().find('.current').css({
                    'background-image':'none'
                });
            }
        });

    $('fieldset.type-texture select.blend').change(function(){
        var $$ = $(this);
        previewUpdate($$);
    })
});