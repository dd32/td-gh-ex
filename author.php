<?php
/**
 * Template for displaying author archive page.
 * 
 * @package Actuate
 */
?>
<?php get_header() ?>
<div class="archive-meta-container">
    <div class="archive-head">
        <h1 class="page-title author"><?php _e('Author Archives', 'actuate') ?></h1>
    </div>
    <div class="archive-description">
        <?php
        if (get_the_author_meta('description')) :
            printf('%s', "<p>" . get_the_author_meta('description') . "</p>");
        else :
            printf(__('Archive of the posts written by author :', 'actuate').' %s.', get_the_author());
        endif;
        ?>
    </div>
</div><!-- Archive Meta Container ends -->

<div id="content-section" class="content-section grid-col-16">
    <div class="inner-content-section grid-pct-65">        
        <?php if ( have_posts() ) : the_post() ?>
            <div class="loop-container-section clearfix">
                <?php
                    // Here starts the loop
                    rewind_posts();
                    while (have_posts()): the_post();
                        get_template_part('loop', 'archive');
                    endwhile;
                ?>
            </div><!-- loop-container-section ends -->
            <?php actuate_archive_nav() // Calls the 'Previous' and 'Next' Post Links ?>
        <?php else : ?>
            <?php actuate_404_show() // Function dedicated for handling empty queries. ?>
        <?php endif ?>
    </div><!-- inner-content-section ends -->
</div><!-- Content-section ends here -->
<?php get_footer() ?>