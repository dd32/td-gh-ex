
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>     
        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">   
            <!-- Your Post Query here -->
            <div class="post_title">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <div class="post_info">
                Posted in: <?php the_category(', '); ?>| Posted on:<?php the_time('M d, Y') ?> |
                <?php comments_popup_link('No Comments &raquo;', '1 Comment &raquo;', '% Comments &raquo;'); ?>
            </div>
            <div class="post_content">
                <div class="post_tumb">
                    <?php
                    if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                        the_post_thumbnail('featured');
                    }
                    ?>
                </div>
                <div class="post_text">
                    <?php the_excerpt(); ?>

                </div>

            </div>

        </div>
    <?php endwhile; ?>    
<?php endif; ?>
<div class="nav-previous">
    <?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts')); ?>
</div>
<div class="nav-next">
    <?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>')); ?>
</div>
<?php wp_link_pages(); ?>


