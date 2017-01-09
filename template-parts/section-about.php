<?php
/**
 * The template for displaying the about section at the beginning of the front page.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
$about_page = $bassist_theme_options['about_slug'];
?>

<section id="about" class="about-section">
    <div class="inner">
<?php
   $about = new WP_Query( array( 'pagename' => $about_page ) );   

    if ($about->have_posts()) :
        while ( $about->have_posts() ): $about->the_post(); ?>
        <h2 class="section-title"><?php the_title(); ?></h2>
        <div class="entry-content">
           <?php the_content();
        endwhile;
        wp_reset_postdata();
    endif;
?>

    </div><!--/inner-->

</section><!--/about-section-->

