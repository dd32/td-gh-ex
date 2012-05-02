jQuery(function($){
	var buttonid = 0;
	$('fieldset.type-file').each(function(){
		var $$ = $(this);
		var button = $$.find('.upload');
        var input = $$.find('input.target-name');
        
		if(button.attr('id') == undefined){
			button.attr('id', 'file_upload_button_'+buttonid);
			buttonid++;
		}
		
		// Create the uploader
		var uploader = new plupload.Uploader({
			runtimes : 'gears,html5,flash,silverlight,browserplus',
			browse_button : button.attr('id'),
			unique_names : true,
			url: pluploadSettings.file_url,
			flash_swf_url: pluploadSettings.flash_swf_url,
			silverlight_xap_url : pluploadSettings.silverlight_xap_url,
		});

        uploader.bind('FilesAdded', function(up, files) {
            button.addClass('loading');
            setTimeout(function(){
                uploader.start();
            }, 500);
        });

        uploader.bind('UploadProgress', function(up, file) {
            // Update a progress indicator
        });

        uploader.bind('FileUploaded', function(up, file) {
            button.removeClass('loading');
            // Handle injecting the new image
            input.val(file.target_name);
            $$.find('input.filename').val(file.name);

            $.gritter.add({
                title: 'File Uploaded',
                text : file.name + ' was successfully uploaded.',
                time: 2000
            });
            
            if(input.attr('data-image-id') != undefined){
                var img = $('#preview-iframe').contents().find('#' + input.attr('data-image-id'));
                img.attr('src', originSettings.uploadUrl + '/' + file.target_name);
            }
        });
        uploader.init();
	});
});