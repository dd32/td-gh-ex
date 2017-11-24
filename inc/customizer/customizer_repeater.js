/********************************************
 *** General Repeater ***
 *********************************************/
 /* global jQuery */
 /* global wp */
 function media_upload(button_class) {
    'use strict';
    jQuery('body').on('click', button_class, function () {
        var button_id = '#' + jQuery(this).attr('id');
        var display_field = jQuery(this).parent().children('input:text');
        var _custom_media = true;

        wp.media.editor.send.attachment = function (props, attachment) {

            if (_custom_media) {
                if (typeof display_field !== 'undefined') {
                    switch (props.size) {
                        case 'full':
                        display_field.val(attachment.sizes.full.url);
                        display_field.trigger('change');
                        break;
                        case 'medium':
                        display_field.val(attachment.sizes.medium.url);
                        display_field.trigger('change');
                        break;
                        case 'thumbnail':
                        display_field.val(attachment.sizes.thumbnail.url);
                        display_field.trigger('change');
                        break;
                        default:
                        display_field.val(attachment.url);
                        display_field.trigger('change');
                    }
                }
                _custom_media = false;
            } else {
                return wp.media.editor.send.attachment(button_id, [props, attachment]);
            }
        };
        wp.media.editor.open(button_class);
        window.send_to_editor = function (html) {

        };
        return false;
    });
}
function bfastmag_uniqid(prefix, more_entropy) {
    'use strict';
    if (typeof prefix === 'undefined') {
        prefix = '';
    }

    var retId;
    var php_js;
    var formatSeed = function (seed, reqWidth) {
        seed = parseInt(seed, 10)
            .toString(16); // to hex str
        if (reqWidth < seed.length) { // so long we split
            return seed.slice(seed.length - reqWidth);
        }
        if (reqWidth > seed.length) { // so short we pad
            return new Array(1 + (reqWidth - seed.length))
            .join('0') + seed;
        }
        return seed;
    };

    // BEGIN REDUNDANT
    if (!php_js) {
        php_js = {};
    }
    // END REDUNDANT
    if (!php_js.uniqidSeed) { // init seed with big random int
        php_js.uniqidSeed = Math.floor(Math.random() * 0x75bcd15);
    }
    php_js.uniqidSeed++;

    retId = prefix; // start with prefix, add current milliseconds hex string
    retId += formatSeed(parseInt(new Date()
        .getTime() / 1000, 10), 8);
    retId += formatSeed(php_js.uniqidSeed, 5); // add seed hex string
    if (more_entropy) {
        // for more entropy we add a float lower to 10
        retId += (Math.random() * 10)
        .toFixed(8)
        .toString();
    }

    return retId;
}

function bfastmag_refresh_general_control_values() {
    'use strict';

    jQuery('.bfastmag_general_control_repeater').each(function () {
        var values = [];
        var th = jQuery(this);
        th.find('.bfastmag_general_control_repeater_container').each(function () {
            var icon_value = jQuery(this).find('.icp').val();
            var link = jQuery(this).find('.bfastmag_link_control').val();
            var title = jQuery(this).find('.bfastmag_title_control').val();
            var description = jQuery(this).find('.bfastmag_description_control').val();
            var button = jQuery(this).find('.bfastmag_button_control').val();
            var id = jQuery(this).find('.bfastmag_box_id').val();

            var choice = jQuery(this).find('.customizer-repeater-image-choice').val();
            var image_url = jQuery(this).find('.custom-media-url').val();

            if (link !== '' || icon_value !== '' || title !== '') {
                values.push({
                    'icon_value': icon_value,
                    'link': link,
                    'title': title,
                    'description': description,
                    'button': button,
                    'image_url': (choice === 'customizer_repeater_none' ? '' : image_url),
                    'id': id
                });
            }
        });
        th.find('.bfastmag_repeater_colector').val(JSON.stringify(values));
        th.find('.bfastmag_repeater_colector').trigger('change');
    });
}

jQuery(document).ready(function () {
    'use strict';

 
    var theme_conrols = jQuery('#customize-theme-controls');

    /* Dropdown control */
    theme_conrols.on('click', '.bfastmag-customize-control-title', function () {
        jQuery(this).next().slideToggle('medium', function () {
            if (jQuery(this).is(':visible')) {
                jQuery(this).css('display', 'block');
            }
        });
    });

    jQuery('.bfastmag_general_control_new_field').on('click', function () {

        var th = jQuery(this).parent();
        var id = 'bfastmag_' + bfastmag_uniqid();
        if (typeof th !== 'undefined') {

            if(th.attr("id") == 'customize-control-bfastmag_shop_fw_slider'){
                jQuery('.bfastmag-pro-notif').fadeOut();
                jQuery('.bfastmag-pro-notif').slideDown();
                 return;

            }

            var field = th.find('.bfastmag_general_control_repeater_container:first').clone();
            if (typeof field !== 'undefined') {


                field.find('.bfastmag_general_control_remove_field').show();
                field.find('.bfastmag-box-content-hidden').show();


                field.find('.bfastmag-customize-control-title').text('');
                field.find('.bfastmag_box_id').val(id);
                field.find('.bfastmag_link_control').val('');
                field.find('.bfastmag_title_control').val('');
                field.find('.bfastmag_description_control').val('');
                field.find('.bfastmag_button_control').val('');


                field.find('.input-group-addon').find('.fa').attr('class', 'fa');

                /*Remove value from icon field*/
                field.find('.icp').val('');
                field.find('.custom-media-url').val('');

                th.find('.bfastmag_general_control_repeater_container:first').parent().append(field);
                bfastmag_refresh_general_control_values();
            }
        }
        return false;
    });

    theme_conrols.on('click', '.bfastmag_general_control_remove_field', function () {
        if (typeof jQuery(this).parent() !== 'undefined') {
            jQuery(this).parent().parent().remove();
            bfastmag_refresh_general_control_values();
        }
        return false;
    });

    theme_conrols.on('keyup', '.bfastmag_link_control,.bfastmag_title_control,.bfastmag_description_control,.bfastmag_button_control', function () {
        bfastmag_refresh_general_control_values();
    });

    media_upload('.customizer-repeater-custom-media-button');
    jQuery('body').on('change','.custom-media-url', function () {
        bfastmag_refresh_general_control_values();
        return false;
    });

    /*Drag and drop to change icons order*/
    jQuery('.bfastmag_general_control_droppable').sortable({
        update: function () {
            bfastmag_refresh_general_control_values();
        }
    });
});