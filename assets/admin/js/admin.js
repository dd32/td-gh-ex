(function($){
    $(document).ready(function (e) {
        $('#customize-controls .preview-notice').append('<a class="afford-pro-link" href="http://www.mudthemes.com/showcase/afford-theme" title="'+affordCustomizerUpgradeVars.upgrade_text+'" target="_blank">'+affordCustomizerUpgradeVars.upgrade_text+'</a>');
        $('.afford-pro-link').click(function (e) {
            e.stopPropagation();
        });
    });
})(jQuery);