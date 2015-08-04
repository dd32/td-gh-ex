<?php
/*
 * Template for displaying the loop
 * 
 * @package Afford
 */
global $afford_loop_count;
?>
<?php if(!isset($afford_loop_count)){ $afford_loop_count = 1; } else { $afford_loop_count++;} ?>
<?php if($afford_loop_count % 2 == 1): ?>
<div class="loop-couple-section clearfix">
<?php endif ?>
<div class="loop-section-col <?php echo apply_filters('afford_loop_section_col_class_filter', '', $afford_loop_count) ?>">
    <div class="loop-section">
        <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
             <div class="loop-post-title">

                <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo __('Permalink to', 'afford'). ' ' ?><?php the_title_attribute() ?>"><?php the_title() ?></a></h1>

                <div class="loop-post-meta">
                     <span><?php _e('Written on', 'afford') ?> </span><span class="loop-meta-date"><?php echo get_the_time('M, d, Y') ?></span>
                     <span><?php _e('by', 'afford') ?> </span><span class="loop-meta-author"><?php the_author_posts_link() ?></span>
                     <span class="loop-meta-comments"> | <?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'No Comments'); ?></span>
                </div>

             </div>

             <div class="loop-post-excerpt clearfix">
                  <?php if ( has_post_thumbnail() ) { ?>
                    <div class="loop-post-text grid-col-16">
                        <div class="loop-thumbnail"><?php the_post_thumbnail( 'affordThumb' ) ?></div>
                        <?php the_excerpt() ?>
                        <div class="read-more"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php _e('Read more', 'afford') ?></a></div>
                    </div>
                  <?php } else { ?>
                  <div class="loop-post-text grid-col-16">
                      <?php the_excerpt() ?>
                      <div class="read-more"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php _e('Read more', 'afford') ?></a></div>
                  </div>
                  <?php } ?>
                  <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'afford') . '</span>', 'after' => '</div>')) ?>
             </div>

        </div>
    </div>
</div>
<?php if($afford_loop_count % 2 == 0 || $afford_loop_count == $wp_query->post_count): ?>
</div> <!-- Loop couple section ends -->
<?php endif ?>