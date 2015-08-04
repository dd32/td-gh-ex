<?php
/**
 * The Blog Content (mostly used on archive pages).
 * 
 * @todo Here sidebar is called in a different way then other archive files. Modify either this or others.
 * @package Afford
 */
?>

<div id="content-section" class="content-section grid-col-16 clearfix">
    

    <div class="inner-content-section grid-pct-65">
        
            <?php if( have_posts() ) : ?>
        
                <div class="loop-container-section clearfix">

                <?php
                    // Here starts the loop
                    while( have_posts() ): the_post();
                        get_template_part( 'loop', 'home' );
                    endwhile;
                ?>
                </div>

                <?php afford_archive_nav(); // Calls the 'Previous' and 'Next' Post Links. ?>

            <?php else : ?>

                    <?php afford_404_show(); // Function dedicated for handling empty queries. ?>

            <?php endif;?>

        
    </div><!-- inner-content-section ends -->

<?php get_sidebar() ?>

</div><!-- Content-section ends here -->
