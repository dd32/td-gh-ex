<?php
/*
Template Name: Home Page
*/
get_header();
global $abaya_option;
 ?>

<section id="main-slider">
<?php if(isset($abaya_option['switch-slider']) && $abaya_option['switch-slider']==1){get_template_part('includes/home/flexslider'); }else if(isset($abaya_option['switch-slider']) && $abaya_option['switch-slider']==2){get_template_part('includes/home/video');}else {get_template_part('includes/home/flexslider');} ?>
</section>
<section id="content">
  <section class="container">
    <div class="home-products">
    <?php if (is_active_sidebar('front_page_widget_top')){ dynamic_sidebar('front_page_widget_top'); } ?>
        <!--featured-->
   <?php if (is_active_sidebar('front_page_widget_middle')){ dynamic_sidebar('front_page_widget_middle'); } ?>      
        <!--featured-->
    </div><!--home_product-->
  </section><!--container-->
</section><!--content-->
<?php get_footer(); ?>