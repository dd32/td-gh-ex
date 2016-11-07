<?php
/**
 * Template part for displaying posts.
 * @package astrology
 */
?>
<div class="container">
<div class="row">            
    <div class="col-xs-12 col-sm-12 col-md-9 pull-right">
        <div class="bloginner-content-part2">
            <?php
                if ( have_posts() ) : $i=1;
                    while ( have_posts() ) : the_post();?>                        
                    <div class="col-xs-12 col-sm-6">
                        <div class="blog-content-left <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
                            <div class="blog-info-text">
                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                <ul>
                                    <li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php echo ucfirst(get_the_author()); ?></a></li>
                                    <li><?php echo get_the_date(get_option('date_format')); ?></li>
                                </ul>
                                <?php echo get_the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>"><?php _e('Read More','astrology')?></a>
                            </div>        
                            <?php if ( has_post_thumbnail() ) { ?>
                            <div class="blog-img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
					if($i % 2 == 0):
						echo '<div class="clearfix"></div>'; 
					endif;
					$i++;
                    endwhile;
                    the_posts_pagination( array(
                        'type'  => 'list',
                        'screen_reader_text' => ' ',
                        'prev_text'          => __( 'Previous', 'astrology' ),
                        'next_text'          => __( 'Next', 'astrology' ),
                    ) );
                endif; 
            ?>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>
</div>                       