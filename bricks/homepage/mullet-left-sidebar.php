<?php get_header(); ?>
<?php if ( $paged < 2 ) { ?>
<?php $my_query = new WP_Query('showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID; ?>

<div id="main-right">
<h3 class="post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>  
<div class="metabox">Posted by <?php the_author_posts_link () ?> | 
Filed under <?php the_category(', ') ?> | 
<?php the_time('M j, Y') ?> | 
<?php the_tags('Tags: ', ', ', '<br/>'); ?>
<?php edit_post_link('Edit', '', ' | '); ?>
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>	
</div>
<?php the_content(); wp_link_pages('<p><strong>Pages:</strong>', '</p>', 'number'); ?>
<?php endwhile; ?>
<?php if ($bxx_show_advert_one == "yes") {?>
<div align="center">
<?php $my_name = "$bxx_main_post_type";
if ( $bxx_advert_one == "" ) {
echo 	'<div  class="advert-one" > 
</div>'; 
} else {
 include (TEMPLATEPATH . '/scripts/advert-one.php'); 
}
?>
</div>
<?php }?>
<?php query_posts('caller_get_posts=1'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
<h3 class="post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>  
<div class="metabox">Posted by <?php the_author_posts_link () ?> | 
Filed under <?php the_category(', ') ?> | 
<?php the_time('M j, Y') ?> | 
<?php the_tags('Tags: ', ', ', '<br/>'); ?>
<?php edit_post_link('Edit', '', ' | '); ?>
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>	
</div>
<?php the_excerpt(); ?>
<?php trackback_rdf(); ?>
<br style="clear:both" />&nbsp; 
<?php endwhile; endif; ?>
<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
</div></div>
<?php } else { ?>
<div id="main-right">
<?php if (have_posts()) : while (have_posts()) : the_post();
if( $post->ID == $do_not_duplicate ) continue; update_post_caches($posts); ?>
<h3 class="post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>  
<div class="metabox">Posted by <?php the_author_posts_link () ?> | 
Filed under <?php the_category(', ') ?> | 
<?php the_time('M j, Y') ?> | 
<?php the_tags('Tags: ', ', ', '<br/>'); ?>
<?php edit_post_link('Edit', '', ' | '); ?>
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>	
</div>
<?php the_excerpt(); ?>
<?php endwhile; endif; ?>
<div class="navigation">
<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
</div></div>
<?php } ?>
 <div id="sidebar-left-one"><?php get_sidebar(); ?></div>
 <?php get_footer(); ?>