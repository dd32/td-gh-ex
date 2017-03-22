<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Ecommerce Store
 */

get_header(); ?>

<div class="container">
    <div class="middle-align content_sidebar">
        <div class="col-md-9" id="content-tc">
            <div class="site-main" id="sitemain">
                <?php if ( have_posts() ) : ?>
                    <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'bb-ecommerce-store' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_content(); ?>
                    <?php endwhile; ?>
                    <div class="clearfix"></div>
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                            'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
                        ) );
                    ?>
                <?php else : ?>
                    <?php get_template_part( 'no-results', 'search' ); ?>
                <?php endif; ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="col-md-3">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php get_footer(); ?>