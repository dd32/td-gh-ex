<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$wip_new_metaboxes = new alhenalite_metaboxes ('product', array (

array( "type" => "navigation",  
       "item" => array( "setting" => esc_html__( "Setting","alhena-lite")),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => esc_html__( "Setting","alhena-lite"),
			   "type" => "title",
			  ),

		array( "name" => esc_html__( "Slogan","alhena-lite"),
			   "desc" => esc_html__( "Insert the slogan of page","alhena-lite"),
			   "id" => "wip_slogan",
			   "type" => "text",
			  ),

		array( "name" => esc_html__( "Template","alhena-lite"),
			   "desc" => esc_html__( "Select a template for this page","alhena-lite"),
			   "id" => "wip_template",
			   "type" => "select",
			   "options" => array(
				   "full" => esc_html__( "Full Width","alhena-lite"),
				   "left-sidebar" =>  esc_html__( "Left Sidebar","alhena-lite"),
				   "right-sidebar" => esc_html__( "Right Sidebar","alhena-lite"),
			  ),
			   "std" => "right-sidebar",
		),
			  
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>