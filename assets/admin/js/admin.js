(function($){
    $(document).ready(function (e) {
        $('#customize-controls .preview-notice').append('<a class="actuate-pro-link" href="http://www.mudthemes.com/showcase/actuate-theme" title="Upgrade to Premium" target="_blank">Upgrade to Premium</a>');
        $('.actuate-pro-link').click(function (e) {
            e.stopPropagation();
        });
    });
})(jQuery);