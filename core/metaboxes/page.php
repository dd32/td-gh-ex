<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$novalite_new_metaboxes = new novalite_metaboxes ('page', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => esc_html__( "Setting","novalite") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => esc_html__( "Setting","novalite"),
			   "type" => "title",
		),

		array( "name" => esc_html__( "Slogan","novalite"),
			   "desc" => esc_html__( "Insert the slogan of page","novalite"),
			   "id" => "novalite_slogan",
			   "type" => "text",
		),

		array( "name" => esc_html__( "Template","novalite"),
			   "desc" => esc_html__( "Select a template for this page","novalite"),
			   "id" => "novalite_template",
			   "type" => "select",
			   "options" => array(
				   "full" => esc_html__( "Full Width","novalite"),
				   "left-sidebar" =>  esc_html__( "Left Sidebar","novalite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","novalite"),
				   ),
			   "std" => "full",
		),
			  
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>