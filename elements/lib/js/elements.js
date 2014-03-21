/**
 * Title: Elements JS
 *
 * Description: Defines JS for elements.
 *
 * Please do not edit this file. This file is part of the Cyber Chimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category Cyber Chimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */

/*	Boxes element make all the same height */

jQuery(window).load(function ($) {

	if ($(window).width() > 767) {
		setTimeout(function () {
			$('#widget_boxes_container .box').css('height', $('#widget_boxes_container').height() - 20)
		}, 500);
	}

	$('.boxes .box').each(function () {
		var url = $(this).children('.box-link').attr('href');
		$(this).hover(function () {
				if (url && url != '')
					$(this).css('cursor', 'pointer');
			},
			function () {
				$(this).css('cursor', 'default');
			});
		$(this).click(function () {
			if (url && url != '')
				window.location = url;
		})
	});

	//starts carousel cycle
	$('.carousel').carousel('cycle');

});