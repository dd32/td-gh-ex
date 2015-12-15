<?php
/**
 * Template for displaying tag archive posts.
 * 
 * @package Actuate
 */
?>
<?php get_header() ?>
<div class="archive-meta-container">
    <div class="archive-head">
        <h1><?php _e('Tag Archives', 'actuate') ?></h1>
    </div>
    <div class="archive-description">
        <?php
        $actuate_tag_description = term_description();
        if (!empty($actuate_tag_description)) {
            echo $actuate_tag_description;
        } else {
            printf(__('Archive of posts published in the tag:', 'actuate').' %s', single_term_title('', false));
        }
        ?>
    </div>

</div><!-- Archive Meta Container ends -->

<div id="content-section" class="content-section grid-col-16">
    <div class="inner-content-section grid-pct-65">
        <?php if( have_posts() ) : ?>
            <?php if( have_posts() ) : ?>
            <div class="loop-container-section clearfix">
                <?php
                    // Here starts the loop
                    while (have_posts()): the_post();
                        get_template_part('loop', 'tag');
                    endwhile;
                ?>
            </div><!-- loop-container-section ends -->
            <?php endif; ?>
            <?php actuate_archive_nav() // Calls the 'Previous' and 'Next' Post Links  ?>
        <?php else : ?>
            <?php actuate_404_show() // Function dedicated for handling empty queries. ?>
        <?php endif ?>
    </div><!-- inner-content-section ends -->
</div><!-- Content-section ends here -->
<?php get_footer() ?>