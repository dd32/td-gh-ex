<?php get_header(); ?>
<section id="content">
<section class="container paddingtop">
   <div class="row">
         <?php if(get_theme_mod('enable_breadcrumb',false)){ ?>
        <div><div class="col-lg-12"> <div class="breadcrumbs"><?php the_breadcrumbs(); ?></div></div></div>
         <?php } ?>
 <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <?php
               // Start the loop.
                 while ( have_posts() ) : the_post(); ?>
             <main id="main" class="site-main wow fadeInUp">
              <?php get_template_part('template-parts/content', get_post_format()); ?>
            </main>
<?php endwhile; wp_reset_query(); ?>
<?php if ( comments_open() || get_comments_number() ) :
comments_template();
endif;
// Previous/next post navigation.
the_post_navigation( array(

	'next_text' => '<span class="meta-nav alignright" aria-hidden="true">' . __('&nbsp;', 'backyard') . '</span> ' .
        '<span class="screen-reader-text alignright">'.__('Next post:', 'backyard' ) . '</span> ' .
        '<span class="post-title alignright">Next &raquo;</span>',
       'prev_text' => '<span class="meta-nav" aria-hidden="true">'.__('&nbsp;', 'backyard'). '</span> ' .
       '<span class="screen-reader-text alignleft">'.__('Previous post:', 'backyard').'</span> ' .
       '<span class="post-title alignleft">&laquo;Previous</span>',) );

		// End the loop.       

             ?>
</div>
<?php get_sidebar(); ?>
</div>
</section>
</section>
<?php get_footer(); ?>