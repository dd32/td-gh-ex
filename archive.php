<?php get_header(); ?>

<div class="blog_content">

    <?php if (have_posts()) :

        while (have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php if ( has_post_thumbnail()) : post_class('has_featured_image'); else : post_class(); endif;?>>

                <?php if ( get_theme_mod('display_post_title_setting') == 'off' ) : else : ?>

                    <h5 class="post_title"><?php if (get_theme_mod('display_date_setting') != 'off' ) : ?><time datetime="<?php the_time('Y-m-d H:i') ?>"><?php the_time('M jS') ?><br/><?php the_time('Y') ?></time><?php endif; ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'localize_semperfi'); } ?></a></h5>

                <?php endif; ?>

                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('medium_featured', array( 'class' => "featured_image")); ?>
                </a>
				
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				    <?php the_excerpt(); ?>
                </a>

            </div>

            <?php if (!is_home() && (get_theme_mod('comments_setting') != 'none')) :

                comments_template();

            endif;

        endwhile;

    endif; ?>

</div>

<?php if ( (get_next_posts_link() != '') || (get_previous_posts_link() != '') ) : ?>

    <div class="stars_and_bars">   
        <span class="left"><?php next_posts_link( '&#8249; ' . __('Older Archived Posts', 'localize_semperfi')); ?></span>
        <span class="right"><?php previous_posts_link( __('Newer Archive Posts', 'localize_semperfi') . ' &#8250;'); ?></span>
    </div>

<?php else : ?>

    <div class="stars_and_bars"></div>

<?php endif;

if (semperfi_is_sidebar_active('widget')) get_sidebar();

get_footer(); ?>