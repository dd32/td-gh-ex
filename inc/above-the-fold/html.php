
    <article id="title-image-content" >
        
        <header id="title-and-image">
            
            <img src="<?php echo get_theme_mod( 'above_the_fold_img_1' , get_template_directory_uri() . '/images/moose-logo-1920x1080.jpg' ); ?>" class="featured_image" />

            <h2 itemprop="headline"><?php bloginfo('name'); ?></h2>
            <?php if ( is_customize_preview() ) echo '<div class="customizer-tite-image"></div><div class="customizer-tite-image-2"></div><div class="customizer-tite-image-3"></div>'; ?>

        </header>
        
    </article>
