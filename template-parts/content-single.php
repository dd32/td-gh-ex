<?php
/**
 * Template part for displaying post details.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aquaparallax
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h2><?php the_title(); ?></h2>


		
<div class="entry-thumbnail">
		<?php the_post_thumbnail( 'full' ); ?>
</div>
  
  <p class="blog-cat"><i class="fa fa-user"></i><?php $username = get_userdata( $post->post_author ); ?>    
    <a href="<?php echo esc_url( get_author_posts_url( $post->post_author ) ); ?>"><?php echo esc_html( $username->user_nicename ); ?></a>
  <span class="aqa-blog-cat"><i class="fa fa-folder"></i>  <?php the_category(', '); ?></span>
   <?php $tags_list = the_tags(' ',' , '); if ( $tags_list ) { ?> <span class="aqa-blog-cat"><i class="fa fa-folder"></i>  <?php //echo $tags_list;  ?>
   </span><?php } ?></p>

	<div class="entry-content">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->

</article><!-- #post-## -->