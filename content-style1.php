<?php
/**
 * @package Accesspress Mag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php 
            $accesspress_mag_show_breadcrumbs = of_get_option('show_hide_breadcrumbs');
            $accesspress_mag_show_breadcrumbs_on_post = of_get_option('show_post_breadcrumbs');
            $article_ad = of_get_option('value_article_ad');
            $show_featured_image = of_get_option('featured_image');
                if ((function_exists('accesspress_breadcrumbs') && $accesspress_mag_show_breadcrumbs == 1 && $accesspress_mag_show_breadcrumbs_on_post == 1)) {
    				    accesspress_breadcrumbs();
                    }
        ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta clearfix">
            <?php echo $post_categories = get_the_category_list(); ?>
            <?php accesspress_mag_posted_on(); ?>
			<?php do_action('accesspress_mag_post_meta');?>
		</div><!-- .entry-meta -->
        
	</header><!-- .entry-header -->

	<div class="entry-content">
        <div class="post_image">
            <?php 
                $image_id = get_post_thumbnail_id();
                $image_path = wp_get_attachment_image_src($image_id,'singlepost-style1',true);
                $image_alt = get_post_meta($image_id,'_wp_attachment_image_alt',true);
                if(has_post_thumbnail()){
                    if($show_featured_image==1){
            ?>  
                <img src="<?php echo $image_path[0];?>" alt="<?php echo esc_attr($image_alt);?>" />
            <?php
                    }
                }
            ?>
        </div>
		<div class="post_content"><?php the_content(); ?></div>   
        <?php if(!empty($article_ad)):?> <div class="article-ad-section"><?php echo $article_ad; ?></div> <?php endif ;?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-mag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
        <?php do_action('accesspress_mag_single_post_review');?>
		<?php accesspress_mag_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
