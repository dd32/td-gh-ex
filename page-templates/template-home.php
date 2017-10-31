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
      <?php $home_template_blog=get_theme_mod('home_template_blog');?>
      <?php if(isset($home_template_blog)&&$home_template_blog=='standardleft'){?>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
        <div class="sidebar wow fadeInUp">
         <?php if (is_active_sidebar('primary-sidebar') ) {dynamic_sidebar('primary-sidebar');} ?>
        </div>
        </div>
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
      <?php }elseif(isset($home_template_blog)&&$home_template_blog=='standardright'){?>      
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
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
        <div class="sidebar wow fadeInUp">
         <?php if (is_active_sidebar('primary-sidebar') ) {dynamic_sidebar('primary-sidebar');} ?>
        </div>
        </div>
      <?php }elseif(isset($home_template_blog)&&$home_template_blog=='standardfull'){?>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
      <?php }elseif(isset($home_template_blog)&&$home_template_blog=='gridleft'){?>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
        <div class="sidebar wow fadeInUp">
         <?php if (is_active_sidebar('primary-sidebar') ) {dynamic_sidebar('primary-sidebar');} ?>
        </div>
        </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <main id="main" class="site-main">
          <div class="row">
           <?php 
		   $inc=1;
            global $the_query;
			$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
            $the_query=new WP_Query(array('post_type'=>'post','posts_per_page' =>8,'paged' => $paged));
            if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();
            get_template_part('template-parts/gridstyle/grid');  
           ?>
            <!--post-->
            <?php if($inc++%2==0){?>
            <div class="clearfix"></div>
            <?php }?>
           <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
          </div>
          </main>
        </div>
      <?php }elseif(isset($home_template_blog)&&$home_template_blog=='gridright'){?>      
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <main id="main" class="site-main">
          <div class="row">
           <?php 
		   $inc=1;
            global $the_query;
			$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
            $the_query=new WP_Query(array('post_type'=>'post','posts_per_page' =>8,'paged' => $paged));
            if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();
            get_template_part('template-parts/gridstyle/grid');  
           ?>
            <!--post-->
            <?php if($inc++%2==0){?>
            <div class="clearfix"></div>
            <?php }?>
           <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
          </div>
          </main>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
        <div class="sidebar wow fadeInUp">
         <?php if (is_active_sidebar('primary-sidebar') ) {dynamic_sidebar('primary-sidebar');} ?>
        </div>
        </div>
      <?php }elseif(isset($home_template_blog)&&$home_template_blog=='gridfull'){?>      
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <main id="main" class="site-main">
          <div class="row">
           <?php 
		   $inc=1;
            global $the_query;
			$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
            $the_query=new WP_Query(array('post_type'=>'post','posts_per_page' =>8,'paged' => $paged));
            if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();
            get_template_part('template-parts/gridstyle/gridfull');  
           ?>
            <!--post-->
            <?php if($inc++%2==0){?>
            <div class="clearfix"></div>
            <?php }?>
           <?php endwhile; ?>
          <?php endif; wp_reset_postdata(); ?>
          </div>
          </main>
        </div>        
      <?php }?>      
      </div>
    </section>
</section>
<!--content-->
<?php get_footer(); ?>