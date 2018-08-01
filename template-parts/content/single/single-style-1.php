<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item blog-item-style-1 single-item' ); ?>>

    <!-- Featured Image container -->
	<?php get_template_part( 'template-parts/content/content-elements/featured-image' ); ?>
    <!-- Meta -->
	<?php get_template_part( 'template-parts/content/content-elements/meta' ); ?>
    <!-- Single Item Title -->
	<?php get_template_part( 'template-parts/content/content-elements/single-title' ); ?>

	<?php the_content(); ?>

	<?php if ( has_tag() ): ?>
		<?php the_tags(); ?>
	<?php endif; ?>

    <!-- Next / Previous Posts links -->
    <h4 class="mt-20"><?php echo esc_html__('Read Also','atlast-agency'); ?></h4>
    <div class="post-pagination">
        <div class="columns">
            <div class="column col-6 col-sm-12 text-left">
                <?php previous_post_link(); ?>
            </div>
            <div class="column col-6 col-sm-12 text-right">
	            <?php next_post_link(); ?>
            </div>
        </div>
    </div>

    <div class="entry-links"><?php wp_link_pages(); ?></div>

</article>