<?php
/**
 * Semper Fi Lite: Customizer
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 63
 */ 


?>

            <section id="categories-and-tags" style="background-image:url(<?php semper_fi_lite_image( 'categories_and_tags_img_1' , '/inc/categories-and-tags/images/Clinton-Skydive-Sunset-Flocking-1920x1080.jpg' , 1920 , 1080 ); ?>);">

                <?php if ( is_customize_preview() ) echo '<div class="customizer-categories-and-tags"></div>';
                
                if ( is_404() ) { ?>

                <h3><?php _e( 'Next we have a list of all the pages that the website contains.' , 'semper-fi-lite' ); ?></h3>

                <ul class="post-categories" >

                    <?php wp_list_pages( array( 'title_li' => '' , 'depth' => '1' ) ); ?>

                </ul>
                
                <?php } elseif ( ( is_front_page() || is_home() ) && ( $semper_fi_lite_blog_wp_query->max_num_pages > 1) ) {?>
                
                <h3 class="blog-paginate"><?php
                    
                    $semper_fi_lite_big_number = 999999999; // need an unlikely integer
                    
                    echo paginate_links ( array(
                        'base'          => str_replace( $semper_fi_lite_big_number, '%#%', esc_url( get_pagenum_link( $semper_fi_lite_big_number ) ) ),
                        'format'        => '?paged=%#%',
                        'current'       => max( 1, get_query_var('page') ),
                        'prev_text'     => __( 'Newer News' , 'semper-fi-lite' ),
                        'next_text'     => __( 'Older News' , 'semper-fi-lite' ),
                        'total'         => $semper_fi_lite_blog_wp_query->max_num_pages, ) ); ?></h3>
                                                            
                <?php } elseif ( is_singular() ) {
                
                if ( get_the_category_list() != '' ) : ?>
    
                <ul class="post-categories" itemprop="about">

                    <li><?php the_category(
                    
                        '</li>

                        <li>'); ?></li>

                </ul>

                <?php if ( get_the_tag_list() ) {
                    
                    the_tags( '<ul class="tag-list" itemprop="keywords">

                    <li>',' </li>

                    <li>','</li>

                </ul>'); }
                
                    endif;
                    
                } ?>

            </section>

