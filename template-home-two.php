<?php 
/* 	
* Template Name: Home Two
*/
$busiprof_theme_options=busiprof_theme_setup_data();
  $is_front_page = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), $busiprof_theme_options );
  
  if (  $is_front_page['front_page'] != 'yes' ) {
  get_template_part('index');
  }
  else {	
  		get_header();
  $current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), $busiprof_theme_options );
  		?>
<!-- Slider Section of Index Page -->
<div id="content">
<?php do_action( 'busiprof_home_template_sections', false ); ?>


<!-- footer Section of index blog -->
<?php get_template_part('index', 'blog'); ?>
<?php do_action( 'busiprof_home_tesi_sections', false ); ?>
</div>
<?php get_footer(); } ?>