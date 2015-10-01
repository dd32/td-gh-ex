<?php 
/*
*Template for displaying single post or page.
*
*@package -> Wordpress
*@sub-package -> afia
*@since -> V 1.0.0
*/ 
?>
<?php get_header();?>
<?php 
the_post();
?>
<header id = "ex-header">
<h2 class = 'linkab title'><?php the_title();?></h2>
<hr />
<span class = "time"><img class = "time-pic" src = "<?php echo esc_url( get_stylesheet_directory_uri( '/' ) );?>/assets/img/time.png"><span class = 'linkab'><?php echo date("F j,Y",get_post_time());?></span></span> 
 | <span class = "author"><img class = "author-pic" src = "<?php echo esc_url( get_stylesheet_directory_uri( '/' ) );?>/assets/img/author.png"/> <span class = "linka"><?php the_author_posts_link();?></span></span>
<hr />
</header>
<div id = "pos-ex" class = "content-post">
<!-- featured image -->
    <?php if ( '' != get_the_post_thumbnail() ) { ?>
      <div class="featured-image thumbnail">
          <?php the_post_thumbnail('featured-single'); ?>
      </div>
    <?php } ?>
<?php 
$gte = get_the_content();
if($gte == ''):
_e('This post seems to contain nothing.','Afia');
else:
echo the_content();
endif;?>
</div>
<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'Afia'), 'after' => '</p></nav>')); ?>
<footer>
<hr />
<span class = "categ">
<img class = "cat-pic" src = "<?php echo esc_url( get_stylesheet_directory_uri( '/' ) );?>/assets/img/categories.jpg"/> <span class = "linka"><?php echo the_category(',');?></span>
</span>
<hr />
<div class = 'afia-tags'>
<?php
_e('Tags: ','Afia');
echo the_tags(',');
?>
</div>
<hr />
<div id = "post_nav">
<br /><br />
<div class="inline">
<span class = "previous_post"><?php 
if(get_previous_post_link()):
$format = __('Previous Post: ','Afia').'%link';
previous_post_link($format); 
endif;
?></span>
</div>
<div class="inline">
<span class = "next_post"><?php
if(get_next_post_link()):
$format = __('Next Post: ','Afia').'%link';
 next_post_link($format);
endif;
 ?></span>
</div>
</div>
<br />
</footer>
<div id = "post_comments">
<?php 
comments_template('/lib/content-comments.php');
?>
</div>
<?php 
$cat = get_the_category();
$title = get_the_title();
$cat_name = $cat[0]->name;
$cat_id = get_cat_ID($cat_name);
$query = new WP_Query();
$query->query('category_name='.$cat_name.'&posts_per_page=3&orderby="comment_count"');
if($query->have_posts()):?><h2 class = "tt"><?php
_e('Related Posts.','Afia');?></h2><?php
$i=0;
while($query->have_posts()): $query->the_post();
if($i<=2 && $i!=0)
{
	echo '  |  ';
}
?>
<span id = "related_post_title"><a href= "<?php the_permalink(); ?>"><?php afia_lowercase(the_title(),true);?></a></span>      
<?php
$i++;
endwhile;
endif;
?>
<?php get_footer();?>