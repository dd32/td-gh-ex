<?php
/**
* section-static.php
* @author    Denis Franchi
* @package   Atomy
*
*/
?>

<!-- Section Static -->
<section class="at-header-media  pb-5 <?php if ( false == get_theme_mod('atomy_enable_full_width_static', true) ):?>container-fluid pl-0 <?php endif;?> <?php if ( true == get_theme_mod('atomy_enable_full_width_static', true) ):?><?php echo esc_html( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?>">
	<div class="row">
    <?php the_custom_header_markup() ?>
</div>
 	<!-- Button General Action -->
   <?php if ( false == get_theme_mod('atomy_enable_button_action_static', true) ):?>
	<div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
  <div class="row image-caption at-button-action-general text-center at-button-action-static">
  <div class="col-md-12">
  <button class="button post-readmore at-gen-act">
		        <!-- Link Button -->
		        <a href="<?php echo esc_url( get_theme_mod( 'atomy_link_action_static' ));?>">
		           <?php echo esc_html(get_theme_mod( 'at_title_action_static',__('SHOP NOW','atomy')));?>
		        </a>
	</button>
	</div>
</div>
	</div>
	<?php endif;?>
</section>
   
<!-- Title -->
<div class="at-write-auto">
  <div class="text-center">
    <h1 id="type"><?php echo esc_html(get_theme_mod( 'at_title_write_1',__('STATIC','atomy')));?></h1>
  </div>
</div>









