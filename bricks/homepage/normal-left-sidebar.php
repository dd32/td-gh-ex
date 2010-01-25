<?php get_header(); ?>
<div id="main-right">
<?php $post = $posts[0]; ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div <?php post_class(); ?>>
<h3 class="post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>  
<div class="metabox">Posted by <?php the_author_posts_link () ?> | <?php the_time('M j, Y') ?> | <?php the_tags('Tags: ', ', ', '<br/>'); ?><?php comments_popup_link('No Comments', '1 Comment', '% Comments '); ?></div>
<?php $my_name = "$bxx_main_post_type";
if ( $bxx_main_post_type == "content" ) {
echo 	the_content(); wp_link_pages('<p><strong>Pages:</strong>', '</p>', 'number');
} else {
  echo  the_excerpt();
}
?>
</div>			
<?php if ( $count == 0 ) : ?>
<?php  include (TEMPLATEPATH . '/scripts/advert-one.php'); ?>
<?php endif // $count == 2 ) ?>
<?php if ( $count == 4 ) : ?>
<?php endif // ( $count == 1 ) ?>
<?php $count++ ?>
<?php endwhile; ?>
<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
</div>
<?php else : ?>	
<?php endif; ?>
 </div>
 <div id="sidebar-left-one"><?php get_sidebar(); ?></div>
<?php get_footer(); ?>