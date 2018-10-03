<?php
get_header(); ?>


  <div class="container">
        <div class="row">
            <?php

            $layout = get_theme_mod( 'beenews_blog_layout', 'right-sidebar' ); ?>
            

            <div id="primary"
                 class="beenews-content beenews-archive-page <?php echo $breadcrumbs_enabled ? '' : 'beenews-margin-top' ?> <?php echo ( $layout === 'fullwidth' ) ? '' : 'col-lg-8 col-md-8'; ?> col-sm-12 col-xs-12">
                <main id="main" class="site-main" role="main">
                    <?php
                    if (have_posts()):
                            while (have_posts()):
                                the_post();
                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php
                                get_template_part('template-parts/content', get_post_format());
                                ?>
                            </div>
                            <?php
                            endwhile;
                        else:
                            get_template_part('template-parts/content', 'none');
                        endif;
                    ?>
                </main><!-- #main -->
                 <div class="row">
            <?php
            if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
            ?>
          </div>
            </div><!-- #primary -->
            <?php if ( $layout === 'right-sidebar' ): ?>
            <div class="col-xs-12 col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="beenews-sidebar">
                    <?php get_sidebar( 'sidebar' ); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_footer(); ?>