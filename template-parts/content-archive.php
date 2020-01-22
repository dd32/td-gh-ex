<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agency Lite_cat_lists 
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

        $agency_lite_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'agency-lite');
        if($agency_lite_post_image){
            ?>
            <img src="<?php echo esc_url($agency_lite_post_image[0]) ?>" alt="<?php the_title_attribute()?>" title="<?php the_title_attribute()?>" />
            <?php
        }
        ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="blog-wrap">
            <?php $agency_lite_archive_meta_enable = get_theme_mod('agency_lite_archive_meta_enable','on'); 
            if($agency_lite_archive_meta_enable == 'on'){?>
			<div class="entry-meta">
				<div class="comment-author-date">
	                <span class="post-date"><?php echo esc_html(get_the_date()); ?></span>
	                <span class="post-author"><?php  echo esc_url(the_author_posts_link()); ?> </span>
	            </div>
			</div><!-- .entry-meta -->
            <?php } ?>
            <h2 class = "blog-wrap-title">
    		 <a href="<?php the_permalink()?>">
    		 	<?php the_title(); ?>
    		 </a>	
    		</h2>
    		
        	<?php 
            $agency_lite_excerpt_length = get_theme_mod( 'agency_lite_archive_excerpt_lenght', '150' );
            echo agency_lite_get_excerpt_content( $agency_lite_excerpt_length ); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->