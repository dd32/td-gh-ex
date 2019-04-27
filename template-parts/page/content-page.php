<?php
/**
 *  Template part for displaying page content in page.php.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-wrapper">
        <div class="entry-header">
            <div class="entry-thumb">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
            </div>
        </div>

        <div class="entry-contents">

            <div class="entry-summary">
                <?php the_content(); ?>
            </div>

            <?php
                wp_link_pages(array(
                    'before' => '<div class="page-links">'.__('Pages:', "bnw-theme"),
                    'after' => '</div>',
                    'link_before' => '<span class="page-links-number">',
                    'link_after' => '</span>',
                ));
            ?>

        </div>
        
        <div class="entry-footer">
            
        </div>

        
        
    </div>
</article>
