jQuery(function($){
    $('fieldset.type-toggle input[type=checkbox]').change(function(){
        var $$ = $(this);
        previewUpdate($$);
    });
})