var agency_ecommerce_file_frame;

jQuery(function($){
  ////////////////////////////////

      // Uploads

      jQuery(document).on('click', 'input.select-img', function( event ){

        var $this = $(this);

        event.preventDefault();

        var agencyEcommerceImage = wp.media.controller.Library.extend({
            defaults :  _.defaults({
                    id:        'rtam-insert-image',
                    title:      $this.data( 'uploader_title' ),
                    allowLocalEdits: false,
                    displaySettings: true,
                    displayUserSettings: false,
                    multiple : false,
                    library: wp.media.query( { type: 'image' } )
              }, wp.media.controller.Library.prototype.defaults )
        });

        // Create the media frame.
        agency_ecommerce_file_frame = wp.media.frames.agency_ecommerce_file_frame = wp.media({
          button: {
            text: jQuery( this ).data( 'uploader_button_text' )
          },
          state : 'rtam-insert-image',
              states : [
                  new agencyEcommerceImage()
              ],
          multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        agency_ecommerce_file_frame.on( 'select', function() {

          var state = agency_ecommerce_file_frame.state('rtam-insert-image');
          var selection = state.get('selection');
          var display = state.display( selection.first() ).toJSON();
          var obj_attachment = selection.first().toJSON();
          display = wp.media.string.props( display, obj_attachment );

          var image_field = $this.siblings('.img');
          var imgurl = display.src;

          // Copy image URL
          image_field.val(imgurl);
          image_field.trigger('change');
          // Show in preview.
          var image_preview_wrap = $this.siblings('.rtam-preview-wrap');
          var image_html = '<img src="' + imgurl+ '" alt="" style="max-width:100%;max-height:150px;" />';
          image_preview_wrap.html( image_html );
          // Show Remove button.
          var image_remove_button = $this.siblings('.btn-image-remove');
          image_remove_button.css('display','inline-block');

        });

        // Finally, open the modal
        agency_ecommerce_file_frame.open();
      });

      // Remove image.
      jQuery(document).on('click', 'input.btn-image-remove', function( e ) {

        e.preventDefault();
        var $this = $(this);
        var image_field = $this.siblings('.img');
        image_field.val('');
        var image_preview_wrap = $this.siblings('.rtam-preview-wrap');
        image_preview_wrap.html('');
        $this.css('display','none');
        image_field.trigger('change');

      });

      // Color Picker

    function initColorPicker(widget) {
        widget.find('.color-picker').wpColorPicker({
            change: _.throttle(function () { // For Customizer
                $(this).trigger('change');
            }, 3000)
        });
    }

    function onFormUpdate(event, widget) {
        initColorPicker(widget);
    }

    $(document).on('widget-added widget-updated', onFormUpdate);

    $(document).ready(function () {
        $('#widgets-right .widget:has(.color-picker)').each(function () {
            initColorPicker($(this));
        });
    });

  ////////////////////////////////
});