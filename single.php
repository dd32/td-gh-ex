<?php
/*
 * Template for displaying single posts.
 * 
 * @package Actuate
 */
?>
<?php get_header() ?>

<?php if( have_posts() ) : while( have_posts() ): the_post() ?>

<div id="content-section" class="content-section grid-col-16 clearfix">
    <div id="post-<?php the_ID() ?>" <?php post_class('inner-post-section') ?>>
	
        <div class="post-title">
            <?php if ( is_front_page() ): ?>
                <h1 class="front-page"><?php the_title() ?></h1>
            <?php else: ?>
                <h1 class="inner-page"><?php the_title() ?></h1>
            <?php endif ?>

            <?php if(!actuate_get_option('disable_post_meta')): ?>
            <div class="post-meta">
                <?php
                    echo '<span class="entry-date">' . get_the_date() . '</span>';
                    echo '<span class="meta-author-url">, By <span class="author vcard">';
                    the_author_posts_link();
                    echo '</span> </span>';
                    if(!comments_open()) { // Comments not open
                        if(get_comments_number()){ // Comments are more than zero
                            echo ' | <span class="post-meta-comments">'.get_comments_number(). ' '. __('Comments (Closed)', 'actuate').'</span>';
                        } else { // Comments are zero
                            echo ' | ' . __('Comments (Closed)', 'actuate');
                        }
                    } else { // Comments are open
                        echo ' | <span class="post-meta-comments">';
                        comments_number( '<a href='.get_comments_link().'>'.__('Leave a reply', 'actuate').'</a>', __('1 Comment', 'actuate'), '% '.__('Comments', 'actuate') );
                        echo '</span>';
                    } ?>
            </div>
        <?php endif ?>
        </div>

        <div class="post-content">
             <?php the_content() ?>
             <?php wp_link_pages(array('before' => '<div class="post-nav-link"><span>' . __('Pages:', 'actuate') . '</span>', 'after' => '</div>')) ?>
        </div>

        <div class="post-below-content">
            <?php edit_post_link( __( 'Edit', 'actuate' ), '<div class="edit-link">', '</div>' ) ?>
            <p class="tags-below-content"><?php the_tags( __( 'Tags: ', 'actuate' ) , ', ', '') ?></p>
        </div>

        <?php actuate_post_nav() ?>
        <?php comments_template( '', true ) ?>
    </div><!-- inner-content-section ends -->
    <?php get_sidebar() ?>
</div><!-- Content-section ends here -->
<?php endwhile ?>
<?php endif ?>
<?php get_footer() ?>