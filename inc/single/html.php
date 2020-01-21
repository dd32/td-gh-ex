<?php

if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="title-image-content" itemscope itemtype="http://schema.org/NewsArticle" <?php post_class(); ?>>
            
            <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>"/>
            
            <header id="title-and-image">

<?php if ( has_post_thumbnail() ) : ?>
                <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

                    <?php the_post_thumbnail('1920x1080', array( 'class' => 'featured_image', 'itemprop' => 'url')); ?>


                    <meta itemprop="url" content="<?php echo the_post_thumbnail_url( '1920x1080' ); ?>">

                    <meta itemprop="width" content="<?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '1920x1080' ); $image_width = $image_data[1]; echo $image_width; ?>">

                    <meta itemprop="height" content="<?php $image_height = $image_data[2]; echo $image_height; ?>">
                    
                </div>
<?php endif; ?>
                <h2 class='header-text' itemprop="headline"><?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'semper-fi-lite'); } ?></h2>
            
            </header>
            
            <main id="the-article" itemprop="articleBody" style="background-image:url(<?php echo get_theme_mod( 'main_background_img_1' , get_template_directory_uri() . '/inc/single/images/moose-eeeeee-300x300.jpg' ); ?>);" >
                
                <?php do_action( 'semperfi_content_data' ); ?>
                
                <?php the_content(); ?>

                <?php wp_link_pages( array('before' => '<p>Pages: ', 'after' => '</p>') ); ?>
            
            </main>
    
<?php do_action('categories-and-tags-single');

do_action( 'semperfi_display_comments' );
    
endwhile; ?>
            
            <?php if ( is_customize_preview() ) echo '<div class="customizer"></div>'; ?>

        </article>

<?php endif;