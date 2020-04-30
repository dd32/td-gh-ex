<?php
/**
* Template Name: Contact
* Template Post Type: page
* @author    Denis Franchi
* @package   Atomy
*
*/

get_header('portfolio');

if ( false == get_theme_mod('atomy_enable_breadcrumbs_page',false)) :?>
<div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_header','container'))?> at-woocommerce-breadcrumbs">
<?php atomy_custom_breadcrumbs(); ?>
</div>
<?php endif;
if (have_posts() ) : while (have_posts() ):the_post(); ?>
<div class="<?php echo esc_attr( get_theme_mod('atomy_enable_full_width_body','container'))?> at-map-contact">
<div class="at-filter-map-contact <?php echo esc_attr( get_theme_mod('atomy_enable_full_width_body','container'))?>"></div>
   <?php dynamic_sidebar('sidebar-8' ); ?>
</div>
<div class="container at-content-contact mt-5 mb-5">
<!-- Title and Content -->
<?php if (false == get_theme_mod('at_enable_title_atomy_contact_page',false)):?>
<h2 class="text-center mb-4"><?php the_title_attribute();?></h2>
<?php the_content();?>
<?php endif;?>
</div>
<div class="<?php echo esc_attr( get_theme_mod('atomy_enable_full_width_body','container'))?> atomy-contct-area">
    <div class="row ml-0 mr-0">
        <div class="col-md-8 atomy-form-area-contact pl-0">
          <?php dynamic_sidebar('sidebar-9' ); ?>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3 atomy-sidebar-contact">
          <?php dynamic_sidebar('sidebar-10' ); ?>
        </div>
   </div>
</div>

<?php endwhile;
        endif;
        wp_reset_postdata(); // End postdata Contact 


 get_footer(); ?>