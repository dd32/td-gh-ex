<?php get_header();
if(is_home() && get_option('page_for_posts')): $blog_page_id = get_option('page_for_posts'); $post_page_title=get_page($blog_page_id)->post_title; else : $blog_page_id=get_option('page_on_front'); $post_page_title=''.__('Blog', 'abaya'); endif;?>
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title"><?php echo $post_page_title;  ?></h1>
        </div><!--header-->
        <div class="breadcrumbs">
        <?php woocommerce_breadcrumb(); ?>
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
            <?php if (have_posts()): 
			while (have_posts()) : the_post();
			get_template_part('content', get_post_format());
			?>
              <!--post-->
              <?php endwhile; ?>
              <nav class="pagination wow fadeInUp">
           
                <div class="alignleft"> <?php previous_posts_link(__('&laquo; Previous', 'abaya')); ?></div>
                   <div class="alignright"><?php next_posts_link(__('Next &raquo;', 'abaya')); ?></div>
      
          </nav>
              <?php endif; ?>
            </div><!--main-->
          </div><!--primary-->
        </div><!--col-->
        <?php get_sidebar('blog');?><!--col-->
      </div><!--row-->
    </div><!--main-->
  </section><!--container-->
</section><!--content-->
<?php get_footer();?>