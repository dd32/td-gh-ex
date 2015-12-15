<?php
/**
 * Template for displaying archive page.
 * 
 * @package Actuate
 */
?>
<?php get_header() ?>

<div class="archive-meta-container">
    <div class="archive-head">
        <h1><?php if (is_day()) : ?>
                <?php printf(__('Daily Archives:', 'actuate').' %s', '<span>' . get_the_date() . '</span>'); ?>
            <?php elseif (is_month()) : ?>
                <?php printf(__('Monthly Archives:', 'actuate').' %s', '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'actuate')) . '</span>'); ?>
            <?php elseif (is_year()) : ?>
                <?php printf(__('Yearly Archives:', 'actuate').' %s', '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'actuate')) . '</span>'); ?>
            <?php else : ?>
                <?php _e('Blog Archives', 'actuate'); ?>
            <?php endif; ?></h1>
    </div>
    <div class="archive-description">
        <?php printf('<p>'.__('Archive of posts published in the specified', 'actuate').' %s </p>', actuate_date_text()) ?>
    </div>
</div><!-- Archive Meta Container ends -->

<div id="content-section" class="content-section grid-col-16">
    <div class="inner-content-section grid-pct-65">
        <?php if (have_posts()) : ?>
            <div class="loop-container-section clearfix">
                <?php
                    // Here starts the loop
                    while (have_posts()): the_post();
                        get_template_part('loop', 'archive');
                    endwhile;
                ?>
            </div><!-- loop-container-section ends -->
            <?php actuate_archive_nav() // Calls the 'Previous' and 'Next' Post Links.  ?>
        <?php else : ?>
            <?php actuate_404_show() // Function dedicated for handling empty queries.  ?>
        <?php endif; ?>
    </div> <!-- inner-content-section ends here -->
</div><!-- Content-section ends here -->
<?php get_footer() ?>