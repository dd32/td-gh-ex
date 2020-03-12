
        <article id="title-image-content">
            
            <header id="title-and-image">
            
                <img src="<?php echo esc_url( wp_get_attachment_image_url( get_the_ID() , 'full' ) ); ?>" class="featured_image" />
                
                <h2 class='header-text'><?php if ( get_the_title() ) { the_title();} else { _e( '(No Title)' , 'semper-fi-lite' ); } ?></h2>
            
            </header>
            
            <main id="the-article">
                
                <?php do_action( 'semperfi_content_data' ); ?>
                
                <p style="text-align: center;"><img src="<?php echo esc_url(  wp_get_attachment_image_url( get_the_ID(), 'full' ) ); ?>" class="featured_image" /></p>
            
                <p style="text-align: center;"><?php $semperfi_images = array();
                $semperfi_image_sizes = get_intermediate_image_sizes();
                array_unshift( $semperfi_image_sizes, 'full' );
                foreach( $semperfi_image_sizes as $semperfi_image_size ) {
                    if ( ( $semperfi_image_size == '1920x1080' ) || ( $semperfi_image_size == '850x478' ) || ( $semperfi_image_size == __( 'small' , 'semper-fi-lite' ) ) || ( $semperfi_image_size == __( 'thumbnail' , 'semper-fi-lite' ) ) ) {
                    $semperfi_image = wp_get_attachment_image_src( get_the_ID(), $semperfi_image_size );
                    $semperfi_name = $semperfi_image_size . ' (' . $semperfi_image[1] . 'x' . $semperfi_image[2] . ')';
                    $semperfi_images[] = '<a href="' . $semperfi_image[0] . '">' . ucfirst(strtolower($semperfi_name)) . '</a>';}}

                echo implode( ' | ', $semperfi_images ); ?></p>
            
            </main>

<?php comments_template(); ?>

        </article>