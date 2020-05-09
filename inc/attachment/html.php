
        <article id="title-image-content">
            
            <header id="title-and-image">
            
                <img src="<?php echo esc_url( wp_get_attachment_image_url( get_the_ID() , 'full' ) ); ?>" class="featured_image" />
                
                <h2 class='header-text'><?php if ( get_the_title() ) { the_title();} else { _e( '(No Title)' , 'semper-fi-lite' ); } ?></h2>
            
            </header>
            
            <main id="the-article">
                
                <?php do_action( 'semper_fi_lite_content_data' ); ?>
                
                <p style="text-align: center;"><img src="<?php echo esc_url(  wp_get_attachment_image_url( get_the_ID(), 'full' ) ); ?>" class="featured_image" /></p>
            
                <p style="text-align: center;"><?php $semper_fi_lite_images = array();
                $semper_fi_lite_image_sizes = get_intermediate_image_sizes();
                array_unshift( $semper_fi_lite_image_sizes, 'full' );
                foreach( $semper_fi_lite_image_sizes as $semper_fi_lite_image_size ) {
                    if ( ( $semper_fi_lite_image_size == 'semper_fi_lite_1920x1080' ) || ( $semper_fi_lite_image_size == 'semper_fi_lite_850x478' ) || ( $semper_fi_lite_image_size == __( 'small' , 'semper-fi-lite' ) ) || ( $semper_fi_lite_image_size == __( 'thumbnail' , 'semper-fi-lite' ) ) ) {
                    $semper_fi_lite_image = wp_get_attachment_image_src( get_the_ID(), $semper_fi_lite_image_size );
                    $semper_fi_lite_name = $semper_fi_lite_image_size . ' (' . $semper_fi_lite_image[1] . 'x' . $semper_fi_lite_image[2] . ')';
                    $semper_fi_lite_images[] = '<a href="' . $semper_fi_lite_image[0] . '">' . ucfirst(strtolower($semper_fi_lite_name)) . '</a>';}}

                echo implode( ' | ', $semper_fi_lite_images ); ?></p>
            
            </main>

<?php comments_template(); ?>

        </article>