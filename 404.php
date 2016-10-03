<?php get_header(); ?>
<section id="content">
 <section class="container paddingtop">
        <div class="row">
        <div class="col-lg-12">
          <main id="main" class="site-main wow fadeInUp">
           <div id="error-404" class="page-404">
           <div class="text404"><?php echo _e('4<span>0</span>4', 'backyard'); ?></div>
					<h1><?php echo _e('Sorry! Page Not Found', 'backyard'); ?></h1>
					<p><?php echo _e('The page you are looking for might have been removed, had 
its name changed, or is temporarily unavailable.', 'backyard'); ?></p>
                    <?php get_search_form(); ?>
				</div>
          </main>
        </div>
      </div>
    </section>
  </section>
  <?php get_footer(); ?>