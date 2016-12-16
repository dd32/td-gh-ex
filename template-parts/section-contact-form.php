<?php
/**
 * The template for displaying the posts with small formats (aside, link, quote and status).
 *
 * @package Bassist
 * @since Bassist 1.0
 */
$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
$contact_page = $bassist_theme_options['contact_page_slug'];
?>

<section id="contact" class="contact-section">
    <div class="inner">

    <?php dynamic_sidebar('contact-area') ?>

    <?php
   $contact = new WP_Query( array( 'pagename' => $contact_page ) );   

    if ($contact->have_posts()) :
        while ( $contact->have_posts() ): $contact->the_post(); ?>
        <h2 class="section-title"><?php the_title(); ?></h2>
        <div class="entry-content">
           <?php the_content();
        endwhile;
        wp_reset_postdata();
    endif;
?>

    
    </div>

</section><!--/video-format-section-->

