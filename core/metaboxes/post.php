<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$novalite_new_metaboxes = new novalite_metaboxes ('post', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => esc_html__( "Setting","nova-lite") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => esc_html__( "Setting","nova-lite"),
			   "type" => "title",
		),

		array( "name" => esc_html__( "Template","nova-lite"),
			   "desc" => esc_html__( "Select a template for this page","nova-lite"),
			   "id" => "novalite_template",
			   "type" => "select",
			   "options" => array(
				   "full" => esc_html__( "Full Width","nova-lite"),
				   "left-sidebar" =>  esc_html__( "Left Sidebar","nova-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","nova-lite"),
				   ),
			   "std" => "full",
		),
			  
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>