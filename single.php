<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
?>
    <div class="container-fluid">
      <?php if ( has_post_thumbnail() ): ?>
        <div class="ct-featured-transparent ct-featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>')">
        </div><!-- /.ct-featured-image -->
      <?php endif; ?>
        <div class="row">
            <div class="twelve columns">
              <p></p>
            </div><!-- /.twelve columns -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
         <div class="container">
             <div class="row">
                 <div class="nine columns">
                    <?php
                        if ( have_posts() ) :

                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content/content', 'single' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                            endwhile; // End of the loop.
                        else :

                            get_template_part( 'template-parts/content/content', 'none' );

                        endif;
                    ?>
             </div><!-- /.nine columns -->
             <?php get_sidebar(); ?>
         </div><!-- /.row -->
     </div><!-- /.container -->
<?php
get_footer();

