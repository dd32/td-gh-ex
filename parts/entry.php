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
    
    <?php if ( is_front_page() || is_home() || is_archive() ) : ?>
        <?php ariel_entry_thumbnail( 'post-thumbnail' ); ?>
    <?php elseif (is_single() && has_post_thumbnail() && $ariel_posts_featured_image_show ) : ?>
        <?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class' => 'img-responsive' ) ); ?>
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

			<?php
				/**
				 * Check for tags visibility
				 * @var bool
				 */
				$ariel_show_tags = ariel_toggle_entry_meta( $ariel_blog_feed_tag_show, $ariel_posts_tags_show );

				if ( $ariel_show_tags && has_tag() && get_post_type() != 'page' ) : ?>
					<div class="col-sm-6">
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
				$ariel_show_categories = ariel_toggle_entry_meta( $ariel_blog_feed_category_show, $ariel_posts_category_show );

				if ( $ariel_show_categories && get_post_type() != 'page' ) : ?>
					<div class="col-sm-6">
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
		$ariel_show_author = ariel_get_option ( 'ariel_author_box_show' );

		if ( $ariel_show_author || is_sticky() ) :

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
					<p class="entry-author-sumary"><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>

					<ul class="entry-author-share">
						<?php
							if ( $ariel_author_social_links ) :
								/**
								 * Get all social profiles
								 */
								foreach ( $ariel_author_social_links as $ariel_social_link ) :
                                    $ariel_network = ''; $ariel_url = '';
									if(isset($ariel_social_link['social_network'])) $ariel_network = $ariel_social_link['social_network'];
									if(isset($ariel_social_link['social_url']))     $ariel_url = $ariel_social_link['social_url'];
                                    if($ariel_network && $ariel_url) {
                                        /**
                                         * Set icons
                                         */
                                        $ariel_icon = $ariel_network;

                                        if ( $ariel_url ) : ?>
                                            <li><a href="<?php echo esc_url( $ariel_url ); ?>" target="_blank">
                                                <?php ariel_fontawesome_icon( $ariel_icon ); ?>
                                            </a></li>
                                        <?php endif; // $ariel_url
                                    }
								endforeach; // $ariel_author_social_links as $ariel_social_link
							endif; // $ariel_author_social_links
						?>

					</ul><!-- entry-author-share -->
				</div><?php
			endif; // $wp_query->current_post == 0 && ! is_paged()
		endif; //  $ariel_show_author || is_sticky()
	?>

	<?php get_template_part( 'parts/posts', 'navigation' ); ?>

</div><!-- post-<?php the_ID(); ?> entry entry-single -->
