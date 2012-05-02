jQuery(function($){
    
    var page = 1;
    
    $('#loadmore').click(function(){
        var $$ = $(this);
        $('#theme-styles').addClass('loading');
        $.getScript(originStyles.endpoint + '&page=' + page);
        page++;
        $$.attr('disabled', 'true');
        return false;
    }).click();

    $('#style-preview-overlay, #style-preview .close').click(function(){
        $('#style-preview, #style-preview-overlay').hide();
    });
    
    $('.preview-style').live('click', function(){
        var $$ = $(this);
        var style = $$.closest('.style').data('style');

        $('#style-preview, #style-preview-overlay').show();
        var iframe = $('#style-preview iframe');
        iframe.hide().attr('src', originStyles.previewBase + '?om=preview_style&theme_style='+style.post_name)
        
        return false;
    });
    
    // Show the iframe
    $('#style-preview iframe').load(function(){
        var $$ = $(this);
        $$.show();
        $('#style-preview iframe').contents().find('a').click(function(){
            // Hide the iframe when any of its links are clicked
            $$.hide();
        });
    });

    
    
    $('#theme-styles li.style')
        .live('mouseenter', function(){
            $(this).find('.preview-style, .download-style').show();
        })
        .live('mouseleave', function(){
            $(this).find('.preview-style, .download-style').hide();
        });
    
});

window.originStylesCallback = function(data){
    var $ = jQuery.noConflict();
    $.each(data.styles, function(i, el){
        // Create an entry
        var style = $('<li class="style"></li>').appendTo($('#theme-styles'));
        style
            .data('style', el)
            .append(
                $('<a />').attr('href', el.permalink).attr('target', '_blank')
                    .append($('<img />').attr('src', el.screenshots.small).width(250).height(175))
            )
            .append(
                $('<a >').attr('href', originStyles.previewBase).addClass('preview-style').hide()
            )
            .append(
                $('<a >').attr('href', el.permalink+'download/').addClass('download-style').attr('target', '_blank').hide()
            )
    });

    $('#loadmore').attr('disabled', null);
    $('#theme-styles').removeClass('loading');
}