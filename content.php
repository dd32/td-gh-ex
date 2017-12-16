<div class="blog-wrapper">
    <div class="">
        <div class="container">
            <div id="post-<?php the_ID(); ?>" <?php post_class( 'row responsive' ); ?>>
                <?php $blog_layout_class=(get_theme_mod('blogsidebar',3) == 1)?"9":((get_theme_mod('blogsidebar',3) == 2)?"9":"12");
                if(get_theme_mod('blogsidebar',3) == 1):
                        get_sidebar();
                 endif;
                ?>                
                <div class="col-md-<?php echo $blog_layout_class; ?> col-sm-12 col-xs-12 content">
                    <div class="blog-content-area fadeIn animated">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div class="blog-content">
                                <div class="title-data fadeIn animated">
                                    <h2><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h2>
                                    <?php if(get_theme_mod('blogMetaTag') == 1):?>
                                    <p> <?php best_startup_entry_meta(); ?></p>
                                <?php endif; ?>
                                </div>
                                <?php if ( has_post_thumbnail() ) : ?>
                                <div class="blog-images">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'BestStartupThumbnailImage', array( 'alt' => esc_attr(get_the_title()), 'class' => 'img-responsive') ); ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if(get_theme_mod('blogPostExcerpt',1) == 1): ?> 
                                <p><?php echo best_startup_excerpt(absint(get_theme_mod('blogPostExcerptTextLimit',150))); ?></p>
                            <?php endif; ?>

                            <a href="<?php the_permalink();?>" class="btn-light"><?php _e('READ MORE','best-startup'); ?></a>
                            </div>
                        <?php endwhile;  ?> 
                        <?php the_posts_pagination( array(
                            'Previous' => __( 'Back', 'best-startup' ),
                            'Next' => __( 'Onward', 'best-startup' ),
                        ) ); ?>
                    </div>
                </div>
                <?php 
                if(get_theme_mod('blogsidebar',3) == 2):
                        get_sidebar();
                 endif;
                ?>
            </div>
        </div>
    </div>
</div>