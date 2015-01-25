<?php
/**
* This template displays single post content.
*
* @package Swell Lite
* @since Swell Lite 1.0
*
*/
get_header(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'swell-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php if (get_theme_mod('display_feature_post') == '1') { ?>
		<?php if ( has_post_thumbnail() && ! has_post_format('audio') ) { ?>
			<div class="feature-img page-banner" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } ?>>
				<h1 class="headline img-headline"><?php the_title(); ?></h1>
				<?php the_post_thumbnail( 'swell-featured-large' ); ?>
			</div>
		<?php } ?>
	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content<?php if ( get_theme_mod('display_feature_post') == '1' && has_post_thumbnail() && ! has_post_format('audio') ) { ?> overlap<?php } ?>">
	
		<?php if ( is_active_sidebar( 'default-sidebar' ) ) { ?>
			
			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">
	
				<!-- BEGIN .postarea -->
				<div class="postarea">
		
					<?php get_template_part( 'content/loop', 'post' ); ?>
				
				<!-- END .postarea -->
				</div>
			
			<!-- END .eleven columns -->
			</div>
			
			<!-- BEGIN .five columns -->
			<div class="five columns">
			
				<?php get_sidebar(); ?>
				
			<!-- END .five columns -->
			</div>
	
		<?php } else { ?>
	
			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">
	
				<!-- BEGIN .postarea full -->
				<div class="postarea full">
		
					<?php get_template_part( 'content/loop', 'post' ); ?>
				
				<!-- END .postarea full -->
				</div>
			
			<!-- END .sixteen columns -->
			</div>
	
		<?php } ?>
		
		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>