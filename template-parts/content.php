<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beka
 */
global $first_post;
?>
<article id="post-<?php the_ID(); ?>" <?php $first_post == true ? post_class('first_post') : post_class('grid'); ?>>
	<?php
        if(has_post_thumbnail() && $first_post == true ){ ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="featured-thumbnail">
                <?php the_post_thumbnail('beka-featured'); ?>
            </a>
    <?php }
        elseif(has_post_thumbnail()){ ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="featured-thumbnail">
                <?php the_post_thumbnail('beka-grid'); ?>
            </a>
    <?php }
    ?>
    <div class="post-content">
        <span class="post-cats"><?php the_category(', '); ?></span>
        <header class="entry-header clearfix">
            <?php
                if ( is_single() ) {
                    the_title( '<h1 class="entry-title">', '</h1>' );
                } else {
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                }
            
            if ( 'post' === get_post_type() ) : 
            if($first_post == true){
            ?>
            <div class="entry-meta">
                <?php beka_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php
            }
            else{ ?>
                <span class="post-date clearfix">
                    <span class="fa fa-calendar-o"></span>
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_html( get_the_date() ); ?>">
                        <?php the_time('F d, Y'); ?>
                    </time>
                </span>
            <?php
            }
            endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
             the_excerpt();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beka' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <?php if($first_post == true){ ?>
            <div class="read-more">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php _e('Read More','beka'); ?> <span class="screen-reader-text"><?php the_title(); ?></span></a>
            </div>
            <?php } //beka_entry_footer(); ?>
        </footer><!-- .entry-footer -->
    </div><!-- .post-content -->
</article><!-- #post-## -->
