<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$wip_new_metaboxes = new lookilite_metaboxes ('page', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","wip") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","wip"),
			   "type" => "title",
			  ),

		array( "name" => __( "Slogan","wip"),
			   "desc" => __( "Insert your slogan","wip"),
			   "id" => "wip_slogan",
			   "type" => "text",
			),
			
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>