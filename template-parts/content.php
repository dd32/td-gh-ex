<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aquaparallax
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="row">  

<div class="col-md-12">

<div class="aqa-single-blog">
		
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<figure>

     <?php the_post_thumbnail( 'full' ); ?>

                         </figure>

<p class="post-discription"><?php the_excerpt(); ?></p>

<div class="aqa-blog-meta">

<span class="aqa-blog-user"><i class="fa fa-user"></i><?php $username = get_userdata( $post->post_author ); ?>    
<a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>"><?php echo esc_html( $username->user_nicename ); ?></a></span>

<span class="aqa-blog-date"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></span>

<span class="aqa-blog-cat"><i class="fa fa-folder"></i><?php the_category(', '); ?>
</span>

<span class="aqa-blog-cmnt"><i class="fa fa-comment"></i><a href="<?php comments_link(); ?>" target="_blank"><?php echo esc_html_e( 'Leave a Comment', 'aquaparallax' ); ?>
</a></span>

</div>

<p class="blog-single-btn"><a href="<?php the_permalink(); ?>"><?php echo esc_html_e( 'Read More', 'aquaparallax' ); ?></a></p>


</div>

</div>

</div>

</article><!-- #post-## -->
