<?php get_header(); ?>
<section id="content">
 <section class="container paddingtop">
        <div class="row">
        <?php if(get_theme_mod('enable_breadcrumb',false)){ ?>
        <div> <div class="col-lg-12"><div class="breadcrumbs"><?php backyard_breadcrumbs(); ?></div></div></div>
        <?php } ?>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
           <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <main id="main" class="site-main wow fadeInUp">
           <?php
	         get_template_part('template-parts/content', 'page');
			 if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			  ?>
          </main>
          <?php endwhile; ?>
		  <?php endif; ?>
        </div>
       <?php get_sidebar(); ?>
      </div>
    </section>
</section>
<?php get_footer(); ?>
