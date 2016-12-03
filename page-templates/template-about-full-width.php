<?php
/*
Template Name: about Full Width
*/
get_header();
?>
 
<section id="content">
 <section class="container paddingtop">
        <div class="row">
        <div class="col-lg-12">
        <?php if(have_posts()): the_post(); ?>
        <main id="main" class="site-main wow fadeInUp">
          <?php the_content(); ?>
          </main>
          <?php wp_link_pages(array('before'=>'<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'backyard' ).'</span>', 'after'=> '</div>','link_before' => '<span>','link_after'  => '</span>',)); ?>
          <?php endif; ?>
        </div>
      </div>
    </section>
  </section>
<?php get_footer(); ?>