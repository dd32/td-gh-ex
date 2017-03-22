<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ecommerce Store
 */

get_header(); ?>

<div class="feature-box">
    <div class="container">
        <div class="col-md-12">
            <div class="bradcrumbs">
                <?php bb_ecommerce_store_the_breadcrumb(); ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="middle-align content_sidebar">
        <div class="col-md-9" id="content-tc">
            <?php if ( have_posts() ) : ?>
                <div class="container">
                    <header>
                        <h1 class="page-title">
                            <?php
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="taxonomy-description">', '</div>' );
                            ?>
                        </h1>
                    </header><!-- .page-header -->  
                </div>
                <?php /* Start the Loop */ ?>
            <?php 
                while ( have_posts() ) : the_post(); ?>
                    <div class="postbox smallpostimage">
                        <?php 
                            if(has_post_thumbnail()) { ?>
                                <div class="col-md-5 wow bounceInUp">
                                    <div class="hovereffect">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                </div><?php
                                $class_col = '7';
                            }
                            else{
                                $class_col = '12';                              
                            }
                        ?>
                        <div class="col-md-<?php echo $class_col; ?> wow bounceInUp">
                            <h4><?php the_title();?></h4>           
                            <p><?php the_excerpt(); ?></p>
                            <div class="metabox">
                                <span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span>
                                <span class="entry-author"> <?php the_author(); ?></span>
                                <span class="entry-comments"> <?php comments_number( '0 Comments', '0 Comments', '% Comments' ); ?></span>
                            </div>
                            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" title="<?php _e( 'Read Full', 'bb-ecommerce-store' ); ?>"><?php _e('Read Full','bb-ecommerce-store'); ?></a>
                        </div>
                        <div class="clearfix"></div> 
                    </div>
                <?php endwhile; ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text' => __( 'Previous page', 'bb-ecommerce-store' ),
                            'next_text' => __( 'Next page', 'bb-ecommerce-store' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
                        ) );
                    ?>
                </div>
            <?php else : ?>
                <?php get_template_part( 'no-results', 'archive' ); ?>
            <?php endif; ?>
        </div>
        <div class="col-md-3">
            <?php dynamic_sidebar('sidebar-1');?>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>