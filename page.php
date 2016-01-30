<?php get_header();

while ( have_posts() ) : the_post(); ?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">

    <h3 class="post_title">
    
        <?php if (get_theme_mod('display_date_setting') != 'off' ) : ?>
            <time datetime="<?php the_time('Y-m-d H:i') ?>" itemprop="datePublished">
                <link datetime="<?php the_modified_date('Y-m-d H:i'); ?>" itemprop="dateModified">
                <?php the_time('M jS') ?>
                <br/><?php the_time('Y') ?>
            </time>
        <?php endif; ?>
    
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" itemprop="url">
            <link itemprop="mainEntityOfPage" href="<?php the_permalink() ?>">
            <span itemprop="headline">
                <?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'localize_semperfi'); } ?>
            </span>
        </a>
    </h3>
    
    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
        
        <?php the_post_thumbnail('large_featured', array('class' => 'featured_image')); ?>
        
        <meta itemprop="url" content="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); ?>">
        <meta itemprop="width" content="325">
        <meta itemprop="height" content="325">
        
    </div>
    
    <div itemprop="articleBody">

	   <?php the_content(); ?>
    
    </div>
                    
		<?php wp_link_pages( array('before' => 'Pages: ', 'after' => '') ); ?>
    
</article>

<?php if ((get_theme_mod('previousnext_setting') != 'page') && (get_theme_mod('previousnext_setting') != 'neither')) : ?>

    <div class="stars_and_bars">
        <span class="left"><?php previous_post_link('%link', '&#8249; %title'); ?></span>
        <span class="right"><?php next_post_link('%link', '%title &#8250;'); ?></span>
    </div>

<?php else : ?>

    <div class="stars_and_bars"></div>

<?php endif;

if (!is_home() && (get_theme_mod('comments_setting') != 'none') && (get_theme_mod('comments_setting') != 'single')) :

	comments_template();

endif;

endwhile;

if (semperfi_is_sidebar_active('widget')) get_sidebar();

get_footer(); ?>