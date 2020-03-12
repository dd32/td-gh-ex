<?php
/**
 * Semper Fi Lite: Customizer
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 63
 */ 


?>

            <section id="categories-and-tags" style="background-image:url(<?php echo esc_url( get_theme_mod( 'categories_and_tags_img_1' , get_template_directory_uri() . '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg' ) ); ?>);">

                <?php if ( is_customize_preview() ) echo '<div class="customizer-categories-and-tags"></div>';
                
                if ( is_404() ) { ?>

                <h3><?php _e( 'Next we have a list of all the pages that the website contains.' , 'semper-fi-lite' ); ?></h3>

                <ul class="post-categories" >

                    <?php wp_list_pages(array('title_li' => '', 'depth' => '1')); ?>

                </ul>
                
                <?php } elseif ( is_front_page() || is_home() ) { ?>
            
                <?php if ( get_next_posts_link( 'Older News' , $semperfi_blog_wp_query->max_num_pages ) ) : ?><h3 class="older-blog-posts"><?php next_posts_link( 'Older News' , $semperfi_blog_wp_query->max_num_pages ); // display older posts link ?></h3><?php endif; ?>

                <?php if ( get_previous_posts_link( 'Newer News' )) : ?><h3 class="newer-blog-posts"><?php previous_posts_link( 'Newer News' ); // display newer posts link ?></h3><?php endif; ?>
                                                            
                <?php } elseif ( is_singular() ) {
                
                if ( get_the_category_list() != '' ) : ?>
                
                echo?
    
                <ul class="post-categories" itemprop="about">

                    <li><?php echo get_the_category_list( __( '</li>

                    <li>', 'semper-fi-lite' ) ); ?></li>

                </ul>

                <?php if( get_the_tag_list() ) { echo get_the_tag_list('<ul class="tag-list" itemprop="keywords">

                    <li>',' </li>

                    <li>','</li>

                </ul>'); }
                
                    endif;
                    
                } ?>

            </section>

