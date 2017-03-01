<?php
/**
 * The template for displaying the content of single post.
 *
 * @package astrology
 */
?>
<div class="bloginner-content-part" id="post-<?php the_ID(); ?>">   
    <div class="title-data">
        <h2><?php the_title(); ?></h2>
    </div>
    <?php if ( has_post_thumbnail() ) : ?> 
    <div class="blog-img">
        <p><?php the_post_thumbnail('astrologyFeatureImage'); ?></p>
    </div>
    <?php endif;
    the_content(); ?>
</div>
<?php wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'astrology' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'astrology' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
   