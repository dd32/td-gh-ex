/*
============================================================================================================================
Camaraderie - control-radio-image.js
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of required files to able
to navigation left, right or no sidebar by using radio-images.
@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com/)
============================================================================================================================
*/

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Control Radio Image (JS)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Control Radio Image (JS)
============================================================================================================================
*/
wp.customize.controlConstructor['radio-image'] = wp.customize.Control.extend( {
    ready: function() {

        let control = this;
        let inputs  = document.querySelectorAll(
            control.selector + ' input[type="radio"]'
        );

        for ( var i = 0; i < inputs.length; i++ ) {

            inputs[ i ].onchange = function() {

                control.setting.set( this.value );
            }
        }
    }
} );