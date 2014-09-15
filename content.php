<?php
/**
 * @package conica
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'conica-blog-standard-block ' ); ?>>
                
    <?php
    $images = get_posts( array("numberposts"=>-1,"post_type"=>"attachment","post_mime_type"=>"image","orderby" => "menu_order", "order" => "ASC","post_parent"=>$post->ID) );
    $imgcount = count($images);
    if ($imgcount > 0) { ?>
    <div class="conica-blog-standard-block-imgs">
        
        <div class="conica-blog-standard-block-img-carousel-wrapper conica-blog-standard-block-img-wrapper-remove">
            <div class="conica-blog-standard-block-img-prev"></div>
            <div class="conica-blog-standard-block-img-next"></div>
            
            <div class="conica-blog-standard-block-img-carousel conica-blog-standard-block-img-remove">
                
                <?php
                foreach ($images as $image) {
                    $title = $image->post_title;
                    $thumbimage = wp_get_attachment_image_src($image->ID, "blog_standard_img"); ?>
                    <img src="<?php echo $thumbimage[0]; ?>" alt="<?php echo esc_html( $title ) ?>" />
                <?php
                } ?>
            
            </div>
            
        </div>
        
    </div>
    <?php
    } ?>
    <div class="conica-blog-standard-block-content conica-blog-standard-<?php echo ($images) ? 'has-images' : 'no-images'; ?>">
        
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
                <a href="<?php the_permalink(); ?>" class="conica-blog-permalink-btn"><?php esc_html_e( 'Read More', 'conica' ) ?></a>
            </div>
            <div class="clearboth"></div>
        </footer>
    </div>
    <div class="clearboth"></div>
    
</article>