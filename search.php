<?php
/**
 * The template for displaying search results pages.
 *
 * @package agency-x
 */

get_header(); ?>
<section id="blog" class="section page">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
      <?php if ( have_posts() ) : ?>
                
                <h4><?php 
                  /* translators: %s: serach query */
                printf( esc_html__( 'Search Results for: %s', 'agency-x' ), '<span>' . get_search_query() . '</span>' ); ?></h4>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                /**
                 * Run the loop for the search to output the results.
                 * If you want to overload this in a child theme then include a file
                 * called content-search.php and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'search' );
                ?>

            <?php endwhile; ?>

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>
      </div>
      <div class="col-md-4">
        <?php get_sidebar(); ?>        
      </div>
    </div>
  </div>
</section>