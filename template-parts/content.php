<?php $classes = array('post','text-center','wow','fadeInUp'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
              <div class="entry-header">
                  <h3 class="entry-title"><span class="center-block"><?php backyard_post_title(); ?></span></h3>
 <div class="entry-meta font-italic textcolor"><span class="text-uppercase"><?php the_author_posts_link() ?></span> -  <?php echo get_the_date(get_option( 'date_format' )); ?>  - <span>

<a href="#comments"><i class="fa fa-comment-o"></i><?php comments_number('No Comments', 'One Comment', '% Comments'); ?></a></span>

</span></div>

<!--entry-meta--> 

              </div>

              <!--entry-header-->

              <div class="post-media">
              
<a href="<?php the_permalink()  ?>" title="<?php echo esc_attr(get_the_title()); ?>">
<?php the_post_thumbnail('backyard-post-thumb', array('class'=>'img-responsive','alt' => get_the_title() )); ?></a> 
</div>
 <!--post-media-->
<div class="entry-content"> <?php if ( is_single() ) : else: ?><a href="<?php the_permalink();?>" class="btn fillbg"><?php _e('READ MORE','backyard'); ?></a><?php endif; ?>
<?php if (is_single() ) : ?>
<?php the_content(); ?>
<div class="the_tags"><?php the_tags(); ?></div>
<!--audio-row-->
<?php
$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=> 3 // Number of related posts that will be shown.
);
   $my_query = new wp_query( $args );
   if($my_query->have_posts()) :
?>

<div class="related-post">
<h3 class="title2">related post</h3>
<div class="row">
<?php while( $my_query->have_posts() ) : $my_query->the_post();?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="related-col"> <span>
<a href="<?php the_permalink()  ?>" title="<?php echo esc_attr(get_the_title()); ?>">
<?php the_post_thumbnail('backyard-related-post', array('class'=>'img-responsive','alt' => get_the_title() )); ?>
</a></span>
<h6><a href="<?php the_permalink()  ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></a></h6>
<p class="date"><?php the_author_posts_link(); ?>  -  <?php echo get_the_date(get_option( 'date_format' )); ?> </p>
</div>
</div>
<?php endwhile;  ?> 
</div>
</div>
<?php endif; } ?>
<?php else: ?>
<?php the_excerpt(); ?>
<?php endif; ?>
</div>
<!--entry-content--> 
</article>