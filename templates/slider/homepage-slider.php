<?php
if ( get_theme_mod( 'conica-slider-type' ) == 'conica-no-slider' ) : ?>
    
    <!-- No Slider -->
    
<?php elseif ( get_theme_mod( 'conica-slider-type' ) == 'conica-shortcode-slider' ) : ?>
    
    <?php
    $slider_code = '';
    if ( get_theme_mod( 'conica-slider-shortcode' ) ) {
        $slider_code = get_theme_mod( 'conica-slider-shortcode' );
    } ?>
    
    <?php echo ( $slider_code ) ? do_shortcode( esc_html( $slider_code ) ) : ''; ?>
    
<?php else : ?>
    
    <?php
    $slider_cats = '';
    if ( get_theme_mod( 'conica-slider-cats' ) ) {
        $slider_cats = get_theme_mod( 'conica-slider-cats' );
    } ?>
    
    <?php if( $slider_cats ) : ?>
        
        <?php $slider_query = new WP_Query( 'cat=' . esc_html( $slider_cats ) . '&posts_per_page=-1&orderby=date&order=DESC' ); ?>
        
        <?php if ( $slider_query->have_posts() ) : ?>

            <div class="home-slider-wrap <?php echo ( get_theme_mod( 'conica-slider-size' ) ) ? sanitize_html_class( get_theme_mod( 'conica-slider-size' ) ) : sanitize_html_class( 'conica-slider-size-medium' ); ?> <?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? sanitize_html_class( 'slider-full-width' ) : ''; ?> home-slider-remove" <?php echo ( get_theme_mod( 'conica-slider-bg-color' ) ) ? 'style="background-color: ' . esc_html( get_theme_mod( 'conica-slider-bg-color' ) ) . ';"' : ''; ?>>
                <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
                <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
                
                <?php echo ( get_theme_mod( 'conica-slider-style' ) == 0 ) ? '<div class="site-container">' : ''; ?>
                    
                    <div class="home-slider">
                        
                        <?php while ( $slider_query->have_posts() ) : $slider_query->the_post();
                            $slider_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                            
                            <div class="home-slider-block"<?php echo ( has_post_thumbnail() ) ? ' style="background-image: url(' . esc_url( $slider_thumbnail['0'] ) . ');"' : ''; ?>>
                            
                                <?php if ( get_theme_mod( 'conica-slider-size' ) == 'conica-slider-size-small' ) : ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_small<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                                <?php elseif ( get_theme_mod( 'conica-slider-size' ) == 'conica-slider-size-large' ) : ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_large<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                                <?php endif; ?>
                                
                                <div class="home-slider-block-inner">
                                    <div class="home-slider-block-bg">
                                        <h3 class="home-slider-block-title">
                                            <?php the_title(); ?>
                                        </h3>
                                        <?php if ( has_excerpt() ) : ?>
                                            <p><?php the_excerpt(); ?></p>
                                        <?php else : ?>
                                            <p><?php the_content(); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                    
                            </div>
                        
                        <?php endwhile; ?>
                        
                    </div>
                
                <?php echo ( get_theme_mod( 'conica-slider-style' ) == 0 ) ? '</div>' : ''; ?>
                <div class="home-slider-pager"></div>
                
                <?php do_action ( 'conica_after_default_slider' ); ?>
                
            </div>
            
        <?php endif; wp_reset_query(); ?>
        
    <?php else : ?>
        
        <div class="home-slider-wrap <?php echo ( get_theme_mod( 'conica-slider-size' ) ) ? sanitize_html_class( get_theme_mod( 'conica-slider-size' ) ) : sanitize_html_class( 'conica-slider-size-medium' ); ?> <?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? sanitize_html_class( 'slider-full-width' ) : ''; ?> home-slider-remove" <?php echo ( get_theme_mod( 'conica-slider-bg-color' ) ) ? 'style="background-color: ' . esc_html( get_theme_mod( 'conica-slider-bg-color' ) ) . ';"' : ''; ?>>
            <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
            
            <?php echo ( get_theme_mod( 'conica-slider-style' ) == 0 ) ? '<div class="site-container">' : ''; ?>
                
                <div class="home-slider">
                    
                    <div class="home-slider-block" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/demo/slide_demo_02.jpg);">
                        
                        <?php if ( get_theme_mod( 'conica-slider-size' ) == 'conica-slider-size-small' ) : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_small<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                        <?php elseif ( get_theme_mod( 'conica-slider-size' ) == 'conica-slider-size-large' ) : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_large<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                        <?php endif; ?>
                        
                        <div class="home-slider-block-inner">
                            <div class="home-slider-block-bg">
                                <h3 class="home-slider-block-title">
                                    <?php _e( 'Beautiful . Simple . Powerful', 'conica' ); ?>
                                </h3>
                                <p><?php _e( 'Create a beautiful website with a very powerful theme', 'conica' ); ?></p>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="home-slider-block" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/demo/slide_demo_01.jpg);">
                        
                        <?php if ( get_theme_mod( 'conica-slider-size' ) == 'conica-slider-size-small' ) : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_small<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                        <?php elseif ( get_theme_mod( 'conica-slider-size' ) == 'conica-slider-size-large' ) : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_large<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium<?php echo ( get_theme_mod( 'conica-slider-style' ) ) ? '_full' : ''; ?>.gif" />
                        <?php endif; ?>
                        
                        <div class="home-slider-block-inner">
                            <div class="home-slider-block-bg">
                                <h3 class="home-slider-block-title">
                                    <?php _e( 'Customize Everything', 'conica' ); ?>
                                </h3>
                                <p><?php _e( 'With Conica you can customize to your hearts content', 'conica' ); ?></p>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            
            <?php echo ( get_theme_mod( 'conica-slider-style' ) == 0 ) ? '</div>' : ''; ?>
            <div class="home-slider-pager"></div>
            
        </div>

    <?php endif; ?>
    
<?php endif; ?>