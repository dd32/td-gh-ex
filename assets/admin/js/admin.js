(function($){
    $(document).ready(function (e) {
        $('#customize-controls .preview-notice').append('<a class="afford-pro-link" href="http://www.mudthemes.com/showcase/afford-theme" title="Upgrade to Premium" target="_blank">Upgrade to Premium</a>');
        $('.afford-pro-link').click(function (e) {
            e.stopPropagation();
        });
    });
})(jQuery);