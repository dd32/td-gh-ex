<?php
/**
 * The template for displaying all single posts.
 *
 * @package Theme Freesia
 * @subpackage Arise
 * @since Arise 1.0
 */
get_header();
	$arise_settings = arise_get_theme_options();
	global $post;	
	global $content_layout;
	if( $post ) {
		$layout = get_post_meta( $post->ID, 'arise_sidebarlayout', true );
	}
	if( empty( $layout ) || is_archive() || is_search() || is_home() ) {
		$layout = 'default';
	}
	if( 'default' == $layout ) { //Settings from customizer
		if(($arise_settings['arise_sidebar_layout_options'] != 'nosidebar') && ($arise_settings['arise_sidebar_layout_options'] != 'fullwidth')){ ?>

<div id="primary">
<?php }
	}else{ // for page/ post
		if(($layout != 'no-sidebar') && ($layout != 'full-width')){ ?>
<div id="primary">
	<?php }
	}?>
	<div id="main">
	<?php global $arise_settings;
	global $post;
	if( have_posts() ) {
		while( have_posts() ) {
			the_post(); ?>
		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $format = get_post_format(); ?>
			<article class="format-<?php echo $format; ?>">
			<header class="entry-header">
				<div class="entry-meta clearfix">
					<?php	
						if ( current_theme_supports( 'post-formats', $format ) ) {
							printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
							sprintf( ''),
							esc_url( get_post_format_link( $format ) ),
							get_post_format_string( $format )
							);
						} ?>
					<span class="author vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>">
					<?php the_author(); ?> </a></span> <span class="posted-on"><a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>">
					<?php the_time( get_option( 'date_format' ) ); ?> </a></span>
					<?php if ( comments_open() ) { ?>
					<span class="comments">
						<?php comments_popup_link( __( 'No Comments', 'arise' ), __( '1 Comment', 'arise' ), __( '% Comments', 'arise' ), '', __( 'Comments Off', 'arise' ) ); ?>
					</span>
					<?php } ?>
				</div> <!-- .entry-meta -->
			</header> <!-- .entry-header -->
			<?php $featured_image_display = $arise_settings['arise_single_post_image'];
				if($featured_image_display == 'on'):
					if( has_post_thumbnail() ) {
						$image = '';
						$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
						$image .= '<figure class="post-featured-image">';
						$image .= '<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">';
						$image .= get_the_post_thumbnail( $post->ID, 'featured', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
						$image .='<span class="arrow"></span>';
						$image .= '</figure><!-- .post-featured-image -->';
						echo $image;
					}
				endif;
		} ?>
		<div class="entry-content clearfix">
		<?php the_content();
			wp_link_pages( array( 
				'before'			=> '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'arise' ),
				'after'			=> '</div>',
				'link_before'	=> '<span>',
				'link_after'	=> '</span>',
				'pagelink'		=> '%',
				'echo'			=> 1
			) ); ?>
		</div> <!-- .entry-content -->
		<?php if( is_single() ) {
			$tag_list = get_the_tag_list( '', __( ' ', 'arise' ) ); ?>
		<footer class="entry-meta clearfix"> <span class="cat-links">
			<?php _e('Category : ','arise');  the_category(', '); ?> </span> <!-- .cat-links -->
			<?php $tag_list = get_the_tag_list( '', __( ', ', 'arise' ) );
				if(!empty($tag_list)){ ?>
				<span class="tag-links">  <?php   echo $tag_list; ?> </span> <!-- .tag-links -->
				<?php } ?>
		</footer> <!-- .entry-meta -->
		<?php if ( is_single() ) {
				if( is_attachment() ) { ?>
				<ul class="default-wp-page clearfix">
					<li class="previous"> <?php previous_image_link( false, __( '&larr; Previous', 'arise' ) ); ?> </li>
					<li class="next">  <?php next_image_link( false, __( 'Next &rarr;', 'arise' ) ); ?> </li>
				</ul>
				<?php } else { ?>
				<ul class="default-wp-page clearfix">
					<li class="previous"> <?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'arise' ) . '</span> %title' ); ?> </li>
					<li class="next"> <?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'arise' ) . '</span>' ); ?> </li>
				</ul>
					<?php }
				}
		}
				comments_template(); ?>
			</article>
		</section> <!-- .post -->
	<?php
		}
	else { ?>
	<h1 class="entry-title"> <?php _e( 'No Posts Found.', 'arise' ); ?> </h1>
	<?php } ?>
	</div> <!-- #main -->
	<?php 
	if( 'default' == $layout ) { //Settings from customizer
		if(($arise_settings['arise_sidebar_layout_options'] != 'nosidebar') && ($arise_settings['arise_sidebar_layout_options'] != 'fullwidth')): ?>
</div> <!-- #primary -->
<?php endif;
}else{ // for page/post
	if(($layout != 'no-sidebar') && ($layout != 'full-width')){
		echo '</div><!-- #primary -->';
	}
}
get_sidebar();
get_footer(); ?>
