<?php if ( absint ( get_theme_mod( 'square_boxes_enable_1' , false ) ) || absint ( get_theme_mod( 'store_front_enable_1' , false ) ) || absint ( get_theme_mod( 'woocommerce_store_front_enable_1' , false ) ) || ( is_front_page() && is_home() ) ) : ?>


    <article id="title-image-content" >
        
        <header id="title-and-image">

            <h2 class='header-text' itemprop="headline"><?php bloginfo('name'); ?></h2>
            <?php if ( is_customize_preview() ) echo '<div class="customizer-title-image"></div><div class="customizer-title-image-2"></div><div class="customizer-title-image-3"></div>'; ?>

        </header>
        
    </article><?php endif; ?>
