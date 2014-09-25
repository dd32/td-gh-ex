<?php get_header();
global $cx_framework_options; ?>

    <div id="primary" class="content-area home-loop-columns-four<?php echo ( ( is_home() ) && ( $cx_framework_options['cx-options-blog-blocks'] == 1 ) ) ? ' content-area-full' : ''; ?>">
        <main id="main" class="site-main" role="main">
            
        <?php if ( ( is_home() ) && ( $cx_framework_options['cx-options-blog-blocks'] == 0 ) ) : ?>
            
            <header class="page-header">
                <h1 class="page-title"><?php echo wp_kses_post( $cx_framework_options['cx-options-blog-title'] ) ?></h1>
                
                <?php if ( function_exists( 'bcn_display' ) ) : ?>
                    <div class="cx-breadcrumbs">
                        <?php bcn_display(); ?>
                    </div>
                <?php endif; ?>
                
            </header><!-- .page-header -->
            
        <?php endif; ?>
            
        <?php electa_exclude_selected_blog_categories(); ?>

        <?php if ( have_posts() ) : ?>
        
            <div class="blocks-wrap blocks-wrap-remove">

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                
                    <?php if ( is_home() ) : ?>
                        
                        <?php if ( $cx_framework_options['cx-options-blog-blocks'] == 1 ) : ?>
                        
                            <?php
                            // Blocks Layout
                            get_template_part( 'content', 'blocks' ); ?>
                            
                        <?php else: ?>
                            
                            <?php
                            // Standard Layout
                            get_template_part( 'content', get_post_format() ); ?>
                            
                        <?php endif; ?>
                        
                    <?php else : ?> <?php /* is_home() else : */ ?>
                        
                        <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() ); ?>
                        
                    <?php endif; ?> <?php /* is_home() endif ; */ ?>
                    
                <?php endwhile; ?>
                
            </div>
            
            <?php electa_paging_nav(); ?>

        <?php else : ?> <?php /* have_posts() else : */ ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?> <?php /* have_posts() endif : */ ?>

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php if ( ( is_home() ) && ( $cx_framework_options['cx-options-blog-blocks'] == 1 ) ) : ?>
    
        <!-- Do Nothing -->
    
    <?php else : ?>
    
        <?php get_sidebar(); ?>
    
    <?php endif; ?>
    
<?php get_footer(); ?>