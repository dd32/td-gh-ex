<?php get_header(); ?><?php global $options; foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?><div id="main">
 	  <?php  if (is_category()) { ?>
		<h1>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>
 	  <?php } elseif( is_tag() ) { ?>
		<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
 	  <?php  } elseif (is_day()) { ?>
		<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
 	  <?php  } elseif (is_month()) { ?>
		<h1>Archive for <?php the_time('F, Y'); ?></h1>
 	  <?php } elseif (is_year()) { ?>
		<h1>Archive for <?php the_time('Y'); ?></h1>
	  <?php  } elseif (is_author()) { ?>
		<h1>Author Archive</h1>
 	  <?php  } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1>Blog Archives</h1>
 	<br style="clear:both" />&nbsp; 
 	 <?php } ?>	
<?php $post = $posts[0];?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<h3 class="post-title"> <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php the_title(); ?></a></h3>  
<div class="metabox">Posted by <?php the_author_posts_link () ?> | Filed under <?php the_category(', ') ?> | <?php the_time('M j, Y') ?> | <?php the_tags('Tags: ', ', ', '<br/>'); ?><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
<p><?php the_excerpt(); ?></p>
<?php if ( $count == 0 ) : ?>
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
<?php get_sidebar(); ?></div>
<?php get_footer(); ?>