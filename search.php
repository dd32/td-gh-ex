<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package bb wedding bliss
 */

get_header(); ?>

<section id="our-services">
    <div class="innerlightbox">
        <div class="container">
            <?php
                $left_right = get_theme_mod( 'bb_wedding_bliss_layout_options','One Column');
                if($left_right == 'Left Sidebar'){ ?>
                <div class="row">
                    <div class="col-md-4">
                        <?php get_sidebar();?>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                       <h1 class="entry-title"><?php printf(esc_html('Results For: %s','bb-wedding-bliss'), '<span>' . esc_html(get_search_query()) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                          while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', get_post_format() ); 
                          endwhile;
                          else :
                            get_template_part( 'no-results' ); 
                          endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'bb-wedding-bliss' ),
                                    'next_text'          => __( 'Next page', 'bb-wedding-bliss' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-wedding-bliss' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                </div>
            <?php }else if($left_right == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <h1 class="entry-title"><?php printf(esc_html('Results For: %s','bb-wedding-bliss'), '<span>' . esc_html(get_search_query()) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content', get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'bb-wedding-bliss' ),
                                    'next_text'          => __( 'Next page', 'bb-wedding-bliss' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-wedding-bliss' ) . ' </span>',
                                ) );
                            ?>
                         </div> 
                    </div>
                    <div class="col-md-4">
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php }else if($left_right == 'One Column'){ ?>
                <h1 class="entry-title"><?php printf(esc_html('Results For: %s','bb-wedding-bliss'), '<span>' . esc_html(get_search_query()) . '</span>' ); ?></h1>
                <?php if ( have_posts() ) :
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', get_post_format() ); 
                    endwhile;
                    else :
                        get_template_part( 'no-results' ); 
                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'bb-wedding-bliss' ),
                            'next_text'          => __( 'Next page', 'bb-wedding-bliss' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-wedding-bliss' ) . ' </span>',
                        ) );
                    ?>
                </div> 
            <?php }else if($left_right == 'Three Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h1 class="entry-title"><?php printf(esc_html('Results For: %s','bb-wedding-bliss'), '<span>' . esc_html(get_search_query()) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                          while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/content', get_post_format() ); 
                          endwhile;
                          else :
                            get_template_part( 'no-results' ); 
                          endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'bb-wedding-bliss' ),
                                    'next_text'          => __( 'Next page', 'bb-wedding-bliss' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-wedding-bliss' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                    <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                </div>
            <?php }else if($left_right == 'Four Columns'){ ?>
                <div class="row">
                    <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <h1 class="entry-title"><?php printf(esc_html('Results For: %s','bb-wedding-bliss'), '<span>' . esc_html(get_search_query()) . '</span>' ); ?></h1>
                        <?php if ( have_posts() ) :
                          /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content', get_post_format() ); 
                            endwhile;
                            else :
                                get_template_part( 'no-results' ); 
                            endif; 
                        ?>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'bb-wedding-bliss' ),
                                    'next_text'          => __( 'Next page', 'bb-wedding-bliss' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-wedding-bliss' ) . ' </span>',
                                ) );
                            ?>
                        </div> 
                    </div>
                    <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
                    <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
                </div>
            <?php }else if($left_right == 'Grid Layout'){ ?>
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <h1 class="entry-title"><?php printf(esc_html('Results For: %s','bb-wedding-bliss'), '<span>' . esc_html(get_search_query()) . '</span>' ); ?></h1>
                        <div class="row">
                            <?php if ( have_posts() ) :
                              /* Start the Loop */
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'template-parts/grid-layout' ); 
                                endwhile;
                                else :
                                    get_template_part( 'no-results' ); 
                                endif; 
                            ?>
                        </div>
                        <div class="navigation">
                            <?php
                                // Previous/next page navigation.
                                the_posts_pagination( array(
                                    'prev_text'          => __( 'Previous page', 'bb-wedding-bliss' ),
                                    'next_text'          => __( 'Next page', 'bb-wedding-bliss' ),
                                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-wedding-bliss' ) . ' </span>',
                                ) );
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3"><?php get_sidebar();?></div>
                </div>
            <?php }?>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>