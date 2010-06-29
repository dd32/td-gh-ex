// JavaScript Document

function getRadioValue(o) {
	if(!o) return "";
	var rl = o.length;
	if(rl == undefined)
		if(o.checked) return o.value;
		else return "";
	for(var i = 0; i < rl; i++) {
		if(o[i].checked) return o[i].value;
	}
	return "";
}

function headerMenu1_tD(o) {
		var v = getRadioValue(o);
		if(v=='pages') {
			document.getElementById('headerMenu1_sortBy_categories').style.display = 'none';
			document.getElementById('headerMenu1_sortBy_pages').style.display = 'block';
			document.getElementById('headerMenu1_include_categories').style.display = 'none';
			document.getElementById('headerMenu1_include_pages').style.display = '';
			//document.getElementById('headerMenu1_disableParentPageLink_pages').style.display = '';
		} else if(v=='categories') {
			document.getElementById('headerMenu1_sortBy_categories').style.display = 'block';
			document.getElementById('headerMenu1_sortBy_pages').style.display = 'none';
			document.getElementById('headerMenu1_include_categories').style.display = '';
			document.getElementById('headerMenu1_include_pages').style.display = 'none';
			//document.getElementById('headerMenu1_disableParentPageLink_pages').style.display = 'none';
		}
}
function headerMenu2_tD(o) {
		var v = getRadioValue(o);
		if(v=='pages') {
			document.getElementById('headerMenu2_sortBy_categories').style.display = 'none';
			document.getElementById('headerMenu2_sortBy_pages').style.display = 'block';
			document.getElementById('headerMenu2_include_categories').style.display = 'none';
			document.getElementById('headerMenu2_include_pages').style.display = '';
			//document.getElementById('headerMenu2_disableParentPageLink_pages').style.display = '';
		} else if(v=='categories') {
			document.getElementById('headerMenu2_sortBy_categories').style.display = 'block';
			document.getElementById('headerMenu2_sortBy_pages').style.display = 'none';
			document.getElementById('headerMenu2_include_categories').style.display = '';
			document.getElementById('headerMenu2_include_pages').style.display = 'none';
			//document.getElementById('headerMenu2_disableParentPageLink_pages').style.display = 'none';
		}
}

function customCSS_switch(o) {
	if (o.checked)
		document.getElementById('customCSS_input').style.display = 'block';
	else document.getElementById('customCSS_input').style.display = 'none';
}

function sidebar_twitterURL_switch(o) {
	if (o.checked)
		document.getElementById('sidebar_twitterURL').style.display = 'block';
	else document.getElementById('sidebar_twitterURL').style.display = 'none';
}

function sidebar_facebookURL_switch(o) {
	if (o.checked)
		document.getElementById('sidebar_facebookURL').style.display = 'block';
	else document.getElementById('sidebar_facebookURL').style.display = 'none';
}

function pagination_switch(o) {
		var v = getRadioValue(o);
		if(v=='1')
			document.getElementById('pagination_input').style.display = 'block';
		else if(v=='0')
			document.getElementById('pagination_input').style.display = 'none';
		
}

function enableIncludeMenuItems() {
	
	//First menu
	jQuery("#hm1ic_up").click(function() {
		jQuery("#hm1ec option:selected").each(function() {
			var tmp = '<option value="'+jQuery(this).attr('value')+'">'+jQuery(this).html()+'</option>';
			jQuery("#hm1ic").append(tmp);
			jQuery(this).remove();
		});
		return false;
	});
	jQuery("#hm1ic_down").click(function() {
		jQuery("#hm1ic option:selected").each(function() {
			var tmp = '<option value="'+jQuery(this).attr('value')+'">'+jQuery(this).html()+'</option>';
			jQuery("#hm1ec").append(tmp);
			jQuery(this).remove();
		});
		return false;
	});
	
	jQuery("#arjuna_update_theme").submit(function() {
		jQuery("#hm1ec option, #hm1ic option").attr('selected', 'selected');
	});

	jQuery("#hm1ip_up").click(function() {
		jQuery("#hm1ep option:selected").each(function() {
			var tmp = '<option value="'+jQuery(this).attr('value')+'">'+jQuery(this).html()+'</option>';
			jQuery("#hm1ip").append(tmp);
			jQuery(this).remove();
		});
		return false;
	});
	jQuery("#hm1ip_down").click(function() {
		jQuery("#hm1ip option:selected").each(function() {
			var tmp = '<option value="'+jQuery(this).attr('value')+'">'+jQuery(this).html()+'</option>';
			jQuery("#hm1ep").append(tmp);
			jQuery(this).remove();
		});
		return false;
	});
	
	jQuery("#arjuna_update_theme").submit(function() {
		jQuery("#hm1ep option, #hm1ip option").attr('selected', 'selected');
	});

	//Second menu
	jQuery("#hm2ic_up").click(function() {
		jQuery("#hm2ec option:selected").each(function() {
			var tmp = '<option value="'+jQuery(this).attr('value')+'">'+jQuery(this).html()+'</option>';
			jQuery("#hm2ic").append(tmp);
			jQuery(this).remove();
		});
		return false;
	});
	jQuery("#hm2ic_down").click(function() {
		jQuery("#hm2ic option:selected").each(function() {
			var tmp = '<option value="'+jQuery(this).attr('value')+'">'+jQuery(this).html()+'</option>';
			jQuery("#hm2ec").append(tmp);
			jQuery(this).remove();
		});
		return false;
	});
	
	jQuery("#arjuna_update_theme").submit(function() {
		jQuery("#hm2ec option, #hm2ic option").attr('selected', 'selected');
	});

	jQuery("#hm2ip_up").click(function() {
		jQuery("#hm2ep option:selected").each(function() {
			var tmp = '<option value="'+jQuery(this).attr('value')+'">'+jQuery(this).html()+'</option>';
			jQuery("#hm2ip").append(tmp);
			jQuery(this).remove();
		});
		return false;
	});
	jQuery("#hm2ip_down").click(function() {
		jQuery("#hm2ip option:selected").each(function() {
			var tmp = '<option value="'+jQuery(this).attr('value')+'">'+jQuery(this).html()+'</option>';
			jQuery("#hm2ep").append(tmp);
			jQuery(this).remove();
		});
		return false;
	});
	
	jQuery("#arjuna_update_theme").submit(function() {
		jQuery("#hm2ep option, #hm2ip option").attr('selected', 'selected');
	});
}

