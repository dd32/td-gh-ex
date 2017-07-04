<?php
/**
 *
 * Template name: Homepage
 * The template for displaying homepage.
 *
 * @package Ascreen
 */

get_header();?>  

<div id="ascreen_section_warp" class="ascreen_section_warp">

<?php

  $section_default = ascreen_section_default_order();
  
  $sortable_value = maybe_unserialize( get_theme_mod( 'home_layout',$section_default ) );
  
  
  if ( ! empty( $sortable_value ) ) : 
	foreach ( $sortable_value as $checked_value ) :
	  get_template_part( '/custom/section/homepage-'.esc_attr( $checked_value ), '' );
	endforeach;
  endif;  
						
?>

</div><!--div id="ascreen_section_warp" class="ascreen_section_warp"-->
<?php get_footer(); ?>