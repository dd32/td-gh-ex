<?php
/**
 * Template part for displaying post details.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Aquaparallax
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h2><?php the_title() ?></h2>


		
<div class="entry-thumbnail">
		<?php the_post_thumbnail( 'full' ); ?>
</div>
  
  <p class="blog-cat"><i class="fa fa-user"></i><?php $username = get_userdata( $post->post_author ); ?>    
    <a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>"><?php echo esc_html( $username->user_nicename ); ?></a>
  <span class="aqa-blog-cat"><i class="fa fa-folder"></i>  <?php the_category(', '); ?></span>
   <?php $tags_list = the_tags(' ',' , '); if ( $tags_list ) { ?> <span class="aqa-blog-cat"><i class="fa fa-folder"></i>  <?php //echo $tags_list;  ?>
   </span><?php } ?></p>
	
<ul class="blog-page-social-icons">
    <li class="blog-share"><a href="#0">+</a></li>
    <p class="share-txt"><?php echo esc_html_e( 'Share', 'aquaparallax' ); ?></p> 
	 <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li> 
    <li><a href="https://twitter.com/intent/tweet?url=<?php echo esc_url( get_permalink() ); ?>&text=<?php the_title(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>  
    <li><a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>  
    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>&title=<?php the_title(); ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>  
    <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink() ); ?>&media=<?php echo esc_url( get_the_post_thumbnail_url() ); ?>&description=<?php the_title(); ?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
</ul>

	<div class="entry-content">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

</article><!-- #post-## -->