function ajax_savePanel(ID, set) {
	jQuery.ajax({
		type: "GET",
		url: jQuery('#arjuna_themeURL').val() + '/admin/ajax/savePanel.php',
		data: {
			ID: ID,
			set: set
		},
		dataType: 'json',
		success: function(response){
		}
	});
}

tmp_farbtastic = null;

jQuery(function() {
	jQuery('.srsContainer h4.title')
	.click(function() {
		if(jQuery(this).parent().hasClass('srsContainerClosed')) {
			jQuery(this).parent().removeClass('srsContainerClosed');
			ajax_savePanel(jQuery(this).parent().attr('self:ID'), 1);
		} else {
			jQuery(this).parent().addClass('srsContainerClosed');
			ajax_savePanel(jQuery(this).parent().attr('self:ID'), 0);
		}
	})
	.mouseover(function() { jQuery(this).addClass('over'); })
	.mouseout(function() { jQuery(this).removeClass('over'); });
	
	enableIncludeMenuItems();
	
	if(jQuery('#backgroundColor_picker').length > 0) {
		tmp_farbtastic = jQuery.farbtastic('#backgroundColor_picker div.inner', function(color) {
			jQuery('#backgroundColor').val(color);
			jQuery('#backgroundColor_picker').css('background-color', color);
		}).setColor(jQuery('#backgroundColor').val());
		
		jQuery('#backgroundColor_picker')
		.click(function(e) {
			jQuery('div.inner', this).fadeIn(500);
			jQuery('#backgroundStyle_solid').attr('checked', 'checked');
			e.stopPropagation();
		});
		
		jQuery(document.body).click(function() {
			jQuery('#backgroundColor_picker div.inner').fadeOut(500);
		});
	}
	
	jQuery('#icon-lightBlue').click(function() {
		jQuery('#headerImage_lightBlue').attr('checked', 'checked').change();
	});
	jQuery('#headerImage_lightBlue').change(function() {
		jQuery('#icon-footerStyle2').removeClass('darkBlue khaki seaGreen lightRed').addClass('lightBlue');
	});
	jQuery('#icon-darkBlue').click(function() {
		jQuery('#headerImage_darkBlue').attr('checked', 'checked').change();
	});
	jQuery('#headerImage_darkBlue').change(function() {
		jQuery('#icon-footerStyle2').removeClass('lightBlue khaki seaGreen lightRed').addClass('darkBlue');
	});
	jQuery('#icon-khaki').click(function() {
		jQuery('#headerImage_khaki').attr('checked', 'checked').change();
	});
	jQuery('#headerImage_khaki').change(function() {
		jQuery('#icon-footerStyle2').removeClass('darkBlue lightBlue seaGreen lightRed').addClass('khaki');
	});
	jQuery('#icon-seaGreen').click(function() {
		jQuery('#headerImage_seaGreen').attr('checked', 'checked').change();
	});
	jQuery('#headerImage_seaGreen').change(function() {
		jQuery('#icon-footerStyle2').removeClass('darkBlue khaki lightBlue lightRed').addClass('seaGreen');
	});
	jQuery('#icon-lightRed').click(function() {
		jQuery('#headerImage_lightRed').attr('checked', 'checked').change();
	});
	jQuery('#headerImage_lightRed').change(function() {
		jQuery('#icon-footerStyle2').removeClass('darkBlue khaki lightBlue seaGreen').addClass('lightRed');
	});
	
	jQuery('#icon-footerStyle1').click(function() {
		jQuery('#footerStyle_style1').attr('checked', 'checked').change();
	});
	jQuery('#icon-footerStyle2').click(function() {
		jQuery('#footerStyle_style2').attr('checked', 'checked').change();
	});
});
