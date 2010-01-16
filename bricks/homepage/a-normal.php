<?php get_header(); ?>
<?php global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<div id="main">
<?php $post = $posts[0]; ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div <?php post_class(); ?>>
<h3 class="post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>  
<div class="metabox">Posted by <?php the_author_posts_link () ?> | 
Filed under <?php the_category(', ') ?> | 
<?php the_time('M j, Y') ?> | 
<?php the_tags('Tags: ', ', ', '<br/>'); ?>
<?php edit_post_link('Edit', '', ' | '); ?>
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>	
</div>
<br>
<?php $my_name = "$bxx_main_post_type";
if ( $bxx_main_post_type == "content" ) {
echo 	the_content(); wp_link_pages('<p><strong>Pages:</strong>', '</p>', 'number');
} else {
  echo  the_excerpt();
}
?>
</div>			
<?php if ( $count == 0 ) : ?>

<?php if ($bxx_show_advert_one == "yes") {?>
<div align="center">
<?php 
if ( $bxx_advert_one == "" ) {
echo 	'<div  class="advert-one" > 

</div>'; 
} else {
 include (TEMPLATEPATH . '/scripts/advert-one.php'); 
}
?>
</div>
<?php }?>







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
<div style="padding:0px 0px 0px 90px;"><h2 class="center"><?php echo  $bxx_404_title;?></h2><p class="center"><?php echo  $bxx_404_text;?></p>
</div>		
<?php endif; ?>
 </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>