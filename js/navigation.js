/*
================================================================================================
Tifology - navigation.js
================================================================================================
This is the most generic template file in a WordPress theme and is one of required files to hide
and show the primary navigation for the navigation menu.

@package        Tifology WordPress Theme
@copyright      Copyright (C) 2015. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/contact/
@since          0.0.1
================================================================================================
*/
jQuery(document).ready(function($){
    $(".menu-toggle").click(function(){
        $(".primary-navigation").slideToggle('slow', function(){
            $(this).toggleClass('primary-expanded').css('display', '');
        });
    });
});
