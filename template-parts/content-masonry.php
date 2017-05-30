<?php
/**
 * Template part for displaying posts in masonry view.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aquaparallax
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sample-maso'); ?>> 

<div class="col-md-6 col-sm-6 single-masonary-post">

<div class="aqa-single-blog">

<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<p class="blog-auther"><i class="fa fa-user"></i> <?php $username = get_userdata( $post->post_author ); ?>    
<a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>"><?php echo esc_html( $username->user_nicename ); ?></a></p>

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<img src="<?php echo esc_url( $url ); ?>" class="img-responsive blog-manso-one">

<p class="post-discription"><?php the_excerpt(); ?></p>

<p class="blog-single-btn"><a href="<?php the_permalink(); ?>"> <?php echo esc_html_e( 'Read More', 'aquaparallax' ); ?></a></p>
</div>
</div> 

</article>