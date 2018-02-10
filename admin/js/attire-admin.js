jQuery(function () {

    jQuery(document).ajaxStop(jQuery.unblockUI);


    // Uploading files
    var file_frame, dfield;

    jQuery('body').on('click', '.attire-media-upload', function (event) {
        event.preventDefault();
        dfield = jQuery(jQuery(this).attr('rel'));

        // If the media frame already exists, reopen it.
        if (file_frame) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery(this).data('uploader_title'),
            button: {
                text: jQuery(this).data('uploader_button_text')
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            // We set multiple to false so only get one image from the uploader
            attachment = file_frame.state().get('selection').first().toJSON();
            dfield.val(attachment.url);
            dfield.change();
        });

        // Finally, open the modal
        file_frame.open();
    });

    // jQuery('.attire select').chosen();


    jQuery('body').on('click', '.prebg', function () {
        jQuery('#cpb_image').val(jQuery(this).attr('data-url'));
        preview_cbg(jQuery(this).attr('data-rel'));
    });

    jQuery('.colorpicker').wpColorPicker({
        change: function (event, ui) {
            jQuery('#hfp').css('background-color', ui.color.toString());
        }
    });

    jQuery('#cph_bg_color').wpColorPicker({
            change: function (event, ui) {
                jQuery('.preview-cph').css('background-color', ui.color.toString());
            }
        }
    );
    jQuery('#cph_text_color').wpColorPicker({
            change: function (event, ui) {
                jQuery('.preview-cph *').css('color', ui.color.toString());
            }
        }
    );

    jQuery('#clear_cph').on('click', function (e) {
        e.preventDefault();
        jQuery('.preview-cph').css('background-image', '');
        jQuery('#preview_cph_description').text('');

        jQuery('#cph_bg_color').val('');
        jQuery('#cph_description').val('');
        jQuery('#cph_image').val('');
        jQuery('#cph_text_color').val('');

    });

    jQuery('#clear_cpb').on('click', function (e) {
        e.preventDefault();
        jQuery('#hfp').css('background-image', "")
            .css('background-position', "")
            .css('background-repeat', "")
            .css('background-attachment', "")
            .css('background-color', "");

        jQuery('input.cpb').val('');

    });

    preview_cph();
});


function mediaupload(id) {
    var id = '#' + id;
    tb_show('Upload Image', 'media-upload.php?TB_iframe=1&width=640&height=624');
    window.send_to_editor = function (html) {
        var imgurl = jQuery('img', "<p>" + html + "</p>").attr('src');
        jQuery(id).val(imgurl);
        tb_remove();
    }
}

function preview_cbg(id) {
    jQuery('#hfp').css('background-image', "url('" + jQuery('#' + id + '_image').val() + "')")
        .css('background-position', jQuery('#' + id + '_position_h').val() + " " + jQuery('#' + id + '_position_v').val())
        .css('background-repeat', jQuery('#' + id + '_repeat').val())
        .css('background-attachment', jQuery('#' + id + '_attachment').val())
        .css('background-color', jQuery('#' + id + '_color').val());
}


function preview_cph() {
    jQuery('.preview-cph').css('background-image', "url('" + jQuery('#cph_image').val() + "')");
    jQuery('.preview-cph').css('background-position', 'center');
    jQuery('.preview-cph').css('background-attachment', 'fixed');
    jQuery('.preview-cph').css('background-repeat', 'no-repeat');
    jQuery('.preview-cph *').css('color', $('#cph_text_color').val());
    jQuery('#preview_cph_title').text(jQuery('#title').val());
    jQuery('#preview_cph_description').text(jQuery('#cph_description').val());
}

function convertHex(hex, opacity) {
    var hex1 = hex.replace('#', '');
    r = parseInt(hex1.substring(0, 2), 16);
    g = parseInt(hex1.substring(2, 4), 16);
    b = parseInt(hex1.substring(4, 6), 16);

    result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
    return result;
}
