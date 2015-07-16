<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$wip_new_metaboxes = new alhenalite_metaboxes ('page', array (

array( "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","alhenalite")),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","alhenalite"),
			   "type" => "title",
			  ),

		array( "name" => __( "Slogan","alhenalite"),
			   "desc" => __( "Insert the slogan of page","alhenalite"),
			   "id" => "wip_slogan",
			   "type" => "text",
			  ),

		array( "name" => __( "Template","alhenalite"),
			   "desc" => __( "Select a template for this page","alhenalite"),
			   "id" => "wip_template",
			   "type" => "select",
			   "options" => array(
				   "full" => __( "Full Width","alhenalite"),
				   "left-sidebar" =>  __( "Left Sidebar","alhenalite"),
				   "right-sidebar" => __( "Right Sidebar","alhenalite"),
			  ),
			  ),
			  
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>