jQuery(document).ready(function ($) {

	/* Confirm click */
	$(document).on( 'click', '.confirm-click', function(e){
		e.preventDefault();
		var msg = $(this).data('message');
		
		if ( confirm(msg) == true ){

			if ($(this).hasClass('graphene-reset-settings')){
				button = $(this);
				button.siblings('.status-icon').removeClass('hide');

				var data = {
					action		: 'graphene-reset-settings',
					nonce		: $(this).data('nonce'),
				};
				$.post(grapheneCustomizer.ajaxurl, data, function(response) {
					if (response == '0') {
						button.siblings('.status-icon').removeClass( 'fa-refresh fa-spin');
						button.siblings('.status-icon').addClass( 'fa-check');
						
						setTimeout(function(){location.reload();}, 500);
					} else {
						$('.graphene-status-message', button.parents('.customize-control')).append('<li>' + response + '</li>');
						button.siblings('.status-icon').addClass('hide');
					}
				});
			}
		}

		return false;
	});
	  
	/* Improve <select> elements */
	$('.chzn-select').each(function () {
		var chosenOptions = new Object();
		chosenOptions.disable_search_threshold = 10;
		chosenOptions.allow_single_deselect = true;
		chosenOptions.no_results_text = grapheneCustomizer.chosen_no_search_result;
		if ($(this).attr('multiple')) chosenOptions.width = '100%';
		else chosenOptions.width = '250px';

		$(this).chosen(chosenOptions);
	});
	
	$('.chzn-select').on('change', function(e,params){
		settingID = $(this).data('customize-setting-link');
		if ( $(':selected', $(this)).length == 0 ) {
			wp.customize( settingID, function ( obj ) {
				obj.set( '' );
			} );
		}
	});

	/* Show the panel description by default */
	$('#sub-accordion-panel-graphene-colours .customize-panel-description').show();


	/**
	 * jQuery UI Sliders for columns width
	 */
	var gutter = graphene_settings.gutter_width;
	var grid_width = parseFloat(graphene_settings.grid_width);
	var container_width = parseFloat(graphene_settings.container_width);
	var container = container_width - gutter * 2;
	var content_2col = parseFloat(graphene_settings.column_width.two_col.content);
	var sidebar_left_3col = parseFloat(graphene_settings.column_width.three_col.sidebar_left);
	var sidebar_right_3col = parseFloat(graphene_settings.column_width.three_col.sidebar_right);

	/* Container */
	$('#container_width-slider').slider({
		min: 800,
		max: 1400,
		step: 10,
		value: container_width,
		slide: function (event, ui) {
			$('#container_width').val(ui.value).trigger('change');
		}
	});

	/* Two-column mode */
	$('#column_width_2col-slider').slider({
		min: 0,
		max: 12,
		value: content_2col,
		step: 1,
		slide: function (event, ui) {
			sidebar_2col = 12 - ui.value;
			content_2col = ui.value;

			$("#column_width_2col_sidebar").val(sidebar_2col).trigger('change');
			$("#column_width_2col_content").val(content_2col).trigger('change');
		}
	});

	/* Three-column mode */
	$('#column_width-slider').slider({
		range: true,
		min: 0,
		max: 12,
		values: [sidebar_left_3col, 12 - sidebar_right_3col],
		step: 1,
		slide: function (event, ui) {
			sidebar_left = ui.values[0];
			sidebar_right = 12 - ui.values[1];
			content = 12 - sidebar_left - sidebar_right;

			$("#column_width_sidebar_left").val(sidebar_left).trigger('change');
			$("#column_width_sidebar_right").val(sidebar_right).trigger('change');
			$("#column_width_content").val(content).trigger('change');
		}
	});

	/* Trigger change when columns width are modified */
	$('#customize-control-graphene_settings-column_width input[type="text"]').change(function(){
		colWidths = {
			three_col: {
				sidebar_left 	: $("#column_width_sidebar_left").val(),
				content 		: $("#column_width_content").val(),
				sidebar_right 	: $("#column_width_sidebar_right").val(),
			},
			two_col: {
				content 		: $("#column_width_2col_content").val(),
				sidebar  		: $("#column_width_2col_sidebar").val(),
			}
		};
		$(this).parents('.customize-control').find('input[type="hidden"]').val(JSON.stringify(colWidths)).trigger('change');
	});



	/**
	 * Hide the widget hooks until the file name is clicked
	 */
	$('a.toggle-widget-hooks').click(function () {
		$(this).closest('li').find('li.widget-hooks').fadeToggle(0);
		return false;
	});

	/**
	 * Trigger change event when widget hooks is (de)selected
	 */
	$('.hooks-list input[type="checkbox"]').change(function(){
		checkboxValues = $(this).parents('.customize-control').find('input[type="checkbox"]:checked').map(function(){
                return this.value;
            }).get().join(',');
        $(this).parents('.customize-control').find('input[type="hidden"]').val(checkboxValues).trigger('change');
	});


	/**
	 * Social profiles
	 */
	$('.socialprofile-del').on('click', function(){
		socialProfile = $(this).parents('.graphene-social-profile');
		socialProfile.slideUp(200);
		setTimeout(function(){socialProfile.remove(); $('.graphene-social-profiles').trigger('change');}, 200);
	});

	/* Make the profiles sortable */
	$('.graphene-social-profiles').sortable({
		items: '.graphene-social-profile',
		// placeholder: 'socialprofile-dragging',
		stop: function( event, ui ){
			$('.graphene-social-profiles').trigger('change');
		},
		opacity: .8
	});

	/* Add new social profile */
	$('.add-social-profile .button').click(function(e){
		e.preventDefault();

		profileType = $('#new-socialprofile-type').val();
		profileDesc = $('#new-socialprofile-title').val();
		profileUrl = $('#new-socialprofile-url').val();
		profileIconUrl = $('#new-socialprofile-icon-url').val();

		html = '<li class="graphene-social-profile ui-sortable-handle">\
                    <span class="customize-control-title">\<i class="fa fa-' + profileType + '"></i>' + profileType + '</span>\
                	<input type="hidden" name="social-profile-data" data-type="' + profileType + '" data-name="' + profileType + '" data-title="' + profileType + '" data-url="' + profileUrl + '" data-icon-url="' + profileIconUrl + '">\
                    <div class="inline-field">\
                    	<label>Description</label>\
                    	<input type="text" data-key="title" value="' + profileDesc + '">\
                    </div>\
                    <div class="inline-field">\
                    	<label>URL</label>\
                    	<input type="text" data-key="url" value="' + profileUrl + '">\
                    </div>\
                    <span class="delete"><a href="#" class="socialprofile-del"><i class="fa fa-times" title="Delete"></i></a></span>\
                    <span class="move"><i class="fa fa-arrows" title="Drag and drop to reorder"></i></span>\
                </li>';
        $('.graphene-social-profiles').append(html);

        $('#new-socialprofile-type').val('');
		$('#new-socialprofile-title').val('');
		$('#new-socialprofile-url').val('');
		$('#new-socialprofile-icon-url').val('');

		$('.graphene-social-profiles').trigger('change');
	});

	/* Update the social profile values and trigger change */
	$('.graphene-social-profile input').keyup(function(){
		key = $(this).data('key');
		$('input[name="social-profile-data"]', $(this).parents('.graphene-social-profile')).data(key, $(this).val());

		$('.graphene-social-profiles').trigger('change');
	});

	/* Update the values when change is triggered */
	$('.graphene-social-profiles').change(function(){
		profiles = [];
		$('input[name="social-profile-data"]').each(function(){
			profileType = $(this).data('type');
			profileName = $(this).data('name');
			profileDesc = $(this).data('title');
			profileUrl = $(this).data('url');
			profileIconUrl = $(this).data('icon-url');

			socialProfile = {
				type 	: profileType,
				name 	: profileName,
				title 	: profileDesc,
				url 	: profileUrl,
				icon_url: profileIconUrl
			};
			profiles.push(socialProfile);
		});

		$(this).parents('.customize-control').find('#graphene_settings_social_profiles').val(JSON.stringify(profiles)).trigger('change');
	});


	/**
	 * Import theme files
	 */

});