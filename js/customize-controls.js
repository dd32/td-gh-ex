/*
================================================================================================
Barista - customize-controls.js
================================================================================================
This is the most generic template file in a WordPress theme and is one of required files to hide
and show the primary navigation for the Primary Navigation in different resolution and other
features.

@package        Barista WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
jQuery(document).ready(function(){
    wp.customize.controlConstructor['radio-image'] = wp.customize.Control.extend({
        ready: function() {
            var control = this;
            var value = (undefined !== control.setting._value) ? control.setting._value : '';

            this.container.on( 'change', 'input:radio', function() {
                value = jQuery( this ).val();
                control.setting.set( value );
            });
        }
    });
});