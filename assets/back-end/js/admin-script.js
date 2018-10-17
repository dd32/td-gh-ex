/**
 * File admin-script.js.
 *
 * Theme Custom admin script.
 */

( function( $ ) {

    "use strict";

    // Welcome Page Menu Tab
    $('ul.about-theme-tab-nav li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul.about-theme-tab-nav li').removeClass('active');
        $('.about-theme-tab').removeClass('active');

        $(this).addClass('active');
        $("#" + tab_id).addClass('active');
    });

    // Add Active class with anchor actions click.
    $('.about-theme-tab .actions').click(function () {
        var status_id = $(this).attr('href').split('#');
        $('ul.about-theme-tab-nav li').removeClass('active');
        $('.about-theme-tab').removeClass('active');
        $('ul.about-theme-tab-nav li[data-tab="'+status_id[1]+'"]').addClass('active');
        $("#" + status_id[1]).addClass('active');
    });

    // Meta-box Tabs Settings
    $('ul.metabox-tab-nav li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul.metabox-tab-nav li').removeClass('active');
        $('.setting-tab').removeClass('active');

        $(this).addClass('active');
        $("#" + tab_id).addClass('active');
    });

    // Add Active class with anchor actions click.
    $('.setting-tab .actions').click(function () {
        var status_id = $(this).attr('href').split('#');
        $('ul.metabox-tab-nav li').removeClass('active');
        $('.setting-tab').removeClass('active');
        $('ul.metabox-tab-nav li[data-tab="'+status_id[1]+'"]').addClass('active');
        $("#" + status_id[1]).addClass('active');
    });

    // Reset post meta settings
    $( 'div#post_meta_fields div.metabox-reset-settings a.metabox-reset-btn' ).click( function() {
        var $reset = $(this).data('reset');
        var $cancel = $(this).data('cancel');
        var $confirm = $( 'div.metabox-reset-settings div.metabox-reset-checkbox' ),
            $text   = $confirm.is(':visible') ? $reset : $cancel;
        $( this ).text( $text );
        $( 'div.metabox-reset-settings div.metabox-reset-checkbox input' ).attr('checked', false);
        $confirm.toggle();
    });
    
} ) ( jQuery );  