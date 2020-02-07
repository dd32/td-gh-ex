<?php
/* 	D5 Creation Theme's Sidebars
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
*/

//	Registers the Widgets and Sidebars for the site
	function associationx_widgets_init() {

		register_sidebar( array(
			'name' =>  esc_html__('Primary Sidebar', 'associationx'),
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="twocolorw widget %2$s" data-sr="enter right, move 60px, over 1s, wait 0.5s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' =>  esc_html__('Single Page Sidebar', 'associationx'), 
			'id' => 'sidebar-sinpage',
			'before_widget' => '<aside id="%1$s" class="twocolorw widget %2$s" data-sr="enter right, move 60px, over 1s, wait 0.5s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
			'name' =>  esc_html__('Single Post Sidebar', 'associationx'),
			'id' => 'sidebar-sinpost',
			'before_widget' => '<aside id="%1$s" class="twocolorw widget %2$s" data-sr="enter right, move 60px, over 1s, wait 0.5s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		if(associationx_get_option('show_fp_wpblog', '1')) {	
			register_sidebar( array(
				'name' => esc_html__('Front Page Sidebar', 'associationx'),
				'id' => 'sidebar-3',
				'before_widget' => '<aside id="%1$s" class="twocolorw widget %2$s" data-sr="enter right, move 60px, over 1s, wait 0.5s">',
				'after_widget' => "</aside>",
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		}

		if ( function_exists('bp_is_active') ) {
			register_sidebar( array(
				'name' => esc_html__('Community/BuddyPress Sidebar', 'associationx'),
				'id' => 'sidebar-bp',
				'before_widget' => '<aside id="%1$s" class="twocolorw widget %2$s" data-sr="enter right, move 60px, over 1s, wait 0.5s">',
				'after_widget' => "</aside>",
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
		) );
		}

		if ( class_exists( 'bbPress' ) ) {
			register_sidebar( array(
				'name' => esc_html__('Forum/bbPress Sidebar', 'associationx'),
				'id' => 'sidebar-bb',
				'before_widget' => '<aside id="%1$s" class="twocolorw widget %2$s" data-sr="enter right, move 60px, over 1s, wait 0.5s">',
				'after_widget' => "</aside>",
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
		) );
		}

		if(associationx_woo_check()){
			register_sidebar( array(
				'name' => esc_html__('E-Commerce Sidebar', 'associationx'),
				'id' => 'sidebar-woo',
				'before_widget' => '<aside id="%1$s" class="twocolorw widget %2$s" data-sr="enter right, move 60px, over 1s, wait 0.5s">',
				'after_widget' => "</aside>",
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			) );
		}

		register_sidebar( array(
			'name' => esc_html__('Search Sidebar', 'associationx'),
			'id' => 'sidebar-sp',
			'before_widget' => '<aside id="%1$s" class="twocolorw widget %2$s" data-sr="enter right, move 60px, over 1s, wait 0.5s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		$numoffwclmn = 4;
		foreach (range(1, $numoffwclmn) as $fwclmnn) {
			$fwnum = $fwclmnn+3;
			register_sidebar( array(
				'name' => esc_html__('Footer Area ', 'associationx').$fwclmnn,
				'id' => 'sidebar-'.esc_attr($fwnum),
				'description' =>  esc_html__('An optional widget area for your site footer', 'associationx'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => "</aside>",
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			));
		}
	
	}
	add_action( 'widgets_init', 'associationx_widgets_init' );