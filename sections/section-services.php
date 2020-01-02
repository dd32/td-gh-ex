<?php
/**
* section-services.php
* @author    Denis Franchi
* @package   Atomy
* @version   1.0.3
*
*/
?>

<!-- Services -->
<!-- Effect Hover Icon 1 --> 
<?php get_template_part('ateffecthover/services/atico1/at',esc_attr(get_theme_mod('at_effect_hover_ico_1','no-effect')));?>
<!-- Effect Hover Icon 2 -->
<?php get_template_part('ateffecthover/services/atico2/at',esc_attr(get_theme_mod('at_effect_hover_ico_2','no-effect')));?>
<!-- Effect Hover Icon 3 -->
<?php get_template_part('ateffecthover/services/atico3/at',esc_attr(get_theme_mod('at_effect_hover_ico_3','no-effect')));?>
<!-- Effect Hover Icon 4 -->
<?php get_template_part('ateffecthover/services/atico4/at',esc_attr(get_theme_mod('at_effect_hover_ico_4','no-effect')));?>
<!-- Effect Hover Icon 5 -->
<?php get_template_part('ateffecthover/services/atico5/at',esc_attr(get_theme_mod('at_effect_hover_ico_5','no-effect')));?>


<section class="<?php if ( false == esc_attr(get_theme_mod('atomy_enable_full_width_services', true) )):?>container-fluid pl-0 pr-0<?php endif;?> <?php if ( true == esc_attr(get_theme_mod('atomy_enable_full_width_services', true) )):?><?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?><?php endif;?> at-services-margin pt-5 pb-5">

<div class="row at-services mr-0 ml-0">
<h2 class="<?php echo esc_html(get_theme_mod('at_text_align_title_services'));?> pb-5 col-md-12 pt-5" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_title_services_section','no-effect'));?>" data-aos-duration="500" data-aos-offset="200">
<?php echo esc_html(get_theme_mod( 'at_title_services_section',__('Our Services','atomy')));?>
</h2>
<div class="container at-services-ico-first pb-5"> 
<div class="row">
<div class="col-md-4 at-cl-s-1" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_column_1_services_section','no-effect'));?>" data-aos-duration="500" data-aos-offset="210">
  <div class="at-text-int-serv text-center">
    <div class="at-cl-s-i-1">
      <i class="<?php echo esc_html( get_theme_mod( 'at_icon_1_services_section','fas fa-rocket')); ?>"></i>
      </div>
          <h6>
           <?php esc_html(get_theme_mod( 'at_title_icon_1_services_section',__('Digital Marketing','atomy')));?>
          </h6>
          </div>
					<p>
          <?php echo esc_html(get_theme_mod( 'at_subtitle_icon_1_services_section',__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod adipisicing elit ipsum dolor.','atomy')));?>
           </p><?php dynamic_sidebar('sidebar-15'); ?>
        </div>
      <div class="col-md-4 at-cl-s-2" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_column_2_services_section','no-effect'));?>" data-aos-duration="500" data-aos-offset="220">
      <div class="at-text-int-serv text-center">
      <div class="at-cl-s-i-2">
        <i class="<?php echo esc_html( get_theme_mod( 'at_icon_2_services_section','fas fa-rocket')); ?>"></i>
      </div>
          <h6>
          <?php echo esc_html(get_theme_mod( 'at_title_icon_2_services_section',__('Digital Marketing','atomy')));?>
          </h6>
          </div>
					<p>
          <?php echo esc_html(get_theme_mod( 'at_subtitle_icon_2_services_section',__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod adipisicing elit ipsum dolor.','atomy')));?>
           </p><?php dynamic_sidebar('sidebar-16'); ?>
      </div>
      <div class="col-md-4 at-cl-s-3" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_column_3_services_section','no-effect'));?>" data-aos-duration="500" data-aos-offset="225">
      <div class="at-text-int-serv text-center">
      <div class="at-cl-s-i-3">
      <i class="<?php echo esc_html( get_theme_mod( 'at_icon_3_services_section','fas fa-rocket')); ?>"></i>
      </div>
          <h6> 
           <?php echo esc_html(get_theme_mod( 'at_title_icon_3_services_section',__('Digital Marketing','atomy')));?>
          </h6>
          </div>
					<p>
           <?php echo esc_html(get_theme_mod( 'at_subtitle_icon_3_services_section',__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod adipisicing elit ipsum dolor.','atomy')));?>
          </p><?php dynamic_sidebar('sidebar-17'); ?>
      </div>
</div>
</div>
<?php if ( false == esc_attr( get_theme_mod( 'atomy_enable_columns_4_5_services_section', false) )):?>
<div class="container at-services-ico-second mb-5">
<div class="row">
      <div class="col-md-6 at-cl-s-4" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_column_4_services_section','no-effect'));?>" data-aos-duration="500" data-aos-offset="225">
  <div class="at-text-int-serv text-center">
  <div class="at-cl-s-i-4">
      <i class="<?php echo esc_html( get_theme_mod( 'at_icon_4_services_section','fas fa-rocket')); ?>"></i>
      </div>
          <h6>
           <?php echo esc_html(get_theme_mod( 'at_title_icon_4_services_section',__('Digital Marketing','atomy')));?>
           </h6>
          </div>
          <p>
           <?php echo esc_html(get_theme_mod( 'at_subtitle_icon_4_services_section',__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod adipisicing elit ipsum dolor.','atomy')));?>
          </p>
        </div>
        <div class="col-md-6 at-cl-s-5" data-aos="<?php echo esc_html(get_theme_mod( 'at_effect_column_5_services_section','no-effect'));?>" data-aos-duration="500" data-aos-offset="225">
  <div class="at-text-int-serv text-center">
  <div class="at-cl-s-i-5">
      <i class="<?php echo esc_html( get_theme_mod( 'at_icon_5_services_section','fas fa-rocket')); ?>"></i>
      </div>
          <h6>
            <?php echo esc_html(get_theme_mod( 'at_title_icon_5_services_section',__('Digital Marketing','atomy')));?>
          </h6>
          </div>
          <p>
            <?php echo esc_html(get_theme_mod( 'at_subtitle_icon_5_services_section',__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod adipisicing elit ipsum dolor.','atomy')));?>
          </p>
        </div>
    </div> 
  </div> 
  <?php endif; ?>	
</div>
</section>
