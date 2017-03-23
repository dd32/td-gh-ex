<?php get_header(); ?>
<section id="content">
<section class="container paddingtop">
      <div class="row">
        <?php if(get_theme_mod('enable_breadcrumb',false)){ ?>
       <div> <div class="col-lg-12"> <div class="breadcrumbs"><?php backyard_breadcrumbs(); ?></div></div></div>
         <?php } ?>
       
       <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <main id="main" class="site-main">
           <?php if(have_posts()): while(have_posts()): the_post();
           get_template_part('template-parts/content');    
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
        <?php get_sidebar(); ?>
      </div>
    </section>
</section>
<?php get_footer(); ?>