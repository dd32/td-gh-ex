<?php

if ( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED ){
	get_template_part('/includes/pro/widgets/custom-widgets');		
}

/*
add widgets to wp-admin
*/
function acool_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="ct_widget %2$s ct_border">',
		'after_widget' => '</div> <!-- end .ct_widget -->',
		'before_title' => '<h4 class="ct_widget_title"><span>',
		'after_title' => '</span></h4>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #1',
		'id' => 'sidebar-2',
		'before_widget' => '<div id="footerwidgets" class="col-xs-12 col-sm-6 col-lg-3"><div id="%1$s" class="ioftsc-lt %2$s">',
		'after_widget' => '</div></div> <!-- end .fwidget -->',
		'before_title' => '<span class="title">',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #2',
		'id' => 'sidebar-3',
		'before_widget' => '<div id="footerwidgets" class="col-xs-12 col-sm-6 col-lg-3"><div id="%1$s" class="ioftsc-lt %2$s">',
		'after_widget' => '</div></div> <!-- end .fwidget -->',
		'before_title' => '<span>',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #3',
		'id' => 'sidebar-4',
		'before_widget' => '<div id="footerwidgets" class="col-xs-12 col-sm-6 col-lg-3"><div id="%1$s" class="ioftsc-lt %2$s">',
		'after_widget' => '</div></div> <!-- end .fwidget -->',
		'before_title' => '<span class="title">',
		'after_title' => '</span>',
	) );

	register_sidebar( array(
		'name' => 'Footer Area #4',
		'id' => 'sidebar-5',
		'before_widget' => '<div id="footerwidgets" class="col-xs-12 col-sm-6 col-lg-3"><div id="%1$s" class="ioftsc-lt %2$s">',
		'after_widget' => '</div></div> <!-- end .fwidget -->',
		'before_title' => '<span class="title">',
		'after_title' => '</span>',
	) );

	if( defined( 'ACOOL_THEME_PRO_USED' ) && ACOOL_THEME_PRO_USED ){ 
		register_sidebar( array(
			'name' => 'Content Header',
			'id' => 'sidebar-6',//content-header
			'before_widget' => '<div id="content-header" class="content-header-ad"><div id="%1$s" class="%2$s">',
			'after_widget' => '</div></div> <!-- end .content-header -->',
			'before_title' => '<span class="title">',
			'after_title' => '</span>',
		) );
		
		register_sidebar( array(
			'name' => 'After Content',
			'id' => 'sidebar-7',//after-content
			'before_widget' => '<div id="after-content" class="after-content-au"><div id="%1$s" class="%2$s">',
			'after_widget' => '</div></div> <!-- end .after Content -->',
			'before_title' => '<span class="title">',
			'after_title' => '</span>',
		) );	
	}
}
add_action( 'widgets_init', 'acool_widgets_init' );


