jQuery(function($){
	// Resizing the iframe to fill available space
    var barHeight = 42;
    
	var resizeIframe = function(){
		$('#preview-iframe')
			.width( $('body').width() - $('.od-side').width() - 1 );
        $('.od-side').height($(document).height() - barHeight);
        
        $('#iscroll-block').height($(document).height() - barHeight);
	}
    
	$(window).resize(function(){
        resizeIframe();
    });
	
	$('.od-side ul.settings > li > h2').click(function(){
		var $$ = $(this);
		if($$.closest('li').is('.active')) {
            var li = $$.closest('li'); 
			li
                .removeClass('active').find('ul').slideUp(350)
                .end().find('li.setting').removeClass('highlight');
		}
		else {
			$$.closest('li').addClass('active').find('ul').slideDown(350);
		}
		
		return false;
	})
    
    
	$('#preview-iframe').load(function(){
        // Remove the admin bar and its CSS
        $(this).contents().find('#wpadminbar').remove();
        $(this).contents().find('style[media=screen]').each(function(){
            var $$ = $(this);
            if($$.html().indexOf('html { margin-top: 28px !important; }') != -1){
                $$.remove();
            }
        })
        
        // Make the text non-selectable
        $(this).contents().find('body').css({
            '-moz-user-select':'none',
            '-webkit-user-select':'none',
            'user-select':'none',
            '-ms-user-select':'none'
        });
        
        $('#od-overlay').fadeOut();
        $(window).resize();
	});


    $('#preview-iframe').load(function(){
        $('.od-side ul.settings > li > ul > li').each(function(){
            var $$ = $(this);
            var field = $$.find('.preview-field');

            // Set up the influenced elements
            $('#preview-iframe').contents().find($$.attr('data-influences')).each(function(){
                var $el = $(this);
                $el.addClass('origin-influenced-el');
                var fields = $el.data('origin-fields');
                if(fields == undefined) fields = field;
                else{
                    fields = fields.add(field);
                }
                
                $el.data('origin-fields', fields);
            });
        });
        
        // Set up the highlighting
        $('#preview-iframe').contents().find('.origin-influenced-el')
            .mouseover(function(e){
                var $$ = $(this);
                
                // Unhighlight everything
                $$.closest('body').find('.origin-influenced-el').originUnhighlight();
                
                // Now highlight this element
                $$.originHighlight();
                e.stopPropagation();
                return false;
            })
            .mouseout(function(){
                var $$ = $(this);
                $$.originUnhighlight();
            })
            .bind('contextmenu', function(e){
                // Show the options that influence the clicked element
                var $$ = $(this);
                var fields = $$.data('origin-fields');
                
                // Close all sections and unhighlight fields
                $('.od-side li.settings-section').removeClass('active').find('ul.general-settings').hide();
                $('.od-side li.setting').removeClass('highlight');
                
                fields.each(function(){
                    var $f = $(this);
                    $f.closest('li').addClass('highlight');
                    
                    var container = $f.closest('li.settings-section');
                    if(container.not('.active')){
                        container.addClass('active').find('ul.general-settings').show();
                    }
                });

                // Scroll to the first element
                $('#iscroll-block').slimScroll({scroll: fields.eq(0).closest('li').position().top - 40});
                
                e.stopPropagation();
                return false;
            });
        
    });
    
    // When a user hovers over a title, this will highlight the 
	$('.od-side ul.settings > li > ul > li .section-title')
		.mouseenter(function(e){
            $('#preview-iframe').contents().find($(this).closest('li').attr('data-influences')).originHighlight();
		})
		.mouseleave(function(){
            $('#preview-iframe').contents().find('.origin-highlight').remove();
		})
		.click(function(){
			var $$ = $(this).closest('li');
			var f = $('#preview-iframe');
			var top = f.contents().find($$.attr('data-influences')).eq(0).offset().top;
			
			f.contents().find('html,body').scrollable().clearQueue().animate({
				'scrollTop' : Math.max(top - 36, 0)
			}, 900);
		});
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Button Handlers
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    // The share button is handled in its own file
    
    // Download the child theme
    $('#child-download-form .od-bar-button')
        .click(function(){
            $(window).unbind('beforeunload');
            $('#child-download-form input[name="settings"]').val($('#settings-form').serialize());
            $('#child-download-form').submit();
        });
    
	// The load button
	var uploader = new plupload.Uploader({
		runtimes : 'gears,html5,flash,silverlight,browserplus',
		browse_button : 'origin-style-load',
		unique_names : true,
		url: pluploadSettings.style_url,
		flash_swf_url: pluploadSettings.flash_swf_url,
		silverlight_xap_url : pluploadSettings.silverlight_xap_url,
	});
	uploader.bind('FilesAdded', function(up, files) {
		$('#origin-style-load').addClass('loading');
		setTimeout(function(){
			uploader.start();
		}, 500);
	});
	uploader.bind('Init', function(up, params) {
        // TODO possibly hide and unhide the upload button
    });
	uploader.bind('Error', function(up, params) {
		// TODO handle errors
    });
	uploader.bind('FileUploaded', function(up, file) {
		// Fetch a JSON version of the file we just uploaded
		$.getJSON(
			originSettings.siteUrl,{
				'om' : 'style_upload_fetch',
				'name' : file.target_name
			},
			function(data){
                // Setup the style
				$('#origin-style-load').removeClass('loading');
                if(data.style != undefined){
                    simpleHistory.add(data.style.settings);
                    simpleHistory.setItem(data.style.settings);
                    setPreviewInput(data.style.settings, true);
                }
                
                $.gritter.add({
                    title: data.message.title,
                    text : data.message.text,
                    time: 2500,
                    sticky : !data.success
                });
			}
		)
    });
	uploader.init();
	
	// Preload the loading images
	$('<img />').attr('src', originSettings.originUrl+'/img/dark-loader.gif');
	$('<img />').attr('src', originSettings.originUrl+'/img/light-loader.gif');

    // Setup slimScroll
    $('#iscroll-block').slimScroll({
        height : '100%',
        wheelStep : 10
    });
    
    simpleHistory.setUndoButton($('.od-bar-button.undo'));
    simpleHistory.setRedoButton($('.od-bar-button.redo'));
    simpleHistory.add(getOriginValues());
});