<?php
get_header(); ?>


  <div class="container">
        <div class="row">
            <?php

            $layout = get_theme_mod( 'bee_news_blog_layout', 'right-sidebar' ); ?>
            

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
          <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'bee-news' ),
                                'next_text'          => __( 'Next page', 'bee-news' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bee-news' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
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