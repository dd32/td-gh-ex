<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();

if ( have_posts() ) :
?>

    <div class="container">
        <div class="row ">
            <div class="nine columns">
                <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content/content' );

                    endwhile; // End of the loop.
                ?>
            </div><!-- /.nine .columns -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <?php else :

            get_template_part( 'template-parts/content/content', 'none' );

        endif;
        // Pagination
        get_template_part( 'template-parts/pagination/pagination', get_post_format() );
    ?>

<?php
get_footer();
