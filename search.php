<?php
/**
 * Displaying Search Results pages.
 * @package Academic Education
 * @subpackage academic-education
 * @since 1.0
 */

get_header(); ?>

<?php /** post section **/ ?>
<div class="container">
    <div class="row">
        <?php
        $layout = get_theme_mod( 'academic_education_theme_options','Right Sidebar');
        if($layout == 'One Column'){?>      
            <section id="firstbox" class="mainbox">
                <div class="col-md-12 col-sm-12">
                    <?php if ( have_posts() ) : ?>
                        <h1 class="entry-title"><?php printf( esc_html( 'Search Results for: %s', 'academic-education' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else : ?>
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'academic-education' ); ?></h1>
                    <?php endif; ?>
                    <?php if ( have_posts() ) :
                      /* Start the Loop */
                        
                        while ( have_posts() ) : the_post();

                          get_template_part( 'template-parts/post/content' ); 
                        
                        endwhile;

                        else : ?>

                            <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'academic-education' ); ?></p>
                            <?php
                            get_search_form();

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'academic-education' ),
                                'next_text'          => __( 'Next page', 'academic-education' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>',
                            ));
                        ?>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        <?php }else if($layout == 'Three Columns'){?>
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
            <section id="firstbox" class="mainbox">
                <div class="col-md-6 col-sm-6">
                    <?php if ( have_posts() ) : ?>
                        <h1 class="entry-title"><?php printf( esc_html( 'Search Results for: %s', 'academic-education' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else : ?>
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'academic-education' ); ?></h1>
                    <?php endif; ?>
                    <?php if ( have_posts() ) :
                      /* Start the Loop */
                        
                        while ( have_posts() ) : the_post();

                          get_template_part( 'template-parts/post/content' ); 
                        
                        endwhile;

                        else : ?>

                            <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'academic-education' ); ?></p>
                            <?php
                            get_search_form();

                        endif; 
                    ?>
                    <div class="navigation">
                      <?php
                          // Previous/next page navigation.
                          the_posts_pagination( array(
                              'prev_text'          => __( 'Previous page', 'academic-education' ),
                              'next_text'          => __( 'Next page', 'academic-education' ),
                              'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>',
                          ) );
                      ?>
                    </div>
                </div>
            </section>
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
        <?php }else if($layout == 'Four Columns'){?>
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
            <section id="firstbox" class="mainbox">
                <div class="col-md-3 col-sm-3">
                    <?php if ( have_posts() ) : ?>
                        <h1 class="entry-title"><?php printf( esc_html( 'Search Results for: %s', 'academic-education' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else : ?>
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'academic-education' ); ?></h1>
                    <?php endif; ?>
                    <?php if ( have_posts() ) :
                      /* Start the Loop */
                        
                        while ( have_posts() ) : the_post();

                          get_template_part( 'template-parts/post/content' ); 
                        
                        endwhile;

                        else : ?>

                            <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'academic-education' ); ?></p>
                            <?php
                            get_search_form();

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'academic-education' ),
                                'next_text'          => __( 'Next page', 'academic-education' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>',
                            ) );
                        ?>
                    </div>
                </div>
            </section>
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
        <?php }else if($layout == 'Right Sidebar'){?>
            <section id="firstbox" class="mainbox">
                <div class="col-md-8 col-sm-8">
                    <?php if ( have_posts() ) : ?>
                        <h1 class="entry-title"><?php printf( esc_html( 'Search Results for: %s', 'academic-education' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else : ?>
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'academic-education' ); ?></h1>
                    <?php endif; ?>
                    <?php if ( have_posts() ) :
                      /* Start the Loop */
                        
                        while ( have_posts() ) : the_post();

                          get_template_part( 'template-parts/post/content' ); 
                        
                        endwhile;

                        else : ?>

                            <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'academic-education' ); ?></p>
                            <?php
                            get_search_form();

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'academic-education' ),
                                'next_text'          => __( 'Next page', 'academic-education' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>',
                            ));
                        ?>
                    </div>
                </div>
            </section>
            <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
        <?php }else if($layout == 'Left Sidebar'){?>
            <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
            <section id="firstbox" class="mainbox">
                <div class="col-md-8 col-sm-8">
                    <?php if ( have_posts() ) : ?>
                        <h1 class="entry-title"><?php printf( esc_html( 'Search Results for: %s', 'academic-education' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else : ?>
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'academic-education' ); ?></h1>
                    <?php endif; ?>
                    <?php if ( have_posts() ) :
                      /* Start the Loop */
                        
                        while ( have_posts() ) : the_post();

                          get_template_part( 'template-parts/post/content' ); 
                        
                        endwhile;

                        else : ?>

                            <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'academic-education' ); ?></p>
                            <?php
                            get_search_form();

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'academic-education' ),
                                'next_text'          => __( 'Next page', 'academic-education' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>',
                            ) );
                        ?>
                    </div>
                </div>
            </section>   
        <?php }else if($layout == 'Grid Layout'){?>
            <section id="firstbox" class="mainbox">
                <div class="col-md-12 col-sm-12">
                    <?php if ( have_posts() ) : ?>
                        <h1 class="entry-title"><?php printf( esc_html( 'Search Results for: %s', 'academic-education' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php else : ?>
                        <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'academic-education' ); ?></h1>
                    <?php endif; ?>
                    <?php if ( have_posts() ) :
                      /* Start the Loop */
                        
                        while ( have_posts() ) : the_post();

                          get_template_part( 'template-parts/post/grid-layout' ); 
                        
                        endwhile;

                        else : ?>

                            <p class="sorry-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'academic-education' ); ?></p>
                            <?php
                            get_search_form();

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'academic-education' ),
                                'next_text'          => __( 'Next page', 'academic-education' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'academic-education' ) . ' </span>',
                            ));
                        ?>
                    </div>
                </div>
            </section>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>