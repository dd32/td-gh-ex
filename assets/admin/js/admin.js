(function($){
    $(document).ready(function (e) {
        $('#customize-controls .preview-notice').append('<a class="actuate-pro-link" href="http://www.mudthemes.com/showcase/actuate-theme" title="'+actuateCustomizerUpgradeVars.upgrade_text+'" target="_blank">'+actuateCustomizerUpgradeVars.upgrade_text+'</a>');
        $('.actuate-pro-link').click(function (e) {
            e.stopPropagation();
        });
    });
})(jQuery);