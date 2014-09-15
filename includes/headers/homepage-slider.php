<?php
global $cx_framework_options;

$slider_cats = $cx_framework_options[ 'cx-options-home-slider-cats' ];

if( $slider_cats ) :
    
$slider_cats_set = conica_load_selected_categories( $slider_cats ); ?>

<?php if ( have_posts() ) : ?>

    <div class="conica-slider-wrap">
        
        <div id="conica-home-slider-wrapper" class="conica-slider conica-home-slider-remove"<?php echo ( $cx_framework_options['cx-options-home-slider-auto-scroll'] ) ? ' data-auto="4000"' : ' data-auto="false"'; ?><?php echo ( $cx_framework_options['cx-options-home-slider-circular'] ) ? ' data-circular="true"' : ' data-circular="false"'; ?><?php echo ( $cx_framework_options['cx-options-home-slider-infinite'] ) ? ' data-infinite="true"' : ' data-infinite="false"'; ?>>
            <div id="conica-home-slider-prev"><i class="fa fa-angle-left"></i></div>
            <div id="conica-home-slider-next"><i class="fa fa-angle-right"></i></div>
            
            <div id="conica-home-slider">
                
                <?php
                query_posts ( 'cat=' . $slider_cats_set . '&posts_per_page=-1&orderby=date&order=DESC' );
                while ( have_posts() ) : the_post(); ?>
                
                    <div>
                        
                        <?php if ( has_post_thumbnail() ) : ?>
                        
                            <?php the_post_thumbnail( 'full', array( 'class' => '' ) ); ?>
                            
                        <?php endif; ?>
                        
                        <?php if ( $cx_framework_options[ 'cx-options-home-slider-titles' ] ) : ?>
                        <h3>
                            <?php if ( $cx_framework_options[ 'cx-options-home-slider-link' ] ) : ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php else: ?>
                                <?php the_title(); ?>
                            <?php endif; ?>
                        </h3>
                        <?php endif; ?>
                        
                    </div>
                
                <?php endwhile; ?>
                
            </div>
            <?php if ( $cx_framework_options[ 'cx-options-home-slider-pagination-show' ] ) : ?>
            <div id="conica-home-slider-pager"></div>
            <?php endif; ?>
        </div>
        
    </div>
    
<?php endif; wp_reset_query(); ?>

<?php
endif; ?>