<?php $classes = array('post','text-center','wow','fadeInUp'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
              <div class="entry-header">
              <div class="small-title"><?php the_category(); ?></div>
              <!--entry-text-->
   <h3 class="entry-title"><span class="center-block"><?php backyard_post_title(); ?></span></h3>
 <div class="entry-meta font-italic textcolor"><span class="text-uppercase"><?php the_author_posts_link() ?></span> -  <?php echo get_the_date(get_option( 'date_format' )); ?>  - <span>

<a href="#comments"><i class="fa fa-comment-o"></i><?php comments_number('No Comments', 'One Comment', '% Comments'); ?></a></span>

</span></div>

<!--entry-meta--> 

              </div>

              <!--entry-header-->

              <div class="post-media">
              <?php if(has_post_thumbnail($post->ID)){
	       $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
               $thumbnailURL = $image_url[0]; 
               $image = aq_resize($thumbnailURL, 750, 387, true);
               if(empty($image)) { $image = $thumbnailURL; }
               } else {
                        $thumbnailURL = backyard_post_default_placeholder();
                        $image = aq_resize($thumbnailURL, 750, 387, true);
                        if(empty($image)){$image=$thumbnailURL;}
                      }
?>
<a href="<?php the_permalink()  ?>" title="<?php echo esc_attr(get_the_title()); ?>">
<img src="<?php echo esc_url($image); ?>" class="img-responsive" alt="<?php echo esc_attr(get_the_title()); ?>" itemprop="image"></a> 
</div>
 <!--post-media-->
<div class="entry-content"> <?php if ( is_single() ) : else: ?><a href="<?php the_permalink();?>" class="btn fillbg"><?php _e('READ MORE','backyard'); ?></a><?php endif; ?>
<!--social-share-->
<?php if (is_single() ) : ?>
<?php the_content(); $author_id=$post->post_author; $get_user_meta=get_user_meta($author_id); ?>
<div class="the_tags"><?php the_tags(); ?></div>

<div class="audio-row">
<div class="social-share"><?php if(isset($get_user_meta['facebook'][0]) && $get_user_meta['facebook'][0]!=''){ echo '<a href="'.$get_user_meta['facebook'][0].'" class="fb"><i class="fa fa-facebook"></i></a>'; } ?> <?php if(isset($get_user_meta['twitter'][0]) && $get_user_meta['twitter'][0]!=''){ echo '<a href="'.$get_user_meta['twitter'][0].'" class="tw"><i class="fa fa-twitter"></i></a>'; } ?> <?php if(isset($get_user_meta['instagram'][0]) && $get_user_meta['instagram'][0]!=''){ echo '<a href="'.$get_user_meta['instagram'][0].'" class="instagram"><i class="fa fa-instagram"></i></a>'; } ?> <?php if(isset($get_user_meta['google'][0]) && $get_user_meta['google'][0]!=''){ echo '<a href="'.$get_user_meta['google'][0].'" class="google"><i class="fa fa-google-plus"></i></a>'; } ?> </div>
<?php echo get_avatar( get_the_author_meta($author_id), 91 ); ?>
<h3 class="title2"><?php echo the_author_meta( 'user_nicename' , $author_id ); ?></h3>
<p><?php if(isset($get_user_meta['description'][0]) && $get_user_meta['description'][0]!=''){ echo $get_user_meta['description'][0];} ?></p>
</div>  
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
<?php
    if (has_post_thumbnail( $post->ID ) ) {
    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
    $thumbnailURL = $image_url[0]; 
    $image = aq_resize($thumbnailURL, 230, 166, true);
    if(empty($image)) { $image = $thumbnailURL; }
  } else {
        $thumbnailURL = backyard_post_default_placeholder();
        $image = aq_resize($thumbnailURL, 230, 166, true);
        if(empty($image)) { $image = $thumbnailURL; }
         }
?>
<a href="<?php the_permalink()  ?>" title="<?php echo esc_attr(get_the_title()); ?>">
<img src="<?php echo esc_url($image); ?>" class="img-responsive" alt="<?php echo esc_attr(get_the_title()); ?>" itemprop="image"></a></span>
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