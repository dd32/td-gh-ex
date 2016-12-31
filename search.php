<?php get_header();?>
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title"><?php _e('Search Results', 'abaya'); ?></h1>
        </div><!--header-->
        <div class="breadcrumbs">
          <?php abaya_breadcrumbs(); ?><!--crumbs-->
        </div><!--breadcrumbs-->
      </div><!--col-->
    </div><!--row-->
  </div><!--container-->
</section><!--inner-page-bg-->
<section id="content" class="site-content">
  <section class="container">
    <div class="blog-content" id="blog-content">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
          <div class="content-area" id="primary">
            <div id="main" class="site-main">
             <?php if (have_posts()): ?>
              <?php while(have_posts()): the_post(); 
              
              get_template_part('template-parts/content', get_post_format() ); endwhile; ?>    

            <nav>
            <ul class="pagination wow fadeInUp">
            <li class="prev"><?php previous_posts_link(__('&laquo;', 'abaya')); ?></li>
            <li class="next"><?php next_posts_link(__('&raquo;', 'abaya')); ?></li>
            </ul>
           </nav>
           <?php else : get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>  
            </div><!--main-->
          </div><!--primary-->
        </div><!--col-->
      <?php get_sidebar(); ?>
      </div><!--row-->
    </div><!--main-->
  </section><!--container-->
</section><!--content-->
<?php get_footer(); ?>