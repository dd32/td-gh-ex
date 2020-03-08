    <?php

        $product_categories = array_reverse(
            get_terms( 
                array(
                    'taxonomy'   => "product_cat",
                    'number'     => $number,
                    'orderby'    => $orderby,
                    'order'      => $order,
                    'hide_empty' => $hide_empty,
                    'include'    => $ids , ) ) , true );

    $i = 1;

    foreach( $product_categories as $cat ) { 

        if ( ( $cat->name != '' ) && ( $cat->name != 'Uncategorized' ) ) {

            //Lower case everything
            $product_seo_id = strtolower( $cat->name );

            //Make alphanumeric (removes all other characters)
            $product_seo_id = preg_replace( "/[^a-z0-9_\s-]/" , "" , $product_seo_id );

            //Clean up multiple dashes or whitespaces
            $product_seo_id = preg_replace( "/[\s-]+/" , " " , $product_seo_id );

            //Convert whitespaces and underscore to dash
            $product_seo_id = preg_replace( "/[\s_]/" , "-" , $product_seo_id );

            // Add Shopping cart
            $product_seo_id .= '-store'; ?>
    
    <article id="<?php echo $product_seo_id; ?>" class="store-front" style="background-image:url(<?php echo esc_url( get_theme_mod( 'woocommerce_shop_img_' . $i , get_template_directory_uri() . '/images/schwarttzy-skyvan-chicago-lake-front-michigan-1920x1080.jpg' ) ); ?>);">
        
        <header id="h3-hummer" class="store-header">

            <h2 class='header-text' itemprop="headline"><?php echo $cat->name; ?></h2>
            <?php if ( is_customize_preview() ) echo '<div class="customizer-store-front"></div>'; ?>

        </header>
        
        <section>
        
            <?php $product_posts = new WP_Query(

                array(
                    'post_type'         => array('product'),
                    'product_cat'       => $cat->name,
                    'orderby'           => 'title',
                    'posts_per_page'    => 1000, ) );

            if ( $product_posts->have_posts() ) {

                while ( $product_posts->have_posts() ) {

                    $product_posts->the_post();

                    wc_get_template_part( 'content', 'product' );

                }
            } ?>
            
        </section>

    </article>
    <?php } $i++;
    
    } ?>

    <?php do_action( 'woocommerce_after_shop_loop' ); ?>