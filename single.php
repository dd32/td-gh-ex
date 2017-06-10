<?php get_header(); ?>
<section id="content">
<section class="container paddingtop">
   <div class="row">         
 <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <?php while ( have_posts() ) : the_post(); ?>
             <main id="main" class="site-main wow fadeInUp">
              <?php get_template_part('template-parts/content'); ?>
            </main>
<?php endwhile;?>
<?php if (comments_open() || get_comments_number()):
comments_template();
endif;
// Previous/next post navigation.
the_post_navigation(array(
	'next_text' => '<span class="meta-nav alignright" aria-hidden="true">' . __('&nbsp;', 'backyard') . '</span> ' .
        '<span class="screen-reader-text alignright">'.__('Next post:', 'backyard' ) . '</span> ' .
        '<span class="post-title alignright">'.__('Next &raquo', 'backyard').'</span>',
       'prev_text' => '<span class="meta-nav" aria-hidden="true">'.__('&nbsp;', 'backyard'). '</span> ' .
       '<span class="screen-reader-text alignleft">'.__('Previous post:', 'backyard').'</span> ' .
       '<span class="post-title alignleft">'.__('&laquo;Previous', 'backyard').'</span>',));
		// End the loop.       
?>
</div>
<?php get_sidebar(); ?>
</div>
</section>
</section>
<?php get_footer(); ?>