<?php

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article id="title-image-content" itemscope itemtype="http://schema.org/NewsArticle">

        <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/>

        <header id="title-and-image">
            
        <?php if ( is_customize_preview() ) echo '<div class="customizer-tite-image"></div><div class="customizer-tite-image-2"></div><div class="customizer-tite-image-3"></div>'; ?>
            
<?php if ( has_post_thumbnail() ) : ?>
            <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

                    <?php the_post_thumbnail( '850x478' , array( 'class' => 'featured_image', 'itemprop' => 'url')); ?>


                    <meta itemprop="url" content="<?php echo the_post_thumbnail_url( '850x478' ); ?>">

                    <meta itemprop="width" content="<?php $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '850x478' ); $image_width = $image_data[1]; echo $image_width; ?>">

                    <meta itemprop="height" content="<?php $image_height = $image_data[2]; echo $image_height; ?>">

            </div>
<?php else : ?>
            <img src="<?php echo get_theme_mod( 'above_the_fold_img_1' , get_template_directory_uri() . '/images/moose-logo-1920x1080.jpg' ); ?>" class="featured_image" />
<?php endif; ?>

            <h2 itemprop="headline"><?php if ( get_the_title() ) : the_title();  else : _e('(No Title)', 'semper-fi-lite'); endif; ?></h2>

        </header>

        <main id="the-article" itemprop="articleBody">
            
            <?php edit_post_link('Edit this Post'); ?>
                
            <?php do_action( 'semperfi_content_data' ); ?>
            
            <?php the_content(); ?>

            <?php wp_link_pages( array('before' => 'Pages: ', 'after' => '</br>') ); ?>

        </main>

    </article>

<?php endwhile; endif;