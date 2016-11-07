<?php
/**
 * The template for displaying the content of single post.
 *
 * @package astrology
 */
?>
<div class="bloginner-content-part" id="post-<?php the_ID(); ?>">    
    <h2><?php the_title(); ?></h2>
    <ul>
        <li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo __('By ', 'astrology').ucfirst(get_the_author()); ?></a></li>
        <li> <?php echo __('Posted on','astrology').get_the_date(get_option('date_format')); ?></li>
    </ul>
    <?php if ( has_post_thumbnail() ) : ?> 
    <div class="blog-img">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('astrologyFeatureImage'); ?>
        </a>
    </div>
    <?php endif; ?>    
    <?php the_content(); ?>
</div>
<?php 
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'astrology' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'astrology' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) ); ?>
   