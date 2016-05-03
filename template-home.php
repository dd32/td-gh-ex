 <?php 
 /*
Template Name: Home Page
*/
  if(get_theme_mod('choose_slider',true)) {
   get_template_part('templates/home/home', 'slider');
  }
 ?>   
   <section id="content">
   
 <section class="container paddingtop">

      <div class="row">

       <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <main id="main" class="site-main">
           <?php 
            global $the_query;
            $paged=(get_query_var('page')) ? get_query_var('page') : 1;
            $the_query=new WP_Query(array('post_type'=>'post','posts_per_page' => 5,'paged' => $paged));
            if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post();
            get_template_part('templates/content', get_post_format());  
           ?>
            <!--post-->
           <?php endwhile; ?>
            <nav class="pagination wow fadeInUp">
               <div class="alignleft pull-left"> <?php previous_posts_link(__('&laquo; Older Posts','backyard')); // display newer posts link ?></div>
               <div class="alignright pull-right"> <?php echo next_posts_link(__('New Posts &raquo;','backyard'), $the_query->max_num_pages);?></div>
             </nav>
          <?php endif; wp_reset_postdata(); ?>
          </main>
        </div>
         
       <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
          <div class="sidebar wow fadeInUp">
          <?php include backyard_sidebar_path(); ?>
          </div>
        </div>
      
      </div>
    </section>
   
  </section>
  <!--content-->