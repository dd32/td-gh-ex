<?php
/**
 * Main template for displaying a post
 * within a feed and on single template
 *
 * @package ariel
 */
/**
 * Blog feed options
 */
$ariel_blog_feed_category_show = ariel_get_option( 'ariel_blog_feed_category_show' );
$ariel_blog_feed_author_show   = ariel_get_option( 'ariel_blog_feed_author_show' );
$ariel_blog_feed_tag_show      = ariel_get_option( 'ariel_blog_feed_tag_show' );
$ariel_blog_feed_date_show     = ariel_get_option( 'ariel_blog_feed_date_show' );
/**
 * Single post options
 */
$ariel_posts_category_show       = ariel_get_option( 'ariel_posts_category_show' );
$ariel_posts_author_show         = ariel_get_option( 'ariel_posts_author_show' );
$ariel_posts_tags_show           = ariel_get_option( 'ariel_posts_tags_show' );
$ariel_posts_date_show           = ariel_get_option( 'ariel_posts_date_show' );
$ariel_posts_featured_image_show = ariel_get_option( 'ariel_posts_featured_image_show' );

/**
 * Check if Jetpack is activated
 * @var bool
 */
$jetpack_activated = get_option( 'jetpack_activated' );
$jetpack_sharing_options = get_option( 'sharing-options' );
$jetpack_sharing_allowed = false;
$entry_footer_class = 'col-sm-6';

if ( $jetpack_activated && is_array ($jetpack_sharing_options) ) :
	/**
	 * Get Jetpack options
	 * @var array
	 */
	
	/**
	 * Array of post types where sharing is enabled
	 * @var array
	 */
	$jetpack_sharing_options_show = $jetpack_sharing_options['global']['show'];
	/**
	 * Check if this post type is among enabled ones
	 */
	if ( is_single() ) :
		if ( in_array( get_post_type(), $jetpack_sharing_options_show ) ) :
			$entry_footer_class = 'col-sm-4';
			$jetpack_sharing_allowed = true;
		endif; // in_array( get_post_type(), $jetpack_sharing_options_show )
	elseif ( is_archive() || is_search() || is_home() || is_front_page() ) :
		if ( in_array( 'index', $jetpack_sharing_options_show ) ) :
			$entry_footer_class = 'col-sm-4';
			$jetpack_sharing_allowed = true;
		endif;
	endif;

endif; // $jetpack_activated
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'entry entry-single' ); ?>>

	<?php ariel_entry_categories(); ?>
	<?php ariel_entry_title(); ?>

	<p class="entry-meta">
		<?php ariel_entry_author(); ?>
		<?php ariel_entry_separator('author_date'); ?>
		<?php ariel_entry_date(); ?>
		<?php ariel_entry_separator('date_comments'); ?>
		<?php ariel_entry_separator('author_comments'); ?>
		<?php ariel_entry_comments_link(); ?>
	</p>
    
    <?php if ( is_front_page() || is_home() || is_archive() || ( is_single() && $ariel_posts_featured_image_show ) ) : ?>
        <?php ariel_entry_thumbnail( 'post-thumbnail' ); ?>
    <?php endif; ?>
            
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ariel' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<div class="entry-meta-foot">
		<div class="row">
			<?php if ( $jetpack_sharing_allowed ) : ?>
				<div id="entry-share" class="col-sm-4">
					<div class="entry-share-default">
						<?php
							if ( function_exists( 'sharing_display' ) ) {
								sharing_display( '', true );
							}
						?>
					 </div>
				</div>
			<?php endif; // $jetpack_sharing_allowed ?>

			<?php
				/**
				 * Check for tags visibility
				 * @var bool
				 */
				$show_tags = ariel_toggle_entry_meta( $ariel_blog_feed_tag_show, $ariel_posts_tags_show );

				if ( $show_tags && has_tag() && get_post_type() != 'page' ) : ?>
					<div class="<?php echo esc_attr($entry_footer_class); ?>">
						<h5><?php esc_html_e( 'Tags', 'ariel' ); ?></h5>
						<div class="entry-tags">
							<?php echo get_the_tag_list(); ?>
						</div>
					</div>
			<?php endif; ?>

			<?php
				/**
				 * Check for categories visibility
				 * @var bool
				 */
				$show_categories = ariel_toggle_entry_meta( $ariel_blog_feed_category_show, $ariel_posts_category_show );

				if ( $show_categories && get_post_type() != 'page' ) : ?>
					<div class="<?php echo esc_attr($entry_footer_class); ?>">
						<h5><?php esc_html_e( 'Filed Under', 'ariel' ); ?></h5>
						<div class="entry-filed"><?php the_category( ', ' ); ?></div>
					</div>
			<?php endif; ?>
		</div><!-- row -->
	</div><!-- entry-meta-foot -->

	<?php
		/**
		 * Check for author visibility
		 * @var bool
		 */
		$show_author = ariel_get_option ( 'ariel_author_box_show' );

		if ( $show_author || is_sticky() ) :

			$ariel_author_social_links = ariel_get_option( 'ariel_author_social_links' );
			/**
			 * Show author only on first post in loop and page not paged
			 */
			if ( $wp_query->current_post == 0 && ! is_paged() ) : ?>

				<div class="entry-author">
					<div class="entry-author-thumb">
						<a href="<?php echo esc_url ( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 102 ); ?>
						</a>
					</div>
					<p class="entry-author-head"><?php esc_html_e( 'About The Author', 'ariel' ); ?></p>
					<h3 class="entry-author-name"><?php the_author(); ?></h3>
					<p class="entry-author-sumary"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>

					<ul class="entry-author-share">
						<?php
							if ( $ariel_author_social_links ) :
								/**
								 * Get all social profiles
								 */
								foreach ( $ariel_author_social_links as $social_link ) :
									$network = $social_link['social_network'];
									$url = $social_link['social_url'];
									/**
									 * Set icons
									 */
									$icon = $network;

									if ( $url ) : ?>
										<li><a href="<?php echo esc_url( $url ); ?>" target="_blank">
											<?php ariel_fontawesome_icon( $icon ); ?></i>
										</a></li>
									<?php endif; // $url
								endforeach; // $ariel_author_social_links as $social_link
							endif; // $ariel_author_social_links
						?>

					</ul><!-- entry-author-share -->
				</div><?php
			endif; // $wp_query->current_post == 0 && ! is_paged()
		endif; //  $show_author || is_sticky()
	?>

	<?php get_template_part( 'parts/posts', 'navigation' ); ?>

</div><!-- post-<?php the_ID(); ?> entry entry-single -->
