<?php
/**
 * Template part for displaying posts in masonry view.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aquaparallax
 */

?>

<div class="masonry-item col-md-6">
	<article id="post-<?php the_ID(); ?>"> 
		<div class="aqa-single-blog">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p class="blog-auther"><i class="fa fa-user"></i> <?php $username = get_userdata( $post->post_author ); ?>    
			<a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo $username->user_nicename; ?></a>
		    <span class="aqa-blog-cat"><i class="fa fa-folder"></i> <?php the_category(', '); ?></span></p>
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<?php if($url) { ?>
			<img src="<?php echo $url; ?>" class="img-responsive blog-manso-one">
			<?php } ?>
			<p class="post-discription"><?php the_excerpt(); ?></p>
			<p class="blog-single-btn"><a href="<?php the_permalink(); ?>"><?php echo esc_html_e( 'Read More', 'aquaparallax' ); ?></a></p>
		</div> 
</article>
</div> 