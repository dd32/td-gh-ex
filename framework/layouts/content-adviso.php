<?php
/**
 * @package Adviso
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 col-xs-10 adviso'); ?>>

    <div class="item-container">
        <div class="featured-thumb">
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('adviso-fp-thumb', array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
            <?php else : ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder.png"; ?>" alt="<?php the_title(); ?>"></a>

            <?php endif; ?>
        </div>

        <div class="out-thumb">
            <h3 class="title-font"><a class="post-title" href="<?php the_permalink() ?>"><?php echo the_title(); ?></a></h3>
            <p class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,80).(get_the_excerpt() ? "..." : "" ); ?></p>

            <div class="postedon">
                <i class="fa fa-calendar"></i><?php adviso_posted_on_date(); ?>
            </div>
            <div class="postedby">
                <i class="fa fa-user"></i><?php the_author(); ?>
            </div>
        </div>
    </div>
</article><!-- #post-## -->