<?php get_header(); ?>
 
    <div id="content">
        <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
         
    <?php $post = $posts[0]; ?>
      <?php /* If this is a category archive */ if (is_category()) { ?>
        <h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category:</h2>
      <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
      <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h2>Archive for <?php the_time('F jS, Y'); ?>:</h2>
      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h2>Archive for <?php the_time('F, Y'); ?>:</h2>
      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h2>Archive for <?php the_time('Y'); ?>:</h2>
      <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h2>Author Archive</h2>
      <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h2>Blog Archives</h2>
    <?php } ?>
         
        <div class="post">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
 
            <div class="entry">
            <?php the_content(); ?>
 
                <p class="postmetadata">
                <?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
                <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' , ', ''); ?>
                </p>
 
            </div>
 
        </div>
         
<?php endwhile; ?>
 
    <div class="navigation">
        <?php posts_nav_link(); ?>
    </div>
 
<?php endif; ?>
 
</div>

<?php get_sidebar(); ?>
<?php get_template_part( 'sidebar2'); ?>
<?php get_footer(); ?>