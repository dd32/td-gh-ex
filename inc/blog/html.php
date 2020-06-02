<?php

if ( get_query_var( 'paged' ) ) :

    $semper_fi_lite_get_paged_query = get_query_var( 'paged' );

elseif ( get_query_var('page') ) :
    
    // 'page' is used instead of 'paged' on Static Front Page
    $semper_fi_lite_get_paged_query = get_query_var('page');

else :

    $semper_fi_lite_get_paged_query = 1;

endif;

$semper_fi_lite_blog_wp_query = new WP_Query( array(
    'order'             => 'DESC',
    'orderby'           => 'date',
    'paged'             => $semper_fi_lite_get_paged_query,
    'post_status'       => 'publish',
    'post_type'         => 'post',
    'posts_per_page'    => get_option( 'posts_per_page' ), ) );

if ( $semper_fi_lite_blog_wp_query->have_posts() ) :

    if  ( is_home() || is_page() )  { ?>

        <header id="blog-title-and-image" style="background-image: url('<?php semper_fi_lite_image( 'blog_background_img_1' , '/inc/blog/images/Schwarttzy-Australia-Noosa-Beach-1920x1080.jpg' , 1920 , 1080 ); ?>');">

            <h2 class='header-text' itemprop="headline"><?php echo esc_attr( get_theme_mod( 'blog_title_text_1' , __( 'Blog' , 'semper-fi-lite' ) ) ); ?></h2>
            <?php if ( is_customize_preview() ) echo '<div class="customizer-title-image"></div><div class="customizer-title-image-2"></div>'; ?>

        </header><?php } 

        if ( is_home() && !is_page() ) { ?><div id="link-skipped"></div><?php } ?>

        <section id="the-posts"><?php

            while ( $semper_fi_lite_blog_wp_query->have_posts() ) : $semper_fi_lite_blog_wp_query->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php if ( !has_post_thumbnail() ) : post_class( array( 'the-blog' , 'no-post-thumbnail' ) ); else : post_class( array( 'the-blog' ) );  endif; ?> itemscope itemtype="http://schema.org/BlogPosting">

                <?php edit_post_link( __( 'Edit this Post' , 'semper-fi-lite' ) ); ?>

                <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/><?php

                $semper_fi_lite_featured_image_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'semper_fi_lite_850x478' );

                if ( !empty ( $semper_fi_lite_featured_image_data ) ) : ?>


                <header class="post-image">

                    <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'semper_fi_lite_850x478', array( 'itemprop' => 'image' ) ); ?></a>

                        <meta itemprop="url" content="<?php echo esc_url( $semper_fi_lite_featured_image_data[0] ); ?>">

                        <meta itemprop="width" content="<?php echo absint( $semper_fi_lite_featured_image_data[1] ); ?>">

                        <meta itemprop="height" content="<?php echo absint( $semper_fi_lite_featured_image_data[2] ); ?>">

                    </div>

                </header><?php endif; ?>


                <div class="post-content" itemprop="articleBody">

                    <h4 itemprop="headline">

                        <a href="<?php the_permalink(); ?>" itemprop="mainEntityOfPage"><?php if ( get_the_title() ) { the_title(); } else { _e( '(No Title)' , 'semper-fi-lite' ); } ?></a>

                    </h4>

                    <?php the_excerpt(); ?>
                    
                    <time itemprop="datePublished" content="<?php /* Not visible to the visitor, microdata needs to be in this specifc format for search engines https://schema.org/datePublished */ the_time( 'Y-m-d H:i' ) ?>" ><?php the_date(); ?></time>

                </div>

                <meta itemprop="dateModified" content="<?php /* Not visible to the visitor, microdata needs to be in this specifc format for search engines https://schema.org/datePublished */ the_modified_date( 'Y-m-d H:i' ); ?>">

                <meta itemprop="author" content="<?php the_author(); ?>">

                <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">

                    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">

                        <img src="<?php semper_fi_lite_image( 'publisher_logo_img_1' , '/inc/blog/images/publisher-logo-600x60.jpg' , 600 , 60 ); ?>" class="microdata-publisher-logo"/>

                        <meta itemprop="url" content="<?php semper_fi_lite_image( 'publisher_logo_img_1' , '/inc/blog/images/publisher-logo-600x60.jpg' , 600 , 60 ); ?>">

                        <meta itemprop="width" content="600">

                        <meta itemprop="height" content="60">

                    </div>

                    <meta itemprop="name" content="<?php bloginfo('name'); ?>">

                </div>

            </article>

<?php endwhile; ?>
        </section>

<?php do_action_ref_array( 'semper_fi_lite-categories-and-tags-single' ,  array( &$semper_fi_lite_blog_wp_query ) );

wp_reset_postdata(); endif;