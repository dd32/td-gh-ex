<?php
/**
 * @package MWBlog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header post-audio">
		<?php $audiourl = get_post_meta($post->ID, 'audiourl', true); ?>

		<div class="featured-media">
		<?php 
		
			$attr = array(
				'src'      => $audiourl,
				'loop'     => '',
				'autoplay' => '',
				'preload' => 'none'
				);
				
			echo '<div class="mw_audio">';
			echo wp_audio_shortcode( $attr );
			echo '</div>';
			
		?>
		</div>
	
		<div class="mw_title">
			<div class="entry-time">
				<span><?php the_time('j') ?></span> <?php the_time('M Y') ?>
			</div>
			
			<h1 class="entry-title col-lg-8 col-sm-6 col-xs-7"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			<?php mwblog_post_icon(); ?>
			<?php if( is_sticky() ) { ?> <span class="sticky-post"><i class="fa fa-star-o fa-2x"></i></span> <?php } ?>

		</div><!-- .entry-title -->

	</header><!-- .entry-header -->
	
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary clearfix">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content post-audio clearfix">
		<?php the_content( __( '[...]', 'mwblog' ) );	?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
	<footer class="entry-meta">
		<span class="author-link fa fa-user"></span><?php the_author_posts_link() ?>
		<span class="cat-link fa  fa-folder-open"></span><?php the_category(', '); ?>
		<?php the_tags( '<span class="tag-link fa fa-tags"></span>', ', ', '' ); ?>
		<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
		<span class="comments-link fa fa-comments"></span><?php comments_popup_link('0', '1', '%', 'comments-link', ''); ?>
		<?php endif; ?>
		<a class="more-link" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php _e( 'Read more', 'mwblog' ); ?><span> &rarr;</span></a>
	</footer><!-- #entry-meta -->
	
	
</article><!-- #post-## -->