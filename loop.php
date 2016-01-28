<?php
/*
 * Template for displaying the loop
 * 
 * @package Actuate
 */
global $actuate_loop_count;
?>
<?php if(!isset($actuate_loop_count)){ $actuate_loop_count = 1; } else { $actuate_loop_count++;} ?>
<?php if($actuate_loop_count % 3 == 1): ?>
<div class="loop-couple-section clearfix">
<?php endif ?>
<div class="loop-section-col grid-float-left">
    <div class="loop-section">
        <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
            <?php
                $image_big = '';
                $image_big = wp_get_attachment_image_src(get_post_thumbnail_id(), 'actuateThumb', false);
                if($image_big){
                    list($src_big, $width_big, $height_big) = $image_big;
                }
            ?>
            <?php if ( has_post_thumbnail()  && !actuate_get_option('disable_thumb')): ?>
                <div class="loop-thumbnail-section">
                    <div class="loop-thumbnail-overlay"  style="<?php if($image_big) { echo "background-image:url('". $src_big ."');";} ?>">
                    </div>
                    <div class="loop-thumbnail-post-category">
                    <?php
                        $actuate_loop_categories = get_the_category();
                        if($actuate_loop_categories) {
                            $output = '';
                            $item = 1;
                            foreach($actuate_loop_categories as $cat) {
                                if($item > 1) {
                                    $output .= ',';
                                }
                                $item++;
                                $output .= $cat->name;
                            }
                            echo trim($output, ' ');
                        }
                    ?>
                    </div>
                </div>
            <?php endif ?>
            <div class="loop-content-section">
                <div class="loop-post-title">
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo __('Permalink to', 'actuate'). ' ' ?><?php the_title_attribute() ?>"><?php the_title() ?></a></h1>
                    <?php if(!actuate_get_option('disable_blog_p_meta')): ?>
                       <div class="loop-post-meta">
                            <span><?php _e('Written on', 'actuate') ?> </span><a href="<?php echo get_the_permalink() ?>" rel="bookmark"><span class="loop-meta-date"><?php echo get_the_time('M, d, Y') ?></span></a>
                            <span><?php _e('by', 'actuate') ?> </span><span class="loop-meta-author"><?php the_author_posts_link() ?></span>
                            <?php if(!actuate_get_option('disable_blog_p_meta_comments')): ?>
                            <span class="loop-meta-comments"> | <?php comments_popup_link( __('No comments yet', 'actuate'), __('1 comment','actuate'), '% '.__('comments','actuate'), 'comments-link', __('No Comments','actuate')); ?></span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="loop-post-excerpt clearfix">
                    <div class="loop-post-text grid-col-16">
                        <?php the_excerpt() ?>
                    </div>
                    <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'actuate') . '</span>', 'after' => '</div>')) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($actuate_loop_count % 3 == 0 || $actuate_loop_count == $wp_query->post_count): ?>
</div> <!-- Loop couple section ends -->
<?php endif ?>