<?php
  add_action('admin_menu', 'busi_admin_menu_pannel');  
  function busi_admin_menu_pannel()
   {
  	
  	$page=add_theme_page( __('theme','busi_prof'), __('Option Panel','busi_prof'), 'edit_theme_options', 'busi_prof', 'busiprof_option_panal_function' ); 
  	add_action('admin_print_styles-'.$page, 'busi_admin_enqueue_script');
  }
  function busi_admin_enqueue_script($hook) {
  	wp_enqueue_script('dashboard');	
  	wp_enqueue_script('busiprof-wpb_option_pannel', get_template_directory_uri() . '/functions/theme_options/js/busiprof_option_pannel.js',array('media-upload','thickbox'));
  	wp_enqueue_script('busiprof-bootstrap-modal', get_template_directory_uri() . '/functions/theme_options/js/bootstrap-modal.js');
  	wp_enqueue_style('thickbox');	
  	wp_enqueue_style('busiprof-wpb_option_pannel', get_template_directory_uri() . '/functions/theme_options/css/busiprof_option_pannel.css' );
  	wp_enqueue_style('busiprof-busiprof-bootstrap',get_template_directory_uri().'/functions/theme_options/css/assets/css/busiprof-bootstrap.css');
  }
  function busiprof_option_panal_function () 
  {	
  	require_once('css/tooltip_css.php');
  	require_once('webr_options_pannel.php');
  }
  // Premium theme option panel
  //require_once('webriti/webriti_theme.php');
  ?>