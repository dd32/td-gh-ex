<?php
/*
 *
 */

//	ACTIVE Widget
//	=================================================================
//  Footer Widgetizes Areas
	function bnw_register_widgets() {
		// Footer One
		register_sidebar(array(
			'id' => 'footer-01',
			'name' => __( 'Footer One', 'bnwtheme' ),
			'description' => __( 'Footer One', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		// Footer Two
		register_sidebar(array(
			'id' => 'footer-02',
			'name' => __( 'Footer Two', 'bnwtheme' ),
			'description' => __( 'Footer Two', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		// Footer Three
		register_sidebar(array(
			'id' => 'footer-03',
			'name' => __( 'Footer Three', 'bnwtheme' ),
			'description' => __( 'Footer Three', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		// Footer Four
		register_sidebar(array(
			'id' => 'footer-04',
			'name' => __( 'Footer Four', 'bnwtheme' ),
			'description' => __( 'Footer One', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		// Footer Five
		register_sidebar(array(
			'id' => 'footer-05',
			'name' => __( 'Footer Five', 'bnwtheme' ),
			'description' => __( 'Footer Five', 'bnwtheme' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		));
		
		// Footer Six
		register_sidebar(array(
			'id' => 'footer-06',
			'name' => __( 'Footer Six', 'bnwtheme' ),
			'description' => __( 'Footer Six', 'bnwtheme' ),
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