<?php global $backyard; ?>
<section id="content">
 <section class="container paddingtop">
        <div class="row">
        <?php if(get_theme_mod('enable_breadcrumb',true)){ ?>
        <div> <div class="col-lg-12"><div class="breadcrumbs"><?php the_breadcrumbs(); ?></div></div></div>
        <?php } ?>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
           <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <main id="main" class="site-main wow fadeInUp">
           <?php
	         get_template_part('templates/content', 'page'); ?>
          </main>
          <?php endwhile; ?>
          <?php wp_link_pages(array('before'=>'<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'backyard' ).'</span>', 'after'=> '</div>','link_before' => '<span>','link_after'  => '</span>',)); ?>
          
          <?php endif; ?>

        </div>
        <?php if (backyard_sidebar_path()) : ?>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
            <div class="sidebar wow fadeInUp">
                <?php include backyard_sidebar_path(); ?>
            </div>
        </div>
        <?php endif; ?>
      </div>
    </section>
</section>
