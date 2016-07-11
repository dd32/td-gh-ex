<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$wip_new_metaboxes = new alhenalite_metaboxes ('post', array (

array( "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","alhena-lite")),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","alhena-lite"),
			   "type" => "title",
			  ),

		array( "name" => __( "Template","alhena-lite"),
			   "desc" => __( "Select a template for this page", "alhena-lite"),
			   "id" => "wip_template",
			   "type" => "select",
			   "options" => array(
				   "full" => __( "Full Width","alhena-lite"),
				   "left-sidebar" =>  __( "Left Sidebar","alhena-lite"),
				   "right-sidebar" => __( "Right Sidebar","alhena-lite"),
			  ),
			  ),
			  
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>