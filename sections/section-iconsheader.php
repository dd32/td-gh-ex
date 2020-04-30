<?php
/**
* section-iconsheader.php
* @author    Denis Franchi
* @package   Atomy
*
*/
?>

<!-- Effect Hover Icon 1 --> 
<?php get_template_part('ateffecthover/headericons/aticoh1/at',esc_attr(get_theme_mod('at_effect_hover_ico_header_1','no-effect')));?>
<!-- Effect Hover Icon 2 --> 
<?php get_template_part('ateffecthover/headericons/aticoh2/at',esc_attr(get_theme_mod('at_effect_hover_ico_header_2','no-effect')));?>
<!-- Effect Hover Icon 3 --> 
<?php get_template_part('ateffecthover/headericons/aticoh3/at',esc_attr(get_theme_mod('at_effect_hover_ico_header_3','no-effect')));?>


<!-- Block icons header --> 
<section class="at-block-icon-header-s <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
	<div class="row atom-header-ecommerce mr-0 ml-0">
		<div class="col-md-4 atom-col-1" data-aos="<?php echo esc_attr(get_theme_mod('at_effect_icons_header_1','no-effect'));?>" data-aos-duration="500">
			<div class="atom-icon-header">
				<i class="<?php echo esc_attr(get_theme_mod('at_icons_header_1','fas fa-truck')); ?>"></i>
            </div>
        <div class="atom-text-header 1">
			<h4> 
			  <?php echo esc_html(get_theme_mod('at_title_icons_header_1'));?>
			</h4>
			<p>
				<?php echo esc_html(get_theme_mod( 'at_subtitle_icons_header_1'));?>
			</p>
        </div>
	</div>
	<div class="col-md-4 atom-col-2" data-aos="<?php echo esc_attr(get_theme_mod('at_effect_icons_header_2','no-effect'));?>" data-aos-duration="500">
		<div class="atom-icon-header">
			<i class="<?php echo esc_attr( get_theme_mod( 'at_icons_header_2','far fa-credit-card')); ?>"></i>
        </div>
          <div class="atom-text-header 2">
			<h4>
				<?php echo esc_html(get_theme_mod( 'at_title_icons_header_2'));?>
			</h4>
			<p>
				<?php echo esc_html(get_theme_mod( 'at_subtitle_icons_header_2'));?>
			</p>
        </div>
	</div>
<div class="col-md-4 atom-col-3" data-aos="<?php echo esc_attr(get_theme_mod('at_effect_icons_header_3','no-effect'));?>" data-aos-duration="500">
	<div class="atom-icon-header">
		<i class="<?php echo esc_attr( get_theme_mod( 'at_icons_header_3','fas fa-phone-volume')); ?>"></i>
    </div>
    <div class="atom-text-header-s 3">
		<h4>
		  <?php echo esc_html(get_theme_mod( 'at_title_icons_header_3'));?>
		</h4>
		<p>
		   <?php echo esc_html(get_theme_mod( 'at_subtitle_icons_header_3'));?>				 		 
		 </p>
        </div>
	</div>
   </div>
</section>