<?php
$slider_cats = kaira_theme_option( 'kra-slider-categories' );

if( $slider_cats ) :

$slider_query = new WP_Query( 'cat=' . $slider_cats . '&posts_per_page=-1&orderby=date&order=DESC' ); ?>

<?php if ( $slider_query->have_posts() ) : ?>

    <div class="conica-slider-wrap" style="background-color: <?php echo kaira_theme_option( 'kra-slider-bg-color' ) ?>;">
        
        <div id="conica-home-slider-wrapper" class="conica-slider conica-home-slider-remove"<?php echo ( kaira_theme_option( 'kra-slider-auto-scroll' ) ) ? ' data-auto="4000"' : ' data-auto="false"'; ?> data-slideffect="crossfade"<?php echo ( kaira_theme_option( 'kra-circular-slider' ) ) ? ' data-circular="true"' : ' data-circular="false"'; ?><?php echo ( kaira_theme_option( 'kra-infinite-slider' ) ) ? ' data-infinite="true"' : ' data-infinite="false"'; ?>>
            <div id="conica-home-slider-prev"><i class="fa fa-angle-left"></i></div>
            <div id="conica-home-slider-next"><i class="fa fa-angle-right"></i></div>
            
            <div id="conica-home-slider">
                
                <?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>
                
                    <div>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                        
                            <?php the_post_thumbnail( 'full', array( 'class' => '' ) ); ?>
                            
                        <?php endif; ?>
                        
                        <?php if ( kaira_theme_option( 'kra-slider-titles-show' ) ) : ?>
                        <h3>
                            <?php if ( kaira_theme_option( 'kra-slider-links' ) ) : ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php else: ?>
                                <?php the_title(); ?>
                            <?php endif; ?>
                        </h3>
                        <?php endif; ?>
                        
                    </div>
                
                <?php endwhile; ?>
                
            </div>
            <?php if ( kaira_theme_option( 'kra-enable-slider-pagination' ) ) : ?>
            <div id="conica-home-slider-pager"></div>
            <?php endif; ?>
        </div>
        
    </div>
    
<?php endif; wp_reset_query(); ?>

<?php
endif; ?>