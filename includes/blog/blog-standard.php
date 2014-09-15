<?php
global $cx_framework_options;

$blog_cats_set = conica_load_selected_categories( $cx_framework_options['cx-options-blog-cats'] );
$blog_posts_per_page = $cx_framework_options['cx-options-blog-per-page'];

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
query_posts( 'cat=' . $blog_cats_set . '&posts_per_page=' . $blog_posts_per_page . '&paged=' . $paged );
if ( have_posts() ) : ?>
    
    <div class="blog-list-wrap">
    
        <?php
        $count = 0;
        while ( have_posts() ) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'conica-blog-standard-block ' ); ?>>
                
                <?php
                $images = get_posts( array("numberposts"=>-1,"post_type"=>"attachment","post_mime_type"=>"image","orderby" => "menu_order", "order" => "ASC","post_parent"=>$post->ID) ); ?>
                
                <div class="conica-blog-standard-block-content conica-blog-standard-<?php echo ( $images ) ? 'has-images' : 'no-images'; ?>">
                    
                    <header class="entry-header">
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                        <div class="entry-meta">
                            <?php if ( 'post' == get_post_type() ) : ?>
                                <i class="fa fa-calendar"></i> <?php kaira_posted_on(); ?>
                            <?php endif; ?>
                            <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                                <span class="comments-link"><i class="fa fa-comments"></i>  <?php comments_popup_link( __( '0 comments', 'conica' ), __( '1 Comment', 'conica' ), __( '% Comments', 'conica' ) ); ?></span>
                            <?php endif; ?>
                        </div>
                    </header>
                    
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>

                    <footer class="conica-blog-standard-post-footer">
                        <div class="conica-blog-standard-post-footer-left">
                            <?php
                            $categories_list = get_the_category_list( __( ', ', 'conica' ) );
                            if ( $categories_list && kaira_categorized_blog() ) : ?>
                            <span class="cat-links">
                                <i class="fa fa-list"></i> <?php printf( __( 'Posted in %1$s', 'conica' ), $categories_list ); ?>
                            </span>
                            <?php endif; ?>

                            <?php
                            $tags_list = get_the_tag_list( '', __( ', ', 'conica' ) );
                            if ( $tags_list ) : ?>
                            <span class="tags-links">
                                <i class="fa fa-tags"></i> <?php printf( __( 'Tags %1$s', 'conica' ), $tags_list ); ?>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="conica-blog-standard-post-footer-right">
                            <a href="<?php the_permalink(); ?>" class="conica-blog-permalink-btn"><?php _e( 'Read More', 'conica' ); ?></a>
                        </div>
                        <div class="clearboth"></div>
                    </footer>
                </div>
                
                <?php if ( $images ) : ?>
                
                <div class="conica-blog-standard-block-imgs">
                    <a href="<?php the_permalink(); ?>" class="blog-link-a"></a>
                    
                    <div class="conica-blog-standard-block-img-carousel-wrapper conica-blog-standard-block-img-wrapper-remove">
                        <div class="conica-blog-standard-block-img-prev"><i class="fa fa-angle-left"></i></div>
                        <div class="conica-blog-standard-block-img-next"><i class="fa fa-angle-right"></i></div>
                        
                        <div class="conica-blog-standard-block-img-carousel conica-blog-standard-block-img-remove">
                            
                            <?php
                            foreach ( $images as $image ) {
                                $title = $image->post_title;
                                $thumbimage = wp_get_attachment_image_src( $image->ID, "blog_standard_img" ); ?>
                                <img src="<?php echo $thumbimage[0]; ?>" alt="<?php echo esc_html( $title ) ?>" />
                            <?php
                            } ?>
                        
                        </div>
                        
                    </div>
                    
                </div>
                
                <?php endif; ?>
                
                <div class="clearboth"></div>
                
            </article>
            
        <?php
        $count++;
        endwhile; ?>
        
    </div>
    
    <?php kaira_content_nav( 'nav-below' ); ?>
    
<?php else: ?>
    
    <?php get_template_part( 'no-results', 'archive' ); ?>
    
<?php endif; wp_reset_query(); ?>