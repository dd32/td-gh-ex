/* global akhada_fitness_gymScreenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

jQuery(function($){
 "use strict";
   jQuery('.main-menu-navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });

});

function akhada_fitness_gym_open() {
	document.getElementById("sidelong-menu").style.width = "250px";
}
function akhada_fitness_gym_close() {
	document.getElementById("sidelong-menu").style.width = "0";
}
