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
			$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
            $the_query=new WP_Query(array('post_type'=>'post','posts_per_page' =>8,'paged' => $paged));
            if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();
            get_template_part('template-parts/content');  
           ?>
            <!--post-->
           <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
          </main>
          <?php if ($the_query->max_num_pages > 1) {?>
         <div class="loadmore_post" max_page="<?php echo $the_query->max_num_pages?>" start_page="1"> 
         	<a class="btn fillbg" href="#"><?php esc_html_e('Load More Post', 'backyard'); ?><i aria-hidden="true" class="fa fa-angle-double-down"></i><i class="fa fa-refresh fa-spin"></i></a>
         </div>
         <?php }?>
        </div>
       <?php get_sidebar(); ?>
      </div>
    </section>
</section>
<!--content-->
<?php get_footer(); ?>