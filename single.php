<?php get_header(); ?><?php global $options; foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?><?php get_sidebar(); ?>
<div id="main">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="post-container"><h3 class="post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>  
<div class="metabox">Posted by <?php the_author_posts_link () ?> | Filed under <?php the_category(', ') ?> | <?php the_time('M j, Y') ?> | <?php the_tags('Tags: ', ', ', '<br/>'); ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div><?php the_content(); ?><?php wp_link_pages('<p><strong>Pages:</strong>', '</p>', 'number'); ?>
<?php if ($bxx_show_advert_one == "yes") {?>
<div align="center"><?php $my_name = "$bxx_main_post_type";
if ( $bxx_advert_one == "" ) {
echo 	'<div  class="advert-one" > 
</div>'; 
} else {
 include (TEMPLATEPATH . '/scripts/advert-one.php'); 
}
?>
</div><?php }?>
</div><div id="comment-land"><?php comments_template();?></div><?php endwhile; ?></div><?php else : ?>
<div style="padding:0px 0px 0px 90px;"><h2 class="center"><?php echo  $bxx_404_title;?></h2>
<p class="center"><?php echo  $bxx_404_text;?></p></div>		
<?php endif; ?><?php get_footer(); ?>