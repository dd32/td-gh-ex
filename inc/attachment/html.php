
        <article id="title-image-content">
            
            <header id="title-and-image">
            
                <img src="<?php echo wp_get_attachment_image_url( get_the_ID(), 'full' ); ?>" class="featured_image" />
                
                <h2><?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'semper-fi-lite'); } ?></h2>
            
            </header>
            
            <main id="the-article">
                
                <?php do_action( 'semperfi_content_data' ); ?>
                
                <p style="text-align: center;"><img src="<?php echo wp_get_attachment_image_url( get_the_ID(), 'full' ); ?>" class="featured_image" /></p>
            
                <p style="text-align: center;"><?php $images = array();
                $image_sizes = get_intermediate_image_sizes();
                array_unshift( $image_sizes, 'full' );
                foreach( $image_sizes as $image_size ) {
                    if (($image_size == '1920x1080') || ($image_size == '850x478') || ($image_size == 'small') || ($image_size == 'thumbnail')) {
                    $image = wp_get_attachment_image_src( get_the_ID(), $image_size );
                    $name = $image_size . ' (' . $image[1] . 'x' . $image[2] . ')';
                    $images[] = '<a href="' . $image[0] . '">' . ucfirst(strtolower($name)) . '</a>';}}

                echo implode( ' | ', $images ); ?></p>
            
            </main>

<?php comments_template(); ?>

        </article>