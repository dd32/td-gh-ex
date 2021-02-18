<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best Classifieds
 */
global $post;
$categories = get_the_category(get_the_ID());
?>
  <div class="story_contain">
		<div class="thumbnails">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php best_classifieds_post_thumbnail(); ?>
			</a>
		</div>
		
		<div class="thumbnails_contain">
			<?php the_content(); ?>
       <?php wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'best-classifieds'),
                    'after' => '</div>',
                ));
			if(get_theme_mod('read_more_link',1) != 1): ?>  
                <a href="<?php the_permalink();?>" class="btn-light read_more_link"><?php esc_html_e('READ MORE','best-classifieds'); ?></a>
            <?php endif; ?> 
		</div>
	</div>