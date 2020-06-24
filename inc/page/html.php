<?php

if ( !is_paged() ) : while ( have_posts() ) : the_post(); ?>

        <article id="title-image-content" itemscope itemtype="https://schema.org/NewsArticle">
            
            <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>"/>
            
            <header id="title-and-image">
            
            <?php if ( is_customize_preview() ) echo '<div class="customizer-title-image"></div>'; ?>

<?php if ( has_post_thumbnail() ) : ?>
                <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">

                    <?php the_post_thumbnail('semper_fi_lite_1920x1080', array( 'class' => 'featured_image', 'itemprop' => 'url')); ?>


                    <meta itemprop="url" content="<?php echo esc_url( the_post_thumbnail_url( 'semper_fi_lite_1920x1080' ) ); ?>">

                    <meta itemprop="width" content="<?php $semper_fi_lite_featured_image_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'semper_fi_lite_850x478' ); $semper_fi_lite_featured_image_width = $semper_fi_lite_featured_image_data[1]; echo absint( $semper_fi_lite_featured_image_width ); ?>">

                    <meta itemprop="height" content="<?php $semper_fi_lite_featured_image_width = $semper_fi_lite_featured_image_data[2]; echo absint( $semper_fi_lite_featured_image_width ); ?>">
                    
                </div>

<?php endif; ?>
                <h2 class='header-text' itemprop="headline"><?php the_title(); ?></h2>
            
            </header>
            
            <main id="the-article" itemprop="articleBody" style="background-image:url(<?php semper_fi_lite_image( 'main_background_img_1' , '/inc/single/images/eeeeee-mouse-chocolate-lab-tennis-ball-300x300.jpg' , 300 , 300 ); ?>);" >
            
                <?php if ( function_exists( 'is_cart' ) ) : if ( !is_cart() && !is_checkout() && !is_account_page() ) : edit_post_link( esc_html__( 'Edit this Post' , 'semper-fi-lite' ) ); endif; elseif ( !function_exists( 'is_cart' ) ) : edit_post_link( esc_html__( 'Edit this Post' , 'semper-fi-lite' ) ); endif; ?>
                
                <?php if ( function_exists( 'is_cart' ) ) : if ( !is_cart() && !is_checkout() && !is_account_page() ) : ?><?php do_action( 'semper_fi_lite_content_data' ); ?><?php endif; elseif ( !function_exists( 'is_cart' ) ) : do_action( 'semper_fi_lite_content_data' ); endif; ?>
                
                <?php the_content(); ?>

                <?php wp_link_pages( array('before' => esc_html__( 'Pages: ' , 'semper-fi-lite' ) , 'after' => '</br>') ); if ( is_customize_preview() ) echo '<div class="customizer"></div>'; ?>
            
            </main>
            
<?php do_action( 'semper_fi_lite-categories-and-tags-single' );

comments_template(); ?>

        </article>

<?php endwhile; endif; ?>