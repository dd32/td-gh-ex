<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appdetail
 */
 global $appdetail_theme_options;
  $appdetail_read_more = esc_html( $appdetail_theme_options['appdetail-read-more-text'] );
?>
    
    <div class="blog-item wow fadeInUp animated animated" data-wow-delay="0.2s">
        <?php if(has_post_thumbnail()): ?>
        <div class="blog-top">
            <?php the_post_thumbnail(); ?>
        </div>
       <?php endif; ?>
        <?php if(!has_post_thumbnail()): ?>
        <div class="blog-admin auth">
            <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta('ID') ) ); ?>">
        </div>
        <?php else: ?>
            <div class="blog-admin">
            <img src="<?php echo esc_url( get_avatar_url( get_the_author_meta('ID') ) ); ?>">
        </div>
       <?php endif; ?>
        <div class="blog-bottom">
            <h4 class="h-border"><?php appdetail_posted_by(); ?> 
            </h4>
           <span class="date"><a href="<?php echo esc_url( get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') ) ) ; ?>"><?php echo get_the_date(); ?></a></span>

            <h5 class="h-border"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <?php the_excerpt(); ?>
        </div>
        <a class="btn btn-custom" href="<?php the_permalink(); ?>"><?php echo $appdetail_read_more; ?> </a>
	</div>