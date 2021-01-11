<?php

        $semper_fi_lite_product_categories = array_reverse(
            get_terms( 
                array(
                    'taxonomy'   => "product_cat",
                    'number'     => $number,
                    'orderby'    => $orderby,
                    'order'      => $order,
                    'hide_empty' => $hide_empty,
                    'include'    => $semper_fi_lite_woocommerce_category_counts , ) ) , true );

    foreach( $semper_fi_lite_product_categories as $semper_fi_lite_single_category ) {

        if ( ( $semper_fi_lite_single_category->name != '' ) && ( $semper_fi_lite_single_category->name != 'Uncategorized' ) ) {

            //Lower case everything
            $semper_fi_lite_product_seo_id = strtolower( $semper_fi_lite_single_category->name );

            //Make alphanumeric (removes all other characters)
            $semper_fi_lite_product_seo_id = preg_replace( "/[^a-z0-9_\s-]/" , "" , $semper_fi_lite_product_seo_id );

            //Clean up multiple dashes or whitespaces
            $semper_fi_lite_product_seo_id = preg_replace( "/[\s-]+/" , " " , $semper_fi_lite_product_seo_id );

            //Convert whitespaces and underscore to dash
            $semper_fi_lite_product_seo_id = preg_replace( "/[\s_]/" , "-" , $semper_fi_lite_product_seo_id );

            // Add Shopping cart
            $semper_fi_lite_product_seo_id .= '-store'; ?>
    
    <article id="<?php echo $semper_fi_lite_product_seo_id; ?>" class="store-front store-front-number-<?php echo $semper_fi_lite_woocommerce_category_count; ?>">
        
        <header class="store-header" style="background-image: url(<?php semper_fi_lite_image( 'woocommerce_shop_img_' . $semper_fi_lite_woocommerce_category_count , '/images/schwarttzy-skyvan-chicago-lake-front-michigan-1920x1080.jpg' , 1920 , 1080 ); ?>);">

            <h2 class='header-text' itemprop="headline"><?php echo $semper_fi_lite_single_category->name; ?></h2>
            <?php if ( is_customize_preview() ) echo '<div class="customizer-store-front"></div>'; ?>

        </header>
        
        <section>
        
            <?php $semper_fi_lite_product_posts = new WP_Query(

                array(
                    'post_type'         => array('product'),
                    'product_cat'       => $semper_fi_lite_single_category->name,
                    'orderby'           => 'title',
                    'posts_per_page'    => 1000, ) );

            if ( $semper_fi_lite_product_posts->have_posts() ) {

                while ( $semper_fi_lite_product_posts->have_posts() ) {

                    $semper_fi_lite_product_posts->the_post();

                    wc_get_template_part( 'content', 'product' );

                }
            } ?>
            
        </section>

    </article>
    <?php } $semper_fi_lite_woocommerce_category_count++;
    
    } ?>

    <?php do_action( 'woocommerce_after_shop_loop' ); ?>