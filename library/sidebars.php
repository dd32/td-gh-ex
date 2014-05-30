<?php
/*
 *
 */

//	ACTIVE SIDEBARS
//	=================================================================
//  Sidebars Widgetizes Areas
	function bnw_register_sidebars() {
		//Primary Sidebar
		register_sidebar(array(
			'id' => 'primary-sidebar',
			'name' => __( 'Primary Sidebar', 'bnwtheme' ),
			'description' => __( 'The first (primary) sidebar.', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		//Sidebar Left
		register_sidebar(array(
			'id' => 'left-sidebar',
			'name' => __( 'Left Sidebar', 'bnwtheme' ),
			'description' => __( 'The first (primary) sidebar.', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		//Sidebar Right
		register_sidebar(array(
			'id' => 'right-sidebar',
			'name' => __( 'Right Sidebar', 'bnwtheme' ),
			'description' => __( 'The first (primary) sidebar.', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		//Sidebar Blog
		register_sidebar(array(
			'id' => 'blog-sidebar',
			'name' => __( 'Blog Sidebar', 'bnwtheme' ),
			'description' => __( 'The first (primary) sidebar.', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		//Sidebar Archives
		register_sidebar(array(
			'id' => 'archives-sidebar',
			'name' => __( 'Archives Sidebar', 'bnwtheme' ),
			'description' => __( 'The first (primary) sidebar.', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		/*
		to add more sidebars or widgetized areas, just copy
		and edit the above sidebar code. In order to call
		your new sidebar just use the following code:

		Just change the name to whatever your new
		sidebar's id is, for example:

		register_sidebar(array(
			'id' => 'sidebar2',
			'name' => __( 'Sidebar 2', 'bnwtheme' ),
			'description' => __( 'The second (secondary) sidebar.', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));

		To call the sidebar in your template, you can just copy
		the sidebar.php file and rename it to your sidebar's name.
		So using the above example, it would be:
		sidebar-sidebar2.php

		*/
	} // don't remove this bracket!