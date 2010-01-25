<?php get_header(); ?>
<div id="main">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="post-container">
<h3 class="post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>  
<div class="metabox">Posted by <?php the_author_posts_link () ?> | <?php the_time('M j, Y') ?> | <?php the_tags('Tags: ', ', ', '<br/>'); ?><?php comments_popup_link('No Comments', '1 Comment', '% Comments '); ?></div>
<?php the_content(); ?>
<?php wp_link_pages('<p><strong>Pages:</strong>', '</p>', 'number'); ?>
<div class="advert-x">
<?php  include (TEMPLATEPATH . '/scripts/advert-one.php'); ?>
</div>
<div id="comment-land">
<?php comments_template();?>
</div></div>
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
 </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>