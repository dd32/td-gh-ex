<?php
/**
 * Template Name: Blog Template
 * Description: A Page Template for Blog
 */

get_header(); ?>

<section id="primary" class="content-area col-md-8 col-sm-12 col-xs-12 <?php echo blue_planet_layout_setup_class(); ?>">

    <main id="main" class="site-main" role="main">
        <?php
        global $more, $wp_query, $post, $paged;
        $more = 0;

        if ( get_query_var( 'paged' ) ) {

            $paged = get_query_var( 'paged' );

        }
        elseif ( get_query_var( 'page' ) ) {

            $paged = get_query_var( 'page' );

        }
        else {

            $paged = 1;

        }

        $blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged ) );
        $temp_query = $wp_query;
        $wp_query = null;
        $wp_query = $blog_query;

        if ( $blog_query->have_posts() ) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>

            <?php while ( $blog_query->have_posts() ) : $blog_query->the_post();  ?>
                <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to overload this in a child theme then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', get_post_format() );
                ?>
            <?php endwhile; ?>
            <?php blue_planet_paging_nav(); ?>
            <?php $wp_query = $temp_query  ; ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>


        <?php endif; ?>

    </main>

</section>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
