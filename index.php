<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package agency-x
 */

get_header();?>



<section id="blog" class="section page">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <div class="row">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php                       
                        get_template_part( 'template-parts/content' );
                    ?>
                <?php endwhile; ?>
            </div>
            <div class="row">
                    <div class="col-md-12">
                        <!-- Pagination -->
                        <ul class="pagination">                            
                            <?php
                                global $wp_query;
                                $big = 999999999; // need an unlikely integer
                                echo paginate_links( array(
                                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                    'format' => '?paged=%#%',
                                    'current' => max( 1, get_query_var('paged') ),
                                    'total' => $wp_query->max_num_pages,
                                    'prev_text' => "<span class='fa fa-angle-left'></span>",
                                    'next_text' => "<span class='fa fa-angle-right'></span>",
                                ) );
                            ?>
                        </ul>
                        <!--/ End Pagination -->
                    </div>
                </div>
        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
        
    <div class="col-sm-4"><?php get_sidebar(); ?></div>
   </div>
</section>
<?php get_footer(); ?>