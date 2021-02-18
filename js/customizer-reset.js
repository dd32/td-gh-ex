jQuery(function ($) {

    var sections = [
        [ '#customize-save-button-wrapper', 'all', 'ct-reset', 'ct-reset-main', catchEvolutionCustomizerReset.confirm, catchEvolutionCustomizerReset.reset ], // Reset main.
        ["#customize-control-catchevolution_options-content_layout select", "layout_options", "ct-layout-reset", "ct-reset-section", catchEvolutionCustomizerReset.confirmSection, catchEvolutionCustomizerReset.resetSection],
        ["#customize-control-catchevolution_options-excerpt_length input", "excerpt_options", "ct-excerpt-reset", "ct-reset-section", catchEvolutionCustomizerReset.confirmSection, catchEvolutionCustomizerReset.resetSection]
    ];

    $.each( sections, function( key, value ) {
        var $container = $(value[0]);

        var $button = $('<input type="submit" name="' + value[2] + '" id="' + value[2] + '" class="ct-reset ' + value[3] + ' button-secondary button">')
        .attr('value', value[5]);

        $button.on('click', function (event) {
            event.preventDefault();

            var data = {
                wp_customize: 'on',
                action: 'customizer_reset',
                nonce: catchEvolutionCustomizerReset.nonce.reset,
                section: value[1]
            };

            var r = confirm(value[4]);

            if (!r) return;

            $(".spinner").css('visibility', 'visible');

            $button.attr('disabled', 'disabled');

            $.post(ajaxurl, data, function () {
                wp.customize.state('saved').set(true);
                location.reload();
            });
        });

        $container.after($button);
    });
});
