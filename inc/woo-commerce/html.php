    <article id="title-image-content" itemtype="http://schema.org/Product" itemscope>
		
		<meta itemprop="name" content="<?php the_title(); ?>" />
		
<?php $semper_fi_lite_woocommce_product = wc_get_product( get_the_ID() ); ?>

        <header id="title-and-image">

        <?php if ( is_customize_preview() ) echo '<div class="customizer-title-image">'; ?>

<?php if ( has_post_thumbnail() ) : ?>

                <?php the_post_thumbnail( 'semper_fi_lite_1920x1080' , array( 'class' => 'featured_image', 'itemprop' => 'image' ) ); ?>

<?php else :?>
        <img src="<?php semper_fi_lite_image( 'default_header_img' , 'images/semper-fi-lite-top-of-world-H3-hummer-1920x1080.jpg' , 1920 , 1080 ); ?>" class="featured_image"  itemprop="image" />

<?php endif; ?>
            <h2 class='header-text' itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                
                <meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
                
                <meta itemprop="price" content="<?php echo esc_attr( floor( $semper_fi_lite_woocommce_product->get_price() ) ); ?>">
                
                <span>
                    
                    <?php the_title(); ?>
                
                </span>
            
            </h2>

        </header>
            
        <main id="the-article" itemprop="description" style="background-image:url(<?php semper_fi_lite_image( 'main_background_img_1' , '/inc/single/images/eeeeee-mouse-chocolate-lab-tennis-ball-300x300.jpg' , 300 , 300 ); ?>);" >
            
            <?php do_action( 'semper_fi_lite_woo_commerce_content_microdata' ); ?>
            
            <?php woocommerce_content(); ?>

            <?php echo apply_filters( 'the_content' , $semper_fi_lite_woocommce_product->get_description() ); ?>

        </main>

    </article>