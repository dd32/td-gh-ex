<?php
/*
============================================================================================================================
Silver Quantum - framework/template/general.php
============================================================================================================================
This framework.php template file allows you to add features and functionality has been preset to be used in this WordPress 
theme which is store in the theme's framework directory.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/ 

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Display (Sidebars)
============================================================================================================================
*/ 

/*
============================================================================================================================
 1.0 - Display (Sidebars)
============================================================================================================================
*/
function silver_quantum_display_sidebars() {
    do_action('silver_quantum_display_sidebars');
}

function silver_quantum_output_sidebars() {
    if (is_singular('post')) {
        get_sidebar();
    } else {
        get_sidebar('custom');
    }
}
add_action('silver_quantum_display_sidebars', 'silver_quantum_output_sidebars');