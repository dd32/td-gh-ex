// Attaches the image uploader to the input field
jQuery(document).ready(function($){

	// Prepare the variable that holds our custom media manager.
	var featured_background_media_frame;

	// Runs when the image button is clicked.
	$('#featured-background-button').click(function(e){
		// Prevent the default action from occuring.
		e.preventDefault();

		// If the frame already exists, re-open it.
		if (featured_background_media_frame) {
			featured_background_media_frame.open();
			return; }

		featured_background_media_frame = wp.media.frames.featured_background_media_frame = wp.media({
			className: 'media-frame featured-background-media-frame',
			frame: 'select',
			multiple: false,
			title: js_array_featured_background.title,
			library: {type:'image'},
			button: {text:js_array_featured_background.button} });

		featured_background_media_frame.on('select', function(){
			// Grab our attachment selection and construct a JSON representation of the model.
			var media_attachment = featured_background_media_frame.state().get('selection').first().toJSON();

			// Send the attachment URL to our custom input field via jQuery.
			$('#featured-background').val(media_attachment.url); });

		// Now that everything has been set, let's open up the frame.
		featured_background_media_frame.open(); }); });