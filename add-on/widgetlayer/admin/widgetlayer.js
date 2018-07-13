/*global aamlaImageUploadText */
( function( $ ){
	var file_frame,
		$document = $( document );

	$document.on( 'click', '.aamla-widget-img-uploader', function( event ){
		var _this = $(this);
		event.preventDefault();

		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: aamlaImageUploadText.uploader_title,
			button: {
				text: aamlaImageUploadText.uploader_button_text,
			},
			multiple: false  // Set to true to allow multiple files to be selected
		});

		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {
			// We set multiple to false so only get one image from the uploader
			var attachment  = file_frame.state().get('selection').first().toJSON(),
				imgUrl      = attachment.url,
				imgId       = attachment.id,
				featuredImg = document.createElement("img");
			
			featuredImg.src       = imgUrl;
			featuredImg.className = 'text-widget-thumbnail';
			_this.html( featuredImg );
			_this.addClass( 'has-image' );
			_this.nextAll( '.aamla-widget-img-id' ).val( imgId ).trigger('change');
			_this.nextAll( '.aamla-widget-img-instruct, .aamla-widget-img-remover' ).removeClass( 'aamla-hidden' );
		});

		// Finally, open the modal
		file_frame.open();
	});

	$document.on( 'click', '.aamla-widget-img-remover', function( event ){
		console.log('hello');
		event.preventDefault();
		$( this ).prevAll('.aamla-widget-img-uploader').html(aamlaImageUploadText.set_featured_img).removeClass( 'has-image' );
		$( this ).prev( '.aamla-widget-img-instruct' ).addClass( 'aamla-hidden' );
		$( this ).next( '.aamla-widget-img-id' ).val( '' ).trigger('change');
		$( this ).addClass( 'aamla-hidden' );
	});
} ) ( jQuery );
