<?php

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

$lookilite_new_metaboxes = new lookilite_metaboxes ('page', array (

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","looki-lite") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","looki-lite"),
			   "type" => "title",
			  ),

		array( "name" => __( "Slogan","looki-lite"),
			   "desc" => __( "Insert your slogan","looki-lite"),
			   "id" => "lookilite_slogan",
			   "type" => "text",
			),
			
),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>