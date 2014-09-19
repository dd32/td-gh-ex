<?php
/**
 * @package MWBlog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		if ( get_post_format() == 'video' ){ 
			$class_single = 'post-video';
		} else if ( get_post_format() == 'audio' ){ 
			$class_single = 'post-audio';
		} else {
			$class_single = 'mw_single';
		}
		$videourl = get_post_meta($post->ID, 'videourl', true);
		$audiourl = get_post_meta($post->ID, 'audiourl', true);
	?>
	<header class="entry-header <?php echo $class_single; ?>">


		<?php  
		if ( $videourl != '' ) : ?>

		<div class="featured-media">		
			<?php if (strpos($videourl,'.mp4') !== false) : ?>				
				<video controls>
					<source src="<?php echo $videourl; ?>" type="video/mp4">
				</video>
			<?php else : ?>				
				<?php 				
					$embed_code = wp_oembed_get($videourl); 					
					echo $embed_code;					
				?>					
			<?php endif; ?>			
		</div>
	
		<?php endif; ?>
		<?php  
		if ( $audiourl != '' ) : ?>

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
	
		<?php endif; ?>
		
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<?php the_post_thumbnail('blog_img'); ?>
		<?php endif; ?>

		<div class="mw_title">
			<div class="entry-time">
				<span><?php the_time('j') ?></span> <?php the_time('M Y') ?>
			</div>
			<h1 class="entry-title col-lg-8 col-sm-6 col-xs-7"><?php the_title(); ?></h1>
			<?php mwblog_post_icon(); ?>

		</div><!-- .entry-title -->

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php
		the_content( __( '[...]', 'mwblog' ) );
		wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mwblog' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-meta">
		<span class="author-link fa fa-user"></span><?php the_author_posts_link() ?>
		<span class="cat-link fa  fa-folder-open"></span><?php the_category(', '); ?>
		<?php the_tags( '<span class="tag-link fa fa-tags"></span>', ', ', '' ); ?>
	</footer><!-- #entry-meta -->

</article><!-- #post-## -->