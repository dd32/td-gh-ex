    <article id="title-image-content" itemtype="http://schema.org/Product" itemscope><?php $semper_fi_lite_woocommerce_product = wc_get_product( get_the_ID() ); ?>

		<meta itemprop="name" content="<?php the_title(); ?>" />
<?php if ( has_post_thumbnail() ) : ?>

        <meta itemprop="image" content="<?php echo esc_url( the_post_thumbnail_url('semper_fi_lite_1920x1080') ); ?>" />
<?php endif; ?>

		<meta itemprop="url" content="<?php echo esc_url( get_permalink() ); ?>" />

        <meta itemprop="brand" content="<?php esc_attr_e( bloginfo('name') ); ?>" />
<?php if ( $semper_fi_lite_woocommerce_product->get_sku() != '' ) : ?>

        <meta itemprop="sku" content="<?php esc_attr_e( $semper_fi_lite_woocommerce_product->get_sku() ); ?>" />
<?php endif; ?>

        <header id="title-and-image"<?php if ( has_post_thumbnail() ) : ?> style="background-image: url(<?php the_post_thumbnail_url('semper_fi_lite_1920x1080'); ?>);"<?php else :?> style="background-image: url(<?php semper_fi_lite_image( 'default_header_img' , 'images/semper-fi-lite-top-of-world-H3-hummer-1920x1080.jpg' , 1920 , 1080 ); ?>);"<?php endif; ?>/><?php if ( is_customize_preview() ) echo '<div class="customizer-title-image">'; ?>

        
            <h2 class='header-text' itemprop="offers" itemtype="http://schema.org/Offer" itemscope><?php $semper_fi_lite_woocommce_product = wc_get_product( get_the_ID() ); ?>


				<meta itemprop="url" content="<?php echo esc_url( get_permalink() ); ?>" />
                
                <meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />

                <meta itemprop="price" content="<?php echo esc_attr( floor( $semper_fi_lite_woocommce_product->get_price() ) ); ?>">
<?php if ( $semper_fi_lite_woocommerce_product->get_stock_quantity() >= 1 ) : ?>

                <meta itemprop="availability" content="InStock" />
<?php else: ?>

                <meta itemprop="availability" content="OutOfStock" />
<?php endif; ?>

                <meta itemprop="priceValidUntil" content="<?php /* Not visible to the user, microdata needs to be in this specifc format for search engines https://schema.org/datePublished */ echo date( 'Y-m-d H:i' , strtotime("+30 days") ); ?>" />

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