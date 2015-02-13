// All custom JS not relating to theme options goes here

jQuery(document).ready(function($) {
    
/*----------------------------------------------------------------------------------*/
/*	Display post format meta boxes as needed
/*----------------------------------------------------------------------------------*/

	// Set up our array of post format objects and group trigger
	var postFormats = [
		{
			'id' : 'video',
			'option' : $('#atout-metabox-post-video'),
			'trigger' : $('#post-format-video'),
			'editor' : 'yes',
			'editorid' : $('#postdivrich')
		},
		{
			'id' : 'gallery',
			'option' : $('#atout-metabox-post-gallery'),
			'trigger' : $('#post-format-gallery'),
			'editor' : 'yes',
			'editorid' : $('#postdivrich')
		},
		{
			'id' : 'link',
			'option' : $('#atout-metabox-post-link'),
			'trigger' : $('#post-format-link'),
			'editor' : 'yes',
			'editorid' : $('#postdivrich')
		},
		{
			'id' : 'quote',
			'option' : $('#atout-metabox-post-quote'),
			'trigger' : $('#post-format-quote'),
			'editor' : 'no',
			'editorid' : $('#postdivrich')
		},
		{
			'id' : 'audio',
			'option' : $('#atout-metabox-post-audio'),
			'trigger' : $('#post-format-audio'),
			'editor' : 'yes',
			'editorid' : $('#postdivrich')
		}
		],
		group = $('#post-formats-select input');

	// If format is check, show metabox
	for( var format in postFormats ) {
		if( postFormats[format]['trigger'].is(':checked') ) {
			postFormats[format]['option'].css('display', 'block');
		} else {
			postFormats[format]['option'].css('display', 'none');
		}
	}

	// New format selected, hide and show metaboxes
	group.change( function() {
		$that = $(this);

		for( var format in postFormats ) {
		if( $that.val() === postFormats[format]['id']) {
			postFormats[format]['option'].css('display', 'block');
		} else {
			postFormats[format]['option'].css('display', 'none');
		}
		}
	});

	$('#post-format-quote').change(function () {
        if (!this.checked)
           $('#postdivrich').show();
        else
            $('#postdivrich').hide();
    });

    $('#post-format-0').change(function () {
        if (!this.checked)
           $('#postdivrich').hide();
        else
            $('#postdivrich').show();
    });

    $('#post-format-aside').change(function () {
        if (!this.checked)
           $('#postdivrich').hide();
        else
            $('#postdivrich').show();
    });

    $('#post-format-video').change(function () {
        if (!this.checked)
           $('#postdivrich').show();
        else
            $('#postdivrich').hide();
    });

    $('#post-format-link').change(function () {
        if (!this.checked)
           $('#postdivrich').show();
        else
            $('#postdivrich').hide();
    });

    $('#post-format-audio').change(function () {
        if (!this.checked)
           $('#postdivrich').hide();
        else
            $('#postdivrich').show();
    });

    $('#post-format-gallery').change(function () {
        if (!this.checked)
           $('#postdivrich').hide();
        else
            $('#postdivrich').show();
    });

    $('#post-format-image').change(function () {
        if (!this.checked)
           $('#postdivrich').hide();
        else
            $('#postdivrich').show();
    });
    
});