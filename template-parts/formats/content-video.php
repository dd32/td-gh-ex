<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nnfy
 */
?>
<?php 
/**
* Post Meta
*/
$nnfy_opt = nnfy_get_opt();

$show_post_publish_date_meta = ( isset( $nnfy_opt['nnfy_show_post_publish_date_meta'] ) ) ? $nnfy_opt['nnfy_show_post_publish_date_meta'] : '' ;
$show_post_updated_date_meta = ( isset( $nnfy_opt['nnfy_show_post_updated_date_meta'] ) ) ? $nnfy_opt['nnfy_show_post_updated_date_meta'] : '' ;
$show_post_categories_meta = ( isset( $nnfy_opt['nnfy_show_post_categories_meta'] ) ) ? $nnfy_opt['nnfy_show_post_categories_meta'] : '' ;
$show_post_tags_meta = ( isset( $nnfy_opt['nnfy_show_post_tags_meta'] ) ) ? $nnfy_opt['nnfy_show_post_tags_meta'] : '' ;
$show_post_comments_meta = ( isset( $nnfy_opt['nnfy_show_post_comments_meta'] ) ) ? $nnfy_opt['nnfy_show_post_comments_meta'] : '' ;
$show_post_author_meta = ( isset( $nnfy_opt['nnfy_show_post_author_meta'] ) ) ? $nnfy_opt['nnfy_show_post_author_meta'] : '' ;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>

	<?php 
		$video_url = esc_url( get_post_meta( get_the_ID(), '_nnfy_video_url', true ) );
		$local_video_url = esc_url( get_post_meta( get_the_ID(), '_nnfy_local_video_url', true ) );

	?>

	<?php if ($video_url) { ?>
		<div class="blog-video embed-responsive embed-responsive-16by9">
			<?php echo wp_oembed_get( $video_url ); ?>
		</div>
	<?php } ?>

	<?php if ($local_video_url): ?>
		<div class="blog-video embed-responsive embed-responsive-16by9">
			<video width="400" controls>
			  <source src="<?php echo esc_url( get_post_meta( get_the_ID(), '_nnfy_local_video_url', true ) ); ?>" type="video/mp4">
			  <source src="<?php echo esc_url( get_post_meta( get_the_ID(), '_nnfy_local_video_url', true ) ); ?>" type="video/ogg">
			</video>
		</div>
	<?php endif ?>
	
	<div class="blog-content">
		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php if ( 'no' != $show_post_publish_date_meta || 'no' != $show_post_updated_date_meta || 'no' != $show_post_author_meta || 'no' != $show_post_comments_meta || 'no' != $show_post_categories_meta || 'no' != $show_post_tags_meta ): ?>
		    <div class="blog-meta">
		        
		        <?php if ( 'no' != $show_post_author_meta ): ?>
		            <span class="post-user"><?php echo esc_html__( 'By:', '99fy' ); ?> <?php the_author_posts_link(); ?></span>
		        <?php endif ?>
		        
		        <?php if ( 'no' != $show_post_publish_date_meta ): ?>
		            <span class="post-date"><?php echo get_the_time(get_option('date_format')); ?></span>
		        <?php endif ?>

		        <?php if ( 'no' != $show_post_updated_date_meta && '' != $show_post_updated_date_meta  ): ?>
		            <span class="post-updated-date"><?php echo the_modified_time(get_option('date_format')); ?></span>
		        <?php endif ?>

		        <?php if ( 'no' != $show_post_comments_meta ): ?>
		            <span class="post-comments"><?php comments_popup_link( esc_html__('No Comments','99fy'), esc_html__('1 Comment','99fy'), esc_html__('% Comments','99fy'), 'post-comment', esc_html__('Comments off','99fy') ); ?></span>
		        <?php endif ?>

		        <?php if ( 'no' != $show_post_categories_meta && '' != $show_post_categories_meta ): ?>
		            <span class="post-categories"><?php the_category( ', ' ); ?></span>
		        <?php endif ?>

		        <?php if ( 'no' != $show_post_tags_meta && '' != $show_post_tags_meta  ): ?>
		            <?php if (has_tag()): ?>
		                <span class="post-tags"><?php the_tags( ' ', ', ' ); ?> </span>
		            <?php endif ?>
		        <?php endif ?>

		    </div>
		<?php endif ?>
		<?php
			nnfy_post_excerpt();		
			wp_link_pages( array(
				'before'      => '<div class="pagination"><span class="page-links-title">' . esc_html__( 'Pages:', '99fy' ) . '</span>',
				'after'       => '</div>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', '99fy' ) . ' </span>%',
			) );
		 ?>
		<?php 
		$nnfy_opt = nnfy_get_opt();
		$enable_readmore_btn = ( isset( $nnfy_opt['nnfy_enable_readmore_btn'] ) ) ? $nnfy_opt['nnfy_enable_readmore_btn'] : '' ;
		if ( 'no' != $enable_readmore_btn): ?>
			<div class="read-more">
				<a href="<?php the_permalink(); ?>"><?php nnfy_read_more(); ?></a>
			</div>
		<?php endif ?>
	</div>
</article>