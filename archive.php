<section id="content">
<section class="container paddingtop">

      <div class="row">

        <?php if(get_theme_mod('enable_breadcrumb',false)){ ?>

       <div> <div class="col-lg-12"> <div class="breadcrumbs"><?php the_breadcrumbs(); ?></div></div></div>

         <?php } ?>
       
       <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <main id="main" class="site-main">
           <?php if(have_posts()): while(have_posts()): the_post();
           get_template_part('templates/content', get_post_format());    
           ?>
            <!--post-->
           <?php endwhile; ?>
            <nav class="pagination wow fadeInUp">
               <div class="alignleft pull-left"> <?php previous_posts_link(__('&laquo; Older Posts','backyard')); // display newer posts link ?></div>
               <div class="alignright pull-right"> <?php next_posts_link(__('New Posts &raquo;','backyard'));?></div>
             </nav>
          <?php endif; ?>
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