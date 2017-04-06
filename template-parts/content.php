<?php $classes = array('post','text-center','wow','fadeInUp'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
<div class="entry-header">
<h3 class="entry-title"><span class="center-block"><?php backyard_post_title(); ?></span></h3>
<div class="entry-meta font-italic textcolor"><span class="text-uppercase"><?php the_author_posts_link() ?></span> <?php esc_html_e('-','backyard'); ?> <?php echo get_the_date(get_option( 'date_format' )); ?>  <?php esc_html_e('-','backyard'); ?> <span>
<a href="#comments"><i class="fa fa-comment-o"></i><?php comments_number(__('No Comments','backyard'), __('One Comment','backyard'), '% Comments'); ?></a></span>
</span></div>
<!--entry-meta--> 
</div>
<!--entry-header-->
<div class="post-media">
<a href="<?php the_permalink()  ?>" title="<?php echo esc_attr(get_the_title()); ?>">
<?php the_post_thumbnail('backyard-post-thumb', array('class'=>'img-responsive','alt' => get_the_title() )); ?></a> 
</div>
 <!--post-media-->
<div class="entry-content"> <?php if (is_single()) : else: ?><a href="<?php the_permalink(); ?>" class="btn fillbg"><?php esc_html_e('READ MORE','backyard'); ?></a><?php endif; ?>
<?php if (is_single()): ?>
<?php the_content();
wp_link_pages( array(
'before'      => '<div class="page-links"><span class="page-links-title">'.__( 'Pages:', 'backyard').'</span>',
'after'       => '</div>',
'link_before' => '<span>',
'link_after'  => '</span>',
) );											
 ?>
<div class="the_tags"><?php the_tags(); ?></div>
<!--audio-row-->
<?php else: ?>
<?php the_excerpt(); ?>
<?php endif; ?>
</div>
<!--entry-content-->
</article>