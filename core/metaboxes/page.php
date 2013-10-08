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

array( "name" => "Navigation",  
       "type" => "navigation",  
       "item" => array( "setting" => __( "Setting","wip"), "sidebars" => __( "Sidebars","wip") ),   
       "start" => "<ul>", 
       "end" => "</ul>"),  

array( "type" => "begintab",
	   "tab" => "setting",
	   "element" =>

		array( "name" => __( "Setting","wip"),
			   "type" => "title",
			  ),

		array( "name" => __( "Title","wip"),
			   "desc" => __( "You want to display the title?","wip"),
			   "id" => "wip_content_title",
			   "type" => "on-off",
			   "std" => "on",
			  ),

		array( "name" => __( "Content","wip"),
			   "desc" => __( "You want to display the content?","wip"),
			   "id" => "wip_content",
			   "type" => "on-off",
			   "std" => "on",
			  ),

		array( "name" => __( "Slogan","wip"),
			   "desc" => __( "Insert the slogan of page","wip"),
			   "id" => "wip_slogan",
			   "type" => "text",
			  ),

		array( "name" => __( "Template","wip"),
			   "desc" => __( "Select a template for this page","wip"),
			   "id" => "wip_template",
			   "type" => "select",
			   "options" => array(
				   "full" => __( "Full Width","wip"),
				   "left-sidebar" =>  __( "Left Sidebar","wip"),
				   "right-sidebar" => __( "Right Sidebar","wip"),
			  ),
			  ),
			  
),

array( "type" => "endtab"),

array( "type" => "begintab",
	   "tab" => "sidebars",
	   "element" =>
	  
		array( "name" => __( "Sidebars","wip"),
			   "type" => "title",
			  ),
		
		array( "name" => __( "Top sidebar","wip"),
			   "desc" => __( "Select top sidebar","wip"),
			   "id" => "wip_top_sidebar",
			   "type" => "select",
			   "options" => alhenalite_sidebar_list('top'),
			),

		array( "name" => __( "Sidebar","wip"),
			   "desc" => __( "Select side sidebar","wip"),
			   "id" => "wip_sidebar",
			   "type" => "select",
			   "options" => alhenalite_sidebar_list('side'),
			),
			
		array( "name" => __( "Footer sidebar","wip"),
			   "desc" => __( "Select footer sidebar","wip"),
			   "id" => "wip_footer_sidebar",
			   "type" => "select",
			   "options" => alhenalite_sidebar_list('footer'),
			),

),

array( "type" => "endtab"),

array( "type" => "endtab")
)

);


?>