<?php
$slider_cats = kaira_theme_option( 'kra-slider-categories' );

if( $slider_cats ) : ?>

<?php if ( have_posts() ) : ?>

    <div id="alba-home-slider-wrapper" class="alba-slider alba-home-slider-remove"<?php echo ( kaira_theme_option( 'kra-slider-auto-scroll' ) ) ? ' data-auto="4000"' : ' data-auto="false"'; ?><?php echo ( kaira_theme_option( 'kra-circular-slider' ) ) ? ' data-circular="true"' : ' data-circular="false"'; ?><?php echo ( kaira_theme_option( 'kra-infinite-slider' ) ) ? ' data-infinite="true"' : ' data-infinite="false"'; ?>>
        <div id="alba-home-slider-prev"><i class="fa fa-angle-left"></i></div>
        <div id="alba-home-slider-next"><i class="fa fa-angle-right"></i></div>
        
        <div id="alba-home-slider">
            
            <?php
            query_posts ( 'cat=' . $slider_cats . '&posts_per_page=-1&orderby=date&order=DESC' );
            while ( have_posts() ) : the_post(); ?>
            
                <div>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                    
                        <?php the_post_thumbnail( 'full', array( 'class' => '' ) ); ?>
                        
                    <?php endif; ?>
                    
                    <h3>
                        <?php if ( kaira_theme_option( 'kra-slider-links' ) ) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php else: ?>
                            <?php the_title(); ?>
                        <?php endif; ?>
                    </h3>
                    
                </div>
            
            <?php endwhile; ?>
            
        </div>
        <?php if ( kaira_theme_option( 'kra-enable-slider-pagination' ) ) : ?>
        <div id="alba-home-slider-pager"></div>
        <?php endif; ?>
    </div>
    
<?php endif; wp_reset_query(); ?>

<?php
endif; ?>