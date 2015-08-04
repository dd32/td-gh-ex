<?php
/**
 * Template for displaying category archive posts.
 * 
 * @package Afford
 */
?>
<?php get_header() ?>
<div class="archive-meta-container">
    <div class="archive-head">
        <h1><?php _e('Category Archives', 'afford') ?></h1>
    </div>
    <div class="archive-description">
        <?php
        $afford_category_description = term_description();
        if (!empty($afford_category_description)) {
            echo '<span>' . $afford_category_description . '</span>';
        } else {
            printf(__('Archive of posts published in the category: %s', 'afford'), single_cat_title('', false));
        }
        ?>
    </div>

</div><!-- Archive Meta Container ends -->


<div id="content-section" class="content-section grid-col-16">
    <div class="inner-content-section grid-pct-65">

            <?php if( have_posts() ) : ?>

                    <div class="loop-container-section clearfix">

                        <?php
                            // Here starts the loop
                            while (have_posts()): the_post();
                                get_template_part('loop', 'archive');
                            endwhile;
                        ?>                

                    </div><!-- loop-container-section ends -->
					
                    <?php afford_archive_nav() // Calls the 'Previous' and 'Next' Post Links. ?>

              <?php else : ?>

                    <?php afford_404_show() // Function dedicated for handling empty queries. ?>

              <?php endif;?>
                    
    </div><!-- inner-content-section ends -->
    
    <?php get_sidebar() ?>
    
</div><!-- Content-section ends here -->

<?php get_footer() ?>