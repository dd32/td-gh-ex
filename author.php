<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package abaya
 * @since abaya 1.0
 */
 get_header(); ?>
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title"><?php printf( __( 'Author Archives: %s', 'abaya' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
        </div><!--header-->
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
              <?php while(have_posts()): the_post(); get_template_part('template-parts/content'); endwhile; ?>    
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