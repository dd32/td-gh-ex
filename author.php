<?php get_header();

$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));?>

<div id="page-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/BlogPosting">

    <h3 class="post_title">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" itemprop="url">
            <link itemprop="mainEntityOfPage" href="<?php the_permalink() ?>">
            <span itemprop="headline">
                <?php echo $curauth->display_name; ?>
            </span>
        </a>
    </h3>

	<?php the_post_thumbnail('large_featured', array( 'class' => 'featured_image', 'itemprop' => 'image')); ?>
    
    <article itemprop="articleBody">

	   <p><?php echo $curauth->description; ?></p>
    
    </article>

</div>

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

if (semperfi_is_sidebar_active('widget')) get_sidebar();

get_footer(); ?>