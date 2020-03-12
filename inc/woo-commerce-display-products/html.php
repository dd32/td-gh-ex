<?php

        $semperfi_product_categories = array_reverse(
            get_terms( 
                array(
                    'taxonomy'   => "product_cat",
                    'number'     => $number,
                    'orderby'    => $orderby,
                    'order'      => $order,
                    'hide_empty' => $hide_empty,
                    'include'    => $semperfi_woocommerce_category_countds , ) ) , true );

    $semperfi_woocommerce_category_count = 1;

    foreach( $semperfi_product_categories as $semperfi_single_category ) { 

        if ( ( $semperfi_single_category->name != '' ) && ( $semperfi_single_category->name != 'Uncategorized' ) ) {

            //Lower case everything
            $semperfi_product_seo_id = strtolower( $semperfi_single_category->name );

            //Make alphanumeric (removes all other characters)
            $semperfi_product_seo_id = preg_replace( "/[^a-z0-9_\s-]/" , "" , $semperfi_product_seo_id );

            //Clean up multiple dashes or whitespaces
            $semperfi_product_seo_id = preg_replace( "/[\s-]+/" , " " , $semperfi_product_seo_id );

            //Convert whitespaces and underscore to dash
            $semperfi_product_seo_id = preg_replace( "/[\s_]/" , "-" , $semperfi_product_seo_id );

            // Add Shopping cart
            $semperfi_product_seo_id .= '-store'; ?>
    
    <article id="<?php echo $semperfi_product_seo_id; ?>" class="store-front" style="background-image:url(<?php echo esc_url( get_theme_mod( 'woocommerce_shop_img_' . $semperfi_woocommerce_category_count , get_template_directory_uri() . '/images/schwarttzy-skyvan-chicago-lake-front-michigan-1920x1080.jpg' ) ); ?>);">
        
        <header id="h3-hummer" class="store-header">

            <h2 class='header-text' itemprop="headline"><?php echo $semperfi_single_category->name; ?></h2>
            <?php if ( is_customize_preview() ) echo '<div class="customizer-store-front"></div>'; ?>

        </header>
        
        <section>
        
            <?php $semperfi_product_posts = new WP_Query(

                array(
                    'post_type'         => array('product'),
                    'product_cat'       => $semperfi_single_category->name,
                    'orderby'           => 'title',
                    'posts_per_page'    => 1000, ) );

            if ( $semperfi_product_posts->have_posts() ) {

                while ( $semperfi_product_posts->have_posts() ) {

                    $semperfi_product_posts->the_post();

                    wc_get_template_part( 'content', 'product' );

                }
            } ?>
            
        </section>

    </article>
    <?php } $semperfi_woocommerce_category_count++;
    
    } ?>

    <?php do_action( 'woocommerce_after_shop_loop' ); ?>