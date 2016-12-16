<?php
/**
 * The template for displaying the featured posts.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
$biography_page = $bassist_theme_options['biography_slug'];
?>

<section id="biography" class="biography-section">
    <div class="inner">
<?php
   $biography = new WP_Query( array( 'pagename' => $biography_page ) );   

    if ($biography->have_posts()) :
        while ( $biography->have_posts() ): $biography->the_post(); ?>
        <h2 class="section-title"><?php the_title(); ?></h2>
        <div class="entry-content">
           <?php the_content();
        endwhile;
        wp_reset_postdata();
    endif;
?>

    </div><!--/inner-->

</section><!--/biography-section-->

