    <article id="title-image-content" itemtype="http://schema.org/Product" itemscope>
		
		<meta itemprop="name" content="<?php if ( get_the_title() ) { the_title();} else { _e( '(No Title)' , 'semper-fi-lite' ); } ?>" />
		
<?php $product = wc_get_product( get_the_ID() ); ?>

        <header id="title-and-image">

        <?php if ( is_customize_preview() ) echo '<div class="customizer-tite-image">'; ?>

<?php if ( has_post_thumbnail() ) : ?>

                <?php the_post_thumbnail( '1920x1080' , array( 'class' => 'featured_image', 'itemprop' => 'image' ) ); ?>

<?php else :?>
        <img src="<?php echo esc_url( get_theme_mod( 'default_header_img' , get_template_directory_uri() . 'images/semper-fi-lite-top-of-world-H3-hummer-1920x1080.jpg' ) ); ?>" class="featured_image"  itemprop="image" />

<?php endif; ?>
            <h2 class='header-text' itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
                
                <meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
                
                <meta itemprop="price" content="<?php echo esc_attr( floor( $product->get_price() ) ); ?>">
                
                <span>
                    
                    <?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'semper-fi-lite'); } ?>
                
                </span>
            
            </h2>

        </header>
            
        <main id="the-article" itemprop="description" style="background-image:url(<?php echo esc_url( get_theme_mod( 'main_background_img_1' , get_template_directory_uri() . '/inc/single/images/eeeeee-mouse-chocolate-lab-tennis-ball-300x300.jpg') ); ?>);" >
            
            <?php do_action( 'woo_commerce_content_microdata' ); ?>
            
            <?php woocommerce_content(); ?>

            <?php echo apply_filters( 'the_content' , $product->get_description() ); ?>

        </main>

    </article>