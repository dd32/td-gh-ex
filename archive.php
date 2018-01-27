<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
            <div class="col-md-4">
                <?php get_sidebar();?>
            </div>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-8 col-sm-8 col-xs-12'); ?>>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                  /* Start the Loop */
                  while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content' ); 
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
        <?php }else if($left_right == 'Right Sidebar'){ ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-8 col-sm-8 col-xs-12'); ?>>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content' ); 
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
        <?php }else if($left_right == 'One Column'){ ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 col-xs-12'); ?>>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content' ); 
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
        <?php }else if($left_right == 'Three Columns'){ ?>
            <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 col-xs-12'); ?>>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                  /* Start the Loop */
                  while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content' ); 
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
        <?php }else if($left_right == 'Four Columns'){ ?>
            <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-3 col-sm-3 col-xs-12'); ?>>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                  /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content' ); 
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
        <?php }else if($left_right == 'Grid Layout'){ ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-9 col-sm-9 col-xs-12'); ?>>
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                  /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/grid-layout' ); 
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
            <div class="col-md-3">
                <?php get_sidebar();?>
            </div>
        <?php }?>
          <div class="clearfix"></div>
      </div>
    </div>
</section>

<?php get_footer(); ?>