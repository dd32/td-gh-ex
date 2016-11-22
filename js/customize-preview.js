/*
================================================================================================
Barista - customize-preview.js
================================================================================================
This custom-preview.js allows you to experience the changes live in the customizer.

@package        Barista WordPress Theme
@copyright      Copyright (C) 2014. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/

(function($) {    
    // This will update the Blog Name in Real Time in Customizer.
	wp.customize('blogname', function(value) {
		value.bind(function(newVal) {
			$('.site-title a').html(newVal);
		});
	});
    
    // This will update the Blog Name in Real Time in Customizer.
	wp.customize('blogdescription', function(value) {
		value.bind(function(newVal) {
			$('.site-description').html(newVal);
		});
	});
    
    // This will update the Site Title and Site Description in Real Time in Customizer.
    wp.customize('header_textcolor', function(value) {
        value.bind(function(newVal) {
            if ('blank' == newVal) {
                $('.site-title a, .site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.site-title a, .site-description').css({
                    'clip': 'auto',
                    'position': 'relative'
                });
                
                $('.site-title a, .site-description').css({
                    'color': newVal
                });
            }
        });
    });
    
    // This will update the Background Color in Real Time in Customizer.
    wp.customize('background_color', function(value) {
        value.bind(function(newVal) {
            $('body').css({
                'color': newVal
            });
        });
    });
    
    // This will update the Body Text Color in Real Time in Customizer.
    wp.customize('body_text_color', function(value) {
        value.bind(function(newVal) {
            $('.site-content').css({
                'color': newVal
            });
        });
    });
    
    // This will update the Body Text Color in Real Time in Customizer.
    wp.customize('body_link_color', function(value) {
        value.bind(function(newVal) {
            $('a').css({
                'color': newVal
            });
        });
    });
    
    // This will update the Body Text Color Hover in Real Time in Customizer.
    wp.customize('body_link_color_hover', function(value) {
        value.bind(function(newVal) {
            $('a:hover').css({
                'color': newVal
            });
        });
    });
})(jQuery);