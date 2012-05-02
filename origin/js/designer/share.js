jQuery(function($){
    $('#share-modal iframe').load(function(){
        $(this).show();
    });
    
    // Handler for clicking on the share button
    $('.od-bar-button.share').click(function(){
        $('#od-overlay').css('opacity', 0.99).fadeIn();
        $('#share-modal')
            .fadeIn()
            .css({
                'margin-top' : -$('#share-modal').height()/2,
                'margin-left' : -$('#share-modal').width()/2,
            })
            .find('iframe')
            .hide();
        
        // Submit the settings to the share iframe, then restore the original URL
        var sform = $('#settings-form');
        sform
            .attr('action', originSettings.shareUrl)
            .attr('target', 'share-iframe')
            .submit()
            .attr('action', sform.attr('data-original-url'));
            
    });
    
    $('#share-modal .close').click(function(){
        $('#share-modal').fadeOut();
        $('#od-overlay').fadeOut();
    });
});