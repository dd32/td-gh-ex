<?php
 /*
Template Name: Home Page
*/
get_header(); 
$choose_slider=get_theme_mod('choose_slider');
  if($choose_slider=='1') {
   get_template_part('template-parts/home/home', 'slider');
  }
 ?> 
<section id="content">
 <section class="container paddingtop">
      <div class="row">
       <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <main id="main" class="site-main">
           <?php 
            global $the_query;
            $the_query=new WP_Query(array('post_type'=>'post','posts_per_page' =>8));
            if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();
            get_template_part('template-parts/content');  
           ?>
            <!--post-->
           <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
          </main>
        </div>
       <?php get_sidebar(); ?>
      </div>
    </section>
</section>
<!--content-->
<?php get_footer(); ?>