<?php
    if ( get_theme_mod( 'apex-business-news-switch-setting', 1 ) ) :

    $apex_business_query_args = array(
        'post_type'         =>  'post',
        'posts_per_page'    =>  3,
        'order'             =>  'DESC',
        'post__not_in'      =>  get_option( "sticky_posts" ),
    );

    $apex_business_news  = new WP_Query( $apex_business_query_args );
?>
<div class="ct-post-loop container ct-padding">
    <?php if( get_theme_mod( 'apex-business-news-title-setting' ) != '' ) : ?>
    <div class="row">
        <div class="twelve columns">
            <div class="ct-section-wrapper ct-sm-b-padding">
                <h2 class="ct-text-center ct-section-title ct-news-title"><?php echo esc_html( get_theme_mod( 'apex-business-news-title-setting' ) ); ?></h2><!-- /.ct-text-center -->
            </div><!-- /.ct-section-wrapper ct-sm-b-padding -->
        </div><!-- /.twelve columns -->
    </div><!-- /.row -->
    <?php endif; ?>

    <div class="row">
<?php
    if ( $apex_business_news->have_posts() ) :
        while ( $apex_business_news->have_posts() ) : $apex_business_news->the_post();
?>
            <div class="four columns">
                <div class="ct-blog-card">

                    <?php if ( is_sticky() ) : ?>
                    <div class="ct-corner">
                        <span class="fa fa-thumb-tack"></span>
                    </div><!-- /.ct-corner -->
                    <?php endif; ?>

                    <div class="ct-card-image ct-container-img">
                        <?php
                            if ( has_post_thumbnail() ):
                                the_post_thumbnail( 'large' );
                            endif;

                            $apex_business_right = '';
                            if ( !has_post_thumbnail() ) :
                                $apex_business_right = 'ct-date-right';
                            endif;
                        ?>
                        <div class="ct-date-time ct-text-center <?php echo esc_attr( $apex_business_right ); ?>">
                            <span><?php echo esc_html( get_the_date() ); ?></span>
                        </div><!-- /.date-time -->
                    </div><!-- /.ct-card-image -->

                    <div class="ct-card-content">
                        <div class="ct-title-excerpt">
                            <a href="<?php the_permalink(); ?>"><h2 class="title"><?php the_title(); ?></h2></a>
                            <?php the_excerpt(); ?>
                        </div><!-- /.ct-title-excerpt -->
                    </div><!-- /.ct-card-content -->

                    <div class="ct-divider"></div><!-- /.ct-divider -->

                    <div class="ct-author-content">
                        <div class="ct-author-details">
                            <div class="ct-author-img">
                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></a>
                            </div><!-- /.ct-author-img -->
                            <div class="ct-author-name">
                                <span><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php the_author(); ?></a></span>
                            </div><!-- /.ct-author-name -->
                        </div><!-- /.ct-author-details -->
                    </div><!-- /.ct-author-content -->

               </div><!-- /.ct-blog-card -->
            </div><!-- /.four columns -->
<?php
        endwhile;

    else :

        get_template_part( 'template-parts/post/content', 'none' );

    endif;

    wp_reset_query();
?>
    </div><!-- /.row -->
</div><!-- /.ct-post-loop container -->
<?php endif; ?>
